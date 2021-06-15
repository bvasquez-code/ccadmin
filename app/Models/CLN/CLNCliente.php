<?php namespace App\Models\CLN;

use CodeIgniter\Model;

use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENRequestService as ENRequestService;
use App\Models\CEN\CENPaginacionService as ENPaginacionService;
use App\Models\CEN\CENDataService as ENDataService;
use App\Models\CEN\CENAutenticacionService as ENAutenticacionService;
use App\Models\CEN\CENCliente as ENCliente;

use App\Models\CSE\CSEOrquestador as SEOrquestador;

class CLNCliente extends Model
{

    public function __construct()
    {

    }

    public function Render_index()
    {
        $l_Rpt = new ENResponse();

        return $l_Rpt;
    }

    public function Get_Cliente(ENDataService $p_DataService,ENAutenticacionService $p_Obj_Aut)
    {
        $l_Rpt = new ENResponse();
        $l_SEOrquestador = new SEOrquestador();
        $l_ObjData = [];
        $l_Cliente = new ENCliente();
 
        $l_Rpt = $l_SEOrquestador->Ejecutar_05_ws_wa_ListarClientes($p_DataService,$p_Obj_Aut);

        if( $l_Rpt->Resultado["PersonaJuridica"] == null && $l_Rpt->Resultado["PersonaNatural"] == null)
        {
            if( (int)$p_DataService->Busqueda["Tip_Persona"] == 1 )
            {
                $l_ObjData = [
                    "Des_KeyOperacion" => "Reniec",
                    "Cod_Documento" => $p_DataService->Busqueda["Cod_Documento"]
                ];
            }
            if( (int)$p_DataService->Busqueda["Tip_Persona"] == 2 )
            {
                $l_ObjData = [
                    "Des_KeyOperacion" => "Sunat",
                    "Cod_Documento" => $p_DataService->Busqueda["Cod_Documento"]
                ];
            }


            $l_Rpt = $l_SEOrquestador->Ejecutar_20_ws_wa_ConsultaSunat($l_ObjData,$p_Obj_Aut);

            if( (int)$p_DataService->Busqueda["Tip_Persona"] == 1 )
            {
                if( (bool)$l_Rpt->Resultado["flg_resultado"] )
                {
                    $l_Cliente->Tip_Persona = 1;
                    $l_Cliente->PersonaJuridica = null;
                    $l_Cliente->PersonaNatural->Tip_Documento = 1;
                    $l_Cliente->PersonaNatural->Cod_Documento = $l_Rpt->Resultado["dni"];
                    $l_Cliente->PersonaNatural->Des_Nombres = $l_Rpt->Resultado["nombres"];
                    $l_Cliente->PersonaNatural->Des_ApePaterno = $l_Rpt->Resultado["apellido_paterno"];
                    $l_Cliente->PersonaNatural->Des_ApeMaterno = $l_Rpt->Resultado["apellido_materno"];
                }
            }
            if( (int)$p_DataService->Busqueda["Tip_Persona"] == 2 )
            {
                if(!$l_Rpt->Error->flagerror)
                {
                    $l_Cliente->Tip_Persona = 2;
                    $l_Cliente->PersonaNatural = null;
                    $l_Cliente->PersonaJuridica->Cod_Ruc = $l_Rpt->Resultado["ruc"];
                    $l_Cliente->PersonaJuridica->Des_RazonSocial = $l_Rpt->Resultado["razon_social"];
                    $l_Cliente->PersonaJuridica->Des_NomComercial = $l_Rpt->Resultado["nombre_comercial"];
                    $l_Cliente->PersonaJuridica->Des_Dirreccion = $l_Rpt->Resultado["domicilio_fiscal"];

                }else
                {
                    $l_Rpt = new ENResponse();
                }
            }

            $l_Rpt->Resultado = $l_Cliente;

        }

        return $l_Rpt;
    }

    public function Get_List_Cliente(ENDataService $p_DataService,ENAutenticacionService $p_Obj_Aut):ENResponse
    {
        $l_SEOrquestador = new SEOrquestador();
         return $l_SEOrquestador->Ejecutar_05_ws_wa_ListarClientes($p_DataService,$p_Obj_Aut);
    }


}