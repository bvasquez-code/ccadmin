<?php namespace App\Controllers;

use Throwable;
use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CLN\CLNGenerico as LNGenerico;

class Generico extends BaseController
{

     public function __construct()
     {

     }

     public function Get_Validacion_Tipo_Cambio_Fecha()
     {
          $l_request_JSON = $this->request->getJSON(true);
          $l_Rpt = new ENResponse();
          $l_LNGenerico = new LNGenerico();
          $l_Tip_Moneda = 0;
          try
          {
                $l_Tip_Moneda = (int)$l_request_JSON["Tip_Moneda"];
                $l_Rpt = $l_LNGenerico->Get_Validacion_Tipo_Cambio_Fecha($l_Tip_Moneda);           
          }
          catch(Throwable $ex)
          {
               $l_Rpt->Error->Fail(500,500,$ex->getMessage());
          }

          return json_encode($l_Rpt);               
     }

     public function Get_List_Departamento()
     {
          $l_Rpt = new ENResponse();
          $l_LNGenerico = new LNGenerico();
          try
          {
                $l_Rpt->Resultado = $l_LNGenerico->Get_List_Departamento();           
          }
          catch(Throwable $ex)
          {
               $l_Rpt->Error->Fail(500,500,$ex->getMessage());
          }

          return json_encode($l_Rpt);               
     }

     public function Get_List_Provincia()
     {
          $l_request_JSON = $this->request->getJSON(true);
          $l_Rpt = new ENResponse();
          $l_LNGenerico = new LNGenerico();
          $p_Cod_Departamento = "";
          try
          {
               $p_Cod_Departamento = (string)$l_request_JSON["Cod_Departamento"];
                $l_Rpt->Resultado = $l_LNGenerico->Get_List_Provincia($p_Cod_Departamento);           
          }
          catch(Throwable $ex)
          {
               $l_Rpt->Error->Fail(500,500,$ex->getMessage());
          }

          return json_encode($l_Rpt);               
     }

     public function Get_List_Distrito()
     {
          $l_request_JSON = $this->request->getJSON(true);
          $l_Rpt = new ENResponse();
          $l_LNGenerico = new LNGenerico();
          $p_Cod_Departamento = "";
          $p_Cod_Provincia = "";
          try
          {
               $p_Cod_Departamento = (string)$l_request_JSON["Cod_Departamento"];
               $p_Cod_Provincia = (string)$l_request_JSON["Cod_Provincia"];

               $l_Rpt->Resultado = $l_LNGenerico->Get_List_Distrito($p_Cod_Departamento,$p_Cod_Provincia);           
          }
          catch(Throwable $ex)
          {
               $l_Rpt->Error->Fail(500,500,$ex->getMessage());
          }

          return json_encode($l_Rpt);               
     }

     public function Get_List_Almacen()
     {
          $l_request_JSON = $this->request->getJSON(true);
          $l_Rpt = new ENResponse();
          $l_LNGenerico = new LNGenerico();
          $l_Id_Almacen = 0;
          try
          {
               $l_Id_Almacen = (int)$l_request_JSON["Id_Almacen"];
               $l_LNGenerico->Set_Obj_Aut($this->session->get("Obj_AutenticacionService"));
               $l_Rpt->Resultado = $l_LNGenerico->Get_List_Almacen($l_Id_Almacen);           
          }
          catch(Throwable $ex)
          {
               $l_Rpt->Error->Fail(500,500,$ex->getMessage());
          }

          return json_encode($l_Rpt);               
     }

}
?>