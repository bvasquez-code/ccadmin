<?php namespace App\Models\CLN;

use CodeIgniter\Model;

use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENAutenticacionService as ENAutenticacionService;
use App\Models\CEN\CENCarrito as ENCarrito;
use App\Models\CEN\CENItemproducto as ENItemproducto;
use App\Models\CEN\CENAccionesCarrito as ENAccionesCarrito;
use App\Models\CEN\CENRequestService as ENRequestService;
use App\Models\CEN\CENDataService as ENDataService;
use App\Models\CEN\CENPromocion as ENPromocion;

use App\Models\CLN\CLNGenerico as LNGenerico;
use App\Models\CLN\CLNCategoriaproducto as LNCategoriaproducto;
use App\Models\CLN\CLNMarcaproducto as LNMarcaproducto;
use App\Models\CLN\CLNConfigsistema as LNConfigsistema;

use App\Models\CSE\CSEOrquestador as SEOrquestador;
use Exception;

class CLNCarrito extends Model
{
    private ENAutenticacionService $g_Obj_Aut;
    private ENCarrito $g_Obj_Carrito;
    private ENCarrito $g_Obj_Carrito_Respaldo;
    private array $g_List_Valores_Accion = ["adddata","add","decrease","delete","discount","addquantity"];

    public function __construct(ENAutenticacionService $p_Obj_Aut,ENCarrito $p_Obj_Carrito)
    {
        $this->g_Obj_Aut = $p_Obj_Aut;
        $this->g_Obj_Carrito = $p_Obj_Carrito;
        $this->g_Obj_Carrito_Respaldo = $p_Obj_Carrito;
    }

    public function Get_Obj_Carrito_Respaldo():ENCarrito
    {
        return $this->g_Obj_Carrito_Respaldo;
    }


    public function Set_Producto_Carrito(ENAccionesCarrito $p_AccionesCarrito):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_Producto_WS = []; //Producto obtenido desde el webservice

        $l_Rpt = $this->Validar_Acciones_Carrito($p_AccionesCarrito);
        if($l_Rpt->Error->flagerror) return $l_Rpt;

        if( $p_AccionesCarrito->Cod_Accion === "add" )
        {
            $l_Producto_WS = $this->Get_Producto_Detalle($p_AccionesCarrito->Id_Producto)->Resultado;
            $l_Rpt = $this->Validar_Stok_Disponible($l_Producto_WS,$p_AccionesCarrito->Id_Producto,0);
            if($l_Rpt->Error->flagerror) return $l_Rpt;
            $this->Add_Item_Carrito($l_Producto_WS,$p_AccionesCarrito->Id_Producto,0);
        }
        if($p_AccionesCarrito->Cod_Accion === "addquantity")
        {
            $l_Producto_WS = $this->Get_Producto_Detalle($p_AccionesCarrito->Id_Producto)->Resultado;
            $l_Rpt = $this->Validar_Stok_Disponible($l_Producto_WS,$p_AccionesCarrito->Id_Producto,$p_AccionesCarrito->Num_Cantidad,$p_AccionesCarrito->List_Variaciones);
            if($l_Rpt->Error->flagerror) return $l_Rpt;
            $this->Add_Item_Carrito($l_Producto_WS,$p_AccionesCarrito->Id_Producto,$p_AccionesCarrito->Num_Cantidad,$p_AccionesCarrito->List_Variaciones);
        }
        if($p_AccionesCarrito->Cod_Accion === "decrease")
        {
            $l_Producto_WS = $this->Get_Producto_Detalle($p_AccionesCarrito->Id_Producto)->Resultado;
            $l_Rpt = $this->Validar_Stok_Disponible($l_Producto_WS,$p_AccionesCarrito->Id_Producto,0);
            if($l_Rpt->Error->flagerror) return $l_Rpt;
            $this->Decrease_Item_Carrito($p_AccionesCarrito->Id_Producto);
        }
        if($p_AccionesCarrito->Cod_Accion === "discount")
        {
            if(!$p_AccionesCarrito->Flg_ForzarOperacion)
            {
                $l_Rpt = $this->Validar_Descuento($p_AccionesCarrito->Id_Producto,$p_AccionesCarrito->Num_Descuento);
                if($l_Rpt->Error->flagerror) return $l_Rpt;
            }
            $this->Aplicar_Descuento($p_AccionesCarrito->Id_Producto,$p_AccionesCarrito->Num_Descuento);
        }
        if($p_AccionesCarrito->Cod_Accion === "delete")
        {
            $this->Delete_Item_Carrito($p_AccionesCarrito->Id_Producto);                
        }
        if($p_AccionesCarrito->Cod_Accion === "adddata")
        {
            $this->Set_Datos_Carrito($p_AccionesCarrito); 
        }

