<?php namespace App\Models\CAD;

use CodeIgniter\Model;

use App\Models\CEN\CENPerfil as ENPerfil;
use App\Models\CEN\CENValidacionPerfil as ENValidacionPerfil;
use App\Models\CEN\CENMenu as ENMenu;

class CADPerfilusuario extends Model
{
    public $db = null;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function Get_Perfil_Usuario(ENPerfil $request)
    {
        $l_ResultDt = null;
        $l_query = null;
        $l_StoreProcedure = "";
        $l_ListParametros = [];
        $l_ObjetoQuery = [];

        $l_StoreProcedure = "sp_cixmart_get_perfil";
        array_push($l_ListParametros,["p_Id_Prf",$request->Id_Perfil]);
        array_push($l_ListParametros,["p_Id_Emp",$request->Id_Empresa]);
        array_push($l_ListParametros,["p_Num_RegIni",$request->Num_RegistroIni]);
        array_push($l_ListParametros,["p_Num_Interv",$request->Num_Intervalo]);

        $l_ObjetoQuery = CrearEstructuraSP($l_StoreProcedure,$l_ListParametros);

        $l_query = $this->db->query($l_ObjetoQuery["store"],$l_ObjetoQuery["parametros"]);
        $l_ResultDt =  $l_query->getResultArray(); 

        return $l_ResultDt;
    }

    /**
     * Registra o actualiza el perfil de usuario
     */
    public function Set_Perfil_Usuario(ENPerfil $request,array $p_List_Permisos_Operacionales,array $p_List_Menu_Accesibles)
    {
        $l_ResultDt = null;
        $l_query = null;
        $l_StoreProcedure = "";
        $l_ListParametros = [];
        $l_ObjetoQuery = [];

        $l_StoreProcedure = "sp_cixmart_set_perfil";
        array_push($l_ListParametros,["p_Tip_Acc",$request->Tip_Accion]);
        array_push($l_ListParametros,["p_Id_Prf",$request->Id_Perfil]);
        array_push($l_ListParametros,["p_Id_Emp",$request->Id_Empresa]);
        array_push($l_ListParametros,["p_Des_Prf_Nom",$request->Des_Perfil]);
        array_push($l_ListParametros,["p_Cod_Prf_Key",$request->Cod_KeyPerfil]);
        array_push($l_ListParametros,["p_Flg_Prf_Rti",$request->Flg_RestrinTienda]);
        array_push($l_ListParametros,["p_Flg_Prf_Rcj",$request->Flg_RestrinCaja]);
        array_push($l_ListParametros,["p_Fec_Prf_Hin",$request->Fec_Inicio]);
        array_push($l_ListParametros,["p_Fec_Prf_Hfi",$request->Fec_Final]);
        array_push($l_ListParametros,["p_Des_Prf_Dia",$request->Des_DiasPermi]);
        array_push($l_ListParametros,["p_List_Permi_Ope",CrearListaStringGenerico($p_List_Permisos_Operacionales)]);
        array_push($l_ListParametros,["p_List_Permi_Men",CrearListaStringGenerico($p_List_Menu_Accesibles)]);
        array_push($l_ListParametros,["p_Id_Usuamodi",$request->Id_Usuamodi]);       

        $l_ObjetoQuery = CrearEstructuraSP($l_StoreProcedure,$l_ListParametros);

        $l_query = $this->db->query($l_ObjetoQuery["store"],$l_ObjetoQuery["parametros"]);

        if($l_query)
        {
            $l_ResultDt =  $l_query->getResultArray(); 
        }
        else
        {
            $l_ResultDt = null;
        }       

        return $l_ResultDt;       
    }

    /**
     * Retorna los permisos operativos ya asignados a un Perfil
     */

    public function Get_Permisos_Operativos_Perfil(int $p_Id_Perfil, int $p_Id_Empresa):array
    {
        $l_List_Permisos = [];
        $l_SQL = "";
        $l_Key_Validations_User_Profile = 26; //KEY VALIDOS PARA VALIDACIONES DE PERFIL
        $l_ListParametros = [];
        $l_ValidacionPerfil = null;

        $l_SQL = "  SELECT
                        CF_PERFILPERMIOPERA.Tip_Cfppo_Val
                    FROM CF_PERFILPERMIOPERA
                        INNER JOIN DA_PERFIL ON DA_PERFIL.Id_Daprf = CF_PERFILPERMIOPERA.Id_Daprf_FK
                        INNER JOIN CF_PARSISTEMA TMP_VALIDACION ON TMP_VALIDACION.Cod_Cfpsis = CF_PERFILPERMIOPERA.Tip_Cfppo_Val 
                            AND TMP_VALIDACION.Cod_Cfsis_FK = :p_Key_Validations_User_Profile:
                    WHERE
                        DA_PERFIL.Id_Daprf = :p_Id_Perfil:
                        AND DA_PERFIL.Id_Daemp_FK = :p_Id_Empresa:
                        AND CF_PERFILPERMIOPERA.Flg_Estado = :p_Flg_Estado1:
                        AND CF_PERFILPERMIOPERA.Flg_Marcabaja = :p_Flg_Marcabaja1:
                        AND DA_PERFIL.Flg_Estado = :p_Flg_Estado2:
                        AND DA_PERFIL.Flg_Marcabaja = :p_Flg_Marcabaja2:
                        AND TMP_VALIDACION.Flg_Estado = :p_Flg_Estado3:
                        AND TMP_VALIDACION.Flg_Marcabaja = :p_Flg_Marcabaja3:  ";

        $l_ListParametros["p_Key_Validations_User_Profile"] = $l_Key_Validations_User_Profile;
        $l_ListParametros["p_Id_Perfil"] = $p_Id_Perfil;
        $l_ListParametros["p_Id_Empresa"] = $p_Id_Empresa;
        $l_ListParametros["p_Flg_Estado1"] = true;
        $l_ListParametros["p_Flg_Marcabaja1"] = true;
        $l_ListParametros["p_Flg_Estado2"] = true;
        $l_ListParametros["p_Flg_Marcabaja2"] = true;
        $l_ListParametros["p_Flg_Estado3"] = true;
        $l_ListParametros["p_Flg_Marcabaja3"] = true;

            
        $l_query = $this->db->query( $l_SQL , $l_ListParametros );

        if($l_query)
        {
            $l_ResultDt =  $l_query->getResultArray();
            if($l_ResultDt)
            {
                foreach( $l_ResultDt as $Item )
                {
                    $l_ValidacionPerfil = new ENValidacionPerfil();

                    $l_ValidacionPerfil->Cod_Validacion = (int)$Item["Tip_Cfppo_Val"];

                    array_push($l_List_Permisos,$l_ValidacionPerfil);
                }
            }
        }
        return $l_List_Permisos;
    }

