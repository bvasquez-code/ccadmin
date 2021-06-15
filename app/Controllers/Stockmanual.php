<?php namespace App\Controllers;

use Throwable;
use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENDataService as ENDataService;

use App\Models\CLN\CLNStockmanual as LNStockmanual;

class Stockmanual extends BaseController
{

    public function __construct()
    {

    }

    public function index()
    {
        $l_FrontEnd = [];
        return $this->ConstruirMenu('stockmanual/listar',$l_FrontEnd);
    }

    public function crear()
    {
        $l_FrontEnd = [];
        $Rpt = new ENResponse();
        $LNStockmanual = new LNStockmanual();
        $l_List_Tienda = [];

        $Rpt = $LNStockmanual->Get_Tienda((int)$this->session->get("Id_Tienda"),(int)$this->session->get("Id_Usuario"));
        $l_List_Tienda = json_decode(json_encode($Rpt->Resultado), true);

        $l_FrontEnd = [
            "List_Tienda" => $l_List_Tienda
        ];

        return $this->ConstruirMenu('stockmanual/crear',$l_FrontEnd);
    }

    public function confirmar(int $p_Id_Otr_Tran_Comercial=0)
    {
        $l_FrontEnd = [];
        $LNStockmanual = new LNStockmanual();
        $l_Rpt = new ENResponse();
        $l_Obj_OtrOpeComerciales = [];

        $l_Rpt = $LNStockmanual->Get_Detalle_Carga_Stock_Formateado($p_Id_Otr_Tran_Comercial,(int)$this->session->get("Id_Tienda"),(int)$this->session->get("Id_Empresa"));

        $l_Obj_OtrOpeComerciales = json_decode(json_encode($l_Rpt->Resultado), true);

        $l_FrontEnd = [
            "Obj_OtrOpeComerciales" => $l_Obj_OtrOpeComerciales
        ];

        return $this->ConstruirMenu('stockmanual/confirmar',$l_FrontEnd);
    }

    public function Set_Stock()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $lLNStockmanual = new LNStockmanual();
        $l_Rpt = new ENResponse();
        try
        {
            $l_Rpt = $lLNStockmanual->Set_Stock_Inicial($l_request_JSON,(int)$this->session->get("Id_Usuario"),(int)$this->session->get("Id_Empresa"),(int)$this->session->get("Id_Tienda")
            ,(string)$this->session->get("Des_UsuarioTienda"),(string)$this->session->get("Cod_HashTienda"));
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }
        return json_encode($l_Rpt);   
    }

    public function Get_Carga_Stock()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $lLNStockmanual = new LNStockmanual();
        $l_Rpt = new ENResponse();
        $l_request = new ENDataService();
        try
        {
            $l_request->Paginacion->Set($l_request_JSON["Paginacion"]);
            if(!empty($l_request_JSON["Busqueda"])) $l_request->Busqueda = $l_request_JSON["Busqueda"];

            $l_Rpt = $lLNStockmanual->Get_Carga_Stock($l_request,(int)$this->session->get("Id_Usuario"),(int)$this->session->get("Id_Tienda"),(int)$this->session->get("Id_Empresa"));
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }
        return json_encode($l_Rpt);   
    }

    public function Get_Formato_Carga_Stock()
    {
        $l_Rpt = new ENResponse();
        $lLNStockmanual = new LNStockmanual();
        try
        {
            $l_Rpt = $lLNStockmanual->Get_Formato_Carga_Stock();
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }
        return json_encode($l_Rpt);
    }

    public function Set_Confirmacion_Stock()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $lLNStockmanual = new LNStockmanual();
        $l_Rpt = new ENResponse();
        $p_Id_OtrTrxComercial = 0;
        $p_Id_Tienda_Destino = 0;
        $p_Des_KayTipoCarga = "";
        try
        {
            $p_Id_OtrTrxComercial = (int)$l_request_JSON["Id_OtrTrxComercial"];
            $p_Id_Tienda_Destino = (int)$l_request_JSON["Id_Tienda_Destino"];
            $p_Des_KayTipoCarga = (string)$l_request_JSON["Des_KayTipoCarga"];
            
            $l_Rpt = $lLNStockmanual->Set_Confirmacion_Stock($p_Id_OtrTrxComercial,$p_Id_Tienda_Destino,$p_Des_KayTipoCarga,(int)$this->session->get("Id_Usuario"),(int)$this->session->get("Id_Empresa"),(int)$this->session->get("Id_Tienda")
            ,(string)$this->session->get("Des_UsuarioTienda"),(string)$this->session->get("Cod_HashTienda"));
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }
        return json_encode($l_Rpt);
    }

}
?>      