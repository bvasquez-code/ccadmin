<?php namespace App\Models\CEN;

use CodeIgniter\MyEntity;
use Exception;

class CENError extends MyEntity
{
    public  $status = 200;
    public  $error = 200;
    public  $flagerror = false;
    public  $originerror = 0;
    public  $messages = "OK";
    public  $exception = null;

    public function __construct()
    {
        $this->status = 200;
        $this->error = 200;
        $this->flagerror = false;
        $this->originerror = 0;
        $this->messages = "OK";
    }

    public function Fail(int $p_Error=500,int $p_Originerror=0,string $p_Messages="ERROR",$p_exception = null)
    {
        $this->status = 500;
        $this->error = $p_Error;
        $this->flagerror = true;
        $this->originerror= $p_Originerror;
        $this->messages = $p_Messages;
        $this->exception = $p_exception;
    }

    public function FailException(Exception $Ex)
    {

    }


}