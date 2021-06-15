<?php namespace App\Controllers;

use Throwable;
use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENTalonario as ENTalonario;
use App\Models\CEN\CENDataService as ENDataService;

use App\Models\CLN\CLNTalonario as LNTalonario;


class Talonario extends BaseController
{

    public function __construct()
    {

    }

    public function index()
    {
        $l_Rpt = new ENResponse();
        $l_FrontEnd = [];
        $l_LNTalonario = new LNTalonario();

        if( $this->session->get("session") )
        {
            $l_Rpt = $l_LNTalonario->Render_Index();

            $l_FrontEnd = $l_Rpt->Resultado;
        }

        return $this->ConstruirMenu('talonario/listar',$l_FrontEnd);
    }

    public function crear(int $p_Id_Talonario = 0)
    {
        $l_Rpt = new ENResponse();
        $l_FrontEnd = [];
        $l_LNTalonario = new LNTalonario();

        if( $this->session->get("session") )
        {
            $l_Rpt = $l_LNTalonario->Render_Crear($this->session->get("Obj_AutenticacionService"),$p_Id_Talonario);

            $l_FrontEnd = $l_Rpt->Resultado;
        }

        return $this->ConstruirMenu('talonario/crear',$l_FrontEnd);
    }

    public function Get_List_Talonario()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $l_Rpt = new ENResponse();
        $l_LNTalonario = new LNTalonario();
        $l_request = new ENDataService();

        try
        {

            $l_request->Paginacion->Set($l_request_JSON["Paginacion"]);
            if(!empty($l_request_JSON["Busqueda"])) $l_request->Busqueda = $l_request_JSON["Busqueda"];
            $l_Rpt = $l_LNTalonario->Get_List_Talonario($l_request,$this->session->get("Obj_AutenticacionService"));
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }

        return json_encode($l_Rpt);  
    }

    public function Get_Detalle_Talonario(int $p_Id_Tienda)
    {

    }

    public function Set_Talonario()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $l_Rpt = new ENResponse();
        $l_ENTalonario = new ENTalonario();
        $l_LNTalonario = new LNTalonario();

        try
        {
            $l_ENTalonario->Set($l_request_JSON);
            //Al parecer al enviar un elemento de la session como parametro no pierde su forma al ser un parametro
            $l_Rpt = $l_LNTalonario->Set_Talonario($l_ENTalonario,(int)$this->session->get("Id_Usuario"));
           
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }

        return json_encode($l_Rpt); 
    }

    public function Set_Estado_Talonario()
    {
        $l_request_JSON = $this->request->getJSON(true);
        $l_Rpt = new ENResponse();
        $l_Id_Talonairo = 0;
        $l_Tip_Accion = 0;
        $l_LNTalonario = new LNTalonario();

        try
        {
            $l_Id_Talonairo = $l_request_JSON["Id_Talonairo"];
            $l_Tip_Accion = $l_request_JSON["Tip_Accion"];
            $l_Rpt = $l_LNTalonario->Set_Estado_Talonario($l_Id_Talonairo,$l_Tip_Accion,$this->session->get("Obj_AutenticacionService"));  
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }

        return json_encode($l_Rpt); 
    }

}
?>  