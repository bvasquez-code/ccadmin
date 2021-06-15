<?php namespace App\Controllers;

use Exception;
use Throwable;
use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENError as ENError;
use App\Models\CEN\CENMenu as ENMenu;
use App\Models\CLN\CLNOpcionesmenu as LNOpcionesmenu;
use App\Models\CLN\CLNConfigsistema as LNConfigsistema;



class Opcionesmenu extends BaseController
{
    public $LNOpcionesmenu = null;
    public $LNConfigsistema = null;

    public function __construct()
    {
        $this->LNOpcionesmenu = new LNOpcionesmenu;
        $this->LNConfigsistema = new LNConfigsistema;
    }

    public function index()
    {
        $l_FrontEnd = [];
        return $this->ConstruirMenu('opcionesmenu/listar',$l_FrontEnd);
    }

    public function crear($p_Id_Menu = 0)
    {
        $l_FrontEnd["Menu"] = null;
        $l_FrontEnd["ListMenu"] = null;

        $ENResponse = new ENResponse;
        $Menu = new ENMenu;

        $Menu->Num_Pagina = 0;
        $Menu->Num_RegistroIni = 0;
        $ENResponse = $this->LNOpcionesmenu->Get_Menu($Menu);  
        $l_FrontEnd["ListMenu"] = (array)$ENResponse->Resultado->List_Resultado;

        if($p_Id_Menu != 0)
        {
            $Menu->Id_Menu = $p_Id_Menu;
            $ENResponse = $this->LNOpcionesmenu->Get_Menu($Menu);            
            $l_FrontEnd["Menu"] = (array)$ENResponse->Resultado->List_Resultado[0];
        }

        return $this->ConstruirMenu('opcionesmenu/crear',$l_FrontEnd);
    }    

    public function Get_Menu()
    {
        $l_request = $this->request->getJSON(true);
        $ENResponse = new ENResponse;
        $ENError = new ENError;
        $Menu = new ENMenu;

        try
        {   
            $Menu->Set($l_request);        
            $ENResponse = $this->LNOpcionesmenu->Get_Menu($Menu);
        }
        catch(Throwable $ex)
        {
            $ENError->Fail(500,500,$ex->getMessage());
            $ENResponse->Error = $ENError;
        }

        return json_encode($ENResponse);
    }

    public function Set_Menu()
    {
        $l_request = $this->request->getJSON(true);
        $ENResponse = new ENResponse;
        $ENError = new ENError;
        $Menu = new ENMenu;

        try
        {   $Menu->Set($l_request);
            $Menu->Id_Usuamodi = (int)$this->session->get("Id_Usuario");       
            $ENResponse = $this->LNOpcionesmenu->Set_Menu($Menu);
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