<?php namespace App\Models\CAD;

use CodeIgniter\Model;
use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENTalonario as ENTalonario;

class CADTalonario extends Model
{
    public $db = null;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function Get_List_Talonario()
    {

    }

    public function Get_Detalle_Talonario()
    {

    }

    public function Set_Talonario(ENTalonario $p_Talonario,int $p_Id_Usuario):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_ResultDt = null;
        $l_query = null;
        $l_StoreProcedure = "";
        $l_ListParametros = [];
        $l_ObjetoQuery = [];

        $l_StoreProcedure = "sp_cixmart_set_talonario";

        array_push($l_ListParametros,["p_Id_Tal",$p_Talonario->Id_Talonario]);
        array_push($l_ListParametros,["p_Id_Tie",$p_Talonario->Id_Tienda]);
        array_push($l_ListParametros,["p_Id_Caj",$p_Talonario->Id_Caja]);
        array_push($l_ListParametros,["p_Tip_Tal_Doc",$p_Talonario->Tip_Documento]);
        array_push($l_ListParametros,["p_Des_Tal_Dnm",$p_Talonario->Des_Documento]);
        array_push($l_ListParametros,["p_Cod_Tal_Ser",$p_Talonario->Cod_Serie]);
        array_push($l_ListParametros,["p_Num_Tal_Ult",$p_Talonario->Num_UltimoCorr]);
        array_push($l_ListParametros,["p_Num_Tal_Lim",$p_Talonario->Num_Limite]);
        array_push($l_ListParametros,["p_Tip_Tal_Tal",$p_Talonario->Tip_Asignacion]);
        array_push($l_ListParametros,["p_Id_Usu_Caj",$p_Talonario->Id_UsuarioTal]);
        array_push($l_ListParametros,["p_Id_Usuamodi",$p_Id_Usuario]);
      

        $l_ObjetoQuery = CrearEstructuraSP($l_StoreProcedure,$l_ListParametros);

        $l_query = $this->db->query($l_ObjetoQuery["store"],$l_ObjetoQuery["parametros"]);

        if($l_query)
        {
            $l_ResultDt =  $l_query->getResultArray();
            
            if( $l_ResultDt!=null && count($l_ResultDt)>0 && (int)$l_ResultDt[0]["Code"] == 1)
            {
                $l_Rpt->Resultado = [
                    "Id_Talonario"=> (int)$l_ResultDt[0]["Id"] 
                ];

            }else
            {
                $l_Rpt->Error->flagerror = true;
                $l_Rpt->Error->messages = "{".$l_ResultDt[0]["Code"]."} ".$l_ResultDt[0]["Message"];
                $l_Rpt->Error->error = $l_ResultDt[0]["Code"];
            }
        }

        return $l_Rpt;
    }

}