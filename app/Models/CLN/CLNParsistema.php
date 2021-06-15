<?php namespace App\Models\CLN;

use CodeIgniter\Model;

use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENError as ENError;
use App\Models\CEN\CENConfigsistema as ENConfigsistema;
use App\Models\CEN\CENDesconfigsistema as ENDesconfigsistema;
use App\Models\CEN\CENParsistema as ENParsistema;

use App\Models\CAD\CADParsistema as ADParsistema;
use App\Models\CAD\CADConfigsistema as ADConfigsistema;


class CLNParsistema extends Model
{
    public $ADParsistema = null;
    public $ADConfigsistema = null;
    public $LNGenerico = null;

    public function __construct()
    {
        $this->ADParsistema = new ADParsistema();
        $this->ADConfigsistema = new ADConfigsistema();
    }

    public function Get_Config_Parametros_Sistema(ENConfigsistema $request,bool $Flg_TraerDescripcion=false)
    {
        $ENResponse = new ENResponse();
        $ENError = new ENError();

        if( $request->Num_Pagina == 0 )
        {
            $request->Num_RegistroIni = 0;
            $request->Num_Intervalo = 0;
        }else
        {
            $request->Num_Intervalo = (int)$this->ADConfigsistema->Get_Parametros_Sistema_string(G_const_par_LimBusqueda,1,10,NULL);
            $request->Num_RegistroIni = $request->Num_Intervalo * ($request->Num_Pagina-1);            
        }

        $ENResponse->Resultado = $this->ADParsistema->Get_Config_Parametros_Sistema($request,$Flg_TraerDescripcion);
        $ENResponse->Error = $ENError;      

        return $ENResponse;
    }

    public function Set_Config_Parametros_Sistema(ENConfigsistema $request)
    {
        $l_ResultDt = null;
        $ENResponse = new ENResponse;
        $ENError = new ENError;

        $l_ResultDt = $this->ADParsistema->Set_Config_Parametros_Sistema($request);

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

    public function Get_Descripcion_Parametros_Sistema(int $p_Cod_Sistema)
    {
        $ENResponse = new ENResponse;
        $ENError = new ENError;
        $ENResponse->Resultado = $this->ADParsistema->Get_Descripcion_Parametros_Sistema($p_Cod_Sistema);
        $ENResponse->Error = $ENError;
        return $ENResponse; 
    }

    public function Get_Parametros_Sistema(int $p_Cod_Sistema,int $p_Cod_ParaSistem)
    {
        $ENResponse = new ENResponse;
        $ENError = new ENError;
        $ENResponse->Resultado = $this->ADParsistema->Get_Parametros_Sistema($p_Cod_Sistema,$p_Cod_ParaSistem);
        $ENResponse->Error = $ENError;
        return $ENResponse; 
    }

    public function Update_Tbl_Generico(int $p_Tip_Accion,int $p_Cod_ParSis,int $p_Id_Prikey,int $p_Id_Usuamodi)
    {
        $l_ResultDt = null;
        $l_Rpt = new ENResponse;

        $l_ResultDt = $this->ADParsistema->Update_Tbl_Generico($p_Tip_Accion,$p_Cod_ParSis,$p_Id_Prikey,$p_Id_Usuamodi);

        if($l_ResultDt!=null && count($l_ResultDt)>0)
        {
            if( (int)$l_ResultDt[0]["Code"] == 1 )
            {
                $l_Rpt->Resultado = (int)$l_ResultDt[0]["Id"];
            }else
            {
                $l_Rpt->Error->Fail((int)$l_ResultDt[0]["Code"],1,$l_ResultDt[0]["Message"]);
                $l_Rpt->Resultado = false;
            }
        }else
        {
            $l_Rpt->Error->Fail(500,500,"RESPUESTA DE BASE DE DATOS LLEGO VACIO.");
        }

        return $l_Rpt;                
    }
    
    public function Set_Parametros_Sistema(ENParsistema $request)
    {
        $l_ResultDt = null;
        $ENResponse = new ENResponse;
        $ENError = new ENError;

        $l_ResultDt = $this->ADParsistema->Set_Parametros_Sistema($request);

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

}
?>