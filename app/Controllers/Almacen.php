<?php namespace App\Controllers;

use Throwable;
use App\Models\CEN\CENResponse as ENResponse;

use App\Models\CLN\CLNAlmacen as LNAlmacen;

class Almacen extends BaseController
{

    public function __construct()
    {
        
    }

    public function index()
    {
        $l_LNAlmacen = null;
        $l_FrontEnd = [];

        if( $this->session->get("session") )
        {
            $l_LNAlmacen = new LNAlmacen($this->session->get("Obj_AutenticacionService"));
            $l_Rpt = $l_LNAlmacen->Render_index();

            $l_FrontEnd = $l_Rpt->Resultado;
        }

        return $this->ConstruirMenu('almacen/listar',$l_FrontEnd);
    }

    public function crear(int $p_Id_Venta)
    {
        $l_LNAlmacen = null;
        $l_FrontEnd = [];

        if( $this->session->get("session") )
        {
            $l_LNAlmacen = new LNAlmacen($this->session->get("Obj_AutenticacionService"));
            $l_Rpt = $l_LNAlmacen->Render_crear($p_Id_Venta);

            $l_FrontEnd = $l_Rpt->Resultado;
        }

        return $this->ConstruirMenu('almacen/crear',$l_FrontEnd);
    }

    public function Set_Confirmacion_Entrega_Stock()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $l_Rpt = new ENResponse();
        $l_LNAlmacen = null;
        try
        {
            $l_LNAlmacen = new LNAlmacen($this->session->get("Obj_AutenticacionService"));

            $l_Rpt = $l_LNAlmacen->Set_Movimiento_Stock_Fisico_Venta($l_request_JSON);           
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }

        return json_encode($l_Rpt);   
    }
}
?>