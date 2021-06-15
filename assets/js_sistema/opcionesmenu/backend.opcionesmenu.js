$(document).ready(function() {
    
    var BASE_URL = $("#URL_BASE").val();

    var g_Num_Pagina = 1;
    var g_Id_Menu = $("#h_Id_Menu").val();
    var g_crear = $("#h_crear").val();
    var g_listar = $("#h_listar").val();
    var g_Item_Seleccionado = 0;

    var g_OpcionesTabla = [
        [0,"[--OPCIONES--]"],
        [1,"&#xf002;  -  VER "],
        [2,"&#xf044;  -  EDITAR "],
        [3,"&#xf1f8;  -  ELIMINAR "]
    ];

    function Get_Menu(p_Id_Perfil=0,p_Des_Menu = "")
    {

        var l_OpcionesHtml = "";
        var l_DataTabla = [];
        var l_RowTabla = [];
        var l_OpcionesTabla = [];

        var l_Request = {
            Id_Perfil: p_Id_Perfil,
            Des_Menu : p_Des_Menu,
            Num_Pagina : g_Num_Pagina
        }
        var l_Response = GetActionJquery(l_Request,BASE_URL+"public/opcionesmenu/Get_Menu");

        l_Response.success(function(data){
            if (!data.Error.flagerror) {                

                $.each(data.Resultado.List_Resultado, function (i, item) {

                    l_OpcionesTabla = g_OpcionesTabla;

                    l_OpcionesHtml = CrearComboBoxGenerico(l_OpcionesTabla,"lst-opciones",item.Id_Menu,item.Id_Menu,"opciones");
                    l_RowTabla = [
                        Number(data.Resultado.Num_RegistroIni+i+1),
                        item.Des_Menu + "  ("+item.Cod_KeyMenu+")",
                        item.Num_Nivel,
                        item.Des_UrlMenu,                        
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

    function Set_Menu(p_Id_Menu=0)
    {
        var l_Tip_Accion = 1;

        l_Tip_Accion = (p_Id_Menu == 0) ? 1 : 2;

        var l_Request = {
            Tip_Accion : l_Tip_Accion,
            Id_Menu: p_Id_Menu,
            Id_MenuPadre : $("#lst-Id_MenuPadre").val(),
            Des_Menu : $("#txt-Des_Menu").val(),
            Des_UrlMenu : $("#txt-Des_UrlMenu").val(),
            Cod_KeyMenu : $("#txt-Cod_KeyMenu").val(),
            Flg_Redigirible : $("#lst-Flg_Redigirible").val()
        }
        var l_Response = SetActionJquery(l_Request,BASE_URL+"public/opcionesmenu/Set_Menu");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {
                window.location.href = BASE_URL+"public/opcionesmenu";                
            }else{
                alert(data.Error.messages);
            } 
        });
        l_Response.error(function(){
            alert("ERROR 500");
        });        
    }

    function Update_Tbl_Generico(p_Tip_Accion=0,p_Id_Prikey=0)
    {
        var l_Cod_ParSis = 3;
        var l_Request = {
            Tip_Accion : p_Tip_Accion,
            Cod_ParSis: l_Cod_ParSis,
            Id_Prikey : p_Id_Prikey
        }
        var l_Response = SetActionJquery(l_Request,BASE_URL+"public/parsistema/Update_Tbl_Generico");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {
                Get_Menu(0,"",g_Num_Pagina);
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
        var l_Eliminar = 3;

        if(p_Tip_Opcion == 1)
        {

        }
        if(p_Tip_Opcion == 2)
        {
            window.location.href = BASE_URL+"public/opcionesmenu/crear/"+p_Id_Opcion;
        }
        if(p_Tip_Opcion == 3)
        {
            Ejecutar_Modal_Validacion("ELIMINAR OPCIÓN DE MENU","ESTA OPERACION NO ES REVERSIBLE, ¿ESTA SEGURO?","medium",Update_Tbl_Generico,l_Eliminar,p_Id_Opcion);
        }
    }

    $(document).on('change', '.lst-opciones', function (e) {

        var l_Id = $(this).attr("id");
        var l_Opcion = $("#" + l_Id).val();

        $("#" + g_Item_Seleccionado).val(0);
        Ejecutar_Accion(l_Opcion,l_Id);
        g_Item_Seleccionado = l_Id;
    });

    $("#btn-guardar").click(function(e){

        Set_Menu(g_Id_Menu);

    });

    $(document).on('click', '.paginate_button_a', function (e) {        
        var l_Id = $(this).attr("Id");
        g_Num_Pagina = Get_Num_Pagina_Seleccionada(l_Id,g_Num_Pagina);
        Get_Menu(0,"");
    });

    $("#txt-busqueda").keypress(function(e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if(code==13){
            g_Num_Pagina = 1;
            Get_Menu(0,$("#txt-busqueda").val());
        }
    });

    function ArrancarFunciones()
    {
        if( g_listar == 1 )
        {
            Get_Menu(0,"");
        }
        if( g_crear == 1 )
        {

        }
        
    }


    ArrancarFunciones();
    

}); 