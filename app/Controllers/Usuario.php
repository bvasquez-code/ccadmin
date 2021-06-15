<?php namespace App\Controllers;

use Throwable;
use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENUsuarioSistema as ENUsuarioSistema;
use App\Models\CEN\CENAutenticacionService as ENAutenticacionService;
use App\Models\CEN\CENDataService as ENDataService;

use App\Models\CLN\CLNUsuario as LNUsuario;
use App\Models\CLN\CLNParsistema as LNParsistema;
use App\Models\CLN\CLNGenerico as LNGenerico;

class Usuario extends BaseController
{

    public function __construct()
    {

    }

    public function index()
    {
        $l_FrontEnd = [];  

        return $this->ConstruirMenu('usuario/listar',$l_FrontEnd);
    }

    public function crear(int $p_Id_Usuario = 0)
    {
        $l_Rpt = new ENResponse();
        $l_LNUsuario = new LNUsuario();

        if( $this->session->get("session") )
        {
            $l_Rpt = $l_LNUsuario->Render_Crear($p_Id_Usuario,$this->session->get("Obj_AutenticacionService"));
        }

        return $this->ConstruirMenu('usuario/crear',$l_Rpt->Resultado);
    }
    
    public function Get_Perfil_Usuario()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $l_Rpt = new ENResponse();
        $l_LNUsuario = new LNUsuario();
        $l_Id_Usuario = 0;

        try
        {
            $l_Id_Usuario = (int)$l_request_JSON["Id_Usuario"];

            $l_Rpt = $l_LNUsuario->Get_Perfil_Usuario($l_Id_Usuario);
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }

        return json_encode($l_Rpt);
    }

    public function Set_Usuario()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $l_Rpt = new ENResponse();
        $l_LNUsuario = new LNUsuario();
        $l_UsuarioSistema = new ENUsuarioSistema();

        try
        {
            $l_UsuarioSistema->Set($l_request_JSON);

            $l_Rpt = $l_LNUsuario->Set_Usuario($l_UsuarioSistema,$this->session->get("Obj_AutenticacionService"));
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }

        return json_encode($l_Rpt);
    }

    public function Get_List_Usuarios()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $l_Rpt = new ENResponse();
        $l_LNUsuario = new LNUsuario();
        $l_request = new ENDataService();

        try
        {
            $l_request->Paginacion->Set($l_request_JSON["Paginacion"]);
            if(!empty($l_request_JSON["Busqueda"])) $l_request->Busqueda = $l_request_JSON["Busqueda"];

            $l_Rpt = $l_LNUsuario->Get_List_Usuarios($l_request,$this->session->get("Obj_AutenticacionService"));
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }

        return json_encode($l_Rpt);        
    }
}
?>   