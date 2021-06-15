<?php namespace App\Models\CEN;

use CodeIgniter\Entity;

class CENTalonario extends Entity
{ 
    public $Id_Talonario = 0;
    public $Id_Tienda = 0;
    public $Id_Caja = 0;
    public $Tip_Documento = 0;
    public $Des_Documento = "";
    public $Cod_Serie = "";
    public $Num_UltimoCorr = 0;
    public $Num_Limite = 0;
    public $Tip_Asignacion = 0;
    public $Id_UsuarioTal = 0;

    public function __construct()
    { 
        $this->Id_Talonario = 0;
        $this->Id_Tienda = 0;
        $this->Id_Caja = 0;
        $this->Tip_Documento = 0;
        $this->Des_Documento = "";
        $this->Cod_Serie = "";
        $this->Num_UltimoCorr = 0;
        $this->Num_Limite = 0;
        $this->Tip_Asignacion = 0;
        $this->Id_UsuarioTal = 0;
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