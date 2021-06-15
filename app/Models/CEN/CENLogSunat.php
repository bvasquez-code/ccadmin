<?php namespace App\Models\CEN;

use CodeIgniter\Entity;

class CENLogSunat extends Entity
{   
    public $Id_Log = 0;
    public $Tip_Documento = 0;
    public $Id_Transaccion = 0;
    public $Id_InfoTransaccion = 0;
    public $Cod_Transaccion = 0;
    public $Cod_Talonario = 0;
    public $Flg_EnvioSunat = false;
    public $Des_EnvioSunat = "";
    public $Flg_EstadoSunat = 0;
    public $Flg_Observacion = false;
    public $Des_Observacion = "";
    public $Fec_Envio = "";
    public $Fec_Rechazo = "";
    public $Des_NombreXml = "";
    public $Des_NombreCdr = "";
    public $Jsn_ObjObservacion = [];
    public $Xml_ContenidoCdr = "";

    public function __construct()
    {
        $this->Id_Log = 0;
        $this->Tip_Documento = 0;
        $this->Id_Transaccion = 0;
        $this->Id_InfoTransaccion = 0;
        $this->Cod_Transaccion = 0;
        $this->Cod_Talonario = 0;
        $this->Flg_EnvioSunat = false;
        $this->Des_EnvioSunat = "";
        $this->Flg_EstadoSunat = 0;
        $this->Flg_Observacion = false;
        $this->Des_Observacion = "";
        $this->Fec_Envio = "";
        $this->Fec_Rechazo = "";
        $this->Des_NombreXml = "";
        $this->Des_NombreCdr = "";
        $this->Jsn_ObjObservacion = [];
        $this->Xml_ContenidoCdr = "";
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
        $Obj = [];

        return $Obj;
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