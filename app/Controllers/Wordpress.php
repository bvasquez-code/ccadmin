<?php namespace App\Controllers;

use Throwable;
use App\Models\CEN\CENResponse as ENResponse;

use App\Models\CLN\CLNWordpress as LNWordpress;

class Wordpress extends BaseController
{

    public function __construct()
    {

    }

   public function Exportar_Productos_Wordpress()
   {
        $l_LNWordpress = new LNWordpress();
        $l_Rpt = new ENResponse();
        $l_FrontEnd = [];
        try
        {
            $l_Rpt = $l_LNWordpress->Exportar_Productos_Wordpress($this->session->get("Obj_AutenticacionService"));
        }
        catch(Throwable $ex)
        {
            $l_Rpt->Error->Fail(500,500,$ex->getMessage());
        }

        return json_encode($l_Rpt);

   }

}
?>    