    public function Get_List_Menu(int $p_Id_Menu_Padre,bool $p_Flg_Redireccionable)
    {
        $l_SQL = "";
        $l_ListParametros = [];
        $l_Menu = null;
        $l_List_Menu = [];

        $l_SQL = "  SELECT
                         CF_MENU.Id_Cfmen
                        ,CF_MENU.Des_Cfmen_Nom
                        ,CF_MENU.Cod_Cfmen_Key
                        ,CF_MENU.Flg_Cfmen_Rdr
                        ,CF_MENU.Num_Cfmen_Niv
                    FROM 
                        CF_MENU
                    WHERE 
                        CF_MENU.Id_Cfmen_Pdr = :p_Id_Menu_Padre:
                        AND CF_MENU.Flg_Cfmen_Rdr = :p_Flg_Redireccionable:
                        AND CF_MENU.Flg_Estado = :p_Flg_Estado:
                        AND CF_MENU.Flg_Marcabaja = :p_Flg_Marcabaja: ";

        $l_ListParametros["p_Id_Menu_Padre"] = $p_Id_Menu_Padre;
        $l_ListParametros["p_Flg_Redireccionable"] = $p_Flg_Redireccionable;
        $l_ListParametros["p_Flg_Estado"] = true;
        $l_ListParametros["p_Flg_Marcabaja"] = true;

        $l_query = $this->db->query( $l_SQL , $l_ListParametros );

        if($l_query)
        {
            $l_ResultDt =  $l_query->getResultArray();
            if($l_ResultDt)
            {
                foreach( $l_ResultDt as $Item )
                {
                    $l_Menu = new ENMenu();

                    $l_Menu->Id_Menu = (int)$Item["Id_Cfmen"];
                    $l_Menu->Des_Menu = (string)$Item["Des_Cfmen_Nom"];
                    $l_Menu->Cod_KeyMenu = (string)$Item["Cod_Cfmen_Key"];
                    $l_Menu->Flg_Redigirible = (bool)$Item["Flg_Cfmen_Rdr"];
                    $l_Menu->Num_Nivel = (int)$Item["Num_Cfmen_Niv"];

                    array_push($l_List_Menu,$l_Menu);
                }
            }
        }

        return $l_List_Menu;
    }

    /**
     * Retorno la lista menu a los que puede acceder un perfil
     */
    public function Get_List_Menu_Accesibles(int $p_Id_Perfil)
    {
        $l_SQL = "";
        $l_ListParametros = [];
        $l_Menu = null;
        $l_List_Menu = [];

        $l_SQL = "  SELECT
                        CF_PERFILPERMI.Id_Cfmen_FK
                    FROM 
                        CF_PERFILPERMI
                    INNER JOIN DA_PERFIL ON DA_PERFIL.Id_Daprf = CF_PERFILPERMI.Id_Daprf_FK
                    WHERE 
                        DA_PERFIL.Id_Daprf = :p_Id_Perfil:
                        AND DA_PERFIL.Flg_Estado = :p_Flg_Estado:
                        AND DA_PERFIL.Flg_Marcabaja = :p_Flg_Marcabaja:
                        AND CF_PERFILPERMI.Flg_Estado = :p_Flg_Estado1:
                        AND CF_PERFILPERMI.Flg_Marcabaja = :p_Flg_Marcabaja1: ";

        $l_ListParametros["p_Id_Perfil"] = $p_Id_Perfil;
        $l_ListParametros["p_Flg_Estado"] = true;
        $l_ListParametros["p_Flg_Marcabaja"] = true;
        $l_ListParametros["p_Flg_Estado1"] = true;
        $l_ListParametros["p_Flg_Marcabaja1"] = true;

        $l_query = $this->db->query( $l_SQL , $l_ListParametros );

        if($l_query)
        {
            $l_ResultDt =  $l_query->getResultArray();
            if($l_ResultDt)
            {
                foreach( $l_ResultDt as $Item )
                {
                    $l_Menu = new ENMenu();

                    $l_Menu->Id_Menu = (int)$Item["Id_Cfmen_FK"];

                    array_push($l_List_Menu,$l_Menu);
                }
            }
        }

        return $l_List_Menu;
    }


}

?>    