<?php namespace App\Controllers;

use Throwable;
use App\Models\CEN\CENResponse as ENResponse;


use App\Models\CEN\CENDataService as ENDataService;

use App\Models\CLN\CLNPromo as LNPromo;

class Promo extends BaseController
{

    public function __construct()
    {

    }

    public function index()
    {
        $l_Rpt = new ENResponse();
        $l_FrontEnd = [];
        $l_LNPromo = new LNPromo();

        if( $this->session->get("session") )
        {
            $l_Rpt = $l_LNPromo->Render_Index($this->session->get("Obj_AutenticacionService"));

            $l_FrontEnd = $l_Rpt->Resultado;
        }

        return $this->ConstruirMenu('promo/listar',$l_FrontEnd);
    }

    public function crear()
    {
        $l_Rpt = new ENResponse();
        $l_FrontEnd = [];
        $l_LNPromo = new LNPromo();

        if( $this->session->get("session") )
        {
            $l_Rpt = $l_LNPromo->Render_Crear($this->session->get("Obj_AutenticacionService"));

            $l_FrontEnd = $l_Rpt->Resultado;
        }

        return $this->ConstruirMenu('promo/crear',$l_FrontEnd);
    }

    public function Get_List_Promocion()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $l_Rpt = new ENResponse();
        $l_LNPromo = new LNPromo();
        $l_request = new ENDataService();
        try
        {
            $l_request->Paginacion->Set($l_request_JSON["Paginacion"]);
            if(!empty($l_request_JSON["Busqueda"])) $l_request->Busqueda = $l_request_JSON["Busqueda"];

            $l_Rpt = $l_LNPromo->Get_List_Promocion($l_request,$this->session->get("Obj_AutenticacionService"));           
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }

        return json_encode($l_Rpt);         
    }

    public function Set_Promocion()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $l_Rpt = new ENResponse();
        $l_LNPromo = new LNPromo();
        $l_Obj_Promo = [];

        try
        {
            $l_Obj_Promo = $l_request_JSON;
            $l_Rpt = $l_LNPromo->Set_Promocion($l_Obj_Promo,$this->session->get("Obj_AutenticacionService")); 
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }

        return json_encode($l_Rpt);  
    }

    public function Set_Confirmar_Promocion()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $l_Rpt = new ENResponse();
        $l_LNPromo = new LNPromo();
        $l_Id_Promocion = 0;

        try
        {
            $l_Id_Promocion = $l_request_JSON["Id_Promocion"];
            $l_Rpt = $l_LNPromo->Set_Confirmar_Promocion($l_Id_Promocion,$this->session->get("Obj_AutenticacionService")); 
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }

        return json_encode($l_Rpt);  
    }

    public function Set_Eliminar_Promocion()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $l_Rpt = new ENResponse();
        $l_LNPromo = new LNPromo();
        $l_Id_Promocion = [];

        try
        {
            $l_Id_Promocion = $l_request_JSON["Id_Promocion"];
            $l_Rpt = $l_LNPromo->Set_Eliminar_Promocion($l_Id_Promocion,$this->session->get("Obj_AutenticacionService")); 
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }

        return json_encode($l_Rpt);  
    }

}
?>