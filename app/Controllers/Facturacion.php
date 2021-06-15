<?php namespace App\Controllers;

use Throwable;
use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENDataService as ENDataService;
use App\Models\CEN\CENParbusqueda as ENParbusqueda;
use App\Models\CEN\CENDetallePago as ENDetallePago;
use App\Models\CEN\CENObjFacturacion as ENObjFacturacion;

use App\Models\CLN\CLNConfigsistema as LNConfigsistema;
use App\Models\CLN\CLNGenerico as LNGenerico;
use App\Models\CLN\CLNFacturacion as LNFacturacion;



class Facturacion extends BaseController
{

    public function __construct()
    {

    }

    public function index()
    {
        $l_FrontEnd = [];
        $l_List_Par_Busqueda = []; //Lista de condiciones de busqueda de parametros
        $l_Parbusqueda = new ENParbusqueda();//Parametro de busqueda
        $l_LNGenerico = new LNGenerico();
        $l_LNConfigsistema = new LNConfigsistema();        
        $l_Key_Time = [];
        $l_Flg_Cargado = 0;
        $l_Obj_FechaListado = null;
        $l_Num_Prfj_Menu = 21; //prefijo para menu
        $l_Num_Corr_Fact = 2; //Intervalo de fechas para menu
        $l_List_Documento_Venta = [];

        if($this->session->Obj_Carrito->Flg_Cargado)
        {
            $l_Flg_Cargado = 1;
        }

        $l_Key_Time = $l_LNConfigsistema->Get_Parametros_Sistema_string($l_Num_Prfj_Menu,$l_Num_Corr_Fact,6,null);
        $l_Obj_FechaListado = $l_LNGenerico->Get_Fechas_Filtrado($l_Key_Time);
        $l_Obj_FechaListado = json_decode(json_encode($l_Obj_FechaListado), true);
        $l_Parbusqueda->key = "Num_Cfpsis_Sm2";
        $l_Parbusqueda->Val = 1;
        array_push($l_List_Par_Busqueda,$l_Parbusqueda);
        $l_List_Documento_Venta = $l_LNConfigsistema->Get_Parametros_Sistema_object(2,0,"Cod_Cfpsis,Des_Cfpsis_Nom",$l_List_Par_Busqueda);
        $l_List_Documento_Venta = json_decode(json_encode($l_List_Documento_Venta), true);

        $l_FrontEnd = [
            "Flg_Carrito_Cargado" => $l_Flg_Cargado,
            "Obj_FechaListado" => $l_Obj_FechaListado,
            "List_Documento_Venta" => $l_List_Documento_Venta
        ];       

        return $this->ConstruirMenu('facturacion/listar',$l_FrontEnd);
    }

