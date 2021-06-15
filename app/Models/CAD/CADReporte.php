<?php namespace App\Models\CAD;

use CodeIgniter\Model;

use App\Models\CEN\CENResponse as ENResponse;

class CADReporte extends Model
{
    public $db = null;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }


    public function Get_List_Periodo(int $p_Id_Empresa)
    {
        $l_ResultDt = null;
        $l_query = null;
        $l_Sql = "";
        $l_ListParametros = [];
        $l_ObjetoQuery = [];
        $l_Flg_EstadoTrx_Procesada = 2;

        $l_Sql .= " SELECT
                    Id_Trper AS Id_Periodo,
                    Des_Trper AS Des_Periodo,
                    Fec_Trper_Ini AS Fec_Inicio,
                    IF(Fec_Trper_Fin IS NULL,'SIN CULMINAR',Fec_Trper_Fin) AS Fec_Fin
                FROM
                    TR_PERIODO
                WHERE
                    Id_Daemp_FK = ? 
                    AND Flg_Estado = ?
                    AND Flg_Marcabaja = ? 
                    ORDER BY Id_Trper DESC";

        array_push($l_ListParametros,["Id_Daemp_FK",$p_Id_Empresa]);
        array_push($l_ListParametros,["Flg_Estado",true]);
        array_push($l_ListParametros,["Flg_Marcabaja",true]);

        $l_ObjetoQuery = CrearEstructuraQuery($l_Sql,$l_ListParametros);

        $l_query = $this->db->query($l_ObjetoQuery["query"],$l_ObjetoQuery["parametros"]);

        if($l_query)
        {
            $l_ResultDt =  $l_query->getResultArray();
        }         

        return $l_ResultDt;       
    }

    public function Get_List_Ganancia_Venta_x_SKU(int $p_Id_Periodo)
    {
        $l_ResultDt = null;
        $l_query = null;
        $l_Sql = "";
        $l_ListParametros = [];
        $l_ObjetoQuery = [];
        $l_Flg_EstadoTrx_Procesada = 2;

        $l_Sql .= " SELECT
                    TR_VENTA.Cod_Trven as Cod_Venta,
                    MT_PRODUCTO.Cod_Mtpro as Cod_Producto,
                    MT_PRODUCTO.Des_Mtpro_Nom as Des_Nombre,
                    DT_VENTA.Num_Dtven_Prc as Num_PrecioUnitario,
                    DT_VENTA.Num_Dtven_Can as Num_Cantidad,
                    DT_VENTA.Num_Dtven_Prc * DT_VENTA.Num_Dtven_Can as Num_PrecioTotalCosto,
                    DT_VENTA.Num_Dtven_Mon as Num_TotalVendido,
                    DT_VENTA.Num_Dtven_Mon - (DT_VENTA.Num_Dtven_Prc*DT_VENTA.Num_Dtven_Can) AS Num_Ganancia
                    FROM
                        DT_VENTA
                    LEFT JOIN TR_VENTA ON TR_VENTA.Id_Trven = DT_VENTA.Id_Trven_FK
                    LEFT JOIN MT_PRODUCTO ON DT_VENTA.Id_Mtpro_FK = MT_PRODUCTO.Id_Mtpro
                    WHERE
                        TR_VENTA.Flg_EstadoTrx = ?
                        AND TR_VENTA.Id_Trper_FK = ?
                        AND TR_VENTA.Flg_Estado = ?
                        AND TR_VENTA.Flg_Marcabaja = ?
                        AND DT_VENTA.Flg_Estado = ?
                        AND DT_VENTA.Flg_Marcabaja = ?
                    ORDER BY
                        TR_VENTA.Fec_Registro DESC ";

        array_push($l_ListParametros,["Flg_EstadoTrx",$l_Flg_EstadoTrx_Procesada]);
        array_push($l_ListParametros,["Id_Trper_FK",$p_Id_Periodo]);
        array_push($l_ListParametros,["Flg_Estado",true]);
        array_push($l_ListParametros,["Flg_Marcabaja",true]);
        array_push($l_ListParametros,["Flg_Estado",true]);
        array_push($l_ListParametros,["Flg_Marcabaja",true]);

        $l_ObjetoQuery = CrearEstructuraQuery($l_Sql,$l_ListParametros);

        $l_query = $this->db->query($l_ObjetoQuery["query"],$l_ObjetoQuery["parametros"]);

        if($l_query)
        {
            $l_ResultDt =  $l_query->getResultArray();
        }         

        return $l_ResultDt;
    }
}
?>