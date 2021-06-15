<?php namespace App\Models\CLN;

use Exception;
use CodeIgniter\Model;
use App\Models\CAD\CADLogin as ADLogin;

use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENLogin as ENLogin;
use App\Models\CEN\CENSesion as ENSesion;
use App\Models\CEN\CENRptSesion as ENRptSesion;


use App\Models\CLN\CLNGenerico as LNGenerico;

use App\Models\CSE\CSEOrquestador as SEOrquestador;

class CLNLogin extends Model
{

    public function Logica_Autenticacion( $p_request ):ENResponse
    {
        $l_SEOrquestador = new SEOrquestador();
        $ADLogin = new ADLogin();
        $l_Rpt = new ENResponse();
        $l_RptSesion = null;
        $l_ObjData = [];
        $l_ResultDt = null;
        $l_ResponseWS = [];
        $l_Login = new ENLogin( $p_request["usuario"] , $p_request["password"] ,"","");
        $l_Sesion = new ENSesion();
        $l_Permisos = [];
        $l_List_Key_Perfil = [];

        $l_ObjData["Obj_Conexion"]["Key_Origen"] = $l_Login->get_Key_Origen();
        $l_ObjData["Obj_Conexion"]["Key_Aplicacion"] = $l_Login->get_Key_Aplicacion();
        $l_ObjData["Obj_Conexion"]["Ip_Terminal"] = $l_Login->get_Ip_Terminal();

        //CREAMOS ID DE CONEXION
        $l_Rpt = $l_SEOrquestador->Ejecutar_13_ws_wa_ValidarCredenciales($l_ObjData,1);
        if($l_Rpt->Error->flagerror) return $l_Rpt;

        $l_Id_Conexion = $l_Rpt->Resultado["Id_Conexion"];

        $l_ObjData = [];

        $l_ObjData["Obj_Login"]["Des_Usuario"] = $l_Login->get_Usuario();
        $l_ObjData["Obj_Login"]["Des_Password"] = $l_Login->get_Password_Encriptado();
        $l_ObjData["Obj_Login"]["Id_Conexion"] = $l_Id_Conexion;
        $l_ObjData["Obj_Login"]["Ip_Terminal"] = $l_Login->get_Ip_Terminal();
        $l_ObjData["Obj_Login"]["Des_Cookie"] = $l_Login->get_Des_Cookie();

        $l_Rpt = $l_SEOrquestador->Ejecutar_13_ws_wa_ValidarCredenciales($l_ObjData,2);
        if($l_Rpt->Error->flagerror)
        {
            $l_RptSesion = new ENRptSesion($l_Sesion,base_url("public/Login?login=login_error"));
            $l_Rpt->Resultado = $l_RptSesion;
            return $l_Rpt;
        } 

        $l_ResponseWS = $l_Rpt->Resultado;

        $l_ResultDt = $ADLogin->Autentificar($l_Login->get_Usuario(),$l_Login->get_Password_Encriptado());

        if($l_ResultDt!=null && count($l_ResultDt)>0)
        {
            if( (int)$l_ResultDt[0]["Code"] == 1 )
            {
                $l_Sesion->session = true;
                $l_Sesion->Tip_Session = 1;
                $l_Sesion->Id_Sesion = $l_ResponseWS["Id_NtraConexion"];
                $l_Sesion->Id_Conexion = $l_ResponseWS["Id_Conexion"];
                $l_Sesion->Id_Usuario = $l_ResultDt[0]["Id_Dausu"];
                $l_Sesion->Id_Empresa = $l_ResultDt[0]["Id_Daemp_FK"];
                $l_Sesion->Id_Tienda = $l_ResultDt[0]["Id_Datie_FK"];
                $l_Sesion->Id_Caja = $l_ResultDt[0]["Id_Dacaj"];
                $l_Sesion->Cod_Caja = $l_ResultDt[0]["Cod_Dacaj"];
                $l_Sesion->Des_Peril = $l_ResultDt[0]["Des_Daprf_Nom"];
                $l_Sesion->Dias_Accecibles = $l_ResultDt[0]["Des_Dausu_Dia"];
                $l_Sesion->Hora_Inicio = $l_ResultDt[0]["Fec_Dausu_Hin"];
                $l_Sesion->Hora_Fin = $l_ResultDt[0]["Fec_Dausu_Hfi"];
                $l_Sesion->Des_UsuarioTienda = $l_ResultDt[0]["Des_Datie_Usr"];
                $l_Sesion->Cod_HashTienda = $l_ResultDt[0]["Cod_Datie_Hsh"];
                $l_Sesion->Nom_Usuario = $l_ResultDt[0]["Des_Dapnat_Nmb"]." ".$l_ResultDt[0]["Des_Dapnat_Apt"];

                $l_Sesion->Obj_AutenticacionService->Id_Sesion = (int)$l_ResponseWS["Id_NtraConexion"];
                $l_Sesion->Obj_AutenticacionService->Id_Usuario = (int)$l_ResultDt[0]["Id_Dausu"];
                $l_Sesion->Obj_AutenticacionService->Id_Empresa = (int)$l_ResultDt[0]["Id_Daemp_FK"];
                $l_Sesion->Obj_AutenticacionService->Id_Tienda = (int)$l_ResultDt[0]["Id_Datie_FK"];
                $l_Sesion->Obj_AutenticacionService->User = (string)$l_ResultDt[0]["Des_Datie_Usr"];
                $l_Sesion->Obj_AutenticacionService->Password = (string)$l_ResultDt[0]["Cod_Datie_Hsh"];

                foreach($l_ResultDt as $item)
                {
                    $l_Permisos["Des_Peril"] = $item["Des_Daprf_Nom"];
                    $l_Permisos["Des_Menu"] = "";
                    $l_Permisos["Key_Menu"] = "";
                    array_push($l_Sesion->ListPermisos,$l_Permisos);
                    array_push($l_List_Key_Perfil,$item["Cod_Daprf_Key"]);                
                }

                $l_Sesion->List_Menu_Permitidos = $ADLogin->Get_List_Menu_Accesible($l_List_Key_Perfil);

                $l_Rpt = new ENResponse(); 
                $l_RptSesion = new ENRptSesion($l_Sesion,base_url("public/home"));
                $l_Rpt->Resultado = $l_RptSesion;
            }
            else
            {
                $l_RptSesion = new ENRptSesion($l_Sesion,base_url("public/Login?login=login_error"));
                $l_Rpt->Resultado = $l_RptSesion;
                $l_Rpt->Error->Fail(500,500,"CREDENCIALES INCORRECTAS.");
            }
        }

        return $l_Rpt;
    }

    // public function Autentificar(string $p_Usuario,string $p_Password):ENSesion
    // {

    //     $l_Sesion = new ENSesion();
    //     $l_ADLogin = new ADLogin();

    //     $l_ResultDt = $l_ADLogin->Autentificar($p_Usuario,$p_Password);


    //     return $l_Sesion;
    // }

    public function CerrarSession(string $p_Id_Conexion):ENResponse
    {

        $l_Rpt = new ENResponse();
        $l_SEOrquestador = new SEOrquestador();
        $l_ObjData = [];

        $l_ObjData["Obj_Login"]["Id_Conexion"] = $p_Id_Conexion;

        $l_Rpt = $l_SEOrquestador->Ejecutar_13_ws_wa_ValidarCredenciales($l_ObjData,3);

        return $l_Rpt;
    }



}