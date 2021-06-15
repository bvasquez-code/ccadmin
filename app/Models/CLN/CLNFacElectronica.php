<?php namespace App\Models\CLN;

use CodeIgniter\Model;

use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENRequestService as ENRequestService;
use App\Models\CEN\CENDataService as ENDataService;
use App\Models\CEN\CENObjFacturacion as ENObjFacturacion;
use App\Models\CEN\CENParsistema as ENParsistema;
use App\Models\CEN\CENAutenticacionService as ENAutenticacionService;
use App\Models\CEN\CENFacElectronica as ENFacElectronica;
use App\Models\CEN\CENResultBusqueda as ENResultBusqueda;
use App\Models\CEN\CENLogSunat as ENLogSunat;

use App\Models\CLN\CLNGenerico as LNGenerico;

use App\Models\CAD\CADFacElectronica as ADFacElectronica;

use App\Models\CSE\CSEOrquestador as SEOrquestador;


class CLNFacElectronica extends Model
{

    public function __construct()
    {

    }

    public function Render_Index(ENAutenticacionService $p_Obj_Aut):ENResponse
    {
        $l_FrontEnd = [];
        $l_Rpt = new ENResponse();
        $l_LNGenerico = new LNGenerico();
        $l_List_Tienda = []; //Lista de tiendas
        $l_List_Documentos_Sunat = [];

        $l_Rpt = $l_LNGenerico->Get_List_Tienda($p_Obj_Aut->Id_Tienda,$p_Obj_Aut->Id_Usuario);
        $l_List_Tienda = json_decode(json_encode($l_Rpt->Resultado), true);

        $l_List_Documentos_Sunat = $l_LNGenerico->Get_List_Documento_Sunat();
        $l_List_Documentos_Sunat = json_decode(json_encode($l_List_Documentos_Sunat), true);

        $l_FrontEnd = [
            "v_List_Tienda" => $l_List_Tienda,
            "v_List_Documentos_Sunat" => $l_List_Documentos_Sunat
        ];

        $l_Rpt->Resultado = $l_FrontEnd;

        return $l_Rpt;
    }

    public function Get_Documentos_Aceptados_Sunat()
    {

    }


    public function Enviar_Factura_Sunat_Individual(
         int $p_Tip_Documento       //Tipo de documento | 1 : BOLETA | 2 : FACTURA 
        ,int $p_Id_Iftrx            //Id de la info transaccion | Id_Ifven | Id_Ifnot
        ,int $p_Id_Trx              //Id de la transaccion | Id_Trven
        ,ENAutenticacionService $p_Obj_Aut
    ):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_Rpt_Sunat = new ENResponse();
        $l_Obj_Sunat = new ENFacElectronica();
        $l_ADFacElectronica = new ADFacElectronica();
        $l_SEOrquestador = new SEOrquestador();

        $l_Rpt->Resultado = $this->Get_Validar_Facturacion_Activa();
        if($l_Rpt->Error->flagerror) return $l_Rpt;

        $l_Rpt->Resultado = $this->Get_Validacion_Procesado_Sunat($p_Tip_Documento,$p_Id_Iftrx);
        if($l_Rpt->Error->flagerror) return $l_Rpt;

        $l_Obj_Sunat = $l_ADFacElectronica->Get_Data_Facturacion($p_Id_Trx,$p_Tip_Documento,$p_Obj_Aut->Id_Tienda,$p_Obj_Aut->Id_Empresa);

        $l_Rpt_Sunat = $l_SEOrquestador->Ejecutar_17_ws_wa_FacturacionElectronica($l_Obj_Sunat,$p_Obj_Aut);

        $l_Rpt = $this->Update_Log_Sunat($p_Tip_Documento,$p_Id_Iftrx,$l_Rpt_Sunat,$p_Obj_Aut);