    public function crear($p_Id_Venta = 0)
    {
        $l_FrontEnd = [];
        $l_Rpt = new ENResponse();
        $l_LNFacturacion = new LNFacturacion();
        $l_DataService = new ENDataService();
        $l_Parbusqueda = null;
        $l_LNConfigsistema = new LNConfigsistema();
        $l_LNGenerico = new LNGenerico(); 
        $l_Busqueda = []; //objeto de busqueda
        $l_Obj_PreVenta = [];
        $l_List_Documento_Venta = [];
        $l_List_Par_Busqueda = [];
        $l_List_Tip_Pago = [];
        $l_List_Tip_MedioPago = [];
        $l_List_Tip_Moneda = [];
        $l_Moneda_Base = [];
        $l_Des_Tip_Pago = "";

        $l_Parbusqueda = new ENParbusqueda();
        $l_Parbusqueda->key = "Num_Cfpsis_Sm2";
        $l_Parbusqueda->Val = 1;
        array_push($l_List_Par_Busqueda,$l_Parbusqueda);

        $l_Parbusqueda = new ENParbusqueda();
        $l_Parbusqueda->key = "Num_Cfpsis_Sm1";
        $l_Parbusqueda->Val = 1;
        array_push($l_List_Par_Busqueda,$l_Parbusqueda);
        
        $l_List_Documento_Venta = $l_LNConfigsistema->Get_Parametros_Sistema_object(2,0,"Cod_Cfpsis,Des_Cfpsis_Nom",$l_List_Par_Busqueda);
        $l_List_Documento_Venta = json_decode(json_encode($l_List_Documento_Venta), true);

        $l_List_Par_Busqueda = [];
        $l_Parbusqueda = new ENParbusqueda();
        $l_Parbusqueda->key = "Flg_Cfpsis_Bo2";
        $l_Parbusqueda->Val = 1;
        array_push($l_List_Par_Busqueda,$l_Parbusqueda);
        
        $l_List_Tip_Moneda = $l_LNConfigsistema->Get_Parametros_Sistema_object(7,0,"Cod_Cfpsis,Des_Cfpsis_Nom,Des_Cfpsis_Abr",$l_List_Par_Busqueda);
        $l_List_Tip_Moneda = json_decode(json_encode($l_List_Tip_Moneda), true);

        $l_Busqueda["Tip_VentaDoc"] = 1;
        $l_Busqueda["Id_Venta"] = $p_Id_Venta;

        $l_DataService->Paginacion->Tip_Busqueda = 2;
        $l_DataService->Paginacion->Tip_Listado = 1;
        $l_DataService->Paginacion->Num_Seccion = 1;

        $l_DataService->Busqueda = $l_Busqueda;

        $l_Rpt = $l_LNFacturacion->Get_Venta($l_DataService,$this->session->get("Obj_AutenticacionService"));

        $l_Obj_PreVenta = $l_Rpt->Resultado;

        $this->session->Obj_Facturacion = new ENObjFacturacion();
        $this->session->Obj_Facturacion->Obj_PreVenta = $l_Obj_PreVenta;//Cargamos la preventa en la session
        $this->session->Obj_Facturacion->Obj_Pago->Set($l_Obj_PreVenta["ObjPago"]);
        // $this->session->Obj_Carrito = $l_Rpt->Resultado;

        // echo json_encode($this->session->Obj_Facturacion);

        $l_List_Tip_Pago = $l_LNConfigsistema->Get_Parametros_Sistema_object(G_const_par_TipPago,$l_Obj_PreVenta["Tip_Pago"],"Cod_Cfpsis,Des_Cfpsis_Nom,Flg_Cfpsis_Bo2");
        $l_List_Tip_Pago = json_decode(json_encode($l_List_Tip_Pago), true);

        $l_Des_Tip_Pago = $l_List_Tip_Pago[0]["Des_ParSis_Nom"];

        $l_List_Tip_MedioPago = $l_LNConfigsistema->Get_Parametros_Sistema_object(G_const_par_TipMedioPago,0,"Cod_Cfpsis,Des_Cfpsis_Nom,Flg_Cfpsis_Bo2");
        $l_List_Tip_MedioPago = json_decode(json_encode($l_List_Tip_MedioPago), true);

        $l_Moneda_Base = $l_LNGenerico->Get_Moneda_Base();
        $l_Moneda_Base = json_decode(json_encode($l_Moneda_Base), true);

        $l_FrontEnd = [
            "Obj_PreVenta" => $l_Obj_PreVenta,
            "List_Documento_Venta" => $l_List_Documento_Venta,
            "Des_Tip_Pago" => $l_Des_Tip_Pago,
            "List_Tip_MedioPago" => $l_List_Tip_MedioPago,
            "List_Tip_Moneda" => $l_List_Tip_Moneda,
            "Moneda_Base" => $l_Moneda_Base
        ];  
        return $this->ConstruirMenu('facturacion/crear',$l_FrontEnd);
    }

