<?php namespace App\Models\CEN;

use CodeIgniter\MyEntity;

class CENProveedorResumen extends MyEntity
{
    public int $Id_Proveedor = 0;
    public int $Tip_Persona = 0;
    public string $Cod_Documento = "";
    public string $Des_Proveedor = "";

    public function __construct()
    {
        $this->Id_Proveedor = 0;
        $this->Tip_Persona = 0;
        $this->Cod_Documento = "";
        $this->Des_Proveedor = "";
    }

}
?>