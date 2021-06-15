<?php namespace App\Controllers;

use Throwable;
use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENDataService as ENDataService;
use App\Models\CEN\CENAccionesCarrito as ENAccionesCarrito;
use App\Models\CEN\CENCarrito as ENCarrito;
use App\Models\CEN\CENPromocion as ENPromocion;


use App\Models\CLN\CLNPreventa as LNPreventa;
use App\Models\CLN\CLNCarrito as LNCarrito;

class Preventa extends BaseController
{

    public function __construct()
    {

    }

    public function index()
    {
        $l_Rpt = new ENResponse();
        $l_LNPreventa = new LNPreventa();

        if( $this->session->get("session") )
        {
            $l_Rpt = $l_LNPreventa->Render_index($this->session->Obj_Carrito->Flg_Cargado);
        }

        return $this->ConstruirMenu('preventa/listar',$l_Rpt->Resultado);   
    }

    public function crear()
    {
        $l_Rpt = new ENResponse();
        $l_LNPreventa = new LNPreventa();

        if( $this->session->get("session") )
        {
            $l_Rpt = $l_LNPreventa->Render_crear();
        }

        return $this->ConstruirMenu('preventa/crear',$l_Rpt->Resultado);   
    }

    public function search()
    {
        $l_Rpt = new ENResponse();
        $l_LNPreventa = new LNPreventa();
        if( $this->session->get("session") )
        {
            $l_Rpt = $l_LNPreventa->Render_search($_SERVER,$this->session->get("Obj_AutenticacionService"));
        }
        return $this->ConstruirMenu('preventa/search',$l_Rpt->Resultado); 
    }

    public function producto(int $p_Id_Producto)
    {
        $l_Rpt = new ENResponse();
        $l_LNPreventa = new LNPreventa();
        $l_FrontEnd = [];

        if( $this->session->get("session") )
        {
            $l_Rpt = $l_LNPreventa->Render_Producto($p_Id_Producto,$this->session->get("Obj_AutenticacionService"));

            $l_FrontEnd = $l_Rpt->Resultado;
        }

        return $this->ConstruirMenu('preventa/producto',$l_FrontEnd); 
    }

    public function Set_Producto_Carrito_antiguo()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $l_Rpt = new ENResponse();
        $l_LNPreventa = new LNPreventa();
        $l_AccionesCarrito = new ENAccionesCarrito();

        $l_AccionesCarrito->Set($l_request_JSON);

        $l_Rpt = $l_LNPreventa->Set_Producto_Carrito($this->session->get("Obj_Carrito"),$l_AccionesCarrito,(int)$this->session->get("Id_Usuario"),(int)$this->session->get("Id_Empresa"),(int)$this->session->get("Id_Tienda")
                                                    ,(string)$this->session->get("Des_UsuarioTienda"),(string)$this->session->get("Cod_HashTienda"));                                           

