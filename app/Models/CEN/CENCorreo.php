<?php namespace App\Models\CEN;

use CodeIgniter\Entity;


class CENCorreo extends Entity
{   
    public $Des_Correo_Emisor = "";
    public $Des_Nombre_Emisor = "";
    public $List_Correo_Receptor = [];
    public $List_Correo_Copia = [];
    public $List_Correo_CopiaOculta = [];
    public $Des_Asunto = "";
    public $Des_Mensaje = "";

    public function __construct()
    {
        $this->Des_Correo_Emisor = "";
        $this->Des_Nombre_Emisor = "";
        $this->List_Correo_Receptor = [];
        $this->List_Correo_Copia = [];
        $this->List_Correo_CopiaOculta = [];
        $this->Des_Asunto = "";
        $this->Des_Mensaje = "";
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