<?php namespace App\Models\CEN;

use CodeIgniter\MyEntity;

class CENValidacionPerfil extends MyEntity
{   
    public int $Cod_Validacion = 0;
    public bool $Flg_Permitido = false;
    public string $Des_Mensaje = "";

    public function __construct()
    {
        $this->Cod_Validacion = 0;
        $this->Flg_Permitido = false;
        $this->Des_Mensaje = "";
    }


}

?>