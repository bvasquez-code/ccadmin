<?php namespace App\Models\CEN;

use CodeIgniter\Entity;


class CENTrxCuenta extends Entity
{   
    public $Id_TrxCuenta = 0;
    public $Id_Cuenta = 0;
    public $Tip_Movimiento = 0;
    public $Des_Movimiento = "";
    public $Des_Manual_Operacion = "";
    public $Cod_Ex_Operacion = "";
    public $Num_Monto = 0.0;
    public $Des_Monto = "";
    public $Num_Monto_Pre = 0.0;
    public $Des_Monto_Pre = "";
    public $Num_Monto_Pos = 0.0;
    public $Des_Monto_Pos = "";
    public $Fec_Operacion = "";
    public $Tip_Operacion = 0;
    public $Des_Tip_Operacion  = "";
    public $Des_Moneda = "";
    public $Id_Origen = 0;

    public function __construct()
    {
        $this->Id_TrxCuenta = 0;
        $this->Id_Cuenta = 0;
        $this->Tip_Movimiento = 0;
        $this->Des_Movimiento = "";
        $this->Des_Manual_Operacion = "";
        $this->Cod_Ex_Operacion = "";
        $this->Num_Monto = 0.0;
        $this->Des_Monto = "";
        $this->Num_Monto_Pre = 0.0;
        $this->Des_Monto_Pre = "";
        $this->Num_Monto_Pos = 0.0;
        $this->Des_Monto_Pos = "";
        $this->Fec_Operacion = "";
        $this->Tip_Operacion = 0;
        $this->Des_Tip_Operacion  = "";
        $this->Des_Moneda = "";
        $this->Id_Origen = 0;
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