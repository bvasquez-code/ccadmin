<?php namespace App\Models\CEN;

use CodeIgniter\Entity;

class CENDetOtrOpeComercial extends Entity
{   
    public $Id_Producto = 0;
    public $Cod_Producto = 0;
    public $Des_Producto = "";
    public $Num_Precio = 0.0;
    public $Num_Interes = 0.0;
    public $Num_Descuento = 0.0;
    public $Num_PrecioVenta = 0.0;
    public $Num_Cantidad = 0;
    public $Num_Monto = 0.0;
    public $Obj_Data_Jason = [];
    public $Des_TipDescuento = "";
    public $Des_Precio = "";

    public function __construct()
    {
    }

    public function Set($ObjetoEntrada=[])
    {

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