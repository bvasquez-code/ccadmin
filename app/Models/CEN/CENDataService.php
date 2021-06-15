<?php namespace App\Models\CEN;

use CodeIgniter\MyEntity;
use App\Models\CEN\CENPaginacionService as ENPaginacionService;

class CENDataService extends MyEntity
{   
    public $Paginacion = [];
    public $Busqueda = [];

    public function __construct()
    {
        $this->Paginacion = new ENPaginacionService();
        $this->Busqueda = []; 
    }
}

?>