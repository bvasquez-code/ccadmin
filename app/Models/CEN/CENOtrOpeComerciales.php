<?php namespace App\Models\CEN;

use CodeIgniter\Entity;

class CENOtrOpeComerciales extends Entity
{   
    public $Id_OtrOpeComerciales = 0;
    public $Cod_OtrOpeComerciales = "";
    public $Cod_Manual = "";
    public $Id_Tienda = "";
    public $Cod_Tienda = "";
    public $Des_Tienda = "";
    public $Flg_EstadoOpeCom = false;
    public $Des_EstaOpeCom = "";
    public $Fec_Registro = "";
    public $Des_Direccion = "";
    public $Tip_OpeComercial = 0;
    public $Des_KeyOpeComercial = "";
    public $Des_OpeComercial = "";
    public $List_Item_Productos = [];
    public $List_Json_Item = [];

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