<?php namespace App\Models\CEN;

use CodeIgniter\MyEntity;
use Exception;

use App\Models\CEN\CENCarrito as ENCarrito;
use App\Models\CEN\CENObjFacturacion as ENObjFacturacion;
use App\Models\CEN\CENAutenticacionService as ENAutenticacionService;

class CENSesion extends MyEntity
{
    public $session = false;
    public $Tip_Session = 0;
    public $Id_Sesion = 0; 
    public $Id_Conexion = ""; 
    public $Id_Usuario = 0; 
    public $Id_Empresa = 0; 
    public $Id_Tienda = 0; 
    public $Id_Caja = 0; 
    public $Cod_Caja = 0; 
    public $Des_Peril = ""; 
    public $Dias_Accecibles = ""; 
    public $Hora_Inicio = ""; 
    public $Hora_Fin = ""; 
    public $Des_UsuarioTienda = ""; 
    public $Cod_HashTienda = ""; 
    public $Nom_Usuario = ""; 
    public ENCarrito $Obj_Carrito; 
    public ENObjFacturacion $Obj_Facturacion; 
    public $Obj_Data_Aux = [];
    public ENAutenticacionService $Obj_AutenticacionService;
    public $ListPermisos = [];
    public $List_Menu_Permitidos = [];

    public function __construct()
    {
        $this->session = false;
        $this->Tip_Session = 0;
        $this->Id_Sesion = 0; 
        $this->Id_Conexion = 0; 
        $this->Id_Usuario = 0; 
        $this->Id_Empresa = 0; 
        $this->Id_Tienda = 0; 
        $this->Id_Caja = 0; 
        $this->Cod_Caja = ""; 
        $this->Des_Peril = ""; 
        $this->Dias_Accecibles = ""; 
        $this->Hora_Inicio = ""; 
        $this->Hora_Fin = ""; 
        $this->Des_UsuarioTienda = ""; 
        $this->Cod_HashTienda = ""; 
        $this->Nom_Usuario = ""; 
        $this->Obj_Carrito = new ENCarrito();
        $this->Obj_Facturacion = new ENObjFacturacion(); 
        $this->Obj_Data_Aux = [];
        $this->Obj_AutenticacionService = new ENAutenticacionService();
        $this->ListPermisos = [];
        $this->List_Menu_Permitidos = [];
    }
}

class CENRptSesion extends MyEntity
{
    private $datasesion;
    public $redireccion_url;

    public function __construct(CENSesion $p_datasesion,string $p_redireccion_url)
    {
        $this->datasesion = $p_datasesion;
        $this->redireccion_url = $p_redireccion_url;
    }

    public function get_Datasesion():array
    {
        return (array)$this->datasesion;
    }
}
?>