<?php namespace App\Models\CEN;

use CodeIgniter\Entity;


class CENProcesoSistema extends Entity
{   
    public int $Id_Proceso = 0;
    public string $Des_Proceso = "";
    public string $Des_Proceso_Detalle = "";
    public string $Des_Url = "";
    public string $Fec_Ultima_Ejecucion = "";
    public string $Fec_Proxima_Ejecucion = "";

    public function __construct()
    {
        $this->Id_Proceso = 0;
        $this->Des_Proceso = "";
        $this->Des_Proceso_Detalle = "";
        $this->Des_Url = "";
        $this->Fec_Ultima_Ejecucion = "";
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