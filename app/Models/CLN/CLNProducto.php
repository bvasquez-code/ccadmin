<?php namespace App\Models\CLN;

use CodeIgniter\Model;

use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENRequestService as ENRequestService;
use App\Models\CEN\CENDataService as ENDataService;
use App\Models\CEN\CENParsistema as ENParsistema;
use App\Models\CEN\CENFormatoExcel as ENFormatoExcel;
use App\Models\CEN\CENAutenticacionService as ENAutenticacionService;

use App\Models\CLN\CLNCategoriaproducto as LNCategoriaproducto;
use App\Models\CLN\CLNMarcaproducto as LNMarcaproducto;
use App\Models\CLN\CLNConfigsistema as LNConfigsistema;


use App\Models\CSE\CSEOrquestador as SEOrquestador;

use App\Models\CLN\CLNGenerico as LNGenerico;

class CLNProducto extends Model
{

    public function __construct()
    {

    }

    public function Render_crear(int $p_Id_Producto,ENAutenticacionService $p_Obj_Aut):ENResponse
    {
        $l_ENResponse = new ENResponse();
        $l_LNCategoriaproducto = new LNCategoriaproducto();
        $l_LNMarcaproducto = new LNMarcaproducto();
        $l_LNConfigsistema = new LNConfigsistema();        
        $l_ENDataService = new ENDataService();
        $l_LNGenerico = new LNGenerico();
        $l_FrontEnd = null; // Datos que se enviaran a la vista
        $l_Busqueda = null; //Busqueda en el web Service
        $l_Producto = null; //Datos de producto elegido
        $l_List_Categoria = null; //Lista de categorias
        $l_List_Marca = null; //Lista de marcas
        $l_List_TipoDescuento = null; //Lista de tipos de descuento
        $l_List_TipoMonedas = null; //Lista tipos de moneda
        $l_List_Tip_Afectacion = null; //Lista Tipo de Afectación al IGV
        $l_List_Tip_Tributo = null; //Lista Códigos de Tipos de Tributos - SUNAT

        $l_List_TipoDescuento = $l_LNConfigsistema->Get_Parametros_Sistema_object(G_const_par_TipDescPro,0,"Cod_Cfpsis,Des_Cfpsis_Nom");
        $l_List_TipoDescuento = json_decode(json_encode($l_List_TipoDescuento), true);


        $l_List_TipoMonedas = $l_LNConfigsistema->Get_Parametros_Sistema_object(G_const_par_TipMoneda,0,"Cod_Cfpsis,Des_Cfpsis_Nom,Des_Cfpsis_Tx1");
        $l_List_TipoMonedas = json_decode(json_encode($l_List_TipoMonedas), true);

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

        if ( $p_Id_Producto != 0)
        {
            $l_Producto = $this->Get_Producto_Detalle_Edicion($p_Id_Producto,$p_Obj_Aut)->Resultado;
        }

        $l_List_Tip_Afectacion = json_decode(json_encode($l_LNGenerico->Get_List_Tipo_Afectacion()), true);
        $l_List_Tip_Tributo = json_decode(json_encode($l_LNGenerico->Get_List_Tipo_Tributo()), true);

        $l_FrontEnd = [
            "List_TipoDescuento"=>$l_List_TipoDescuento,
            "List_TipoMonedas"=>$l_List_TipoMonedas,
            "List_Categoria" => $l_List_Categoria,
            "List_Marca" => $l_List_Marca,
            "Id_Producto" => $p_Id_Producto,
            "List_Tip_Afectacion" => $l_List_Tip_Afectacion,
            "List_Tip_Tributo" => $l_List_Tip_Tributo
        ];
        $l_ENResponse = new ENResponse();
        $l_ENResponse->Resultado = $l_FrontEnd;

        return $l_ENResponse;
    }

    public function Render_config(int $p_Id_Producto,ENAutenticacionService $p_Obj_Aut)
    {
        $l_Rpt = new ENResponse();
        $l_FrontEnd = [];

        $l_FrontEnd = [
            "Id_Producto" => $p_Id_Producto
        ];

        $l_Rpt->Resultado = $l_FrontEnd;

        return $l_Rpt;
    }

    public function Render_ver(int $p_Id_Producto,ENAutenticacionService $p_Obj_Aut):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_FrontEnd = [];
        $l_ENDataService = new ENDataService;
        $l_SEOrquestador = new SEOrquestador();
        $l_Producto = null;
        $l_Request = [];


        $l_ENDataService->Paginacion->Tip_Busqueda = 3; //Obtener Producto vista admin
        $l_Busqueda["Id_Producto"] = $p_Id_Producto;            
        $l_ENDataService->Busqueda = $l_Busqueda;

        $l_Request = [
            "ObjAute" => $p_Obj_Aut
            ,"ObjData" =>$l_ENDataService
        ];

        $l_ENResponse = $l_SEOrquestador->Ejecutar_03_ws_wa_ListarProductos($l_Request);
        
        $l_Producto = $l_ENResponse->Resultado;
       

        $l_FrontEnd = [
            "v_Producto" => $l_Producto
        ];

