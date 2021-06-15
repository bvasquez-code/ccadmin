<?php namespace App\Controllers;

use Exception;
use Throwable;

use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENDataService as ENDataService;

use App\Models\CLN\CLNProveedor as LNProveedor;
use App\Models\CEN\CENProveedor as ENProveedor;

class Proveedor extends BaseController
{

    public function __construct()
    {
    }

    public function index()
    {
        $l_FrontEnd = [];
        return $this->ConstruirMenu('proveedor/listar',$l_FrontEnd);
    }

    public function crear(int $p_Id_Proveedor = 0)
    {
        $l_Rpt = new ENResponse();
        $l_LNProveedor = new LNProveedor($this->session->get("Obj_AutenticacionService"));

        if( $this->session->get("session") )
        {
            $l_Rpt = $l_LNProveedor->Render_crear($p_Id_Proveedor);
        }

        return $this->ConstruirMenu('proveedor/crear',$l_Rpt->Resultado);
    }

    public function Get_Lista_Proveedor()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $l_Rpt = new ENResponse();
        $l_request = new ENDataService();
        $l_LNProveedor = new LNProveedor($this->session->get("Obj_AutenticacionService"));

        try
        {
            $l_request->Paginacion->Set($l_request_JSON["Paginacion"]);
            if(!empty($l_request_JSON["Busqueda"])) $l_request->Busqueda = $l_request_JSON["Busqueda"];

            $l_Rpt = $l_LNProveedor->Get_Lista_Proveedor($l_request);
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }

        return json_encode($l_Rpt);
    }

    public function Obtener_Detalle_Proveedor()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $l_Rpt = new ENResponse();
        $l_LNProveedor = null;
        $l_Id_Proveedor = 0;
        try
        {
            $l_LNProveedor = new LNProveedor($this->session->get("Obj_AutenticacionService"));

            $l_Id_Proveedor = (int)$l_request_JSON["Id_Proveedor"];

            $l_Rpt = $l_LNProveedor->Obtener_Detalle_Proveedor($l_Id_Proveedor);
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }

        return json_encode($l_Rpt);
    }



}

?>