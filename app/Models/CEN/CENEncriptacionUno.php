<?php namespace App\Models\CEN;

use CodeIgniter\MyEntity;
use Exception;

class CENEncriptacionUno extends MyEntity
{
    private $key_encriptacion = "";
    private $des_metodo = "";
    private $key_iv = "";
    private $Des_Val_Encriptado = "";
    private $Des_Val_Origen = "";

    public function __construct()
    {
        $this->key_encriptacion = "APP_CCADMIN_PASS";
        $this->des_metodo = "aes-256-cbc";
        $this->key_iv = "C9fBxl1EWtYTL1/M8jfstw==";        
    }

    public function encriptar(string $valor):string
    {
        $this->Des_Val_Origen = $valor;
        $this->Des_Val_Encriptado = openssl_encrypt($valor, $this->des_metodo, $this->key_encriptacion, false, base64_decode($this->key_iv));
        return $this->Des_Val_Encriptado;
    }

    public function desencriptar(string $valor):string
    {
        $this->Des_Val_Encriptado = $valor;
        $this->Des_Val_Origen = openssl_decrypt($valor, $this->des_metodo, $this->key_encriptacion, false, base64_decode($this->key_iv));
        return $this->Des_Val_Origen;
    }

    public function get_Des_Val_Encriptado()
    {
        return $this->Des_Val_Encriptado;
    }
    public function get_Des_Val_Origen()
    {
        return $this->Des_Val_Origen;
    }
}
?>