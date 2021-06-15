<?php namespace App\Models\CLN;

use CodeIgniter\Model;
use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENLogDev as ENLogDev;

use App\Models\CAD\CADLogdesarrollo as ADLogdesarrollo;

class CLNLogdesarrollo extends Model
{

    public function __construct()
    {

    }


    public function Set_Log_Desarrollo(ENLogDev $p_LogDes,int $p_Id_Tienda,int $p_Id_Usuario):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_ADLogdesarrollo = new ADLogdesarrollo();

        $l_Rpt = $l_ADLogdesarrollo->Set_Log_Desarrollo($p_LogDes,$p_Id_Tienda,$p_Id_Usuario);

        return $l_Rpt;
    }

    public function Set_Log_Desarrollo_Obj_Entrada(string $p_Des_Origen,string $p_Des_Sistema,$p_Obj_Entrada=null,
                                                    int $p_Id_Tienda,int $p_Id_Usuario):ENResponse
    {

        $l_Rpt = new ENResponse();
        $l_ADLogdesarrollo = new ADLogdesarrollo();

        $l_LogDev = new ENLogDev();

        $l_LogDev->Des_Origen = $p_Des_Origen;
        $l_LogDev->Des_Sistema = $p_Des_Sistema;
        $l_LogDev->Des_Obj_Entrada = json_encode($p_Obj_Entrada);

        $l_Rpt = $l_ADLogdesarrollo->Set_Log_Desarrollo($l_LogDev,$p_Id_Tienda,$p_Id_Usuario);

        return $l_Rpt;
    }

    public function Set_Log_Desarrollo_Obj_Salida(int $p_Id_LogDev,$p_Obj_Salida=null,
                                                    int $p_Id_Tienda,int $p_Id_Usuario):ENResponse
    {

        $l_Rpt = new ENResponse();
        $l_ADLogdesarrollo = new ADLogdesarrollo();

        $l_LogDev = new ENLogDev();
        $l_LogDev->Id_LogDev = $p_Id_LogDev;
        $l_LogDev->Des_Obj_Salida = json_encode($p_Obj_Salida);

        $l_Rpt = $l_ADLogdesarrollo->Set_Log_Desarrollo($l_LogDev,$p_Id_Tienda,$p_Id_Usuario);

        return $l_Rpt;
    }

}