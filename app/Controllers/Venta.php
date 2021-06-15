<?php namespace App\Controllers;

use Throwable;
use App\Models\CEN\CENResponse as ENResponse;

class Venta extends BaseController
{

    public function __construct()
    {

    }

   public function index()
   {
        $l_Rpt = new ENResponse();
        $l_FrontEnd = [];

        return $this->ConstruirMenu('venta/listar',$l_FrontEnd);
   }

}
?>    