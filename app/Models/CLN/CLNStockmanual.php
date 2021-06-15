<?php namespace App\Models\CLN;

use CodeIgniter\Model;

use App\Models\CAD\CADStockmanual as ADStockmanual;
use App\Models\CAD\CADSeguridad as ADSeguridad;

use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENRequestService as ENRequestService;
use App\Models\CEN\CENDataService as ENDataService;
use App\Models\CEN\CENDetOtrOpeComercial as ENDetOtrOpeComercial;
use App\Models\CEN\CENOtrOpeComerciales as ENOtrOpeComerciales;
use App\Models\CEN\CENParsistema as ENParsistema;
use App\Models\CEN\CENFormatoExcel as ENFormatoExcel;


use App\Models\CSE\CSEOrquestador as SEOrquestador;

use App\Models\CLN\CLNGenerico as LNGenerico;


class CLNStockmanual extends Model
{

    public function __construct()
    {

    }


    public function Get_Tienda(int $p_Id_Tienda,int $p_Id_Usuario):ENResponse
    {
        $Rpt = new ENResponse();
        $ADStockmanual = new ADStockmanual();
        $ADSeguridad = new ADSeguridad();
        $l_3_add_stock_massive_all_store = 3; //PERFIL QUE PUEDE REALIZAR CARGA MASIVA DE STOCK EN CUALQUIER TIENDA

        $Rpt = $ADSeguridad->Get_Validacion_Perfil($p_Id_Usuario,$l_3_add_stock_massive_all_store);

        if(!$Rpt->Error->flagerror)
        {
            $p_Id_Tienda = 0;
        }

        $Rpt = new ENResponse();
        $Rpt->Resultado = $ADStockmanual->Get_Tienda($p_Id_Tienda);

        return $Rpt;
    }

    public function Set_Stock_Inicial(array $p_Request,int $p_Id_Usuario,int $p_Id_Empresa,int $p_Id_Tienda,string $p_User,string $p_Password):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_SEOrquestador = new SEOrquestador();

        $l_Rpt = $l_SEOrquestador->Ejecutar_09_ws_wa_CargaStock($p_Request,$p_Id_Usuario,$p_Id_Empresa,$p_Id_Tienda,$p_User,$p_Password);

