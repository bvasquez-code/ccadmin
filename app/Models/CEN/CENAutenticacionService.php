<?php namespace App\Models\CEN;

use CodeIgniter\MyEntity;

class CENAutenticacionService extends MyEntity
{
	public $Id_Sesion = 0;
	public $Id_Usuario = 0;
	public $Id_Empresa = 0;
	public $Id_Tienda = 0;
    public $User = "";
	public $Password = "";
	
	public function __construct()
    {
		$this->Id_Sesion = 0;
		$this->Id_Usuario = 0;
		$this->Id_Empresa = 0;
		$this->Id_Tienda = 0;
		$this->User = "";
		$this->Password = "";
    }

}

?>