<?php namespace App\Models\CEN;

use CodeIgniter\MyEntity;

class CENRecuperacion extends MyEntity
{
	public string $Des_Usuario;
    public string $Des_Email;
    private string $Cod_Recuperacion;
    private string $Des_Url_Recuperacion;

	public function __construct()
    {
        $this->Des_Usuario = "";
        $this->Des_Email = "";
        $this->Cod_Recuperacion = "";
        $this->Des_Url_Recuperacion = "";
	}
	
}