<?php namespace App\Models\CEN;

use CodeIgniter\Entity;

class CENDetallePago extends Entity
{ 
    public $Id_Pago = 0;
    public $Tip_MedioPago = 0; 
    public $Des_MedioPago = "";  
    public $Tip_Moneda = 0;  
    public $Num_Cambio = 0.0;
    public $Num_Pagado = 0.0;
    public $Num_PagoReal = 0.0;
    public $Num_Vuelto = 0.0;
    public $Num_PorPagar = 0.0;
    public $Des_PagoReal = "";
    public $Des_UltimosDigitos = "";
    public $Cod_ExternoOperacion = "";
    
    public function __construct()
    { 
        $this->Tip_MedioPago = 0;  
        $this->Tip_Moneda = 0;  
        $this->Num_Pagado = 0.0;
        $this->Num_PagoReal = 0.0;
        $this->Num_Vuelto = 0.0;
        $this->Num_PorPagar = 0.0;
        $this->Des_UltimosDigitos = "";
        $this->Cod_ExternoOperacion = ""; 
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