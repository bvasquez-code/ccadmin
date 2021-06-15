<?php namespace App\Models\CEN;

use CodeIgniter\Entity;
use App\Models\CEN\CENPerfilUsuario as ENPerfilUsuario;

class CENCaja extends Entity
{ 
    public $Id_Caja = 0;
    public $Cod_Caja = "";
    public $Des_Caja = "";
    public $Id_Usuario = "";
    public $Des_Usuario = "";
    public $Id_Tienda = "";
    public $Des_Tienda = "";
    public $Flg_Estado = false;
    public $Flg_UserCaja = false;

    public function __construct()
    { 
        $this->Id_Caja = 0;
        $this->Cod_Caja = "";
        $this->Des_Caja = "";
        $this->Id_Usuario = 0;
        $this->Des_Usuario = "";
        $this->Des_Tienda = "";
        $this->Flg_Estado = false;
        $this->Flg_UserCaja = false;
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
        if (  $key == "List_Perfiles_Usuario" )
        {
            $objeto = new ENPerfilUsuario();
            return $objeto;
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