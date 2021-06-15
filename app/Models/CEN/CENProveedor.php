<?php namespace App\Models\CEN;

use CodeIgniter\MyEntity;
use App\Models\CEN\CENPersonajuridica;

class CENProveedor extends MyEntity
{
    public $Tip_Accion = 0;
    public $Id_Proveedor = 0;
    public $Tip_Persona = 0;
    public $Tip_Documento = 0;
    
    public $Id_Empresa = 0;
    public $Num_Pagina = 0;
    public $Num_RegistroIni = 0;
    public $Num_Intervalo = 0;
    public $Id_Usuamodi = 0;

    public $PersonaNatural = [];
    public $PersonaJuridica = [];

    public function __construct()
    {
        $this->PersonaJuridica = new CENPersonajuridica();
    }


}

?>