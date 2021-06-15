<?php namespace App\Models\CEN;

use CodeIgniter\Entity;

use App\Models\CEN\CENDetallePromo as ENDetallePromo;

class CENPromocion extends Entity
{
    public $Id_Promocion = 0;
    public $Cod_Promocion = "";
    public $Tip_Promocion = 0;
    public $Des_Promocion = "";
    public $Flg_Automatica = false;
    public $Flg_Escalable = false;
    public $Fec_Inicio = "";
    public $Fec_Fin = "";
    public $List_Detalle = [];
    
    public function __construct()
    {
        $this->Id_Promocion = 0;
        $this->Cod_Promocion = "";
        $this->Tip_Promocion = 0;
        $this->Des_Promocion = "";
        $this->Flg_Automatica = false;
        $this->Flg_Escalable = false;
        $this->Fec_Inicio = "";
        $this->Fec_Fin = "";
        $this->List_Detalle = [];
    }

	public function Set($ObjetoEntrada=[]){

		foreach ($ObjetoEntrada as $key => $value) {

			if(is_object($this->{$key}))
			{
				$this->{$key}->Set($value);
			}
			else if(is_array($this->{$key}))
			{
				$this->SetListObject($key,$value);
			}
			else
			{
				$this->{$key} = $value;      
			}
		}

	}

    public function GetTipeList($key="")
    {
        if($key == "List_Detalle")
        {
            $ENobj = new ENDetallePromo();
            return $ENobj;
        }
    }

    public function SetListObject($key="",$value=[])
    {
        $l_SubLista = null;
        foreach($value as $item)
        {
            $l_SubLista = $this->GetTipeList($key);
            $l_SubLista->Set($item);
            array_push($this->{$key},$l_SubLista);
        }
    }
}

?>