<?php namespace App\Models\CEN;

use CodeIgniter\MyEntity;

use App\Models\CEN\CENCliente as ENCliente;
use App\Models\CEN\CENVariacionProducto as ENVariacionProducto;

class CENAccionesCarrito extends MyEntity
{
    public $Id_Producto  = 0; 
    public $Cod_Accion = "";
    public $Num_Descuento = 0;
    public $Num_Cantidad = 0;
    public $List_Variaciones = [];

    public $Flg_ForzarOperacion = false;

    
    public $Cliente = [];
    public $Id_Cliente = 0;
    public $Tip_DocCliente = 0;
    public $Cod_DocCliente = "";
    public $Des_NomCliente = "";
    public $Des_ApeClientePat = "";
    public $Des_ApeClienteMat = "";
    public $Tip_Pago = 0;
    public $Tip_MedioPago = 0;
    public $Des_Comentario = "";   
    
    public function __construct()
    {
        $this->Id_Producto  = 0; 
        $this->Cod_Accion = "";
        $this->Num_Descuento = 0;
        $this->Num_Cantidad = 0;
        $this->List_Variaciones = $this->NewList("List_Variaciones",new ENVariacionProducto());

        $this->Flg_ForzarOperacion = false;
        
        $this->Cliente = new ENCliente();
        $this->Id_Cliente = 0;
        $this->Tip_DocCliente = 0;
        $this->Cod_DocCliente = "";
        $this->Des_NomCliente = "";
        $this->Des_ApeClientePat = "";
        $this->Des_ApeClienteMat = "";
        $this->Tip_Pago = 0;
        $this->Tip_MedioPago = 0;
        $this->Des_Comentario = ""; 
    }


}

?>                