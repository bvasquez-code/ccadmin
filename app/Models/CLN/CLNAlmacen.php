<?php namespace App\Models\CLN;

use CodeIgniter\Model;

use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENAutenticacionService as ENAutenticacionService;
use App\Models\CEN\CENParbusqueda as ENParbusqueda;
use App\Models\CEN\CENDataService as ENDataService;
use App\Models\CEN\CENObjFacturacion as ENObjFacturacion;

use App\Models\CLN\CLNConfigsistema as LNConfigsistema;
use App\Models\CLN\CLNGenerico as LNGenerico;
use App\Models\CLN\CLNFacturacion as LNFacturacion;

use App\Models\CSE\CSEOrquestador as SEOrquestador;


class CLNAlmacen extends Model
{
    private ENAutenticacionService $g_Obj_Aut;

    public function __construct( ENAutenticacionService $p_Obj_Aut )
    {
        $this->g_Obj_Aut = $p_Obj_Aut;
    }

    public function Render_index()
    {
        $l_Rpt = new ENResponse();
        $l_Parbusqueda = new ENParbusqueda();//Parametro de busqueda
        $l_LNGenerico = new LNGenerico();
        $l_LNConfigsistema = new LNConfigsistema(); 

        $l_Obj_FechaListado = null;
        $l_List_Documento_Venta = [];
        $l_List_Par_Busqueda = []; //Lista de condiciones de busqueda de parametros
        $l_Key_Time = [];
        $l_Num_Prfj_Menu = 21; //prefijo para menu
        $l_Num_Corr_Fact = 2; //Intervalo de fechas para menu


        $l_Key_Time = $l_LNConfigsistema->Get_Parametros_Sistema_string($l_Num_Prfj_Menu,$l_Num_Corr_Fact,6,null);

        $l_Obj_FechaListado = json_decode(json_encode($l_LNGenerico->Get_Fechas_Filtrado($l_Key_Time)), true);

        $l_Parbusqueda = new ENParbusqueda();
        $l_Parbusqueda->key = "Num_Cfpsis_Sm2";
        $l_Parbusqueda->Val = 1;
        array_push($l_List_Par_Busqueda,$l_Parbusqueda);

        $l_Parbusqueda = new ENParbusqueda();
        $l_Parbusqueda->key = "Num_Cfpsis_Sm1";
        $l_Parbusqueda->Val = 1;
        array_push($l_List_Par_Busqueda,$l_Parbusqueda);
        
        $l_List_Documento_Venta = json_decode(json_encode($l_LNConfigsistema->Get_Parametros_Sistema_object(2,0,"Cod_Cfpsis,Des_Cfpsis_Nom",$l_List_Par_Busqueda)), true);

        $l_Rpt->Resultado = [
            "Obj_FechaListado" => $l_Obj_FechaListado,
            "List_Documento_Venta" => $l_List_Documento_Venta
        ];

        return $l_Rpt;
    }

    public function Render_crear(int $p_Id_Venta)
    {
        $l_Rpt = new ENResponse();
        $l_LNFacturacion = new LNFacturacion();
        $l_DataService = new ENDataService();
        $l_Busqueda = []; //objeto de busqueda
        $l_Obj_Venta = [];
        $l_Obj_Venta_Almacen = [];
        $l_List_Producto = [];
        $l_List_Almacen_Stock = [];


        $l_Busqueda["Tip_VentaDoc"] = 1;
        $l_Busqueda["Id_Venta"] = $p_Id_Venta;

        $l_DataService->Paginacion->Tip_Busqueda = 2;
        $l_DataService->Paginacion->Tip_Listado = 1;
        $l_DataService->Paginacion->Num_Seccion = 1;

        $l_DataService->Busqueda = $l_Busqueda;

        $l_Rpt = $l_LNFacturacion->Get_Venta($l_DataService,$this->g_Obj_Aut);
        $l_Obj_Venta = $l_Rpt->Resultado;


        foreach( $l_Obj_Venta["List_Item_Venta"] as $Item )
        {
            array_push($l_List_Producto,(int)$Item["Id_Producto"]);
        }

        $l_List_Almacen_Stock = $this->Get_AlmacenStock_Producto($l_List_Producto,$this->g_Obj_Aut->Id_Tienda);

        $l_Obj_Venta_Almacen = $this->Cargar_Objeto_Venta_Almacen($l_Obj_Venta,$l_List_Almacen_Stock);

        $l_Rpt = new ENResponse();
        $l_Rpt->Resultado = [
            "Obj_PreVenta" => $l_Obj_Venta_Almacen,
            "List_Almacen_Stock" =>  $l_List_Almacen_Stock
        ];

        return $l_Rpt;
    }


