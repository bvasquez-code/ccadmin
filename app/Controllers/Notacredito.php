<?php namespace App\Controllers;

use Throwable;
use App\Models\CEN\CENResponse as ENResponse;


class Notacredito extends BaseController
{

    public function __construct()
    {

    }

    public function index()
    {
        return $this->ConstruirMenu('notacredito/listar',[]);   
    }

}
?>      