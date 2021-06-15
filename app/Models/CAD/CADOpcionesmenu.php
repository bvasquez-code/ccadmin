<?php namespace App\Models\CAD;

use CodeIgniter\Model;

use App\Models\CEN\CENMenu as ENMenu;
use App\Models\CEN\CENResultBusqueda as ENResultBusqueda;

class CADOpcionesmenu extends Model
{
    public $db = null;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function Get_Menu(ENMenu $request):ENResultBusqueda
    {
        $l_ResultDt = null;
        $l_query = null;
        $l_StoreProcedure = "";
        $l_ListParametros = [];
        $l_ObjetoQuery = [];
        $l_ResultBusqueda = new ENResultBusqueda();
        $l_Menu = null;
        $l_ListMenu = [];

        $l_StoreProcedure = "sp_cixmart_get_menu";
        array_push($l_ListParametros,["p_Id_Men",$request->Id_Menu]);
        array_push($l_ListParametros,["p_Id_Men_Pdr",$request->Id_MenuPadre]);
        array_push($l_ListParametros,["p_Des_Men_Nom",$request->Des_Menu]);
        array_push($l_ListParametros,["p_Num_Men_Niv",$request->Num_Nivel]);
        array_push($l_ListParametros,["p_Num_RegIni",$request->Num_RegistroIni]);
        array_push($l_ListParametros,["p_Num_Interv",$request->Num_Intervalo]);

        $l_ObjetoQuery = CrearEstructuraSP($l_StoreProcedure,$l_ListParametros);

        $l_query = $this->db->query($l_ObjetoQuery["store"],$l_ObjetoQuery["parametros"]);
        $l_ResultDt =  $l_query->getResultArray(); 

        if( $l_ResultDt )
        {
            $l_ResultBusqueda->Num_TotalBus = (int)$l_ResultDt[0]["Num_TotalBus"];
            $l_ResultBusqueda->Num_TotalReg = (int)$l_ResultDt[0]["Num_TotalReg"];

            foreach( $l_ResultDt as $item )
            {
                $l_Menu = new ENMenu;
                $l_Menu->Id_Menu = $item["Id_Cfmen"];
                $l_Menu->Id_MenuPadre = $item["Id_Cfmen_Pdr"];
                $l_Menu->Des_Menu = $item["Des_Cfmen_Nom"];
                $l_Menu->Des_UrlMenu = $item["Des_Cfmen_Url"];
                $l_Menu->Cod_KeyMenu = $item["Cod_Cfmen_Key"];
                $l_Menu->Flg_Redigirible = (bool)$item["Flg_Cfmen_Rdr"];
                $l_Menu->Num_Nivel = $item["Num_Cfmen_Niv"];
                $l_Menu->Fec_Modifica = $item["Fec_Modifica"];
                array_push($l_ListMenu,$l_Menu);
            }

            $l_ResultBusqueda->List_Resultado = $l_ListMenu;
        }

        return $l_ResultBusqueda;
    }

    public function Set_Menu(ENMenu $request)
    {
        $l_ResultDt = null;
        $l_query = null;
        $l_StoreProcedure = "";
        $l_ListParametros = [];
        $l_ObjetoQuery = [];

        $l_StoreProcedure = "sp_cixmart_set_menu";
        array_push($l_ListParametros,["p_Tip_Acc",$request->Tip_Accion]);
        array_push($l_ListParametros,["p_Id_Men",$request->Id_Menu]);
        array_push($l_ListParametros,["p_Id_Men_Pdr",$request->Id_MenuPadre]);
        array_push($l_ListParametros,["p_Des_Men_Nom",$request->Des_Menu]);
        array_push($l_ListParametros,["p_Des_Men_Url",$request->Des_UrlMenu]);
        array_push($l_ListParametros,["p_Cod_Men_Key",$request->Cod_KeyMenu]);
        array_push($l_ListParametros,["p_Flg_Men_Rdr",$request->Flg_Redigirible]);
        array_push($l_ListParametros,["p_Id_Usuamodi",$request->Id_Usuamodi]);
      

        $l_ObjetoQuery = CrearEstructuraSP($l_StoreProcedure,$l_ListParametros);

        $l_query = $this->db->query($l_ObjetoQuery["store"],$l_ObjetoQuery["parametros"]);

        if($l_query)
        {
            $l_ResultDt =  $l_query->getResultArray(); 
        }
        else
        {
            $l_ResultDt = null;
        }       

        return $l_ResultDt;       
    }


}

?>    