        return $l_Rpt;
    }

    public function Get_Carga_Stock(ENDataService $p_Request,int $p_Id_Usuario,int $p_Id_Tienda,int $p_Id_Empresa)
    {
        $Rpt = new ENResponse();
        $ADStockmanual = new ADStockmanual();
        $ADSeguridad = new ADSeguridad();
        $LNGenerico = new LNGenerico();

        $l_3_add_stock_massive_all_store = 3; //PERFIL QUE PUEDE REALIZAR CARGA MASIVA DE STOCK EN CUALQUIER TIENDA

        $Rpt = $ADSeguridad->Get_Validacion_Perfil($p_Id_Usuario,$l_3_add_stock_massive_all_store);

        if(!$Rpt->Error->flagerror)
        {
            $p_Id_Tienda = 0;
        }
        $Rpt = new ENResponse();
        $p_Request->Paginacion = $LNGenerico->Get_Valor_Intervalo($p_Request->Paginacion);

        $Rpt->Resultado = $ADStockmanual->Get_Carga_Stock($p_Id_Tienda,$p_Id_Empresa,"",$p_Request->Paginacion->Num_RegistroIni,$p_Request->Paginacion->Num_Intervalo,$p_Request->Paginacion->Num_Seccion);

        return $Rpt;
    }

    public function Get_Detalle_Carga_Stock(int $p_Id_OtrOpeComerciales,int $p_Id_Tienda,int $p_Id_Empresa):ENResponse
    {
        $Rpt = new ENResponse();
        $ADStockmanual = new ADStockmanual();

        $Rpt->Resultado = $ADStockmanual->Get_Detalle_Carga_Stock($p_Id_OtrOpeComerciales,$p_Id_Tienda,$p_Id_Empresa);

        return $Rpt;
    }

    public function Get_Detalle_Carga_Stock_Formateado(int $p_Id_OtrOpeComerciales,int $p_Id_Tienda,int $p_Id_Empresa)
    {
        $l_Rpt = new ENResponse();
        $ADStockmanual = new ADStockmanual();
        $LNGenerico = new LNGenerico();
        $l_OtrOpeComerciales = new ENOtrOpeComerciales(); // Objeto otras operaciones comerciales
        $l_List_Key_Productos = [];
        $l_List_Item_Productos = [];
        $l_Tip_Descuento_Producto = 12; //Tipo de descuento por producto

        $l_OtrOpeComerciales= $ADStockmanual->Get_Detalle_Carga_Stock($p_Id_OtrOpeComerciales,$p_Id_Tienda,$p_Id_Empresa);

        foreach($l_OtrOpeComerciales->List_Json_Item as $Item)
        {
            $l_List_Key_Productos[$Item["Id_Producto"]] = $Item;
        }

        foreach($l_OtrOpeComerciales->List_Item_Productos as $Item)
        {
            $Item->Obj_Data_Jason = $l_List_Key_Productos[$Item->Id_Producto];
            $Item->Des_Precio = $LNGenerico->Establecer_Formato_Moneda((float)$l_List_Key_Productos[$Item->Id_Producto]["Num_Precio"]);
            $Item->Des_TipDescuento = $LNGenerico->Get_Parametros_Sistema($l_Tip_Descuento_Producto,(int)$l_List_Key_Productos[$Item->Id_Producto]["Tip_Descuento"])->Resultado[0]->Des_ParSis_Nom;
            array_push($l_List_Item_Productos,$Item);
        }

        $l_OtrOpeComerciales->List_Item_Productos = $l_List_Item_Productos;

        $l_Rpt->Resultado = $l_OtrOpeComerciales;

        return $l_Rpt;
    }

    public function Get_Formato_Carga_Stock()
    {
        $l_Rpt = new ENResponse();
        $l_LNGenerico = new LNGenerico();
        $l_Parsistema = new ENParsistema();
        $l_FormatoExcel = new ENFormatoExcel();
        $l_Num_Pfij_Formatos_Excel = 24; // Prefijo de formatos de excel
        $l_Num_Corr_Excel_Stock = 1;
        $l_Fecha_Actual = "";

        $l_Rpt = $l_LNGenerico->Get_Parametros_Sistema($l_Num_Pfij_Formatos_Excel,$l_Num_Corr_Excel_Stock);
        if($l_Rpt->Error->flagerror) return $l_Rpt;

        $l_Fecha_Actual = $l_LNGenerico->Get_Fecha_Sistema_String();

        $l_Parsistema = $l_Rpt->Resultado[0];
        $l_FormatoExcel->Des_NombreExcel = $l_Parsistema->Des_ParSis_Tx1 . "_" . $l_Fecha_Actual;
        $l_FormatoExcel->Obj_Cabecera = explode(",",$l_Parsistema->Des_ParSis_Tx3);
        $l_Rpt->Resultado = $l_FormatoExcel;

        return $l_Rpt;
    }

    public function Set_Confirmacion_Stock(int $p_Id_OtrTrxComercial,int $p_Id_Tienda_Destino,string $p_Des_KayTipoCarga,int $p_Id_Usuario,int $p_Id_Empresa
                                           ,int $p_Id_Tienda,string $p_User,string $p_Password)
    {
        $l_Rpt = new ENResponse();
        $l_SEOrquestador = new SEOrquestador();

        $l_ObjData = [];

        $l_ObjData["Id_OtrTrxComercial"] = $p_Id_OtrTrxComercial;
        $l_ObjData["Des_KayTipoCarga"] = $p_Des_KayTipoCarga;
        $l_ObjData["Des_KeyAccion"] = "Confirm";
        $l_ObjData["Id_Tienda_Destino"] = $p_Id_Tienda_Destino;

        $l_Rpt = $l_SEOrquestador->Ejecutar_10_ws_wa_ConfirmarCargaStock($l_ObjData,$p_Id_Usuario,$p_Id_Empresa,$p_Id_Tienda,$p_User,$p_Password);

        return $l_Rpt;
    }

}
?>