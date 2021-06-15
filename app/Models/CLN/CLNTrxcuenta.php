<?php namespace App\Models\CLN;

use CodeIgniter\Model;

use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENAutenticacionService as ENAutenticacionService;
use App\Models\CEN\CENParbusqueda as ENParbusqueda;
use App\Models\CEN\CENTrxCuenta as ENTrxCuenta;
use App\Models\CEN\CENDataService as ENDataService;
use App\Models\CEN\CENResultBusqueda as ENResultBusqueda;

use App\Models\CAD\CADTrxcuenta as ADTrxcuenta;

use App\Models\CLN\CLNGenerico as LNGenerico;
use App\Models\CLN\CLNConfigsistema as LNConfigsistema;

class CLNTrxcuenta extends Model
{
    

    public function __construct()
    {
    }

    public function Render_Index(ENAutenticacionService $p_Obj_Aut):ENResponse
    {
        $l_FrontEnd = [];
        $l_Rpt = new ENResponse();
        $l_LNGenerico = new LNGenerico();
        $l_List_Tienda = []; //Lista de tiendas

        $l_Rpt = $l_LNGenerico->Get_List_Tienda($p_Obj_Aut->Id_Tienda,$p_Obj_Aut->Id_Usuario);
        $l_List_Tienda = json_decode(json_encode($l_Rpt->Resultado), true);

        $l_FrontEnd = [
            "v_List_Tienda" => $l_List_Tienda
        ];

        $l_Rpt->Resultado = $l_FrontEnd;

        return $l_Rpt;
    }

    public function Render_Crear(ENAutenticacionService $p_Obj_Aut):ENResponse
    {
        $l_FrontEnd = [];
        $l_Rpt = new ENResponse();
        $l_LNGenerico = new LNGenerico();
        $l_List_Tienda = []; //Lista de tiendas
        $l_List_Tipo_Mov_Cuenta = []; //Lista de tipos de movimientos de cuenta

        $l_Rpt = $l_LNGenerico->Get_List_Tienda($p_Obj_Aut->Id_Tienda,$p_Obj_Aut->Id_Usuario);
        $l_List_Tienda = json_decode(json_encode($l_Rpt->Resultado), true);

        $l_List_Tipo_Mov_Cuenta = $this->Get_List_Movimientos_Tip_Cuenta();
        $l_List_Tipo_Mov_Cuenta = json_decode(json_encode($l_List_Tipo_Mov_Cuenta), true);

        $l_FrontEnd = [
             "v_List_Tienda" => $l_List_Tienda
            ,"v_List_Tipo_Mov_Cuenta" => $l_List_Tipo_Mov_Cuenta
        ];

        $l_Rpt->Resultado = $l_FrontEnd;

        return $l_Rpt;
    }

    public function Get_List_Cuenta(int $p_Id_Tienda):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_ADTrxcuenta = new ADTrxcuenta();

        $l_Rpt->Resultado = [ 'List_Cuenta' => $l_ADTrxcuenta->Get_List_Cuenta($p_Id_Tienda) ];

        return $l_Rpt;
    }

    public function Get_List_Movimientos_Tip_Cuenta():array
    {
        $l_LNConfigsistema = new LNConfigsistema();
        $l_Parbusqueda = new ENParbusqueda();
        $l_List_Par_Busqueda = [];
        $l_Type_Movement_Money = 31; //TIPO DE MOVIMIENTO DE DINERO

        $l_Parbusqueda = new ENParbusqueda();
        $l_Parbusqueda->key = "Flg_Cfpsis_Bo1"; //Este flag indica si se mostrara o no como accesible manualmente
        $l_Parbusqueda->Val = 1;
        array_push($l_List_Par_Busqueda,$l_Parbusqueda);

        return $l_LNConfigsistema->Get_Parametros_Sistema_object($l_Type_Movement_Money,0,"",$l_List_Par_Busqueda);
    }

    public function Set_Trx_Cuenta(ENTrxCuenta $p_TrxCuenta,ENAutenticacionService $p_ObjAut):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_ADTrxcuenta = new ADTrxcuenta();
        
        $l_Rpt = $this->Validar_Mov_Trx_Cuenta($p_TrxCuenta);
        if( $l_Rpt->Error->flagerror ) return $l_Rpt;

        $l_Rpt = $l_ADTrxcuenta->Set_Trx_Cuenta($p_TrxCuenta,$p_ObjAut->Id_Empresa,$p_ObjAut->Id_Usuario);

        return $l_Rpt;
    }

    private function Validar_Mov_Trx_Cuenta(ENTrxCuenta $p_TrxCuenta)
    {
        $l_Rpt = new ENResponse();

        if( $p_TrxCuenta->Id_Cuenta == 0 ||  $p_TrxCuenta->Id_Cuenta == null )
        {
            $l_Rpt->Error->flagerror = true;
            $l_Rpt->Error->messages = "DEBE ELEGIRSE UNA CUENTA DE DESTINO";
            return $l_Rpt;
        }
        if( $p_TrxCuenta->Tip_Movimiento == 0 ||  $p_TrxCuenta->Tip_Movimiento == null )
        {
            $l_Rpt->Error->flagerror = true;
            $l_Rpt->Error->messages = "DEBE ELEGIRSE UN TIPO DE MOVIMIENTO";
            return $l_Rpt;
        }
        if( $p_TrxCuenta->Des_Manual_Operacion == "" ||  $p_TrxCuenta->Des_Manual_Operacion == null )
        {
            $l_Rpt->Error->flagerror = true;
            $l_Rpt->Error->messages = "LA DESCRIPCIÓN DEL MOVIMIENTO ES OBLIGATIRIA";
            return $l_Rpt;
        }
        if( $p_TrxCuenta->Num_Monto < 0 )
        {
            $l_Rpt->Error->flagerror = true;
            $l_Rpt->Error->messages = "MONTO NO DEBE LLEVAR SIGNO";
            return $l_Rpt;
        }
        if( $p_TrxCuenta->Num_Monto == 0 )
        {
            $l_Rpt->Error->flagerror = true;
            $l_Rpt->Error->messages = "MONTO NO PUEDE SER 0";
            return $l_Rpt;
        }

        return $l_Rpt;
    }

    public function Get_List_Trx_Cuenta(ENDataService $p_Request):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_ResultBusqueda = new ENResultBusqueda();
        $l_ADTrxcuenta = new ADTrxcuenta();
        $l_LNGenerico = new LNGenerico();
        $l_Id_Cuenta = 0;

        if(array_key_exists("Id_Cuenta",$p_Request->Busqueda))
        {
            $l_Id_Cuenta = $p_Request->Busqueda["Id_Cuenta"];
        }

        $p_Request->Paginacion = $l_LNGenerico->Get_Valor_Intervalo($p_Request->Paginacion);

        $l_ResultBusqueda = $l_ADTrxcuenta->Get_List_Trx_Cuenta($l_Id_Cuenta
                                                ,$p_Request->Paginacion->Num_RegistroIni,$p_Request->Paginacion->Num_Intervalo);

        $l_ResultBusqueda = $l_LNGenerico->Calcular_Datos_Paginacion($l_ResultBusqueda,$p_Request->Paginacion->Num_Seccion,$p_Request->Paginacion->Num_RegistroIni,$p_Request->Paginacion->Num_Intervalo);

        $l_Rpt->Resultado = $l_ResultBusqueda;
        return $l_Rpt;
    }
}
?>