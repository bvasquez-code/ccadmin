<?php namespace App\Models\CLN;

use CodeIgniter\Model;

use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENAutenticacionService as ENAutenticacionService;
use App\Models\CEN\CENRequestService as ENRequestService;

use App\Models\CSE\CSEOrquestador as SEOrquestador;

class CLNWordpress extends Model
{

    public function __construct()
    {

    }

    public function Exportar_Productos_Wordpress(ENAutenticacionService $p_Obj_Aut):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_ENRequestService = new ENRequestService;
        $l_SEOrquestador = new SEOrquestador;
        $l_Obj_Data = [];
        $l_List_Producto = [];
        $l_List_Categoria = [];

        $l_List_Producto_SW = [];
        $l_List_Categoria_SW = [];

        $l_Obj_Data = array(
            "Paginacion" => array(
                "Tip_Busqueda" => 2,
                "Tip_Listado" => 4,
                "Num_Seccion" => 1,
                "Num_RegistroIni" => 0,
                "Num_Intervalo" => 0                
            ),
            "Busqueda" => array(
                "Id_Producto" => 0
            )
        );

        $l_ENRequestService->ObjAute = $p_Obj_Aut;
        $l_ENRequestService->ObjData = $l_Obj_Data;

        $l_Rpt = $l_SEOrquestador->Ejecutar_02_ws_wa_ListarItemsNegocio($l_ENRequestService);
        
        if($l_Rpt->Error->flagerror) return $l_Rpt;
        $l_List_Categoria = $l_Rpt->Resultado["List_Resultado"];

        $l_Obj_Data = array(
            "Paginacion" => array(
                "Tip_Busqueda" => 1,
                "Tip_Listado" => 4,
                "Num_Seccion" => 1,
                "Num_RegistroIni" => 0,
                "Num_Intervalo" => 0                
            ),
            "Busqueda" => array(
                "Id_Producto" => 0
            )
        );

        $l_ENRequestService->ObjAute = $p_Obj_Aut;
        $l_ENRequestService->ObjData = $l_Obj_Data;

        $l_Rpt = $l_SEOrquestador->Ejecutar_03_ws_wa_ListarProductos($l_ENRequestService);
        
        if($l_Rpt->Error->flagerror) return $l_Rpt;
        $l_List_Producto = $l_Rpt->Resultado["List_Resultado"];

        foreach($l_List_Categoria as $Item)
        {
            $l_Categoria["Cod_Categoria"] = $Item["Cod_CategoriaPro"];
            $l_Categoria["Des_Nombre"] = $Item["Des_CategoriaPro_Nom"];
            $l_Categoria["Des_Larga"] = "";
            array_push($l_List_Categoria_SW,$l_Categoria);
        }

        foreach($l_List_Producto as $Item)
        {
            $l_Producto["Cod_Producto"] = $Item["Cod_Producto"];
            $l_Producto["Des_Nombre"] = $Item["Des_Producto_Nom"];
            $l_Producto["Des_Corta"] = "";
            $l_Producto["Des_Larga"] = "";
            $l_Producto["Num_Precio"] = $Item["Num_Producto_Precio"];
            $l_Producto["Num_PrecioPromo"] = 0;
            $l_Producto["Num_Stock"] = $Item["Num_Producto_StockAct"];
            $l_Producto["Des_Categoria"] = $Item["Des_CategPro_Nom"];
            $l_Producto["Url_Imgen_Principal"] = base_url($Item["Des_ProductoImg_Urlp"]);
            array_push($l_List_Producto_SW,$l_Producto);
        }

        $l_Obj_Data = array(
            "Url_Base_Wordpress" => "",
            "Num_Cambio" => 1,
            "Num_Comision" => 5.4,
            "List_Categoria" => $l_List_Categoria_SW,
            "List_Producto" => $l_List_Producto_SW
        );

        $l_ENRequestService->ObjAute = $p_Obj_Aut;
        $l_ENRequestService->ObjData = $l_Obj_Data;

        $l_Rpt = $l_SEOrquestador->Ejecutar_15_ws_wa_ExportWordpress($l_ENRequestService);

        return $l_Rpt;
    }
}