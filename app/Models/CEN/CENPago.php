<?php namespace App\Models\CEN;

use CodeIgniter\Entity;
use App\Models\CEN\CENDetallePago as ENDetallePago;

class CENPago extends Entity
{
    public $List_Detalle_Venta = [];
    public $Num_TotalPagado = 0.0;
    public $Num_Vuelto = 0.0;
    public $Num_PorPagar = 0.0;
    public $Des_TotalPagado = "";
    public $Des_Vuelto = "";
    public $Des_PorPagar = "";
    public $Flg_Pagado = false;
    
    public function __construct()
    {
        $this->List_Detalle_Venta = [];
        $this->Num_TotalPagado = 0.0;
        $this->Num_Vuelto = 0.0;
        $this->Des_TotalPagado = "";
        $this->Des_Vuelto = "";
        $this->Flg_Pagado = false;
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
        if($key == "List_Detalle_Venta")
        {
            $ENDetallePago = new ENDetallePago();
            return $ENDetallePago;
        }            
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