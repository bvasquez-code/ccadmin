<?php namespace App\Models\CLN;

use CodeIgniter\Model;


use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENAutenticacionService as ENAutenticacionService;
use App\Models\CEN\CENProcesoSistema as ENProcesoSistema;

use App\Models\CLN\CLNNotificacion as LNNotificacion;

use App\Models\CAD\CADProceso as ADProceso;


class CLNProceso extends Model
{

    public function __construct()
    {

    }


    public function Delete_Limpiar_Sesiones(string $p_Array_Data_Url)
    {

        $l_Rpt = new ENResponse();
        $l_Obj_Aut = new ENAutenticacionService();
        $l_ADProceso = new ADProceso();
        $l_Fec_Servidor = date("Y-m-d H:i:s");
        $l_Array_Busqueda = [];

        $l_Array_Busqueda = $this->Formatear_Url($p_Array_Data_Url);

        $l_Obj_Aut->Set($l_Array_Busqueda);

        $l_Obj_Aut = $l_ADProceso->Get_Credenciales_Tienda_Proceso($l_Obj_Aut);
        
        $l_Rpt = $l_ADProceso->Delete_Limpiar_Sesiones($l_Obj_Aut->Id_Tienda,$l_Obj_Aut->Id_Usuario,$l_Fec_Servidor);

        return $l_Rpt;
    }

    public function Update_Estado_Promo_General(string $p_Array_Data_Url):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_ADProceso = new ADProceso();
        $l_Obj_Aut = new ENAutenticacionService();
        $l_LNNotificacion = new LNNotificacion();
        $l_Array_Busqueda = [];

        $l_Array_Busqueda = $this->Formatear_Url($p_Array_Data_Url);

        $l_Obj_Aut->Set($l_Array_Busqueda);

        $l_Obj_Aut = $l_ADProceso->Get_Credenciales_Tienda_Proceso($l_Obj_Aut);
        
        $l_Rpt = $l_ADProceso->Update_Estado_Promo_General($l_Obj_Aut->Id_Empresa);

        if ( $l_Rpt->Resultado["Flg_Alerta"] )
        {
            $l_LNNotificacion->Enviar_Notificacion_Promociones_Vencidas(
                 $l_Rpt->Resultado["List_Promocion"]
                ,$l_Obj_Aut);
        }

        return $l_Rpt;
    }

    public function Formatear_Url(string $p_Array_Data_Url):array
    {
        $l_Array_Busqueda = [];
        $l_Des_Query_Url = "";

        if( !empty($p_Array_Data_Url) )
        {
            $l_Des_Query_Url = "?".$p_Array_Data_Url;
            $l_Array_Query_Url =  parse_url($l_Des_Query_Url);
            parse_str($l_Array_Query_Url['query'], $l_Array_Busqueda);
        }

        return $l_Array_Busqueda;
    }

    public function Get_List_Procesos(ENAutenticacionService $p_Obj_Aut):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_ADProceso = new ADProceso();

        $l_Rpt->Resultado = [ "List_Resultado" => $l_ADProceso->Get_List_Procesos($p_Obj_Aut->Id_Empresa) ];

        return $l_Rpt;
    }

    public function Ejecutar_Proceso(int $p_Id_Proceso,ENAutenticacionService $p_Obj_Aut)
    {
        $l_Rpt = new ENResponse();
        $l_ADProceso = new ADProceso();
        $l_ProcesoSistema = null;
        $l_Rpt_Url = [];

        $l_ProcesoSistema = $l_ADProceso->Get_Detalle_Proceso($p_Id_Proceso,$p_Obj_Aut->Id_Empresa);

        $l_Rpt_Url = json_decode(file_get_contents( $l_ProcesoSistema->Des_Url ),true);

        $l_Rpt->Resultado = $l_Rpt_Url["Resultado"];
        $l_Rpt->Error->Set($l_Rpt_Url["Error"]);

        return $l_Rpt;
    }
}