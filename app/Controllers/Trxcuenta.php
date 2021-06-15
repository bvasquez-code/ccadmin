<?php namespace App\Controllers;

use Throwable;
use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENTrxCuenta as ENTrxCuenta;

use App\Models\CLN\CLNTrxcuenta as LNTrxcuenta;

use App\Models\CEN\CENDataService as ENDataService;


class Trxcuenta extends BaseController
{

    public function __construct()
    {

    }

    public function index()
    {
        $l_Rpt = new ENResponse();
        $l_FrontEnd = [];
        $l_LNTrxcuenta = new LNTrxcuenta();
        if( $this->session->get("session") )
        {
            $l_Rpt = $l_LNTrxcuenta->Render_Index($this->session->get("Obj_AutenticacionService"));

            $l_FrontEnd = $l_Rpt->Resultado;
        }
        return $this->ConstruirMenu('trxcuenta/listar',$l_FrontEnd);
    }

    public function crear()
    {
        $l_Rpt = new ENResponse();
        $l_FrontEnd = [];
        $l_LNTrxcuenta = new LNTrxcuenta();
        if( $this->session->get("session") )
        {
            $l_Rpt = $l_LNTrxcuenta->Render_Crear($this->session->get("Obj_AutenticacionService"));

            $l_FrontEnd = $l_Rpt->Resultado;
        }
        return $this->ConstruirMenu('trxcuenta/crear',$l_FrontEnd);        
    }

    public function Get_List_Cuenta()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $l_Rpt = new ENResponse();
        $l_LNTrxcuenta = new LNTrxcuenta();
        $l_Id_Tienda = 0;
        try
        {
            $l_Id_Tienda = (int)$l_request_JSON["Id_Tienda"];
            $l_Rpt = $l_LNTrxcuenta->Get_List_Cuenta($l_Id_Tienda);           
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }

        return json_encode($l_Rpt); 
    }

    public function Set_Trx_Cuenta()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $l_TrxCuenta = new ENTrxCuenta();
        $l_Rpt = new ENResponse();
        $l_LNTrxcuenta = new LNTrxcuenta();
        try
        {
            $l_TrxCuenta->Set($l_request_JSON);
            $l_Rpt = $l_LNTrxcuenta->Set_Trx_Cuenta($l_TrxCuenta,$this->session->get("Obj_AutenticacionService"));           
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }

        return json_encode($l_Rpt);
    }

    public function Get_List_Trx_Cuenta()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $l_Rpt = new ENResponse();
        $l_LNTrxcuenta = new LNTrxcuenta();
        $l_request = new ENDataService();
        try
        {

            $l_request->Paginacion->Set($l_request_JSON["Paginacion"]);
            if(!empty($l_request_JSON["Busqueda"])) $l_request->Busqueda = $l_request_JSON["Busqueda"];

            $l_Rpt = $l_LNTrxcuenta->Get_List_Trx_Cuenta($l_request);
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }

        return json_encode($l_Rpt);
    }
}
?>