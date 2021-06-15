<?php namespace App\Models\CLN;

use CodeIgniter\Model;

use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENAutenticacionService as ENAutenticacionService;
use App\Models\CEN\CENDataService as ENDataService;

use App\Models\CLN\CLNGenerico as LNGenerico;
use App\Models\CLN\CLNProveedor as LNProveedor;

use App\Models\CSE\CSEOrquestador as SEOrquestador;

use App\Models\CAD\CADTrxcuenta as ADTrxcuenta;


class CLNCompra extends Model
{
    private $g_Obj_Aut = null;

    public function __construct(ENAutenticacionService $p_Obj_Aut = null)
    {
        $this->g_Obj_Aut = $p_Obj_Aut;
    }

    public function Render_index()
    {
         $l_Rpt = new ENResponse();
         $l_LNGenerico = new LNGenerico();
         $l_FrontEnd = [];

         $l_Rpt = $l_LNGenerico->Get_List_Tienda($this->g_Obj_Aut->Id_Tienda,$this->g_Obj_Aut->Id_Usuario);
         $l_List_Tienda = json_decode(json_encode($l_Rpt->Resultado), true);

         $l_FrontEnd = [
            "v_List_Tienda" => $l_List_Tienda
       ];

       $l_Rpt->Resultado = $l_FrontEnd;
 
         return $l_Rpt;
    }
 
    public function Render_crear(int $p_Id_Compra)
    {
        $l_Rpt = new ENResponse();
        $l_LNGenerico = new LNGenerico();
        $l_FrontEnd = [];
        $l_List_Tienda = [];
        $l_List_Moneda = [];
        $l_List_Proveedor = [];

        $l_Rpt = $l_LNGenerico->Get_List_Tienda($this->g_Obj_Aut->Id_Tienda,$this->g_Obj_Aut->Id_Usuario);
        $l_List_Tienda = json_decode(json_encode($l_Rpt->Resultado), true);

        $l_List_Moneda = $l_LNGenerico->Get_Otr_Moneda_Sistema(0);
        $l_List_Moneda = json_decode(json_encode($l_List_Moneda), true);

        $l_Rpt = $this->Get_List_Proveedor();
        $l_List_Proveedor = json_decode(json_encode($l_Rpt->Resultado->List_Resultado), true);

        $l_FrontEnd = [
             "v_List_Tienda" => $l_List_Tienda
            ,"v_List_Moneda" => $l_List_Moneda
            ,"v_List_Proveedor" => $l_List_Proveedor
        ];

        $l_Rpt->Resultado = $l_FrontEnd;

        return $l_Rpt;
    }

    public function Render_confirmar(int $p_Id_Compra):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_ADTrxcuenta = new ADTrxcuenta();
        $l_LNGenerico = new LNGenerico();
        $l_Obj_Compra = null;
        $l_List_Cuenta = [];
        $l_Flg_Existe_Cuenta = false;

        $l_Rpt = $this->Get_Detalle_Compra($p_Id_Compra);
        $l_Obj_Compra = json_decode(json_encode($l_Rpt->Resultado), true);

        $l_List_Cuenta = $l_ADTrxcuenta->Get_List_Cuenta((int)$l_Obj_Compra["Id_Tienda"]);
        $l_List_Cuenta = json_decode(json_encode($l_List_Cuenta), true);

        $l_Flg_Existe_Cuenta = ( count($l_List_Cuenta) > 0 ) ? true : false;

        $l_List_Documento_Comercial = $l_LNGenerico->Get_List_Documento_Compra();
        $l_List_Documento_Comercial = json_decode(json_encode($l_List_Documento_Comercial), true);

        $l_FrontEnd = [
             "v_Obj_Compra" => $l_Obj_Compra
            ,"v_Flg_Existe_Cuenta" => $l_Flg_Existe_Cuenta
            ,"v_List_Cuenta" => $l_List_Cuenta
            ,"v_List_Documento_Comercial" => $l_List_Documento_Comercial
        ];

        $l_Rpt->Resultado = $l_FrontEnd;

