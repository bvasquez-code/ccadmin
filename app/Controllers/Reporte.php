<?php namespace App\Controllers;

use Exception;
use Throwable;
use App\Models\CEN\CENResponse as ENResponse;

use App\Models\CLN\CLNReporte as LNReporte;


class Reporte extends BaseController
{

    public function __construct()
    {

    }


    public function ReporteGananciaSKU()
    {
        $l_Rpt = new ENResponse();
        $l_FrontEnd = [];
        $l_LNReporte = new LNReporte();
        $l_QUERY_STRING = "";

        if( $this->session->get("session") )
        {
            if(!empty($_SERVER['REDIRECT_QUERY_STRING']) ) $l_QUERY_STRING = $_SERVER['REDIRECT_QUERY_STRING'];

            $l_Rpt = $l_LNReporte->Render_ReporteGananciaSKU($this->session->get("Obj_AutenticacionService"),$l_QUERY_STRING);

            $l_FrontEnd = $l_Rpt->Resultado;
        }
        return $this->ConstruirMenu('reporte/ReporteGananciaSKU',$l_FrontEnd);
    }


}

?>