        if(!$l_Rpt->Error->flagerror)
        {
            $this->session->Obj_Carrito = $l_Rpt->Resultado;
            $l_Rpt->Resultado = true; 
        }                                                                                            
        return json_encode($l_Rpt);
    }

    public function Set_Producto_Carrito()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $l_Rpt = new ENResponse();
        $l_LNCarrito = new LNCarrito($this->session->get("Obj_AutenticacionService"),$this->session->get("Obj_Carrito"));
        $l_AccionesCarrito = new ENAccionesCarrito();

        try
        {
            $l_AccionesCarrito->Set($l_request_JSON);
            $l_Rpt = $l_LNCarrito->Set_Producto_Carrito($l_AccionesCarrito);

            if(!$l_Rpt->Error->flagerror)
            {
                $this->session->Obj_Carrito = $l_Rpt->Resultado;
                $l_Rpt->Resultado = true; 
            }else
            {
                $this->session->Obj_Carrito = $l_LNCarrito->Get_Obj_Carrito_Respaldo();
            }
        }
        catch(Throwable $ex)
        {
            $this->session->Obj_Carrito = $l_LNCarrito->Get_Obj_Carrito_Respaldo();
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }
                                                                                          
        return json_encode($l_Rpt);
    }

    public function Get_Producto_Carrito()
    {
        $l_Rpt = new ENResponse();

        $l_Rpt->Resultado = $this->session->get("Obj_Carrito");

        return json_encode($l_Rpt);
    }

    public function Delete_Producto_Carrito()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $l_Rpt = new ENResponse();
        $l_LNCarrito = new LNCarrito($this->session->get("Obj_AutenticacionService"),$this->session->get("Obj_Carrito"));
        try
        {
            $l_Cod_Accion = $l_request_JSON["Cod_Accion"];
            $this->session->Obj_Carrito = $l_LNCarrito->Delete_Producto_Carrito($l_Cod_Accion);
        }
        catch(Throwable $ex)
        {
            $this->session->Obj_Carrito = $l_LNCarrito->Get_Obj_Carrito_Respaldo();
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }
        return json_encode($l_Rpt);
    }

    public function Set_Preventa()
    {
        $l_request_JSON = $this->request->getJSON(true);  
        $l_Rpt = new ENResponse();
        $l_LNPreventa = new LNPreventa();
         
        try
        {
            
            $l_Des_Comentario = $l_request_JSON["Des_Comentario"];

            $l_Rpt = $l_LNPreventa->Set_Preventa($this->session->get("Obj_Carrito"),$l_Des_Comentario,$this->session->get("Obj_AutenticacionService"));                                           

            if(!$l_Rpt->Error->flagerror)
            {
                $this->session->Obj_Carrito = new ENCarrito();
            }
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }

        return json_encode($l_Rpt);
    }

    public function Get_PreVenta()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $l_Rpt = new ENResponse();
        $l_LNPreventa = new LNPreventa();
        $l_request = new ENDataService();

        try
        {
            $l_request->Paginacion->Set($l_request_JSON["Paginacion"]);
            if(!empty($l_request_JSON["Busqueda"])) $l_request->Busqueda = $l_request_JSON["Busqueda"];

            $l_Rpt = $l_LNPreventa->Get_PreVenta($l_request,(int)$this->session->get("Id_Usuario"),(int)$this->session->get("Id_Empresa"),(int)$this->session->get("Id_Tienda")
                                                                    ,(string)$this->session->get("Des_UsuarioTienda"),(string)$this->session->get("Cod_HashTienda"));
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }

        return json_encode($l_Rpt);
    }

    public function Get_Recuperar_Preventa()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $l_Rpt = new ENResponse();
        $l_LNPreventa = new LNPreventa();
        $l_request = new ENDataService();

        try
        {
            $l_request->Paginacion->Set($l_request_JSON["Paginacion"]);
            if(!empty($l_request_JSON["Busqueda"])) $l_request->Busqueda = $l_request_JSON["Busqueda"];

            $l_Rpt = $l_LNPreventa->Get_Recuperar_Preventa($l_request,(int)$this->session->get("Id_Usuario"),(int)$this->session->get("Id_Empresa"),(int)$this->session->get("Id_Tienda")
                                                                    ,(string)$this->session->get("Des_UsuarioTienda"),(string)$this->session->get("Cod_HashTienda"));

            if(!$l_Rpt->Error->flagerror)
            {
                $this->session->Obj_Carrito = $l_Rpt->Resultado;
                $l_Rpt->Resultado = true; 
            }     
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }

        return json_encode($l_Rpt);        
    }

    //Funciones relacionadas a promo
    public function Get_Promocion()
    {
        $l_Rpt = new ENResponse();
        $l_LNPreventa = new LNPreventa();
        try
        {
            $l_Rpt = $l_LNPreventa->Get_Promocion($this->session->get("Obj_Carrito"),$this->session->get("Obj_AutenticacionService"));
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }

        return json_encode($l_Rpt);
    }

    public function Set_Promocion()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $l_Rpt = new ENResponse();
        $l_Promocion = new ENPromocion();
        $l_LNCarrito = new LNCarrito($this->session->get("Obj_AutenticacionService"),$this->session->get("Obj_Carrito"));

        try
        {
            $l_Promocion->Set($l_request_JSON);

            $l_Rpt = $l_LNCarrito->Set_Promocion_Carrito($l_Promocion);
        
            if(!$l_Rpt->Error->flagerror)
            {
                $this->session->Obj_Carrito = $l_Rpt->Resultado;
                $l_Rpt->Resultado = true; 
            } 
        }
        catch(Throwable $ex)
        {
            $this->session->Obj_Carrito = $l_LNCarrito->Get_Obj_Carrito_Respaldo();
            $l_Rpt->Error->Fail(500,500,$ex->getMessage(),$ex);
        }

        return json_encode($l_Rpt);
    }

    public function Get_Stock_Disponible()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $l_Rpt = new ENResponse();
        $l_LNPreventa = new LNPreventa();
        $l_Id_Tienda = 0;
        $l_Id_Producto = 0;
        try
        {
            $l_Id_Tienda = $l_request_JSON["Id_Tienda"];
            $l_Id_Producto = $l_request_JSON["Id_Producto"];
            $l_Rpt = $l_LNPreventa->Get_Stock_Disponible($l_Id_Tienda,$l_Id_Producto,$this->session->get("Obj_AutenticacionService"));                                           

        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }                                                                                          
        return json_encode($l_Rpt);
    }

    public function Ejecutar_Accion_Codigo_Barras()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $l_Rpt = new ENResponse();
        $l_LNCarrito = new LNCarrito($this->session->get("Obj_AutenticacionService"),$this->session->get("Obj_Carrito"));

        try
        {
            $l_Rpt = $l_LNCarrito->Ejecutar_Accion_Codigo_Barras((string)$l_request_JSON["Cod_Barras"]);

            if(!$l_Rpt->Error->flagerror)
            {
                $this->session->Obj_Carrito = $l_Rpt->Resultado["Obj_Rpt_Carrito"];
                $l_Rpt->Resultado = true; 
            }else
            {
                $this->session->Obj_Carrito = $l_LNCarrito->Get_Obj_Carrito_Respaldo();
            }
        }
        catch(Throwable $ex)
        {
            $this->session->Obj_Carrito = $l_LNCarrito->Get_Obj_Carrito_Respaldo();
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }
                                                                                          
        return json_encode($l_Rpt);        
    }
}
?>    