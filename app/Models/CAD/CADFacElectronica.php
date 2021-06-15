<?php namespace App\Models\CAD;

use CodeIgniter\Model;

use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENFacElectronica as ENFacElectronica;
use App\Models\CEN\CENDetallecomprobanteFE as ENDetallecomprobanteFE;
use App\Models\CEN\CENResultBusqueda as ENResultBusqueda;
use App\Models\CEN\CENLogSunat as ENLogSunat;


class CADFacElectronica extends Model
{
    public $db = null;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function Get_Data_Facturacion(
         int $p_Id_Trx          //Id de la Transaccion origen
        ,int $p_Tip_Doc_Trx     //Tipo de documento de la transaccion
        ,int $p_Id_Tienda       //Id tienda
        ,int $p_Id_Empresa      //Id Empresa
    ):ENFacElectronica
    {
        $l_Obj_Sunat = new ENFacElectronica();
        $l_Obj_Detalle = [];
        $l_ResultDt = null;
        $l_query = null;
        $l_StoreProcedure = "";
        $l_ListParametros = [];
        $l_ObjetoQuery = [];
        $l_Num_Cont = 0;

        $l_StoreProcedure = "sp_cixmart_get_info_venta_sunat";

        array_push($l_ListParametros,["p_Id_Trx",$p_Id_Trx]);
        array_push($l_ListParametros,["p_Tip_Doc",$p_Tip_Doc_Trx]);
        array_push($l_ListParametros,["p_Id_Tie",$p_Id_Tienda]);          
        array_push($l_ListParametros,["p_Id_Emp",$p_Id_Empresa]);          


        $l_ObjetoQuery = CrearEstructuraSP($l_StoreProcedure,$l_ListParametros);

        $l_query = $this->db->query($l_ObjetoQuery["store"],$l_ObjetoQuery["parametros"]);

        if($l_query)
        {
            $l_ResultDt =  $l_query->getResultArray();
            
            if($l_ResultDt)
            {

                $l_Obj_Sunat->Obj_Emisor->Tip_doc             =  trim($l_ResultDt[0]["Emi_Tip_Doc"]);
                $l_Obj_Sunat->Obj_Emisor->Cod_ruc             =  trim($l_ResultDt[0]["Emi_Cod_Ruc"]);
                $l_Obj_Sunat->Obj_Emisor->Des_razon_social    =  trim($l_ResultDt[0]["Emi_Des_Rzo"]);
                $l_Obj_Sunat->Obj_Emisor->Des_nom_comercial   =  trim($l_ResultDt[0]["Emi_Des_Nco"]);
                $l_Obj_Sunat->Obj_Emisor->Des_direccion       =  trim($l_ResultDt[0]["Emi_Des_Dir"]);
                $l_Obj_Sunat->Obj_Emisor->Des_Pais            =  trim($l_ResultDt[0]["Emi_Cod_Pais"]);
                $l_Obj_Sunat->Obj_Emisor->Des_departamento    =  trim($l_ResultDt[0]["Emi_Des_Dep"]);
                $l_Obj_Sunat->Obj_Emisor->Des_provincia       =  trim($l_ResultDt[0]["Emi_Des_Pro"]);
                $l_Obj_Sunat->Obj_Emisor->Des_distrito        =  trim($l_ResultDt[0]["Emi_Des_Dis"]);
                $l_Obj_Sunat->Obj_Emisor->Cod_ubigeo          =  trim($l_ResultDt[0]["Emi_Cod_Ubi"]);
                $l_Obj_Sunat->Obj_Emisor->Des_usuario_sol     =  "DDCOD";
                $l_Obj_Sunat->Obj_Emisor->Des_clave_sol       =  "DDCOD";

                $l_Obj_Sunat->Obj_Cliente->Tip_doc             = trim($l_ResultDt[0]["Cli_Tip_Doc"]);
                $l_Obj_Sunat->Obj_Cliente->Cod_ruc             = trim($l_ResultDt[0]["Cli_Cod_Doc"]);
                $l_Obj_Sunat->Obj_Cliente->Des_razon_social    = trim($l_ResultDt[0]["Cli_Des_Rzo"]);
                $l_Obj_Sunat->Obj_Cliente->Des_nom_comercial   = trim($l_ResultDt[0]["Cli_Des_Nco"]);
                $l_Obj_Sunat->Obj_Cliente->Des_direccion       = trim($l_ResultDt[0]["Cli_Des_Dir"]);
                $l_Obj_Sunat->Obj_Cliente->Des_Pais            = trim($l_ResultDt[0]["Cli_Cod_Pais"]);
                $l_Obj_Sunat->Obj_Cliente->Des_departamento    = trim($l_ResultDt[0]["Cli_Des_Dep"]);
                $l_Obj_Sunat->Obj_Cliente->Des_provincia       = trim($l_ResultDt[0]["Cli_Des_Pro"]);
                $l_Obj_Sunat->Obj_Cliente->Des_distrito        = trim($l_ResultDt[0]["Cli_Des_Dis"]);
                $l_Obj_Sunat->Obj_Cliente->Cod_ubigeo          = trim($l_ResultDt[0]["Cli_Cod_Ubi"]);

                $l_Obj_Sunat->Obj_Comprobante->Tip_doc          = trim($l_ResultDt[0]["Com_Tip_Doc"]);
                $l_Obj_Sunat->Obj_Comprobante->Cod_serie        = trim($l_ResultDt[0]["Com_Cod_Ser"]);
                $l_Obj_Sunat->Obj_Comprobante->Num_correlativo  = trim($l_ResultDt[0]["Com_Num_Cor"]);
                $l_Obj_Sunat->Obj_Comprobante->Fec_emision      = explode(" ", trim($l_ResultDt[0]["Com_Fec_Emi"]))[0];
                $l_Obj_Sunat->Obj_Comprobante->Num_igv          = (float)$l_ResultDt[0]["Com_Num_Igv"];
                $l_Obj_Sunat->Obj_Comprobante->Num_total        = (float)$l_ResultDt[0]["Com_Num_Tot"];
                $l_Obj_Sunat->Obj_Comprobante->Des_moneda       = trim($l_ResultDt[0]["Com_Cod_Mon"]);
                $l_Obj_Sunat->Obj_Comprobante->Cod_afectacion   = trim($l_ResultDt[0]["Com_Cod_Afe"]);
                $l_Obj_Sunat->Obj_Comprobante->Des_afectacion   = trim($l_ResultDt[0]["Com_Des_Afe"]);
                $l_Obj_Sunat->Obj_Comprobante->Tip_afectacion   = trim($l_ResultDt[0]["Com_Tip_Afe"]);

                foreach( $l_ResultDt as $Item )
                {
                    $l_Obj_Detalle = new ENDetallecomprobanteFE();
                    $l_Num_Cont++;

                    $l_Obj_Detalle->Num_item 				= $l_Num_Cont;
                    $l_Obj_Detalle->Cod_producto			= trim($Item["Det_Cod_Pro"]);
                    $l_Obj_Detalle->Des_producto		    = trim($Item["Det_Des_Pro"]);
                    $l_Obj_Detalle->Num_cantidad			= (float)$Item["Det_Num_Can"];
                    $l_Obj_Detalle->Num_valor_unitario	    = (float)$Item["Det_Num_Vuni"];
                    $l_Obj_Detalle->Num_precio_unitario	    = (float)$Item["Det_Num_Puni"];
                    $l_Obj_Detalle->Tip_precio		        = trim($Item["Det_Tip_Prec"]);
                    $l_Obj_Detalle->Num_igv				    = (float)$Item["Det_Num_Vigv"];
                    $l_Obj_Detalle->Num_porcentaje_igv	    = (float)$Item["Det_Num_Pigv"];
                    $l_Obj_Detalle->Num_valor_total		    = (float)$Item["Det_Num_Vtot"];
                    $l_Obj_Detalle->Num_importe_total		= (float)$Item["Det_Num_Mtot"];
                    $l_Obj_Detalle->Des_unidad			    = "NIU";
                    $l_Obj_Detalle->Cod_afectacion	        = trim($Item["Det_Cod_Afe"]);
                    $l_Obj_Detalle->Des_afectacion	        = trim($Item["Det_Des_Afe"]);
                    $l_Obj_Detalle->Tip_afectacion	        = trim($Item["Det_Tip_Afe"]);
                    $l_Obj_Detalle->Cod_alt_afectacion      = trim($Item["Det_Cod_Afal"]);	

                    array_push( $l_Obj_Sunat->Obj_Comprobante->List_Detalle , $l_Obj_Detalle );
                }

            }
        }
        return $l_Obj_Sunat;
    }

