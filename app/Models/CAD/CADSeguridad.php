<?php namespace App\Models\CAD;

use CodeIgniter\Model;

use App\Models\CEN\CENValidacionPerfil as ENValidacionPerfil;
use App\Models\CEN\CENResponse as ENResponse;

class CADSeguridad extends Model
{
    public $db = null;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function Get_Permisos_Servicio(int $p_Id_Empresa,int $p_Id_Tienda,int $p_Id_Usuario,string $p_Des_UsuarioTienda):array
    {
        $l_ResultDt = null;
        $l_query = null;
        $l_StoreProcedure = "";
        $l_ListParametros = [];
        $l_ObjetoQuery = [];

        $l_StoreProcedure = "sp_cixmart_get_permisos_service";
        array_push($l_ListParametros,["p_Id_Emp",$p_Id_Empresa]);       
        array_push($l_ListParametros,["p_Id_Tie",$p_Id_Tienda]);
        array_push($l_ListParametros,["p_Id_Usu",$p_Id_Usuario]);
        array_push($l_ListParametros,["p_Des_Tie_Usr",$p_Des_UsuarioTienda]);

        $l_ObjetoQuery = CrearEstructuraSP($l_StoreProcedure,$l_ListParametros);

        $l_query = $this->db->query($l_ObjetoQuery["store"],$l_ObjetoQuery["parametros"]);
        $l_ResultDt =  $l_query->getResultArray(); 

        return $l_ResultDt;
    }

    public function Get_Validacion_Perfil(int $p_Id_Usuario,int $p_Tip_Grupo_Validacion):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_ResultDt = null;
        $l_query = null;
        $l_StoreProcedure = "";
        $l_ListParametros = [];
        $l_ObjetoQuery = [];
        $l_ValidacionPerfil = new ENValidacionPerfil();

        $l_StoreProcedure = "sp_cixmart_get_validacion_perfil"; 
        array_push($l_ListParametros,["p_Tip_Val",$p_Id_Usuario]);
        array_push($l_ListParametros,["p_Id_Usu",$p_Tip_Grupo_Validacion]);
        
        $l_ObjetoQuery = CrearEstructuraSP($l_StoreProcedure,$l_ListParametros);

        $l_query = $this->db->query($l_ObjetoQuery["store"],$l_ObjetoQuery["parametros"]);

        if($l_query)
        {
            $l_ResultDt =  $l_query->getResultArray();
            
            if($l_ResultDt)
            {
                if( (int)$l_ResultDt[0]["Code"] != 1 )
                {
                    $l_Rpt->Error->flagerror = true;
                    $l_Rpt->Error->messages = "{".$l_ResultDt[0]["Code"]."} ".$l_ResultDt[0]["Message"];
                    $l_Rpt->Error->error = $l_ResultDt[0]["Code"];
                }
            }
        }

        return $l_Rpt;
    }    

}