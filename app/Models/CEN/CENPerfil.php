<?php namespace App\Models\CEN;

use CodeIgniter\MyEntity;

use App\Models\CEN\CENValidacionPerfil as ENValidacionPerfil;
use App\Models\CEN\CENMenu as ENMenu;

class CENPerfil extends MyEntity
{
    public $Tip_Accion = 0;
    public $Id_Perfil = 0;
    public $Id_Empresa = 0;
    public $Des_Perfil = "";
    public $Cod_KeyPerfil = "";
    public $Flg_RestrinTienda = 0;
    public $Flg_RestrinCaja = 0;
    public $Fec_Inicio = "";
    public $Fec_Final = "";
    public $Des_DiasPermi = "";
    public $Fec_Registro = "";
    public $Fec_Modifica = "";
    public $Flg_Estado = 0;
    public $Flg_MarcaBaja = 0;
    public $Num_Pagina = 0;
    public $Num_RegistroIni = 0;
    public $Num_Intervalo = 0;
    public $Id_Usuamodi = 0;
    public $List_Permisos_Operacionales = [];
    public $List_Menu_Accesibles = [];

    public function __construct()
    {
        $this->Tip_Accion = 0;
        $this->Id_Perfil = 0;
        $this->Id_Empresa = 0;
        $this->Des_Perfil = "";
        $this->Cod_KeyPerfil = "";
        $this->Flg_RestrinTienda = 0;
        $this->Flg_RestrinCaja = 0;
        $this->Fec_Inicio = "";
        $this->Fec_Final = "";
        $this->Des_DiasPermi = "";
        $this->Fec_Registro = "";
        $this->Fec_Modifica = "";
        $this->Flg_Estado = 0;
        $this->Flg_MarcaBaja = 0;
        $this->Num_Pagina = 0;
        $this->Num_RegistroIni = 0;
        $this->Num_Intervalo = 0;
        $this->Id_Usuamodi = 0;
        $this->List_Permisos_Operacionales = $this->NewList("List_Permisos_Operacionales",new ENValidacionPerfil() );
        $this->List_Menu_Accesibles = $this->NewList("List_Menu_Accesibles",new ENMenu() );
    }

}

?>