<?php namespace App\Models\CLN;

use CodeIgniter\Model;

use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENAutenticacionService as ENAutenticacionService;
use App\Models\CEN\CENDataService as ENDataService;
use App\Models\CEN\CENParsistema as ENParsistema;
use App\Models\CEN\CENCorreo as ENCorreo;
use App\Models\CEN\CENRecuperacion as ENRecuperacion;

use App\Models\CLN\CLNGenerico as LNGenerico;
use App\Models\CLN\CLNConfigsistema as LNConfigsistema;


use App\Models\CAD\CADNotificacion as ADNotificacion;

use App\Models\CSE\CSEOrquestador as SEOrquestador;

class CLNNotificacion extends Model
{

    public function __construct()
    {
        
    }

    public function Get_Notificacion(int $p_Tip_Notificacion):ENCorreo
    {
        $l_Correo = new ENCorreo();
        $l_LNConfigsistema = new LNConfigsistema();
        $l_Parsistema = new ENParsistema();
        $l_Type_Mail_Notificaciones = 30;

        $l_Parsistema = $l_LNConfigsistema->Get_Parametros_Sistema_object($l_Type_Mail_Notificaciones,$p_Tip_Notificacion,"",null)[0];

        $l_Correo->Des_Correo_Emisor = $l_Parsistema->Des_ParSis_Tx1;
        $l_Correo->Des_Asunto = $l_Parsistema->Des_ParSis_Tx2;
        $l_Correo->Des_Mensaje = $l_Parsistema->Des_ParSis_Tx3;
        $l_Correo->Des_Nombre_Emisor = $l_Parsistema->Des_ParSis_Tx4;

        return $l_Correo;
    }

    public function Enviar_Notificacion_Venta(array $p_Obj_Preventa,string $p_Cod_Documento,ENAutenticacionService $p_Obj_Aut):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_ADNotificacion = new ADNotificacion();
        $l_Correo = new ENCorreo();
        $l_SEOrquestador = new SEOrquestador();
        $l_Tip_Notificacion = 1;//MENSAJE DE NOTIFICACIÓN DE VENTA
        $l_List_Correo = [];
        $l_Html_Tbl = "";

        $l_Correo = $this->Get_Notificacion($l_Tip_Notificacion);
        $l_List_Correo = $l_ADNotificacion->Get_List_Usuarios_Notificacion($l_Tip_Notificacion)->Resultado;

        foreach(  $l_List_Correo as $Item )
        {
            array_push($l_Correo->List_Correo_Receptor,$Item["Des_Email"]);
        }

        $l_Correo->Des_Asunto = str_replace("@Doc_Venta", $p_Obj_Preventa["Cod_Venta"],$l_Correo->Des_Asunto);
        $l_Correo->Des_Mensaje = str_replace("@Cod_DocVenta",$p_Cod_Documento,$l_Correo->Des_Mensaje);
        $l_Correo->Des_Mensaje = str_replace("@Des_Cliente",$p_Obj_Preventa["Des_NomCliente"],$l_Correo->Des_Mensaje);


        $l_Html_Tbl .= '<table border="1">';
        $l_Html_Tbl .= '<thead>';
        $l_Html_Tbl .= '<tr>';
        $l_Html_Tbl .= '<td align="left"><b>Producto</b></td>';
        $l_Html_Tbl .= '<td align="left"><b>Precio</b></td>';
        $l_Html_Tbl .= '<td align="left"><b>Cantidad</b></td>';
        $l_Html_Tbl .= '<td align="left"><b>Descuento</b></td>';
        $l_Html_Tbl .= '<td align="left"><b>Precio Venta</b></td>';
        $l_Html_Tbl .= '</tr>';
        $l_Html_Tbl .= '</thead>';

        foreach($p_Obj_Preventa["List_Item_Venta"] as $Item)
        {
            $l_Html_Tbl .= '<tbody>';
            $l_Html_Tbl .= '<tr>';
            $l_Html_Tbl .= '<td align="left">'.$Item["Cod_Producto"].'</td>';
            $l_Html_Tbl .= '<td align="left">'.$Item["Des_Precio"].'</td>';
            $l_Html_Tbl .= '<td align="left">'.$Item["Num_Cantidad"].'</td>';
            $l_Html_Tbl .= '<td align="left">'.$Item["Des_Descuento"].'</td>';
            $l_Html_Tbl .= '<td align="left">'.$Item["Des_MontoTotal"].'</td>';
            $l_Html_Tbl .= '</tr>';
            $l_Html_Tbl .= '</tbody>';
        }
        $l_Html_Tbl .= '</table>';

