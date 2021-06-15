<?php namespace App\Controllers;

use Throwable;
use App\Models\CEN\CENResponse as ENResponse;

use App\Models\CLN\CLNServices as LNServices;
// use \QRcode;

class Services extends BaseController
{

    public function __construct()
    {

    }

    public function Get_Code_qr()
    {
        $l_Rpt = new ENResponse();
        $l_LNServices = new LNServices();

        try
        {
            $l_Rpt = $l_LNServices->Get_Code_qr();
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }

        return json_encode($l_Rpt); 
    }

}
?>  