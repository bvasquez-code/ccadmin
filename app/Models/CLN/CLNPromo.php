<?php namespace App\Models\CLN;

use CodeIgniter\Model;

use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENRequestService as ENRequestService;
use App\Models\CEN\CENDataService as ENDataService;
use App\Models\CEN\CENParsistema as ENParsistema;
use App\Models\CEN\CENAutenticacionService as ENAutenticacionService;

use App\Models\CSE\CSEOrquestador as SEOrquestador;

use App\Models\CLN\CLNGenerico as LNGenerico;
use App\Models\CLN\CLNConfigsistema as LNConfigsistema;

class CLNPromo extends Model
{

    public function __construct()
    {

    }

    public function Render_Index(ENAutenticacionService $p_Obj_Aut):ENResponse
    {
        $l_FrontEnd = [];
        $l_Rpt = new ENResponse();
        $l_LNGenerico = new LNGenerico();
        $l_List_Tienda = []; //Lista de tiendas

        $l_Rpt = $l_LNGenerico->Get_List_Tienda($p_Obj_Aut->Id_Tienda,$p_Obj_Aut->Id_Usuario);
        $l_List_Tienda = json_decode(json_encode($l_Rpt->Resultado), true);

        $l_FrontEnd = [
            "v_List_Tienda" => $l_List_Tienda
        ];

        $l_Rpt->Resultado = $l_FrontEnd;

        return $l_Rpt;
    }

    public function Render_Crear(ENAutenticacionService $p_Obj_Aut):ENResponse
    {
        $l_FrontEnd = [];
        $l_Rpt = new ENResponse();
        $l_LNGenerico = new LNGenerico();
        $l_List_Tienda = []; //Lista de tiendas
        $l_List_Nivel_Aplicacion = []; //Lista de nivel de aplicacion

        $l_Rpt = $l_LNGenerico->Get_List_Tienda($p_Obj_Aut->Id_Tienda,$p_Obj_Aut->Id_Usuario);
        $l_List_Tienda = json_decode(json_encode($l_Rpt->Resultado), true);

        $l_List_Nivel_Aplicacion = $this->Get_List_Nivel_Aplicacion();
        $l_List_Nivel_Aplicacion = json_decode(json_encode($l_List_Nivel_Aplicacion), true);

        $l_FrontEnd = [
             "v_List_Tienda" => $l_List_Tienda
            ,"v_List_Nivel_Aplicacion" => $l_List_Nivel_Aplicacion
        ];

        $l_Rpt->Resultado = $l_FrontEnd;

        return $l_Rpt;
    }

    public function Get_List_Promocion(ENDataService $p_ObjData,ENAutenticacionService $p_Obj_Autenticacion)
    {
        $l_Rpt = new ENResponse();
        $l_SEOrquestador = new SEOrquestador();
        $l_ObjData = [];

        $l_ObjData["Busqueda"] = $p_ObjData->Busqueda;
        $l_ObjData["Paginacion"] = $p_ObjData->Paginacion;

        $l_Rpt = $l_SEOrquestador->Ejecutar_14_ws_wa_BuscarPromo($l_ObjData,$p_Obj_Autenticacion);
        return $l_Rpt;
    }

    public function Set_Promocion(array $p_Obj_Promo,ENAutenticacionService $p_Obj_Aut)
    {
        $l_Rpt = new ENResponse();
        $l_SEOrquestador = new SEOrquestador();
        $l_ObjData = [];

        $l_ObjData["Des_KeyOperacion"] = "Set_Promotion";
        $l_ObjData["Obj_Promocion"] = $p_Obj_Promo;

        $l_Rpt = $l_SEOrquestador->Ejecutar_18_ws_wa_RegistroPromo($l_ObjData,$p_Obj_Aut);

        return $l_Rpt;
    }

    public function Set_Confirmar_Promocion(int $p_Id_Promocion,ENAutenticacionService $p_Obj_Aut)
    {
        $l_Rpt = new ENResponse();
        $l_SEOrquestador = new SEOrquestador();
        $l_ObjData = [];

        $l_ObjData["Des_KeyOperacion"] = "Confirm_Promotion";
        $l_ObjData["Obj_Promocion"]["Id_Promocion"] = $p_Id_Promocion;

        $l_Rpt = $l_SEOrquestador->Ejecutar_18_ws_wa_RegistroPromo($l_ObjData,$p_Obj_Aut);

        return $l_Rpt;
    }

    public function Set_Eliminar_Promocion(int $p_Id_Promocion,ENAutenticacionService $p_Obj_Aut)
    {
        $l_Rpt = new ENResponse();
        $l_SEOrquestador = new SEOrquestador();
        $l_ObjData = [];

        $l_ObjData["Des_KeyOperacion"] = "Delete_Promotion";
        $l_ObjData["Obj_Promocion"]["Id_Promocion"] = $p_Id_Promocion;

        $l_Rpt = $l_SEOrquestador->Ejecutar_18_ws_wa_RegistroPromo($l_ObjData,$p_Obj_Aut);

        return $l_Rpt;
    }

    public function Get_List_Nivel_Aplicacion():array
    {
        $l_LNConfigsistema = new LNConfigsistema();
        $l_Level_Application_Promotion = 32; //NIVEL DE APLICACIÓN DE LA PROMOCIÓN

        return $l_LNConfigsistema->Get_Parametros_Sistema_object($l_Level_Application_Promotion,0,"",null);
    }
}
?>