<?php namespace App\Models\CAD;

use CodeIgniter\Model;

use App\Models\CEN\CENResponse;
use App\Models\CEN\CENProveedor as ENProveedor;
use App\Models\CEN\CENProveedorResumen as ENProveedorResumen;
use App\Models\CEN\CENPaginacionService as ENPaginacionService;
use App\Models\CEN\CENResultBusqueda as ENResultBusqueda;


class CADProveedor extends Model
{
    public $db = null;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function Get_Proveedor(int $p_Id_Prv, string $p_Cod_Pjur_Ruc, string $p_Des_Pjur_Nco, int $p_Num_RegIni , int $p_Num_Interv) 
    {
        $l_ResultDt = null;  //resultado de BD
        $l_query = null; // QUERY
        $l_StoreProcedure = ""; //Nombre del PA
        $l_ListParametros = []; //Parametro del PA
        $l_ObjetoQuery = []; //Parametrizacion del proc alm
        $l_ENProveedor = null; //
        $l_List_Object = array();

        $l_StoreProcedure = "sp_cixmart_get_proveedor";
        array_push($l_ListParametros,["p_Id_Prv", $p_Id_Prv]);
        array_push($l_ListParametros,["p_Cod_Pjur_Ruc", $p_Cod_Pjur_Ruc]);
        array_push($l_ListParametros,["p_Des_Pjur_Nco", $p_Des_Pjur_Nco]);
        array_push($l_ListParametros,["p_Num_RegIni", $p_Num_RegIni]);
        array_push($l_ListParametros,["p_Num_Interv", $p_Num_Interv]);

        $l_ObjetoQuery = CrearEstructuraSP($l_StoreProcedure,$l_ListParametros);

        $l_query = $this->db->query($l_ObjetoQuery["store"],$l_ObjetoQuery["parametros"]);

        if($l_query)
        {
            $l_ResultDt =  $l_query->getResultArray();

            if($l_ResultDt!=null && count($l_ResultDt)>0)
            {
                if( (int)$l_ResultDt[0]["Code"] == 1 && (int)$l_ResultDt[0]["Num_TotalBus"]>0 )
                {
                    foreach($l_ResultDt as $item)
                    {
                        $l_ENProveedor = new ENProveedor;

                        $l_ENProveedor->Id_Proveedor = $item["Id_Mtprv"];
                          
                        array_push($l_List_Object,$l_ENProveedor);
                    }
                }
            }
        }
        else
        {
            return $l_List_Object;
        }        

        return $l_List_Object;
    }

    public function Get_Lista_Proveedor(string $p_Des_Busqueda,int $p_Id_Empresa,ENPaginacionService $p_Paginacion):ENResultBusqueda
    {
        $l_ResultBusqueda = new ENResultBusqueda();
        $l_ResultDt = null;  //resultado de BD
        $l_query = null; // QUERY
        $l_StoreProcedure = ""; //Nombre del PA
        $l_ListParametros = []; //Parametro del PA
        $l_ObjetoQuery = []; //Parametrizacion del proc alm
        $l_Proveedor = null; //
        $l_List_Proveedor = array();

        $l_StoreProcedure = "sp_cixmart_get_list_proveedor";
        array_push($l_ListParametros,["p_Des_Bus", $p_Des_Busqueda]);
        array_push($l_ListParametros,["p_Id_Emp", $p_Id_Empresa]);
        array_push($l_ListParametros,["p_Num_RegIni", $p_Paginacion->Num_RegistroIni]);
        array_push($l_ListParametros,["p_Num_Interv", $p_Paginacion->Num_Intervalo]);

        $l_ObjetoQuery = CrearEstructuraSP($l_StoreProcedure,$l_ListParametros);

        $l_query = $this->db->query($l_ObjetoQuery["store"],$l_ObjetoQuery["parametros"]);

        if($l_query)
        {
            $l_ResultDt =  $l_query->getResultArray();

            if($l_ResultDt!=null && count($l_ResultDt)>0)
            {
                if( (int)$l_ResultDt[0]["Code"] == 1 && (int)$l_ResultDt[0]["Num_TotalBus"]>0 )
                {
                    $l_ResultBusqueda->Num_TotalBus = (int)$l_ResultDt[0]["Num_TotalBus"];
                    $l_ResultBusqueda->Num_TotalReg = (int)$l_ResultDt[0]["Num_TotalReg"];

                    foreach($l_ResultDt as $item)
                    {
                        $l_Proveedor = new ENProveedorResumen();

                        $l_Proveedor->Id_Proveedor = $item["Id_Mtprv"];
                        $l_Proveedor->Tip_Persona = $item["Tip_Mtprv_Per"];
                        $l_Proveedor->Cod_Documento = $item["Cod_Doc"];
                        $l_Proveedor->Des_Proveedor = $item["Des_Cli"];
                          
                        array_push($l_List_Proveedor,$l_Proveedor);
                    }

                    $l_ResultBusqueda->List_Resultado = $l_List_Proveedor;
                }
            }
        }

        return $l_ResultBusqueda;
    }

