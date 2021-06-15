<?php namespace App\Models\CEN;

use CodeIgniter\MyEntity;

use App\Models\CEN\CENEmisorFE as ENEmisor;
use App\Models\CEN\CENClienteFE as ENCliente;
use App\Models\CEN\CENComprobanteFE as ENComprobante;
use App\Models\CEN\CENDetallecomprobanteFE as ENDetallecomprobante;


class CENFacElectronica extends MyEntity
{   
    public $Obj_Emisor = [];
    public $Obj_Cliente = [];
    public $Obj_Comprobante = [];

    public function __construct()
    {
        $this->Obj_Emisor = new ENEmisor();
        $this->Obj_Cliente = new ENCliente();
        $this->Obj_Comprobante = new ENComprobante();
    }
}

class CENEmisorFE extends MyEntity
{   
    public $Tip_doc             = "";
    public $Cod_ruc             = "";
    public $Des_razon_social    = "";
    public $Des_nom_comercial   = "";
    public $Des_direccion       = "";
    public $Des_Pais            = "";
    public $Des_departamento    = "";
    public $Des_provincia       = "";
    public $Des_distrito        = "";
    public $Cod_ubigeo          = "";
    public $Des_usuario_sol     = "";
    public $Des_clave_sol       = "";

    public function __construct()
    {
        $this->Tip_doc             = "";
        $this->Cod_ruc             = "";
        $this->Des_razon_social    = "";
        $this->Des_nom_comercial   = "";
        $this->Des_direccion       = "";
        $this->Des_Pais            = "";
        $this->Des_departamento    = "";
        $this->Des_provincia       = "";
        $this->Des_distrito        = "";
        $this->Cod_ubigeo          = "";
        $this->Des_usuario_sol     = "";
        $this->Des_clave_sol       = "";
    }
}

class CENClienteFE extends MyEntity
{   
    public $Tip_doc             = "";
    public $Cod_ruc             = "";
    public $Des_razon_social    = "";
    public $Des_nom_comercial   = "";
    public $Des_direccion       = "";
    public $Des_Pais            = "";
    public $Des_departamento    = "";
    public $Des_provincia       = "";
    public $Des_distrito        = "";
    public $Cod_ubigeo          = "";

    public function __construct()
    {
        $this->Tip_doc             = "";
        $this->Cod_ruc             = "";
        $this->Des_razon_social    = "";
        $this->Des_nom_comercial   = "";
        $this->Des_direccion       = "";
        $this->Des_Pais            = "";
        $this->Des_departamento    = "";
        $this->Des_provincia       = "";
        $this->Des_distrito        = "";
        $this->Cod_ubigeo          = "";
    }
}

class CENComprobanteFE extends MyEntity
{   
    public $Tip_doc             = "";
    public $Cod_serie           = "";
    public $Num_correlativo     = "";
    public $Fec_emision         = "";
    public $Num_igv             = 0.0;
    public $Num_total           = 0.0;
    public $Des_total_letras    = "";
    public $Des_moneda          = "";
    public $Cod_afectacion =  "";
    public $Des_afectacion =  "";
    public $Tip_afectacion =  "";

    public $List_Detalle = [];

    public function __construct()
    {
        $this->Tip_doc             = "";
        $this->Cod_serie           = "";
        $this->Num_correlativo     = "";
        $this->Fec_emision         = "";
        $this->Num_igv             = 0.0;
        $this->Num_total           = 0.0;
        $this->Des_total_letras    = "";
        $this->Des_moneda          = "";
        $this->Cod_afectacion =  "";
        $this->Des_afectacion =  "";
        $this->Tip_afectacion =  "";

        $this->List_Detalle = $this->NewList("List_Detalle",new ENDetallecomprobante());
    }

}

class CENDetallecomprobanteFE extends MyEntity
{   
    public $Num_item 				= 0;
    public $Cod_producto			= "";
    public $Des_producto		    = "";
    public $Num_cantidad			= 0;
    public $Num_valor_unitario	    = 0.0;
    public $Num_precio_unitario	    = 0.0;
    public $Tip_precio		        = "";
    public $Num_igv				    = 0.0;
    public $Num_porcentaje_igv	    = 0.0;
    public $Num_valor_total		    = 0.0;
    public $Num_importe_total		= 0.0;
    public $Des_unidad			    = "";
    public $Cod_afectacion	        = "";
    public $Des_afectacion	        = "";
    public $Tip_afectacion	        = "";
    public $Cod_alt_afectacion      = 0;	

    public function __construct()
    {
        $this->Num_item 				= 0;
        $this->Cod_producto			= "";
        $this->Des_producto		    = "";
        $this->Num_cantidad			= 0;
        $this->Num_valor_unitario	    = 0.0;
        $this->Num_precio_unitario	    = 0.0;
        $this->Tip_precio		        = "";
        $this->Num_igv				    = 0.0;
        $this->Num_porcentaje_igv	    = 0.0;
        $this->Num_valor_total		    = 0.0;
        $this->Num_importe_total		= 0.0;
        $this->Des_unidad			    = "";
        $this->Cod_afectacion	        = "";
        $this->Des_afectacion	        = "";
        $this->Tip_afectacion	        = "";
        $this->Cod_alt_afectacion        = 0;	
    }

}


?>