        $l_Rpt->Resultado = $l_FrontEnd;

        return $l_Rpt;
    }
   
    public function Set_Producto($p_request = null,ENAutenticacionService $p_Obj_Aut)
    {
        $l_Rpt = new ENResponse;
        $l_ENRequestService = new ENRequestService;
        $l_SEOrquestador = new SEOrquestador;
        $l_ObjData = [];
        $l_Producto = [];
        $l_List_Producto_Img = [];
        $l_Des_Ruta = "../imgccadmin/producto/";
        $l_Obj_Img_Base64 = null;
        $l_Obj_Img = null;

        if (array_key_exists('List_Producto_Img', $p_request)) {
            
            for( $i = 0 ; count($p_request["List_Producto_Img"])>$i ; $i++ )
            {
                if( $i == 0 )
                {
                    array_push($l_List_Producto_Img,$p_request["Cod_Producto"].".PNG");
                }
                else
                {
                    array_push($l_List_Producto_Img,$p_request["Cod_Producto"]."_".$i.".PNG");
                }
            }
        }

        $l_Producto["Id_Producto"] = $p_request["Id_Producto"];
        $l_Producto["Cod_Producto"] = $p_request["Cod_Producto"];
        $l_Producto["Cod_Barras"] = $p_request["Cod_Barras"];
        $l_Producto["Id_MarcaProducto"] = $p_request["Id_MarcaProducto"];
        $l_Producto["Id_CategoriaProducto"] = $p_request["Id_CategoriaProducto"];
        $l_Producto["Des_Producto_Nom"] = $p_request["Des_Producto_Nom"];
        $l_Producto["Des_Producto_Texto1"] = $p_request["Des_Producto_Texto1"];
        $l_Producto["Des_Producto_Texto2"] = $p_request["Des_Producto_Texto2"];
        $l_Producto["Num_Producto_Precio"] = $p_request["Num_Producto_Precio"];
        $l_Producto["Tip_Producto_Moneda"] = $p_request["Tip_Producto_Moneda"];
        $l_Producto["Num_Producto_StockMin"] = $p_request["Num_Producto_StockMin"];
        $l_Producto["Num_Producto_StockMax"] = $p_request["Num_Producto_StockMax"];
        $l_Producto["Flg_Producto_Desc"] = $p_request["Flg_Producto_Desc"];
        $l_Producto["Tip_Producto_Desc"] = $p_request["Tip_Producto_Desc"];
        $l_Producto["Num_Producto_DescMon"] = $p_request["Num_Producto_DescMon"];
        $l_Producto["Num_Producto_DescPor"] = $p_request["Num_Producto_DescPor"];
        $l_Producto["Flg_Producto_Histo"] = $p_request["Flg_Producto_Histo"];
        $l_Producto["Tip_Afectacion"] = $p_request["Tip_Afectacion"];
        $l_Producto["Tip_Tributo"] = $p_request["Tip_Tributo"];
        $l_Producto["Flg_Producto_Web"] = true;
        $l_Producto["Des_Producto_UrlBase"] = "imgccadmin/producto/";
        $l_Producto["List_Producto_Img"] = $l_List_Producto_Img;

        $l_ObjData["Tip_Carga"] = 4;
        $l_ObjData["Producto"] = $l_Producto;

        $l_ENRequestService->ObjAute = $p_Obj_Aut;
        $l_ENRequestService->ObjData = $l_ObjData;

        $l_Rpt = $l_SEOrquestador->Ejecutar_01_ws_wa_CargasMasivaProducto($l_ENRequestService);

        if(!$l_Rpt->Error->flagerror)
        {
            for( $i = 0 ; count($l_List_Producto_Img) > $i ; $i++ )
            {
                if( trim($p_request["List_Producto_Img"][$i]["Tip_Imagen"]) === "base_64" )
                {
                    $l_Obj_Img_Base64 = explode(',', $p_request["List_Producto_Img"][$i]["Des_Ruta"])[1];
                    $l_Obj_Img = base64_decode($l_Obj_Img_Base64);
        
                    file_put_contents($l_Des_Ruta . $l_List_Producto_Img[$i], $l_Obj_Img);
                }

            }
        }

        return $l_Rpt;
    }

    public function Set_Producto_Masivo($p_ListProducto = null,int $p_Id_Usuario,int $p_Id_Empresa,int $p_Id_Tienda,
                                           string $p_User,string $p_Password)
    {
        $l_Rpt = new ENResponse;
        $l_ENRequestService = new ENRequestService;
        $l_SEOrquestador = new SEOrquestador;
        $l_ObjData = [];

        $l_ObjData["Tip_Carga"] = 3;
        $l_ObjData["ListProducto"] = $p_ListProducto;

        $l_ENRequestService->ObjAute->User = $p_User;
        $l_ENRequestService->ObjAute->Password = $p_Password;
        $l_ENRequestService->ObjAute->Id_Usuario = $p_Id_Usuario;
        $l_ENRequestService->ObjAute->Id_Empresa = $p_Id_Empresa; 
        $l_ENRequestService->ObjAute->Id_Tienda = $p_Id_Tienda; 
        $l_ENRequestService->ObjData = $l_ObjData;   

        $l_Rpt = $l_SEOrquestador->Ejecutar_01_ws_wa_CargasMasivaProducto($l_ENRequestService);

        return $l_Rpt;
    }

    public function Get_Producto_Detalle_Edicion(int $p_Id_Producto,ENAutenticacionService $p_Obj_Aut)
    {
        $l_Rpt = new ENResponse;
        $l_ENRequestService = new ENRequestService;
        $l_SEOrquestador = new SEOrquestador;
        $l_ENDataService = new ENDataService();
        
        $l_ENDataService->Paginacion->Tip_Busqueda = 4; //Obtener Producto
        $l_ENDataService->Paginacion->Tip_Listado = 1; //Tipo de listado limite 10
        $l_Busqueda["Busqueda_Producto"]["Id_Producto"] = $p_Id_Producto;            
        $l_ENDataService->Busqueda = $l_Busqueda;
        $l_ENRequestService->ObjData = $l_ENDataService;

        $l_ENRequestService->ObjAute = $p_Obj_Aut;


        $l_Rpt = $l_SEOrquestador->Ejecutar_02_ws_wa_ListarItemsNegocio($l_ENRequestService);

        return $l_Rpt;
    }

    public function Get_Producto(ENDataService $p_ENDataService,int $p_Id_Usuario,int $p_Id_Empresa,int $p_Id_Tienda,string $p_User,string $p_Password)
    {
        $l_Rpt = new ENResponse;
        $l_ENRequestService = new ENRequestService;
        $l_SEOrquestador = new SEOrquestador;        

        $l_ENRequestService->ObjAute->User = $p_User;
        $l_ENRequestService->ObjAute->Password = $p_Password;
        $l_ENRequestService->ObjAute->Id_Usuario = $p_Id_Usuario;
        $l_ENRequestService->ObjAute->Id_Empresa = $p_Id_Empresa; 
        $l_ENRequestService->ObjAute->Id_Tienda = $p_Id_Tienda; 
        $l_ENRequestService->ObjData = $p_ENDataService;

        $l_Rpt = $l_SEOrquestador->Ejecutar_02_ws_wa_ListarItemsNegocio($l_ENRequestService);

        return $l_Rpt;
    }

    public function Get_Formato_Carga_Producto()
    {
        $l_Rpt = new ENResponse();
        $l_LNGenerico = new LNGenerico();
        $l_Parsistema = new ENParsistema();
        $l_FormatoExcel = new ENFormatoExcel();
        $l_Num_Pfij_Formatos_Excel = 24; // Prefijo de formatos de excel
        $l_Num_Corr_Excel_Stock = 2;
        $l_Fecha_Actual = "";

        $l_Rpt = $l_LNGenerico->Get_Parametros_Sistema($l_Num_Pfij_Formatos_Excel,$l_Num_Corr_Excel_Stock);
        if($l_Rpt->Error->flagerror) return $l_Rpt;

        $l_Fecha_Actual = $l_LNGenerico->Get_Fecha_Sistema_String();

        $l_Parsistema = $l_Rpt->Resultado[0];
        $l_FormatoExcel->Des_NombreExcel = $l_Parsistema->Des_ParSis_Tx1 . "_" . $l_Fecha_Actual;
        $l_FormatoExcel->Obj_Cabecera = explode(",",$l_Parsistema->Des_ParSis_Tx3);
        $l_Rpt->Resultado = $l_FormatoExcel;

        return $l_Rpt;
    }

    public function Get_Data_Crear($p_request,ENAutenticacionService $p_Obj_Aut)
    {
        $l_Rpt = new ENResponse();
        $l_Id_Producto = 0;

        $l_Id_Producto = (key_exists("Id_Producto", $p_request)) ? $p_request["Id_Producto"] : 0;

        $l_Rpt->Resultado = [
            "Producto" => $this->Get_Producto_Detalle_Edicion($l_Id_Producto,$p_Obj_Aut)->Resultado
        ];

        return $l_Rpt;
    }

    public function Set_Variacion_Producto($p_request,ENAutenticacionService $p_Obj_Aut)
    {
        $l_Rpt = new ENResponse();
        $l_SEOrquestador = new SEOrquestador();
        $l_Request = [];

        $l_Request["ObjAute"] = $p_Obj_Aut;
        $l_Request["ObjData"]["Tip_Operacion"] = 1;
        $l_Request["ObjData"]["Id_Producto"] = (int)$p_request["Id_Producto"];
        $l_Request["ObjData"]["Variacion_Producto"]["Id_Variacion"] = (int)$p_request["Id_Variacion"];
        $l_Request["ObjData"]["Variacion_Producto"]["Des_Variacion"] = (string)$p_request["Des_Variacion"];
        
        $l_Rpt = $l_SEOrquestador->Ejecutar_01_ws_wa_CargasMasivaProducto($l_Request,2);

        return $l_Rpt;
    }

}
?>