    public function Get_AlmacenStock_Producto(array $p_List_Producto,int $p_Id_Tienda):array
    {
        $l_Rpt = new ENResponse();
        $l_SEOrquestador = new SEOrquestador();
        $l_ObjData = [];

        $l_ObjData["Busqueda"]["Des_KeyOperacion"] = "Get_Stock_Available";
        $l_ObjData["Busqueda"]["Id_Tienda"] = $p_Id_Tienda;
        $l_ObjData["Busqueda"]["List_Producto"] = $p_List_Producto;

        $l_Rpt = $l_SEOrquestador->Ejecutar_22_ws_wa_ListarStockAlmacen($l_ObjData,$this->g_Obj_Aut);

        return $l_Rpt->Resultado["List_Almacen_Stock"];

    }

    public function Cargar_Objeto_Venta_Almacen( array $l_Obj_Venta , array $l_List_Almacen_Stock ):array
    {
        $l_Obj_Venta_Almacen = [];
        $l_Item_Almacen = [];
        $l_List_Item_Venta = [];

        $l_Obj_Venta_Almacen["Id_Venta"] =  $l_Obj_Venta["Id_Venta"]; 
        $l_Obj_Venta_Almacen["Cod_Venta"] =  $l_Obj_Venta["Cod_Venta"];
        $l_Obj_Venta_Almacen["Num_Subtotal"] =  $l_Obj_Venta["Num_Subtotal"]; 
        $l_Obj_Venta_Almacen["Num_Interes"] =  $l_Obj_Venta["Num_Interes"];
        $l_Obj_Venta_Almacen["Num_Descuento"] =  $l_Obj_Venta["Num_Descuento"]; 
        $l_Obj_Venta_Almacen["Num_Total"] =  $l_Obj_Venta["Num_Total"];
        $l_Obj_Venta_Almacen["Num_PagoEfec"] =  $l_Obj_Venta["Num_PagoEfec"];
        $l_Obj_Venta_Almacen["Num_VueltoEfec"] =  $l_Obj_Venta["Num_VueltoEfec"];  
        $l_Obj_Venta_Almacen["Num_PagoTarjeta"] =  $l_Obj_Venta["Num_PagoTarjeta"]; 
        $l_Obj_Venta_Almacen["Des_Subtotal"] = $l_Obj_Venta["Des_Subtotal"];
        $l_Obj_Venta_Almacen["Des_Interes"] =  $l_Obj_Venta["Des_Interes"];  
        $l_Obj_Venta_Almacen["Des_Descuento"] =  $l_Obj_Venta["Des_Descuento"];
        $l_Obj_Venta_Almacen["Des_Total"] =  $l_Obj_Venta["Des_Total"];  
        $l_Obj_Venta_Almacen["Des_PagoEfec"] =  $l_Obj_Venta["Des_PagoEfec"];  
        $l_Obj_Venta_Almacen["Des_VueltoEfec"] =  $l_Obj_Venta["Des_VueltoEfec"];
        $l_Obj_Venta_Almacen["Des_PagoTarjeta"] =  $l_Obj_Venta["Des_PagoTarjeta"];  
        $l_Obj_Venta_Almacen["Tip_Venta"] = $l_Obj_Venta["Tip_Venta"]; 
        $l_Obj_Venta_Almacen["Des_Venta"] =  $l_Obj_Venta["Des_Venta"]; 
        $l_Obj_Venta_Almacen["Tip_Pago"] =  $l_Obj_Venta["Tip_Pago"];  
        $l_Obj_Venta_Almacen["Tip_MedioPago"] =  $l_Obj_Venta["Tip_MedioPago"];  
        $l_Obj_Venta_Almacen["Tip_Moneda"] =  $l_Obj_Venta["Tip_Moneda"];  
        $l_Obj_Venta_Almacen["Des_Moneda"] =  $l_Obj_Venta["Des_Moneda"];  
        $l_Obj_Venta_Almacen["Num_Cambio"] =  $l_Obj_Venta["Num_Cambio"];  
        $l_Obj_Venta_Almacen["Cod_DocCliente"] =  $l_Obj_Venta["Cod_DocCliente"];
        $l_Obj_Venta_Almacen["Des_NomCliente"] =  $l_Obj_Venta["Des_NomCliente"];  
        $l_Obj_Venta_Almacen["Des_DirCliente"] =  $l_Obj_Venta["Des_DirCliente"];  
        $l_Obj_Venta_Almacen["Des_Comentario"] =  $l_Obj_Venta["Des_Comentario"];  
        $l_Obj_Venta_Almacen["Cliente"] =  $l_Obj_Venta["Cliente"];

        foreach( $l_Obj_Venta["List_Item_Venta"] as $Item )
        {
            $l_Item_Almacen["Id_DetalleVenta"] = $Item["Id_DetalleVenta"];
            $l_Item_Almacen["Id_Producto"] = $Item["Id_Producto"];
            $l_Item_Almacen["Cod_Producto"] = $Item["Cod_Producto"];
            $l_Item_Almacen["Des_Producto"] = $Item["Des_Producto"];
            $l_Item_Almacen["Num_Precio"] = $Item["Num_Precio"];
            $l_Item_Almacen["Num_Interes"] = $Item["Num_Interes"];
            $l_Item_Almacen["Num_Descuento"] = $Item["Num_Descuento"];
            $l_Item_Almacen["Num_PrecioVenta"] = $Item["Num_PrecioVenta"];
            $l_Item_Almacen["Num_Cantidad"] = $Item["Num_Cantidad"];
            $l_Item_Almacen["Num_MontoTotal"] = $Item["Num_MontoTotal"];
            $l_Item_Almacen["Des_Precio"] = $Item["Des_Precio"];
            $l_Item_Almacen["Des_Interes"] = $Item["Des_Interes"];
            $l_Item_Almacen["Des_Descuento"] = $Item["Des_Descuento"];
            $l_Item_Almacen["Des_PrecioVenta"] = $Item["Des_PrecioVenta"];
            $l_Item_Almacen["Des_MontoTotal"] = $Item["Des_MontoTotal"];
            $l_Item_Almacen["List_Variaciones"] = $Item["List_Variaciones"];
            
            foreach( $l_List_Almacen_Stock as $Item_Stock )
            {
                if( (int)$Item_Stock["Id_Producto"] == (int)$Item["Id_Producto"] )
                {
                    $l_Item_Almacen["List_Stock_Disponible"] = $this->Escoger_Stock_Producto($Item["Num_Cantidad"],$Item_Stock["List_Stock_Disponible"], $Item["List_Variaciones"]);
                }
            }

            array_push($l_List_Item_Venta,$l_Item_Almacen);
        }

        $l_Obj_Venta_Almacen["List_Item_Venta"]  = $l_List_Item_Venta;

        return $l_Obj_Venta_Almacen;
    }

