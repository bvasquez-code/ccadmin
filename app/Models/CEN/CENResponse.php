<?php namespace App\Models\CEN;

use CodeIgniter\MyEntity;

use App\Models\CEN\CENError as ENError;

class CENResponse extends MyEntity
{
	public $Resultado = [];
	public $Error = [];

	public function __construct()
    {
		$this->Resultado = [];
		$this->Error = new ENError();
	}
	
}