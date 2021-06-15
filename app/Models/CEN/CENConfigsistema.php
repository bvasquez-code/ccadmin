<?php namespace App\Models\CEN;

use CodeIgniter\Entity;
use App\Models\CEN\CENDesconfigsistema as ENDesconfigsistema;

class CENConfigsistema extends Entity
{
    public $Tip_Accion = 0;
    public $Id_ConfigSis = 0;
    public $Cod_ConfigSis = 0;
    public $Des_ConfigSis_Nom = "";
    public $Des_ConfigSis_Abr = "";
    public $Des_ConfigSis_Key = "";
    public $Flg_Estado = false;
    public $Desconfigsistema = [];
    public $Num_Pagina = 0;
    public $Num_RegistroIni = 0;
    public $Num_Intervalo = 0;
    public $Id_Usuamodi = 0;

    public function Set($ObjetoEntrada=[])
    {
        foreach ($ObjetoEntrada as $key => $value) {
            
            if(is_object($this->{$key}))
            {
                $this->{$key}->Set($value);
            }
            else if(is_array($this->{$key}))
            {
                $this->{$key}->Set($value);
            }
            else
            {
                $this->{$key} = $value;      
            }            
            
        }        
    }

    public function __construct()
    {
        $this->Desconfigsistema = new ENDesconfigsistema;
    }

    

}

?>