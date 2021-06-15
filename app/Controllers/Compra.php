<?php namespace App\Controllers;

use Throwable;
use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENDataService as ENDataService;

use App\Models\CLN\CLNCompra as LNCompra;

class Compra extends BaseController
{

     public function __construct()
     {

     }

     public function index()
     {
          $l_Rpt = new ENResponse();
          $l_LNCompra = null;
          if( $this->session->get("Obj_AutenticacionService") )
          {
               $l_LNCompra = new LNCompra($this->session->get("Obj_AutenticacionService"));

               $l_Rpt = $l_LNCompra->Render_index();
          }
          return $this->ConstruirMenu('compra/listar',$l_Rpt->Resultado);
     }

     public function crear(int $p_Id_Compra = 0)
     {
          $l_Rpt = new ENResponse();
          $l_LNCompra = null;

          if( $this->session->get("Obj_AutenticacionService") )
          {
               $l_LNCompra = new LNCompra($this->session->get("Obj_AutenticacionService"));

               $l_Rpt = $l_LNCompra->Render_crear($p_Id_Compra);
          }
          return $this->ConstruirMenu('compra/crear',$l_Rpt->Resultado);
     }

     public function stockfisico(int $p_Id_Compra = 0)
     {
          $l_Rpt = new ENResponse();
          $l_LNCompra = null;

          if( $this->session->get("Obj_AutenticacionService") )
          {
               $l_LNCompra = new LNCompra($this->session->get("Obj_AutenticacionService"));

               $l_Rpt = $l_LNCompra->Render_stockfisico($p_Id_Compra);
          }

          return $this->ConstruirMenu('compra/stockfisico',$l_Rpt->Resultado);
     }

     public function confirmar(int $p_Id_Compra)
     {
          $l_Rpt = new ENResponse();
          $l_LNCompra = null;

          if( $this->session->get("Obj_AutenticacionService") )
          {
               $l_LNCompra = new LNCompra($this->session->get("Obj_AutenticacionService"));
               $l_Rpt = $l_LNCompra->Render_confirmar($p_Id_Compra);
          }

          return $this->ConstruirMenu('compra/confirmar',$l_Rpt->Resultado);
     }

     public function Data_Crear()
     {
          if( $this->session->get("Obj_AutenticacionService") )
          {
               $l_LNCompra = new LNCompra($this->session->get("Obj_AutenticacionService"));
               echo json_encode($l_LNCompra->Get_Data_General_Crear());
          }
     }

     public function Set_Compra()
     {
          $l_request_JSON = $this->request->getJSON(true);
          $l_Rpt = new ENResponse();
          $l_LNCompra = null;
          try
          {
               $l_LNCompra = new LNCompra($this->session->get("Obj_AutenticacionService"));
               $l_Rpt = $l_LNCompra->Set_Compra($l_request_JSON);           
          }
          catch(Throwable $ex)
          {
               $l_Rpt->Error->Fail(500,500,$ex->getMessage());
          }

          return json_encode($l_Rpt);        
     }
     public function Set_Confirmar_Compra()
     {
          $l_request_JSON = $this->request->getJSON(true);
          $l_Rpt = new ENResponse();
          $l_LNCompra = null;
          try
          {
               $l_LNCompra = new LNCompra($this->session->get("Obj_AutenticacionService"));
               $l_Rpt = $l_LNCompra->Set_Confirmar_Compra($l_request_JSON);           
          }
          catch(Throwable $ex)
          {
               $l_Rpt->Error->Fail(500,500,$ex->getMessage());
          }

          return json_encode($l_Rpt);        
     }

     public function Set_Confirmar_Llegada_Stock()
     {
          $l_request_JSON = $this->request->getJSON(true);
          $l_Rpt = new ENResponse();
          $l_LNCompra = null;
          try
          {
               $l_LNCompra = new LNCompra($this->session->get("Obj_AutenticacionService"));
               $l_Rpt = $l_LNCompra->Set_Confirmar_Llegada_Stock($l_request_JSON);           
          }
          catch(Throwable $ex)
          {
               $l_Rpt->Error->Fail(500,500,$ex->getMessage());
          }

          return json_encode($l_Rpt);        
     }

     public function Get_List_Compra()
     {
          $l_request_JSON = $this->request->getJSON(true);
          $l_Rpt = new ENResponse();
          $l_LNCompra = null;
          $l_request = new ENDataService();
          try
          {
               $l_request->Paginacion->Set($l_request_JSON["Paginacion"]);
               if(!empty($l_request_JSON["Busqueda"])) $l_request->Busqueda = $l_request_JSON["Busqueda"];

               $l_LNCompra = new LNCompra($this->session->get("Obj_AutenticacionService"));
               $l_Rpt = $l_LNCompra->Get_List_Compra($l_request);           
          }
          catch(Throwable $ex)
          {
               $l_Rpt->Error->Fail(500,500,$ex->getMessage());
          }

          return json_encode($l_Rpt);               
     }

     public function Get_Detalle_Compra()
     {
          $l_request_JSON = $this->request->getJSON(true);
          $l_Rpt = new ENResponse();
          $l_LNCompra = null;
          $l_request = new ENDataService();
          $l_Id_Compra = 0;
          try
          {
               $l_LNCompra = new LNCompra($this->session->get("Obj_AutenticacionService"));
               
               $l_Id_Compra = (int)$l_request_JSON["Id_Compra"];

               $l_Rpt = $l_LNCompra->Get_Detalle_Compra($l_Id_Compra);           
          }
          catch(Throwable $ex)
          {
               $l_Rpt->Error->Fail(500,500,$ex->getMessage());
          }

          return json_encode($l_Rpt);          
     }
     

}
?>    