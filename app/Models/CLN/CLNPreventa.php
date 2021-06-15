<?php namespace App\Models\CLN;

use CodeIgniter\Model;


use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENRequestService as ENRequestService;
use App\Models\CEN\CENDataService as ENDataService;
use App\Models\CEN\CENSearchventa as ENSearchventa;
use App\Models\CEN\CENAccionesCarrito as ENAccionesCarrito;
use App\Models\CEN\CENAutenticacionService as ENAutenticacionService;


use App\Models\CSE\CSEOrquestador as SEOrquestador;
use App\Models\CEN\CENCarrito as ENCarrito;
use App\Models\CEN\CENItemproducto as ENItemproducto;
use App\Models\CEN\CENPromocion as ENPromocion;
use App\Models\CEN\CENImpuesto as ENImpuesto;

use App\Models\CLN\CLNGenerico as LNGenerico;
use App\Models\CLN\CLNCategoriaproducto as LNCategoriaproducto;
use App\Models\CLN\CLNMarcaproducto as LNMarcaproducto;
use App\Models\CLN\CLNConfigsistema as LNConfigsistema;
use App\Models\CLN\CLNAlmacen as LNAlmacen;

use App\Models\CAD\CADConfigsistema as ADConfigsistema;

class CLNPreventa extends Model
{

    public function __construct()
    {

    }

    public function Render_index(bool $p_Flg_Cargado):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_LNGenerico = new LNGenerico();
        $l_LNConfigsistema = new LNConfigsistema();
        $l_FrontEnd = [];
        $l_Key_Time = [];
        $l_Flg_Cargado = 0;
        $l_Obj_FechaListado = null;

        if($p_Flg_Cargado)
        {
            $l_Flg_Cargado = 1;
        }

        $l_Key_Time = $l_LNConfigsistema->Get_Parametros_Sistema_string(21,1,6,null);
        $l_Obj_FechaListado = $l_LNGenerico->Get_Fechas_Filtrado($l_Key_Time);
        $l_Obj_FechaListado = json_decode(json_encode($l_Obj_FechaListado), true);

        $l_FrontEnd = [
            "Flg_Carrito_Cargado" => $l_Flg_Cargado,
            "Obj_FechaListado" => $l_Obj_FechaListado
        ];

        $l_Rpt->Resultado = $l_FrontEnd;

