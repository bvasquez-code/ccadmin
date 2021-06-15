<?php namespace App\Models\CAD;

use CodeIgniter\Model;

use App\Models\CEN\CENTienda as ENTienda;
use App\Models\CEN\CENOtrOpeComerciales as ENOtrOpeComerciales;
use App\Models\CEN\CENResultBusqueda as ENResultBusqueda;
use App\Models\CEN\CENDetOtrOpeComercial as ENDetOtrOpeComercial;

class CADStockmanual extends Model
{
    public $db = null;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function Get_Tienda(int $p_Id_Tienda):array
    {
        $l_ResultDt = null;
        $l_query = null;
        $l_Sting_Query = "";
        $l_ListParametros = [];
        $l_ObjetoQuery = [];

        $l_Flg_Activo = true;
        $l_Tienda = null; //objeto tienda
        $l_List_Tienda = []; //Lista de tiendas

        $l_Sting_Query  = " SELECT Id_Datie,Cod_Datie,Des_Datie_Nom FROM DA_TIENDA WHERE Flg_Estado = ? AND Flg_Marcabaja = ? ";
        if ( $p_Id_Tienda != 0 ) $l_Sting_Query .= " AND Id_Datie = ? ";

        array_push($l_ListParametros,["Flg_Estado",$l_Flg_Activo]);
        array_push($l_ListParametros,["Flg_Marcabaja",$l_Flg_Activo]);
        if ( $p_Id_Tienda != 0 ) array_push($l_ListParametros,["Id_Datie",$p_Id_Tienda]);

        $l_ObjetoQuery = CrearEstructuraQuery($l_Sting_Query,$l_ListParametros);
        $l_query = $this->db->query($l_ObjetoQuery["query"],$l_ObjetoQuery["parametros"]);

        if($l_query)
        {
            $l_ResultDt =  $l_query->getResultArray();

            if($l_ResultDt)
            {
                foreach($l_ResultDt as $Item)
                {
                    $l_Tienda = new ENTienda();
                    $l_Tienda->Id_Tienda = (int)$Item["Id_Datie"];
                    $l_Tienda->Cod_Tienda = (string)$Item["Cod_Datie"];
                    $l_Tienda->Des_Tienda = (string)$Item["Des_Datie_Nom"];
                    array_push($l_List_Tienda,$l_Tienda);
                }
            }
        }

        return $l_List_Tienda;

    }

    public function Get_Carga_Stock(int $p_Id_Tienda,int $p_Id_Empresa,string $p_Des_Key_Busqueda, int $p_Num_RegIni , int $p_Num_Interv,int $p_Num_Seccion):ENResultBusqueda
    {
        $l_ResultBusqueda = new ENResultBusqueda();
        $l_ResultDt = null;
        $l_query = null;
        $l_StoreProcedure = ""; // query del procedimiento almacendado
        $l_ListParametros = [];
        $l_ObjetoQuery = [];
        $l_OtrOpeComerciales = null; //Objeto operacion comercial
        $l_List_OtrOpeComerciales = []; //Lista de operaciones comerciales

        $l_StoreProcedure = "sp_cixmart_get_list_otr_ope_comerciales";
        array_push($l_ListParametros,["p_Id_Tie",$p_Id_Tienda]);
        array_push($l_ListParametros,["p_Id_Emp",$p_Id_Empresa]);
        array_push($l_ListParametros,["p_Des_Key_Bus",$p_Des_Key_Busqueda]);
        array_push($l_ListParametros,["p_Num_RegIni",$p_Num_RegIni]);
        array_push($l_ListParametros,["p_Num_Interv",$p_Num_Interv]);        

        $l_ObjetoQuery = CrearEstructuraSP($l_StoreProcedure,$l_ListParametros);

        $l_query = $this->db->query($l_ObjetoQuery["store"],$l_ObjetoQuery["parametros"]);

        if($l_query)
        {
            $l_ResultDt =  $l_query->getResultArray();

            if($l_ResultDt)
            {
                $l_ResultBusqueda->Num_TotalBus = (int)$l_ResultDt[0]["Num_TotalBus"];
                $l_ResultBusqueda->Get_Info_Paginador($p_Num_Interv,$p_Num_Seccion);
                
                foreach($l_ResultDt as $Item)
                {
                    $l_OtrOpeComerciales = new ENOtrOpeComerciales();
                    $l_OtrOpeComerciales->Id_OtrOpeComerciales = (int)$Item["Id_Otrcom"];
                    $l_OtrOpeComerciales->Cod_OtrOpeComerciales = (string)$Item["Cod_Otrcom"];
                    $l_OtrOpeComerciales->Cod_Manual = (string)$Item["Cod_Otrcom_Man"];
                    $l_OtrOpeComerciales->Des_Tienda = (string)$Item["Des_Datie_Nom"];
                    $l_OtrOpeComerciales->Flg_EstadoOpeCom = (bool)$Item["Flg_Otrcom_Fin"];
                    $l_OtrOpeComerciales->Des_EstaOpeCom = (string)$Item["Des_Otrcom_Fin"];
                    $l_OtrOpeComerciales->Fec_Registro = (string)$Item["Fec_Registro"];
                    $l_OtrOpeComerciales->Des_KeyOpeComercial = (string)$Item["Des_Otrcom_Key"];
                    $l_OtrOpeComerciales->Des_OpeComercial = (string)$Item["Des_Otrcom_Nom"];                   
                    array_push($l_List_OtrOpeComerciales,$l_OtrOpeComerciales);
                }

                $l_ResultBusqueda->List_Resultado = $l_List_OtrOpeComerciales;
            }
        }
        
        return $l_ResultBusqueda;
    }

