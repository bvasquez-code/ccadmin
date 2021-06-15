<?php namespace App\Models\CLN;

use CodeIgniter\Model;

use App\Models\CAD\CADConfigsistema as ADConfigsistema;
use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENError as ENError;

class CLNConfigsistema extends Model
{
    public $ADConfigsistema = null;

    public function __construct()
    {
        $this->ADConfigsistema = new ADConfigsistema;
    }

    public function Get_Parametros_Sistema_string(int $p_Cod_Sis,int $p_Cod_Psis,int $p_Opcion,array $p_List_Condiciones=null)
    {
        $l_ResultString = null;

        $l_ResultString = $this->ADConfigsistema->Get_Parametros_Sistema_string($p_Cod_Sis,$p_Cod_Psis,$p_Opcion,$p_List_Condiciones);
      
        return $l_ResultString;
    }

    public function Get_Parametros_Sistema_object(int $p_Cod_Sis,int $p_Cod_Psis=0,string $p_StringSelect,array $p_List_Condiciones=null)
    {
        $l_Result = null;

        $l_Result = $this->ADConfigsistema->Get_Parametros_Sistema_object($p_Cod_Sis,$p_Cod_Psis,$p_StringSelect,$p_List_Condiciones);
      
        return $l_Result;
    }    
   

}
?>