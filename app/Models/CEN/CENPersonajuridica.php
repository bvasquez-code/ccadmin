<?php namespace App\Models\CEN;

use CodeIgniter\MyEntity;

class CENPersonajuridica extends MyEntity
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

}

?>