    public function Get_Detalle_Carga_Stock(int $p_Id_OtrOpeComerciales,int $p_Id_Tienda,int $p_Id_Empresa):ENOtrOpeComerciales
    {
        $l_OtrOpeComerciales = new ENOtrOpeComerciales();
        $l_ResultDt = null;
        $l_query = null;
        $l_StoreProcedure = ""; // query del procedimiento almacendado
        $l_ListParametros = [];
        $l_ObjetoQuery = [];
        $l_DetOtrOpeComercial = null; //Objeto operacion comercial

        $l_StoreProcedure = "sp_cixmart_get_detalle_otr_ope_comerciales";
        array_push($l_ListParametros,["p_Id_Otrcom",$p_Id_OtrOpeComerciales]);
        array_push($l_ListParametros,["p_Id_Tie",$p_Id_Tienda]);
        array_push($l_ListParametros,["p_Id_Emp",$p_Id_Empresa]);

        $l_ObjetoQuery = CrearEstructuraSP($l_StoreProcedure,$l_ListParametros);

        $l_query = $this->db->query($l_ObjetoQuery["store"],$l_ObjetoQuery["parametros"]);

        if($l_query)
        {
            $l_ResultDt =  $l_query->getResultArray();

            if($l_ResultDt)
            {
                $l_OtrOpeComerciales->Id_OtrOpeComerciales = (int)$l_ResultDt[0]["Id_Otrcom"];
                $l_OtrOpeComerciales->Cod_OtrOpeComerciales = (string)$l_ResultDt[0]["Cod_Otrcom"];
                $l_OtrOpeComerciales->Cod_Manual = (string)$l_ResultDt[0]["Cod_Otrcom_Man"];
                $l_OtrOpeComerciales->List_Json_Item = json_decode((string)$l_ResultDt[0]["Obj_Otrcom_Jsn"],true);
                $l_OtrOpeComerciales->Flg_EstadoOpeCom = (bool)$l_ResultDt[0]["Flg_Otrcom_Fin"];
                $l_OtrOpeComerciales->Des_EstaOpeCom = (string)$l_ResultDt[0]["Des_Otrcom_Fin"];
                $l_OtrOpeComerciales->Tip_OpeComercial = (int)$l_ResultDt[0]["Tip_Otrcom_Doc"];
                $l_OtrOpeComerciales->Des_KeyOpeComercial = (string)$l_ResultDt[0]["Des_Otrcom_Key"];
                $l_OtrOpeComerciales->Des_OpeComercial = (string)$l_ResultDt[0]["Des_Otrcom_Nom"];
                $l_OtrOpeComerciales->Des_Tienda = (string)$l_ResultDt[0]["Des_Datie_Nom"];
                $l_OtrOpeComerciales->Id_Tienda = (int)$l_ResultDt[0]["Id_Datie"];
                $l_OtrOpeComerciales->Cod_Tienda = (string)$l_ResultDt[0]["Cod_Datie"];
                $l_OtrOpeComerciales->Des_Direccion = (string)$l_ResultDt[0]["Des_Datie_Dir"];

                foreach($l_ResultDt as $Item)
                {
                    $l_DetOtrOpeComercial = new ENDetOtrOpeComercial();
                    $l_DetOtrOpeComercial->Id_Producto = (int)$Item["Id_Mtpro"];
                    $l_DetOtrOpeComercial->Cod_Producto = (string)$Item["Cod_Mtpro"];
                    $l_DetOtrOpeComercial->Des_Producto = (string)$Item["Des_Mtpro_Nom"];
                    $l_DetOtrOpeComercial->Num_Precio = (float)$Item["Num_Dtotrc_Pre"];
                    $l_DetOtrOpeComercial->Num_Interes = (float)$Item["Num_Dtotrc_Int"];
                    $l_DetOtrOpeComercial->Num_Descuento = (float)$Item["Num_Dtotrc_Dsc"];
                    $l_DetOtrOpeComercial->Num_PrecioVenta = (float)$Item["Num_Dtotrc_Prv"];
                    $l_DetOtrOpeComercial->Num_Cantidad = (int)$Item["Num_Dtotrc_Can"];
                    $l_DetOtrOpeComercial->Num_Monto = (float)$Item["Num_Dtotrc_Mon"];
                    array_push($l_OtrOpeComerciales->List_Item_Productos,$l_DetOtrOpeComercial);
                }

            }
        }

        return $l_OtrOpeComerciales;
    }


}

?>    