    public function Get_Talonario_Usuario()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $l_Rpt = new ENResponse();
        $l_LNFacturacion = new LNFacturacion();
        $l_request = new ENDataService();
        $l_Tip_DocTalonario = 0;

        try
        {
            if(!empty($l_request_JSON["Tip_DocTalonario"])) $l_Tip_DocTalonario = (int)$l_request_JSON["Tip_DocTalonario"];

            $l_Rpt = $l_LNFacturacion->Get_Talonario_Usuario($l_Tip_DocTalonario,(int)$this->session->get("Id_Caja"),(int)$this->session->get("Id_Usuario"),(int)$this->session->get("Id_Empresa"),(int)$this->session->get("Id_Tienda")
                                                                    ,(string)$this->session->get("Des_UsuarioTienda"),(string)$this->session->get("Cod_HashTienda"));
   
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }

        return json_encode($l_Rpt); 
    }

    public function Set_Detalle_Pago()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $l_Rpt = new ENResponse();
        $l_DetallePago = new ENDetallePago();
        $l_LNFacturacion = new LNFacturacion();

        try
        {
            $l_DetallePago->Set($l_request_JSON);
            //Al parecer al enviar un elemento de la session como parametro no pierde su forma al ser un parametro
            $l_Rpt = $l_LNFacturacion->Set_Detalle_Pago($l_DetallePago,$this->session->get("Obj_Facturacion"),$this->session->get("Obj_AutenticacionService"));
            if(!$l_Rpt->Error->flagerror)
            {
                $this->session->Obj_Facturacion->Obj_Pago = $l_Rpt->Resultado;
                $l_Rpt = new ENResponse();
            }            
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }

        return json_encode($l_Rpt); 
    }

    public function Get_Data_Moneda_Sistema()
    {
        $l_Rpt = new ENResponse();
        $l_LNFacturacion = new LNFacturacion();
        $l_Tip_DocTalonario = 0;

        try
        {
            $l_Rpt = $l_LNFacturacion->Get_Data_Moneda_Sistema((int)$this->session->get("Id_Usuario"),(int)$this->session->get("Id_Empresa"),(int)$this->session->get("Id_Tienda")
                                                                    ,(string)$this->session->get("Des_UsuarioTienda"),(string)$this->session->get("Cod_HashTienda"));
   
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }

        return json_encode($l_Rpt); 
    }

    public function Get_Detalle_Pago()
    {
        $l_Rpt = new ENResponse();
        try
        {
            $l_Rpt->Resultado = $this->session->Obj_Facturacion->Obj_Pago;
   
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }

        return json_encode($l_Rpt); 
    }

    public function Set_Venta()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $l_Rpt = new ENResponse();
        $l_LNFacturacion = new LNFacturacion();
        $l_Tip_Documento = 0;
        $l_Id_Talonario = 0;

        try
        {
            $l_Tip_Documento = (int)$l_request_JSON["Tip_Documento"];
            $l_Id_Talonario = (int)$l_request_JSON["Id_Talonario"];
            $l_Rpt = $l_LNFacturacion->Set_Venta($this->session->get("Obj_Facturacion"),$l_Tip_Documento,$l_Id_Talonario,$this->session->get("Obj_AutenticacionService"));           
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }

        return json_encode($l_Rpt);        
    }

    public function Get_Venta()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $l_Rpt = new ENResponse();
        $l_LNFacturacion = new LNFacturacion();
        $l_DataService = new ENDataService();

        try
        {
            $l_DataService->Paginacion->Set($l_request_JSON["Paginacion"]);
            $l_DataService->Busqueda = $l_request_JSON["Busqueda"];

            $l_Rpt = $l_LNFacturacion->Get_Venta($l_DataService,$this->session->get("Obj_AutenticacionService"));           
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }

        return json_encode($l_Rpt);    
    }

    public function ver_obj_venta()
    {

        return json_encode($this->session->get("Obj_Facturacion"));    
    }
}
?>    