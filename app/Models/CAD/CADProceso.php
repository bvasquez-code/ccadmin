<?php namespace App\Models\CAD;

use CodeIgniter\Model;
use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENAutenticacionService as ENAutenticacionService;
use App\Models\CEN\CENPromocion as ENPromocion;
use App\Models\CEN\CENProcesoSistema as ENProcesoSistema;
use DateTime;

class CADProceso extends Model
{
    public $db = null;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function Delete_Limpiar_Sesiones(int $p_Id_Tienda,int $p_Id_Usuario,string $p_Fec_Servidor):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_ResultDt = null;
        $l_query = null;
        $l_StoreProcedure = "";
        $l_ListParametros = [];
        $l_ObjetoQuery = [];

        $l_StoreProcedure = "sp_cixmart_set_historico_sesion";

        array_push($l_ListParametros,["p_Id_Tie",$p_Id_Tienda]);
        array_push($l_ListParametros,["p_Id_Usuamodi",$p_Id_Usuario]);
        array_push($l_ListParametros,["p_Fec_Sistema",$p_Fec_Servidor]);        

        $l_ObjetoQuery = CrearEstructuraSP($l_StoreProcedure,$l_ListParametros);

        $l_query = $this->db->query($l_ObjetoQuery["store"],$l_ObjetoQuery["parametros"]);

