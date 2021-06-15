<?php namespace App\Models\CLN;

use CodeIgniter\Model;

use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENAutenticacionService as ENAutenticacionService;

use App\Models\CAD\CADReporte as ADReporte;

class CLNReporte extends Model
{

    public function __construct()
    {
        
    }

    public function Render_ReporteGananciaSKU(ENAutenticacionService $p_ObjAut,string $p_QUERY_STRING):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_FrontEnd = [];
        $l_List_Periodo = [];
        $l_List_Ganancia_Venta_x_SKU = [];
        $l_Array_Query_Url = [];
        $l_Array_Busqueda = [];
        $l_Id_Periodo_Select = 0;


        $l_Rpt = $this->Get_List_Periodo($p_ObjAut->Id_Empresa);
        $l_List_Periodo= json_decode(json_encode($l_Rpt->Resultado),true);

        if($p_QUERY_STRING != "")
        {
            $p_QUERY_STRING = "?".$p_QUERY_STRING;
            $l_Array_Query_Url =  parse_url($p_QUERY_STRING);
            parse_str($l_Array_Query_Url['query'], $l_Array_Busqueda);

            $l_Id_Periodo_Select = (int)$l_Array_Busqueda["Id_Periodo"];
            $l_Rpt = $this->Get_List_Ganancia_Venta_x_SKU($l_Id_Periodo_Select);
            $l_List_Ganancia_Venta_x_SKU= json_decode(json_encode($l_Rpt->Resultado),true);
        }


        $l_FrontEnd = [
            "v_Id_Periodo_Select" => $l_Id_Periodo_Select,
            "v_List_Periodo" => $l_List_Periodo,
            "v_List_Ganancia_Venta_x_SKU"=>$l_List_Ganancia_Venta_x_SKU
        ];

        $l_Rpt->Resultado = $l_FrontEnd;
        return $l_Rpt;
    }

    public function Get_List_Periodo(int $p_Id_Empresa):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_ADReporte = new ADReporte();

        $l_Rpt->Resultado = $l_ADReporte->Get_List_Periodo($p_Id_Empresa);

        return $l_Rpt;
    }
    public function Get_List_Ganancia_Venta_x_SKU(int $p_Id_Periodo):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_ADReporte = new ADReporte();

        $l_Rpt->Resultado = $l_ADReporte->Get_List_Ganancia_Venta_x_SKU($p_Id_Periodo);

        return $l_Rpt;
    }
}
?>