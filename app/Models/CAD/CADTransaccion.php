<?php namespace App\Models\CAD;

use CodeIgniter\Model;
use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENResultBusqueda as ENResultBusqueda;
use App\Models\CEN\CENTransaccion as ENTransaccion;


class CADTransaccion extends Model
{
    public $db = null;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }


    public function Get_List_Trx(string $p_Des_Busqueda,int $p_Id_Empresa,int $p_Num_RegistroIni,int $p_Num_Intervalo):ENResultBusqueda
    {
        $l_ResultDt = null;
        $l_query = null;
        $l_StoreProcedure = "";
        $l_ListParametros = [];
        $l_ObjetoQuery = [];
        $l_List_Transaccion = [];
        $l_Transaccion = null;
        $l_ResultBusqueda = new ENResultBusqueda();

        $l_StoreProcedure = "sp_cixmart_get_lista_trx";

        array_push($l_ListParametros,["p_Des_Bus",$p_Des_Busqueda]);
        array_push($l_ListParametros,["p_Id_Emp",$p_Id_Empresa]);
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
                    $l_Transaccion = new ENTransaccion();

                     $l_Transaccion->Id_Trx = (int)$Item["Id_Trx"];
                     $l_Transaccion->Id_Origen = (int)$Item["Id_Trx_Tbl"];
                     $l_Transaccion->Cod_Tienda  = (string)$Item["Cod_Datie"];
                     $l_Transaccion->Des_Usuario = (string)$Item["Des_Dausu_Urs"];
                     $l_Transaccion->Tip_OpeComercial = (int)$Item["Tip_Trx_Ope"];
                     $l_Transaccion->Des_Operacion = (string)$Item["Des_Trx_Ope"];
                     $l_Transaccion->Id_Sesion = (int)$Item["Id_Dases_FK"];
                     $l_Transaccion->Flg_Movimiento = (int)$Item["Flg_Trx_Mov"];
                     $l_Transaccion->Des_Movimiento = (string)$Item["Des_Trx_Mov"];
                     $l_Transaccion->Flg_Resultado = (int)$Item["Flg_Trx_Rsl"];
                     $l_Transaccion->Des_Resultado = (string)$Item["Des_Trx_Rsl"];
                     $l_Transaccion->Fec_Registro = (string)$Item["Fec_Registro"];                     

                    array_push($l_List_Transaccion,$l_Transaccion);
                }

                $l_ResultBusqueda->List_Resultado = $l_List_Transaccion;
            }
        }

        return $l_ResultBusqueda;         
    }

    public function Get_Obj_Trx(int $p_Id_Trx,int $p_Num_Opcion):string
    {
        $l_ResultDt = null;
        $l_query = null;
        $l_String_Query = "";
        $l_ListParametros = [];
        $l_ObjetoQuery = [];
        $l_Obj_Json = "";

        $l_String_Query .= " SELECT ";
        if ( $p_Num_Opcion == 1 ) $l_String_Query .= " Obj_Trx_Jsn AS Obj";
        if ( $p_Num_Opcion == 2 ) $l_String_Query .= " Obj_Trx_Rsl AS Obj";
        $l_String_Query .= " FROM  ";
        $l_String_Query .= "     IF_TRX ";
        $l_String_Query .= " WHERE ";
        $l_String_Query .= "     Id_Trx_FK = ? ";

        array_push($l_ListParametros,["Id_Trx_FK",$p_Id_Trx]);

        $l_ObjetoQuery = CrearEstructuraQuery($l_String_Query,$l_ListParametros);

        $l_query = $this->db->query($l_ObjetoQuery["query"],$l_ObjetoQuery["parametros"]);

        if($l_query)
        {
            $l_ResultDt =  $l_query->getResultArray();
            if($l_ResultDt)
            {
                $l_Obj_Json = (string)$l_ResultDt[0]["Obj"];
            }
        }

        return $l_Obj_Json;  
    }
}