        return $l_Rpt; 
    }

    public function Render_crear():ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_LNConfigsistema = new LNConfigsistema();
        $l_LNGenerico = new LNGenerico();
        $l_FrontEnd = [];
        $l_List_Tip_Documento = null; //Lista tipos de moneda
        $l_List_Tip_Pago = null;
        $l_List_Tip_MedioPago = null;
        $l_List_Tip_Persona = null;
        $l_Flg_Peru = true;
        
        $l_List_Tip_Documento = $l_LNConfigsistema->Get_Parametros_Sistema_object(G_const_par_TipDocumento,0,"Cod_Cfpsis,Des_Cfpsis_Nom,Flg_Cfpsis_Bo3");
        $l_List_Tip_Documento = json_decode(json_encode($l_List_Tip_Documento), true);

        $l_List_Tip_Pago = $l_LNConfigsistema->Get_Parametros_Sistema_object(G_const_par_TipPago,0,"Cod_Cfpsis,Des_Cfpsis_Nom,Flg_Cfpsis_Bo2");
        $l_List_Tip_Pago = json_decode(json_encode($l_List_Tip_Pago), true);

        $l_List_Tip_MedioPago = $l_LNConfigsistema->Get_Parametros_Sistema_object(G_const_par_TipMedioPago,0,"Cod_Cfpsis,Des_Cfpsis_Nom,Flg_Cfpsis_Bo2");
        $l_List_Tip_MedioPago = json_decode(json_encode($l_List_Tip_MedioPago), true);

        $l_List_Tip_Persona = $l_LNConfigsistema->Get_Parametros_Sistema_object(G_const_par_TipPersona,0,"Cod_Cfpsis,Des_Cfpsis_Nom,Flg_Cfpsis_Bo1");
        $l_List_Tip_Persona = json_decode(json_encode($l_List_Tip_Persona), true);

        $l_FrontEnd = [
            "List_Tip_Documento" => $l_List_Tip_Documento,
            "List_Tip_Pago" => $l_List_Tip_Pago,
            "List_Tip_MedioPago"=>$l_List_Tip_MedioPago,
            "List_Tip_Persona"=>$l_List_Tip_Persona,
            "Flg_Peru" => $l_Flg_Peru
        ];
        $l_Rpt->Resultado = $l_FrontEnd;

        return $l_Rpt;   
    }

    public function Render_search(array $p_SERVER,ENAutenticacionService $p_Obj_Aut):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_FrontEnd = []; //Data para el FrontEnd
        $l_ENSearchventa = new ENSearchventa();
        $l_Array_Busqueda = [];
        $l_ENDataService = new ENDataService();        
        $l_LNCategoriaproducto = new LNCategoriaproducto();
        $l_LNMarcaproducto = new LNMarcaproducto();
        $l_LNGenerico = new LNGenerico();
        $l_List_Carrito_Compra = [];
        $l_Result_Busqueda = [];
        $l_List_Tienda = [];

        $l_Busqueda = null; //Busqueda en el web Service

        $l_List_Categoria = []; //Lista de categorias
        $l_List_Marca = []; //Lista de marcas

        if(!empty($p_SERVER['REDIRECT_QUERY_STRING']))
        {
            $l_Des_Query_Url = "?".$p_SERVER['REDIRECT_QUERY_STRING'];
            $l_Array_Query_Url =  parse_url($l_Des_Query_Url);
            parse_str($l_Array_Query_Url['query'], $l_Array_Busqueda);
            $l_ENSearchventa->Set($l_Array_Busqueda);
        }else
        {
            $l_ENSearchventa->page = 1;
        }       

        $l_ENDataService->Paginacion->Num_Seccion = 1;
        $l_ENDataService->Paginacion->Tip_Busqueda = 2;
        $l_ENDataService->Paginacion->Tip_Listado = 4;
        $l_Busqueda["Busqueda_CategoriaProducto"]["Tip_CategoriaPro_Pdr"] = 2;
        $l_ENDataService->Busqueda = $l_Busqueda;

        $l_ENResponse = $l_LNCategoriaproducto->Get_Categoria_Producto(
             $l_ENDataService
            ,$p_Obj_Aut->Id_Usuario
            ,$p_Obj_Aut->Id_Empresa
            ,$p_Obj_Aut->Id_Tienda
            ,$p_Obj_Aut->User
            ,$p_Obj_Aut->Password
        );
        
        if( count($l_ENResponse->Resultado["List_Resultado"])>0 )
        {
            $l_List_Categoria = $l_ENResponse->Resultado["List_Resultado"];
        }

        $l_ENDataService->Paginacion->Num_Seccion = 1;
        $l_ENDataService->Paginacion->Tip_Busqueda = 3; //Obtener marca producto
        $l_ENDataService->Paginacion->Tip_Listado = 4;
        $l_ENDataService->Busqueda = $l_Busqueda;

        $l_ENResponse = $l_LNMarcaproducto->Get_Marca_Producto(
             $l_ENDataService
            ,$p_Obj_Aut->Id_Usuario
            ,$p_Obj_Aut->Id_Empresa
            ,$p_Obj_Aut->Id_Tienda
            ,$p_Obj_Aut->User
            ,$p_Obj_Aut->Password
        );
        
        if( count($l_ENResponse->Resultado["List_Resultado"])>0 )
        {
            $l_List_Marca = $l_ENResponse->Resultado["List_Resultado"];
        }
        
        $l_ENResponse = $this->Get_Producto_Avanzado(
            $l_ENSearchventa
            ,$p_Obj_Aut
        );
        
        $l_Result_Busqueda = $l_ENResponse->Resultado;

        $l_List_Tienda = json_decode(json_encode($l_LNGenerico->Get_List_Tienda($p_Obj_Aut->Id_Tienda,$p_Obj_Aut->Id_Usuario,true)->Resultado), true);
        
        $l_FrontEnd = [
            "List_Categoria" => $l_List_Categoria,
            "List_Marca" => $l_List_Marca,
            "List_Carrito_Compra" =>$l_List_Carrito_Compra,
            "Array_Searchventa"=>json_decode(json_encode($l_ENSearchventa), true),
            "Result_Busqueda" => $l_Result_Busqueda,
            "v_Id_Tienda" => $p_Obj_Aut->Id_Tienda,
            "v_List_Tienda" => $l_List_Tienda
        ];

        $l_Rpt->Resultado = $l_FrontEnd;

        return $l_Rpt;
    }

    public function Render_Producto(int $p_Id_Producto,ENAutenticacionService $p_Obj_Aut)
    {
        $l_Rpt = new ENResponse();
        $l_LNAlmacen = new LNAlmacen($p_Obj_Aut);
        $l_FrontEnd = [];
        $l_Obj_Producto = [];
        $l_List_Promo = [];
        $l_SEOrquestador = new SEOrquestador();
        $l_List_Producto = [];
        $l_Producto = [];
        $l_ObjData = [];
        $l_List_Producto_Almacen = [];
        $l_List_Almacen_Stock = [];

        $l_Rpt = $this->Get_Producto_Detalle($p_Id_Producto,$p_Obj_Aut->Id_Usuario,$p_Obj_Aut->Id_Empresa,$p_Obj_Aut->Id_Tienda,$p_Obj_Aut->User,$p_Obj_Aut->Password);

        if($l_Rpt->Error->flagerror) return $l_Rpt;
        $l_Obj_Producto = $l_Rpt->Resultado;

        $l_Producto["Id_Producto"] = $p_Id_Producto;
        array_push($l_List_Producto,$l_Producto);
        
        $l_ObjData["Busqueda"]["Des_KeyBusqueda"] = "Search_Recommendation";
        $l_ObjData["List_Producto"] = $l_List_Producto;

        $l_Rpt = $l_SEOrquestador->Ejecutar_14_ws_wa_BuscarPromo($l_ObjData,$p_Obj_Aut);
        $l_List_Promocion = $l_Rpt->Resultado["List_Promocion"];

        array_push($l_List_Producto_Almacen,$p_Id_Producto);
        $l_List_Almacen_Stock = $l_LNAlmacen->Get_AlmacenStock_Producto($l_List_Producto_Almacen,$p_Obj_Aut->Id_Tienda);

        $l_FrontEnd = [
            "v_Obj_Producto" => $l_Obj_Producto,
            "v_List_Promocion" => $l_List_Promocion
        ];

        $l_Rpt->Resultado = $l_FrontEnd;
        return $l_Rpt;
    }

    public function Get_Producto_Avanzado(ENSearchventa $p_BusquedaProducto,ENAutenticacionService $p_Obj_Aut):ENResponse
    {
        $l_Rpt = new ENResponse;
        $l_ENRequestService = new ENRequestService;
        $l_SEOrquestador = new SEOrquestador;        
        $l_DataService = new ENDataService(); 

        $l_DataService->Paginacion->Num_Seccion = $p_BusquedaProducto->page;
        $l_DataService->Paginacion->Tip_Busqueda = 1; //Buscar lista de productos
        $l_DataService->Paginacion->Tip_Listado = 2; //Parametro para limitar la busqueda

        $l_DataService->Busqueda["Cod_Producto"] = "";
        $l_DataService->Busqueda["Id_Marca"] = $p_BusquedaProducto->brand;
        $l_DataService->Busqueda["Id_Categoria"] = $p_BusquedaProducto->category;
        $l_DataService->Busqueda["Des_Producto_Bus"] = $p_BusquedaProducto->search;
        $l_DataService->Busqueda["Num_Precio_Min"] = 0;
        $l_DataService->Busqueda["Num_Precio_Max"] = 0;
        $l_DataService->Busqueda["Flg_Producto_Stock"] = false;
        $l_DataService->Busqueda["Flg_Producto_Web"] = false;
        $l_DataService->Busqueda["Tip_Ordenamiento"] = 5;     

        $l_ENRequestService->ObjAute = $p_Obj_Aut;
        $l_ENRequestService->ObjData = $l_DataService;

        $l_Rpt = $l_SEOrquestador->Ejecutar_03_ws_wa_ListarProductos($l_ENRequestService);

        return $l_Rpt;
    }

    public function Get_Producto_Detalle(int $p_Id_Producto,int $p_Id_Usuario,int $p_Id_Empresa,int $p_Id_Tienda,string $p_User,string $p_Password):ENResponse
    {
        $l_Rpt = new ENResponse;
        $l_ENRequestService = new ENRequestService;
        $l_SEOrquestador = new SEOrquestador;        
        $l_DataService = new ENDataService(); 

        $l_DataService->Paginacion->Tip_Busqueda = 2; //Buscar lista de productos
        $l_DataService->Paginacion->Tip_Listado = 3; //Parametro para limitar la busqueda

        $l_DataService->Busqueda["Id_Producto"] = $p_Id_Producto;     

        $l_ENRequestService->ObjAute->User = $p_User;
        $l_ENRequestService->ObjAute->Password = $p_Password;
        $l_ENRequestService->ObjAute->Id_Usuario = $p_Id_Usuario;
        $l_ENRequestService->ObjAute->Id_Empresa = $p_Id_Empresa; 
        $l_ENRequestService->ObjAute->Id_Tienda = $p_Id_Tienda; 
        $l_ENRequestService->ObjData = $l_DataService;

        $l_Rpt = $l_SEOrquestador->Ejecutar_03_ws_wa_ListarProductos($l_ENRequestService);

        return $l_Rpt;
    }

    public function Establecer_Formato_Moneda(float $p_Num_Val,string $p_Des_Moneda_Avr = "PEN"):string
    {

        $l_Des_Numero_Moneda = "";

        $l_Des_Numero_Moneda = trim($p_Des_Moneda_Avr) ." ". number_format($p_Num_Val,2);

        return $l_Des_Numero_Moneda;
    }

    public function Set_Preventa(ENCarrito $p_Obj_Carrito,string $p_Des_Comentario,ENAutenticacionService $p_ObjAute):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_ENRequestService = new ENRequestService();
        $l_SEOrquestador = new SEOrquestador();
        $l_ObjData = null;
        $l_List_Item_Pro = [];  //Lista de productos
        $l_Item_Pro = null;
        $l_List_Variaciones = [];

        $l_ENRequestService->ObjAute = $p_ObjAute;            

        if ( $p_Obj_Carrito->Cliente->Tip_Persona != 0 )
        {

            $l_ObjData["Cliente"] = $p_Obj_Carrito->Cliente;

            $l_Rpt = $l_SEOrquestador->Ejecutar_06_ws_wa_RegistrarCliente(
                $l_ObjData
                ,$p_ObjAute->Id_Usuario
                ,$p_ObjAute->Id_Empresa
                ,$p_ObjAute->Id_Tienda
                ,$p_ObjAute->User
                ,$p_ObjAute->Password);

            if ( !$l_Rpt->Error->flagerror )
            {
                if ( (int)$l_Rpt->Resultado != 0 && $l_Rpt->Resultado != null  )
                {
                    $p_Obj_Carrito->Id_Cliente = (int)$l_Rpt->Resultado["Id_Cliente"];
                }
            }
            
        }
        $l_ObjData = null;
        $l_Rpt = new ENResponse();

        $p_Obj_Carrito->Des_Comentario = $p_Des_Comentario;
        
        $l_ObjData["Tip_Operacion"] = 1; //Inidica que es preventa

        $l_ObjData["Obj_Venta"]["Id_Venta"] = $p_Obj_Carrito->Id_Venta;
        $l_ObjData["Obj_Venta"]["Cod_Venta"] = $p_Obj_Carrito->Cod_Venta;
        $l_ObjData["Obj_Venta"]["Tip_Documento"] = $p_Obj_Carrito->Tip_Documento;
        $l_ObjData["Obj_Venta"]["Tip_Monenda"] = $p_Obj_Carrito->Tip_Monenda;
        $l_ObjData["Obj_Venta"]["Tip_Pago"] = $p_Obj_Carrito->Tip_Pago;
        $l_ObjData["Obj_Venta"]["Tip_MedioPago"] = $p_Obj_Carrito->Tip_MedioPago;
        $l_ObjData["Obj_Venta"]["Cod_Documento"] = $p_Obj_Carrito->Cod_Documento;
        $l_ObjData["Obj_Venta"]["Cod_Talonario"] = $p_Obj_Carrito->Cod_Talonario;
        $l_ObjData["Obj_Venta"]["Num_SubTotalVenta"] = $p_Obj_Carrito->Num_SubTotalVenta;
        $l_ObjData["Obj_Venta"]["Num_ImpuestoTotal"] = $p_Obj_Carrito->Num_Interes;
        $l_ObjData["Obj_Venta"]["Num_Descuento"] = $p_Obj_Carrito->Num_Descuento;
        $l_ObjData["Obj_Venta"]["Num_Total"] = $p_Obj_Carrito->Num_Total;
        $l_ObjData["Obj_Venta"]["Num_ValorCambio"] = $p_Obj_Carrito->Num_ValorCambio;
        $l_ObjData["Obj_Venta"]["Des_Comentario"] = $p_Obj_Carrito->Des_Comentario;

        if( $p_Obj_Carrito->Id_Cliente === 0 || $p_Obj_Carrito->Id_Cliente === null )
        {
            $l_ObjData["Obj_Venta"]["Tip_DocCliente"] = $p_Obj_Carrito->Cliente->Tip_Persona;
            $l_ObjData["Obj_Venta"]["Cod_DocCliente"] = $p_Obj_Carrito->Cliente->PersonaNatural->Cod_Documento;
            $l_ObjData["Obj_Venta"]["Des_NomCliente"] = $p_Obj_Carrito->Cliente->PersonaNatural->Des_Nombres;
            $l_ObjData["Obj_Venta"]["Des_ApeClientePat"] = $p_Obj_Carrito->Cliente->PersonaNatural->Des_ApePaterno;
            $l_ObjData["Obj_Venta"]["Des_ApeClienteMat"] = $p_Obj_Carrito->Cliente->PersonaNatural->Des_ApeMaterno;
            $l_ObjData["Obj_Venta"]["Des_DirCliente"] = $p_Obj_Carrito->Cliente->PersonaNatural->Des_Direccion;
        }
        else
        {
            $l_ObjData["Obj_Venta"]["Id_Cliente"] = $p_Obj_Carrito->Id_Cliente;
        }
         
        $l_ObjData["Obj_Venta"]["Flg_Credito"] = $p_Obj_Carrito->Flg_Credito;

        foreach($p_Obj_Carrito->List_Item_Pro as $Item)
        {
            $l_Item_Pro["Id_Producto"] =  $Item->Id_Producto;
            $l_Item_Pro["Num_Precio"] =  $Item->Num_Precio;
            $l_Item_Pro["Num_Interes"] =  $Item->Num_Interes;
            $l_Item_Pro["Num_Descuento"] =  $Item->Num_Descuento;
            $l_Item_Pro["Flg_Descuento"] =  $Item->Flg_Descuento;
            $l_Item_Pro["Num_DescPermitido"] =  $Item->Num_DescPermitido;
            $l_Item_Pro["Num_DescuentoTotal"] =  $Item->Num_DescuentoTotal;
            $l_Item_Pro["Num_PreVenta"] =  $Item->Num_PreVenta;
            $l_Item_Pro["Num_Cantidad"] =  $Item->Num_Cantidad;
            $l_Item_Pro["Num_MontoTotal"] =  $Item->Num_MontoTotal;

            foreach( $Item->List_Variaciones as $Item_Var )
            {
                if( $Item_Var->Num_Cantidad > 0  )
                {
                    array_push($l_List_Variaciones,$Item_Var);
                }
            }
            $l_Item_Pro["List_Variaciones"] = $l_List_Variaciones;
            
            array_push($l_List_Item_Pro,$l_Item_Pro);
            $l_List_Variaciones = [];
        }

        $l_ObjData["Obj_Venta"]["List_Item_Pro"] = $l_List_Item_Pro;
        $l_ObjData["Obj_Venta"]["List_Impuesto"] = [];

        $l_ENRequestService->ObjData = $l_ObjData;

        $l_Rpt = $l_SEOrquestador->Ejecutar_04_ws_wa_RegistrarVenta($l_ENRequestService);

        return $l_Rpt;
    }

    public function Get_PreVenta(ENDataService $p_DataService,int $p_Id_Usuario,int $p_Id_Empresa,int $p_Id_Tienda,string $p_User,string $p_Password)
    {
        $l_Rpt = new ENResponse();
        $l_SEOrquestador = new SEOrquestador();

        $l_Rpt = $l_SEOrquestador->Ejecutar_07_ws_wa_ListarTrxVenta($p_DataService,$p_Id_Usuario,$p_Id_Empresa,$p_Id_Tienda,$p_User,$p_Password);

        return $l_Rpt;
    }

    public function Delete_Producto_Carrito(ENCarrito $p_Obj_Carrito,string $p_Cod_Accion)
    {
        if( $p_Cod_Accion == "DeleteItemCar" )
        {
            $p_Obj_Carrito->List_Item_Pro = [];
            $p_Obj_Carrito->Flg_Cargado = false;
            $p_Obj_Carrito->Flg_EnProceso = true;
        }
        if( $p_Cod_Accion == "DeleteAllCar" )
        {
            $p_Obj_Carrito = new ENCarrito();
        }

        return $p_Obj_Carrito;
    }

    public function Get_Recuperar_Preventa(ENDataService $p_DataService,int $p_Id_Usuario,int $p_Id_Empresa,int $p_Id_Tienda,string $p_User,string $p_Password)
    {
        $l_Producto = null;
        $l_Obj_Service = null;
        $l_Rpt = new ENResponse();
        $l_Rpt_Validacion = new ENResponse();
        $l_SEOrquestador = new SEOrquestador();
        $l_Item_Carrito = new ENItemproducto();
        $l_Obj_Carrito = new ENCarrito();
        $l_List_Mensajes = [];
        $l_List_Mensajes_Error = [];
        $l_Flg_Error_Detectado = false;

        $l_Rpt = $l_SEOrquestador->Ejecutar_07_ws_wa_ListarTrxVenta($p_DataService,$p_Id_Usuario,$p_Id_Empresa,$p_Id_Tienda,$p_User,$p_Password);

        if($l_Rpt->Error->flagerror) return $l_Rpt;
        $l_Obj_Service = $l_Rpt->Resultado;

        $l_Obj_Carrito->Flg_Cargado = true;
        $l_Obj_Carrito->Flg_EnProceso = true;
        $l_Obj_Carrito->Id_Venta = $l_Obj_Service["Id_Venta"];
        $l_Obj_Carrito->Cod_Venta = $l_Obj_Service["Cod_Venta"];

        $l_Obj_Carrito->Tip_Documento = $l_Obj_Service["Tip_Venta"];		    // Tipo de documento de venta
        $l_Obj_Carrito->Tip_Monenda = $l_Obj_Service["Tip_Moneda"];		    // Tipo de moneda de venta
        $l_Obj_Carrito->Num_ValorCambio = $l_Obj_Service["Num_Cambio"];		// Valor de cambio de la moneda
        $l_Obj_Carrito->Tip_Pago = $l_Obj_Service["Tip_Pago"];		        // Tipo Pago
        $l_Obj_Carrito->Tip_MedioPago = $l_Obj_Service["Tip_MedioPago"];          // Tipo de medio de pago
        // $l_Obj_Carrito->Cod_Documento = $l_Obj_Service["Id_Venta"];		    // Cod de documento de venta
        // $l_Obj_Carrito->Cod_Talonario = $l_Obj_Service["Id_Venta"];		    // Numero de talonario
        $l_Obj_Carrito->Num_SubTotalVenta = $l_Obj_Service["Num_Subtotal"];		// Sub total de venta
        $l_Obj_Carrito->Num_Interes = $l_Obj_Service["Num_Interes"];		    // Interes de venta
        $l_Obj_Carrito->Num_Descuento = $l_Obj_Service["Num_Descuento"];		    // Descuento de venta
        $l_Obj_Carrito->Num_Total = $l_Obj_Service["Num_Total"];		        // Total de venta
        $l_Obj_Carrito->Des_SubTotalVenta = $l_Obj_Service["Des_Subtotal"];		// Sub total de venta
        $l_Obj_Carrito->Des_Interes = $l_Obj_Service["Des_Interes"];		    // Interes de venta
        $l_Obj_Carrito->Des_Descuento = $l_Obj_Service["Des_Descuento"];		    // Descuento de venta
        $l_Obj_Carrito->Des_Total = $l_Obj_Service["Des_Total"];		        // Total de venta 	
        $l_Obj_Carrito->Des_Comentario = $l_Obj_Service["Des_Comentario"];		// Comentario sobre la venta

        if ( $l_Obj_Service["Cliente"] != null )
        {
            $l_Obj_Carrito->Id_Cliente = $l_Obj_Service["Cliente"]["Id_Cliente"];
            $l_Obj_Carrito->Tip_DocCliente = $l_Obj_Service["Cliente"]["PersonaNatural"]["Tip_Documento"];
            $l_Obj_Carrito->Cod_DocCliente = $l_Obj_Service["Cliente"]["PersonaNatural"]["Cod_Documento"]; 
            $l_Obj_Carrito->Des_NomCliente = $l_Obj_Service["Cliente"]["PersonaNatural"]["Des_Nombre"];
            $l_Obj_Carrito->Des_ApeClientePat = $l_Obj_Service["Cliente"]["PersonaNatural"]["Des_ApePaterno"];
            $l_Obj_Carrito->Des_ApeClienteMat = $l_Obj_Service["Cliente"]["PersonaNatural"]["Des_ApeMaterno"];				
            $l_Obj_Carrito->Des_DirCliente = $l_Obj_Service["Cliente"]["PersonaNatural"]["Des_Dirrecion"];
            // $l_Obj_Carrito->Flg_Credito = $l_Obj_Service["Id_Venta"];            // Flag venta al credito
        }
        else
        {
            $l_Obj_Carrito->Id_Cliente = null;
            $l_Obj_Carrito->Tip_DocCliente = 0;
            $l_Obj_Carrito->Cod_DocCliente = $l_Obj_Service["Cod_DocCliente"];
            $l_Obj_Carrito = $this->Establecer_Formato_Nombre($l_Obj_Service["Des_NomCliente"],$l_Obj_Carrito);
            $l_Obj_Carrito->Des_DirCliente = $l_Obj_Service["Des_DirCliente"];          
        }

        foreach($l_Obj_Service["List_Item_Venta"] as $elem)
        {
            $l_Item_Carrito = new ENItemproducto();

            $l_Item_Carrito->Id_Producto = $elem["Id_Producto"];

            $l_Rpt = $this->Get_Producto_Detalle($l_Item_Carrito->Id_Producto,$p_Id_Usuario,$p_Id_Empresa,$p_Id_Tienda,$p_User,$p_Password); 
            if(!$l_Rpt->Error->flagerror)$l_Producto = $l_Rpt->Resultado;

            $l_Rpt_Validacion = $this->Validar_Item_Recuperado_Stock($elem,$l_Producto);
            if( $l_Rpt_Validacion->Error->flagerror )
            {
                array_push($l_List_Mensajes_Error,$l_Rpt_Validacion->Error->messages);
                $l_Flg_Error_Detectado = true;
            } 

            array_push($l_List_Mensajes,"(" . $elem["Cod_Producto"] . ") " . $elem["Des_Producto"] . " : " . $elem["Num_Cantidad"] . " UNIDADES ");

            $l_Item_Carrito->Cod_Producto = $elem["Cod_Producto"];
            $l_Item_Carrito->Des_Producto = $elem["Des_Producto"];
            $l_Item_Carrito->Des_Producto_text = $l_Producto["Des_CategPro_Nom"] . "  (" . $l_Producto["Des_MarcaPro_Nom"] . ")";
            $l_Item_Carrito->Num_Precio = $l_Producto["Num_Producto_Precio"];		        
            $l_Item_Carrito->Des_Precio = $elem["Des_Precio"];		    
            $l_Item_Carrito->Num_Interes = $elem["Num_Interes"];
            $l_Item_Carrito->Des_Interes = $elem["Des_Interes"];		 
            $l_Item_Carrito->Num_Descuento = $elem["Num_Descuento"];     
            $l_Item_Carrito->Des_Descuento = ( $l_Item_Carrito->Num_Descuento == 0 ) ? "" : $elem["Des_Descuento"];
            $l_Item_Carrito->Num_Cantidad = $elem["Num_Cantidad"];
            $l_Item_Carrito->Num_Stock_Disp =  $l_Producto["Num_Producto_StockAct"];
            $l_Item_Carrito->Flg_Descuento = $l_Producto["Flg_Producto_Desc"]; 		         
            $l_Item_Carrito->Num_DescPermitido = $l_Producto["Num_Producto_DescReal"];		
            $l_Item_Carrito->Num_DescuentoTotal = $l_Item_Carrito->Num_Descuento * $l_Item_Carrito->Num_Cantidad;
            $l_Item_Carrito->Des_DescuentoTotal = ( $l_Item_Carrito->Num_DescuentoTotal == 0 ) ? "" : $this->Establecer_Formato_Moneda($l_Item_Carrito->Num_DescuentoTotal,$l_Obj_Service["Des_Moneda"]);			
            $l_Item_Carrito->Num_PreVenta = $elem["Num_PrecioVenta"];		    		    
            $l_Item_Carrito->Num_MontoTotal = $elem["Num_MontoTotal"];  	    
            $l_Item_Carrito->Des_MontoTotal = $elem["Des_MontoTotal"];  	    
            $l_Item_Carrito->Des_Moneda_Avr = $l_Obj_Service["Des_Moneda"];
            $l_Item_Carrito->List_Variaciones =  $l_Item_Carrito->SetListClass($l_Producto["List_Variaciones"],"List_Variaciones");

            for( $i = 0 ; count($l_Item_Carrito->List_Variaciones) > $i ; $i ++ )
            {
                foreach( $elem["List_Variaciones"]  as $Item_Var_Vendido)
                {
                    if($l_Item_Carrito->List_Variaciones[$i]->Id_Variacion === (int)$Item_Var_Vendido["Id_Variacion"])
                    {
                        $l_Item_Carrito->List_Variaciones[$i]->Num_Cantidad = (int)$Item_Var_Vendido["Num_Cantidad"];
                        break; 
                    }
                }
            }
            
            $l_Obj_Carrito->List_Item_Pro[$l_Item_Carrito->Id_Producto] = $l_Item_Carrito;

        }

        if( $l_Flg_Error_Detectado === false )
        {
            $l_Rpt->Resultado = $l_Obj_Carrito;
        }
        else
        {
            $l_Rpt->Error->flagerror = true;
            $l_Rpt->Error->messages = "ERRORES DETECTADOS";
            $l_Rpt->Resultado = [
                 "List_Item_Vendido" => $l_List_Mensajes
                ,"List_Errores" => $l_List_Mensajes_Error
            ];
        }
        
        return $l_Rpt;
    }

    private function Validar_Item_Recuperado_Stock(array $p_Producto_Recuperado,array $p_Producto_WS)
    {
        $l_Rpt = new ENResponse();

        if( (int)$p_Producto_WS["Num_Producto_StockAct"] === 0 )
        {
            $l_Rpt->Error->flagerror = true;
            $l_Rpt->Error->messages =  $p_Producto_WS["Des_Producto_Nom"] . " : ";
            $l_Rpt->Error->messages .= "YA NO CUENTA CON STOCK DISPONIBLE ";
            return $l_Rpt;
        }

        if( $p_Producto_Recuperado["Num_Cantidad"] > $p_Producto_WS["Num_Producto_StockAct"] )
        {
            $l_Rpt->Error->flagerror = true;
            $l_Rpt->Error->messages =  $p_Producto_WS["Des_Producto_Nom"] . " : ";
            $l_Rpt->Error->messages .= "LA CANTIDAD VENDIDA YA NO ESTA DISPONIBLE ACTUALMENTE";
            $l_Rpt->Error->messages .= " { SOLICITADO : " . $p_Producto_Recuperado["Num_Cantidad"] . ", DISPONIBLE : " . $p_Producto_WS["Num_Producto_StockAct"] . "}";
            return $l_Rpt;
        }
        return $l_Rpt;
    }

    public function Establecer_Formato_Nombre(string $p_NombreCliente,ENCarrito $p_Obj_Carrito):ENCarrito
    {
        $l_Cliente = [];

        $l_Cliente = explode(" ",$p_NombreCliente);

        if ( count($l_Cliente) == 1 )
        {
            $p_Obj_Carrito->Des_NomCliente = $l_Cliente[0];
        }
        if ( count($l_Cliente) == 2 )
        {
            $p_Obj_Carrito->Des_NomCliente = $l_Cliente[0];
            $p_Obj_Carrito->Des_ApeClientePat = $l_Cliente[1];
        }        
        if ( count($l_Cliente) == 3 )
        {
            $p_Obj_Carrito->Des_NomCliente = $l_Cliente[0];
            $p_Obj_Carrito->Des_ApeClientePat = $l_Cliente[1];
            $p_Obj_Carrito->Des_ApeClienteMat = $l_Cliente[2];
        }
        if ( count($l_Cliente) == 4 )
        {
            $p_Obj_Carrito->Des_NomCliente = $l_Cliente[0] . " " . $l_Cliente[1];
            $p_Obj_Carrito->Des_ApeClientePat = $l_Cliente[2];
            $p_Obj_Carrito->Des_ApeClienteMat = $l_Cliente[3];
        }
        if ( count($l_Cliente) > 4 )
        {
            $p_Obj_Carrito->Des_NomCliente = $l_Cliente[0] . " " . $l_Cliente[1]. " " . $l_Cliente[2];
            $p_Obj_Carrito->Des_ApeClientePat = $l_Cliente[strlen($l_Cliente)-2];
            $p_Obj_Carrito->Des_ApeClienteMat = $l_Cliente[strlen($l_Cliente)-1];
        }

        return $p_Obj_Carrito;

    }

    //Funciones de promocion
    public function Get_Promocion(ENCarrito $p_Obj_Carrito,ENAutenticacionService $p_Obj_Autenticacion):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_SEOrquestador = new SEOrquestador();
        $l_List_Producto = [];
        $l_Producto = [];
        $l_ObjData = [];

        foreach($p_Obj_Carrito->List_Item_Pro as $Item)
        {
            $l_Producto["Id_Producto"] = $Item->Id_Producto;
            array_push($l_List_Producto,$l_Producto);
        }

        $l_ObjData["Busqueda"]["Des_KeyBusqueda"] = "Search_Recommendation";
        $l_ObjData["List_Producto"] = $l_List_Producto;

        $l_Rpt = $l_SEOrquestador->Ejecutar_14_ws_wa_BuscarPromo($l_ObjData,$p_Obj_Autenticacion);

        return $l_Rpt;
    }

    public function Get_Stock_Disponible(int $p_Id_Tienda,int $p_Id_Producto,ENAutenticacionService $p_Obj_Autenticacion):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_SEOrquestador = new SEOrquestador();
        $l_ObjData = [];

        $l_ObjData["Busqueda"]["Des_KeyOperacion"] = "Get_Stock_Available";
        $l_ObjData["Busqueda"]["Id_Tienda"] = $p_Id_Tienda;
        $l_ObjData["Busqueda"]["List_Producto"] = [ $p_Id_Producto ];

        $l_Rpt = $l_SEOrquestador->Ejecutar_22_ws_wa_ListarStockAlmacen($l_ObjData,$p_Obj_Autenticacion);

        return $l_Rpt;
    }

}
?>