    public function Escoger_Stock_Producto(int $p_Num_Cantidad_Solicitada, array $p_List_Stock_Disponible,array $p_List_Variaciones_Compradas)
    {
        $l_List_Stock_Disponible = [];
        $l_Item_Stock = [];
        $l_Num_Cantidad_Escogida = 0;

        foreach( $p_List_Stock_Disponible as $Item )
        {
            if( (int)$Item["Num_Stock"] > $p_Num_Cantidad_Solicitada )
            {
                $l_Num_Cantidad_Escogida = $p_Num_Cantidad_Solicitada;
                $p_Num_Cantidad_Solicitada = 0;
            }
            else
            {
                $l_Num_Cantidad_Escogida  = (int)$Item["Num_Stock"];
                $p_Num_Cantidad_Solicitada = $p_Num_Cantidad_Solicitada - (int)$Item["Num_Stock"];
            }
            $l_Item_Stock["Id_Almacen"] = $Item["Id_Almacen"];
            $l_Item_Stock["Des_Almacen"] = $Item["Des_Almacen"];
            $l_Item_Stock["Des_Direccion"] = $Item["Des_Direccion"];
            $l_Item_Stock["Id_Producto"] = $Item["Id_Producto"];
            $l_Item_Stock["Id_StockFisico"] = $Item["Id_StockFisico"];
            $l_Item_Stock["Num_Stock"] = $Item["Num_Stock"];
            $l_Item_Stock["Num_Gerarquia"] = $Item["Num_Gerarquia"];
            $l_Item_Stock["Num_Cantidad_Escogida"] = $l_Num_Cantidad_Escogida;
            $l_Item_Stock["List_StockFisico_Variacion"] =  $this->Escoger_Stock_Producto_Variacion( $p_List_Variaciones_Compradas,$Item["List_StockFisico_Variacion"] );

            array_push($l_List_Stock_Disponible,$l_Item_Stock);
            $l_Num_Cantidad_Escogida = 0;
        }

        return $l_List_Stock_Disponible;
    }

