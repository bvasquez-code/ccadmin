<?php namespace App\Controllers;

use Exception;
use Throwable;
use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENDataService as ENDataService;

use App\Models\CLN\CLNCategoriaproducto as LNCategoriaproducto;
use App\Models\CLN\CLNParsistema as LNParsistema;

class Categoriaproducto extends BaseController
{

    public function __construct()
    {

    }

    public function index()
    {
        $l_FrontEnd = [];
        return $this->ConstruirMenu('categoriaproducto/listar',$l_FrontEnd);
    }

    public function crear($p_Id_CategoriaPro = 0)
    {
        $l_ENResponse = new ENResponse;
        $l_LNCategoriaproducto = new LNCategoriaproducto;
        $l_ENDataService = new ENDataService;
        $l_LNParsistema = new LNParsistema();
        $l_FrontEnd = null; // Datos que se enviaran a la vista
        $l_Busqueda = null; //Busqueda en el web Service
        $l_ListCategoriasPadre = null; //Lista de categorias padre
        $l_CategoriaProducto = null;  //Categoria Buscada
        $l_List_Flg_ValStock = []; //Lista tipos de validacion Stock
        $l_State_Validation_Stock_Category = 28; //ESTADOS DE VALIDACION DE STOCK POR CATEGORIA

        $l_ENDataService->Paginacion->Num_Seccion = 1;
        $l_ENDataService->Paginacion->Tip_Busqueda = 2;
        $l_ENDataService->Paginacion->Tip_Listado = 4;
        $l_Busqueda["Busqueda_CategoriaProducto"]["Tip_CategoriaPro_Pdr"] = 1;
        $l_ENDataService->Busqueda = $l_Busqueda;

        $l_ENResponse = $l_LNParsistema->Get_Parametros_Sistema($l_State_Validation_Stock_Category,0);
        $l_List_Flg_ValStock = json_decode(json_encode($l_ENResponse->Resultado), true);

        $l_ENResponse = $l_LNCategoriaproducto->Get_Categoria_Producto($l_ENDataService,(int)$this->session->get("Id_Usuario"),(int)$this->session->get("Id_Empresa"),(int)$this->session->get("Id_Tienda")
                                                                                ,(string)$this->session->get("Des_UsuarioTienda"),(string)$this->session->get("Cod_HashTienda"));
        
        if( count($l_ENResponse->Resultado["List_Resultado"])>0 )
        {
            $l_ListCategoriasPadre = $l_ENResponse->Resultado["List_Resultado"];
        }                                                                        

        if( $p_Id_CategoriaPro != 0 )
        {
            $l_Busqueda["Busqueda_CategoriaProducto"]["Id_CategoriaPro"] = $p_Id_CategoriaPro;
            $l_Busqueda["Busqueda_CategoriaProducto"]["Tip_CategoriaPro_Pdr"] = 0;
            $l_ENDataService->Busqueda = $l_Busqueda;
            $l_ENResponse = $l_LNCategoriaproducto->Get_Categoria_Producto($l_ENDataService,(int)$this->session->get("Id_Usuario"),(int)$this->session->get("Id_Empresa"),(int)$this->session->get("Id_Tienda")
                                                                                ,(string)$this->session->get("Des_UsuarioTienda"),(string)$this->session->get("Cod_HashTienda"));
            
            if( count($l_ENResponse->Resultado["List_Resultado"])>0 )
            {
                $l_CategoriaProducto = $l_ENResponse->Resultado["List_Resultado"][0];
            }
        }

        $l_FrontEnd = [
            "ListCategoriasPadre" => $l_ListCategoriasPadre,
            "CategoriaProducto" => $l_CategoriaProducto,
            "v_List_Flg_ValStock" => $l_List_Flg_ValStock
        ];

        return $this->ConstruirMenu('categoriaproducto/crear',$l_FrontEnd);
    }    

    public function Set_Categoria_Producto()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $l_Rpt = new ENResponse;
        $LNCategoriaproducto = new LNCategoriaproducto;
        try
        {
            $l_Rpt = $LNCategoriaproducto->Set_Categoria_Producto($l_request_JSON,(int)$this->session->get("Id_Usuario"),(int)$this->session->get("Id_Empresa"),(int)$this->session->get("Id_Tienda")
                                                                ,(string)$this->session->get("Des_UsuarioTienda"),(string)$this->session->get("Cod_HashTienda"));
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }
        return json_encode($l_Rpt);
    }

    public function Get_Categoria_Producto()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $l_Rpt = new ENResponse;
        $l_request = new ENDataService;
        $LNCategoriaproducto = new LNCategoriaproducto;
        try
        {
            $l_request->Paginacion->Set($l_request_JSON["Paginacion"]);
            if(!empty($l_request_JSON["Busqueda"])) $l_request->Busqueda = $l_request_JSON["Busqueda"];

            $l_Rpt = $LNCategoriaproducto->Get_Categoria_Producto($l_request,(int)$this->session->get("Id_Usuario"),(int)$this->session->get("Id_Empresa"),(int)$this->session->get("Id_Tienda")
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