        if($l_query)
        {
            $l_ResultDt =  $l_query->getResultArray();
            
            if( $l_ResultDt!=null && count($l_ResultDt)>0 && (int)$l_ResultDt[0]["Code"] == 1)
            {
                $l_Rpt->Resultado = [
                    "Num_Fil_Eliminadas"=> (int)$l_ResultDt[0]["Num_Fil_Pro"] 
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

    public function Update_Estado_Promo_General(int $p_Id_Empresa)
    {
        $l_Rpt = new ENResponse();
        $l_ResultDt = null;
        $l_query = null;
        $l_StoreProcedure = "";
        $l_ListParametros = [];
        $l_ObjetoQuery = [];
        $l_List_Promocion = [];
        $l_Promocion = null;

        $l_StoreProcedure = "sp_ccadmin_update_estado_promo_general";

        array_push($l_ListParametros,["p_Id_Emp",$p_Id_Empresa]);


        $l_ObjetoQuery = CrearEstructuraSP($l_StoreProcedure,$l_ListParametros);

        $l_query = $this->db->query($l_ObjetoQuery["store"],$l_ObjetoQuery["parametros"]);

        if($l_query)
        {
            $l_ResultDt =  $l_query->getResultArray();

            if($l_ResultDt)
            {
                if ( (int)$l_ResultDt[0]["Code"] == 1 )
                {
                    if(  (int)$l_ResultDt[0]["Num_Filas_Update"] > 0 )
                    {  
                        foreach( $l_ResultDt as $Item)
                        {
                            $l_Promocion = new ENPromocion();

                            $l_Promocion->Cod_Promocion = $Item["Cod_Cfprom"];
                            $l_Promocion->Des_Promocion = $Item["Des_Cfprom_Nom"];
                            $l_Promocion->Fec_Inicio = $Item["Fec_Cfprom_Ini"];
                            $l_Promocion->Fec_Fin = $Item["Fec_Cfprom_Fin"];

                            array_push($l_List_Promocion,$l_Promocion);
                        }
                        $l_Rpt->Resultado = [ 
                            "Flg_Alerta" => true,
                            "List_Promocion" =>$l_List_Promocion
                        ];
                    }
                    else
                    {
                        $l_Rpt->Resultado = [ 
                            "Flg_Alerta" => false,
                            "List_Promocion" =>null
                        ]; 
                    }
                }
                else
                {
                    $l_Rpt->flagerror = true;
                    $l_Rpt->messages = "{".$l_ResultDt[0]["Code"]. "} - " .(string)$l_ResultDt[0]["Message"];                    
                }
            }
        }

        return $l_Rpt;
    }

    public function Get_Credenciales_Tienda_Proceso(ENAutenticacionService $p_Obj_Aut):ENAutenticacionService
    {
        $l_ResultDt = null;
        $l_query = null;
        $l_Sql = "";
        $l_ListParametros = [];
        $l_ObjetoQuery = [];

        $l_Sql = "  SELECT
                        Des_Datie_Usr,
                        Cod_Datie_Hsh
                    FROM
                        DA_TIENDA
                     WHERE
                        Id_Datie = ? 
                        AND Id_Daemp_FK = ? 
                        AND Flg_Estado = ? 
                        AND Flg_Marcabaja = ? ";

        array_push($l_ListParametros,["Id_Datie_FK",$p_Obj_Aut->Id_Tienda]);
        array_push($l_ListParametros,["Id_Daemp_FK",$p_Obj_Aut->Id_Empresa]);
        array_push($l_ListParametros,["Flg_Estado",true]);
        array_push($l_ListParametros,["Flg_Marcabaja",true]);


        $l_ObjetoQuery = CrearEstructuraQuery($l_Sql,$l_ListParametros);
        $l_query = $this->db->query($l_ObjetoQuery["query"],$l_ObjetoQuery["parametros"]);

        if($l_query)
        {
            $l_ResultDt =  $l_query->getResultArray();
            if($l_ResultDt)
            {
                $p_Obj_Aut->User = (string)$l_ResultDt[0]["Des_Datie_Usr"];
                $p_Obj_Aut->Password = (string)$l_ResultDt[0]["Cod_Datie_Hsh"];
            }
        }

        return $p_Obj_Aut;       
    }

    public function Get_List_Procesos(int $p_Id_Empresa):array
    {
        $l_List_Proceso = [];
        $l_ProcesoSistema = new ENProcesoSistema();
        $l_ResultDt = null;
        $l_query = null;
        $l_Sql = "";
        $l_ListParametros = [];
        $l_ObjetoQuery = [];

        $l_Sql = "  SELECT
                        Id_Cfpros,
                        Des_Cfpros_Nom
                    FROM
                        CF_PROCESOSIS
                    WHERE
                        Id_Daemp_FK = ? 
                        AND Flg_Estado = ? 
                        AND Flg_Marcabaja = ? ";

        array_push($l_ListParametros,["Id_Daemp_FK",$p_Id_Empresa]);
        array_push($l_ListParametros,["Flg_Estado",true]);
        array_push($l_ListParametros,["Flg_Marcabaja",true]);

        $l_ObjetoQuery = CrearEstructuraQuery($l_Sql,$l_ListParametros);
        $l_query = $this->db->query($l_ObjetoQuery["query"],$l_ObjetoQuery["parametros"]);

        if($l_query)
        {
            $l_ResultDt =  $l_query->getResultArray();
            if($l_ResultDt)
            {
                foreach( $l_ResultDt as $Item )
                {
                    $l_ProcesoSistema = new ENProcesoSistema();

                    $l_ProcesoSistema->Id_Proceso = (int)$Item["Id_Cfpros"];
                    $l_ProcesoSistema->Des_Proceso = (string)$Item["Des_Cfpros_Nom"];

                    array_push($l_List_Proceso,$l_ProcesoSistema);
                }
            }
        }

        return $l_List_Proceso;
    }

    public function Get_Detalle_Proceso(int $p_Id_Proceso,int $p_Id_Empresa):ENProcesoSistema
    {
        
        $l_ProcesoSistema = new ENProcesoSistema();
        $l_ResultDt = null;
        $l_query = null;
        $l_Sql = "";
        $l_ListParametros = [];
        $l_ObjetoQuery = [];

        $l_Sql = "  SELECT
                        Des_Cfpros_Url
                    FROM
                        CF_PROCESOSIS
                    WHERE
                        Id_Cfpros = ? 
                        AND Id_Daemp_FK = ?
                        AND Flg_Estado = ? 
                        AND Flg_Marcabaja = ? ";

        array_push($l_ListParametros,["Id_Cfpros",$p_Id_Proceso]);
        array_push($l_ListParametros,["Id_Daemp_FK",$p_Id_Empresa]);
        array_push($l_ListParametros,["Flg_Estado",true]);
        array_push($l_ListParametros,["Flg_Marcabaja",true]);

        $l_ObjetoQuery = CrearEstructuraQuery($l_Sql,$l_ListParametros);
        $l_query = $this->db->query($l_ObjetoQuery["query"],$l_ObjetoQuery["parametros"]);

        if($l_query)
        {
            $l_ResultDt =  $l_query->getResultArray();
            if($l_ResultDt)
            {
                $l_ProcesoSistema->Des_Url = $l_ResultDt[0]["Des_Cfpros_Url"];
            }
        }

        return $l_ProcesoSistema;
    }
}