    public function Obtener_Detalle_Proveedor(int $p_Id_Proveedor):ENProveedor
    {
        $l_ResultDt = null;
        $l_StoreProcedure = "";
        $l_ListParametros = [];
        $l_ObjetoQuery = [];
        $l_Proveedor = new ENProveedor();

        $l_StoreProcedure = "sp_ccadmin_obtener_detalle_proveedor";
        array_push($l_ListParametros,["p_Id_Prv", $p_Id_Proveedor]);
        $l_ObjetoQuery = CrearEstructuraSP($l_StoreProcedure,$l_ListParametros);
        $l_ResultDt = ($this->db->query($l_ObjetoQuery["store"],$l_ObjetoQuery["parametros"]))->getResultArray();

        if( $l_ResultDt )
        {
           $l_Proveedor->Id_Proveedor = (int)$l_ResultDt[0]["Id_Mtprv"];
           $l_Proveedor->Tip_Persona = (int)$l_ResultDt[0]["Tip_Mtprv_Per"];

           if( $l_Proveedor->Tip_Persona == 2 )
           {
                $l_Proveedor->Tip_Documento = (int)$l_ResultDt[0]["Tip_Doc"];
                $l_Proveedor->PersonaJuridica->Id_PerJuridica = (int)$l_ResultDt[0]["Tip_Doc"];
                $l_Proveedor->PersonaJuridica->Cod_Ruc = (string)$l_ResultDt[0]["Cod_Ruc"];
                $l_Proveedor->PersonaJuridica->Des_RazonSocial = (string)$l_ResultDt[0]["Des_Rzo"];
                $l_Proveedor->PersonaJuridica->Des_Dirreccion = (string)$l_ResultDt[0]["Des_Dir"];
                $l_Proveedor->PersonaJuridica->Des_Telefono = (string)$l_ResultDt[0]["Des_Tf1"];
                $l_Proveedor->PersonaJuridica->Des_Celular = (string)$l_ResultDt[0]["Des_Ce1"];
                $l_Proveedor->PersonaJuridica->Des_Email = (string)$l_ResultDt[0]["Des_Em1"];
           }

        }

        return $l_Proveedor;
    }

    public function Registrar_Proveedor(ENProveedor $p_Proveedor):CENResponse
    {
        $l_Rpt = new CENResponse();
        $l_ResultDt = null;
        $l_StoreProcedure = "";
        $l_ListParametros = [];
        $l_ObjetoQuery = [];

        $l_StoreProcedure = "sp_ccadmin_registrar_proveedor";
        array_push($l_ListParametros,["p_Id_Prv", $p_Id_Proveedor]);

        $l_ObjetoQuery = CrearEstructuraSP($l_StoreProcedure,$l_ListParametros);
        $l_ResultDt = ($this->db->query($l_ObjetoQuery["store"],$l_ObjetoQuery["parametros"]))->getResultArray();

        return $l_Rpt;
    }

}
