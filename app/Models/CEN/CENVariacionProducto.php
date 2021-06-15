<?php namespace App\Models\CEN;

use CodeIgniter\MyEntity;

class CENVariacionProducto extends MyEntity
{
    public int $Id_Variacion = 0;       //Id de la varicion
    public string $Des_Variacion = "";  //Nombre de la variacion
    public float $Num_Stock_Actual = 0.0;   //Stock disponible
    public int $Num_Cantidad = 0;       //Numero de productos seleccionados

    public function __construct()
    {
        $this->Id_Variacion = 0;
        $this->Des_Variacion = "";
        $this->Num_Stock_Actual = 0.0;
        $this->Num_Cantidad = 0;
    }

}

?>