        return $l_Rpt_Sunat;
    }

    public function Get_Validacion_Procesado_Sunat(
        int $p_Tip_Documento
        ,int $p_Id_Iftrx 
    ):ENResponse
    {
        $l_Rpt = new ENResponse();
        return $l_Rpt;
    }

    public function Get_Validar_Facturacion_Activa():ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_Obj_Val_Facturacion = new ENParsistema(); //Objeto de validaciones de facturacion
        $l_LNGenerico = new LNGenerico();
        $l_Setting_Billing_Electronics = 33;
        $l_Setting_Billing_Electronics_Estado = 1;

        $l_Obj_Val_Facturacion = $l_LNGenerico->Get_Parametros_Sistema(
            $l_Setting_Billing_Electronics,$l_Setting_Billing_Electronics_Estado)->Resultado[0];

        if($l_Obj_Val_Facturacion->Flg_ParSis_Bo1)
        {
            $l_Rpt->Error->flagerror = true;
            $l_Rpt->Error->messages = "FACTURACIÓN ELECTRONICA INACTIVA NO SE INTENTARA ENVIAR";
        }

        return $l_Rpt;
    }

    public function Get_List_Log_Sunat(
        ENDataService $p_Request
    ):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_ResultBusqueda = new ENResultBusqueda();
        $l_ADFacElectronica = new ADFacElectronica();
        $l_LNGenerico = new LNGenerico();
        $l_Tip_Doc_Trx = 0;      
        $l_Id_Tienda = 0;    
        $l_Flg_Enviado = false;

        $l_Tip_Doc_Trx = (int)$p_Request->Busqueda["Tip_Doc_Trx"];
        $l_Id_Tienda = (int)$p_Request->Busqueda["Id_Tienda"];  
        $l_Flg_Enviado = (bool)$p_Request->Busqueda["Flg_Enviado"];

        $p_Request->Paginacion = $l_LNGenerico->Get_Valor_Intervalo($p_Request->Paginacion);

        $l_ResultBusqueda = $l_ADFacElectronica->Get_List_Log_Sunat(
            $l_Tip_Doc_Trx
            ,$l_Id_Tienda
            ,$l_Flg_Enviado
            ,$p_Request->Paginacion->Num_RegistroIni
            ,$p_Request->Paginacion->Num_Intervalo
        );

        $l_ResultBusqueda = $l_LNGenerico->Calcular_Datos_Paginacion(
            $l_ResultBusqueda
            ,$p_Request->Paginacion->Num_Seccion
            ,$p_Request->Paginacion->Num_RegistroIni
            ,$p_Request->Paginacion->Num_Intervalo
        );

        $l_Rpt->Resultado = $l_ResultBusqueda;

        return $l_Rpt;
    }

   public function Update_Log_Sunat(
         int $p_Tip_Documento           //Tipo de documento | 1 : BOLETA | 2 : FACTURA 
        ,int $p_Id_Iftrx                //Id de la info transaccion | Id_Ifven | Id_Ifnot
        ,ENResponse $p_Rpt_Sunat        //Objeto respuesta de sunat
        ,ENAutenticacionService $p_Obj_Aut
    ):ENResponse
   {
        $l_Rpt = new ENResponse();
        $l_ADFacElectronica = new ADFacElectronica();
        $l_LogSunat = new ENLogSunat();
        $l_Fec_Servidor = date("Y-m-d H:i:s");

        $l_LogSunat->Id_InfoTransaccion = $p_Id_Iftrx;
        $l_LogSunat->Tip_Documento = $p_Tip_Documento;

        if( $p_Rpt_Sunat->Error->flagerror == true || $p_Rpt_Sunat->Resultado == null )
        {
            $l_LogSunat->Flg_EstadoSunat = 2; //No se pudo enviar a sunar
            $l_LogSunat->Jsn_ObjObservacion = [ $p_Rpt_Sunat->Error->messages ];
            $l_LogSunat->Fec_Rechazo = $l_Fec_Servidor;
        }
        else
        {
            $l_LogSunat->Flg_EstadoSunat = 1; //Se pudo enviar a sunat
            $l_LogSunat->Xml_ContenidoCdr = $p_Rpt_Sunat->Resultado["XML_Cdr"];
            $l_LogSunat->Des_NombreCdr = $p_Rpt_Sunat->Resultado["Des_Nom_Arch_CDR"];
            $l_LogSunat->Des_NombreXml = $p_Rpt_Sunat->Resultado["Des_Nom_XML"];
            $l_LogSunat->Fec_Envio = $l_Fec_Servidor;

            if( (bool)$p_Rpt_Sunat->Resultado["Flg_Observaciones"] )
            {
                $l_LogSunat->Flg_Observacion = true;
                $l_LogSunat->Jsn_ObjObservacion = $p_Rpt_Sunat->Resultado["List_Observaciones"];
            }
            else
            {
                $l_LogSunat->Flg_Observacion = false;
            }
        }

        $l_Rpt = $l_ADFacElectronica->Update_Log_Sunat($l_LogSunat,$p_Obj_Aut->Id_Tienda,$p_Obj_Aut->Id_Usuario);

        return $l_Rpt;
        
   }
}
?>