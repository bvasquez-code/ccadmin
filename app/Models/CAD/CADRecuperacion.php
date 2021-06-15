<?php namespace App\Models\CAD;

use CodeIgniter\Model;

use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENRecuperacion as ENRecuperacion;

class CADRecuperacion extends Model
{
    public $db = null;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function Registrar_Codigo_Recuperacion(ENRecuperacion $p_Recuperacion):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_ResultDt = null;
        $l_query = null;
        $l_StoreProcedure = "";
        $l_ListParametros = [];
        $l_ObjetoQuery = [];

        $l_StoreProcedure = "sp_ccadmin_set_cod_recuperacion";
        array_push($l_ListParametros,["p_Des_Usu_Urs",$p_Recuperacion->Des_Usuario]);
        array_push($l_ListParametros,["p_Des_Usu_Eml",$p_Recuperacion->Des_Email]);
        array_push($l_ListParametros,["p_Cod_Usu_Rec",$p_Recuperacion->Cod_Recuperacion]);

        $l_ObjetoQuery = CrearEstructuraSP($l_StoreProcedure,$l_ListParametros);

        $l_query = $this->db->query($l_ObjetoQuery["store"],$l_ObjetoQuery["parametros"]);
        $l_ResultDt =  $l_query->getResultArray(); 

        if( $l_ResultDt )
        {
            if( (int)$l_ResultDt[0]["Code"] != 1 )
            {
                $l_Rpt->Error->flagerror = true;
                $l_Rpt->Error->messages = (string)$l_ResultDt[0]["Message"];
            }
        }

        return $l_Rpt;

    }

    public function Validar_Codigo_Recuperacion(
         string $p_Des_Usuario
        ,string $p_Cod_Recuperacion
    )
    {
        $l_Rpt = new ENResponse();
        $l_ResultDt = null;
        $l_query = null;
        $l_Sql = "";
        $l_ListParametros = [];
        $l_Num_Contador = 0;

        $l_Sql .= " SELECT
                        COUNT(*) AS Num_Cont
                    FROM
                        DA_USUARIO
                    WHERE
                        DA_USUARIO.Des_Dausu_Urs = :p_Des_Usuario:
                        AND DA_USUARIO.Cod_Dausu_Rec = :p_Cod_Recuperacion:
                        AND DA_USUARIO.Flg_Estado = :Flg_Estado:
                        AND DA_USUARIO.Flg_Marcabaja = :Flg_Marcabaja: ";

        $l_ListParametros["p_Des_Usuario"] = $p_Des_Usuario;
        $l_ListParametros["p_Cod_Recuperacion"] = $p_Cod_Recuperacion;
        $l_ListParametros["Flg_Estado"] = true;
        $l_ListParametros["Flg_Marcabaja"] = true;

        $l_query = $this->db->query($l_Sql,$l_ListParametros);
        $l_ResultDt =  $l_query->getResultArray();

        if($l_ResultDt)
        {
            $l_Num_Contador = (int)$l_ResultDt[0]["Num_Cont"];
        }
 
        return $l_Num_Contador;
    }

    public function Registrar_Nuevo_Password(string $p_Des_Usuario,string $p_Des_Password):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_ResultDt = null;
        $l_query = null;
        $l_StoreProcedure = "";
        $l_ListParametros = [];
        $l_ObjetoQuery = [];

        $l_StoreProcedure = "sp_ccadmin_set_nuevo_password";
        array_push($l_ListParametros,["p_Des_Usu_Urs",$p_Des_Usuario]);
        array_push($l_ListParametros,["p_Des_Usu_Eml",$p_Des_Password]);

        $l_ObjetoQuery = CrearEstructuraSP($l_StoreProcedure,$l_ListParametros);

        $l_query = $this->db->query($l_ObjetoQuery["store"],$l_ObjetoQuery["parametros"]);
        $l_ResultDt =  $l_query->getResultArray(); 

        if( $l_ResultDt )
        {
            if( (int)$l_ResultDt[0]["Code"] != 1 )
            {
                $l_Rpt->Error->flagerror = true;
                $l_Rpt->Error->messages = (string)$l_ResultDt[0]["Message"];
            }
        }

        return $l_Rpt;
    }

}