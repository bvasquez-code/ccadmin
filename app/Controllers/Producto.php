<?php namespace App\Controllers;

use Exception;
use Throwable;
use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENDataService as ENDataService;

use App\Models\CLN\CLNProducto as LNProducto;
use App\Models\CLN\CLNCategoriaproducto as LNCategoriaproducto;
use App\Models\CLN\CLNMarcaproducto as LNMarcaproducto;
use App\Models\CLN\CLNConfigsistema as LNConfigsistema;

class Producto extends BaseController
{

    public function __construct()
    {

    }

    public function index()
    {
        $l_FrontEnd = [];
        return $this->ConstruirMenu('producto/listar',$l_FrontEnd);
    }

    public function crear($p_Id_Producto = 0)
    {
        $l_Rpt = new ENResponse();
        $l_LNProducto = new LNProducto();

        if( $this->session->get("session") )
        {
            $l_Rpt = $l_LNProducto->Render_crear($p_Id_Producto,$this->session->get("Obj_AutenticacionService"));
        }
        
        return $this->ConstruirMenu('producto/crear',$l_Rpt->Resultado);
    }

    
    public function ver(int $p_Id_Producto = 0)
    {
        $l_Rpt = new ENResponse();
        $l_LNProducto = new LNProducto;
        $l_FrontEnd = [];
        if( $this->session->get("session") )
        {
            $l_Rpt = $l_LNProducto->Render_ver($p_Id_Producto,$this->session->get("Obj_AutenticacionService"));

            $l_FrontEnd = $l_Rpt->Resultado;
        }
        
        return $this->ConstruirMenu('producto/ver',$l_FrontEnd);
    }

    public function config($p_Id_Producto = 0)
    {
        $l_Rpt = new ENResponse();
        $l_LNProducto = new LNProducto;

        if( $this->session->get("session") )
        {
            $l_Rpt = $l_LNProducto->Render_config($p_Id_Producto,$this->session->get("Obj_AutenticacionService"));
        }

        return $this->ConstruirMenu('producto/config',$l_Rpt->Resultado);
    }

    public function Set_Producto()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $l_Rpt = new ENResponse;
        $l_LNProducto = new LNProducto;
        try
        {
            $l_Rpt = $l_LNProducto->Set_Producto($l_request_JSON,$this->session->get("Obj_AutenticacionService"));
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }
        return json_encode($l_Rpt);
    }

    public function Set_Producto_Masivo()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $l_Rpt = new ENResponse;
        $l_LNProducto = new LNProducto;
        try
        {
            $l_Rpt = $l_LNProducto->Set_Producto_Masivo($l_request_JSON,(int)$this->session->get("Id_Usuario"),(int)$this->session->get("Id_Empresa"),(int)$this->session->get("Id_Tienda")
                                                                ,(string)$this->session->get("Des_UsuarioTienda"),(string)$this->session->get("Cod_HashTienda"));
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }
        return json_encode($l_Rpt);
    }

    public function Get_Producto()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $l_Rpt = new ENResponse;
        $l_request = new ENDataService;
        $l_LNProducto = new LNProducto;
        try
        {
            $l_request->Paginacion->Set($l_request_JSON["Paginacion"]);
            if(!empty($l_request_JSON["Busqueda"])) $l_request->Busqueda = $l_request_JSON["Busqueda"];

            $l_Rpt = $l_LNProducto->Get_Producto($l_request,(int)$this->session->get("Id_Usuario"),(int)$this->session->get("Id_Empresa"),(int)$this->session->get("Id_Tienda")
                                                                    ,(string)$this->session->get("Des_UsuarioTienda"),(string)$this->session->get("Cod_HashTienda"));
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }
        
        return json_encode($l_Rpt);
    }
    
    public function Get_Formato_Carga_Producto()
    {
        $l_Rpt = new ENResponse();
        $l_LNProducto = new LNProducto;
        try
        {
            $l_Rpt = $l_LNProducto->Get_Formato_Carga_Producto();
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }
        return json_encode($l_Rpt);
    }

    public function Get_Data_Crear()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $l_Rpt = new ENResponse();
        $l_LNProducto = new LNProducto();
        try
        {

            $l_Rpt = $l_LNProducto->Get_Data_Crear($l_request_JSON,$this->session->get("Obj_AutenticacionService"));
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }
        
        return json_encode($l_Rpt);
    }

    public function Set_Variacion_Producto()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $l_Rpt = new ENResponse();
        $l_LNProducto = new LNProducto();
        try
        {
            $l_Rpt = $l_LNProducto->Set_Variacion_Producto($l_request_JSON,$this->session->get("Obj_AutenticacionService"));
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }
        
        return json_encode($l_Rpt);        
    }
   

}

?>