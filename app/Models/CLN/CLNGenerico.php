<?php namespace App\Models\CLN;

use CodeIgniter\Model;

use App\Models\CEN\CENResponse as ENResponse;
use App\Models\CEN\CENFechaListado as ENFechaListado;
use App\Models\CEN\CENPaginacionService as ENPaginacionService;
use App\Models\CEN\CENParbusqueda as ENParbusqueda;
use App\Models\CEN\CENParsistema as ENParsistema;
use App\Models\CEN\CENMoneda as ENMoneda;
use App\Models\CEN\CENDocComercial as ENDocComercial;
use App\Models\CEN\CENAutenticacionService as ENAutenticacionService;
use App\Models\CEN\CENImpuesto as ENImpuesto;
use App\Models\CEN\CENValidacionPerfil as ENValidacionPerfil;
use App\Models\CEN\CENAlmacen as ENAlmacen;


use App\Models\CLN\CLNParsistema as LNParsistema;
use App\Models\CLN\CLNConfigsistema as LNConfigsistema;

use App\Models\CAD\CADConfigsistema as ADConfigsistema;
use App\Models\CAD\CADGenerico as ADGenerico;
use App\Models\CAD\CADSeguridad as ADSeguridad;

use App\Models\CEN\CENResultBusqueda as ENResultBusqueda;

class CLNGenerico extends Model
{
    private $g_Obj_Aut;

    public function __construct()
    {
    }

    public function Set_Obj_Aut(ENAutenticacionService $p_Obj_Aut):void
    {   
        $this->g_Obj_Aut = $p_Obj_Aut;
    }

    public function Get_Info_Paginador(int $p_Num_Intervalo,int $p_Num_Seccion)
    {
        $l_Paginador = new ENResultBusqueda();
        $l_Num_RegistroIni = 0;

        $l_Num_RegistroIni = $p_Num_Seccion * $p_Num_Intervalo - $p_Num_Intervalo;
        $l_Paginador->Num_RegistroIni = $l_Num_RegistroIni;
        $l_Paginador->Num_Intervalo = $p_Num_Intervalo;
        $l_Paginador->Num_Seccion = $p_Num_Seccion;

        if( $l_Paginador->Num_TotalBus > 0 )
        {
            if($l_Paginador->Num_TotalBus > ($l_Num_RegistroIni + $p_Num_Intervalo) )
            {
                $l_Paginador->Num_RegistroFin = $l_Num_RegistroIni + $p_Num_Intervalo;
            }
            else
            {
                $l_Paginador->Num_RegistroFin = $l_Paginador->Num_TotalBus;
            }
        }
        
        return $l_Paginador;
    }

    public function Get_Valor_Intervalo(ENPaginacionService $p_Paginador):ENPaginacionService
    {
        $l_ADConfigsistema =  new ADConfigsistema();
        $l_Tip_Num_Cfpsis_In1 = 10;

        $p_Paginador->Num_Intervalo = (int)$l_ADConfigsistema->Get_Parametros_Sistema_string(G_const_par_LimBusqueda,$p_Paginador->Tip_Listado,$l_Tip_Num_Cfpsis_In1);
        $p_Paginador->Num_RegistroIni = $p_Paginador->Num_Seccion * $p_Paginador->Num_Intervalo - $p_Paginador->Num_Intervalo;
        
        return $p_Paginador;
    }

    public function Calcular_Datos_Paginacion(ENResultBusqueda $p_ResultBusqueda,int $p_Num_Seccion,int $p_Num_RegistroIni,int $p_Num_Intervalo)
    {
        $p_ResultBusqueda->Num_RegistroIni = $p_Num_RegistroIni;
        $p_ResultBusqueda->Num_Intervalo = $p_Num_Intervalo;
        $p_ResultBusqueda->Num_Seccion = $p_Num_Seccion;

        if( $p_ResultBusqueda->Num_TotalBus > 0 )
        {
            if($p_ResultBusqueda->Num_TotalBus > ($p_Num_RegistroIni + $p_Num_Intervalo) )
            {
                $p_ResultBusqueda->Num_RegistroFin = $p_Num_RegistroIni + $p_Num_Intervalo;
            }
            else
            {
                $p_ResultBusqueda->Num_RegistroFin = $p_ResultBusqueda->Num_TotalBus;
            }
        }
        return $p_ResultBusqueda;
    }