        return $l_Rpt;
    }

    public function Render_stockfisico(int $p_Id_Compra)
    {
        $l_Rpt = new ENResponse();
        $l_LNGenerico = new LNGenerico();
        $l_FrontEnd = [];
        $l_List_Tienda = []; //Lista de tiendas
        $l_Obj_Compra = []; //Objeto de compra

        $l_Obj_Compra = json_decode(json_encode($this->Get_Detalle_Compra($p_Id_Compra)->Resultado), true);

        $l_List_Tienda = json_decode(json_encode($l_LNGenerico->Get_List_Tienda($l_Obj_Compra["Id_Tienda"],$this->g_Obj_Aut->Id_Usuario,false)->Resultado),true);

        $l_FrontEnd = [
            "v_List_Tienda" => $l_List_Tienda,
            "v_Obj_Compra" => $l_Obj_Compra
       ];

       $l_Rpt->Resultado = $l_FrontEnd;

        return $l_Rpt;
    }

    private function Get_List_Proveedor():ENResponse
    {
        $l_LNProveedor = new LNProveedor($this->g_Obj_Aut);
        $l_DataService = new ENDataService();
        $l_DataService->Paginacion->Num_RegistroIni = 0;
        $l_DataService->Paginacion->Num_Intervalo = 0;

        return $l_LNProveedor->Get_Lista_Proveedor($l_DataService);
    }

    public function Get_Data_General_Crear()
    {
        $l_Rpt = new ENResponse();
        $l_LNGenerico = new LNGenerico();
        $l_Moneda_Base = [];
        $l_List_Moneda = [];

        $l_List_Moneda = $l_LNGenerico->Get_Otr_Moneda_Sistema(0);
        $l_List_Moneda = json_decode(json_encode($l_List_Moneda), true);

        $l_Moneda_Base = $l_LNGenerico->Get_Moneda_Base();
        $l_Moneda_Base = json_decode(json_encode($l_Moneda_Base), true);

        $l_Rpt->Resultado = [
            "List_Moneda" => $l_List_Moneda
           ,"Moneda_Base" => $l_Moneda_Base
       ];
        return $l_Rpt;
    }

    public function Set_Compra($p_Obj_Dta = null):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_SEOrquestador = new SEOrquestador();
        $l_ObjData = [];

        $l_ObjData["Des_KeyOperacion"] = "Set_Buy";
        $l_ObjData["Obj_Compra"] = $p_Obj_Dta;

        $l_Rpt = $l_SEOrquestador->Ejecutar_19_ws_wa_RegistroCompra($l_ObjData,$this->g_Obj_Aut);

        return $l_Rpt;
    }
    public function Set_Confirmar_Compra($p_Obj_Dta = null):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_SEOrquestador = new SEOrquestador();
        $l_ObjData = [];

        $l_ObjData["Des_KeyOperacion"] = "Confirm_Buy";
        $l_ObjData["Obj_Compra"] = $p_Obj_Dta;

        $l_Rpt = $l_SEOrquestador->Ejecutar_19_ws_wa_RegistroCompra($l_ObjData,$this->g_Obj_Aut);

        return $l_Rpt;
    }

    public function Set_Confirmar_Llegada_Stock($p_Obj_Dta = null)
    {
        $l_Rpt = new ENResponse();
        $l_SEOrquestador = new SEOrquestador();
        $l_Obj_Stock_Logico = [];
        $l_Obj_Stock_Fisico = [];

        $l_Obj_Stock_Logico = [
             "Des_KeyOperacion" => "Confirm_Arrival_Stock"
            ,"Obj_Compra" => [
                "Id_Compra" => $p_Obj_Dta["Id_Compra"]
                ,"Id_Tienda" => $p_Obj_Dta["Id_Tienda"]
                ,"Tip_Documento" => $p_Obj_Dta["Tip_Documento"]
            ]
        ];

        $l_Obj_Stock_Fisico = [
            "Des_KeyOperacion" => "Purchase"
            ,"Obj_Compra" => [
                 "Tip_Documento" =>$p_Obj_Dta["Tip_Documento"]
                ,"Id_Compra" =>$p_Obj_Dta["Id_Compra"]
                ,"List_Stock_Fisico" =>$p_Obj_Dta["List_Stock_Fisico"]
            ]
            
        ];

        $l_Rpt = $l_SEOrquestador->Ejecutar_19_ws_wa_RegistroCompra($l_Obj_Stock_Logico,$this->g_Obj_Aut);
        if( $l_Rpt->Error->flagerror == true ) return $l_Rpt;

        $l_Rpt = $l_SEOrquestador->Ejecutar_23_ws_wa_RegistrarMovimientoStockFisico( $l_Obj_Stock_Fisico , $this->g_Obj_Aut );

        return $l_Rpt;       
    }


    public function Get_List_Compra(ENDataService $p_Request):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_SEOrquestador = new SEOrquestador();

        $l_Rpt = $l_SEOrquestador->Ejecutar_21_ws_wa_ListarCompra($p_Request,$this->g_Obj_Aut);

        return $l_Rpt;
    }

    public function Get_Detalle_Compra(int $p_Id_Compra)
    {
        $l_Rpt = new ENResponse();
        $l_SEOrquestador = new SEOrquestador();
        $l_ObjData = [];

        $l_ObjData["Busqueda"]["Des_KeyOperacion"] = "Get_detail";
        $l_ObjData["Busqueda"]["Id_Compra"] = $p_Id_Compra;

        $l_Rpt = $l_SEOrquestador->Ejecutar_21_ws_wa_ListarCompra($l_ObjData,$this->g_Obj_Aut);

        return $l_Rpt;
    }


}
