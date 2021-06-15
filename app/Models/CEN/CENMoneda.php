<?php namespace App\Models\CEN;

use CodeIgniter\Entity;

class CENMoneda extends Entity
{
    public $Cod_Moneda = 0;
    public $Des_Moneda = "";  
    public $Des_Signo = ""; 
    public $Des_Key = "";
    public $Des_KeyConfig = "";
    public $Num_Cambio = 0.0;
    public $Flg_Base = false;  
    
    public function __construct()
    {
        $this->Cod_Moneda = 0;
        $this->Des_Moneda = "";  
        $this->Des_Signo = ""; 
        $this->Des_Key = "";
        $this->Des_KeyConfig = "";
        $this->Num_Cambio = 0.0;
        $this->Flg_Base = false;  
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