    public function Escoger_Stock_Producto_Variacion(array $p_List_Variaciones_Compradas,array $p_List_StockFisico_Variacion)
    {
        $l_Item_Stock_Var = [];
        $l_List_StockFisico_Variacion = [];
        $l_Num_Cantidad_Escogida = 0;

        foreach( $p_List_StockFisico_Variacion as $Item )
        {
            $l_Item_Stock_Var["Id_VariacionProducto"] = $Item["Id_VariacionProducto"];
            $l_Item_Stock_Var["Des_VariacionProducto"] = $Item["Des_VariacionProducto"];
            $l_Item_Stock_Var["Id_VariacionStockFisico"] = $Item["Id_VariacionStockFisico"];
            $l_Item_Stock_Var["Num_Stock"] = $Item["Num_Stock"];

            foreach( $p_List_Variaciones_Compradas as $Item2 )
            {
                if( (int)$Item2["Id_Variacion"] == (int)$Item["Id_VariacionProducto"] )
                {
                    if( (int)$Item["Num_Stock"] > (int)$Item2["Num_Cantidad"] )
                    {
                        $l_Num_Cantidad_Escogida = (int)$Item2["Num_Cantidad"];
                    }    
                }
            }
            $l_Item_Stock_Var["Num_Cantidad_Escogida"] = $l_Num_Cantidad_Escogida;

            array_push($l_List_StockFisico_Variacion,$l_Item_Stock_Var);

            $l_Num_Cantidad_Escogida = 0;
        }
        return $l_List_StockFisico_Variacion;

    }

    public function Set_Movimiento_Stock_Fisico_Venta( array $l_request_JSON )
    {
        $l_Rpt = new ENResponse();
        $l_SEOrquestador = new SEOrquestador();

        $l_Rpt = $l_SEOrquestador->Ejecutar_23_ws_wa_RegistrarMovimientoStockFisico( $l_request_JSON , $this->g_Obj_Aut );

        return $l_Rpt;
    }

}
?>