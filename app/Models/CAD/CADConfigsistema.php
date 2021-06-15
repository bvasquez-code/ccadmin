<?php namespace App\Models\CAD;

use CodeIgniter\Model;

use App\Models\CEN\CENMenu as ENMenu;
use App\Models\CEN\CENParsistema as ENParsistema;

class CADConfigsistema extends Model
{
    public $db = null;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function Get_Parametros_Sistema(int $p_Cod_Sis,int $p_Cod_Psis=0)
    {
        $l_ResultDt = null;
        $l_query = null;
        $l_StoreProcedure = "";
        $l_ListParametros = [];
        $l_ObjetoQuery = [];

        $l_StoreProcedure = "sp_cixmart_get_parsistema";
        array_push($l_ListParametros,["p_Cod_Sis",$p_Cod_Sis]);
        array_push($l_ListParametros,["p_Cod_Psis",$p_Cod_Psis]);
        $l_ObjetoQuery = CrearEstructuraSP($l_StoreProcedure,$l_ListParametros);

        $l_query = $this->db->query($l_ObjetoQuery["store"],$l_ObjetoQuery["parametros"]);
        $l_ResultDt =  $l_query->getResultArray(); 

        return $l_ResultDt;
    }

    public function Get_Parametros_Sistema_array(int $p_Cod_Sis,int $p_Cod_Psis=0,string $p_QueryEspecifico="",array $p_List_Condiciones=null)
    {
        $l_ResultDt = null;
        $l_StringQuery = "";
        $l_StringSelect = "";
        $l_query = null;
        $l_ListParametros = [];
        $l_ObjetoQuery = [];

        $l_StringSelect = $p_QueryEspecifico;

        if ( trim($l_StringSelect) == "" ) $l_StringSelect = " * ";

        $l_StringQuery = " SELECT ".$l_StringSelect." FROM CF_PARSISTEMA ";
        $l_StringQuery = $l_StringQuery." WHERE Flg_Estado = ? AND Flg_Marcabaja = ? ";
        $l_StringQuery = $l_StringQuery." AND Cod_Cfsis_FK = ? ";
        if($p_Cod_Psis != 0) $l_StringQuery = $l_StringQuery." AND Cod_Cfpsis = ? ";

        if($p_List_Condiciones!=null && count($p_List_Condiciones)>0)
        {
            foreach($p_List_Condiciones as $Item)
            {
                if ( $Item->Ope == "" || $Item->Ope == null ) $Item->Ope = "equal";

                if( $Item->Ope == "equal" )
                {
                    $l_StringQuery = $l_StringQuery." AND " . $Item->key ." = ? ";
                }
                else if( $Item->Ope == "different" )
                {
                    if( $Item->Val !== null )
                    {
                        $l_StringQuery = $l_StringQuery." AND " . $Item->key ." <> ? ";
                    }
                    else
                    {
                        $l_StringQuery = $l_StringQuery." AND " . $Item->key ." IS NOT ? ";
                    }   
                }else
                {
                    $l_StringQuery = $l_StringQuery." AND " . $Item->key ." = ? ";
                }
                
            }
        }

        array_push($l_ListParametros,["Flg_Estado",true]);
        array_push($l_ListParametros,["Flg_Marcabaja",true]);
        array_push($l_ListParametros,["Cod_Cfsis_FK",$p_Cod_Sis]);
        if($p_Cod_Psis != 0) array_push($l_ListParametros,["Cod_Cfpsis",$p_Cod_Psis]);

        if($p_List_Condiciones!=null && count($p_List_Condiciones)>0)
        {
            foreach($p_List_Condiciones as $Item)
            {
                array_push($l_ListParametros,[$Item->Key,$Item->Val]);
            }
        }

        $l_ObjetoQuery = CrearEstructuraQuery($l_StringQuery,$l_ListParametros);

        $l_query = $this->db->query($l_ObjetoQuery["query"],$l_ObjetoQuery["parametros"]);
        $l_ResultDt =  $l_query->getResultArray(); 

        return $l_ResultDt;
    }

    public function Get_Parametros_Sistema_string(int $p_Cod_Sis,int $p_Cod_Psis=0,int $p_Opcion,array $p_List_Condiciones=null)
    {
        $l_ResultDt = [];
        $l_Respuesta = "";
        $l_StringSelect = "";

        if($p_Opcion == 4) $l_StringSelect = "Des_Cfpsis_Nom";
        if($p_Opcion == 5) $l_StringSelect = "Des_Cfpsis_Abr";
        if($p_Opcion == 6) $l_StringSelect = "Des_Cfpsis_Tx1";
        if($p_Opcion == 7) $l_StringSelect = "Des_Cfpsis_Tx2";
        if($p_Opcion == 8) $l_StringSelect = "Des_Cfpsis_Tx3";        
        if($p_Opcion == 9) $l_StringSelect = "Des_Cfpsis_Ch1";
        if($p_Opcion == 10) $l_StringSelect = "Num_Cfpsis_In1";
        if($p_Opcion == 11) $l_StringSelect = "Num_Cfpsis_In2";
        if($p_Opcion == 12) $l_StringSelect = "Num_Cfpsis_In3";
        if($p_Opcion == 13) $l_StringSelect = "Num_Cfpsis_Sm1";
        if($p_Opcion == 14) $l_StringSelect = "Num_Cfpsis_Sm2";
        if($p_Opcion == 15) $l_StringSelect = "Num_Cfpsis_Sm3";
        if($p_Opcion == 16) $l_StringSelect = "Num_Cfpsis_Dc1";
        if($p_Opcion == 17) $l_StringSelect = "Num_Cfpsis_Dc2";
        if($p_Opcion == 18) $l_StringSelect = "Num_Cfpsis_Dc3";
        if($p_Opcion == 19) $l_StringSelect = "Flg_Cfpsis_Bo1";
        if($p_Opcion == 20) $l_StringSelect = "Flg_Cfpsis_Bo2";
        if($p_Opcion == 21) $l_StringSelect = "Flg_Cfpsis_Bo3";

        $l_ResultDt = $this->Get_Parametros_Sistema_array($p_Cod_Sis,$p_Cod_Psis,$l_StringSelect,$p_List_Condiciones);
        
        if($l_ResultDt!=null && count($l_ResultDt)>0)
        {
            $l_Respuesta = $l_ResultDt[0][$l_StringSelect];
        }

        return $l_Respuesta;
    }

