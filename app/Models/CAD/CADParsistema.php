<?php namespace App\Models\CAD;

use CodeIgniter\Model;

use App\Models\CEN\CENMenu as ENMenu;
use App\Models\CEN\CENConfigsistema as ENConfigsistema;
use App\Models\CEN\CENDesconfigsistema as ENDesconfigsistema;
use App\Models\CEN\CENParsistema as ENParsistema;
use App\Models\CEN\CENResultBusqueda as ENResultBusqueda;

class CADParsistema extends Model
{
    public $db = null;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function Get_Config_Parametros_Sistema(ENConfigsistema $request,bool $Flg_TraerDescripcion=false)
    {
        $l_ResultBusqueda = new ENResultBusqueda();
        $l_ResultDt = null;
        $l_query = null;
        $l_StoreProcedure = "";
        $l_ListParametros = [];
        $l_ObjetoQuery = [];
        $l_Configsistema = null;
        $l_List_Object = array();

        $l_StoreProcedure = "sp_cixmart_get_configsistema";
        array_push($l_ListParametros,["p_Id_Sis",$request->Id_ConfigSis]);
        array_push($l_ListParametros,["p_Des_Sis_Nom",$request->Des_ConfigSis_Nom]);
        array_push($l_ListParametros,["p_Num_RegIni",$request->Num_RegistroIni]);
        array_push($l_ListParametros,["p_Num_Interv",$request->Num_Intervalo]);

        $l_ObjetoQuery = CrearEstructuraSP($l_StoreProcedure,$l_ListParametros);

        $l_query = $this->db->query($l_ObjetoQuery["store"],$l_ObjetoQuery["parametros"]);

        if($l_query)
        {
            $l_ResultDt =  $l_query->getResultArray();

            if($l_ResultDt!=null && count($l_ResultDt)>0)
            {
                if( (int)$l_ResultDt[0]["Code"] == 1 && (int)$l_ResultDt[0]["Num_TotalBus"]>0 )
                {
                    $l_ResultBusqueda->Num_TotalReg = (int)$l_ResultDt[0]["Num_TotalReg"];
                    $l_ResultBusqueda->Num_TotalBus = (int)$l_ResultDt[0]["Num_TotalBus"];
                    $l_ResultBusqueda->Get_Info_Paginador($request->Num_Intervalo,$request->Num_Pagina);

                    foreach($l_ResultDt as $item)
                    {
                        $l_Configsistema = new ENConfigsistema;
                        $l_Configsistema->Id_ConfigSis = (int)$item["Id_Cfsis"];
                        $l_Configsistema->Cod_ConfigSis = (int)$item["Cod_Cfsis"];
                        $l_Configsistema->Des_ConfigSis_Nom = (string)$item["Des_Cfsis_Nom"];
                        $l_Configsistema->Des_ConfigSis_Abr = (string)$item["Des_Cfsis_Abr"];
                        $l_Configsistema->Des_ConfigSis_Key = (string)$item["Des_Cfsis_Key"];
                        $l_Configsistema->Flg_Estado = (bool)$item["Flg_Estado"];
                        if($Flg_TraerDescripcion)
                        {
                            $l_Configsistema->Desconfigsistema = $this->Get_Descripcion_Parametros_Sistema($l_Configsistema->Cod_ConfigSis);
                        }
                        else
                        {
                            $l_Configsistema->Desconfigsistema = null;
                        }                           
                        array_push($l_List_Object,$l_Configsistema);
                    }

                    $l_ResultBusqueda->List_Resultado = $l_List_Object;
                }
            }
        }
        else
        {
            return $l_ResultBusqueda;
        }        

        return $l_ResultBusqueda;
    }

