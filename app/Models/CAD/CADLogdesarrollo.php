<?php namespace App\Models\CAD;

use CodeIgniter\Model;

use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENLogDev as ENLogDev;


class CADLogdesarrollo extends Model
{
    public $db = null;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function Set_Log_Desarrollo(ENLogDev $p_LogDes,int $p_Id_Tienda,int $p_Id_Usuario):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_ResultDt = null;
        $l_query = null;
        $l_StoreProcedure = "";
        $l_ListParametros = [];
        $l_ObjetoQuery = [];

        $l_StoreProcedure = "sp_cixmart_set_log_desarrollo";


        array_push($l_ListParametros,["p_Id_Logd",$p_LogDes->Id_LogDev]);
        array_push($l_ListParametros,["p_Id_Tie",$p_Id_Tienda]);
        array_push($l_ListParametros,["p_Des_Logd_Ori",$p_LogDes->Des_Origen]);
        array_push($l_ListParametros,["p_Des_Logd_Sis",$p_LogDes->Des_Sistema]);
        array_push($l_ListParametros,["p_Des_Logd_Obje",$p_LogDes->Des_Obj_Entrada]);
        array_push($l_ListParametros,["p_Des_Logd_Objs",$p_LogDes->Des_Obj_Salida]);
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

}