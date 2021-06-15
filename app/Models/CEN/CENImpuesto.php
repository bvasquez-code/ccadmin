<?php namespace App\Models\CEN;

use CodeIgniter\Entity;

class CENImpuesto extends Entity
{ 
    public $Tip_Impuesto = 0;
    public $Num_Tasa = 0.0;

    public function __construct()
    { 
        $this->Tip_Impuesto = 0;
        $this->Num_Tasa = 0.0;
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