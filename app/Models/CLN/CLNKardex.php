<?php namespace App\Models\CLN;

use CodeIgniter\Model;

use App\Models\CEN\CENDataService as ENDataService;
use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENAutenticacionService as ENAutenticacionService;

use App\Models\CSE\CSEOrquestador as SEOrquestador;



class CLNKardex extends Model
{

    public function __construct()
    {

    }

    public function Get_List_Mov_Kardex(ENDataService $p_ENDataService,ENAutenticacionService $p_Obj_Autenticacion):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_Orquestador = new SEOrquestador();

        $l_Rpt = $l_Orquestador->Ejecutar_11_ws_wa_ListarMovKardex($p_ENDataService,$p_Obj_Autenticacion);

        return $l_Rpt;
    }


}
?>