    public function Get_Fechas_Filtrado(string $p_Key_Time):ENFechaListado
    {
        $l_FechaListado = new ENFechaListado();
        $l_Fec_Actual = getdate();
        $l_Fec_Dia_Ini = "";
        $l_Fec_Dia_Fin = "";
        
        $l_Num_Total_Dias = 0;
        $l_Num_Anio = (int)$l_Fec_Actual["year"];
        $l_Num_Mes = (int)$l_Fec_Actual["mon"];
        $l_Num_Dia = (int)$l_Fec_Actual["mday"];

        if ($p_Key_Time == "Day_Time")
        {            
            $l_Fec_Dia_Ini = $l_Num_Anio ."-".$this->Convert_Dia_String($l_Num_Mes) ."-".$this->Convert_Dia_String($l_Num_Dia);
            $l_Fec_Dia_Fin = $l_Num_Anio ."-".$this->Convert_Dia_String($l_Num_Mes) ."-".$this->Convert_Dia_String($l_Num_Dia);
        }
        if($p_Key_Time == "Week_Time")
        {

        }
        if($p_Key_Time == "Month_Time")
        {
            $l_Num_Total_Dias = cal_days_in_month(CAL_GREGORIAN,$l_Num_Mes, $l_Num_Anio);
            $l_Fec_Dia_Ini = $l_Num_Anio ."-".$this->Convert_Dia_String($l_Num_Mes) ."-"."01";
            $l_Fec_Dia_Fin = $l_Num_Anio ."-".$this->Convert_Dia_String($l_Num_Mes) ."-".$this->Convert_Dia_String($l_Num_Total_Dias);
        }
        if($p_Key_Time == "Year_Time")
        {
            $l_Num_Total_Dias = cal_days_in_month(CAL_GREGORIAN,12, $l_Num_Anio);
            $l_Fec_Dia_Ini = $l_Num_Anio ."-01-01";
            $l_Fec_Dia_Fin = $l_Num_Anio ."-". "12" ."-".$this->Convert_Dia_String($l_Num_Total_Dias);
        }

        $l_FechaListado->Fec_Dia_Ini = $l_Fec_Dia_Ini;
        $l_FechaListado->Fec_Dia_Fin = $l_Fec_Dia_Fin;

        return $l_FechaListado;
    }

    public function Convert_Dia_String(int $p_Num_Dia):string
    {
        $l_Num_Dia_String = "";

        if ( strlen((string)$p_Num_Dia) == 1 )
        {
            $l_Num_Dia_String  = "0" . (string)$p_Num_Dia;
        }else
        {
            $l_Num_Dia_String  = (string)$p_Num_Dia;
        }
        return $l_Num_Dia_String;
    }

    public function Establecer_Formato_Moneda(float $p_Num_Val,string $p_Des_Moneda_Avr = "PEN"):string
    {

        $l_Des_Numero_Moneda = "";

        $l_Des_Numero_Moneda = trim($p_Des_Moneda_Avr) ." ". number_format($p_Num_Val,2);

        return $l_Des_Numero_Moneda;
    }

    public function Get_Parametros_Sistema(int $p_Cod_Sistema,int $p_Cod_ParaSistem):ENResponse
    {
        $LNParsistema = new LNParsistema();
        return $LNParsistema->Get_Parametros_Sistema($p_Cod_Sistema,$p_Cod_ParaSistem); 
    }

    public function Get_Fecha_Sistema_String():string
    {
        $l_Fec_Actual = getdate();
        $l_Fec_String = "";

        $l_Num_Anio = (string)$l_Fec_Actual["year"];
        $l_Num_Mes = (string)$l_Fec_Actual["mon"];
        $l_Num_Dia = (string)$l_Fec_Actual["mday"];

        $l_Fec_String = $l_Num_Dia . $l_Num_Mes . $l_Num_Anio;

        return $l_Fec_String;
    }