    public function Set_Config_Parametros_Sistema(ENConfigsistema $request)
    {
        $l_ResultDt = null;
        $l_query = null;
        $l_StoreProcedure = "";
        $l_ListParametros = [];
        $l_ObjetoQuery = [];

        $l_StoreProcedure = "sp_cixmart_set_configsistema";
        array_push($l_ListParametros,["p_Tip_Acc",$request->Tip_Accion]);
        array_push($l_ListParametros,["p_Id_Cfsis",$request->Id_ConfigSis]);
        array_push($l_ListParametros,["p_Des_Cfsis_Nom",trim($request->Des_ConfigSis_Nom)]);
        array_push($l_ListParametros,["p_Des_Cfsis_Abr",trim($request->Des_ConfigSis_Abr)]);
        array_push($l_ListParametros,["p_Des_Cfsis_Key",trim($request->Des_ConfigSis_Key)]);
        array_push($l_ListParametros,["p_Des_Depsis_Nom",trim($request->Desconfigsistema->Des_DesParam_Nom)]);
        array_push($l_ListParametros,["p_Des_Depsis_Abr",trim($request->Desconfigsistema->Des_DesParam_Abr)]);
        array_push($l_ListParametros,["p_Des_Depsis_Tx1",trim($request->Desconfigsistema->Des_DesParam_Tx1)]);
        array_push($l_ListParametros,["p_Des_Depsis_Tx2",trim($request->Desconfigsistema->Des_DesParam_Tx2)]);
        array_push($l_ListParametros,["p_Des_Depsis_Tx3",trim($request->Desconfigsistema->Des_DesParam_Tx3)]);
        array_push($l_ListParametros,["p_Des_Depsis_Ch1",trim($request->Desconfigsistema->Des_DesParam_Ch1)]);
        array_push($l_ListParametros,["p_Des_Depsis_In1",trim($request->Desconfigsistema->Des_DesParam_In1)]);
        array_push($l_ListParametros,["p_Des_Depsis_In2",trim($request->Desconfigsistema->Des_DesParam_In2)]);
        array_push($l_ListParametros,["p_Des_Depsis_In3",trim($request->Desconfigsistema->Des_DesParam_In3)]);
        array_push($l_ListParametros,["p_Des_Depsis_Sm1",trim($request->Desconfigsistema->Des_DesParam_Sm1)]);
        array_push($l_ListParametros,["p_Des_Depsis_Sm2",trim($request->Desconfigsistema->Des_DesParam_Sm2)]);
        array_push($l_ListParametros,["p_Des_Depsis_Sm3",trim($request->Desconfigsistema->Des_DesParam_Sm3)]);
        array_push($l_ListParametros,["p_Des_Depsis_Dc1",trim($request->Desconfigsistema->Des_DesParam_Dc1)]);
        array_push($l_ListParametros,["p_Des_Depsis_Dc2",trim($request->Desconfigsistema->Des_DesParam_Dc2)]);
        array_push($l_ListParametros,["p_Des_Depsis_Dc3",trim($request->Desconfigsistema->Des_DesParam_Dc3)]);
        array_push($l_ListParametros,["p_Des_Depsis_Bo1",trim($request->Desconfigsistema->Des_DesParam_Bo1)]);
        array_push($l_ListParametros,["p_Des_Depsis_Bo2",trim($request->Desconfigsistema->Des_DesParam_Bo2)]);
        array_push($l_ListParametros,["p_Des_Depsis_Bo3",trim($request->Desconfigsistema->Des_DesParam_Bo3)]);        
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

    public function Get_Descripcion_Parametros_Sistema(int $p_Cod_Sis)
    {
        $l_ResultDt = null;
        $l_query = null;
        $l_StoreProcedure = "";
        $l_ListParametros = [];
        $l_ObjetoQuery = [];
        $l_Desconfigsistema = new ENDesconfigsistema;

        $l_StoreProcedure = "sp_cixmart_get_desparsistema";
        array_push($l_ListParametros,["p_Cod_Sis",$p_Cod_Sis]);

        $l_ObjetoQuery = CrearEstructuraSP($l_StoreProcedure,$l_ListParametros);

        $l_query = $this->db->query($l_ObjetoQuery["store"],$l_ObjetoQuery["parametros"]);

        if($l_query)
        {
            $l_ResultDt =  $l_query->getResultArray();

            if($l_ResultDt!=null && count($l_ResultDt)>0)
            {
                if( (int)$l_ResultDt[0]["Code"] == 1 )
                {
                    $l_Desconfigsistema->Des_DesParam_Nom = trim($l_ResultDt[0]["Des_Cfdepsis_Nom"]);
                    $l_Desconfigsistema->Des_DesParam_Abr = trim($l_ResultDt[0]["Des_Cfdepsis_Abr"]);
                    $l_Desconfigsistema->Des_DesParam_Tx1 = trim($l_ResultDt[0]["Des_Cfdepsis_Tx1"]);
                    $l_Desconfigsistema->Des_DesParam_Tx2 = trim($l_ResultDt[0]["Des_Cfdepsis_Tx2"]);
                    $l_Desconfigsistema->Des_DesParam_Tx3 = trim($l_ResultDt[0]["Des_Cfdepsis_Tx3"]);
                    $l_Desconfigsistema->Des_DesParam_Tx4 = trim($l_ResultDt[0]["Des_Cfdepsis_Tx4"]);
                    $l_Desconfigsistema->Des_DesParam_Tx5 = trim($l_ResultDt[0]["Des_Cfdepsis_Tx5"]);
                    $l_Desconfigsistema->Des_DesParam_Tx6 = trim($l_ResultDt[0]["Des_Cfdepsis_Tx6"]);
                    $l_Desconfigsistema->Des_DesParam_Ch1 = trim($l_ResultDt[0]["Des_Cfdepsis_Ch1"]);
                    $l_Desconfigsistema->Des_DesParam_In1 = trim($l_ResultDt[0]["Des_Cfdepsis_In1"]);
                    $l_Desconfigsistema->Des_DesParam_In2 = trim($l_ResultDt[0]["Des_Cfdepsis_In2"]);
                    $l_Desconfigsistema->Des_DesParam_In3 = trim($l_ResultDt[0]["Des_Cfdepsis_In3"]);
                    $l_Desconfigsistema->Des_DesParam_Sm1 = trim($l_ResultDt[0]["Des_Cfdepsis_Sm1"]);
                    $l_Desconfigsistema->Des_DesParam_Sm2 = trim($l_ResultDt[0]["Des_Cfdepsis_Sm2"]);
                    $l_Desconfigsistema->Des_DesParam_Sm3 = trim($l_ResultDt[0]["Des_Cfdepsis_Sm3"]);
                    $l_Desconfigsistema->Des_DesParam_Dc1 = trim($l_ResultDt[0]["Des_Cfdepsis_Dc1"]);
                    $l_Desconfigsistema->Des_DesParam_Dc2 = trim($l_ResultDt[0]["Des_Cfdepsis_Dc2"]);
                    $l_Desconfigsistema->Des_DesParam_Dc3 = trim($l_ResultDt[0]["Des_Cfdepsis_Dc3"]);
                    $l_Desconfigsistema->Des_DesParam_Bo1 = trim($l_ResultDt[0]["Des_Cfdepsis_Bo1"]);
                    $l_Desconfigsistema->Des_DesParam_Bo2 = trim($l_ResultDt[0]["Des_Cfdepsis_Bo2"]);
                    $l_Desconfigsistema->Des_DesParam_Bo3 = trim($l_ResultDt[0]["Des_Cfdepsis_Bo3"]);

                }
            }
        }
        else
        {
            return $l_Desconfigsistema;
        }        

        return $l_Desconfigsistema;
    }

    public function Get_Parametros_Sistema(int $p_Cod_Sistema,int $p_Cod_ParaSistem)
    {
        $l_ResultDt = null;
        $l_query = null;
        $l_StoreProcedure = "";
        $l_ListParametros = [];
        $l_ObjetoQuery = [];
        $l_Parsistema = null;
        $l_List_Object = array();

        $l_StoreProcedure = "sp_cixmart_get_configparsistema";
        array_push($l_ListParametros,["p_Cod_Sis",$p_Cod_Sistema]);
        array_push($l_ListParametros,["p_Cod_Psis",$p_Cod_ParaSistem]);

        $l_ObjetoQuery = CrearEstructuraSP($l_StoreProcedure,$l_ListParametros);

        $l_query = $this->db->query($l_ObjetoQuery["store"],$l_ObjetoQuery["parametros"]);

        if($l_query)
        {
            $l_ResultDt =  $l_query->getResultArray();

            if($l_ResultDt!=null && count($l_ResultDt)>0)
            {
                foreach($l_ResultDt as $item)
                {
                    $l_Parsistema = new ENParsistema;

                    if(array_key_exists("Id_Cfpsis",$item)) $l_Parsistema->Id_ParSis = (int)$item["Id_Cfpsis"];
                    if(array_key_exists("Cod_Cfsis_FK",$item)) $l_Parsistema->Cod_ConfSis = (int)$item["Cod_Cfsis_FK"];
                    if(array_key_exists("Cod_Cfpsis",$item)) $l_Parsistema->Cod_ParSis = (int)$item["Cod_Cfpsis"];
                    if(array_key_exists("Des_Cfpsis_Nom",$item)) $l_Parsistema->Des_ParSis_Nom = (string)$item["Des_Cfpsis_Nom"];
                    if(array_key_exists("Des_Cfpsis_Abr",$item)) $l_Parsistema->Des_ParSis_Abr = (string)$item["Des_Cfpsis_Abr"];
                    if(array_key_exists("Des_Cfpsis_Tx1",$item)) $l_Parsistema->Des_ParSis_Tx1 = (string)$item["Des_Cfpsis_Tx1"];
                    if(array_key_exists("Des_Cfpsis_Tx2",$item)) $l_Parsistema->Des_ParSis_Tx2 = (string)$item["Des_Cfpsis_Tx2"];
                    if(array_key_exists("Des_Cfpsis_Tx3",$item)) $l_Parsistema->Des_ParSis_Tx3 = (string)$item["Des_Cfpsis_Tx3"];
                    if(array_key_exists("Des_Cfpsis_Tx4",$item)) $l_Parsistema->Des_ParSis_Tx4 = (string)$item["Des_Cfpsis_Tx4"];
                    if(array_key_exists("Des_Cfpsis_Tx5",$item)) $l_Parsistema->Des_ParSis_Tx5 = (string)$item["Des_Cfpsis_Tx5"];
                    if(array_key_exists("Des_Cfpsis_Tx6",$item)) $l_Parsistema->Des_ParSis_Tx6 = (string)$item["Des_Cfpsis_Tx6"];
                    if(array_key_exists("Des_Cfpsis_Ch1",$item)) $l_Parsistema->Des_ParSis_Ch1 = (string)$item["Des_Cfpsis_Ch1"];
                    if(array_key_exists("Num_Cfpsis_In1",$item)) $l_Parsistema->Num_ParSis_In1 = (int)$item["Num_Cfpsis_In1"];
                    if(array_key_exists("Num_Cfpsis_In2",$item)) $l_Parsistema->Num_ParSis_In2 = (int)$item["Num_Cfpsis_In2"];
                    if(array_key_exists("Num_Cfpsis_In3",$item)) $l_Parsistema->Num_ParSis_In3 = (int)$item["Num_Cfpsis_In3"];
                    if(array_key_exists("Num_Cfpsis_Sm1",$item)) $l_Parsistema->Num_ParSis_Sm1 = (int)$item["Num_Cfpsis_Sm1"];
                    if(array_key_exists("Num_Cfpsis_Sm2",$item)) $l_Parsistema->Num_ParSis_Sm2 = (int)$item["Num_Cfpsis_Sm2"];
                    if(array_key_exists("Num_Cfpsis_Sm3",$item)) $l_Parsistema->Num_ParSis_Sm3 = (int)$item["Num_Cfpsis_Sm3"];
                    if(array_key_exists("Num_Cfpsis_Dc1",$item)) $l_Parsistema->Num_ParSis_Dc1 = (double)$item["Num_Cfpsis_Dc1"];
                    if(array_key_exists("Num_Cfpsis_Dc2",$item)) $l_Parsistema->Num_ParSis_Dc2 = (double)$item["Num_Cfpsis_Dc2"];
                    if(array_key_exists("Num_Cfpsis_Dc3",$item)) $l_Parsistema->Num_ParSis_Dc3 = (double)$item["Num_Cfpsis_Dc3"];
                    if(array_key_exists("Flg_Cfpsis_Bo1",$item)) $l_Parsistema->Flg_ParSis_Bo1 = (bool)$item["Flg_Cfpsis_Bo1"];
                    if(array_key_exists("Flg_Cfpsis_Bo2",$item)) $l_Parsistema->Flg_ParSis_Bo2 = (bool)$item["Flg_Cfpsis_Bo2"];
                    if(array_key_exists("Flg_Cfpsis_Bo3",$item)) $l_Parsistema->Flg_ParSis_Bo3 = (bool)$item["Flg_Cfpsis_Bo3"];                        
                        
                    array_push($l_List_Object,$l_Parsistema);
                }
                
            }
        }
        else
        {
            return $l_List_Object;
        }        

        return $l_List_Object;

    }

    public function Set_Parametros_Sistema(ENParsistema $request)
    {
        $l_ResultDt = null;
        $l_query = null;
        $l_StoreProcedure = "";
        $l_ListParametros = [];
        $l_ObjetoQuery = [];

        $l_StoreProcedure = "sp_cixmart_set_configparsistema";
        array_push($l_ListParametros,["p_Tip_Acc",$request->Tip_Accion]);
        array_push($l_ListParametros,["p_Id_Psis",$request->Id_ParSis]);
        array_push($l_ListParametros,["p_Cod_Sis",$request->Cod_ConfSis]);
        array_push($l_ListParametros,["p_Cod_Psis",$request->Cod_ParSis]);
        array_push($l_ListParametros,["p_Des_Psis_Nom",$request->Des_ParSis_Nom]);
        array_push($l_ListParametros,["p_Des_Psis_Abr",$request->Des_ParSis_Abr]);
        array_push($l_ListParametros,["p_Des_Psis_Tx1",$request->Des_ParSis_Tx1]);
        array_push($l_ListParametros,["p_Des_Psis_Tx2",$request->Des_ParSis_Tx2]);
        array_push($l_ListParametros,["p_Des_Psis_Tx3",$request->Des_ParSis_Tx3]);
        array_push($l_ListParametros,["p_Des_Psis_Ch1",$request->Des_ParSis_Ch1]);
        array_push($l_ListParametros,["p_Num_Psis_In1",$request->Num_ParSis_In1]);
        array_push($l_ListParametros,["p_Num_Psis_In2",$request->Num_ParSis_In2]);
        array_push($l_ListParametros,["p_Num_Psis_In3",$request->Num_ParSis_In3]);
        array_push($l_ListParametros,["p_Num_Psis_Sm1",$request->Num_ParSis_Sm1]);
        array_push($l_ListParametros,["p_Num_Psis_Sm2",$request->Num_ParSis_Sm2]);
        array_push($l_ListParametros,["p_Num_Psis_Sm3",$request->Num_ParSis_Sm3]);
        array_push($l_ListParametros,["p_Num_Psis_Dc1",$request->Num_ParSis_Dc1]);
        array_push($l_ListParametros,["p_Num_Psis_Dc2",$request->Num_ParSis_Dc2]);
        array_push($l_ListParametros,["p_Num_Psis_Dc3",$request->Num_ParSis_Dc3]);
        array_push($l_ListParametros,["p_Flg_Psis_Bo1",$request->Flg_ParSis_Bo1]);
        array_push($l_ListParametros,["p_Flg_Psis_Bo2",$request->Flg_ParSis_Bo2]);
        array_push($l_ListParametros,["p_Flg_Psis_Bo3",$request->Flg_ParSis_Bo3]);
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

    public function Update_Tbl_Generico(int $p_Tip_Accion,int $p_Cod_ParSis,int $p_Id_Prikey,int $p_Id_Usuamodi)
    {
        $l_ResultDt = null;
        $l_query = null;
        $l_StoreProcedure = "";
        $l_ListParametros = [];
        $l_ObjetoQuery = [];

        $l_StoreProcedure = "sp_cixmart_update_tblgenerico";
        array_push($l_ListParametros,["p_Tip_Acc",$p_Tip_Accion]);
        array_push($l_ListParametros,["p_Cod_Psis",$p_Cod_ParSis]);
        array_push($l_ListParametros,["p_Id_Prikey",$p_Id_Prikey]);
        array_push($l_ListParametros,["p_Id_Usuamodi",$p_Id_Usuamodi]);       

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

}

?>    