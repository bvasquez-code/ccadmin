$(document).ready(function() {
    
    var BASE_URL = $("#URL_BASE").val();

    var g_Id_Perfil = $("#h_Id_Perfil").val();

    function Set_Perfil_Usuario(p_Id_Perfil=0) {

        Abrir_Dialogo_Carga();
        var l_Tip_Accion = (g_Id_Perfil == 0) ? 1 : 2;
        var l_List_Permisos_Operacionales = [];
        var l_List_Menu_Accesibles = [];

        $(".clase-validacion").each(function(index){

            var l_Id = $(this).attr("id");

            if ($('#'+l_Id).is(':checked') ) {
                l_Id = l_Id.split("-")[1];
                l_List_Permisos_Operacionales.push({ Cod_Validacion : Number(l_Id) })
            }
        });

        $(".clase-menu").each(function(index){

            var l_Id = $(this).attr("id");

            if ($('#'+l_Id).is(':checked') ) {
                l_Id = l_Id.split("-")[1];
                l_List_Menu_Accesibles.push({ Id_Menu : Number(l_Id) })
            }
        });

        var l_Request = {
            Tip_Accion : l_Tip_Accion,
            Id_Perfil : g_Id_Perfil,
            Des_Perfil : $("#txt-Des_Perfil").val(),
            Cod_KeyPerfil : $("#txt-Cod_KeyPerfil").val(),
            Flg_RestrinTienda : $("#lst-Flg_RestrinTienda").val(),
            Flg_RestrinCaja : $("#lst-Flg_RestrinCaja").val(),
            Fec_Inicio : $("#txt-Fec_Inicio").val(),
            Fec_Final : $("#txt-Fec_Final").val(),
            Des_DiasPermi : $("#txt-Des_DiasPermi").val(),
            List_Permisos_Operacionales : l_List_Permisos_Operacionales,
            List_Menu_Accesibles : l_List_Menu_Accesibles,
            List_Prueba : null
        }
        var l_Response = GetActionJquery(l_Request,BASE_URL+"public/perfilusuario/Set_Perfil_Usuario");

        l_Response.success(function(data){
            if (!data.Error.flagerror) {
                window.location.href = BASE_URL+"public/perfilusuario";             
            }else{
                Ejecutar_Modal_Error(data.Error.messages);
            } 
            Cerrar_Dialogo_Carga_Proceso(data.Error.flagerror);

        });
        l_Response.error(function(){
            alert("ERROR 500");
            Cerrar_Dialogo_Carga_Proceso(true);
        });

    }

    function Get_Permisos_Perfil(p_Id_Perfil=0) {

        var l_Request = {
            Id_Perfil: p_Id_Perfil
        }
        var l_Response = GetActionJquery(l_Request,BASE_URL+"public/perfilusuario/Get_Permisos_Perfil");

        l_Response.success(function(data){
            if (!data.Error.flagerror) {                

                $.each(data.Resultado.List_Permisos_Operativos, function (i, item) {              
                    $("#validacion-"+item.Cod_Validacion).attr('checked',true);
                });
                $.each(data.Resultado.List_Menu_Accesibles, function (i, item) {              
                    $("#menu-"+item.Id_Menu).attr('checked',true);
                });

            }else{

            } 
        });
        l_Response.error(function(){
            alert("ERROR 500");
        });

    }

    $("#btn-guardar").click(function(e){
        Set_Perfil_Usuario();
    });

    Get_Permisos_Perfil(g_Id_Perfil);

});