<?php namespace App\Models\CAD;

use CodeIgniter\Model;
use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENPerfilUsuario as ENPerfilUsuario;
use App\Models\CEN\CENUsuarioSistema as ENUsuarioSistema;
use App\Models\CEN\CENResultBusqueda as ENResultBusqueda;

class CADUsuario extends Model
{
    public $db = null;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function Get_Perfil_Usuario(int $p_Id_Usuario):array
    {
        $l_ResultDt = null;
        $l_query = null;
        $l_String_Query = "";
        $l_ListParametros = [];
        $l_ObjetoQuery = [];
        $l_List_Perfiles_Usuario = [];
        $l_PerfilUsuario = null;

        $l_String_Query .= "SELECT 
                                DA_PERFIL.Id_Daprf,DA_PERFIL.Des_Daprf_Nom, 
                                (SELECT COUNT(*) FROM CD_PERFILUSU  
                                WHERE CD_PERFILUSU.Id_Daprf_FK =  DA_PERFIL.Id_Daprf 
                                AND CD_PERFILUSU.Flg_Estado = ? AND CD_PERFILUSU.Flg_Marcabaja = ? 
                                AND CD_PERFILUSU.Id_Dausu_FK = ?) AS Flg_Permiso 
                            FROM DA_PERFIL 
                            WHERE 
                            DA_PERFIL.Flg_Estado = ? AND DA_PERFIL.Flg_Marcabaja = ? ";

        array_push($l_ListParametros,["Flg_Estado",true]);
        array_push($l_ListParametros,["Flg_Marcabaja",true]);
        array_push($l_ListParametros,["Id_Dausu_FK",$p_Id_Usuario]);
        array_push($l_ListParametros,["Flg_Estado",true]);
        array_push($l_ListParametros,["Flg_Marcabaja",true]);

        $l_ObjetoQuery = CrearEstructuraQuery($l_String_Query,$l_ListParametros);

        $l_query = $this->db->query($l_ObjetoQuery["query"],$l_ObjetoQuery["parametros"]);

        if($l_query)
        {
            $l_ResultDt =  $l_query->getResultArray();
            if($l_ResultDt)
            {
                foreach($l_ResultDt as $Item)
                {
                    $l_PerfilUsuario = new ENPerfilUsuario();
                    $l_PerfilUsuario->Id_Perfil = (int)$Item["Id_Daprf"];
                    $l_PerfilUsuario->Des_Perfil = (string)$Item["Des_Daprf_Nom"];
                    $l_PerfilUsuario->Flg_Asignado = (bool)$Item["Flg_Permiso"];
                    array_push($l_List_Perfiles_Usuario,$l_PerfilUsuario);
                }
            }
        }
         

        return $l_List_Perfiles_Usuario;
    }

    public function Get_List_Usuarios(int $p_Id_Empresa,int $p_Id_Tienda,string $p_Des_Busqueda,int $p_Num_RegistroIni,int $p_Num_Intervalo):ENResultBusqueda
    {
        $l_ResultDt = null;
        $l_query = null;
        $l_StoreProcedure = "";
        $l_ListParametros = [];
        $l_ObjetoQuery = [];
        $l_List_Usuarios = [];
        $l_UsuarioSistema = null;
        $l_ResultBusqueda = new ENResultBusqueda();

        $l_StoreProcedure = "sp_cixmart_get_list_usuario";

        array_push($l_ListParametros,["p_Id_Emp",$p_Id_Empresa]);
        array_push($l_ListParametros,["p_Id_Tie",$p_Id_Tienda]);
        array_push($l_ListParametros,["p_Des_Bus",$p_Des_Busqueda]);
        array_push($l_ListParametros,["p_Num_RegIni",$p_Num_RegistroIni]);
        array_push($l_ListParametros,["p_Num_Interv",$p_Num_Intervalo]);            

        $l_ObjetoQuery = CrearEstructuraSP($l_StoreProcedure,$l_ListParametros);

        $l_query = $this->db->query($l_ObjetoQuery["store"],$l_ObjetoQuery["parametros"]);

        if($l_query)
        {
            $l_ResultDt =  $l_query->getResultArray();
            
            if( $l_ResultDt!=null && count($l_ResultDt)>0 && (int)$l_ResultDt[0]["Code"] == 1)
            {
                $l_ResultBusqueda->Num_TotalBus = (int)$l_ResultDt[0]["Num_TotalBus"];
                $l_ResultBusqueda->Num_TotalReg = (int)$l_ResultDt[0]["Num_TotalReg"];

                foreach($l_ResultDt as $Item)
                {
                    $l_UsuarioSistema = new ENUsuarioSistema();

                    $l_UsuarioSistema->Id_Usuario = (int)$Item["Id_Dausu"];
                    $l_UsuarioSistema->Des_Usuario = (string)$Item["Des_Dausu_Urs"];
                    $l_UsuarioSistema->Cod_Documento = (string)$Item["Cod_Dapnat_Doc"];
                    $l_UsuarioSistema->Des_Nombres = (string)$Item["Des_Dapnat_Nmb"];
                    $l_UsuarioSistema->Des_Usuario = (string)$Item["Des_Dausu_Urs"];
                    $l_UsuarioSistema->Des_Tienda = (string)$Item["Des_Datie_Nom"];
                    $l_UsuarioSistema->Flg_Estado = (bool)$Item["Flg_Estado"];
                    $l_UsuarioSistema->Fec_Modificacion = (string)$Item["Fec_Modifica"];
                    array_push($l_List_Usuarios,$l_UsuarioSistema);
                }

                $l_ResultBusqueda->List_Resultado = $l_List_Usuarios;
            }
        }

        return $l_ResultBusqueda;       
    }