        $this->g_Obj_Carrito->Flg_EnProceso = true;

        $this->g_Obj_Carrito->Flg_Cargado = ( count($this->g_Obj_Carrito->List_Item_Pro) > 0 ) ? true : false ;

        $l_Rpt->Resultado = $this->g_Obj_Carrito;

        return $l_Rpt;
    }

    private function Get_Producto_Detalle(int $p_Id_Producto):ENResponse
    {
        $l_Rpt = new ENResponse;
        $l_ENRequestService = new ENRequestService;
        $l_SEOrquestador = new SEOrquestador;        
        $l_DataService = new ENDataService(); 

        $l_DataService->Paginacion->Tip_Busqueda = 2; //Buscar lista de productos
        $l_DataService->Paginacion->Tip_Listado = 3; //Parametro para limitar la busqueda

        $l_DataService->Busqueda["Id_Producto"] = $p_Id_Producto;     

        $l_ENRequestService->ObjAute = $this->g_Obj_Aut; 
        $l_ENRequestService->ObjData = $l_DataService;

        $l_Rpt = $l_SEOrquestador->Ejecutar_03_ws_wa_ListarProductos($l_ENRequestService);

        if( $l_Rpt->Error->flagerror === true )
        {
            throw new Exception($l_Rpt->Error->messages,$l_Rpt->Error->error);
        }

        return $l_Rpt;
    }

    private function Get_Id_Producto(string $p_Cod_Barras):int
    {
        $l_Rpt = new ENResponse;
        $l_ENRequestService = new ENRequestService;
        $l_SEOrquestador = new SEOrquestador;        
        $l_DataService = new ENDataService();
        $l_Id_Producto = 0;

        $l_DataService->Paginacion->Tip_Busqueda = 4; //Buscar lista de productos

        $l_DataService->Busqueda["Cod_Barras"] = $p_Cod_Barras;     

        $l_ENRequestService->ObjAute = $this->g_Obj_Aut; 
        $l_ENRequestService->ObjData = $l_DataService;

        $l_Rpt = $l_SEOrquestador->Ejecutar_03_ws_wa_ListarProductos($l_ENRequestService);

        if( $l_Rpt->Error->flagerror == true )
        {
            throw new Exception($l_Rpt->Error->messages,$l_Rpt->Error->error);
        }

        $l_Id_Producto = (int)$l_Rpt->Resultado["Id_Producto"];

        if( $l_Id_Producto == 0 )
        {
            throw new Exception("NO SE ENCONTRO PRODUCTO PARA CODIGO DE BARRAS : " . $p_Cod_Barras);
        }

        return $l_Id_Producto;
    }

    //INICIO VALIDACIONES
    private function Validar_Stok_Disponible(
         array $p_Producto_WS = null         //Objeto Producto obtenido del web service
        ,int $p_Id_Producto                  //Id Producto
        ,int $p_Num_Cantidad_Agregada        //Cantidad de stock a validar
        ,array $p_List_Variaciones = null    //Lista de variaciones del producto
    ):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_Num_Stock_Disp = 0;
        $l_Item_Carrito = new ENItemproducto();
        $l_Num_Cantidad = 0;
        $l_Des_Producto_text = "";
        $l_List_Variaciones = [];

        if(array_key_exists($p_Id_Producto,$this->g_Obj_Carrito->List_Item_Pro))
        {
            $l_Item_Carrito = $this->g_Obj_Carrito->List_Item_Pro[$p_Id_Producto];
        }

        $l_Num_Stock_Disp = (float)$p_Producto_WS["Num_Producto_StockAct"];
        $l_Des_Producto_text = $p_Producto_WS["Des_Producto_Nom"];
        $l_List_Variaciones = $l_Item_Carrito->SetListClass($p_Producto_WS["List_Variaciones"],"List_Variaciones");

        if( count($l_Item_Carrito->List_Variaciones) )
        {
            $l_List_Variaciones = $this->Actualizar_Lista_Variaciones_Producto($l_List_Variaciones,$l_Item_Carrito->List_Variaciones);
        }

        $l_Num_Cantidad = (!array_key_exists($p_Id_Producto,$this->g_Obj_Carrito->List_Item_Pro)) ? 0 : $l_Item_Carrito->Num_Cantidad;

        $l_Num_Cantidad = ( $p_Num_Cantidad_Agregada === 0 ) ? ( $l_Num_Cantidad + 1 ) : $p_Num_Cantidad_Agregada;


        if ( $l_Num_Cantidad > $l_Num_Stock_Disp )
        {
            $l_Rpt->Error->flagerror = true;
            $l_Rpt->Error->messages = "NO EXISTE EL STOCK SUFICIENTE PARA EL PRODUCTO :".$l_Des_Producto_text;
            $l_Rpt->Error->messages = $l_Rpt->Error->messages ." { ". " DISPONIBLE : " . $l_Num_Stock_Disp;
            $l_Rpt->Error->messages = $l_Rpt->Error->messages . " ,SOLICITADO : " . $l_Num_Cantidad . " }";
            return $l_Rpt;
        }

        if( count($l_List_Variaciones) > 0 &&  ($p_List_Variaciones === null || count($p_List_Variaciones) === 0) )
        {
            $l_Rpt->Resultado = $l_List_Variaciones;
            $l_Rpt->Error->flagerror = true;
            $l_Rpt->Error->error = 10;
            $l_Rpt->Error->originerror = 2;
            $l_Rpt->Error->messages = "AGREGAR STOCK ESPECIFICO";
            return $l_Rpt;
        }

        if( count($l_List_Variaciones) > 0 &&  count($p_List_Variaciones) > 0 )
        {
            foreach($p_List_Variaciones as $Item_Enviado)
            {
                foreach($l_List_Variaciones as $Item_Variacion)
                {
                    if( $Item_Enviado->Id_Variacion ===  (int)$Item_Variacion->Id_Variacion)
                    {
                        if($Item_Enviado->Num_Cantidad > $Item_Variacion->Num_Stock_Actual)
                        {
                            $l_Rpt->Resultado = null;
                            $l_Rpt->Error->flagerror = true;
                            $l_Rpt->Error->messages = "NO EXISTE EL STOCK SUFICIENTE PARA EL PRODUCTO :".$l_Des_Producto_text;
                            $l_Rpt->Error->messages = ", VARIACIÓN :".$Item_Variacion["Des_Variacion"];
                            $l_Rpt->Error->messages = $l_Rpt->Error->messages ." { ". " DISPONIBLE : " . $Item_Variacion->Num_Stock_Actual;
                            $l_Rpt->Error->messages = $l_Rpt->Error->messages . " ,SOLICITADO : " . $Item_Enviado->Num_Cantidad . " }";
                            return $l_Rpt;
                        }
                        continue;
                    }

                }
            }
        }

        return $l_Rpt;
    }

    private function Validar_Descuento(int $p_Id_Producto,float $p_Num_Descuento):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_Num_Descuento_Calculado = 0.0;

        $l_Item_Carrito = $this->g_Obj_Carrito->List_Item_Pro[(int)$p_Id_Producto];

        if(!$l_Item_Carrito->Flg_Descuento)
        {
            $l_Rpt->Error->Fail(500,0,"PRODUCTO NO ADMITE DESCUENTO");
            return $l_Rpt;
        }

        $l_Num_Descuento_Calculado = $p_Num_Descuento / $l_Item_Carrito->Num_Cantidad;

        if($l_Num_Descuento_Calculado > $l_Item_Carrito->Num_DescPermitido)
        {
            $l_Rpt->Error->Fail(500,0,"EL PRODUCTO SOLO ADMINTE UN DESCUENTO MINIMO DE ".$l_Item_Carrito->Num_DescPermitido);
            return $l_Rpt;
        }

        return $l_Rpt;
    }

    private function Validar_Acciones_Carrito(ENAccionesCarrito $p_AccionesCarrito):ENResponse
    {
        $l_Rpt = new ENResponse();

        if( $p_AccionesCarrito->Num_Cantidad <= 0 && $p_AccionesCarrito->Cod_Accion == "addquantity")
        {
            $l_Rpt->Error->Fail(500,0,"CANTIDAD DE PRODUCTOS DEBE SER MAYOR A 0");

            return $l_Rpt;
        }

        if( $p_AccionesCarrito->Num_Descuento <= 0 && $p_AccionesCarrito->Cod_Accion == "discount" )
        {
            $l_Rpt->Error->Fail(500,0,"DESCUENTO DEBE SER MAYOR A 0");

            return $l_Rpt;
        }

        if(!in_array($p_AccionesCarrito->Cod_Accion, $this->g_List_Valores_Accion))
        {
            $l_Rpt->Error->Fail(500,0,"ACCION NO IDENTIFICADA");

            return $l_Rpt;
        }

        return $l_Rpt;
    }
    //FIN DE VALIDACIONES

    //ACCIONES DEL CARRITO DE COMPRA
    private function Add_Item_Carrito(
         array $p_Producto_WS = null
        ,int $p_Id_Producto
        ,int $p_Num_Cantidad_Agregada
        ,array $p_List_Variaciones = null
    ):void
    {
       $l_Item_Carrito = new ENItemproducto();
       $l_Num_Cantidad = 1;

        if(array_key_exists($p_Id_Producto,$this->g_Obj_Carrito->List_Item_Pro))
        {
            $l_Item_Carrito = $this->g_Obj_Carrito->List_Item_Pro[(int)$p_Id_Producto];
            $l_Item_Carrito->Num_Descuento = 0;
            $l_Item_Carrito->Num_DescuentoTotal = 0;
            $l_Item_Carrito->Des_DescuentoTotal = "";
            $l_Item_Carrito->Des_Descuento = "";
            $l_Item_Carrito->Num_Stock_Disp = $p_Producto_WS["Num_Producto_StockAct"];
        }
        else
        {
            $l_Item_Carrito->Id_Producto = $p_Producto_WS["Id_Producto"];
            $l_Item_Carrito->Cod_Producto = $p_Producto_WS["Cod_Producto"];
            $l_Item_Carrito->Num_Precio = $p_Producto_WS["Num_Producto_Precio"];
            $l_Item_Carrito->Des_Producto = $p_Producto_WS["Des_Producto_Nom"];
            $l_Item_Carrito->Des_Precio = $p_Producto_WS["Des_Producto_PrecioStand"];
            $l_Item_Carrito->Num_DescPermitido = $p_Producto_WS["Num_Producto_DescReal"];
            $l_Item_Carrito->Des_Producto_text = $p_Producto_WS["Des_CategPro_Nom"] . "  (" . $p_Producto_WS["Des_MarcaPro_Nom"] . ")";
            $l_Item_Carrito->Flg_Descuento = $p_Producto_WS["Flg_Producto_Desc"];
            $l_Item_Carrito->Des_Moneda_Avr = $p_Producto_WS["Des_Moneda_Avr"];
            $l_Item_Carrito->Num_Stock_Disp = $p_Producto_WS["Num_Producto_StockAct"];
            $l_Item_Carrito->List_Variaciones = $l_Item_Carrito->SetListClass($p_Producto_WS["List_Variaciones"],"List_Variaciones");
        }

        //Si no se indica la cantidad se agrega 1 al existente
        $l_Num_Cantidad = ($p_Num_Cantidad_Agregada === 0) ? ( $l_Item_Carrito->Num_Cantidad + 1 ) : $p_Num_Cantidad_Agregada;

        $l_Item_Carrito->List_Variaciones = $this->Actualizar_Lista_Variaciones_Producto($l_Item_Carrito->List_Variaciones,$p_List_Variaciones);
        $l_Item_Carrito = $this->Recalcular_Item_Carrito($l_Item_Carrito,$l_Num_Cantidad);

        $this->g_Obj_Carrito->List_Item_Pro[(int)$p_Id_Producto] = $l_Item_Carrito; 

        $this->g_Obj_Carrito = $this->Recalcular_Carrito( $this->g_Obj_Carrito );

    }

    private function Decrease_Item_Carrito(int $p_Id_Producto):void
    {
        $l_Item_Carrito = new ENItemproducto();
        $l_Num_Cantidad = 0;

        $l_Item_Carrito = $this->g_Obj_Carrito->List_Item_Pro[$p_Id_Producto];

        if( ($l_Item_Carrito->Num_Cantidad - 1) === 0 )
        {
            unset($this->g_Obj_Carrito->List_Item_Pro[$p_Id_Producto]);
        }
        else
        {
            $l_Num_Cantidad = $l_Item_Carrito->Num_Cantidad - 1;

            $l_Item_Carrito->Num_Descuento = 0;
            $l_Item_Carrito->Num_DescuentoTotal = 0;
            $l_Item_Carrito->Des_DescuentoTotal = "";
            $l_Item_Carrito->Des_Descuento = "";

            $l_Item_Carrito = $this->Recalcular_Item_Carrito($l_Item_Carrito,$l_Num_Cantidad);

            $this->g_Obj_Carrito->List_Item_Pro[$p_Id_Producto] = $l_Item_Carrito;
        }

        $this->g_Obj_Carrito = $this->Recalcular_Carrito( $this->g_Obj_Carrito);      
    }

    public function Delete_Item_Carrito(int $p_Id_Producto):void
    {
        unset($this->g_Obj_Carrito->List_Item_Pro[(int)$p_Id_Producto]);

        $this->g_Obj_Carrito = $this->Recalcular_Carrito( $this->g_Obj_Carrito );
    }

    public function Set_Datos_Carrito(ENAccionesCarrito $p_Request):void
    {
        $this->g_Obj_Carrito->Cliente = $p_Request->Cliente;

        $this->g_Obj_Carrito->Id_Cliente = $p_Request->Id_Cliente;
        $this->g_Obj_Carrito->Tip_DocCliente = $p_Request->Tip_DocCliente;
        $this->g_Obj_Carrito->Cod_DocCliente = $p_Request->Cod_DocCliente;
        $this->g_Obj_Carrito->Des_NomCliente = $p_Request->Des_NomCliente;
        $this->g_Obj_Carrito->Des_ApeClientePat = $p_Request->Des_ApeClientePat;
        $this->g_Obj_Carrito->Des_ApeClienteMat = $p_Request->Des_ApeClienteMat;
        $this->g_Obj_Carrito->Tip_Pago = $p_Request->Tip_Pago;
        $this->g_Obj_Carrito->Tip_MedioPago = $p_Request->Tip_MedioPago;
        $this->g_Obj_Carrito->Tip_Monenda = 1;
        $this->g_Obj_Carrito->Num_ValorCambio = 1;
    }

    public function Aplicar_Descuento(int $p_Id_Producto,float $p_Num_Descuento):void
    {
        $l_Item_Carrito = $this->g_Obj_Carrito->List_Item_Pro[(int)$p_Id_Producto];

        $l_Item_Carrito->Num_Descuento = $p_Num_Descuento / $l_Item_Carrito->Num_Cantidad;
        $l_Item_Carrito->Num_DescuentoTotal = $p_Num_Descuento;
        $l_Item_Carrito->Des_DescuentoTotal = "- ".$this->Establecer_Formato_Moneda($l_Item_Carrito->Num_DescuentoTotal);
        $l_Item_Carrito->Des_Descuento = "- ".$this->Establecer_Formato_Moneda($l_Item_Carrito->Num_Descuento,$l_Item_Carrito->Des_Moneda_Avr);

        $l_Item_Carrito = $this->Recalcular_Item_Carrito($l_Item_Carrito);
        $this->g_Obj_Carrito->List_Item_Pro[(int)$p_Id_Producto] = $l_Item_Carrito;
        $this->g_Obj_Carrito = $this->Recalcular_Carrito( $this->g_Obj_Carrito);
    }
    //FIN ACCIONES DEL CARRITO DE COMPRA

    private function Actualizar_Lista_Variaciones_Producto(array $p_List_Variaciones_Actual,array $p_List_Variaciones_Enviada = null):array
    {
        if( $p_List_Variaciones_Enviada !== null && count($p_List_Variaciones_Enviada) > 0 )
        {
            for( $i=0 ; count($p_List_Variaciones_Actual)>$i ; $i++ )
            {
                foreach( $p_List_Variaciones_Enviada as $Item)
                {
                    if($Item->Id_Variacion === $p_List_Variaciones_Actual[$i]->Id_Variacion)
                    {
                        $p_List_Variaciones_Actual[$i]->Num_Cantidad = $Item->Num_Cantidad;
                        break;
                    }
                    else
                    {
                        $p_List_Variaciones_Actual[$i]->Num_Cantidad = 0;
                    }
                }
            }

        }
        return $p_List_Variaciones_Actual;
    }

    private function Recalcular_Item_Carrito(ENItemproducto $p_Item_Carrito,int $p_Num_Cantidad = 0 ):ENItemproducto
    {
        $l_LNGenerico = new LNGenerico();
        $l_Num_Por_Int = $l_LNGenerico->Get_Porcenta_IGV(0)->Num_Tasa;
        
        if( $p_Num_Cantidad != 0 )
        {
            $p_Item_Carrito->Num_Cantidad = $p_Num_Cantidad;  
        }             
        $p_Item_Carrito->Num_PreVenta = $p_Item_Carrito->Num_Precio - $p_Item_Carrito->Num_Descuento;
        $p_Item_Carrito->Num_Interes = $p_Item_Carrito->Num_PreVenta - $p_Item_Carrito->Num_PreVenta/(1 + $l_Num_Por_Int);
        $p_Item_Carrito->Num_MontoTotal = $p_Item_Carrito->Num_Cantidad * $p_Item_Carrito->Num_PreVenta;                        
        $p_Item_Carrito->Des_MontoTotal = $this->Establecer_Formato_Moneda($p_Item_Carrito->Num_MontoTotal,$p_Item_Carrito->Des_Moneda_Avr);

        return $p_Item_Carrito;
    }

    public function Recalcular_Carrito(ENCarrito $p_Obj_Carrito):ENCarrito
    {
        $l_Des_Moneda_Avr = "";
        $p_Obj_Carrito->Num_Total = 0;
        $p_Obj_Carrito->Num_Interes = 0;
        $p_Obj_Carrito->Num_Descuento = 0;
        $p_Obj_Carrito->Num_SubTotalVenta = 0;

        foreach($p_Obj_Carrito->List_Item_Pro as $Item)
        {   
            $l_Des_Moneda_Avr = $Item->Des_Moneda_Avr;
            $p_Obj_Carrito->Num_Descuento = $p_Obj_Carrito->Num_Descuento + ($Item->Num_Descuento * $Item->Num_Cantidad);
            $p_Obj_Carrito->Num_Interes = $p_Obj_Carrito->Num_Interes + ($Item->Num_Interes * $Item->Num_Cantidad);
            $p_Obj_Carrito->Num_SubTotalVenta = $p_Obj_Carrito->Num_SubTotalVenta + ($Item->Num_Precio * $Item->Num_Cantidad);
            $p_Obj_Carrito->Num_Total = $p_Obj_Carrito->Num_Total + $Item->Num_MontoTotal;
        }

        $p_Obj_Carrito->Tip_Documento = 1;
        $p_Obj_Carrito->Des_SubTotalVenta = $this->Establecer_Formato_Moneda($p_Obj_Carrito->Num_SubTotalVenta,$l_Des_Moneda_Avr);		
        $p_Obj_Carrito->Des_Interes = $this->Establecer_Formato_Moneda($p_Obj_Carrito->Num_Interes,$l_Des_Moneda_Avr);		    
        $p_Obj_Carrito->Des_Descuento = $this->Establecer_Formato_Moneda($p_Obj_Carrito->Num_Descuento,$l_Des_Moneda_Avr);		    
        $p_Obj_Carrito->Des_Total = $this->Establecer_Formato_Moneda($p_Obj_Carrito->Num_Total,$l_Des_Moneda_Avr);		        

        return $p_Obj_Carrito;
    }

    public function Delete_Producto_Carrito(string $p_Cod_Accion):ENCarrito
    {
        if( $p_Cod_Accion == "DeleteItemCar" )
        {
            $this->g_Obj_Carrito->List_Item_Pro = [];
            $this->g_Obj_Carrito->Flg_Cargado = false;
            $this->g_Obj_Carrito->Flg_EnProceso = true;
        }
        if( $p_Cod_Accion == "DeleteAllCar" )
        {
            $this->g_Obj_Carrito = new ENCarrito();
        }

        return $this->g_Obj_Carrito;
    }

    //FUNCIONES ADICIONALES
    private function Establecer_Formato_Moneda(float $p_Num_Val,string $p_Des_Moneda_Avr = "PEN"):string
    {

        $l_Des_Numero_Moneda = "";

        $l_Des_Numero_Moneda = trim($p_Des_Moneda_Avr) ." ". number_format($p_Num_Val,2);

        return $l_Des_Numero_Moneda;
    }

   //FUCIONES ADICIONALES
   
    public function Set_Promocion_Carrito(ENPromocion $p_Obj_Promo):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_AccionesCarrito = new ENAccionesCarrito();

        foreach( $p_Obj_Promo->List_Detalle as $Item )
        {
            $l_AccionesCarrito->Id_Producto = $Item->Id_Producto;

            if(!array_key_exists((int)$Item->Id_Producto,$this->g_Obj_Carrito->List_Item_Pro))
            {
                $l_AccionesCarrito->Cod_Accion = "add";
            }else
            {
                $l_AccionesCarrito->Cod_Accion = "addquantity";
            }
            
            $l_AccionesCarrito->Num_Cantidad = $Item->Num_Cantidad;
            $l_Rpt = $this->Set_Producto_Carrito($l_AccionesCarrito);
            if($l_Rpt->Error->flagerror) return $l_Rpt;

            if( $Item->Num_DescPorcentaje > 0 )
            {
                $l_AccionesCarrito->Cod_Accion = "discount";
                $l_AccionesCarrito->Num_Descuento = $Item->Num_DescAplicable;
                $l_AccionesCarrito->Flg_ForzarOperacion = true;
    
                $l_Rpt = $this->Set_Producto_Carrito($l_AccionesCarrito);
               if($l_Rpt->Error->flagerror) return $l_Rpt;
            }
  
            $this->g_Obj_Carrito->List_Item_Pro[$Item->Id_Producto]->Flg_Promocion = true;
            $this->g_Obj_Carrito->List_Item_Pro[$Item->Id_Producto]->Id_Promocion = $p_Obj_Promo->Id_Promocion;

        }

        if(!array_key_exists((int)$p_Obj_Promo->Id_Promocion,$this->g_Obj_Carrito->List_Promo))
        {
            $this->g_Obj_Carrito->List_Promo[$p_Obj_Promo->Id_Promocion] = $p_Obj_Promo;
        }

        $l_Rpt->Resultado = $this->g_Obj_Carrito;

        return $l_Rpt;
    }

    //FUNCIONES PARA CODIGO DE BARRAS
    public function Ejecutar_Accion_Codigo_Barras(string $p_Cod_Barras):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_Rpt_Carrito = new ENResponse();
        $l_AccionesCarrito = new ENAccionesCarrito();

        $l_AccionesCarrito->Id_Producto = $this->Get_Id_Producto($p_Cod_Barras);
        $l_AccionesCarrito->Cod_Accion = "add";

        $l_Rpt_Carrito = $this->Set_Producto_Carrito($l_AccionesCarrito);

        $l_Rpt->Error = $l_Rpt_Carrito->Error;

        $l_Rpt->Resultado = [
             "Id_Producto" => $l_AccionesCarrito->Id_Producto
            ,"Obj_Rpt_Carrito" => $l_Rpt_Carrito->Resultado
        ];

        return $l_Rpt;
    }
        
}
?>