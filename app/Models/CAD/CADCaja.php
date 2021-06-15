<?php namespace App\Models\CAD;

use CodeIgniter\Model;
use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENCaja as ENCaja;
use App\Models\CEN\CENUsuarioSistema as ENUsuarioSistema;
use App\Models\CEN\CENResultBusqueda as ENResultBusqueda;

class CADCaja extends Model
{
    public $db = null;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }


    public function Get_List_Caja(int $p_Id_Empresa,int $p_Id_Tienda,string $p_Des_Busqueda,int $p_Num_RegistroIni,int $p_Num_Intervalo):ENResultBusqueda
    {
        $l_ResultDt = null;
        $l_query = null;
        $l_StoreProcedure = "";
        $l_ListParametros = [];
        $l_ObjetoQuery = [];
        $l_List_Caja = [];
        $l_Caja = null;
        $l_ResultBusqueda = new ENResultBusqueda();

        $l_StoreProcedure = "sp_cixmart_get_caja_usuario";

        array_push($l_ListParametros,["p_Id_Tie",$p_Id_Tienda]);
        array_push($l_ListParametros,["p_Id_Emp",$p_Id_Empresa]);     
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
                    $l_Caja = new ENCaja();

                    $l_Caja->Id_Caja = (int)$Item["Id_Dacaj"];
                    $l_Caja->Cod_Caja = (string)$Item["Cod_Dacaj"];
                    $l_Caja->Des_Caja = (string)$Item["Des_Dacaj_Nom"];
                    $l_Caja->Des_Usuario = (string)$Item["Des_Dausu_Urs"];
                    $l_Caja->Des_Tienda = (string)$Item["Des_Datie_Nom"];
                    $l_Caja->Flg_Estado = (bool)$Item["Flg_Estado"];
                    $l_Caja->Flg_UserCaja = (bool)$Item["Flg_Usr_Caj"];

                    array_push($l_List_Caja,$l_Caja);
                }

                $l_ResultBusqueda->List_Resultado = $l_List_Caja;
            }
        }

        return $l_ResultBusqueda;       
    }

    public function Get_List_Usuarios_Caja(int $p_Id_Caja,int $p_Id_Tienda,int $p_Id_Empresa):array
    {
        $l_ResultDt = null;
        $l_query = null;
        $l_String_Query = "";
        $l_ListParametros = [];
        $l_ObjetoQuery = [];
        $l_UsuarioSistema = null;
        $l_List_Usuario = [];
        $l_Key_Cajaro = "CAJ";

        $l_String_Query .= " SELECT 
                                 DA_USUARIO.Id_Dausu, 
                                 DA_USUARIO.Des_Dausu_Urs, 
                                 CD_CAJAUSU.Id_Cdcajprf 
                             FROM 
                                 DA_USUARIO 
                             LEFT JOIN CD_CAJAUSU ON DA_USUARIO.Id_Dausu = CD_CAJAUSU.Id_Dausu_FK  
                                 AND CD_CAJAUSU.Flg_Estado = ? AND CD_CAJAUSU.Flg_Marcabaja = ? 
                             JOIN (  SELECT CD_PERFILUSU.Id_Dausu_FK FROM DA_PERFIL   
                                    JOIN CD_PERFILUSU ON CD_PERFILUSU.Id_Daprf_FK = DA_PERFIL.Id_Daprf  
                                    WHERE DA_PERFIL.Flg_Estado = ?  AND DA_PERFIL.Flg_Marcabaja = ?  
                                    AND CD_PERFILUSU.Flg_Estado = ?  AND CD_PERFILUSU.Flg_Marcabaja = ?  
                                    AND DA_PERFIL.Cod_Daprf_Key = ? ) TMP_PERFILCAJA ON TMP_PERFILCAJA.Id_Dausu_FK = DA_USUARIO.Id_Dausu        
                             WHERE 
                                 DA_USUARIO.Flg_Estado = ?  
                                 AND DA_USUARIO.Flg_Marcabaja = ?  
                                 AND DA_USUARIO.Id_Daemp_FK = ?  
                                 AND DA_USUARIO.Id_Datie_FK = ?  
                                 AND CD_CAJAUSU.Id_Cdcajprf IS NULL  ";
                                 
        if( $p_Id_Caja != 0) $l_String_Query .= "     OR CD_CAJAUSU.Id_Dacaj_FK = ? ";

        array_push($l_ListParametros,["Flg_Estado",true]);
        array_push($l_ListParametros,["Flg_Marcabaja",true]);
        array_push($l_ListParametros,["Flg_Estado",true]);
        array_push($l_ListParametros,["Flg_Marcabaja",true]);
        array_push($l_ListParametros,["Flg_Estado",true]);
        array_push($l_ListParametros,["Flg_Marcabaja",true]);
        array_push($l_ListParametros,["Cod_Daprf_Key",$l_Key_Cajaro]);
        array_push($l_ListParametros,["Flg_Estado",true]);
        array_push($l_ListParametros,["Flg_Marcabaja",true]);
        array_push($l_ListParametros,["Id_Daemp_FK",$p_Id_Empresa]);
        array_push($l_ListParametros,["Id_Datie_FK",$p_Id_Tienda]);
        if( $p_Id_Caja != 0) array_push($l_ListParametros,["Id_Dacaj_FK",$p_Id_Caja]);

        $l_ObjetoQuery = CrearEstructuraQuery($l_String_Query,$l_ListParametros);

        $l_query = $this->db->query($l_ObjetoQuery["query"],$l_ObjetoQuery["parametros"]);

        if($l_query)
        {
            $l_ResultDt =  $l_query->getResultArray();
            if($l_ResultDt)
            {
                foreach($l_ResultDt as $Item)
                {
                    $l_UsuarioSistema = new ENUsuarioSistema();
                    $l_UsuarioSistema->Id_Usuario = (int)$Item["Id_Dausu"];
                    $l_UsuarioSistema->Des_Usuario = (string)$Item["Des_Dausu_Urs"];
                    array_push($l_List_Usuario,$l_UsuarioSistema);
                }
            }
        }

        return $l_List_Usuario;        
    }

    public function Get_Caja(int $p_Id_Caja,int $p_Id_Tienda):ENCaja
    {
        $l_ResultDt = null;
        $l_query = null;
        $l_String_Query = "";
        $l_ListParametros = [];
        $l_ObjetoQuery = [];
        $l_Caja = new ENCaja();

        $l_String_Query .= " SELECT ";
        $l_String_Query .= "     DA_CAJA.Id_Dacaj ";
        $l_String_Query .= "     ,DA_CAJA.Cod_Dacaj ";
        $l_String_Query .= "     ,DA_CAJA.Des_Dacaj_Nom ";
        $l_String_Query .= "     ,TMP_USERCAJA.Id_Dausu  ";
        $l_String_Query .= "     ,DA_TIENDA.Id_Datie ";
        $l_String_Query .= " FROM  ";
        $l_String_Query .= "     DA_CAJA ";
        $l_String_Query .= "     LEFT JOIN DA_TIENDA ON DA_TIENDA.Id_Datie = DA_CAJA.Id_Datie_FK ";
        $l_String_Query .= "     LEFT JOIN  ";
        $l_String_Query .= "         ( SELECT Id_Dausu,Id_Dacaj_FK,Des_Dausu_Urs FROM CD_CAJAUSU,DA_USUARIO  ";
        $l_String_Query .= "         WHERE CD_CAJAUSU.Id_Dausu_FK = DA_USUARIO.Id_Dausu ";
        $l_String_Query .= "         AND CD_CAJAUSU.Flg_Estado = 1 AND CD_CAJAUSU.Flg_Marcabaja = 1  ";
        $l_String_Query .= "         AND DA_USUARIO.Flg_Estado = 1 AND DA_USUARIO.Flg_Marcabaja = 1) TMP_USERCAJA ";
        $l_String_Query .= "         ON TMP_USERCAJA.Id_Dacaj_FK = DA_CAJA.Id_Dacaj ";
        $l_String_Query .= " WHERE ";
        $l_String_Query .= "     DA_CAJA.Flg_Estado = ? ";
        $l_String_Query .= "     AND DA_CAJA.Flg_Marcabaja = ? ";
        $l_String_Query .= "     AND DA_TIENDA.Flg_Estado = ? ";
        $l_String_Query .= "     AND DA_TIENDA.Flg_Marcabaja = ? ";
        $l_String_Query .= "     AND DA_TIENDA.Id_Datie = ? ";
        $l_String_Query .= "     AND DA_CAJA.Id_Dacaj = ? ";

        array_push($l_ListParametros,["Flg_Estado",true]);
        array_push($l_ListParametros,["Flg_Marcabaja",true]);
        array_push($l_ListParametros,["Flg_Estado",true]);
        array_push($l_ListParametros,["Flg_Marcabaja",true]);
        array_push($l_ListParametros,["Id_Datie",$p_Id_Tienda]);
        array_push($l_ListParametros,["Id_Dacaj",$p_Id_Caja]);

        $l_ObjetoQuery = CrearEstructuraQuery($l_String_Query,$l_ListParametros);

        $l_query = $this->db->query($l_ObjetoQuery["query"],$l_ObjetoQuery["parametros"]);

        if($l_query)
        {
            $l_ResultDt =  $l_query->getResultArray();
            if($l_ResultDt)
            {
                foreach($l_ResultDt as $Item)
                {
                    $l_Caja->Id_Caja = (int)$Item["Id_Dacaj"];
                    $l_Caja->Cod_Caja = (string)$Item["Cod_Dacaj"];
                    $l_Caja->Des_Caja = (string)$Item["Des_Dacaj_Nom"];
                    $l_Caja->Id_Usuario = (int)$Item["Id_Dausu"];
                    $l_Caja->Id_Tienda = (int)$Item["Id_Datie"];
                }
            }
        }

        return $l_Caja;   
    }

    public function Set_Caja(ENCaja $p_Caja,int $p_Id_Usuario):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_ResultDt = null;
        $l_query = null;
        $l_StoreProcedure = "";
        $l_ListParametros = [];
        $l_ObjetoQuery = [];
        $l_List_Caja = [];
        $l_Caja = null;
        $l_ResultBusqueda = new ENResultBusqueda();

        $l_StoreProcedure = "sp_cixmart_set_caja_usuario";

        array_push($l_ListParametros,["p_Id_Caj",$p_Caja->Id_Caja]);
        array_push($l_ListParametros,["p_Cod_Caj",$p_Caja->Cod_Caja]);
        array_push($l_ListParametros,["p_Id_Tie",$p_Caja->Id_Tienda]);
        array_push($l_ListParametros,["p_Des_Caj_Nom",$p_Caja->Des_Caja]);
        array_push($l_ListParametros,["p_Id_Usu",$p_Caja->Id_Usuario]);
        array_push($l_ListParametros,["p_Id_Usuamodi",$p_Id_Usuario]);           

        $l_ObjetoQuery = CrearEstructuraSP($l_StoreProcedure,$l_ListParametros);

        $l_query = $this->db->query($l_ObjetoQuery["store"],$l_ObjetoQuery["parametros"]);

        if($l_query)
        {
            $l_ResultDt =  $l_query->getResultArray();
            
            if( $l_ResultDt!=null && count($l_ResultDt)>0 && (int)$l_ResultDt[0]["Code"] == 1)
            {
                $l_Rpt->Resultado = (int)$l_ResultDt[0]["Id"];
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