<?php namespace App\Controllers;

use Throwable;
use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENDataService as ENDataService;

use App\Models\CLN\CLNTransaccion as LNTransaccion;

class Transaccion extends BaseController
{

    public function __construct()
    {

    }

    public function index()
    {
        $l_FrontEnd = [];
        return $this->ConstruirMenu('transaccion/listar',$l_FrontEnd);
    }

    public function Get_List_Trx()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $l_Rpt = new ENResponse();
        $l_LNTransaccion = new LNTransaccion();
        $l_request = new ENDataService();
        try
        {

            $l_request->Paginacion->Set($l_request_JSON["Paginacion"]);
            if(!empty($l_request_JSON["Busqueda"])) $l_request->Busqueda = $l_request_JSON["Busqueda"];

            $l_Rpt = $l_LNTransaccion->Get_List_Trx($l_request,$this->session->get("Obj_AutenticacionService"));
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }

        return json_encode($l_Rpt);
    }

    public function Get_Obj_Trx()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $l_Rpt = new ENResponse();
        $l_LNTransaccion = new LNTransaccion();
        $l_Id_Trx = 0;
        $l_Num_Opcion = 0;
        try
        {

            $l_Id_Trx = (int)$l_request_JSON["Id_Trx"];
            $l_Num_Opcion = (int)$l_request_JSON["Num_Opcion"];

            $l_Rpt = $l_LNTransaccion->Get_Obj_Trx($l_Id_Trx,$l_Num_Opcion);
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }

        return json_encode($l_Rpt);
    }


}