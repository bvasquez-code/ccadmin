<?php namespace App\Models\CEN;

use CodeIgniter\Entity;
use App\Models\CEN\CENDetallePago as ENDetallePago;

class CENLogDev extends Entity
{
    public $Id_LogDev = 0;
    public $Des_Origen = "";
    public $Des_Sistema = "";
    public $Des_Obj_Entrada = "";
    public $Des_Obj_Salida = "";
    
    public function __construct()
    {
        $this->Id_LogDev = 0;
        $this->Des_Origen = "";
        $this->Des_Sistema = "";
        $this->Des_Obj_Entrada = "";
        $this->Des_Obj_Salida = "";
    }

    public function Set($ObjetoEntrada=[]){

        foreach ($ObjetoEntrada as $key => $value) {
  
          if(is_object($this->{$key}))
          {
              $this->{$key}->Set($value);
          }
          else if(is_array($this->{$key}))
          {
                $this->SetListObject($key,$value);
          }
          else
          {
              $this->{$key} = $value;      
          }
            
        }
        
    }

    public function GetTipeList($key="")
    {
       
    }

    public function SetListObject($key="",$value=[])
    {
        $l_SubLista = null;
        foreach($value as $item)
        {
            $l_SubLista = $this->GetTipeList($key);
            $l_SubLista->Set($item);
            array_push($this->{$key},$l_SubLista);
        }
    }

}

?>                