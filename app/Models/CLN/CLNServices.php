<?php namespace App\Models\CLN;

use CodeIgniter\Model;

use App\Models\CEN\CENResponse as ENResponse;

use App\Models\CLN\CLNGenerico as LNGenerico;
use App\Models\CSE\CSEOrquestador as SEOrquestador;
// use App\Libraries\Endroid\src\QrCode as QrCode;

class CLNServices extends Model
{

    public function __construct()
    {
        
    }

    public function Get_Code_qr()
    {
        $l_Rpt = new ENResponse();
        // $l_QrCode = new QrCode("lddalkfjlkafk");

        $l_Rpt->Resultado = "code_QR";

        return $l_Rpt;
    }

}
?>