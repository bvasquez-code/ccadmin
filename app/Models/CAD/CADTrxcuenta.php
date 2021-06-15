<?php namespace App\Models\CAD;

use CodeIgniter\Model;

use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENCuenta as ENCuenta;
use App\Models\CEN\CENTrxCuenta as ENTrxCuenta;
use App\Models\CEN\CENResultBusqueda as ENResultBusqueda;

use App\Models\CLN\CLNGenerico as LNGenerico;

class CADTrxcuenta extends Model
{
    public $db = null;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function Get_List_Cuenta(int $p_Id_Tienda):array
    {
        $l_LNGenerico = new LNGenerico();
        $l_ResultDt = null;
        $l_query = null;
        $l_Sql = "";
        $l_ListParametros = [];
        $l_ObjetoQuery = [];
        $l_Cuenta = [];
        $l_List_Cuenta = [];
        $l_Type_Money = 7; //TIPOS DE MONEDA

        $l_Sql = "  SELECT
                        DA_CUENTA.Id_Dacue,
                        DA_CUENTA.Des_Dacue_Nom,
                        DA_CUENTA.Cod_Dacue_Tar,
                        CF_CUENTA.Num_Cfcue_Din,
                        CF_CUENTA.Tip_Cfcue_Mon,
                        TMP_MONEDA.Des_Cfpsis_Abr AS Des_Dacue_Mon
                    FROM
                        CD_CUENTATIENDA
                    LEFT JOIN DA_CUENTA ON DA_CUENTA.Id_Dacue = CD_CUENTATIENDA.Id_Dacue_FK
                    LEFT JOIN CF_CUENTA ON CF_CUENTA.Id_Dacue_FK = DA_CUENTA.Id_Dacue
                    LEFT JOIN CF_PARSISTEMA TMP_MONEDA ON TMP_MONEDA.Cod_Cfpsis = CF_CUENTA.Tip_Cfcue_Mon AND TMP_MONEDA.Cod_Cfsis_FK = ?
                    WHERE
                        CD_CUENTATIENDA.Id_Datie_FK = ? 
                        AND CD_CUENTATIENDA.Flg_Estado = ? 
                        AND CD_CUENTATIENDA.Flg_Marcabaja = ? 
                        AND DA_CUENTA.Flg_Estado = ? 
                        AND DA_CUENTA.Flg_Marcabaja = ? ";

        array_push($l_ListParametros,["Cod_Cfsis_FK",$l_Type_Money]);
        array_push($l_ListParametros,["Id_Datie_FK",$p_Id_Tienda]);
        array_push($l_ListParametros,["Flg_Estado",true]);
        array_push($l_ListParametros,["Flg_Marcabaja",true]);
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
                    $l_Cuenta = new ENCuenta();
                    $l_Cuenta->Id_Cuenta = (int)$Item["Id_Dacue"];
                    $l_Cuenta->Des_Cuenta = (string)$Item["Des_Dacue_Nom"];
                    $l_Cuenta->Cod_Cuenta = (string)$Item["Cod_Dacue_Tar"];
                    $l_Cuenta->Num_Saldo = (float)$Item["Num_Cfcue_Din"];
                    $l_Cuenta->Tip_Moneda = (int)$Item["Tip_Cfcue_Mon"];
                    $l_Cuenta->Des_Moneda = (string)$Item["Des_Dacue_Mon"];
                    $l_Cuenta->Des_Saldo = $l_LNGenerico->Establecer_Formato_Moneda($l_Cuenta->Num_Saldo,$l_Cuenta->Des_Moneda);
                    array_push($l_List_Cuenta,$l_Cuenta);
                }

            }
        }

        return $l_List_Cuenta;
    }

    public function Set_Trx_Cuenta(ENTrxCuenta $p_TrxCuenta,int $p_Id_Empresa,int $p_Id_Usuario):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_ResultDt = null;
        $l_query = null;
        $l_StoreProcedure = "";
        $l_ListParametros = [];
        $l_ObjetoQuery = [];


        $l_StoreProcedure = "sp_ccadmin_set_mov_trx_cuenta";

        array_push($l_ListParametros,["p_Id_Cue",$p_TrxCuenta->Id_Cuenta]);
        array_push($l_ListParametros,["p_Tip_Mov",$p_TrxCuenta->Tip_Movimiento]);
        array_push($l_ListParametros,["p_Des_Com",strtoupper($p_TrxCuenta->Des_Manual_Operacion)]);
        array_push($l_ListParametros,["p_Cod_Ope",$p_TrxCuenta->Cod_Ex_Operacion]);
        array_push($l_ListParametros,["p_Num_Monto",$p_TrxCuenta->Num_Monto]);
        array_push($l_ListParametros,["p_Id_Ori",$p_TrxCuenta->Id_Origen]);
        array_push($l_ListParametros,["p_Id_Emp",$p_Id_Empresa]);
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
                    $l_Rpt->Error->messages = "{".$l_ResultDt[0]["Code"]."} ".$l_ResultDt[0]["Message"];
                }
                else
                {
                    $l_Rpt->Resultado = [ "Id_TrxCuenta" => (int)$l_ResultDt[0]["Id"]];
                }
            }
            

        }

        return $l_Rpt;
    }

    public function Get_List_Trx_Cuenta(int $p_Id_Cuenta,int $p_Num_RegistroIni,int $p_Num_Intervalo):ENResultBusqueda
    {
        $l_ResultBusqueda = new ENResultBusqueda();
        $l_LNGenerico = new LNGenerico();
        $l_ResultDt = null;
        $l_query = null;
        $l_StoreProcedure = "";
        $l_ListParametros = [];
        $l_ObjetoQuery = [];
        $l_TrxCuenta = [];
        $l_List_TrxCuenta = [];

        $l_StoreProcedure = "sp_ccadmin_get_mov_trx_cuenta";

        array_push($l_ListParametros,["p_Id_Cue",$p_Id_Cuenta]);
        array_push($l_ListParametros,["p_Num_RegIni",$p_Num_RegistroIni]);
        array_push($l_ListParametros,["p_Num_Interv",$p_Num_Intervalo]);
          

        $l_ObjetoQuery = CrearEstructuraSP($l_StoreProcedure,$l_ListParametros);
        $l_query = $this->db->query($l_ObjetoQuery["store"],$l_ObjetoQuery["parametros"]);

        if($l_query)
        {
            $l_ResultDt =  $l_query->getResultArray();
            if( $l_ResultDt!=null && (int)$l_ResultDt[0]["Num_TotalBus"]>0 )
            {

                $l_ResultBusqueda->Num_TotalBus = (int)$l_ResultDt[0]["Num_TotalBus"];
                $l_ResultBusqueda->Num_TotalReg = (int)$l_ResultDt[0]["Num_TotalReg"];

                foreach( $l_ResultDt as $Item )
                {
                    $l_TrxCuenta = new ENTrxCuenta();
                    $l_TrxCuenta->Id_Cuenta = (int)$Item["Id_Trcue"];
                    $l_TrxCuenta->Des_Manual_Operacion = (string)$Item["Des_Trcue_Com"];
                    $l_TrxCuenta->Cod_Ex_Operacion = (string)$Item["Cod_Trcue_Ope"];
                    $l_TrxCuenta->Num_Monto = (float)$Item["Num_Trcue_Din"];
                    $l_TrxCuenta->Num_Monto_Pre = (float)$Item["Num_Trcue_Dinpre"];
                    $l_TrxCuenta->Num_Monto_Pos = (float)$Item["Num_Trcue_Dinpos"];
                    $l_TrxCuenta->Tip_Operacion = (int)$Item["Tip_Trcue_Mov"];
                    $l_TrxCuenta->Des_Tip_Operacion = (string)$Item["Des_Cfpsis_Nom"];
                    $l_TrxCuenta->Fec_Operacion = (string)$Item["Fec_Registro"];
                    $l_TrxCuenta->Des_Moneda = (string)$Item["Des_Trcue_Mon"];
                    $l_TrxCuenta->Des_Monto = $l_LNGenerico->Establecer_Formato_Moneda($l_TrxCuenta->Num_Monto,(string)$Item["Des_Trcue_Sig"]);
                    $l_TrxCuenta->Des_Monto_Pre = $l_LNGenerico->Establecer_Formato_Moneda($l_TrxCuenta->Num_Monto_Pre,"");
                    $l_TrxCuenta->Des_Monto_Pos = $l_LNGenerico->Establecer_Formato_Moneda($l_TrxCuenta->Num_Monto_Pos,"");
                    array_push($l_List_TrxCuenta,$l_TrxCuenta);
                }

                $l_ResultBusqueda->List_Resultado = $l_List_TrxCuenta;
            }
        }

        return $l_ResultBusqueda;
       
    }
    
}
?>