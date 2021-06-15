<?php namespace App\Models\CLN;

use CodeIgniter\Model;

use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENRecuperacion as ENRecuperacion;
use App\Models\CAD\CADRecuperacion as ADRecuperacion;
use App\Models\CEN\CENAutenticacionService as ENAutenticacionService;
use App\Models\CEN\CENLogin as ENLogin;
use App\Models\CEN\CENSesion as ENSesion;
use App\Models\CEN\CENRptSesion as ENRptSesion;

use App\Models\CLN\CLNNotificacion as LNNotificacion;
use App\Models\CLN\CLNLogin as LNLogin;

use App\Models\CAD\CADProceso as ADProceso;


class CLNRecuperacion extends Model
{

    public function __construct()
    {
        
    }

    public function Recuperar_Cuenta(ENRecuperacion $p_Recuperacion):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_ADRecuperacion = new ADRecuperacion();
        $l_LNNotificacion = new LNNotificacion();
        $l_Obj_Aut = new ENAutenticacionService();
        $l_ADProceso = new ADProceso();
        $l_Obj_Json_Rec = [];

        $p_Recuperacion->Cod_Recuperacion = rand( 100000 , 900000 );

        $l_Obj_Json_Rec = [
             "Cod_Recuperacion" => $p_Recuperacion->Cod_Recuperacion
            ,"Des_Usuario" =>$p_Recuperacion->Des_Usuario
            ,"Fec_Recuperacion" => date("Y-m-d H:i:s")
        ];

        $p_Recuperacion->Des_Url_Recuperacion = base_url("public/login/restaurarcuenta/".$this->Codificar_Base64_Nveces(\json_encode($l_Obj_Json_Rec),4));

        $l_Rpt = $l_ADRecuperacion->Registrar_Codigo_Recuperacion($p_Recuperacion);

        if( $l_Rpt->Error->flagerror === false )
        {
            $l_Obj_Aut->Id_Empresa = 1;
            $l_Obj_Aut->Id_Tienda = 1;
            $l_Obj_Aut->Id_Usuario = 1;
            $l_Obj_Aut = $l_ADProceso->Get_Credenciales_Tienda_Proceso($l_Obj_Aut);
            $l_Rpt = $l_LNNotificacion->Enviar_Correo_Recuperacion($p_Recuperacion,$l_Obj_Aut);
        }
        $l_Rpt = new ENResponse();
        $l_Rpt->Resultado = "OK";
        return $l_Rpt;
    }

    private function Codificar_Base64_Nveces(string $p_Des_Valor,int $p_Num_Codificaciones)
    {
        $p_Des_Valor_Codificado = $p_Des_Valor;

        for( $i = 0 ; $i < $p_Num_Codificaciones ; $i++ )
        {
            $p_Des_Valor_Codificado = base64_encode($p_Des_Valor_Codificado);
        }

        return $p_Des_Valor_Codificado;
    }

    private function Decodificar_Base64_Nveces(string $p_Des_Valor,int $p_Num_Codificaciones)
    {
        $p_Des_Valor_Codificado = $p_Des_Valor;

        for( $i = 0 ; $i < $p_Num_Codificaciones ; $i++ )
        {
            $p_Des_Valor_Codificado = base64_decode($p_Des_Valor_Codificado);
        }

        return $p_Des_Valor_Codificado;
    }


    public function Restaurar_Cuenta(string $p_Cod_Recuperacion):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_ADRecuperacion = new ADRecuperacion();
        $l_Obj_Json_Rec = [];
        $Cod_Recuperacion = "";
        $Des_Usuario = "";
        $Fec_Recuperacion = "";
        $Fec_Actual = new \DateTime();
        $l_Num_Contador = 0;
        $l_Sesion = new ENSesion();

        $l_Obj_Json_Rec = json_decode($this->Decodificar_Base64_Nveces($p_Cod_Recuperacion,4),true);

        $Cod_Recuperacion = (string)$l_Obj_Json_Rec["Cod_Recuperacion"];
        $Des_Usuario = (string)$l_Obj_Json_Rec["Des_Usuario"];
        $Fec_Recuperacion = new \DateTime((string)$l_Obj_Json_Rec["Fec_Recuperacion"]);

        $l_Num_Contador = $l_ADRecuperacion->Validar_Codigo_Recuperacion($Des_Usuario,$Cod_Recuperacion);

        if( $l_Num_Contador === 0 )
        {
            $l_Rpt->Error->flagerror = true;
            $l_Rpt->Error->messages = "UPSS.. LA RUTA A LA QUE INTENTAS ACCEDER NO ES VALIDA";
            return $l_Rpt;
        }
        if(  $Fec_Actual > $Fec_Recuperacion->modify('+1 hours') )
        {
            $l_Rpt->Error->flagerror = true;
            $l_Rpt->Error->messages = 'LINK DE RECUPERACION EXPIRADO';
            return $l_Rpt;
        }

        $l_Sesion = $this->Crear_Sesion_Temporal($Des_Usuario);
        $l_ENRptSesion = new ENRptSesion( $l_Sesion , base_url("public/login/resetearusuario"));
        
        $l_Rpt->Resultado = $l_ENRptSesion;

        return $l_Rpt;
    }

    private function Crear_Sesion_Temporal(string $p_Des_Usuario):ENSesion
    {
        $l_Sesion = new ENSesion();
        $l_Sesion->session = true;
        $l_Sesion->Nom_Usuario = $p_Des_Usuario;

        return $l_Sesion;
    }

    public function Cambiar_password( $p_request , string $p_Nom_Usuario ):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_ENLogin = null;
        $l_ADRecuperacion = new ADRecuperacion();
        $l_LNLogin = new LNLogin();
        $l_Obj_Json_Aut = [];

        $l_Des_Nuevo_Password = (string)$p_request["Des_Nuevo_Password"];
        $l_Des_Nuevo_Password_Confirmado = (string)$p_request["Des_Nuevo_Password_Confirmado"];

        if( $l_Des_Nuevo_Password != $l_Des_Nuevo_Password_Confirmado )
        {
            $l_Rpt->Error->flagerror = true;
            $l_Rpt->Error->messages = "LAS CONTRASEÑAS NO COINCIDEN";
            return $l_Rpt;
        }

        $l_ENLogin = new ENLogin($p_Nom_Usuario,$l_Des_Nuevo_Password,"","");

        $l_Rpt = $l_ADRecuperacion->Registrar_Nuevo_Password($l_ENLogin->get_Usuario(),$l_ENLogin->get_Password_Encriptado());

        if( $l_Rpt->Error->flagerror === false )
        {
            $l_Obj_Json_Aut = [
                 "usuario" =>  $l_ENLogin->get_Usuario()
                ,"password" => $l_ENLogin->get_Password()
            ];

            $l_Rpt->Resultado = $l_LNLogin->Logica_Autenticacion( $l_Obj_Json_Aut )->Resultado;
        }

        return $l_Rpt;
    }


}
?>