    public function Get_Moneda_Base():ENMoneda
    {
        $l_Parbusqueda = new ENParbusqueda();
        $l_Parsistema = new ENParsistema();
        $l_Moneda = new ENMoneda();
        $l_List_Par_Busqueda = [];
        $l_List_Tip_Moneda = [];

        $l_LNConfigsistema = new LNConfigsistema();

        $l_Num_Pfij_Moneda = 7; // Prefijo para monedas

        $l_Parbusqueda = new ENParbusqueda();
        $l_Parbusqueda->key = "Flg_Cfpsis_Bo1"; //Este flag indica cual es la moneda base de sistema
        $l_Parbusqueda->Val = 1;
        array_push($l_List_Par_Busqueda,$l_Parbusqueda);

        $l_List_Tip_Moneda = $l_LNConfigsistema->Get_Parametros_Sistema_object($l_Num_Pfij_Moneda,0,"",$l_List_Par_Busqueda);
        
        if ( count ( $l_List_Tip_Moneda ) > 0 )
        {
            $l_Parsistema = $l_List_Tip_Moneda[0];
            $l_Moneda->Cod_Moneda = $l_Parsistema->Cod_ParSis;
            $l_Moneda->Des_Moneda = $l_Parsistema->Des_ParSis_Nom;  
            $l_Moneda->Des_Signo = $l_Parsistema->Des_ParSis_Tx1; 
            $l_Moneda->Des_Key = $l_Parsistema->Des_ParSis_Abr;
            $l_Moneda->Des_KeyConfig = $l_Parsistema->Des_ParSis_Tx2;
            $l_Moneda->Num_Cambio = 1;
            $l_Moneda->Flg_Base = true;  
        }

        return $l_Moneda;
    }

    public function Get_Otr_Moneda_Sistema(int $p_Tip_Moneda = 0):array
    {
        $l_Parbusqueda = new ENParbusqueda();
        $l_Moneda = null;
        $l_List_Par_Busqueda = [];
        $l_List_Tip_Moneda = [];
        $l_List_Otr_Moneda = [];

        $l_LNConfigsistema = new LNConfigsistema();

        $l_Num_Pfij_Moneda = 7; // Prefijo para monedas

        $l_Parbusqueda = new ENParbusqueda();
        $l_Parbusqueda->key = "Flg_Cfpsis_Bo2"; //Este flag indica cual es la moneda base de sistema
        $l_Parbusqueda->Val = 1;
        array_push($l_List_Par_Busqueda,$l_Parbusqueda);

        $l_List_Tip_Moneda = $l_LNConfigsistema->Get_Parametros_Sistema_object($l_Num_Pfij_Moneda,$p_Tip_Moneda,"",$l_List_Par_Busqueda);
        
        foreach($l_List_Tip_Moneda as $Item)
        {
            $l_Moneda = new ENMoneda();
            $l_Moneda->Cod_Moneda = $Item->Cod_ParSis;
            $l_Moneda->Des_Moneda = $Item->Des_ParSis_Nom;  
            $l_Moneda->Des_Signo = $Item->Des_ParSis_Tx1; 
            $l_Moneda->Des_Key = $Item->Des_ParSis_Abr;
            $l_Moneda->Des_KeyConfig = $Item->Des_ParSis_Tx2;
            $l_Moneda->Num_Cambio = (float)round($Item->Num_ParSis_Dc2,3);
            $l_Moneda->Flg_Base = (bool)$Item->Flg_ParSis_Bo1;
            
            array_push($l_List_Otr_Moneda,$l_Moneda);            
        }

        return $l_List_Otr_Moneda;
    }


