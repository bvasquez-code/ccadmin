<?php namespace App\Models\CEN;

use CodeIgniter\Entity;

class CENDesconfigsistema extends Entity
{
    public $Tip_Accion = 0;
    public $Id_DesParam  = 0;
    public $Des_DesParam_Nom = "";
    public $Des_DesParam_Abr = "";
    public $Des_DesParam_Tx1 = "";
    public $Des_DesParam_Tx2 = "";
    public $Des_DesParam_Tx3 = "";
    public $Des_DesParam_Tx4 = "";
    public $Des_DesParam_Tx5 = "";
    public $Des_DesParam_Tx6 = "";
    public $Des_DesParam_Ch1 = "";
    public $Des_DesParam_In1 = "";
    public $Des_DesParam_In2 = "";
    public $Des_DesParam_In3 = "";
    public $Des_DesParam_Sm1 = "";
    public $Des_DesParam_Sm2 = "";
    public $Des_DesParam_Sm3 = "";
    public $Des_DesParam_Dc1 = "";
    public $Des_DesParam_Dc2 = "";
    public $Des_DesParam_Dc3 = "";
    public $Des_DesParam_Bo1 = "";
    public $Des_DesParam_Bo2 = "";
    public $Des_DesParam_Bo3 = "";
    public $Id_Usuamodi = 0;

    public function Set($ObjetoEntrada=[])
    {
        foreach ($ObjetoEntrada as $key => $value) {		    
            $this->{$key} = $value;
        }        
    }

}

?>