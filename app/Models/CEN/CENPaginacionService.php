<?php namespace App\Models\CEN;

use CodeIgniter\MyEntity;

class CENPaginacionService extends MyEntity
{
    public $Tip_Busqueda = 0;
    public $Tip_Listado = 0;
    public $Num_Seccion = 0;
    public $Num_RegistroIni = 0;
    public $Num_Intervalo = 0;    

    public function __construct()
    {
        $this->Tip_Busqueda = 1;
        $this->Num_Seccion = 1;
        $this->Tip_Listado = 0;
        $this->Num_RegistroIni = 0;
        $this->Num_Intervalo = 0;
    }

}
?>