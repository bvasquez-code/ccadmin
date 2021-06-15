<?php namespace App\Controllers;

use Exception;
use Throwable;
use App\Models\CEN\CENResponse as ENResponse;

use App\Models\CLN\CLNProceso as LNProceso;


class Proceso extends BaseController
{

    public function __construct()
    {

    }

    public function index()
    {
        $l_FrontEnd = [];
        return $this->ConstruirMenu('proceso/listar',$l_FrontEnd);
    }


    public function Delete_Limpiar_Sesiones()
	{	
		$l_Rpt = new ENResponse();
		$l_LNProceso = new LNProceso();
		try{

			$l_Data_Ger = $_SERVER['REDIRECT_QUERY_STRING'];

			$l_Rpt = $l_LNProceso->Delete_Limpiar_Sesiones($l_Data_Ger);

		}catch(Throwable $ex){

			$l_Rpt->Error->Fail(500,500,$ex->getMessage());
		}

		return json_encode($l_Rpt); 
	}

	public function Update_Estado_Promo_General()
	{	
		$l_Rpt = new ENResponse();
		$l_LNProceso = new LNProceso();
		try{

			$l_Data_Ger = $_SERVER['REDIRECT_QUERY_STRING'];

			$l_Rpt = $l_LNProceso->Update_Estado_Promo_General($l_Data_Ger);

		}catch(Throwable $ex){

			$l_Rpt->Error->Fail(500,500,$ex->getMessage());
		}

		return json_encode($l_Rpt); 
	}

	public function Get_List_Procesos()
	{	
		$l_Rpt = new ENResponse();
		$l_LNProceso = new LNProceso();
		try{

			$l_Rpt = $l_LNProceso->Get_List_Procesos($this->session->get("Obj_AutenticacionService"));

		}catch(Throwable $ex){

			$l_Rpt->Error->Fail(500,500,$ex->getMessage());
		}

		return json_encode($l_Rpt); 
	}

	public function Ejecutar_Proceso()
	{
		$l_request_JSON = $this->request->getJSON(true);
		$l_Rpt = new ENResponse();
		$l_LNProceso = new LNProceso();
		$l_Id_Proceso = 0;

		try{

			$l_Id_Proceso = (int)$l_request_JSON["Id_Proceso"];

			$l_Rpt = $l_LNProceso->Ejecutar_Proceso($l_Id_Proceso,$this->session->get("Obj_AutenticacionService"));

		}catch(Throwable $ex){

			$l_Rpt->Error->Fail(500,500,$ex->getMessage());
		}

		return json_encode($l_Rpt); 		
	}


}