<?php namespace App\Models\CEN;

use CodeIgniter\MyEntity;

class CENAlmacen extends MyEntity
{
    public int $Id_Almacen = 0;
    public string $Des_Almacen = "";
    public string $Des_Direccion = "";
    
    public function __construct()
    {
        $this->Id_Almacen = 0;
        $this->Des_Almacen = "";
        $this->Des_Direccion = "";
    }
}

?>     