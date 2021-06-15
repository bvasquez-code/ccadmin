<?php namespace App\Models\CEN;

use CodeIgniter\Entity;
use App\Models\CEN\CENPago as ENPago;

class CENObjFacturacion extends Entity
{
    public $Obj_PreVenta = [];
    public $Obj_Pago = [];
    
    public function __construct()
    {
        $this->Obj_PreVenta = [];
        $this->Obj_Pago = new ENPago();
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