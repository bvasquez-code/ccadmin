<?php namespace App\Controllers;

use Exception;
use Throwable;
use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENDataService as ENDataService;

use App\Models\CLN\CLNMarcaproducto as LNMarcaproducto;

class Marcaproducto extends BaseController
{

    public function __construct()
    {

    }

    public function index()
    {
        $l_FrontEnd = [];
        return $this->ConstruirMenu('marcaproducto/listar',$l_FrontEnd);
    }

    public function crear($p_Id_MarcaProducto = 0)
    {
        $l_ENResponse = new ENResponse;
        $l_ENDataService = new ENDataService;
        $l_LNMarcaproducto = new LNMarcaproducto;
        $l_FrontEnd = null; // Datos que se enviaran a la vista
        $l_Busqueda = null; //Busqueda en el web Service
        $l_MarcaProducto = null;  //Categoria Buscada

        if( $p_Id_MarcaProducto != 0 )
        {
            $l_ENDataService->Paginacion->Num_Seccion = 1;
            $l_ENDataService->Paginacion->Tip_Busqueda = 3; //Obtener marca producto
            $l_ENDataService->Paginacion->Tip_Listado = 4;
            $l_Busqueda["Busqueda_MarcaProducto"]["Id_MarcaProducto"] = $p_Id_MarcaProducto;
            $l_ENDataService->Busqueda = $l_Busqueda;
            
            $l_ENResponse = $l_LNMarcaproducto->Get_Marca_Producto($l_ENDataService,(int)$this->session->get("Id_Usuario"),(int)$this->session->get("Id_Empresa"),(int)$this->session->get("Id_Tienda")
                                                                                ,(string)$this->session->get("Des_UsuarioTienda"),(string)$this->session->get("Cod_HashTienda"));
            
            if( count($l_ENResponse->Resultado["List_Resultado"])>0 )
            {
                $l_MarcaProducto = $l_ENResponse->Resultado["List_Resultado"][0];
            }
        }

        $l_FrontEnd = [
            "MarcaProducto" => $l_MarcaProducto
        ];

        return $this->ConstruirMenu('marcaproducto/crear',$l_FrontEnd);
    }    

    public function Set_Marca_Producto()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $l_Rpt = new ENResponse;
        $l_LNMarcaproducto = new LNMarcaproducto;
        try
        {
            $l_Rpt = $l_LNMarcaproducto->Set_Marca_Producto($l_request_JSON,(int)$this->session->get("Id_Usuario"),(int)$this->session->get("Id_Empresa"),(int)$this->session->get("Id_Tienda")
                                                                ,(string)$this->session->get("Des_UsuarioTienda"),(string)$this->session->get("Cod_HashTienda"));
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }
        return json_encode($l_Rpt);
    }

    public function Get_Marca_Producto()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $l_Rpt = new ENResponse;
        $l_request = new ENDataService;
        $l_LNMarcaproducto = new LNMarcaproducto;
        try
        {
            $l_request->Paginacion->Set($l_request_JSON["Paginacion"]);
            if(!empty($l_request_JSON["Busqueda"])) $l_request->Busqueda = $l_request_JSON["Busqueda"];

            $l_Rpt = $l_LNMarcaproducto->Get_Marca_Producto($l_request,(int)$this->session->get("Id_Usuario"),(int)$this->session->get("Id_Empresa"),(int)$this->session->get("Id_Tienda")
                                                                    ,(string)$this->session->get("Des_UsuarioTienda"),(string)$this->session->get("Cod_HashTienda"));
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }
        
        return json_encode($l_Rpt);
    }    
   

}

?>