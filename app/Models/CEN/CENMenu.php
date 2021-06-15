<?php namespace App\Models\CEN;


use CodeIgniter\MyEntity;

class CENMenu extends MyEntity
{
    public $Tip_Accion = 0;
    public $Id_Menu = 0;
    public $Id_MenuPadre = 0;
    public $Des_Menu = "";
    public $Des_UrlMenu = "";
    public $Cod_KeyMenu = 0;
    public $Flg_Redigirible = false;
    public $Num_Nivel = 0;
    public $Fec_Modifica = "";
    public $Flg_Estado = 0;
    public $Flg_MarcaBaja = 0;
    public $Num_Pagina = 0;
    public $Num_RegistroIni = 0;
    public $Num_Intervalo = 0;
    public $Id_Usuamodi = 0;

    public function __construct()
    {
        $this->Tip_Accion = 0;
        $this->Id_Menu = 0;
        $this->Id_MenuPadre = 0;
        $this->Des_Menu = "";
        $this->Des_UrlMenu = "";
        $this->Cod_KeyMenu = 0;
        $this->Flg_Redigirible = false;
        $this->Num_Nivel = 0;
        $this->Fec_Modifica = "";
        $this->Flg_Estado = 0;
        $this->Flg_MarcaBaja = 0;
        $this->Num_Pagina = 0;
        $this->Num_RegistroIni = 0;
        $this->Num_Intervalo = 0;
        $this->Id_Usuamodi = 0;
    }

}

?>