    public function Get_List_Tienda(int $p_Id_Tienda,int $p_Id_Usuario,bool $p_Flg_Validar = true):ENResponse
    {
        $Rpt = new ENResponse();
        $l_ADGenerico = new ADGenerico();
        $l_ADSeguridad = new ADSeguridad();
        $l_4_manage_profile_all_store = 4; //PERFIL QUE PUEDE REALIZAR CARGA MASIVA DE STOCK EN CUALQUIER TIENDA

        if( $p_Flg_Validar )
        {
            $Rpt = $l_ADSeguridad->Get_Validacion_Perfil($p_Id_Usuario,$l_4_manage_profile_all_store);

            if(!$Rpt->Error->flagerror)
            {
                $p_Id_Tienda = 0;
            }
        }

        $Rpt->Resultado = $l_ADGenerico->Get_List_Tienda($p_Id_Tienda);

        return $Rpt;
    }

    public function Get_List_Documento():array
    {
        $l_LNConfigsistema = new LNConfigsistema();
        $l_List_Documento = [];
        $l_List_Parametros = [];
        $l_DocComercial = null;
        $l_Commercial_Operations = 2; //TIPOS DE OPERACIONES COMERCIALES (DOCUMENTO COMERCIAL)


        $l_List_Parametros = $l_LNConfigsistema->Get_Parametros_Sistema_object($l_Commercial_Operations,0,"",null);

        foreach( $l_List_Parametros as $Item )
        {
            $l_DocComercial = new ENDocComercial();

            $l_DocComercial->Id_Documento = $Item->Cod_ParSis;
            $l_DocComercial->Des_Documento = $Item->Des_ParSis_Nom;
            $l_DocComercial->Cod_Transaccion = $Item->Des_ParSis_Tx1;

            array_push($l_List_Documento,$l_DocComercial);
        }

        return $l_List_Documento;
    }

    public function Get_List_Documento_Sunat():array
    {
        $l_LNConfigsistema = new LNConfigsistema();
        $l_List_Documento = [];
        $l_List_Parametros = [];
        $l_DocComercial = null;
        $l_Commercial_Operations = 2; //TIPOS DE OPERACIONES COMERCIALES (DOCUMENTO COMERCIAL)
        $l_List_Par_Busqueda = []; //Lista de condiciones de busqueda
        $l_Parbusqueda = null; //Paramtro de busqueda

        $l_Parbusqueda = new ENParbusqueda();
        $l_Parbusqueda->key = "Des_Cfpsis_Tx5"; //Este flag indica cual es la moneda base de sistema
        $l_Parbusqueda->Val = null;
        $l_Parbusqueda->Ope = "different"; // inidicamos que debe ser diferente
        array_push($l_List_Par_Busqueda,$l_Parbusqueda);


        $l_List_Parametros = $l_LNConfigsistema->Get_Parametros_Sistema_object($l_Commercial_Operations,0,"",$l_List_Par_Busqueda);

        foreach( $l_List_Parametros as $Item )
        {
            $l_DocComercial = new ENDocComercial();

            $l_DocComercial->Id_Documento = $Item->Cod_ParSis;
            $l_DocComercial->Des_Documento = $Item->Des_ParSis_Nom;
            $l_DocComercial->Cod_Transaccion = $Item->Des_ParSis_Tx1;

            array_push($l_List_Documento,$l_DocComercial);
        }

        return $l_List_Documento;
    }

    public function Get_List_Documento_Compra()
    {
        $l_LNConfigsistema = new LNConfigsistema();
        $l_List_Documento = [];
        $l_List_Parametros = [];
        $l_DocComercial = null;
        $l_Commercial_Operations = 2; //TIPOS DE OPERACIONES COMERCIALES (DOCUMENTO COMERCIAL)
        $l_List_Par_Busqueda = []; //Lista de condiciones de busqueda
        $l_Parbusqueda = null; //Paramtro de busqueda

        $l_Parbusqueda = new ENParbusqueda();
        $l_Parbusqueda->key = "Num_Cfpsis_Sm1"; //Este flag indica cual es la moneda base de sistema
        $l_Parbusqueda->Val = 2;
        array_push($l_List_Par_Busqueda,$l_Parbusqueda);

        $l_Parbusqueda = new ENParbusqueda();
        $l_Parbusqueda->key = "Num_Cfpsis_Sm2"; //Este flag indica cual es la moneda base de sistema
        $l_Parbusqueda->Val = 2;
        array_push($l_List_Par_Busqueda,$l_Parbusqueda);


        $l_List_Parametros = $l_LNConfigsistema->Get_Parametros_Sistema_object($l_Commercial_Operations,0,"",$l_List_Par_Busqueda);

        foreach( $l_List_Parametros as $Item )
        {
            $l_DocComercial = new ENDocComercial();

            $l_DocComercial->Id_Documento = $Item->Cod_ParSis;
            $l_DocComercial->Des_Documento = $Item->Des_ParSis_Nom;
            $l_DocComercial->Cod_Transaccion = $Item->Des_ParSis_Tx1;

            array_push($l_List_Documento,$l_DocComercial);
        }

        return $l_List_Documento;       
    }

