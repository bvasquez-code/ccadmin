<?php namespace App\Models\CSE;


use CodeIgniter\Model;
use App\Models\CLN\CLNConfigsistema as LNConfigsistema;
use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENDataService as ENDataService;
use App\Models\CEN\CENRequestService as ENRequestService;
use App\Models\CEN\CENAutenticacionService as ENAutenticacionService;

/**
 * Clase de Conexion a los Diferentes WS
 */
class CSEOrquestador extends Model
{
    public $LNConfigsistema = null;

    public function __construct()
    {
        $this->LNConfigsistema = new LNConfigsistema();
    }

    public function SendPost($p_Request=null,string $p_UrlService)
    {
        $l_ENResponse = new ENResponse;
        $l_ResponseService = null;
        $l_Response = null;
        $l_RequestJSON = "";

        $l_RequestJSON = json_encode($p_Request);
        $l_ResponseService = curl_init($p_UrlService);

        curl_setopt($l_ResponseService, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($l_ResponseService, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($l_ResponseService, CURLOPT_POSTFIELDS,$l_RequestJSON);

        $l_Response = json_decode(curl_exec($l_ResponseService),true);

        curl_close($l_ResponseService);

        if(!$l_Response) {
            $l_ENResponse->Error->Fail(404,0,"RESPUESTA DEL WEB SERVICE LLEGO VACIA.");
        }else{

            $l_ENResponse->Resultado = $l_Response["Resultado"];
            $l_ENResponse->Error->Set($l_Response["Error"]);
        }

        return $l_ENResponse;
    }

    public function Ejecutar_01_ws_wa_CargasMasivaProducto($p_Request=null,int $p_Num_Funcion = 1)
    {
        $l_ENResponse = new ENResponse;
        $l_UrlService = "";
        $l_Flg_ServicoActivo = false;
        $l_Cod_Parsis_ws = 1;

        $l_Flg_ServicoActivo = (bool)$this->LNConfigsistema->Get_Parametros_Sistema_string(G_const_par_ConfigService,$l_Cod_Parsis_ws,19);
        
        if($l_Flg_ServicoActivo)
        {
            $l_UrlService = (string)$this->LNConfigsistema->Get_Parametros_Sistema_string(G_const_par_ConfigService,$l_Cod_Parsis_ws,8);
            
            if( $p_Num_Funcion === 1 )
            {
                $l_UrlService = $l_UrlService . "/RegistrarCarga";
            }
            if( $p_Num_Funcion === 2 )
            {
                $l_UrlService = $l_UrlService . "/RegistrarCaracteristica";
            }
            
            $l_ENResponse = $this->SendPost($p_Request,$l_UrlService);
        }else
        {
            $l_ENResponse->Error->Fail(404,0,"SERVICIO INACTIVO.");
        }

        return $l_ENResponse;
    }
    

    public function Ejecutar_02_ws_wa_ListarItemsNegocio($p_Request=null)
    {

        $l_ENResponse = new ENResponse;
        $l_UrlService = "";
        $l_Flg_ServicoActivo = false;
        $l_Cod_Parsis_ws = 2;

        $l_Flg_ServicoActivo = (bool)$this->LNConfigsistema->Get_Parametros_Sistema_string(G_const_par_ConfigService,$l_Cod_Parsis_ws,19);
        
        if($l_Flg_ServicoActivo)
        {
            $l_UrlService = (string)$this->LNConfigsistema->Get_Parametros_Sistema_string(G_const_par_ConfigService,$l_Cod_Parsis_ws,8);
            $l_ENResponse = $this->SendPost($p_Request,$l_UrlService);
        }else
        {
            $l_ENResponse->Error->Fail(404,0,"SERVICIO INACTIVO.");
        }

        return $l_ENResponse;
    }    


    public function Ejecutar_03_ws_wa_ListarProductos($p_Request=null)
    {
        $l_ENResponse = new ENResponse;
        $l_UrlService = "";
        $l_Flg_ServicoActivo = false;
        $l_Cod_Parsis_ws = 3;

        $l_Flg_ServicoActivo = (bool)$this->LNConfigsistema->Get_Parametros_Sistema_string(G_const_par_ConfigService,$l_Cod_Parsis_ws,19);
        
        if($l_Flg_ServicoActivo)
        {
            $l_UrlService = (string)$this->LNConfigsistema->Get_Parametros_Sistema_string(G_const_par_ConfigService,$l_Cod_Parsis_ws,8);

            $l_ENResponse = $this->SendPost($p_Request,$l_UrlService);

        }else
        {
            $l_ENResponse->Error->Fail(404,0,"SERVICIO INACTIVO.");
        }

        return $l_ENResponse;
    }
    
    public function Ejecutar_04_ws_wa_RegistrarVenta($p_Request=null)
    {
        $l_ENResponse = new ENResponse;
        $l_UrlService = "";
        $l_Flg_ServicoActivo = false;
        $l_Cod_Parsis_ws = 4;

        $l_Flg_ServicoActivo = (bool)$this->LNConfigsistema->Get_Parametros_Sistema_string(G_const_par_ConfigService,$l_Cod_Parsis_ws,19);
        
        if($l_Flg_ServicoActivo)
        {
            $l_UrlService = (string)$this->LNConfigsistema->Get_Parametros_Sistema_string(G_const_par_ConfigService,$l_Cod_Parsis_ws,8);
            $l_ENResponse = $this->SendPost($p_Request,$l_UrlService);
            
        }else
        {
            $l_ENResponse->Error->Fail(404,0,"SERVICIO INACTIVO.");
        }

        return $l_ENResponse;
    }

    public function Ejecutar_05_ws_wa_ListarClientes(ENDataService $p_DataService,ENAutenticacionService $p_Obj_Aut)
    {
        $l_ENResponse = new ENResponse();
        $l_ENRequestService = new ENRequestService();
        $l_UrlService = "";
        $l_Flg_ServicoActivo = false;
        $l_Cod_Parsis_ws = 5;

        $l_ENRequestService->ObjAute = $p_Obj_Aut;
        $l_ENRequestService->ObjData = $p_DataService;

        $l_Flg_ServicoActivo = (bool)$this->LNConfigsistema->Get_Parametros_Sistema_string(G_const_par_ConfigService,$l_Cod_Parsis_ws,19);
        
        if($l_Flg_ServicoActivo)
        {
            $l_UrlService = (string)$this->LNConfigsistema->Get_Parametros_Sistema_string(G_const_par_ConfigService,$l_Cod_Parsis_ws,8);
            $l_ENResponse = $this->SendPost($l_ENRequestService,$l_UrlService);
        }else
        {
            $l_ENResponse->Error->Fail(404,0,"SERVICIO INACTIVO.");
        }

        return $l_ENResponse;
    }

    public function Ejecutar_06_ws_wa_RegistrarCliente($p_Request = null,int $p_Id_Usuario,int $p_Id_Empresa,int $p_Id_Tienda,string $p_User,string $p_Password)
    {
        $l_ENResponse = new ENResponse();
        $l_ENRequestService = new ENRequestService();
        $l_UrlService = "";
        $l_Flg_ServicoActivo = false;
        $l_Cod_Parsis_ws = 6;

        $l_ENRequestService->ObjAute->User = $p_User;
        $l_ENRequestService->ObjAute->Password = $p_Password;
        $l_ENRequestService->ObjAute->Id_Usuario = $p_Id_Usuario;
        $l_ENRequestService->ObjAute->Id_Empresa = $p_Id_Empresa; 
        $l_ENRequestService->ObjAute->Id_Tienda = $p_Id_Tienda; 
        $l_ENRequestService->ObjData = $p_Request;

        $l_Flg_ServicoActivo = (bool)$this->LNConfigsistema->Get_Parametros_Sistema_string(G_const_par_ConfigService,$l_Cod_Parsis_ws,19);
        
        if($l_Flg_ServicoActivo)
        {
            $l_UrlService = (string)$this->LNConfigsistema->Get_Parametros_Sistema_string(G_const_par_ConfigService,$l_Cod_Parsis_ws,8);
            $l_ENResponse = $this->SendPost($l_ENRequestService,$l_UrlService);
        }else
        {
            $l_ENResponse->Error->Fail(404,0,"SERVICIO INACTIVO.");
        }

        return $l_ENResponse;        
    }

    public function Ejecutar_07_ws_wa_ListarTrxVenta(ENDataService $p_DataService,int $p_Id_Usuario,int $p_Id_Empresa,int $p_Id_Tienda,string $p_User,string $p_Password)
    {
        $l_ENResponse = new ENResponse();
        $l_ENRequestService = new ENRequestService();
        $l_UrlService = "";
        $l_Flg_ServicoActivo = false;
        $l_Cod_Parsis_ws = 7;

        $l_ENRequestService->ObjAute->User = $p_User;
        $l_ENRequestService->ObjAute->Password = $p_Password;
        $l_ENRequestService->ObjAute->Id_Usuario = $p_Id_Usuario;
        $l_ENRequestService->ObjAute->Id_Empresa = $p_Id_Empresa; 
        $l_ENRequestService->ObjAute->Id_Tienda = $p_Id_Tienda; 
        $l_ENRequestService->ObjData = $p_DataService;

        $l_Flg_ServicoActivo = (bool)$this->LNConfigsistema->Get_Parametros_Sistema_string(G_const_par_ConfigService,$l_Cod_Parsis_ws,19);
        
        if($l_Flg_ServicoActivo)
        {
            $l_UrlService = (string)$this->LNConfigsistema->Get_Parametros_Sistema_string(G_const_par_ConfigService,$l_Cod_Parsis_ws,8);
            $l_ENResponse = $this->SendPost($l_ENRequestService,$l_UrlService);
        }else
        {
            $l_ENResponse->Error->Fail(404,0,"SERVICIO INACTIVO.");
        }

        return $l_ENResponse;
    }

    public function Ejecutar_08_ws_wa_ListarElementosVenta(ENDataService $p_DataService,int $p_Id_Usuario,int $p_Id_Empresa,int $p_Id_Tienda,string $p_User,string $p_Password)
    {
        $l_ENResponse = new ENResponse();
        $l_ENRequestService = new ENRequestService();
        $l_UrlService = "";
        $l_Flg_ServicoActivo = false;
        $l_Cod_Parsis_ws = 8;

        $l_ENRequestService->ObjAute->User = $p_User;
        $l_ENRequestService->ObjAute->Password = $p_Password;
        $l_ENRequestService->ObjAute->Id_Usuario = $p_Id_Usuario;
        $l_ENRequestService->ObjAute->Id_Empresa = $p_Id_Empresa; 
        $l_ENRequestService->ObjAute->Id_Tienda = $p_Id_Tienda; 
        $l_ENRequestService->ObjData = $p_DataService;

        $l_Flg_ServicoActivo = (bool)$this->LNConfigsistema->Get_Parametros_Sistema_string(G_const_par_ConfigService,$l_Cod_Parsis_ws,19);
        
        if($l_Flg_ServicoActivo)
        {
            $l_UrlService = (string)$this->LNConfigsistema->Get_Parametros_Sistema_string(G_const_par_ConfigService,$l_Cod_Parsis_ws,8);
            $l_ENResponse = $this->SendPost($l_ENRequestService,$l_UrlService);
        }else
        {
            $l_ENResponse->Error->Fail(404,0,"SERVICIO INACTIVO.");
        }

        return $l_ENResponse;
    }

    public function Ejecutar_09_ws_wa_CargaStock(array $p_ObjData,int $p_Id_Usuario,int $p_Id_Empresa,int $p_Id_Tienda,string $p_User,string $p_Password)
    {
        $l_ENResponse = new ENResponse();
        $l_ENRequestService = new ENRequestService();
        $l_UrlService = "";
        $l_Flg_ServicoActivo = false;
        $l_Cod_Parsis_ws = 9;

        $l_ENRequestService->ObjAute->User = $p_User;
        $l_ENRequestService->ObjAute->Password = $p_Password;
        $l_ENRequestService->ObjAute->Id_Usuario = $p_Id_Usuario;
        $l_ENRequestService->ObjAute->Id_Empresa = $p_Id_Empresa; 
        $l_ENRequestService->ObjAute->Id_Tienda = $p_Id_Tienda; 
        $l_ENRequestService->ObjData = $p_ObjData;

        $l_Flg_ServicoActivo = (bool)$this->LNConfigsistema->Get_Parametros_Sistema_string(G_const_par_ConfigService,$l_Cod_Parsis_ws,19);
        
        if($l_Flg_ServicoActivo)
        {
            $l_UrlService = (string)$this->LNConfigsistema->Get_Parametros_Sistema_string(G_const_par_ConfigService,$l_Cod_Parsis_ws,8);
            $l_ENResponse = $this->SendPost($l_ENRequestService,$l_UrlService);
        }else
        {
            $l_ENResponse->Error->Fail(404,0,"SERVICIO INACTIVO.");
        }

        return $l_ENResponse;
    }

    public function Ejecutar_10_ws_wa_ConfirmarCargaStock(array $p_ObjData,int $p_Id_Usuario,int $p_Id_Empresa,int $p_Id_Tienda,string $p_User,string $p_Password)
    {
        $l_ENResponse = new ENResponse();
        $l_ENRequestService = new ENRequestService();
        $l_UrlService = "";
        $l_Flg_ServicoActivo = false;
        $l_Cod_Parsis_ws = 10;

        $l_ENRequestService->ObjAute->User = $p_User;
        $l_ENRequestService->ObjAute->Password = $p_Password;
        $l_ENRequestService->ObjAute->Id_Usuario = $p_Id_Usuario;
        $l_ENRequestService->ObjAute->Id_Empresa = $p_Id_Empresa; 
        $l_ENRequestService->ObjAute->Id_Tienda = $p_Id_Tienda; 
        $l_ENRequestService->ObjData = $p_ObjData;

        $l_Flg_ServicoActivo = (bool)$this->LNConfigsistema->Get_Parametros_Sistema_string(G_const_par_ConfigService,$l_Cod_Parsis_ws,19);
        
        if($l_Flg_ServicoActivo)
        {
            $l_UrlService = (string)$this->LNConfigsistema->Get_Parametros_Sistema_string(G_const_par_ConfigService,$l_Cod_Parsis_ws,8);
            $l_ENResponse = $this->SendPost($l_ENRequestService,$l_UrlService);
        }else
        {
            $l_ENResponse->Error->Fail(404,0,"SERVICIO INACTIVO.");
        }

        return $l_ENResponse;
    }

    public function Ejecutar_11_ws_wa_ListarMovKardex(ENDataService $p_DataService,ENAutenticacionService $p_Obj_Autenticacion)
    {
        $l_ENResponse = new ENResponse();
        $l_ENRequestService = new ENRequestService();
        $l_UrlService = "";
        $l_Flg_ServicoActivo = false;
        $l_Cod_Parsis_ws = 11;

        $l_ENRequestService->ObjAute = $p_Obj_Autenticacion;
        $l_ENRequestService->ObjData = $p_DataService;

        $l_Flg_ServicoActivo = (bool)$this->LNConfigsistema->Get_Parametros_Sistema_string(G_const_par_ConfigService,$l_Cod_Parsis_ws,19);
        
        if($l_Flg_ServicoActivo)
        {
            $l_UrlService = (string)$this->LNConfigsistema->Get_Parametros_Sistema_string(G_const_par_ConfigService,$l_Cod_Parsis_ws,8);
            $l_ENResponse = $this->SendPost($l_ENRequestService,$l_UrlService);
        }else
        {
            $l_ENResponse->Error->Fail(404,0,"SERVICIO INACTIVO.");
        }

        return $l_ENResponse;
    }

    public function Ejecutar_12_ws_wa_RegistrarPago(array $p_ObjData,ENAutenticacionService $p_Obj_Autenticacion):ENResponse
    {
        $l_ENResponse = new ENResponse();
        $l_ENRequestService = new ENRequestService();
        $l_UrlService = "";
        $l_Flg_ServicoActivo = false;
        $l_Cod_Parsis_ws = 12;

        $l_ENRequestService->ObjAute = $p_Obj_Autenticacion;
        $l_ENRequestService->ObjData = $p_ObjData;

        $l_Flg_ServicoActivo = (bool)$this->LNConfigsistema->Get_Parametros_Sistema_string(G_const_par_ConfigService,$l_Cod_Parsis_ws,19);
        
        if($l_Flg_ServicoActivo)
        {
            $l_UrlService = (string)$this->LNConfigsistema->Get_Parametros_Sistema_string(G_const_par_ConfigService,$l_Cod_Parsis_ws,8);
            $l_ENResponse = $this->SendPost($l_ENRequestService,$l_UrlService);
        }else
        {
            $l_ENResponse->Error->Fail(404,0,"SERVICIO INACTIVO.");
        }

        return $l_ENResponse;
    }

    public function Ejecutar_13_ws_wa_ValidarCredenciales(array $p_ObjData,int $p_Num_Funcion):ENResponse
    {
        $l_ENResponse = new ENResponse();
        $l_ENRequestService = new ENRequestService();
        $l_UrlService = "";
        $l_Flg_ServicoActivo = false;
        $l_Cod_Parsis_ws = 13;
        $l_Des_Funcion = "";

        $l_ENRequestService->ObjAute = [];
        $l_ENRequestService->ObjData = $p_ObjData;

        $l_Flg_ServicoActivo = (bool)$this->LNConfigsistema->Get_Parametros_Sistema_string(G_const_par_ConfigService,$l_Cod_Parsis_ws,19);
        
        if($l_Flg_ServicoActivo)
        {
            if ( $p_Num_Funcion == 1 )
            {
                $l_Des_Funcion = "/Get_Id_Conexion";
            }
            if ( $p_Num_Funcion == 2 )
            {
                $l_Des_Funcion = "/Login";
            }
            if ( $p_Num_Funcion == 3 )
            {
                $l_Des_Funcion = "/Set_Destruir_Sesion";
            }

            $l_UrlService = (string)$this->LNConfigsistema->Get_Parametros_Sistema_string(G_const_par_ConfigService,$l_Cod_Parsis_ws,8);
            
            $l_UrlService = $l_UrlService . $l_Des_Funcion;

            $l_ENResponse = $this->SendPost($l_ENRequestService,$l_UrlService);

        }else
        {
            $l_ENResponse->Error->Fail(404,0,"SERVICIO INACTIVO.");
        }

        return $l_ENResponse;
    }

    public function Ejecutar_14_ws_wa_BuscarPromo(array $p_ObjData,ENAutenticacionService $p_Obj_Autenticacion):ENResponse
    {
        $l_ENResponse = new ENResponse();
        $l_ENRequestService = new ENRequestService();
        $l_UrlService = "";
        $l_Flg_ServicoActivo = false;
        $l_Cod_Parsis_ws = 14;

        $l_ENRequestService->ObjAute = $p_Obj_Autenticacion;
        $l_ENRequestService->ObjData = $p_ObjData;

        $l_Flg_ServicoActivo = (bool)$this->LNConfigsistema->Get_Parametros_Sistema_string(G_const_par_ConfigService,$l_Cod_Parsis_ws,19);
        
        if($l_Flg_ServicoActivo)
        {
            $l_UrlService = (string)$this->LNConfigsistema->Get_Parametros_Sistema_string(G_const_par_ConfigService,$l_Cod_Parsis_ws,8);
            $l_ENResponse = $this->SendPost($l_ENRequestService,$l_UrlService);
        }else
        {
            $l_ENResponse->Error->Fail(404,0,"SERVICIO INACTIVO.");
        }

        return $l_ENResponse;
    }

    public function Ejecutar_15_ws_wa_ExportWordpress($p_Request=null)
    {
        $l_ENResponse = new ENResponse;
        $l_UrlService = "";
        $l_Flg_ServicoActivo = false;
        $l_Cod_Parsis_ws = 15;

        $l_Flg_ServicoActivo = (bool)$this->LNConfigsistema->Get_Parametros_Sistema_string(G_const_par_ConfigService,$l_Cod_Parsis_ws,19);
        
        if($l_Flg_ServicoActivo)
        {
            $l_UrlService = (string)$this->LNConfigsistema->Get_Parametros_Sistema_string(G_const_par_ConfigService,$l_Cod_Parsis_ws,8);
            $l_ENResponse = $this->SendPost($p_Request,$l_UrlService);
        }else
        {
            $l_ENResponse->Error->Fail(404,0,"SERVICIO INACTIVO.");
        }

        return $l_ENResponse;
    }
    public function Ejecutar_16_ws_wa_EnvioCorreo($p_ObjData = null,ENAutenticacionService $p_Obj_Autenticacion):ENResponse
    {
        $l_ENResponse = new ENResponse();
        $l_ENRequestService = new ENRequestService();
        $l_UrlService = "";
        $l_Flg_ServicoActivo = false;
        $l_Cod_Parsis_ws = 16;

        $l_ENRequestService->ObjAute = $p_Obj_Autenticacion;
        $l_ENRequestService->ObjData = $p_ObjData;

        $l_Flg_ServicoActivo = (bool)$this->LNConfigsistema->Get_Parametros_Sistema_string(G_const_par_ConfigService,$l_Cod_Parsis_ws,19);
        
        if($l_Flg_ServicoActivo)
        {
            $l_UrlService = (string)$this->LNConfigsistema->Get_Parametros_Sistema_string(G_const_par_ConfigService,$l_Cod_Parsis_ws,8);
            $l_ENResponse = $this->SendPost($l_ENRequestService,$l_UrlService);
        }else
        {
            $l_ENResponse->Error->Fail(404,0,"SERVICIO INACTIVO.");
        }

        return $l_ENResponse;
    }

    public function Ejecutar_17_ws_wa_FacturacionElectronica($p_ObjData = null,ENAutenticacionService $p_Obj_Autenticacion)
    {
        $l_ENResponse = new ENResponse();
        $l_ENRequestService = new ENRequestService();
        $l_UrlService = "";
        $l_Flg_ServicoActivo = false;
        $l_Cod_Parsis_ws = 17;

        $l_ENRequestService->ObjAute = $p_Obj_Autenticacion;
        $l_ENRequestService->ObjData = $p_ObjData;

        $l_Flg_ServicoActivo = (bool)$this->LNConfigsistema->Get_Parametros_Sistema_string(G_const_par_ConfigService,$l_Cod_Parsis_ws,19);

        // echo json_encode($l_ENRequestService);

        if($l_Flg_ServicoActivo)
        {
            $l_UrlService = (string)$this->LNConfigsistema->Get_Parametros_Sistema_string(G_const_par_ConfigService,$l_Cod_Parsis_ws,8);
            $l_ENResponse = $this->SendPost($l_ENRequestService,$l_UrlService);
        }else
        {
            $l_ENResponse->Error->Fail(404,0,"SERVICIO INACTIVO.");
        }

        // echo json_encode($l_ENResponse);

        return $l_ENResponse;
    }

    public function Ejecutar_18_ws_wa_RegistroPromo($p_ObjData = null,ENAutenticacionService $p_Obj_Autenticacion):ENResponse
    {
        $l_ENResponse = new ENResponse();
        $l_ENRequestService = new ENRequestService();
        $l_UrlService = "";
        $l_Flg_ServicoActivo = false;
        $l_Cod_Parsis_ws = 18;

        $l_ENRequestService->ObjAute = $p_Obj_Autenticacion;
        $l_ENRequestService->ObjData = $p_ObjData;

        $l_Flg_ServicoActivo = (bool)$this->LNConfigsistema->Get_Parametros_Sistema_string(G_const_par_ConfigService,$l_Cod_Parsis_ws,19);
        
        if($l_Flg_ServicoActivo)
        {
            $l_UrlService = (string)$this->LNConfigsistema->Get_Parametros_Sistema_string(G_const_par_ConfigService,$l_Cod_Parsis_ws,8);
            $l_ENResponse = $this->SendPost($l_ENRequestService,$l_UrlService);
        }else
        {
            $l_ENResponse->Error->Fail(404,0,"SERVICIO INACTIVO.");
        }

        return $l_ENResponse;
    }

    public function Ejecutar_19_ws_wa_RegistroCompra($p_ObjData = null,ENAutenticacionService $p_Obj_Autenticacion):ENResponse
    {
        $l_ENResponse = new ENResponse();
        $l_ENRequestService = new ENRequestService();
        $l_UrlService = "";
        $l_Flg_ServicoActivo = false;
        $l_Cod_Parsis_ws = 19;

        $l_ENRequestService->ObjAute = $p_Obj_Autenticacion;
        $l_ENRequestService->ObjData = $p_ObjData;

        $l_Flg_ServicoActivo = (bool)$this->LNConfigsistema->Get_Parametros_Sistema_string(G_const_par_ConfigService,$l_Cod_Parsis_ws,19);
        
        if($l_Flg_ServicoActivo)
        {
            $l_UrlService = (string)$this->LNConfigsistema->Get_Parametros_Sistema_string(G_const_par_ConfigService,$l_Cod_Parsis_ws,8);
            $l_ENResponse = $this->SendPost($l_ENRequestService,$l_UrlService);
        }else
        {
            $l_ENResponse->Error->Fail(404,0,"SERVICIO INACTIVO.");
        }

        return $l_ENResponse;
    }

    public function Ejecutar_20_ws_wa_ConsultaSunat($p_ObjData = null,ENAutenticacionService $p_Obj_Autenticacion):ENResponse
    {
        $l_ENResponse = new ENResponse();
        $l_ENRequestService = new ENRequestService();
        $l_UrlService = "";
        $l_Flg_ServicoActivo = false;
        $l_Cod_Parsis_ws = 20;

        $l_ENRequestService->ObjAute = $p_Obj_Autenticacion;
        $l_ENRequestService->ObjData = $p_ObjData;

        $l_Flg_ServicoActivo = (bool)$this->LNConfigsistema->Get_Parametros_Sistema_string(G_const_par_ConfigService,$l_Cod_Parsis_ws,19);
        
        if($l_Flg_ServicoActivo)
        {
            $l_UrlService = (string)$this->LNConfigsistema->Get_Parametros_Sistema_string(G_const_par_ConfigService,$l_Cod_Parsis_ws,8);
            $l_ENResponse = $this->SendPost($l_ENRequestService,$l_UrlService);
        }else
        {
            $l_ENResponse->Error->Fail(404,0,"SERVICIO INACTIVO.");
        }

        return $l_ENResponse;
    }

    public function Ejecutar_21_ws_wa_ListarCompra($p_ObjData = null,ENAutenticacionService $p_Obj_Autenticacion):ENResponse
    {
        $l_ENResponse = new ENResponse();
        $l_ENRequestService = new ENRequestService();
        $l_UrlService = "";
        $l_Flg_ServicoActivo = false;
        $l_Cod_Parsis_ws = 21;

        $l_ENRequestService->ObjAute = $p_Obj_Autenticacion;
        $l_ENRequestService->ObjData = $p_ObjData;

        $l_Flg_ServicoActivo = (bool)$this->LNConfigsistema->Get_Parametros_Sistema_string(G_const_par_ConfigService,$l_Cod_Parsis_ws,19);
        
        if($l_Flg_ServicoActivo)
        {
            $l_UrlService = (string)$this->LNConfigsistema->Get_Parametros_Sistema_string(G_const_par_ConfigService,$l_Cod_Parsis_ws,8);
            $l_ENResponse = $this->SendPost($l_ENRequestService,$l_UrlService);
        }else
        {
            $l_ENResponse->Error->Fail(404,0,"SERVICIO INACTIVO.");
        }

        return $l_ENResponse;
    }

    public function Ejecutar_22_ws_wa_ListarStockAlmacen($p_ObjData = null,ENAutenticacionService $p_Obj_Autenticacion):ENResponse
    {
        $l_ENResponse = new ENResponse();
        $l_ENRequestService = new ENRequestService();
        $l_UrlService = "";
        $l_Flg_ServicoActivo = false;
        $l_Cod_Parsis_ws = 22;

        $l_ENRequestService->ObjAute = $p_Obj_Autenticacion;
        $l_ENRequestService->ObjData = $p_ObjData;

        $l_Flg_ServicoActivo = (bool)$this->LNConfigsistema->Get_Parametros_Sistema_string(G_const_par_ConfigService,$l_Cod_Parsis_ws,19);
        
        if($l_Flg_ServicoActivo)
        {
            $l_UrlService = (string)$this->LNConfigsistema->Get_Parametros_Sistema_string(G_const_par_ConfigService,$l_Cod_Parsis_ws,8);
            $l_ENResponse = $this->SendPost($l_ENRequestService,$l_UrlService);
        }else
        {
            $l_ENResponse->Error->Fail(404,0,"SERVICIO INACTIVO.");
        }

        return $l_ENResponse;
    }

    public function Ejecutar_23_ws_wa_RegistrarMovimientoStockFisico($p_ObjData = null,ENAutenticacionService $p_Obj_Autenticacion):ENResponse
    {
        $l_ENResponse = new ENResponse();
        $l_ENRequestService = new ENRequestService();
        $l_UrlService = "";
        $l_Flg_ServicoActivo = false;
        $l_Cod_Parsis_ws = 23;

        $l_ENRequestService->ObjAute = $p_Obj_Autenticacion;
        $l_ENRequestService->ObjData = $p_ObjData;

        $l_Flg_ServicoActivo = (bool)$this->LNConfigsistema->Get_Parametros_Sistema_string(G_const_par_ConfigService,$l_Cod_Parsis_ws,19);
        
        if($l_Flg_ServicoActivo)
        {
            $l_UrlService = (string)$this->LNConfigsistema->Get_Parametros_Sistema_string(G_const_par_ConfigService,$l_Cod_Parsis_ws,8);
            $l_ENResponse = $this->SendPost($l_ENRequestService,$l_UrlService);
        }else
        {
            $l_ENResponse->Error->Fail(404,0,"SERVICIO INACTIVO.");
        }

        return $l_ENResponse;
    }

}
?>