<?php namespace App\Models\CEN;

use CodeIgniter\MyEntity;

class CENDocComercial extends MyEntity
{ 
    public int $Id_Documento = 0; //Tip Documento
    public string $Des_Documento = ""; //Nombre del documento
    public ?string $Cod_Transaccion = ""; //Key

    public function __construct()
    { 
        $this->Id_Documento = 0;
        $this->Des_Documento = "";
        $this->Cod_Transaccion = "";
    }

}
?>