<?php namespace App\Models\CLN;

use CodeIgniter\Model;

use App\Models\CAD\CADOpcionesmenu as ADOpcionesmenu;
use App\Models\CAD\CADConfigsistema as ADConfigsistema;
use App\Models\CEN\CENMenu as ENMenu;
use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENError as ENError;
use App\Models\CEN\CENResultBusqueda as ENResultBusqueda;

use App\Models\CLN\CLNGenerico as LNGenerico;

class CLNOpcionesmenu extends Model
{
    public $ADOpcionesmenu = null;
    public $ADConfigsistema = null;

    public function __construct()
    {
        $this->ADOpcionesmenu = new ADOpcionesmenu;
        $this->ADConfigsistema = new ADConfigsistema;
    }

    public function Get_Menu(ENMenu $request)
    {
        $ENResponse = new ENResponse;
        $ENError = new ENError;
        $Menu = null;
        $ListMenu = [];
        $l_ResultBusqueda = new ENResultBusqueda();
        $l_LNGenerico = new LNGenerico();

        if( $request->Num_Pagina == 0 )
        {
            $request->Num_RegistroIni = 0;
            $request->Num_Intervalo = 0;
        }else
        {
            $request->Num_Intervalo = (int)$this->ADConfigsistema->Get_Parametros_Sistema_string(G_const_par_LimBusqueda,1,10,null);
            $request->Num_RegistroIni = $request->Num_Intervalo * ($request->Num_Pagina-1);            
        }

        $l_ResultBusqueda = $this->ADOpcionesmenu->Get_Menu($request);

        $l_ResultBusqueda = $l_LNGenerico->Calcular_Datos_Paginacion($l_ResultBusqueda,$request->Num_Pagina,$request->Num_RegistroIni,$request->Num_Intervalo);

        $ENResponse->Resultado = $l_ResultBusqueda;
               
        return $ENResponse;
    }

    public function Set_Menu(ENMenu $request)
    {
        $l_ResultDt = null;
        $ENResponse = new ENResponse;
        $ENError = new ENError;

        $l_ResultDt = $this->ADOpcionesmenu->Set_Menu($request);

        if($l_ResultDt!=null && count($l_ResultDt)>0)
        {
            if( (int)$l_ResultDt[0]["Code"] == 1 )
            {
                $ENResponse->Resultado = (int)$l_ResultDt[0]["Id"];
                $ENResponse->Error = $ENError;
            }else
            {
                $ENError->Fail((int)$l_ResultDt[0]["Code"],1,$l_ResultDt[0]["Message"]);
                $ENResponse->Resultado = false;
                $ENResponse->Error = $ENError;
            }
        }else
        {
            $ENError->Fail(500,500,"RESPUESTA DE BASE DE DATOS LLEGO VACIO.");
            $ENResponse->Error = $ENError;
        }

        return $ENResponse;
    }
    
    public function Get_Niveles_Menu()
    {
        $l_Arr_SubDato = array(); //Sub dato del arrat
        $l_List_Niveles = array(); //Lista de respuesta
        $l_Num_LimiteNivel = 0; //Maximo nivel permitido

        $l_Num_LimiteNivel = (int)$this->ADConfigsistema->Get_Parametros_Sistema_string(G_const_par_NivelMenu,1,10);

        for($i=0;$i<$l_Num_LimiteNivel;$i++)
        {
            $l_Arr_SubDato["Id"] = $i + 1;
            $l_Arr_SubDato["DES"] = "NIVEL ".($i+1);

            array_push($l_List_Niveles,$l_Arr_SubDato);
        }
        return $l_List_Niveles;
    }

}
?>