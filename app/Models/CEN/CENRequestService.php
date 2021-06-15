<?php namespace App\Models\CEN;

use CodeIgniter\Entity;
use App\Models\CEN\CENAutenticacionService as ENAutenticacionService;
use App\Models\CEN\CENDataService as ENDataService;

class CENRequestService extends Entity
{
    public $ObjAute = [];
    public $ObjData = [];

    public function __construct()
    {
      $this->ObjData = [];
      $this->ObjAute = new ENAutenticacionService;
    }

    public function Set($ObjetoEntrada=[]){

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
    

}
?>