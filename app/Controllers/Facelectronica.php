<?php namespace App\Controllers;

use Throwable;
use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENTrxCuenta as ENTrxCuenta;

use App\Models\CLN\CLNFacElectronica as LNFacElectronica;

use App\Models\CEN\CENDataService as ENDataService;


class Facelectronica extends BaseController
{

    public function __construct()
    {

    }

    public function index()
    {
        $l_Rpt = new ENResponse();
        $l_FrontEnd = [];
        $l_LNFacElectronica = new LNFacElectronica();
        if( $this->session->get("session") )
        {
            $l_Rpt = $l_LNFacElectronica->Render_Index($this->session->get("Obj_AutenticacionService"));

            $l_FrontEnd = $l_Rpt->Resultado;
        }
        return $this->ConstruirMenu('facelectronica/listar',$l_FrontEnd);
    }


    public function Get_List_Log_Sunat()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $l_Rpt = new ENResponse();
        $l_LNFacElectronica = new LNFacElectronica();
        $l_request = new ENDataService();
        try
        {
            $l_request->Paginacion->Set($l_request_JSON["Paginacion"]);
            if(!empty($l_request_JSON["Busqueda"])) $l_request->Busqueda = $l_request_JSON["Busqueda"];

            $l_Rpt = $l_LNFacElectronica->Get_List_Log_Sunat($l_request);
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }

        return json_encode($l_Rpt);        
    }

    public function Enviar_Factura_Sunat_Individual( )
    {
        $l_request_JSON = $this->request->getJSON(true);
        $l_Rpt = new ENResponse();
        $l_LNFacElectronica = new LNFacElectronica();
        try
        {

            $l_Rpt = $l_LNFacElectronica->Enviar_Factura_Sunat_Individual(
                 (int)$l_request_JSON["Tip_Documento"]
                ,(int)$l_request_JSON["Id_Iftrx"]
                ,(int)$l_request_JSON["Id_Trx"]
                ,$this->session->get("Obj_AutenticacionService")
            );
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }

        return json_encode($l_Rpt); 
    }

}
?>