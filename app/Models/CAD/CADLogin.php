<?php namespace App\Models\CAD;

use CodeIgniter\Model;

class CADLogin extends Model
{
    public $db = null;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function Autentificar(string $p_Usuario,string $p_Password)
    {
        $l_ResultDt = null;
        $l_query = null;
        $l_StoreProcedure = "";
        $l_ListParametros = [];
        $l_ObjetoQuery = [];

        $l_StoreProcedure = "sp_cixmart_get_usuario";
        array_push($l_ListParametros,["p_Des_Usu_Urs",$p_Usuario]);
        array_push($l_ListParametros,["p_Des_Usu_Psw",$p_Password]);
        $l_ObjetoQuery = CrearEstructuraSP($l_StoreProcedure,$l_ListParametros);

        $l_query = $this->db->query($l_ObjetoQuery["store"],$l_ObjetoQuery["parametros"]);
        $l_ResultDt =  $l_query->getResultArray(); 

        return $l_ResultDt;
    }

    public function Get_List_Menu_Accesible(array $p_List_Key_Perfil)
    {
       $l_ResultDt = null;
       $l_query = null;
       $l_Sql = "";
       $l_ListParametros = [];
       $l_Num_Contador = 0;
       $l_List_Menu_Accesibles = [];

       $l_Sql .= "  SELECT
                        Cod_Cfmen_Key
                    FROM 
                        DA_PERFIL
                    INNER JOIN CF_PERFILPERMI ON CF_PERFILPERMI.Id_Daprf_FK = DA_PERFIL.Id_Daprf
                    INNER JOIN CF_MENU ON CF_MENU.Id_Cfmen = CF_PERFILPERMI.Id_Cfmen_FK
                    WHERE 
                        DA_PERFIL.Cod_Daprf_Key IN ('". implode("','", $p_List_Key_Perfil) . "')
                        AND DA_PERFIL.Flg_Estado = :Flg_Estado:
                        AND DA_PERFIL.Flg_Marcabaja = :Flg_Marcabaja:
                        AND CF_PERFILPERMI.Flg_Estado = :Flg_Estado1:
                        AND CF_PERFILPERMI.Flg_Marcabaja = :Flg_Marcabaja1:
                        AND CF_MENU.Flg_Estado = :Flg_Estado2:
                        AND CF_MENU.Flg_Marcabaja = :Flg_Marcabaja2: ";

       $l_ListParametros["Flg_Estado"] = true;
       $l_ListParametros["Flg_Marcabaja"] = true;
       $l_ListParametros["Flg_Estado1"] = true;
       $l_ListParametros["Flg_Marcabaja1"] = true;
       $l_ListParametros["Flg_Estado2"] = true;
       $l_ListParametros["Flg_Marcabaja2"] = true;

       $l_query = $this->db->query($l_Sql,$l_ListParametros);
       $l_ResultDt =  $l_query->getResultArray();

       if($l_ResultDt)
       {
           foreach( $l_ResultDt as $Item )
           {
                $l_List_Menu_Accesibles[$Item["Cod_Cfmen_Key"]] = $Item["Cod_Cfmen_Key"];
           }
       }

       return $l_List_Menu_Accesibles;
   }

}