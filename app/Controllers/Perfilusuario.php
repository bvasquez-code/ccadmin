<?php namespace App\Controllers;

use Exception;
use App\Models\CEN\CENPerfil as ENPerfil;
use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENError as ENError;
use App\Models\CEN\CENObjetoWeb as ENObjetoWeb;
use App\Models\CLN\CLNPerfilusuario as LNPerfilusuario;
use App\Models\CLN\CLNGenerico as LNGenerico;

use App\Models\CSE\CSEOrquestador as SEOrquestador;
use Throwable;

class Perfilusuario extends BaseController
{
    public $LNPerfilusuario = null;

    public function __construct()
    {
        $this->LNPerfilusuario = new LNPerfilusuario;
    }

    public function index()
    {
        $l_FrontEnd = [];
        return $this->ConstruirMenu('perfilusuario/listar',$l_FrontEnd);
    }

    public function crear($p_Id_Perfil = 0)
    {
        $l_FrontEnd["PerfilUsuario"] = null;
        $ENResponse = new ENResponse();
        $ENPerfil = new ENPerfil();
        $l_LNGenerico = new LNGenerico();
        $l_List_Validaciones = [];
        $l_List_Menu = [];

        $l_List_Validaciones = $l_LNGenerico->Get_List_Validaciones_Perfil();
        $l_List_Validaciones = json_decode(json_encode($l_List_Validaciones), true);

        $l_List_Menu = json_decode(json_encode($this->LNPerfilusuario->Get_List_Menu()), true);

        if($p_Id_Perfil != 0)
        {
            $ENPerfil->Id_Perfil = $p_Id_Perfil;
            $ENResponse = $this->LNPerfilusuario->Get_Perfil_Usuario($ENPerfil);
            $l_FrontEnd["PerfilUsuario"] = (array)$ENResponse->Resultado[0];
        }

        $l_FrontEnd["v_List_Validaciones"] = $l_List_Validaciones;
        $l_FrontEnd["v_List_Menu"] = $l_List_Menu;

        return $this->ConstruirMenu('perfilusuario/crear',$l_FrontEnd);
    }    

    public function Get_Perfil_Usuario()
    {
        $l_request = $this->request->getJSON(true);
        $ENResponse = new ENResponse;
        $ENError = new ENError;
        $ENPerfil = new ENPerfil;

        try
        {   $ENPerfil->Set($l_request);
            $ENPerfil->Id_Empresa = (int)$this->session->get("Id_Empresa");         
            $ENResponse = $this->LNPerfilusuario->Get_Perfil_Usuario($ENPerfil);
        }
        catch(Throwable $ex)
        {
            $ENError->Fail(500,500,$ex->getMessage());
            $ENResponse->Error = $ENError;
        }

        return json_encode($ENResponse);
    }

    public function Set_Perfil_Usuario()
    {
        $l_request = $this->request->getJSON(true);
        $ENResponse = new ENResponse;
        $ENError = new ENError;
        $ENPerfil = new ENPerfil();

        try
        {   $ENPerfil->Set($l_request);
            $ENPerfil->Id_Empresa = (int)$this->session->get("Id_Empresa");
            $ENPerfil->Id_Usuamodi = (int)$this->session->get("Id_Usuario");       
            $ENResponse = $this->LNPerfilusuario->Set_Perfil_Usuario($ENPerfil);
        }
        catch(Throwable $ex)
        {
            $ENError->Fail(500,500,$ex->getMessage());
            $ENResponse->Error = $ENError;
        }

        return json_encode($ENResponse);
    }
    
    public function Get_Prueba()
    {
        $l_Response = null;
        $SEOrquestador = new SEOrquestador;
        $l_Response = $SEOrquestador->Get_Prueba();
        return json_encode($l_Response);
    }

    public function Get_Permisos_Perfil()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $l_Rpt = new ENResponse();
        $l_Id_Perfil = 0;
        try
        {
            $l_Id_Perfil = (int)$l_request_JSON["Id_Perfil"];
            $l_Rpt = $this->LNPerfilusuario->Get_Permisos_Perfil($l_Id_Perfil,$this->session->get("Obj_AutenticacionService")); 
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }

        return json_encode($l_Rpt);  
    }

}

?>