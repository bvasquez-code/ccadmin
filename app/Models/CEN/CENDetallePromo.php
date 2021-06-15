<?php namespace App\Models\CEN;

use CodeIgniter\MyEntity;

class CENDetallePromo extends MyEntity
{
    public $Id_DetallePromo = 0;
    public $Id_Producto = 0;
    public $Num_Cantidad = 0;
    public $Num_DescAplicable = 0.0;
    public $Num_DescIndividual = 0.0;
    public $Num_DescPorcentaje = 0.0;
    public $Cod_Producto = "";
    public $Des_Producto = "";
    public $Num_Precio = 0.0;
    public $Des_Descuento = "";
    public $Des_Detalle = "";

    public function __construct()
    {
        $this->Id_DetallePromo = 0;
        $this->Id_Producto = 0;
        $this->Num_Cantidad = 0;
        $this->Num_DescAplicable = 0.0;
        $this->Num_DescIndividual = 0.0;
        $this->Num_DescPorcentaje = 0.0;
        $this->Cod_Producto = "";
        $this->Des_Producto = "";
        $this->Num_Precio = 0.0;
        $this->Des_Descuento = "";
    }

}

?>