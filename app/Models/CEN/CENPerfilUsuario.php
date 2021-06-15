<?php namespace App\Models\CEN;

use CodeIgniter\Entity;

class CENPerfilUsuario extends Entity
{ 
    public $Id_Perfil = 0;
    public $Des_Perfil = "";
    public $Flg_Asignado = false;
    
    public function __construct()
    { 
        $this->Id_Perfil = 0;
        $this->Des_Perfil = "";
        $this->Flg_Asignado = false;
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