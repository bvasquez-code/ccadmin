$(document).ready(function() {
    
    var BASE_URL = $("#URL_BASE").val();

    var g_Num_Pagina = 1;
    var g_Id_ConfigSis = $("#h_Id_ConfigSis").val();

    var g_crear = $("#h_crear").val();
    var g_listar = $("#h_listar").val();

    var g_OpcionesTabla = [
        [null,"[--OPCIONES--]"],
        [1,"&#xf002;  -  VER "],
        [2,"&#xf044;  -  EDITAR "],
        [3,"&#xf0ad;  -  CONFIGURAR "],
        [4,"&#xf1f8;  -  DESACTIVAR "]
        
    ];

    function Get_Config_Parametros_Sistema(p_Id_ConfigSis=0,p_Des_ConfigSis_Nom = "") {

        var l_OpcionesHtml = "";
        var l_DataTabla = [];
        var l_RowTabla = [];
        var l_OpcionesTabla = [];
        var l_Estado = "Inactivo";

        var l_Request = {
            Id_ConfigSis: p_Id_ConfigSis,
            Des_ConfigSis_Nom : p_Des_ConfigSis_Nom,
            Num_Pagina : g_Num_Pagina
        }
        var l_Response = GetActionJquery(l_Request,BASE_URL+"public/parsistema/Get_Config_Parametros_Sistema");

        l_Response.success(function(data){
            if (!data.Error.flagerror) {                

                $.each(data.Resultado.List_Resultado, function (i, item) {

                    l_OpcionesTabla = g_OpcionesTabla;

                    l_Estado = (item.Flg_Estado) ? "Activo" : "Inactivo";

                    l_OpcionesHtml = CrearComboBoxGenerico(l_OpcionesTabla,"lst-opciones",item.Id_ConfigSis,item.Id_ConfigSis,"opciones");
                    l_RowTabla = [
                        i+1,
                        item.Des_ConfigSis_Nom,
                        item.Des_ConfigSis_Abr,
                        item.Des_ConfigSis_Key,
                        item.Cod_ConfigSis,
                        l_Estado,                        
                        l_OpcionesHtml
                    ];
                    l_DataTabla.push(l_RowTabla);

                });
                CargarTablaGenerica("data-table", l_DataTabla,false);
                CargarInfoTabla("dynamic-table_info",data.Resultado.Num_RegistroIni,data.Resultado.Num_RegistroFin,data.Resultado.Num_TotalBus);
                Crear_Paginador_Tabla("div-paginador",data.Resultado.Num_TotalBus,data.Resultado.Num_Seccion,data.Resultado.Num_Intervalo);

            }else{

            } 
        });
        l_Response.error(function(){
            alert("ERROR 500");
        });

    }

    function Set_Config_Parametros_Sistema(p_Id_ConfigSis=0)
    {
        var l_Tip_Accion = 1;

        l_Tip_Accion = (p_Id_ConfigSis == 0) ? 1 : 2;

        var l_Desconfigsistema = {
            Des_DesParam_Nom : $("#txt-Des_DesParam_Nom").val(),
            Des_DesParam_Abr : $("#txt-Des_DesParam_Abr").val(),
            Des_DesParam_Tx1 : $("#txt-Des_DesParam_Tx1").val(),
            Des_DesParam_Tx2 : $("#txt-Des_DesParam_Tx2").val(),
            Des_DesParam_Tx3 : $("#txt-Des_DesParam_Tx3").val(),
            Des_DesParam_Ch1 : $("#txt-Des_DesParam_Ch1").val(),
            Des_DesParam_In1 : $("#txt-Des_DesParam_In1").val(),
            Des_DesParam_In2 : $("#txt-Des_DesParam_In2").val(),
            Des_DesParam_In3 : $("#txt-Des_DesParam_In3").val(),
            Des_DesParam_Sm1 : $("#txt-Des_DesParam_Sm1").val(),
            Des_DesParam_Sm2 : $("#txt-Des_DesParam_Sm2").val(),
            Des_DesParam_Sm3 : $("#txt-Des_DesParam_Sm3").val(),
            Des_DesParam_Dc1 : $("#txt-Des_DesParam_Dc1").val(),
            Des_DesParam_Dc2 : $("#txt-Des_DesParam_Dc2").val(),
            Des_DesParam_Dc3 : $("#txt-Des_DesParam_Dc3").val(),
            Des_DesParam_Bo1 : $("#txt-Des_DesParam_Bo1").val(),
            Des_DesParam_Bo2 : $("#txt-Des_DesParam_Bo2").val(),
            Des_DesParam_Bo3 : $("#txt-Des_DesParam_Bo3").val(),
        };

        var l_Request = {
            Tip_Accion : l_Tip_Accion,
            Id_ConfigSis: p_Id_ConfigSis,
            Des_ConfigSis_Nom : $("#txt-Des_ConfigSis_Nom").val(),
            Des_ConfigSis_Abr : $("#txt-Des_ConfigSis_Abr").val(),
            Des_ConfigSis_Key : $("#txt-Des_ConfigSis_Key").val(),
            Desconfigsistema : l_Desconfigsistema
        };
        var l_Response = SetActionJquery(l_Request,BASE_URL+"public/parsistema/Set_Config_Parametros_Sistema");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {
                window.location.href = BASE_URL+"public/parsistema";                
            }else{
                alert(data.Error.messages);
            } 
        });
        l_Response.error(function(){
            alert("ERROR 500");
        });        
    }

    function Ejecutar_Accion( p_Tip_Opcion = 0 , p_Id_Opcion = 0)
    {
        if(p_Tip_Opcion == 1)
        {

        }
        if(p_Tip_Opcion == 2)
        {
            window.location.href = BASE_URL+"public/parsistema/crear/"+p_Id_Opcion;
        }
        if(p_Tip_Opcion == 3)
        {
            window.location.href = BASE_URL+"public/parsistema/config/"+p_Id_Opcion;
        }
    }

    $(document).on('change', '.lst-opciones', function (e) {

        var l_Id = $(this).attr("id");
        var l_Opcion = $("#" + l_Id).val();

        Ejecutar_Accion(l_Opcion,l_Id);

    });

    $("#btn-guardar").click(function(e){

        Set_Config_Parametros_Sistema(g_Id_ConfigSis);

    });

    $(document).on('click', '.paginate_button_a', function (e) {        
        var l_Id = $(this).attr("Id");
        g_Num_Pagina = Get_Num_Pagina_Seleccionada(l_Id,g_Num_Pagina);
        Get_Config_Parametros_Sistema(0,$("#txt-busqueda").val());
    });
    
    $("#txt-busqueda").keypress(function(e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if(code==13){
            g_Num_Pagina = 1;
            Get_Config_Parametros_Sistema(0,$("#txt-busqueda").val());
        }
    });

    function Go_Funciones()
    {
        if( g_listar == 1 )
        {
            Get_Config_Parametros_Sistema(0,"");
        }
        if( g_crear == 1 )
        {

        }
        
    }


    Go_Funciones();
    

}); 