    public function Get_List_Log_Sunat(
         int $p_Tip_Doc_Trx         //Tipo documento de la transaccion
        ,int $p_Id_Tienda           //Id tienda
        ,bool $p_Flg_Enviado        //Flag enviado | 1 => 1 : si envio | 0 => 0 : sin enviar ,2 : fallido |
        ,int $p_Num_RegistroIni     //Registro inicio
        ,int $p_Num_Intervalo       //Registro fin
    ):ENResultBusqueda
    {
        $l_ResultDt = null;
        $l_query = null;
        $l_StoreProcedure = "";
        $l_ListParametros = [];
        $l_ObjetoQuery = [];
        $l_ResultBusqueda = new ENResultBusqueda();
        $l_List_Log_Sunat = [];
        $l_LogSunat = [];

        $l_StoreProcedure = "sp_ccadmin_get_lista_logsunat";

        array_push($l_ListParametros,["p_Tip_Doc",$p_Tip_Doc_Trx]);
        array_push($l_ListParametros,["p_Id_Tie",$p_Id_Tienda]);
        array_push($l_ListParametros,["p_Flg_Env",$p_Flg_Enviado]);          
        array_push($l_ListParametros,["p_Num_RegIni",$p_Num_RegistroIni]);
        array_push($l_ListParametros,["p_Num_Interv",$p_Num_Intervalo]);         


        $l_ObjetoQuery = CrearEstructuraSP($l_StoreProcedure,$l_ListParametros);

        $l_query = $this->db->query($l_ObjetoQuery["store"],$l_ObjetoQuery["parametros"]);

        if($l_query)
        {
            $l_ResultDt =  $l_query->getResultArray();
            
            if($l_ResultDt!=null && count($l_ResultDt)>0 && (int)$l_ResultDt[0]["Code"] == 1)
            {
                $l_ResultBusqueda->Num_TotalBus = (int)$l_ResultDt[0]["Num_TotalBus"];
                $l_ResultBusqueda->Num_TotalReg = (int)$l_ResultDt[0]["Num_TotalReg"];

                foreach( $l_ResultDt as $Item )
                {
                    $l_LogSunat = new ENLogSunat();
                    $l_LogSunat->Id_Log = (int)$Item["Id_Logfac"];
                    $l_LogSunat->Des_NombreCdr = (string)$Item["Des_Logfac_Nomcdr"];
                    $l_LogSunat->Tip_Documento = (int)$Item["Tip_Doctrx"];
                    $l_LogSunat->Id_Transaccion = (int)$Item["Id_Trx"];
                    $l_LogSunat->Id_InfoTransaccion = (int)$Item["Id_Iftrx"];
                    $l_LogSunat->Cod_Transaccion = (string)$Item["Cod_Trx"];
                    $l_LogSunat->Cod_Talonario = (string)$Item["Cod_Tal"];
                    $l_LogSunat->Flg_EnvioSunat = (int)$Item["Flg_Logfac_Snt"];
                    $l_LogSunat->Des_EnvioSunat = (string)$Item["Des_Logfac_Snt"];
                    $l_LogSunat->Flg_Observacion = (bool)$Item["Flg_Logfac_Obs"];
                    $l_LogSunat->Des_Observacion = (string)$Item["Des_Logfac_Obs"];
                    $l_LogSunat->Fec_Envio = (string)$Item["Fec_Logfac_Env"];
                    $l_LogSunat->Fec_Rechazo = (string)$Item["Fec_Logfac_Rch"];
                    array_push($l_List_Log_Sunat,$l_LogSunat);
                }

                $l_ResultBusqueda->List_Resultado = $l_List_Log_Sunat;
            }
        }

        return $l_ResultBusqueda;
    }

