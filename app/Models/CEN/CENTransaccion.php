<?php namespace App\Models\CEN;

use CodeIgniter\Entity;

class CENTransaccion extends Entity
{   
    public $Id_Trx = 0;
    public $Id_Origen = 0;
    public $Cod_Tienda  = "";
    public $Des_Usuario = "";
    public $Tip_OpeComercial = 0;
    public $Des_Operacion = "";
    public $Id_Sesion = 0;
    public $Flg_Movimiento = 0;
    public $Des_Movimiento = "";
    public $Flg_Resultado = 0;
    public $Des_Resultado = "";
    public $Fec_Registro = "";

    public function __construct()
    {
        $this->Id_Trx = 0;
        $this->Id_Origen = 0;
        $this->Cod_Tienda  = "";
        $this->Des_Usuario = "";
        $this->Tip_OpeComercial = 0;
        $this->Des_Operacion = "";
        $this->Id_Sesion = 0;
        $this->Flg_Movimiento = 0;
        $this->Des_Movimiento = "";
        $this->Flg_Resultado = 0;
        $this->Des_Resultado = "";
        $this->Fec_Registro = "";
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