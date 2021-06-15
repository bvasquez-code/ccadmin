<?php namespace App\Models\CLN;

use CodeIgniter\Model;

use App\Models\CAD\CADPerfilusuario as ADPerfilusuario;
use App\Models\CEN\CENPerfil as ENPerfil;
use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENError as ENError;
use App\Models\CEN\CENObjetoWeb as ENObjetoWeb;
use App\Models\CEN\CENAutenticacionService as ENAutenticacionService;

class CLNPerfilusuario extends Model
{
    public $ADPerfilusuario = null;

    public function __construct()
    {
        $this->ADPerfilusuario = new ADPerfilusuario;
    }

    public function Get_Perfil_Usuario(ENPerfil $request)
    {
        $l_ResultDt = null;
        $ENObjetoWeb = new ENObjetoWeb;
        $ENResponse = new ENResponse;
        $ENError = new ENError;
        $Perfil = null;
        $ListPerfil = [];

        $request->Num_RegistroIni = 0;
        $request->Num_Intervalo = 10;

        $l_ResultDt = $this->ADPerfilusuario->Get_Perfil_Usuario($request);

        if($l_ResultDt!=null && count($l_ResultDt)>0)
        {
            if( (int)$l_ResultDt[0]["Code"] == 1 && (int)$l_ResultDt[0]["Num_TotalBus"]>0 )
            {
                foreach($l_ResultDt as $item)
                {
                    $Perfil = new ENPerfil;
                    $Perfil->Id_Perfil = $item["Id_Daprf"];
                    $Perfil->Id_Empresa = $item["Id_Daemp_FK"];
                    $Perfil->Des_Perfil = $item["Des_Daprf_Nom"];
                    $Perfil->Cod_KeyPerfil = $item["Cod_Daprf_Key"];
                    $Perfil->Flg_RestrinTienda = (bool)$item["Flg_Daprf_Rti"];
                    $Perfil->Flg_RestrinCaja= (bool)$item["Flg_Daprf_Rcj"];
                    $Perfil->Fec_Inicio = $item["Fec_Daprf_Hin"];
                    $Perfil->Fec_Final = $item["Fec_Daprf_Hfi"];
                    $Perfil->Des_DiasPermi = $item["Des_Daprf_Dia"];
                    array_push($ListPerfil,$Perfil);
                }
            }
            $ENResponse->Resultado = $ListPerfil;
            $ENResponse->Error = $ENError;
        }        

        return $ENResponse;
    }

    public function Set_Perfil_Usuario(ENPerfil $request)
    {
        $l_ResultDt = null;
        $ENResponse = new ENResponse;
        $ENError = new ENError;

        $l_ResultDt = $this->ADPerfilusuario->Set_Perfil_Usuario(
            $request
            ,$this->Crear_Lista_Permisos_Operacionales($request->List_Permisos_Operacionales)
            ,$this->Crear_Lista_Menu_Accesibles($request->List_Menu_Accesibles)
        );

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

    private function Crear_Lista_Permisos_Operacionales(array $p_List_Permisos_Operacionales):array
    {
        $l_List_Permisos_Operacionales = [];

        foreach( $p_List_Permisos_Operacionales as $Item )
        {
            array_push(
                $l_List_Permisos_Operacionales
                ,[ "Tip_Cfppo_Val" => $Item->Cod_Validacion ]
            );
        }

        return $l_List_Permisos_Operacionales;
    }
    private function Crear_Lista_Menu_Accesibles(array $p_List_Menu_Accesibles):array
    {
        $l_List_Menu_Accesibles = [];

        foreach( $p_List_Menu_Accesibles as $Item )
        {
            array_push(
                $l_List_Menu_Accesibles
                ,[ "Id_Cfmen" => $Item->Id_Menu ]
            );
        }

        return $l_List_Menu_Accesibles;
    }
    
    public function Get_Permisos_Perfil(int $p_Id_Perfil,ENAutenticacionService $p_Obj_Aut)
    {
        $l_Rpt = new ENResponse();

        $l_Rpt->Resultado = [ 
            "List_Permisos_Operativos" => $this->ADPerfilusuario->Get_Permisos_Operativos_Perfil($p_Id_Perfil,$p_Obj_Aut->Id_Empresa)
            ,"List_Menu_Accesibles" => $this->ADPerfilusuario->Get_List_Menu_Accesibles($p_Id_Perfil)
        ];

        return $l_Rpt;
    }

    /**
     * Retorna la lista de menus existente en el sistema
     * los retorna ordenados por nivel 1,2,3,n
     */
    public function Get_List_Menu():array
    {
        $l_Rpt = new ENResponse();
        $l_List_Menu_Principales_Final = [];
        $l_List_Menu_Principales = [];
        $l_List_Menu_Secundarios = [];
        $l_List_Menu_Terciarios = [];

        $l_List_Menu_Principales = $this->ADPerfilusuario->Get_List_Menu(0,false);

        foreach( $l_List_Menu_Principales as $Item )
        {
            array_push($l_List_Menu_Principales_Final,$Item);

            if( $Item->Flg_Redigirible === false )
            {
                $l_List_Menu_Secundarios = $this->ADPerfilusuario->Get_List_Menu($Item->Id_Menu,false);
                
                foreach( $l_List_Menu_Secundarios as $Item_2 )
                {
                    array_push($l_List_Menu_Principales_Final,$Item_2);

                    if( $Item_2->Flg_Redigirible === false )
                    {
                        $l_List_Menu_Terciarios = $this->ADPerfilusuario->Get_List_Menu($Item_2->Id_Menu,true);
                        foreach( $l_List_Menu_Terciarios as $Item_3 )
                        {
                            array_push($l_List_Menu_Principales_Final,$Item_3);
                        }
                    }
                }

                $l_List_Menu_Terciarios = $this->ADPerfilusuario->Get_List_Menu($Item->Id_Menu,true);

                foreach( $l_List_Menu_Terciarios as $Item_2 )
                {
                    array_push($l_List_Menu_Principales_Final,$Item_2);
                }
            }
        }

        return $l_List_Menu_Principales_Final;
    }


}
?>