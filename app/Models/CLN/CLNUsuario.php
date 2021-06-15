<?php namespace App\Models\CLN;

use CodeIgniter\Model;

use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENUsuarioSistema as ENUsuarioSistema;
use App\Models\CEN\CENAutenticacionService as ENAutenticacionService;
use App\Models\CEN\CENDataService as ENDataService;
use App\Models\CEN\CENResultBusqueda as ENResultBusqueda;

use App\Models\CAD\CADUsuario as ADUsuario;
use App\Models\CAD\CADSeguridad as ADSeguridad;

use App\Models\CLN\CLNCliente as LNCliente;
use App\Models\CLN\CLNGenerico as LNGenerico;
use App\Models\CLN\CLNParsistema as LNParsistema;


use App\Models\CSE\CSEOrquestador as SEOrquestador;

class CLNUsuario extends Model
{

    public function __construct()
    {
        
    }

    public function Render_Crear(int $p_Id_Usuario,ENAutenticacionService $p_Obj_Aut):ENResponse
    {
        $l_FrontEnd = [];
        $l_Rpt = new ENResponse();
        $l_LNParsistema = new LNParsistema();
        $l_LNGenerico = new LNGenerico();
        $l_List_Documentos = [];
        $l_Obj_Usuario = [];
        $l_List_Tienda = [];
        

        $l_Rpt = $l_LNParsistema->Get_Parametros_Sistema(1,0);
        $l_List_Documentos = json_decode(json_encode($l_Rpt->Resultado), true);

        $l_Rpt = $this->Get_Usuario($p_Id_Usuario,$p_Obj_Aut);
        $l_Obj_Usuario = json_decode(json_encode($l_Rpt->Resultado), true);

        $l_Rpt = $l_LNGenerico->Get_List_Tienda($p_Obj_Aut->Id_Tienda,$p_Obj_Aut->Id_Usuario);
        $l_List_Tienda = json_decode(json_encode($l_Rpt->Resultado), true);

        
        $l_FrontEnd = [
            "v_List_Documentos" => $l_List_Documentos,
            "v_Obj_Usuario" => $l_Obj_Usuario,
            "v_List_Tienda"=> $l_List_Tienda
        ];

        $l_Rpt->Resultado = $l_FrontEnd;

        return $l_Rpt;
    }

    public function Get_Perfil_Usuario(int $p_Id_Usuario):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_ADUsuario = new ADUsuario();
        
        $l_Rpt->Resultado = [ "List_Resultado" => $l_ADUsuario->Get_Perfil_Usuario($p_Id_Usuario) ];

