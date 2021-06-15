<?php namespace App\Models\CEN;

use CodeIgniter\MyEntity;

use App\Models\CEN\CENItemproducto as ENItemproducto;
use App\Models\CEN\CENDetallePromo as ENDetallePromo;
use App\Models\CEN\CENCliente as ENCliente;

class CENCarrito extends MyEntity
{
    public $Flg_Cargado = false;
    public $Flg_EnProceso = false;
    public $Id_Venta = 0;               // Id transaccion de ventas
    public $Cod_Venta = "";		        // Cod Transaccion de ventas
    public $Tip_Documento = 0;		    // Tipo de documento de venta
    public $Tip_Monenda = 0;		    // Tipo de moneda de venta
    public $Num_ValorCambio = 0.0;		// Valor de cambio de la moneda
    public $Tip_Pago = 0;		        // Tipo Pago
    public $Tip_MedioPago = 0;          // Tipo de medio de pago
    public $Cod_Documento = "";		    // Cod de documento de venta
    public $Cod_Talonario = "";		    // Numero de talonario
    public $Num_SubTotalVenta = 0.0;		// Sub total de venta
    public $Num_Interes = 0.0;		    // Interes de venta
    public $Num_Descuento = 0.0;		    // Descuento de venta
    public $Num_Total = 0.0;		        // Total de venta
    public $Des_SubTotalVenta = "";		// Sub total de venta
    public $Des_Interes = "";		    // Interes de venta
    public $Des_Descuento = "";		    // Descuento de venta
    public $Des_Total = "";		        // Total de venta 	
    public $Des_Comentario = "";		// Comentario sobre la venta
    //DATOS DE CLIENTE
    public $Id_Cliente = 0;	            // Id del cliente
    public $Tip_DocCliente = 0;	        // Numero de documento del cliente
    public $Cod_DocCliente = "";	    // Numero de documento del cliente 
    public $Des_NomCliente = "";	    // Nombre del cliente
    public $Des_ApeClientePat = "";	    // Nombre del cliente
    public $Des_ApeClienteMat = "";	    // Nombre del cliente					
    public $Des_DirCliente = "";	    // Direccion del cliente
    public $Cliente = [];
    //FIN DATOS CLIENTE
    public $Flg_Credito = 0;            // Flag venta al credito
    public $List_Item_Pro = array();
    public $List_Promo = array();

    public function __construct()
    {
        $this->Flg_Cargado = false;
        $this->Flg_EnProceso = false;
        $this->Id_Venta = 0;               // Id transaccion de ventas
        $this->Cod_Venta = "";		        // Cod Transaccion de ventas
        $this->Tip_Documento = 0;		    // Tipo de documento de venta
        $this->Tip_Monenda = 0;		    // Tipo de moneda de venta
        $this->Num_ValorCambio = 0.0;		// Valor de cambio de la moneda
        $this->Tip_Pago = 0;		        // Tipo Pago
        $this->Tip_MedioPago = 0;          // Tipo de medio de pago
        $this->Cod_Documento = "";		    // Cod de documento de venta
        $this->Cod_Talonario = "";		    // Numero de talonario
        $this->Num_SubTotalVenta = 0.0;		// Sub total de venta
        $this->Num_Interes = 0.0;		    // Interes de venta
        $this->Num_Descuento = 0.0;		    // Descuento de venta
        $this->Num_Total = 0.0;		        // Total de venta
        $this->Des_SubTotalVenta = "";		// Sub total de venta
        $this->Des_Interes = "";		    // Interes de venta
        $this->Des_Descuento = "";		    // Descuento de venta
        $this->Des_Total = "";		        // Total de venta 	
        $this->Des_Comentario = "";		// Comentario sobre la venta
        //DATOS DE CLIENTE
        $this->Id_Cliente = 0;	            // Id del cliente
        $this->Tip_DocCliente = 0;	        // Numero de documento del cliente
        $this->Cod_DocCliente = "";	    // Numero de documento del cliente 
        $this->Des_NomCliente = "";	    // Nombre del cliente
        $this->Des_ApeClientePat = "";	    // Nombre del cliente
        $this->Des_ApeClienteMat = "";	    // Nombre del cliente					
        $this->Des_DirCliente = "";	    // Direccion del cliente
        $this->Cliente = new ENCliente();
        //FIN DATOS CLIENTE
        $this->Flg_Credito = 0;            // Flag venta al credito
        $this->List_Item_Pro = $this->NewList("List_Item_Pro",new ENItemproducto());
        $this->List_Promo = $this->NewList("List_Promo",new ENDetallePromo());
    }

}

?>