    public function Update_Estado_Tablas_Generico(
         int $p_Tip_Accion
        ,int $p_Cod_ParSis
        ,int $p_Id_Prikey
        ,ENAutenticacionService $p_Obj_Aut
        ,int $p_Tip_Grupo_Validacion
    )
    {
        $l_Rpt = new ENResponse;
        $l_ADSeguridad = new ADSeguridad();
        $l_LNParsistema = new LNParsistema();

        if( $p_Tip_Grupo_Validacion > 0 ) //Si es mayor a cero validar el perfil
        {
            $l_Rpt = $l_ADSeguridad->Get_Validacion_Perfil($p_Obj_Aut->Id_Usuario,$p_Tip_Grupo_Validacion);
            if($l_Rpt->Error->flagerror) return $l_Rpt;
        }

        $l_Rpt = $l_LNParsistema->Update_Tbl_Generico($p_Tip_Accion,$p_Cod_ParSis,$p_Id_Prikey,$p_Obj_Aut->Id_Usuario);

        return $l_Rpt;
    }

    public function Get_Porcenta_IGV(int $p_Tip_Documento = 0):ENImpuesto
    {
        $l_Impuesto = new ENImpuesto();
        $l_LNConfigsistema = new LNConfigsistema();
        $Setting_Tax = 34; //Prefijo para valores de impuestos
        $Setting_Tax_IGV = 1; //Tipo impuesto IVA

        if( $p_Tip_Documento == 3 || $p_Tip_Documento == 2 || $p_Tip_Documento == 0 )
        {
            $l_Impuesto->Tip_Impuesto = $Setting_Tax_IGV;
            $l_Impuesto->Num_Tasa = (float)$l_LNConfigsistema->Get_Parametros_Sistema_string($Setting_Tax,$Setting_Tax_IGV,16,null);
        }
        return $l_Impuesto;
    }

    /**
     * Valida que el tipo de cambio este actualizado al día de hoy
     */
    public function Get_Validacion_Tipo_Cambio_Fecha(int $p_Tip_Moneda)
    {
        $l_Rpt = new ENResponse();
        $l_ADGenerico = new ADGenerico();
        $l_Fec_Actualizacion = "";
        $l_Fec_Hoy_Inicio = date("Y-m-d") . " 00:00:00";
        $l_Fec_Hoy_Fin = date("Y-m-d") . " 23:59:59";

        $l_Fec_Actualizacion = $l_ADGenerico->Get_Ultima_Actualizacion_Moneda($p_Tip_Moneda);

        if( 
            (strtotime($l_Fec_Hoy_Inicio) <  strtotime($l_Fec_Actualizacion)) && 
            (strtotime($l_Fec_Hoy_Fin) >  strtotime($l_Fec_Actualizacion))
        )
        {
            $l_Rpt->Error->messages = "ACTUALIZACIÓN DE TIPO DE CAMBIO SI CORRESPONDE AL DÍA DE HOY.";
        }else
        {
            $l_Rpt->Error->flagerror = true;
            $l_Rpt->Error->messages = "EL TIPO DE CAMBIO NO SE ENCUENTRA ACTUALIZADO AL DÍA DE HOY";
            $l_Rpt->Error->messages .= ", ULTIMA ACTUALIZACIÓN ENCONTRADA " . $l_Fec_Actualizacion;
        }

        return $l_Rpt;
    }


