<?php namespace App\Models\CEN;

use CodeIgniter\MyEntity;

use App\Models\CEN\CENVariacionProducto as ENVariacionProducto;

class CENItemproducto extends MyEntity
{
    public $Id_Producto = 0;
    public $Cod_Producto = "";
    public $Des_Producto = "";
    public $Des_Producto_text = "";
    public $Num_Precio = 0;		        //Precio individual del producto
    public $Des_Precio = "";		    //Precio individual del producto
    public $Num_Interes = 0;		    //Interes individual del producto
    public $Des_Interes = 0;		    //Descripción interes individual
    public $Num_Descuento = 0;		    //Descuento individual del producto
    public $Des_Descuento = "";		    //Descuento individual del producto
    public $Flg_Descuento = false;      //Flag permite descuento
    public $Num_DescPermitido = 0;		//Descuento permitido
    public $Num_DescuentoTotal = 0;		//Descuento total
    public $Des_DescuentoTotal = "";	//Descripcion del descuento total
    public $Num_PreVenta = 0;		    //Precio venta
    public $Num_Cantidad = 0;		    //Cantidad de productos
    public $Num_MontoTotal = 0;  	    //Total por el producto
    public $Des_MontoTotal = "";  	    //Total por el producto
    public $Des_Moneda_Avr = "";        //Abreviatura de moneda base
    public $Num_Stock_Disp = 0;         //Numero de stock disponible
    public $Flg_Promocion = false;      //Inidica si el producto esta con una promocion
    public $Id_Promocion = 0;           //Id de la promocion a la que esta aplicando
    public $List_Variaciones = [];      //Lista de variaciones del producto
    
    public function __construct()
    {
        $this->Id_Producto = 0;
        $this->Cod_Producto = "";
        $this->Des_Producto = "";
        $this->Des_Producto_text = "";
        $this->Num_Precio = 0;		        //Precio individual del producto
        $this->Des_Precio = "";		    //Precio individual del producto
        $this->Num_Interes = 0;		    //Interes individual del producto
        $this->Des_Interes = 0;		    //Descripción interes individual
        $this->Num_Descuento = 0;		    //Descuento individual del producto
        $this->Des_Descuento = "";		    //Descuento individual del producto
        $this->Flg_Descuento = false;      //Flag permite descuento
        $this->Num_DescPermitido = 0;		//Descuento permitido
        $this->Num_DescuentoTotal = 0;		//Descuento total
        $this->Des_DescuentoTotal = "";	//Descripcion del descuento total
        $this->Num_PreVenta = 0;		    //Precio venta
        $this->Num_Cantidad = 0;		    //Cantidad de productos
        $this->Num_MontoTotal = 0;  	    //Total por el producto
        $this->Des_MontoTotal = "";  	    //Total por el producto
        $this->Des_Moneda_Avr = "";        //Abreviatura de moneda base
        $this->Num_Stock_Disp = 0;         //Numero de stock disponible
        $this->Flg_Promocion = false;      //Inidica si el producto esta con una promocion
        $this->Id_Promocion = 0;           //Id de la promocion a la que esta aplicando
        $this->List_Variaciones = $this->NewList("List_Variaciones",new ENVariacionProducto());
    }


}

?>