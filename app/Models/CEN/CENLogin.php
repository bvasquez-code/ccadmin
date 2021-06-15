<?php namespace App\Models\CEN;

use CodeIgniter\MyEntity;
use Exception;
use App\Models\CEN\CENEncriptacionUno as ENEncriptacionUno;

class CENLogin extends MyEntity
{
    private $usuario = "";
    private $password = "";
    private $password_encriptado = "";
    private $Key_Origen = "";
    private $Key_Aplicacion = "";
    private $Ip_Terminal = "";
    private $Des_Cookie = "";
    private ENEncriptacionUno $EncriptacionUno;

    public function __construct( string $p_usuario , string $p_password ,string $p_Key_Origen,string $p_Key_Aplicacion)
    {

        if( $p_usuario === "" || $p_usuario === null )
        {
            throw new \Exception("USUARIO NO PUEDE ESTAR VACIO");
        }
        if( $p_password === "" || $p_password === null )
        {
            throw new \Exception("CONTRASEÑA NO PUEDE ESTAR VACIA");
        }

        $this->EncriptacionUno = new ENEncriptacionUno();
        
        $this->usuario = $p_usuario;
        $this->password = $p_password;
        $this->password_encriptado = $this->EncriptacionUno->encriptar($p_password);
        $this->Key_Origen = ($p_Key_Origen === "") ? "APP_WEB" : $p_Key_Origen;
        $this->Key_Aplicacion = ($p_Key_Aplicacion === "") ? "APP_WEB_MASTER_1" : $p_Key_Aplicacion;
        $this->Ip_Terminal = $_SERVER['REMOTE_ADDR'];
        $this->Des_Cookie = $_SERVER['HTTP_COOKIE'];
    }
    
    public function get_Usuario():string
    {
        return $this->usuario;
    }
    public function get_Password():string
    {
        return $this->password;   
    }
    public function get_Password_Encriptado():string
    {
        return $this->password_encriptado;   
    }
    public function get_Key_Origen():string
    {
        return $this->Key_Origen;
    }
    public function get_Key_Aplicacion():string
    {
        return $this->Key_Aplicacion;
    }
    public function get_Ip_Terminal():string
    {
        return $this->Ip_Terminal;
    }
    public function get_Des_Cookie():string
    {
        return $this->Des_Cookie;
    }


}
?>