    public function Set_Usuario(ENUsuarioSistema $p_UsuarioSistema,array $p_List_Permisos,int $p_Id_Empresa,int $p_Id_Tienda,int $p_Id_Usuario):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_ResultDt = null;
        $l_query = null;
        $l_StoreProcedure = "";
        $l_ListParametros = [];
        $l_ObjetoQuery = [];

        $l_StoreProcedure = "sp_cixmart_set_usuario_sistema";

        array_push($l_ListParametros,["p_Id_Usu",$p_UsuarioSistema->Id_Usuario]);
        array_push($l_ListParametros,["p_Id_Pnat",$p_UsuarioSistema->Id_PersonaNatural]);
        array_push($l_ListParametros,["p_Id_Emp",$p_Id_Empresa]);
        array_push($l_ListParametros,["p_Id_Tie",$p_UsuarioSistema->Id_Tienda]);
        array_push($l_ListParametros,["p_Des_Usu_Urs",$p_UsuarioSistema->Des_Usuario]);
        array_push($l_ListParametros,["p_Des_Usu_Psw",$p_UsuarioSistema->get_Des_Password_Encriptado()]);
        array_push($l_ListParametros,["p_Cod_Usu_Rec",""]);
        array_push($l_ListParametros,["p_Cod_Usu_Ter",""]);
        array_push($l_ListParametros,["p_Fec_Usu_Hin",""]);
        array_push($l_ListParametros,["p_Fec_Usu_Hfi",""]);
        array_push($l_ListParametros,["p_Des_Usu_Dia",""]);
        array_push($l_ListParametros,["p_Flg_Usu_Rcj",false]);
        array_push($l_ListParametros,["p_Flg_Usu_Rti",false]);
        array_push($l_ListParametros,["p_Tip_Pnat_Doc",$p_UsuarioSistema->Tip_Documento]);
        array_push($l_ListParametros,["p_Cod_Pnat_Doc",$p_UsuarioSistema->Cod_Documento]);
        array_push($l_ListParametros,["p_List_Perf",$p_List_Permisos]);
        array_push($l_ListParametros,["p_Id_Usuamodi",$p_Id_Usuario]);        

        $l_ObjetoQuery = CrearEstructuraSP($l_StoreProcedure,$l_ListParametros);

        $l_query = $this->db->query($l_ObjetoQuery["store"],$l_ObjetoQuery["parametros"]);

        if($l_query)
        {
            $l_ResultDt =  $l_query->getResultArray();

            if($l_ResultDt)
            {
                if ( (int)$l_ResultDt[0]["Code"] != 1 )
                {
                    $l_Rpt->Error->flagerror = true;
                    $l_Rpt->Error->messages = (string)$l_ResultDt[0]["Code"]. " - " .(string)$l_ResultDt[0]["Message"];
                }
                else
                {
                    $l_Rpt->Resultado = (int)$l_ResultDt[0]["Id"];
                }
            }
        }     

