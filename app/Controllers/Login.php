<?php namespace App\Controllers;

use Exception;
use Throwable;

use App\Models\CEN\CENError as ENError;
use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENRecuperacion as ENRecuperacion;

use App\Models\CLN\CLNLogin as LNLogin;
use App\Models\CLN\CLNRecuperacion as LNRecuperacion;

class Login extends BaseController
{
    public function __construct()
    {
    }

	public function index()
	{
        // $l_redireccion_url = explode( "/" , $_SERVER["REQUEST_URI"] );

        // echo print_r($l_redireccion_url);

        if( $this->session->get("session") )
        {
            header("Location: " . base_url('public/home') );
            die();
        }
        else
        {
            return $this->ConstruirMenu('login');
        }
    }
    
    public function resetearusuario()
	{

        if( $this->session->get("session") )
        {
            return $this->Enviar_Pagina_Externa('recuperacion');
        }

	}


    public function Autentificar()
    {
        $l_request = $this->request->getJSON(true);
        $l_Rpt = new ENResponse();
        $Login = new LNLogin();
        try
        {
            $l_Rpt = $Login->Logica_Autenticacion($l_request);
            if($l_Rpt->Error->flagerror === false)
            {
                $this->session->set($l_Rpt->Resultado->get_Datasesion());
                $this->session->start();
            }
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Resultado["redireccion_url"] = base_url("public/Login?login=login_error");
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }
        return json_encode($l_Rpt);
        
    }


    public function CerrarSession()
    {
        $l_Rpt = new ENResponse;
        $l_LNLogin = new LNLogin();
        $l_Rpt = $l_LNLogin->CerrarSession((string)$this->session->get("Id_Conexion"));

        $this->session->destroy();
        $this->session = null;
        return json_encode(true);

    }


    public function Recuperar_Cuenta()
    {
        $l_request = $this->request->getJSON(true);
        $l_Rpt = new ENResponse();
        $l_LNRecuperacion = new LNRecuperacion();
        $l_Recuperacion = new ENRecuperacion();
        try
        {
            $l_Recuperacion->Set($l_request);

            $l_Rpt = $l_LNRecuperacion->Recuperar_Cuenta($l_Recuperacion);
            
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }

        return json_encode($l_Rpt);
    }

    public function restaurarcuenta(string $p_Cod_Recuperacion)
    {
        $l_Rpt = new ENResponse();
        $l_LNRecuperacion = new LNRecuperacion();
        try
        {
            $l_Rpt = $l_LNRecuperacion->Restaurar_Cuenta($p_Cod_Recuperacion);
            if($l_Rpt->Error->flagerror === false)
            {
                $this->session->set($l_Rpt->Resultado->get_Datasesion());
                $this->session->start();
                header("Location: " . $l_Rpt->Resultado->redireccion_url );
                die();
            }
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }

        return json_encode($l_Rpt->Error->messages);
    }

    public function Cambiar_password()
    {
        $l_request = $this->request->getJSON(true);
        $l_Rpt = new ENResponse();
        $l_LNRecuperacion = new LNRecuperacion();

        try
        {
            $l_Rpt = $l_LNRecuperacion->Cambiar_password($l_request,$this->session->get("Nom_Usuario"));
            if($l_Rpt->Error->flagerror === false)
            {
                $this->session->set($l_Rpt->Resultado->get_Datasesion());
                $this->session->start();
            }
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }

        return json_encode($l_Rpt);        
    }
}
