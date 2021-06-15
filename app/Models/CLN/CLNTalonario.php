<?php namespace App\Models\CLN;

use CodeIgniter\Model;

use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENTalonario as ENTalonario;
use App\Models\CEN\CENAutenticacionService as ENAutenticacionService;
use App\Models\CEN\CENDataService as ENDataService;

use App\Models\CLN\CLNGenerico as LNGenerico;

use App\Models\CAD\CADTalonario as ADTalonario;

use App\Models\CSE\CSEOrquestador as SEOrquestador;

class CLNTalonario extends Model
{
    

    public function __construct()
    {
    }

    public function Render_Index():ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_FrontEnd = [];
        $l_Rpt->Resultado = $l_FrontEnd;
        return $l_Rpt;
    }

    public function Render_Crear(ENAutenticacionService $p_ObjAut,int $p_Id_Talonario):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_LNGenerico = new LNGenerico();
        $l_FrontEnd = [];
        $l_List_Tienda = [];
        $l_List_Documento = [];
        $l_List_TipTalonario = [];
        $l_Flg_Validar = true; //Aplicar validacion de mostrar todas las tiendas
        $l_Obj_Talonario = [];
        $l_Type_Pay_Stub = 5;

        $l_Rpt = $l_LNGenerico->Get_List_Tienda($p_ObjAut->Id_Tienda,$p_ObjAut->Id_Usuario,$l_Flg_Validar);
        $l_List_Tienda= json_decode(json_encode($l_Rpt->Resultado),true);

        $l_List_Documento = $l_LNGenerico->Get_List_Documento();
        $l_List_Documento = json_decode(json_encode($l_List_Documento),true);

        $l_List_TipTalonario = $l_LNGenerico->Get_Parametros_Sistema($l_Type_Pay_Stub,0)->Resultado;
        $l_List_TipTalonario = json_decode(json_encode($l_List_TipTalonario),true);

        $l_Obj_Talonario = json_decode(json_encode($this->Get_Detalle_Talonario($p_Id_Talonario,$p_ObjAut)->Resultado),true);

        $l_FrontEnd = [
            "v_List_Tienda" => $l_List_Tienda,
            "v_List_Documento" => $l_List_Documento,
            "v_List_TipTalonario" => $l_List_TipTalonario,
            "v_Obj_Talonario" => $l_Obj_Talonario
        ];

        echo json_encode($l_Obj_Talonario);

        $l_Rpt->Resultado = $l_FrontEnd;
        return $l_Rpt;
    }

    public function Get_List_Talonario(ENDataService $p_Request,ENAutenticacionService $p_Obj_Aut):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_SEOrquestador = new SEOrquestador();
        $l_Data = [];

        $l_Rpt =$l_SEOrquestador->Ejecutar_08_ws_wa_ListarElementosVenta(
            $p_Request
            ,$p_Obj_Aut->Id_Usuario
            ,$p_Obj_Aut->Id_Empresa
            ,$p_Obj_Aut->Id_Tienda
            ,$p_Obj_Aut->User
            ,$p_Obj_Aut->Password
        );

        return $l_Rpt;
    }

    public function Get_Detalle_Talonario(int $p_Id_Talonario,ENAutenticacionService $p_Obj_Aut):ENResponse
    {
        $l_SEOrquestador = new SEOrquestador();
        $l_ObjData = [];
        $l_Request = new ENDataService();
        

        $l_ObjData["Des_KeyBusqueda"] = "Search_Detail_Checkbook";
        $l_ObjData["BusquedaTalonario"]["Id_Talonario"] = $p_Id_Talonario;

        $l_Request->Busqueda = $l_ObjData;

        $l_Rpt =$l_SEOrquestador->Ejecutar_08_ws_wa_ListarElementosVenta(
            $l_Request
            ,$p_Obj_Aut->Id_Usuario
            ,$p_Obj_Aut->Id_Empresa
            ,$p_Obj_Aut->Id_Tienda
            ,$p_Obj_Aut->User
            ,$p_Obj_Aut->Password
        );

        return $l_Rpt;
    }

    public function Set_Talonario(ENTalonario $p_Talonario,int $p_Id_Usuario):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_ADTalonario = new ADTalonario();

        $l_Rpt = $l_ADTalonario->Set_Talonario($p_Talonario,$p_Id_Usuario);

        return $l_Rpt;
    }

    
    public function Set_Estado_Talonario(
         int $p_Id_Talonario
        ,int $p_Tip_Accion //3 : eliminar | 4: inactivar | 5: activar
        ,ENAutenticacionService $p_Obj_Aut
    )
    {
        $l_Rpt = new ENResponse();
        $l_LNGenerico = new LNGenerico();
        $l_Num_Tabla = 5; //DA_TALONARIO

        $l_Rpt = $l_LNGenerico->Update_Estado_Tablas_Generico($p_Tip_Accion,$l_Num_Tabla,$p_Id_Talonario,$p_Obj_Aut,0);
        
        return $l_Rpt;
    }


}