        return $l_Rpt; 
    }

    public function Get_Usuario(int $p_Id_Usuario,int $p_Id_Tienda,int $p_Id_Empresa):ENUsuarioSistema
    {
        $l_ResultDt = null;
        $l_query = null;
        $l_SQL = "";
        $l_ListParametros = [];
        $l_ObjetoQuery = [];
        $l_UsuarioSistema = new ENUsuarioSistema();

        $l_SQL .= " SELECT ";
        $l_SQL .= "    DA_USUARIO.Id_Dausu,";
        $l_SQL .= "    DA_PERNATU.Tip_Dapnat_Doc, ";
        $l_SQL .= "    DA_PERNATU.Cod_Dapnat_Doc, ";
        $l_SQL .= "    DA_PERNATU.Des_Dapnat_Nmb, ";
        $l_SQL .= "    DA_PERNATU.Des_Dapnat_Apt, ";
        $l_SQL .= "    DA_PERNATU.Des_Dapnat_Amt, ";
        $l_SQL .= "    DA_PERNATU.Fec_Dapnat_Nac, ";
        $l_SQL .= "    DA_PERNATU.Des_Dapnat_Em1, ";
        $l_SQL .= "    DA_PERNATU.Des_Dapnat_Ce1, ";
        $l_SQL .= "    DA_PERNATU.Des_Dapnat_Dir, ";
        $l_SQL .= "    DA_USUARIO.Des_Dausu_Urs, ";
        $l_SQL .= "    DA_USUARIO.Des_Dausu_Psw, ";
        $l_SQL .= "    DA_USUARIO.Id_Datie_FK ";
        $l_SQL .= " FROM DA_USUARIO ";
        $l_SQL .= "    INNER JOIN DA_PERNATU ON DA_PERNATU.Id_Dapnat = DA_USUARIO.Id_Dapnat_FK ";
        $l_SQL .= " WHERE DA_USUARIO.Flg_Estado = ? ";
        $l_SQL .= " AND DA_USUARIO.Flg_Marcabaja = ? ";
        if( $p_Id_Tienda != 0 ) $l_SQL .= " AND DA_USUARIO.Id_Datie_FK = ? ";
        $l_SQL .= " AND DA_USUARIO.Id_Daemp_FK = ? ";
        $l_SQL .= " AND DA_USUARIO.Id_Dausu = ? ";

        array_push($l_ListParametros,["Flg_Estado",true]);
        array_push($l_ListParametros,["Flg_Marcabaja",true]);
        if( $p_Id_Tienda != 0 ) array_push($l_ListParametros,["Id_Datie_FK",$p_Id_Tienda]);
        array_push($l_ListParametros,["Id_Daemp_FK",$p_Id_Empresa]);
        array_push($l_ListParametros,["Id_Dausu",$p_Id_Usuario]);

        $l_ObjetoQuery = CrearEstructuraQuery($l_SQL,$l_ListParametros);

        $l_query = $this->db->query($l_ObjetoQuery["query"],$l_ObjetoQuery["parametros"]);

        if($l_query)
        {
            $l_ResultDt =  $l_query->getResultArray();
            if($l_ResultDt)
            {
                foreach($l_ResultDt as $Item)
                {
                    $l_UsuarioSistema->Id_Usuario = (int)$Item["Id_Dausu"];
                    $l_UsuarioSistema->Tip_Documento = (int)$Item["Tip_Dapnat_Doc"];
                    $l_UsuarioSistema->Cod_Documento = (string)$Item["Cod_Dapnat_Doc"];
                    $l_UsuarioSistema->Des_Nombres = (string)$Item["Des_Dapnat_Nmb"];
                    $l_UsuarioSistema->Des_ApePaterno = (string)$Item["Des_Dapnat_Apt"];
                    $l_UsuarioSistema->Des_ApeMaterno = (string)$Item["Des_Dapnat_Amt"];
                    $l_UsuarioSistema->Fec_Nacimiento = (string)$Item["Fec_Dapnat_Nac"];
                    $l_UsuarioSistema->Des_Email = (string)$Item["Des_Dapnat_Em1"];
                    $l_UsuarioSistema->Des_Celular = (string)$Item["Des_Dapnat_Ce1"];
                    $l_UsuarioSistema->Des_Direccion = (string)$Item["Des_Dapnat_Dir"];
                    $l_UsuarioSistema->Id_Tienda = (int)$Item["Id_Datie_FK"];
                    $l_UsuarioSistema->Des_Usuario = (string)$Item["Des_Dausu_Urs"];
                    $l_UsuarioSistema->EncriptacionUno->desencriptar((string)$Item["Des_Dausu_Psw"]);
                    $l_UsuarioSistema->Des_Password = $l_UsuarioSistema->EncriptacionUno->get_Des_Val_Origen();
                }
            }
        }

        return $l_UsuarioSistema;
    }

}