        $l_Correo->Des_Mensaje = str_replace("@Tbl_Productos",$l_Html_Tbl,$l_Correo->Des_Mensaje);
        $l_Correo->Des_Mensaje = str_replace("@Num_Venta",$p_Obj_Preventa["Des_Total"],$l_Correo->Des_Mensaje);

        $l_Rpt = $l_SEOrquestador->Ejecutar_16_ws_wa_EnvioCorreo($l_Correo,$p_Obj_Aut);
        return $l_Rpt;
    }

    public function Enviar_Notificacion_Promociones_Vencidas(array $p_List_Promocion,ENAutenticacionService $p_Obj_Aut):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_ADNotificacion = new ADNotificacion();
        $l_Correo = new ENCorreo();
        $l_SEOrquestador = new SEOrquestador();
        $l_Tip_Notificacion = 2;//	MESAJE DE NOTIFICACIÓN DE PROMOS VENCIDAS
        $l_List_Correo = [];
        $l_Html_Tbl = "";

        $l_Correo = $this->Get_Notificacion($l_Tip_Notificacion);
        $l_List_Correo = $l_ADNotificacion->Get_List_Usuarios_Notificacion($l_Tip_Notificacion)->Resultado;

        foreach(  $l_List_Correo as $Item )
        {
            array_push($l_Correo->List_Correo_Receptor,$Item["Des_Email"]);
        }

        $l_Html_Tbl .= '<table border="1">';
        $l_Html_Tbl .= '<thead>';
        $l_Html_Tbl .= '<tr>';
        $l_Html_Tbl .= '<td align="left"><b>Codigo</b></td>';
        $l_Html_Tbl .= '<td align="left"><b>Descripción</b></td>';
        $l_Html_Tbl .= '<td align="left"><b>Fecha Inicio</b></td>';
        $l_Html_Tbl .= '<td align="left"><b>Fecha Fin</b></td>';
        $l_Html_Tbl .= '</tr>';
        $l_Html_Tbl .= '</thead>';

        foreach($p_List_Promocion as $Item)
        {
            $l_Html_Tbl .= '<tbody>';
            $l_Html_Tbl .= '<tr>';
            $l_Html_Tbl .= '<td align="left">'.$Item->Cod_Promocion.'</td>';
            $l_Html_Tbl .= '<td align="left">'.$Item->Des_Promocion.'</td>';
            $l_Html_Tbl .= '<td align="left">'.$Item->Fec_Inicio.'</td>';
            $l_Html_Tbl .= '<td align="left">'.$Item->Fec_Fin.'</td>';
            $l_Html_Tbl .= '</tr>';
            $l_Html_Tbl .= '</tbody>';
        }
        $l_Html_Tbl .= '</table>';

        $l_Correo->Des_Mensaje = str_replace("@Tbl_Promociones",$l_Html_Tbl,$l_Correo->Des_Mensaje);

        $l_Rpt = $l_SEOrquestador->Ejecutar_16_ws_wa_EnvioCorreo($l_Correo,$p_Obj_Aut);
        return $l_Rpt;
    }

    public function Enviar_Correo_Recuperacion(ENRecuperacion $p_Recuperacion,ENAutenticacionService $p_Obj_Aut)
    {
        $l_Rpt = new ENResponse();
        $l_Correo = new ENCorreo();
        $l_SEOrquestador = new SEOrquestador();
        $l_Tip_Notificacion = 3;//	MENSAJE DE NOTIFICACIÓN PARA RECUPERACIÓN DE CORREOS
        $l_Html_Url = "";

        $l_Correo = $this->Get_Notificacion($l_Tip_Notificacion);

        array_push($l_Correo->List_Correo_Receptor,$p_Recuperacion->Des_Email);

        $l_Html_Url = '<a href="'.$p_Recuperacion->Des_Url_Recuperacion.'">'.$p_Recuperacion->Des_Url_Recuperacion.'</a>';

        $l_Correo->Des_Mensaje = str_replace("@Des_Url_Recuperacion",$l_Html_Url,$l_Correo->Des_Mensaje);

        $l_Rpt = $l_SEOrquestador->Ejecutar_16_ws_wa_EnvioCorreo($l_Correo,$p_Obj_Aut);
        return $l_Rpt;
    }
}
?>