<?php namespace App\Models\CLN;

use CodeIgniter\Model;

use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENDataService as ENDataService;
use App\Models\CEN\CENAutenticacionService as ENAutenticacionService;



use App\Models\CLN\CLNGenerico as LNGenerico;
use App\Models\CLN\CLNParsistema;

use App\Models\CAD\CADProveedor as ADProveedor;


class CLNProveedor extends Model
{
    private ENAutenticacionService $g_Obj_Aut;

    public function __construct(ENAutenticacionService $p_Obj_Aut)
    {
        $this->g_Obj_Aut = $p_Obj_Aut;
    }


    public function Render_crear(int $p_Id_Proveedor):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_LNParsistema = new CLNParsistema();
        $l_FrontEnd = [];
        $l_Proveedor = [];

        $l_Rpt = $l_LNParsistema->Get_Parametros_Sistema(1,0);
        $l_List_Documentos = json_decode(json_encode($l_Rpt->Resultado), true);

        $l_FrontEnd = [
            "v_Id_Proveedor" => $p_Id_Proveedor,
            "v_List_Documentos" => $l_List_Documentos
        ];

        $l_Rpt->Resultado = $l_FrontEnd;
        return $l_Rpt;
    }


    public function Get_Proveedor(int $p_Id_Proveedor):ENResponse
    {   
        $l_Rpt = new ENResponse();

        return $l_Rpt;
    }

    public function Get_Lista_Proveedor(ENDataService $p_Request):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_ResultBusqueda = null;
        $l_ADProveedor = new ADProveedor();
        $l_LNGenerico = new LNGenerico();
        $l_Des_Busqueda = "";

        if(array_key_exists("Des_Busqueda",$p_Request->Busqueda))
        {
            $l_Des_Busqueda = $p_Request->Busqueda["Des_Busqueda"];
        }

        $p_Request->Paginacion = $l_LNGenerico->Get_Valor_Intervalo($p_Request->Paginacion);

        $l_ResultBusqueda = $l_ADProveedor->Get_Lista_Proveedor(
             $l_Des_Busqueda
            ,$this->g_Obj_Aut->Id_Empresa
            ,$p_Request->Paginacion
        );

        $l_ResultBusqueda = $l_LNGenerico->Calcular_Datos_Paginacion($l_ResultBusqueda,$p_Request->Paginacion->Num_Seccion,$p_Request->Paginacion->Num_RegistroIni,$p_Request->Paginacion->Num_Intervalo);

        $l_Rpt->Resultado = $l_ResultBusqueda;

        return $l_Rpt;
    }

    public function Obtener_Detalle_Proveedor(int $p_Id_Proveedor):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_ADProveedor = new ADProveedor();

        $l_Rpt->Resultado = $l_ADProveedor->Obtener_Detalle_Proveedor($p_Id_Proveedor);

        return $l_Rpt;
    }


}
?>