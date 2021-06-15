<?php namespace App\Models\CLN;

use CodeIgniter\Model;

use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENRequestService as ENRequestService;
use App\Models\CEN\CENDataService as ENDataService;

use App\Models\CSE\CSEOrquestador as SEOrquestador;

class CLNMarcaproducto extends Model
{

    public function __construct()
    {

    }
   
    public function Set_Marca_Producto($p_request = null,int $p_Id_Usuario,int $p_Id_Empresa,int $p_Id_Tienda,
                                           string $p_User,string $p_Password)
    {
        $l_Rpt = new ENResponse;
        $l_ENRequestService = new ENRequestService;
        $l_SEOrquestador = new SEOrquestador;

        $l_ObjData = [];
        $ListMarcaProducto = [];
        array_push($ListMarcaProducto,$p_request);
        $l_ObjData["ListMarcaProducto"] = $ListMarcaProducto;
        $l_ObjData["Tip_Carga"] = 2;

        $l_ENRequestService->ObjAute->User = $p_User;
        $l_ENRequestService->ObjAute->Password = $p_Password;
        $l_ENRequestService->ObjAute->Id_Usuario = $p_Id_Usuario;
        $l_ENRequestService->ObjAute->Id_Empresa = $p_Id_Empresa; 
        $l_ENRequestService->ObjAute->Id_Tienda = $p_Id_Tienda; 
        $l_ENRequestService->ObjData = $l_ObjData;           

        $l_Rpt = $l_SEOrquestador->Ejecutar_01_ws_wa_CargasMasivaProducto($l_ENRequestService);

        return $l_Rpt;
    }

    public function Get_Marca_Producto(ENDataService $p_ENDataService,int $p_Id_Usuario,int $p_Id_Empresa,int $p_Id_Tienda,string $p_User,string $p_Password)
    {
        $l_Rpt = new ENResponse;
        $l_ENRequestService = new ENRequestService;
        $l_SEOrquestador = new SEOrquestador;        

        $l_ENRequestService->ObjAute->User = $p_User;
        $l_ENRequestService->ObjAute->Password = $p_Password;
        $l_ENRequestService->ObjAute->Id_Usuario = $p_Id_Usuario;
        $l_ENRequestService->ObjAute->Id_Empresa = $p_Id_Empresa; 
        $l_ENRequestService->ObjAute->Id_Tienda = $p_Id_Tienda; 
        $l_ENRequestService->ObjData = $p_ENDataService;           

        $l_Rpt = $l_SEOrquestador->Ejecutar_02_ws_wa_ListarItemsNegocio($l_ENRequestService);

        return $l_Rpt;
    }

}
?>