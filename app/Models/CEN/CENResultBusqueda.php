<?php namespace App\Models\CEN;

use CodeIgniter\MyEntity;

class CENResultBusqueda extends MyEntity
{

    public $Num_RegistroIni = 0;
    public $Num_RegistroFin = 0;
    public $Num_Intervalo = 0;
    public $Num_Seccion = 0;
    public $Num_TotalBus = 0;
    public $Num_TotalReg = 0;
    public $List_Resultado = [];      
    
    public function __construct()
    {
        $this->Num_RegistroIni = 0;
        $this->Num_RegistroFin = 0;
        $this->Num_Intervalo = 0;
        $this->Num_Seccion = 0;
        $this->Num_TotalBus = 0;
        $this->Num_TotalReg = 0;
        $this->List_Resultado = [];
    }


    public function Get_Info_Paginador(int $p_Num_Intervalo,int $p_Num_Seccion):void
    {
        $l_Num_RegistroIni = 0;

        $l_Num_RegistroIni = $p_Num_Seccion * $p_Num_Intervalo - $p_Num_Intervalo;
        $this->Num_RegistroIni = $l_Num_RegistroIni;
        $this->Num_Intervalo = $p_Num_Intervalo;
        $this->Num_Seccion = $p_Num_Seccion;

        if( $this->Num_TotalBus > 0 )
        {
            if($this->Num_TotalBus > ($l_Num_RegistroIni + $p_Num_Intervalo) )
            {
                $this->Num_RegistroFin = $l_Num_RegistroIni + $p_Num_Intervalo;
            }
            else
            {
                $this->Num_RegistroFin = $this->Num_TotalBus;
            }
        }
    }    

}

?>