    public function Get_Parametros_Sistema_object(int $p_Cod_Sis,int $p_Cod_Psis=0,string $p_StringSelect,array $p_List_Condiciones=null)
    {
        $ListParsistema = array();
        $Parsistema = null;
        $l_ResultDt = [];
        $l_Respuesta = "";       

        $l_ResultDt = $this->Get_Parametros_Sistema_array($p_Cod_Sis,$p_Cod_Psis,$p_StringSelect,$p_List_Condiciones);
        
        if($l_ResultDt!=null && count($l_ResultDt)>0)
        {
            foreach($l_ResultDt as $item)
            {
                $Parsistema = new ENParsistema;

                if(!empty($item["Id_Cfpsis"])) $Parsistema->Id_ParSis = (int)$item["Id_Cfpsis"];
                if(!empty($item["Cod_Cfsis_FK"])) $Parsistema->Cod_ConfSis = (int)$item["Cod_Cfsis_FK"];
                if(!empty($item["Cod_Cfpsis"])) $Parsistema->Cod_ParSis = (int)$item["Cod_Cfpsis"];
                if(!empty($item["Des_Cfpsis_Nom"])) $Parsistema->Des_ParSis_Nom = (string)$item["Des_Cfpsis_Nom"];
                if(!empty($item["Des_Cfpsis_Abr"])) $Parsistema->Des_ParSis_Abr = (string)$item["Des_Cfpsis_Abr"];
                if(!empty($item["Des_Cfpsis_Tx1"])) $Parsistema->Des_ParSis_Tx1 = (string)$item["Des_Cfpsis_Tx1"];
                if(!empty($item["Des_Cfpsis_Tx2"])) $Parsistema->Des_ParSis_Tx2 = (string)$item["Des_Cfpsis_Tx2"];
                if(!empty($item["Des_Cfpsis_Tx3"])) $Parsistema->Des_ParSis_Tx3 = (string)$item["Des_Cfpsis_Tx3"];
                if(!empty($item["Des_Cfpsis_Tx4"])) $Parsistema->Des_ParSis_Tx4 = (string)$item["Des_Cfpsis_Tx4"];
                if(!empty($item["Des_Cfpsis_Tx5"])) $Parsistema->Des_ParSis_Tx5 = (string)$item["Des_Cfpsis_Tx5"];
                if(!empty($item["Des_Cfpsis_Ch1"])) $Parsistema->Des_ParSis_Ch1 = (string)$item["Des_Cfpsis_Ch1"];
                if(!empty($item["Num_Cfpsis_In1"])) $Parsistema->Num_ParSis_In1 = (int)$item["Num_Cfpsis_In1"];
                if(!empty($item["Num_Cfpsis_In2"])) $Parsistema->Num_ParSis_In2 = (int)$item["Num_Cfpsis_In2"];
                if(!empty($item["Num_Cfpsis_In3"])) $Parsistema->Num_ParSis_In3 = (int)$item["Num_Cfpsis_In3"];
                if(!empty($item["Num_Cfpsis_Sm1"])) $Parsistema->Num_ParSis_Sm1 = (int)$item["Num_Cfpsis_Sm1"];
                if(!empty($item["Num_Cfpsis_Sm2"])) $Parsistema->Num_ParSis_Sm2 = (int)$item["Num_Cfpsis_Sm2"];
                if(!empty($item["Num_Cfpsis_Sm3"])) $Parsistema->Num_ParSis_Sm3 = (int)$item["Num_Cfpsis_Sm3"];
                if(!empty($item["Num_Cfpsis_Dc1"])) $Parsistema->Num_ParSis_Dc1 = (double)$item["Num_Cfpsis_Dc1"];
                if(!empty($item["Num_Cfpsis_Dc2"])) $Parsistema->Num_ParSis_Dc2 = (double)$item["Num_Cfpsis_Dc2"];
                if(!empty($item["Num_Cfpsis_Dc3"])) $Parsistema->Num_ParSis_Dc3 = (double)$item["Num_Cfpsis_Dc3"];
                if(!empty($item["Flg_Cfpsis_Bo1"])) $Parsistema->Flg_ParSis_Bo1 = (bool)$item["Flg_Cfpsis_Bo1"];
                if(!empty($item["Flg_Cfpsis_Bo2"])) $Parsistema->Flg_ParSis_Bo2 = (bool)$item["Flg_Cfpsis_Bo2"];
                if(!empty($item["Flg_Cfpsis_Bo3"])) $Parsistema->Flg_ParSis_Bo3 = (bool)$item["Flg_Cfpsis_Bo3"];

                array_push($ListParsistema,$Parsistema);

            }
        }

        return $ListParsistema;
    }

}

?>   