    /**
     * Devuelve la lista de validaciones posibles para un perfil
     */
    public function Get_List_Validaciones_Perfil()
    {
        $l_LNConfigsistema = new LNConfigsistema();
        $l_ValidacionPerfil = new ENValidacionPerfil();
        $l_Key_Validations_User_Profile = 26;
        $l_List_Validaciones = [];

        $l_List_Parametros = $l_LNConfigsistema->Get_Parametros_Sistema_object($l_Key_Validations_User_Profile,0,"");

        foreach( $l_List_Parametros as $Item )
        {
            $l_ValidacionPerfil = new ENValidacionPerfil();

            $l_ValidacionPerfil->Cod_Validacion = $Item->Cod_ParSis;
            $l_ValidacionPerfil->Des_Mensaje = $Item->Des_ParSis_Tx2;

            array_push($l_List_Validaciones,$l_ValidacionPerfil);
        }

        return $l_List_Validaciones;  
    }

    /**
     * Devuelve la lista de departamentos del Perú
     */
    public function Get_List_Departamento():array
    {
        $l_ADGenerico = new ADGenerico();

        return [ "List_Resultado" => $l_ADGenerico->Get_List_Departamento() ];
    }

    /**
     * Devuelve la lista de provincias en base al nombre de un departamento
     */
    public function Get_List_Provincia(string $p_Cod_Departamento):array
    {
        $l_ADGenerico = new ADGenerico();

        return [ "List_Resultado" => $l_ADGenerico->Get_List_Provincia($p_Cod_Departamento) ];
    }

    /**
     * Devuelve la lista de distritos en base al nombre de un departamento y una provincia
     */
    public function Get_List_Distrito(string $p_Cod_Departamento,string $p_Cod_Provincia):array
    {
        $l_ADGenerico = new ADGenerico();

        return [ "List_Resultado" => $l_ADGenerico->Get_List_Distrito($p_Cod_Departamento,$p_Cod_Provincia) ];
    }

    /**
     * Devuelve una lista de los tipos de afectacion validas para un producto
     */
    public function Get_List_Tipo_Afectacion()
    {
        $l_LNConfigsistema = new LNConfigsistema();
        $l_Tax_Exemption_Reason_Code = 36;
        $l_List_Validaciones = [];

        $l_List_Parametros = $l_LNConfigsistema->Get_Parametros_Sistema_object($l_Tax_Exemption_Reason_Code,0,"");

        // foreach( $l_List_Parametros as $Item )
        // {
        //     $l_ValidacionPerfil = new ENValidacionPerfil();

        //     $l_ValidacionPerfil->Cod_Validacion = $Item->Cod_ParSis;
        //     $l_ValidacionPerfil->Des_Mensaje = $Item->Des_ParSis_Tx2;

        //     array_push($l_List_Validaciones,$l_ValidacionPerfil);
        // }

        return $l_List_Parametros; 
    }

    /**
     * Devuelve una lista de tipos de tributo para un producto
     */
    public function Get_List_Tipo_Tributo()
    {
        $l_LNConfigsistema = new LNConfigsistema();
        $l_Tax_Type_Code = 35;
        $l_List_Validaciones = [];

        $l_List_Parametros = $l_LNConfigsistema->Get_Parametros_Sistema_object($l_Tax_Type_Code,0,"");

        // foreach( $l_List_Parametros as $Item )
        // {
        //     $l_ValidacionPerfil = new ENValidacionPerfil();

        //     $l_ValidacionPerfil->Cod_Validacion = $Item->Cod_ParSis;
        //     $l_ValidacionPerfil->Des_Mensaje = $Item->Des_ParSis_Tx2;

        //     array_push($l_List_Validaciones,$l_ValidacionPerfil);
        // }

        return $l_List_Parametros; 
    }

    public function Get_List_Almacen(int $p_Id_Tienda):array
    {
        $l_ADGenerico = new ADGenerico();
        return $l_ADGenerico->Get_List_Almacen($p_Id_Tienda);
    }

}    
?>    