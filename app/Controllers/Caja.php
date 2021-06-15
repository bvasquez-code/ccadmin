<?php namespace App\Controllers;

use Throwable;
use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENDataService as ENDataService;
use App\Models\CEN\CENCaja as ENCaja;

use App\Models\CLN\CLNCaja as LNCaja;
use App\Models\CLN\CLNGenerico as LNGenerico;

class Caja extends BaseController
{

    public function __construct()
    {

    }

    public function index()
    {
        $l_FrontEnd = [];

        return $this->ConstruirMenu('caja/listar',$l_FrontEnd);
    }

    public function crear(int $p_Id_Caja=0)
    {
        $l_Rpt = new ENResponse();
        $l_FrontEnd = [];
        $l_LNCaja = new LNCaja();

        if( $this->session->get("session") )
        {
            $l_Rpt = $l_LNCaja->Render_Crear($p_Id_Caja,$this->session->get("Obj_AutenticacionService"));

            $l_FrontEnd = $l_Rpt->Resultado;
        }

        return $this->ConstruirMenu('caja/crear',$l_FrontEnd);
    }

    public function Get_List_Caja()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $l_Rpt = new ENResponse();
        $l_LNCaja = new LNCaja();
        $l_request = new ENDataService();
        try
        {

            $l_request->Paginacion->Set($l_request_JSON["Paginacion"]);
            if(!empty($l_request_JSON["Busqueda"])) $l_request->Busqueda = $l_request_JSON["Busqueda"];

            $l_Rpt = $l_LNCaja->Get_List_Caja($l_request,$this->session->get("Obj_AutenticacionService"));
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }

        return json_encode($l_Rpt);
    }

    public function Get_List_Usuarios_Caja()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $l_LNCaja = new LNCaja();
        $l_Rpt = new ENResponse();
        $l_Id_Caja = 0;
        $l_Id_Tienda = 0;
        try
        {
            $l_Id_Caja = $l_request_JSON["Id_Caja"];
            $l_Id_Tienda = $l_request_JSON["Id_Tienda"];

            $l_Rpt = $l_LNCaja->Get_List_Usuarios_Caja($l_Id_Caja,$l_Id_Tienda,(int)$this->session->get("Id_Empresa"));
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }
        return json_encode($l_Rpt);
    }

    public function Set_Caja()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $l_Rpt = new ENResponse();
        $l_LNCaja = new LNCaja();
        $l_request = new ENCaja();
        try
        {

            $l_request->Set($l_request_JSON);

            $l_Rpt = $l_LNCaja->Set_Caja($l_request,$this->session->get("Obj_AutenticacionService"));
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }

        return json_encode($l_Rpt);
    }

}
?>      