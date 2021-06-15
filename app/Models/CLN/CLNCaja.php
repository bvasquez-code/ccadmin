<?php namespace App\Models\CLN;

use CodeIgniter\Model;

use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENUsuarioSistema as ENUsuarioSistema;
use App\Models\CEN\CENAutenticacionService as ENAutenticacionService;
use App\Models\CEN\CENDataService as ENDataService;
use App\Models\CEN\CENResultBusqueda as ENResultBusqueda;
use App\Models\CEN\CENCaja as ENCaja;
use App\Models\CEN\CENParsistema as ENParsistema;
use App\Models\CEN\CENDia as ENDia;

use App\Models\CAD\CADCaja as ADcaja;

use App\Models\CLN\CLNCliente as LNCliente;
use App\Models\CLN\CLNGenerico as LNGenerico;

use App\Models\CSE\CSEOrquestador as SEOrquestador;

class CLNCaja extends Model
{

    public function __construct()
    {
        
    }

    public function Render_Crear(int $p_Id_Caja=0,ENAutenticacionService $p_Obj_Autenticacion):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_FrontEnd = [];
        $l_LNGenerico = new LNGenerico();
        $l_ENDia = null;
        $l_Obj_Caja = [];
        $l_List_Tienda = [];
        $l_Flg_Validar = true;
        $l_Id_Tienda = 0;
        $l_List_Dias = [];

        $l_Obj_Caja = json_decode(json_encode($this->Get_Caja($p_Id_Caja,$p_Obj_Autenticacion->Id_Tienda)),true);

        $l_Rpt = $l_LNGenerico->Get_Parametros_Sistema(22,0);
        $l_List_Dias = json_decode(json_encode($l_Rpt->Resultado),true);

        if ($p_Id_Caja != 0 )
        {
            $l_Flg_Validar = false;
            $l_Id_Tienda = $l_Obj_Caja["Id_Tienda"];
        }
        else
        {
            $l_Id_Tienda = $p_Obj_Autenticacion->Id_Tienda;
        }

        $l_Rpt = $l_LNGenerico->Get_List_Tienda($l_Id_Tienda,$p_Obj_Autenticacion->Id_Usuario,$l_Flg_Validar);
        $l_List_Tienda= json_decode(json_encode($l_Rpt->Resultado),true);

        $l_FrontEnd = [
            "v_List_Tienda" => $l_List_Tienda,
            "v_Obj_Caja" => $l_Obj_Caja,
            "V_List_Dias" => $l_List_Dias
        ];

        $l_Rpt->Resultado = $l_FrontEnd;

        return $l_Rpt;
    }

    public function Get_List_Caja(ENDataService $p_Request,ENAutenticacionService $p_Obj_Autenticacion):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_ADcaja = new ADcaja();
        $l_ResultBusqueda = new ENResultBusqueda();
        $l_LNGenerico = new LNGenerico();
        $l_Id_Tienda = 0;
        $l_Des_Busqueda = "";

        if(array_key_exists("Des_Busqueda",$p_Request->Busqueda))
        {
            $l_Des_Busqueda = $p_Request->Busqueda["Des_Busqueda"];
        }

        $l_Id_Tienda = $p_Obj_Autenticacion->Id_Tienda;

        $p_Request->Paginacion = $l_LNGenerico->Get_Valor_Intervalo($p_Request->Paginacion);

        $l_ResultBusqueda = $l_ADcaja->Get_List_Caja((int)$p_Obj_Autenticacion->Id_Empresa,$l_Id_Tienda,$l_Des_Busqueda,$p_Request->Paginacion->Num_RegistroIni,$p_Request->Paginacion->Num_Intervalo);

        $l_ResultBusqueda = $l_LNGenerico->Calcular_Datos_Paginacion($l_ResultBusqueda,$p_Request->Paginacion->Num_Seccion,$p_Request->Paginacion->Num_RegistroIni,$p_Request->Paginacion->Num_Intervalo);

        $l_Rpt->Resultado = $l_ResultBusqueda;

        return $l_Rpt;
    }

    public function Get_List_Usuarios_Caja(int $p_Id_Caja,int $p_Id_Tienda,int $p_Id_Empresa):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_ADcaja = new ADcaja();
        $l_List_Resultado = $l_ADcaja->Get_List_Usuarios_Caja($p_Id_Caja,$p_Id_Tienda,$p_Id_Empresa);

        $l_Rpt->Resultado = [ "List_Resultado" => $l_List_Resultado ];

        return $l_Rpt;
    }

    public function Get_Caja(int $p_Id_Caja,int $p_Id_Tienda):ENCaja
    {
        $l_ADcaja = new ADcaja();

        return $l_ADcaja->Get_Caja($p_Id_Caja,$p_Id_Tienda);
    }

    public function Set_Caja(ENCaja $p_Caja,ENAutenticacionService $p_Obj_Autenticacion):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_ADcaja = new ADcaja();

        $l_Rpt = $l_ADcaja->Set_Caja($p_Caja,$p_Obj_Autenticacion->Id_Usuario);

        return $l_Rpt;
    }

}