        return $l_Rpt;
    }

    public function Get_Usuario(int $p_Id_Usuario,ENAutenticacionService $p_Obj_Aut)
    {
        $l_Rpt = new ENResponse();
        $l_ADUsuario = new ADUsuario();
        $l_ADSeguridad = new ADSeguridad();
        $l_ValidacionPerfil = null;
        $l_4_manage_profile_all_store = 4; //PERFIL QUE PUEDE REALIZAR CARGA MASIVA DE STOCK EN CUALQUIER TIENDA
        $l_Id_Tienda  = 0;

        $l_Rpt = $l_ADSeguridad->Get_Validacion_Perfil($p_Obj_Aut->Id_Usuario,$l_4_manage_profile_all_store);

        $l_Id_Tienda = (!$l_Rpt->Error->flagerror) ? 0 : $p_Obj_Aut->Id_Tienda;

        $l_Rpt->Resultado = $l_ADUsuario->Get_Usuario($p_Id_Usuario,$l_Id_Tienda,$p_Obj_Aut->Id_Empresa);

        return $l_Rpt;
    }

    public function Set_Usuario(ENUsuarioSistema $p_UsuarioSistema,ENAutenticacionService $p_Obj_Autenticacion)
    {
        $l_Rpt = new ENResponse();
        $l_ADUsuario = new ADUsuario();
        $l_LNCliente = new LNCliente();
        $l_DataService = new ENDataService();
        $l_SEOrquestador = new SEOrquestador();
        $l_Obj_Cliente = [];
        $l_Obj_Cliente_2 = [];
        $l_List_Id_Perfiles = [];

        $l_DataService->Paginacion->Tip_Busqueda = 1;
        $l_DataService->Paginacion->Tip_Listado = 0;
        $l_DataService->Paginacion->Num_Seccion = 1;

        $l_DataService->Busqueda["Tip_Persona"] = 1;
        $l_DataService->Busqueda["Tip_Documento"] = $p_UsuarioSistema->Tip_Documento;
        $l_DataService->Busqueda["Cod_Documento"] = $p_UsuarioSistema->Cod_Documento;

        $l_Rpt = $l_SEOrquestador->Ejecutar_05_ws_wa_ListarClientes($l_DataService,$p_Obj_Autenticacion);
        if( $l_Rpt->Error->flagerror ) return $l_Rpt;

        $l_Obj_Cliente = $l_Rpt->Resultado;

        //Cargamos objeto cliente con la data recibida de la web
        $l_Obj_Cliente_2 = $this->Cargar_Obj_Usuario($l_Obj_Cliente_2,$l_Obj_Cliente,$p_UsuarioSistema);
    
        $l_Rpt = $l_SEOrquestador->Ejecutar_06_ws_wa_RegistrarCliente($l_Obj_Cliente_2,$p_Obj_Autenticacion->Id_Usuario,$p_Obj_Autenticacion->Id_Empresa,$p_Obj_Autenticacion->Id_Tienda,$p_Obj_Autenticacion->User,$p_Obj_Autenticacion->Password);
        if( $l_Rpt->Error->flagerror ) return $l_Rpt;

        $p_UsuarioSistema->Id_PersonaNatural = (int)$l_Rpt->Resultado["Id_PersonaNatural"];
        $p_UsuarioSistema->Id_Cliente = (int)$l_Rpt->Resultado["Id_Cliente"];
        

        if ( count($p_UsuarioSistema->List_Perfiles_Usuario) )
        {
            foreach($p_UsuarioSistema->List_Perfiles_Usuario as $Item)
            {
                if( $Item->Flg_Asignado ) array_push($l_List_Id_Perfiles,["Id_Perfil" => $Item->Id_Perfil]);
            }

            if( count($l_List_Id_Perfiles) == 0 )
            {
                array_push($l_List_Id_Perfiles,["Id_Perfil" => 0]);
            }   
        }

        $l_Rpt = new ENResponse();
        
        $l_Rpt = $l_ADUsuario->Set_Usuario($p_UsuarioSistema,$l_List_Id_Perfiles,$p_Obj_Autenticacion->Id_Empresa,$p_Obj_Autenticacion->Id_Tienda,$p_Obj_Autenticacion->Id_Usuario);
        
        //Si al registrar existe un fallo, regresamos a sus valores originales al cliente
        if( $l_Rpt->Error->flagerror )
        {
            if( $l_Obj_Cliente["PersonaNatural"] != null )
            {
                //Cargamos objeto cliente con la data recibida de la web
                $l_Obj_Cliente_2 = $this->Cargar_Obj_Usuario($l_Obj_Cliente_2,$l_Obj_Cliente,null);

                $l_SEOrquestador->Ejecutar_06_ws_wa_RegistrarCliente($l_Obj_Cliente_2,$p_Obj_Autenticacion->Id_Usuario,$p_Obj_Autenticacion->Id_Empresa,$p_Obj_Autenticacion->Id_Tienda,$p_Obj_Autenticacion->User,$p_Obj_Autenticacion->Password);

            }

            return $l_Rpt;
        }

        return $l_Rpt;
    }

    private function Cargar_Obj_Usuario(array $p_Obj_Cliente_Local,array $p_Obj_Cliente_Ws,ENUsuarioSistema $p_UsuarioSistema=null)
    {
        
        $p_Obj_Cliente_Local["Cliente"]["Id_Cliente"] = null;
        $p_Obj_Cliente_Local["Cliente"]["Tip_Persona"] = 1;
        $p_Obj_Cliente_Local["Cliente"]["PersonaNatural"]["Tip_Documento"] = 0;
        $p_Obj_Cliente_Local["Cliente"]["PersonaNatural"]["Cod_Documento"] = "";
        $p_Obj_Cliente_Local["Cliente"]["PersonaNatural"]["Des_Nombres"] = "";
        $p_Obj_Cliente_Local["Cliente"]["PersonaNatural"]["Des_ApePaterno"] = "";
        $p_Obj_Cliente_Local["Cliente"]["PersonaNatural"]["Des_ApeMaterno"] = "";
        $p_Obj_Cliente_Local["Cliente"]["PersonaNatural"]["Des_Celular"] = "";
        $p_Obj_Cliente_Local["Cliente"]["PersonaNatural"]["Des_Email"] = "";
        $p_Obj_Cliente_Local["Cliente"]["PersonaNatural"]["Fec_Nacimiento"] = "";
        $p_Obj_Cliente_Local["Cliente"]["PersonaNatural"]["Des_Direccion"] = "";
        $p_Obj_Cliente_Local["Cliente"]["PersonaNatural"]["Cod_Ruc"] = "";
        $p_Obj_Cliente_Local["Cliente"]["PersonaNatural"]["Des_Celular2"] = "";
        $p_Obj_Cliente_Local["Cliente"]["PersonaNatural"]["Des_Telefono"] = "";
        $p_Obj_Cliente_Local["Cliente"]["PersonaNatural"]["Des_Telefono2"] = "";           
        $p_Obj_Cliente_Local["Cliente"]["PersonaNatural"]["Des_Email2"] = "";           
        $p_Obj_Cliente_Local["Cliente"]["PersonaNatural"]["Id_Ciudad"] = 0;
        $p_Obj_Cliente_Local["Cliente"]["PersonaNatural"]["Cod_Ubigeo"] = "";       
        $p_Obj_Cliente_Local["Cliente"]["PersonaNatural"]["Des_UrlPagWeb"] = "";
        $p_Obj_Cliente_Local["Cliente"]["PersonaNatural"]["Des_UrlFacebook"] = "";
        $p_Obj_Cliente_Local["Cliente"]["PersonaNatural"]["Des_UrlTwitter"] = "";
        $p_Obj_Cliente_Local["Cliente"]["PersonaNatural"]["Des_UrlInstagram"] = "";
        $p_Obj_Cliente_Local["Cliente"]["PersonaNatural"]["Flg_Nacional"] = true;
        $p_Obj_Cliente_Local["Cliente"]["PersonaNatural"]["Id_Pais"] = 0;
        $p_Obj_Cliente_Local["Cliente"]["PersonaNatural"]["Id_Estado"] = 0;
        $p_Obj_Cliente_Local["Cliente"]["PersonaNatural"]["Id_Departamento"] = 0;
        $p_Obj_Cliente_Local["Cliente"]["PersonaNatural"]["Id_Provincia"] = 0;
        $p_Obj_Cliente_Local["Cliente"]["PersonaNatural"]["Id_Distrito"] = 0;

        if( $p_Obj_Cliente_Ws["PersonaNatural"] != null )
        {
            $p_Obj_Cliente_Local["Cliente"]["Id_Cliente"] = (int)$p_Obj_Cliente_Ws["Id_Cliente"];;
            $p_Obj_Cliente_Local["Cliente"]["Tip_Persona"] = 1;
            $p_Obj_Cliente_Local["Cliente"]["PersonaNatural"]["Des_Telefono"] = (string)$p_Obj_Cliente_Ws["PersonaNatural"]["Des_Telefono"];
            $p_Obj_Cliente_Local["Cliente"]["PersonaNatural"]["Cod_Ruc"] = (string)$p_Obj_Cliente_Ws["PersonaNatural"]["Cod_Ruc"];
            $p_Obj_Cliente_Local["Cliente"]["PersonaNatural"]["Tip_Documento"] = (int)$p_Obj_Cliente_Ws["PersonaNatural"]["Tip_Documento"];
            $p_Obj_Cliente_Local["Cliente"]["PersonaNatural"]["Cod_Documento"] = (string)$p_Obj_Cliente_Ws["PersonaNatural"]["Cod_Documento"];
            $p_Obj_Cliente_Local["Cliente"]["PersonaNatural"]["Des_Nombres"] = (string)$p_Obj_Cliente_Ws["PersonaNatural"]["Des_Nombres"];
            $p_Obj_Cliente_Local["Cliente"]["PersonaNatural"]["Des_ApePaterno"] = (string)$p_Obj_Cliente_Ws["PersonaNatural"]["Des_ApePaterno"];
            $p_Obj_Cliente_Local["Cliente"]["PersonaNatural"]["Des_ApeMaterno"] = (string)$p_Obj_Cliente_Ws["PersonaNatural"]["Des_ApeMaterno"];
            $p_Obj_Cliente_Local["Cliente"]["PersonaNatural"]["Des_Celular"] = (string)$p_Obj_Cliente_Ws["PersonaNatural"]["Des_Celular"];
            $p_Obj_Cliente_Local["Cliente"]["PersonaNatural"]["Des_Email"] = (string)$p_Obj_Cliente_Ws["PersonaNatural"]["Des_Email"];
            $p_Obj_Cliente_Local["Cliente"]["PersonaNatural"]["Fec_Nacimiento"] = (string)$p_Obj_Cliente_Ws["PersonaNatural"]["Fec_Nacimiento"];
            $p_Obj_Cliente_Local["Cliente"]["PersonaNatural"]["Des_Direccion"] = (string)$p_Obj_Cliente_Ws["PersonaNatural"]["Des_Direccion"];
        }

        if( $p_UsuarioSistema != null )
        {
            $p_Obj_Cliente_Local["Cliente"]["PersonaNatural"]["Tip_Documento"] = $p_UsuarioSistema->Tip_Documento;
            $p_Obj_Cliente_Local["Cliente"]["PersonaNatural"]["Cod_Documento"] = $p_UsuarioSistema->Cod_Documento;
            $p_Obj_Cliente_Local["Cliente"]["PersonaNatural"]["Des_Nombres"] = $p_UsuarioSistema->Des_Nombres;
            $p_Obj_Cliente_Local["Cliente"]["PersonaNatural"]["Des_ApePaterno"] = $p_UsuarioSistema->Des_ApePaterno;
            $p_Obj_Cliente_Local["Cliente"]["PersonaNatural"]["Des_ApeMaterno"] = $p_UsuarioSistema->Des_ApeMaterno;
            $p_Obj_Cliente_Local["Cliente"]["PersonaNatural"]["Des_Celular"] = $p_UsuarioSistema->Des_Celular;
            $p_Obj_Cliente_Local["Cliente"]["PersonaNatural"]["Des_Email"] = $p_UsuarioSistema->Des_Email;
            $p_Obj_Cliente_Local["Cliente"]["PersonaNatural"]["Fec_Nacimiento"] = $p_UsuarioSistema->Fec_Nacimiento;
            $p_Obj_Cliente_Local["Cliente"]["PersonaNatural"]["Des_Direccion"] = $p_UsuarioSistema->Des_Direccion;
        }

        return $p_Obj_Cliente_Local;
    }

    public function Get_List_Usuarios(ENDataService $p_Request,ENAutenticacionService $p_Obj_Autenticacion):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_ADUsuario = new ADUsuario();
        $l_ResultBusqueda = new ENResultBusqueda();
        $l_LNGenerico = new LNGenerico();
        $l_Id_Tienda = 0;

        $l_Des_Busqueda = "";

        if(array_key_exists("Des_Busqueda",$p_Request->Busqueda))
        {
            $l_Des_Busqueda = $p_Request->Busqueda["Des_Busqueda"];
        }

        $l_ADSeguridad = new ADSeguridad();
        $l_4_manage_profile_all_store = 4; //PERFIL QUE PUEDE REALIZAR CARGA MASIVA DE STOCK EN CUALQUIER TIENDA

        $l_Rpt = $l_ADSeguridad->Get_Validacion_Perfil($p_Obj_Autenticacion->Id_Usuario,$l_4_manage_profile_all_store);

        $l_Id_Tienda = (!$l_Rpt->Error->flagerror) ?  0 : (int)$p_Obj_Autenticacion->Id_Tienda;
 

        $p_Request->Paginacion = $l_LNGenerico->Get_Valor_Intervalo($p_Request->Paginacion);

        $l_ResultBusqueda = $l_ADUsuario->Get_List_Usuarios((int)$p_Obj_Autenticacion->Id_Empresa,$l_Id_Tienda,$l_Des_Busqueda,$p_Request->Paginacion->Num_RegistroIni,$p_Request->Paginacion->Num_Intervalo);

        $l_ResultBusqueda = $l_LNGenerico->Calcular_Datos_Paginacion($l_ResultBusqueda,$p_Request->Paginacion->Num_Seccion,$p_Request->Paginacion->Num_RegistroIni,$p_Request->Paginacion->Num_Intervalo);

        $l_Rpt->Resultado = $l_ResultBusqueda;

        return $l_Rpt;
    }

}
?>