    /**
     * Actualiza los datos de la tabla de log sunat.
     *
     * Despues de intentar enviar a sunat
     *
     */

    public function Update_Log_Sunat(
         ENLogSunat $p_Log_Sunat //Objeto log Sunat
        ,int $p_Id_Tienda
        ,int $p_Id_Usuario
    ):ENResponse
   {
        $l_Rpt = new ENResponse();
        $l_ResultDt = null;
        $l_query = null;
        $l_StoreProcedure = "";
        $l_ListParametros = [];
        $l_ObjetoQuery = [];

        $l_StoreProcedure = "sp_ccadmin_update_logsunat";

        array_push($l_ListParametros,["p_Id_Iftrx",$p_Log_Sunat->Id_InfoTransaccion]);
        array_push($l_ListParametros,["p_Tip_Doc",$p_Log_Sunat->Tip_Documento]);
        array_push($l_ListParametros,["p_Des_Nomxml",$p_Log_Sunat->Des_NombreXml]);
        array_push($l_ListParametros,["p_Des_Nomcdr",$p_Log_Sunat->Des_NombreCdr]);
        array_push($l_ListParametros,["p_Flg_Snt",$p_Log_Sunat->Flg_EstadoSunat]);
        array_push($l_ListParametros,["p_Flg_Obs",$p_Log_Sunat->Flg_Observacion]);
        array_push($l_ListParametros,["p_Jsn_Obj",json_encode($p_Log_Sunat->Jsn_ObjObservacion)]);
        array_push($l_ListParametros,["p_Xml_Cdr",$p_Log_Sunat->Xml_ContenidoCdr]);
        array_push($l_ListParametros,["p_Fec_Env",$p_Log_Sunat->Fec_Envio]);
        array_push($l_ListParametros,["p_Fec_Rch",$p_Log_Sunat->Fec_Rechazo]);
        array_push($l_ListParametros,["p_Id_Tie",$p_Id_Tienda]);
        array_push($l_ListParametros,["p_Id_Usuamodi",$p_Id_Usuario]);
        
        $l_ObjetoQuery = CrearEstructuraSP($l_StoreProcedure,$l_ListParametros);

        $l_query = $this->db->query($l_ObjetoQuery["store"],$l_ObjetoQuery["parametros"]);

        if($l_query)
        {
            $l_ResultDt =  $l_query->getResultArray();

            if($l_ResultDt != null && count($l_ResultDt) > 0)
            {
                if((int)$l_ResultDt[0]["Code"] != 1)
                {
                    $l_Rpt->Error->flagerror = true;
                    $l_Rpt->Error->messages = "{" . $l_ResultDt[0]["Code"] ."} ".$l_ResultDt[0]["Message"];
                }
            }
        }
        return $l_Rpt;
   }
   

}
?>