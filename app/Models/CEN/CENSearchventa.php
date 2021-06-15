<?php namespace App\Models\CEN;

use CodeIgniter\MyEntity;

class CENSearchventa extends MyEntity
{
    public $search = "";
    public $category = 0;
    public $brand = 0;
    public $context = "";
    public $page = 0;

    public function __construct()
    {
    }

}

?>