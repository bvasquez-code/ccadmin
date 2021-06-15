<?php namespace App\Models\CEN;

use CodeIgniter\Entity;


class CENCuenta extends Entity
{   
    public $Id_Cuenta = 0;
    public $Des_Cuenta = "";
    public $Cod_Cuenta = "";
    public $Num_Saldo = 0.0;
    public $Des_Saldo = "";
    public $Tip_Moneda = "";
    public $Des_Moneda = "";

    public function __construct()
    {
        $this->Id_Cuenta = 0;
        $this->Des_Cuenta = "";
        $this->Cod_Cuenta = "";
        $this->Num_Saldo = 0.0;
        $this->Des_Saldo = "";
        $this->Tip_Moneda = "";
        $this->Des_Moneda = "";
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
        $l_Obj = [];
        return $l_Obj;
    }

    public function SetListObject($key="",$value=[])
    {
        $l_SubLista = null;
        foreach($value as $item)
        {
            $l_SubLista = $this->GetTipeList($key);
            if(is_array($l_SubLista))
            {
                $l_SubLista = $item;

            }else if((is_object($l_SubLista)))
            {
                $l_SubLista->Set($item);
            }
            
            array_push($this->{$key},$l_SubLista);
        }
    }
}

?>