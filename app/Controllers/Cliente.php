<?php namespace App\Controllers;

use Throwable;
use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENDataService as ENDataService;

use App\Models\CLN\CLNCliente as LNCliente;

class Cliente extends BaseController
{

    public function __construct()
    {

    }

    public function index()
    {
        $l_Rpt = new ENResponse();
        $l_LNCliente = null;
        if( $this->session->get("session") )
        {
             $l_LNCliente = new LNCliente();

             $l_Rpt = $l_LNCliente->Render_index();
        }
        return $this->ConstruirMenu('cliente/listar',$l_Rpt->Resultado);   
    }

    public function Get_Cliente()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $l_Rpt = new ENResponse();
        $l_LNCliente = new LNCliente();
        $l_request = new ENDataService();
        try
        {

            $l_request->Paginacion->Set($l_request_JSON["Paginacion"]);
            if(!empty($l_request_JSON["Busqueda"])) $l_request->Busqueda = $l_request_JSON["Busqueda"];

            $l_Rpt = $l_LNCliente->Get_Cliente(
                $l_request
                ,$this->session->get("Obj_AutenticacionService"));
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }

        return json_encode($l_Rpt);
    }

    public function Get_List_Cliente()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $l_Rpt = new ENResponse();
        $l_LNCliente = new LNCliente();
        $l_request = new ENDataService();
        try
        {

            $l_request->Paginacion->Set($l_request_JSON["Paginacion"]);
            if(!empty($l_request_JSON["Busqueda"])) $l_request->Busqueda = $l_request_JSON["Busqueda"];

            $l_Rpt = $l_LNCliente->Get_List_Cliente(
                $l_request
                ,$this->session->get("Obj_AutenticacionService"));
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }

        return json_encode($l_Rpt);
    }

}
?>      