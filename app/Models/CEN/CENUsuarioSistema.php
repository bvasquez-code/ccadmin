<?php namespace App\Models\CEN;

use CodeIgniter\MyEntity;
use App\Models\CEN\CENPerfilUsuario as ENPerfilUsuario;
use App\Models\CEN\CENEncriptacionUno as ENEncriptacionUno;


class CENUsuarioSistema extends MyEntity
{ 
    public $Id_Usuario = 0;
    public $Id_Cliente = 0;
    public $Id_PersonaNatural = 0;
    public $Tip_Documento = 0 ; 
    public $Cod_Documento = "" ; 
    public $Des_Nombres = "" ;
    public $Des_ApePaterno = "" ;
    public $Des_ApeMaterno = "" ;
    public $Fec_Nacimiento = "";
    public $Des_Email = "" ;
    public $Des_Celular = "" ;
    public $Des_Direccion = "" ;
    public $Des_Usuario = "" ;
    public $Des_Password = "" ;
    public $Id_Tienda = 0;
    public $Des_Tienda = "";
    public $Flg_Estado = false;
    public $Fec_Modificacion = "";
    public $List_Perfiles_Usuario = [] ;
    public ENEncriptacionUno $EncriptacionUno;
    
    public function __construct()
    { 
        $this->Id_Usuario = 0;
        $this->Id_Cliente = 0;
        $this->Id_PersonaNatural = 0;
        $this->Tip_Documento = 0; 
        $this->Cod_Documento = ""; 
        $this->Des_Nombres = "";
        $this->Des_ApePaterno = "";
        $this->Des_ApeMaterno = "";
        $this->Fec_Nacimiento = "";
        $this->Des_Email = "";
        $this->Des_Celular = "";
        $this->Des_Direccion = "";
        $this->Des_Usuario = "";
        $this->Des_Password = "";
        $this->Id_Tienda = 0;
        $this->Des_Tienda = "";
        $this->Flg_Estado = false;
        $this->Fec_Modificacion = "";
        $this->List_Perfiles_Usuario = $this->NewList("List_Perfiles_Usuario",new ENPerfilUsuario());
        $this->EncriptacionUno = new ENEncriptacionUno();
    }

    public function get_Des_Password_Encriptado():string
    {
        return $this->EncriptacionUno->encriptar($this->Des_Password);
    }


}

?>                