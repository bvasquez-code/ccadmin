<?php namespace App\Controllers;

use Throwable;
use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENParbusqueda as ENParbusqueda;
use App\Models\CEN\CENDataService as ENDataService;

use App\Models\CLN\CLNConfigsistema as LNConfigsistema;
use App\Models\CLN\CLNKardex as LNKardex;


class Kardex extends BaseController
{

    public function __construct()
    {

    }

    public function index()
    {
        $l_FrontEnd = [];

        $l_LNConfigsistema = new LNConfigsistema(); 
        $l_List_Par_Busqueda = []; //Lista de condiciones de busqueda de parametros
        $l_Parbusqueda = new ENParbusqueda();//Parametro de busqueda
        $l_List_Documento_Venta = [];


        $l_Parbusqueda->key = "Num_Cfpsis_Sm1";
        $l_Parbusqueda->Val = 0;
        $l_Parbusqueda->Ope = "different";
        array_push($l_List_Par_Busqueda,$l_Parbusqueda);
        $l_List_Documento_Venta = $l_LNConfigsistema->Get_Parametros_Sistema_object(2,0,"Cod_Cfpsis,Des_Cfpsis_Nom",$l_List_Par_Busqueda);
        $l_List_Documento_Venta = json_decode(json_encode($l_List_Documento_Venta), true);


        $l_FrontEnd = [
            "List_Documento_Venta" => $l_List_Documento_Venta
        ]; 

        return $this->ConstruirMenu('kardex/listar',$l_FrontEnd);
    }


    public function Get_List_Mov_Kardex()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $l_Rpt = new ENResponse();
        $l_LNKardex = new LNKardex;
        $l_request = new ENDataService();
        try
        {
            $l_request->Paginacion->Set($l_request_JSON["Paginacion"]);
            if(!empty($l_request_JSON["Busqueda"])) $l_request->Busqueda = $l_request_JSON["Busqueda"];

            $l_Rpt = $l_LNKardex->Get_List_Mov_Kardex($l_request,$this->session->get("Obj_AutenticacionService"));
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }

        return json_encode($l_Rpt);
    }

}
?>      