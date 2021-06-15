<?php namespace App\Models\CEN;

use CodeIgniter\Entity;

use App\Models\CEN\CENPersonaJuridica as ENPersonaJuridica;
use App\Models\CEN\CENPersonaNatural as ENPersonaNatural;

class CENCliente extends Entity
{   
    public ?int $Id_Cliente = 0;
    public $Tip_Persona = 0;
    public $PersonaJuridica = [];
    public $PersonaNatural = [];

    public function __construct()
    {
        $this->PersonaJuridica = new ENPersonaJuridica();
        $this->PersonaNatural = new ENPersonaNatural();
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

class CENPersonaJuridica extends Entity
{   
    public $Id_PerJuridica = 0;
    public $Cod_Ruc = "";
    public $Des_RazonSocial = "";
    public $Des_NomComercial = "";
    public $Des_Dirreccion = "";
    public $Des_Telefono = "";
    public $Des_Celular = "";
    public $Des_Email = "";
    public $Des_PaginaWeb = "";
    public $Des_Facebook = "";  
    public $Des_Twitter = "";
    public $Des_Instagram = "";

    public function __construct()
    {
        $this->Id_PerJuridica = 0;
        $this->Cod_Ruc = "";
        $this->Des_RazonSocial = "";
        $this->Des_NomComercial = "";
        $this->Des_Dirreccion = "";
        $this->Des_Telefono = "";
        $this->Des_Celular = "";
        $this->Des_Email = "";
        $this->Des_PaginaWeb = "";
        $this->Des_Facebook = "";  
        $this->Des_Twitter = "";
        $this->Des_Instagram = "";
    }

    public function Set($ObjetoEntrada=[]){

        if( $ObjetoEntrada !== null ){
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

class CENPersonaNatural extends Entity
{   
    public $Id_PerNatural = 0;
    public $Tip_Documento = 0;
    public $Cod_Documento = "";
    public $Cod_Ruc = "";
    public $Des_Nombre1 = "";
    public $Des_Nombre2 = "";
    public $Des_Nombres = "";
    public $Des_ApePaterno = "";
    public $Des_ApeMaterno = "";
    public $Des_Direccion = "";
    public $Fec_Nacimiento = "";
    public $Des_Telefono = "";
    public $Des_Celular = "";
    public $Des_Email = "";

    public function __construct()
    {
       $this->Id_PerNatural = 0;
       $this->Tip_Documento = 0;
       $this->Cod_Documento = "";
       $this->Cod_Ruc = "";
       $this->Des_Nombre1 = "";
       $this->Des_Nombre2 = "";
       $this->Des_Nombres = "";
       $this->Des_ApePaterno = "";
       $this->Des_ApeMaterno = "";
       $this->Des_Direccion = "";
       $this->Fec_Nacimiento = "";
       $this->Des_Telefono = "";
       $this->Des_Celular = "";
       $this->Des_Email = "";
    }

    public function Set($ObjetoEntrada=[]){

        if( $ObjetoEntrada !== null ){
            foreach ($ObjetoEntrada as $key => $value) 
            {
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