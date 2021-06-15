<?php namespace App\Models\CEN;

use CodeIgniter\Entity;

use App\Models\CEN\CENItemproducto as ENItemproducto;

class CENFechaListado extends Entity
{
    public $Fec_Dia_Ini = "";
    public $Fec_Dia_Fin = "";

    public function __construct()
    {

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
        if($key == "List_Item_Pro")
        {
            $ENItemproducto = new ENItemproducto;
            return $ENItemproducto;
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