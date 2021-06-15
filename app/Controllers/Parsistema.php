<?php namespace App\Controllers;

use Exception;
use Throwable;
use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENError as ENError;
use App\Models\CEN\CENConfigsistema as ENConfigsistema;
use App\Models\CEN\CENParsistema as ENParsistema;

use App\Models\CLN\CLNParsistema as LNParsistema;
use App\Models\CLN\CLNConfigsistema as LNConfigsistema;

class Parsistema extends BaseController
{
    public $LNParsistema = null;
    public $LNConfigsistema = null;

    public function __construct()
    {
        $this->LNParsistema = new LNParsistema;
        $this->LNConfigsistema = new LNConfigsistema;
    }

    public function index()
    {
        $l_FrontEnd = [];
        return $this->ConstruirMenu('parsistema/listar',$l_FrontEnd);
    }

    public function crear($p_Id_ConfigSis = 0)
    {
        $l_FrontEnd["DataObject"] = null;
        $ENResponse = new ENResponse;
        $Configsistema = null;

        if($p_Id_ConfigSis != 0)
        {
            $Configsistema = new ENConfigsistema;
            $Configsistema->Id_ConfigSis = $p_Id_ConfigSis;
            $ENResponse = $this->LNParsistema->Get_Config_Parametros_Sistema($Configsistema,true);            
            $l_FrontEnd["DataObject"] = json_decode(json_encode($ENResponse->Resultado->List_Resultado[0]), true);
        }

        return $this->ConstruirMenu('parsistema/crear',$l_FrontEnd);
    }
    
    public function config($p_Id_ConfigSis = 0)
    {
        $l_FrontEnd["DataObject"] = null;
        $ENResponse = new ENResponse;
        $Configsistema = null;

        if($p_Id_ConfigSis != 0)
        {
            $Configsistema = new ENConfigsistema;
            $Configsistema->Id_ConfigSis = $p_Id_ConfigSis;
            $ENResponse = $this->LNParsistema->Get_Config_Parametros_Sistema($Configsistema,true);            
            $l_FrontEnd["DataObject"] = json_decode(json_encode($ENResponse->Resultado->List_Resultado[0]), true);
        }

        return $this->ConstruirMenu('parsistema/config',$l_FrontEnd);
    }    

    public function Get_Config_Parametros_Sistema()
    {
        $l_request = $this->request->getJSON(true);
        $ENResponse = new ENResponse;
        $ENError = new ENError;
        $Configsistema = new ENConfigsistema;

        try
        {   
            $Configsistema->Set($l_request);        
            $ENResponse = $this->LNParsistema->Get_Config_Parametros_Sistema($Configsistema,false);
        }
        catch(Throwable $ex)
        {
            $ENError->Fail(500,500,$ex->getMessage());
            $ENResponse->Error = $ENError;
        }

        return json_encode($ENResponse);
    }

    public function Set_Config_Parametros_Sistema()
    {
        $l_request = $this->request->getJSON(true);
        $ENResponse = new ENResponse;
        $ENError = new ENError;
        $Configsistema = new ENConfigsistema;

        try
        {   $Configsistema->Set($l_request);
            $Configsistema->Id_Usuamodi = (int)$this->session->get("Id_Usuario");       
            $ENResponse = $this->LNParsistema->Set_Config_Parametros_Sistema($Configsistema);
        }
        catch(Throwable $ex)
        {
            $ENError->Fail(500,500,$ex->getMessage());
            $ENResponse->Error = $ENError;
        }

        return json_encode($ENResponse);
    }
    
    public function Get_Parametros_Sistema()
    {
        $l_request = $this->request->getJSON(true);
        $ENResponse = new ENResponse;
        $ENError = new ENError;

        try
        {   
            $l_Cod_Sistema = (int)$l_request["Cod_Sistema"];
            $l_Cod_ParaSistem = (int)$l_request["Cod_ParaSistem"];    
            $ENResponse = $this->LNParsistema->Get_Parametros_Sistema($l_Cod_Sistema,$l_Cod_ParaSistem);
        }
        catch(Throwable $ex)
        {
            $ENError->Fail(500,500,$ex->getMessage());
            $ENResponse->Error = $ENError;
        }

        return json_encode($ENResponse);        
    }

    public function Set_Parametros_Sistema()
    {
        $l_request = $this->request->getJSON(true);
        $ENResponse = new ENResponse;
        $ENError = new ENError;
        $l_Parsistema = new ENParsistema;

        try
        {   $l_Parsistema->Set($l_request);
            $l_Parsistema->Id_Usuamodi = (int)$this->session->get("Id_Usuario");    
            $ENResponse = $this->LNParsistema->Set_Parametros_Sistema($l_Parsistema);
        }
        catch(Throwable $ex)
        {
            $ENError->Fail(500,500,$ex->getMessage());
            $ENResponse->Error = $ENError;
        }

        return json_encode($ENResponse);          
    }

    public function Update_Tbl_Generico()
    {
        $l_request = $this->request->getJSON(true);
        $ENResponse = new ENResponse;
        $ENError = new ENError;

        try
        {    
            $l_Tip_Accion = (int)$l_request["Tip_Accion"];
            $l_Cod_ParSis = (int)$l_request["Cod_ParSis"]; 
            $l_Id_Prikey = (int)$l_request["Id_Prikey"];
            $l_Id_Usuamodi = (int)$this->session->get("Id_Usuario");    
            $ENResponse = $this->LNParsistema->Update_Tbl_Generico($l_Tip_Accion,$l_Cod_ParSis,$l_Id_Prikey,$l_Id_Usuamodi);
        }
        catch(Throwable $ex)
        {
            $ENError->Fail(500,500,$ex->getMessage());
            $ENResponse->Error = $ENError;
        }

        return json_encode($ENResponse);          
    }    

}

?>