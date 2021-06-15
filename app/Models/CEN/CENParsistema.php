<?php namespace App\Models\CEN;

use CodeIgniter\Entity;

class CENParsistema extends Entity
{

    public $Tip_Accion = 0;
    public $Id_ParSis = 0;
    public $Cod_ConfSis = 0;
    public $Cod_ParSis = 0;
    public $Des_ParSis_Nom = "";
    public $Des_ParSis_Abr = "";
    public $Des_ParSis_Tx1 = "";
    public $Des_ParSis_Tx2 = "";
    public $Des_ParSis_Tx3 = "";
    public $Des_ParSis_Tx4 = "";
    public $Des_ParSis_Tx5 = "";
    public $Des_ParSis_Tx6 = "";
    public $Des_ParSis_Ch1 = "";
    public $Num_ParSis_In1 = 0;
    public $Num_ParSis_In2 = 0;
    public $Num_ParSis_In3 = 0;
    public $Num_ParSis_Sm1 = 0;
    public $Num_ParSis_Sm2 = 0;
    public $Num_ParSis_Sm3 = 0;
    public $Num_ParSis_Dc1 = 0.0;
    public $Num_ParSis_Dc2 = 0.0;
    public $Num_ParSis_Dc3 = 0.0;
    public $Flg_ParSis_Bo1 = false;
    public $Flg_ParSis_Bo2 = false;
    public $Flg_ParSis_Bo3 = false;
    public $Id_Usuamodi = 0;

    public function __construct()
    {
        $this->Des_ParSis_Nom = null;
        $this->Des_ParSis_Abr = null;
        $this->Des_ParSis_Tx1 = null;
        $this->Des_ParSis_Tx2 = null;
        $this->Des_ParSis_Tx3 = null;
        $this->Des_ParSis_Ch1 = null;
        $this->Num_ParSis_In1 = null;
        $this->Num_ParSis_In2 = null;
        $this->Num_ParSis_In3 = null;
        $this->Num_ParSis_Sm1 = null;
        $this->Num_ParSis_Sm2 = null;
        $this->Num_ParSis_Sm3 = null;
        $this->Num_ParSis_Dc1 = null;
        $this->Num_ParSis_Dc2 = null;
        $this->Num_ParSis_Dc3 = null;
        $this->Flg_ParSis_Bo1 = null;
        $this->Flg_ParSis_Bo2 = null;
        $this->Flg_ParSis_Bo3 = null;
    }

    public function Set($ObjetoEntrada=[])
    {
        foreach ($ObjetoEntrada as $key => $value) {		    
            $this->{$key} = $value;
        }        
    }    

}

?>