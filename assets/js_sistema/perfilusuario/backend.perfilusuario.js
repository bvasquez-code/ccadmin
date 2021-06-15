$(document).ready(function() {
    
    var BASE_URL = $("#URL_BASE").val();

    var g_OpcionesTabla = [
        [null,"[--OPCIONES--]"],
        [1,"&#xf002;  -  VER "],
        [2,"&#xf044;  -  EDITAR "],
        // [3,"&#xf1f8;  -  ELIMINAR "]
        [3,"&#xf05e  -  INACTIVAR "]
    ];

    function Get_Perfil_Usuario(p_Id_Perfil=0) {

        var l_OpcionesHtml = "";
        var l_DataTabla = [];
        var l_RowTabla = [];
        var l_OpcionesTabla = [];

        var l_Request = {
            Id_Perfil: p_Id_Perfil
        }
        var l_Response = GetActionJquery(l_Request,BASE_URL+"public/perfilusuario/Get_Perfil_Usuario");

        l_Response.success(function(data){
            if (!data.Error.flagerror) {                

                $.each(data.Resultado, function (i, item) {

                    l_OpcionesTabla = g_OpcionesTabla;

                    l_OpcionesHtml = CrearComboBoxGenerico(l_OpcionesTabla,"lst-opciones",item.Id_Perfil,item.Id_Perfil,"opciones");
                    l_RowTabla = [
                        i+1,
                        item.Des_Perfil,
                        l_OpcionesHtml
                    ];
                    l_DataTabla.push(l_RowTabla);

                });
                CargarTablaGenerica("data-table", l_DataTabla,false);

            }else{

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
            window.location.href = BASE_URL+"public/perfilusuario/crear/"+p_Id_Opcion;
        }
        if(p_Tip_Opcion == 3)
        {

        }
    }

    $(document).on('change', '.lst-opciones', function (e) {

        var l_Id = $(this).attr("id");
        var l_Opcion = $("#" + l_Id).val();

        Ejecutar_Accion(l_Opcion,l_Id);

    });



    Get_Perfil_Usuario();

});