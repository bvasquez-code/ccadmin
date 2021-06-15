<?php namespace App\Models\CLN;

use CodeIgniter\Model;

use App\Models\CLN\CLNGenerico as LNGenerico;
use App\Models\CLN\CLNNotificacion as LNNotificacion;
use App\Models\CLN\CLNFacElectronica as LNFacElectronica;

use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENRequestService as ENRequestService;
use App\Models\CEN\CENDataService as ENDataService;
use App\Models\CEN\CENDetallePago as ENDetallePago;
use App\Models\CEN\CENMoneda as ENMoneda;
use App\Models\CEN\CENObjFacturacion as ENObjFacturacion;
use App\Models\CEN\CENParsistema as ENParsistema;
use App\Models\CEN\CENAutenticacionService as ENAutenticacionService;
use App\Models\CEN\CENImpuesto as ENImpuesto;

use App\Models\CSE\CSEOrquestador as SEOrquestador;


class CLNFacturacion extends Model
{

    public function __construct()
    {

    }

    public function Get_Venta(ENDataService $p_DataService,ENAutenticacionService $p_Obj_Autenticacion):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_SEOrquestador = new SEOrquestador();

        $l_Rpt = $l_SEOrquestador->Ejecutar_07_ws_wa_ListarTrxVenta($p_DataService,$p_Obj_Autenticacion->Id_Usuario,$p_Obj_Autenticacion->Id_Empresa,$p_Obj_Autenticacion->Id_Tienda,$p_Obj_Autenticacion->User,$p_Obj_Autenticacion->Password);
        return $l_Rpt;
    }

    public function Get_Talonario_Usuario(int $p_Tip_DocTalonario,int $p_Id_Cajero,int $p_Id_Usuario,int $p_Id_Empresa,int $p_Id_Tienda,string $p_User,string $p_Password)
    {
        $l_Busqueda = [];
        $l_Rpt = new ENResponse();
        $l_DataService = new ENDataService();
        $l_SEOrquestador = new SEOrquestador();

        $l_Busqueda["Des_KeyBusqueda"] = "Search_Checkbook";
        $l_Busqueda["BusquedaTalonario"]["Id_Cajero"] = $p_Id_Cajero;
        $l_Busqueda["BusquedaTalonario"]["Tip_DocTalonario"] = $p_Tip_DocTalonario;

        $l_DataService->Busqueda = $l_Busqueda;
        $l_Rpt = $l_SEOrquestador->Ejecutar_08_ws_wa_ListarElementosVenta($l_DataService,$p_Id_Usuario,$p_Id_Empresa,$p_Id_Tienda,$p_User,$p_Password);
        return $l_Rpt;        
    }

    public function Set_Detalle_Pago(ENDetallePago $p_DetallePago,ENObjFacturacion $p_Obj_Facturacion,ENAutenticacionService $p_Obj_Autenticacion):ENResponse
    {
        $l_LNGenerico = new LNGenerico();
        $l_Rpt = new ENResponse();
        $l_Moneda = new ENMoneda();
        $l_Moneda_Base = new ENMoneda();
        $l_Medio_Pago = new ENParsistema();
        $l_Cod_Type_Half_Payment = 14; //MEDIOS DE PAGO
        $l_Num_Medio_Efectivo = 1; //Medio pago efectivo 

        if($p_Obj_Facturacion->Obj_Pago->Flg_Pagado)
        {
            $l_Rpt->Error->flagerror = true;
            $l_Rpt->Error->messages = "YA NO SE PUEDE INGRESAR NINGUN PAGA MAS.";
            return $l_Rpt;
        }

        $l_Rpt = $l_LNGenerico->Get_Parametros_Sistema($l_Cod_Type_Half_Payment,$p_DetallePago->Tip_MedioPago);
        if($l_Rpt->Error->flagerror) return $l_Rpt;

        $l_Medio_Pago = $l_Rpt->Resultado[0];
        
        $l_Moneda = $l_LNGenerico->Get_Otr_Moneda_Sistema($p_DetallePago->Tip_Moneda)[0];
        $l_Moneda_Base = $l_LNGenerico->Get_Moneda_Base();

        $p_DetallePago->Num_Cambio = $l_Moneda->Num_Cambio;
        $p_DetallePago->Des_MedioPago = $l_Medio_Pago->Des_ParSis_Nom;
        $p_DetallePago->Num_PagoReal = $p_DetallePago->Num_Cambio * $p_DetallePago->Num_Pagado;
        
        $p_Obj_Facturacion->Obj_Pago->Num_TotalPagado = $p_Obj_Facturacion->Obj_Pago->Num_TotalPagado + $p_DetallePago->Num_PagoReal;
        
        if ( $p_Obj_Facturacion->Obj_Pago->Num_TotalPagado >= $p_Obj_Facturacion->Obj_PreVenta["Num_Total"] )
        {
            $p_Obj_Facturacion->Obj_Pago->Flg_Pagado = true;
            $p_DetallePago->Num_Vuelto =  $p_Obj_Facturacion->Obj_Pago->Num_TotalPagado - $p_Obj_Facturacion->Obj_PreVenta["Num_Total"];
            $p_Obj_Facturacion->Obj_Pago->Num_Vuelto = $p_DetallePago->Num_Vuelto;
            $p_Obj_Facturacion->Obj_Pago->Num_PorPagar = 0;
        }
        else
        {
            $p_DetallePago->Num_PorPagar = $p_Obj_Facturacion->Obj_PreVenta["Num_Total"] - $p_Obj_Facturacion->Obj_Pago->Num_TotalPagado;
            $p_Obj_Facturacion->Obj_Pago->Num_PorPagar = $p_Obj_Facturacion->Obj_PreVenta["Num_Total"] - $p_Obj_Facturacion->Obj_Pago->Num_TotalPagado;
        }
        $p_DetallePago->Des_PagoReal = $l_LNGenerico->Establecer_Formato_Moneda($p_DetallePago->Num_PagoReal,$l_Moneda_Base->Des_Key);
        array_push($p_Obj_Facturacion->Obj_Pago->List_Detalle_Venta,$p_DetallePago);

        $l_Rpt = new ENResponse();
        $l_Rpt = $this->Set_Detalle_Pago_Ws($p_Obj_Facturacion->Obj_PreVenta["Id_Venta"],$p_Obj_Facturacion->Obj_PreVenta["Tip_Pago"],$p_DetallePago,$p_Obj_Autenticacion);
        if($l_Rpt->Error->flagerror)
        {
            return $l_Rpt;
        }

        $p_Obj_Facturacion->Obj_Pago->Des_TotalPagado = $l_LNGenerico->Establecer_Formato_Moneda($p_Obj_Facturacion->Obj_Pago->Num_TotalPagado,$l_Moneda_Base->Des_Key);
        $p_Obj_Facturacion->Obj_Pago->Des_Vuelto = $l_LNGenerico->Establecer_Formato_Moneda($p_Obj_Facturacion->Obj_Pago->Num_Vuelto,$l_Moneda_Base->Des_Key);
        $p_Obj_Facturacion->Obj_Pago->Des_PorPagar = $l_LNGenerico->Establecer_Formato_Moneda($p_Obj_Facturacion->Obj_Pago->Num_PorPagar,$l_Moneda_Base->Des_Key);

        $l_Rpt->Resultado = $p_Obj_Facturacion->Obj_Pago;

        return $l_Rpt;
    }

    public function Get_Data_Moneda_Sistema(int $p_Id_Usuario,int $p_Id_Empresa,int $p_Id_Tienda,string $p_User,string $p_Password):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_LNGenerico = new LNGenerico();

        $l_Rpt->Resultado = array( "List_Otr_Moneda" => $l_LNGenerico->Get_Otr_Moneda_Sistema(0) );

        return $l_Rpt;
    }

    public function Get_Busqueda_Pagos(int $p_Id_Venta = 0):ENResponse
    {
        $l_Rpt = new ENResponse();
        return $l_Rpt;
    }

    public function Set_Detalle_Pago_Ws(int $p_Id_Venta,int $p_Tip_Pago,ENDetallePago $p_DetallePago,ENAutenticacionService $p_Obj_Autenticacion):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_SEOrquestador = new SEOrquestador();
        $l_ObjData = [];//Data de WS
        $l_Obj_Pago = [];//Objeto de pago : Detalle

        $l_ObjData["Id_Venta"] = $p_Id_Venta;
        $l_ObjData["List_Pago"] = [];

        $l_Obj_Pago["Id_Pago"] =  $p_DetallePago->Id_Pago;
        $l_Obj_Pago["Tip_Pago"] =  $p_Tip_Pago;
        $l_Obj_Pago["Tip_MedioPago"] =  $p_DetallePago->Tip_MedioPago;
        $l_Obj_Pago["Tip_Moneda"] =  $p_DetallePago->Tip_Moneda;
        $l_Obj_Pago["Num_Cambio"] =  $p_DetallePago->Num_Cambio;
        $l_Obj_Pago["Des_Tarjeta"] =  $p_DetallePago->Des_UltimosDigitos;
        $l_Obj_Pago["Cod_Pago"] =  $p_DetallePago->Cod_ExternoOperacion;
        $l_Obj_Pago["Num_Pago"] =  $p_DetallePago->Num_Pagado;
        $l_Obj_Pago["Num_PagoReal"] =  $p_DetallePago->Num_PagoReal;
        $l_Obj_Pago["Num_Vuelto"] =  $p_DetallePago->Num_Vuelto;
        $l_Obj_Pago["Num_PorPagar"] =  $p_DetallePago->Num_PorPagar;
        array_push($l_ObjData["List_Pago"],$l_Obj_Pago);

        $l_Rpt = $l_SEOrquestador->Ejecutar_12_ws_wa_RegistrarPago($l_ObjData,$p_Obj_Autenticacion);

        return $l_Rpt;
    }

    public function Set_Venta(ENObjFacturacion $p_Obj_Facturacion,int $p_Tip_Documento,int $p_Id_Talonario,ENAutenticacionService $p_Obj_Autenticacion)
    {
        $l_Rpt = new ENResponse();
        $l_ENRequestService = new ENRequestService();
        $l_SEOrquestador = new SEOrquestador();
        $l_LNNotificacion = new LNNotificacion();
        $l_LNFacElectronica = new LNFacElectronica();
        $l_LNGenerico = new LNGenerico();
        $l_Obj_IGV = new ENImpuesto();
        $l_ObjData = null;
        $l_List_Item_Pro = [];
        $l_List_Impuesto = [];

        $l_ENRequestService->ObjAute = $p_Obj_Autenticacion;

        $l_ObjData["Tip_Operacion"] = 2; //Inidica que es venta
        $l_ObjData["Obj_Venta"]["Id_Venta"] = $p_Obj_Facturacion->Obj_PreVenta["Id_Venta"];
        $l_ObjData["Obj_Venta"]["Tip_Documento"] = $p_Tip_Documento;
        $l_ObjData["Obj_Venta"]["Id_Talonario"] = $p_Id_Talonario;

        foreach($p_Obj_Facturacion->Obj_PreVenta["List_Item_Venta"] as $Item)
        {
            $l_Item_Pro["Id_Producto"] =  $Item["Id_Producto"];
            $l_Item_Pro["Num_Precio"] =  $Item["Num_Precio"];
            $l_Item_Pro["Num_Interes"] =  $Item["Num_Interes"];
            $l_Item_Pro["Num_Descuento"] =  $Item["Num_Descuento"];
            $l_Item_Pro["Num_PreVenta"] =  $Item["Num_PrecioVenta"];
            $l_Item_Pro["Num_Cantidad"] =  $Item["Num_Cantidad"];
            $l_Item_Pro["Num_MontoTotal"] =  $Item["Num_MontoTotal"];
            
            array_push($l_List_Item_Pro,$l_Item_Pro);
        }

        $l_ObjData["Obj_Venta"]["Cod_Venta"] = $p_Obj_Facturacion->Obj_PreVenta["Cod_Venta"];
        $l_ObjData["Obj_Venta"]["Tip_Monenda"] = $p_Obj_Facturacion->Obj_PreVenta["Tip_Moneda"];
        $l_ObjData["Obj_Venta"]["Tip_Pago"] = $p_Obj_Facturacion->Obj_PreVenta["Tip_Pago"];
        $l_ObjData["Obj_Venta"]["Tip_MedioPago"] = $p_Obj_Facturacion->Obj_PreVenta["Tip_MedioPago"];
        $l_ObjData["Obj_Venta"]["Num_SubTotalVenta"] = $p_Obj_Facturacion->Obj_PreVenta["Num_Subtotal"];
        $l_ObjData["Obj_Venta"]["Num_Interes"] = $p_Obj_Facturacion->Obj_PreVenta["Num_Interes"];
        $l_ObjData["Obj_Venta"]["Num_Descuento"] = $p_Obj_Facturacion->Obj_PreVenta["Num_Descuento"];
        $l_ObjData["Obj_Venta"]["Num_Total"] = $p_Obj_Facturacion->Obj_PreVenta["Num_Total"];
        $l_ObjData["Obj_Venta"]["Num_ValorCambio"] = $p_Obj_Facturacion->Obj_PreVenta["Num_Cambio"];
        $l_ObjData["Obj_Venta"]["Des_Comentario"] = $p_Obj_Facturacion->Obj_PreVenta["Des_Comentario"];
        if($p_Obj_Facturacion->Obj_PreVenta["Cliente"]!=null)
        {
            $l_ObjData["Obj_Venta"]["Id_Cliente"] = $p_Obj_Facturacion->Obj_PreVenta["Cliente"]["Id_Cliente"];
        }
        
        $l_ObjData["Obj_Venta"]["Tip_DocCliente"] = 1;
        $l_ObjData["Obj_Venta"]["Cod_DocCliente"] = $p_Obj_Facturacion->Obj_PreVenta["Cod_DocCliente"];
        $l_ObjData["Obj_Venta"]["Des_NomCliente"] = $p_Obj_Facturacion->Obj_PreVenta["Des_NomCliente"];
        $l_ObjData["Obj_Venta"]["Des_DirCliente"] = $p_Obj_Facturacion->Obj_PreVenta["Des_DirCliente"];
        $l_ObjData["Obj_Venta"]["Flg_Credito"] = false; //Aun no se ha implementado
        $l_ObjData["Obj_Venta"]["List_Item_Pro"] = $l_List_Item_Pro;
        

        $l_Obj_IGV = $l_LNGenerico->Get_Porcenta_IGV($p_Tip_Documento);

        $l_List_Impuesto = $this->Add_Lista_Impuestos($l_List_Impuesto,$l_Obj_IGV->Num_Tasa,$l_Obj_IGV->Tip_Impuesto);

        $l_ObjData["Obj_Venta"]["List_Impuesto"] = $l_List_Impuesto;

        $l_ENRequestService->ObjData = $l_ObjData;

        // echo json_encode($l_ENRequestService);

        $l_Rpt = $l_SEOrquestador->Ejecutar_04_ws_wa_RegistrarVenta($l_ENRequestService);

        if(!$l_Rpt->Error->flagerror)
        {
            $l_LNNotificacion->Enviar_Notificacion_Venta($p_Obj_Facturacion->Obj_PreVenta,(string)$l_Rpt->Resultado["Cod_Talonario"],$p_Obj_Autenticacion);

            $l_LNFacElectronica->Enviar_Factura_Sunat_Individual(
                $p_Tip_Documento
                ,(int)$l_Rpt->Resultado["Id_InfoVenta"]
                ,(int)$p_Obj_Facturacion->Obj_PreVenta["Id_Venta"]
                ,$p_Obj_Autenticacion
            );
        }
        return $l_Rpt;
    }

    public function Add_Lista_Impuestos(array $p_List_Item_Imp,float $p_Num_Tasa,int $p_Tip_Impuesto):array
    {
        array_push($p_List_Item_Imp,
                    array("Tip_Impuesto" => $p_Tip_Impuesto,"Num_Tasa" => $p_Num_Tasa)
        );
        return $p_List_Item_Imp;
    }

}
?>