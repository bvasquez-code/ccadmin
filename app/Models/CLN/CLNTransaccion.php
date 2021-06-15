<?php namespace App\Models\CLN;

use CodeIgniter\Model;

use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENAutenticacionService as ENAutenticacionService;
use App\Models\CEN\CENDataService as ENDataService;
use App\Models\CEN\CENResultBusqueda as ENResultBusqueda;

use App\Models\CAD\CADTransaccion as ADTransaccion;

use App\Models\CLN\CLNGenerico as LNGenerico;

class CLNTransaccion extends Model
{

    public function __construct()
    {
        
    }

    public function Get_List_Trx(ENDataService $p_Request,ENAutenticacionService $p_Obj_Autenticacion):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_ADTransaccion = new ADTransaccion();
        $l_LNGenerico = new LNGenerico();
        $l_ResultBusqueda = new ENResultBusqueda();
        $l_Des_Busqueda = "";

        if(array_key_exists("Des_Busqueda",$p_Request->Busqueda))
        {
            $l_Des_Busqueda = $p_Request->Busqueda["Des_Busqueda"];
        }

        $p_Request->Paginacion = $l_LNGenerico->Get_Valor_Intervalo($p_Request->Paginacion);

        $l_ResultBusqueda = $l_ADTransaccion->Get_List_Trx($l_Des_Busqueda,$p_Obj_Autenticacion->Id_Empresa
                                                ,$p_Request->Paginacion->Num_RegistroIni,$p_Request->Paginacion->Num_Intervalo);

        $l_ResultBusqueda = $l_LNGenerico->Calcular_Datos_Paginacion($l_ResultBusqueda,$p_Request->Paginacion->Num_Seccion,$p_Request->Paginacion->Num_RegistroIni,$p_Request->Paginacion->Num_Intervalo);

        $l_Rpt->Resultado = $l_ResultBusqueda;

        return $l_Rpt;
    }

    public function Get_Obj_Trx(int $p_Id_Trx,int $p_Num_Opcion):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_ADTransaccion = new ADTransaccion();
        
        $l_Rpt->Resultado = $l_ADTransaccion->Get_Obj_Trx($p_Id_Trx,$p_Num_Opcion);

        return $l_Rpt;
    }
}