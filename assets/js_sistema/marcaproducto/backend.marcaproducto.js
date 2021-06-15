$(document).ready(function() {
    
    var BASE_URL = $("#URL_BASE").val();

    var g_Num_Pagina = 1; // Pagina por defecto
    var g_Tip_Listado = 1; // Tipo de listado para tablas HTML
    var g_Tip_Busqueda = 3; //Tipo de busqueda para marcas

    var g_Id_MarcaProducto = $("#h_Id_MarcaProducto").val();
    var g_crear = $("#h_crear").val();
    var g_listar = $("#h_listar").val();
    var g_Item_Seleccionado = 0;

    var g_OpcionesTabla = [
        [0,"[--OPCIONES--]"],
        [1,"&#xf002;  -  VER "],
        [2,"&#xf044;  -  EDITAR "],
        [3,"&#xf1f8;  -  ELIMINAR "]
    ];

    function Get_Marca_Producto(p_Id_MarcaProducto=0,p_Des_MarcaProducto_Bus="")
    {
        var l_OpcionesHtml = "";
        var l_DataTabla = [];
        var l_RowTabla = [];
        var l_OpcionesTabla = [];

        var l_Request = {
            Paginacion: {
                Tip_Busqueda: g_Tip_Busqueda,
                Tip_Listado: g_Tip_Listado,
                Num_Seccion: g_Num_Pagina
            },
            Busqueda: {
                Busqueda_MarcaProducto: {
                    Id_MarcaProducto: p_Id_MarcaProducto,
                    Des_MarcaProducto_Bus: p_Des_MarcaProducto_Bus
                }
            }
        };

        var l_Response = GetActionJquery(l_Request,BASE_URL+"public/marcaproducto/Get_Marca_Producto");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {

                $.each(data.Resultado.List_Resultado, function (i, item) {

                    l_OpcionesTabla = g_OpcionesTabla;

                    l_OpcionesHtml = CrearComboBoxGenerico(l_OpcionesTabla,"lst-opciones",item.Id_MarcaProducto,item.Id_MarcaProducto,"opciones");
                    l_RowTabla = [
                        Number(data.Resultado.Num_RegistroIni+i+1),
                        item.Cod_MarcaProducto,
                        item.Des_MarcaProducto_Nom,                      
                        l_OpcionesHtml
                    ];
                    l_DataTabla.push(l_RowTabla);

                });
                CargarTablaGenerica("data-table", l_DataTabla,false);
                CargarInfoTabla("dynamic-table_info",data.Resultado.Num_RegistroIni,data.Resultado.Num_RegistroFin,data.Resultado.Num_TotalBus);
                Crear_Paginador_Tabla("div-paginador",data.Resultado.Num_TotalBus,data.Resultado.Num_Seccion,data.Resultado.Num_Intervalo);

            }else{
                alert(data.Error.messages);
            } 
        });
        l_Response.error(function(){
            alert("ERROR 500");
        });        
    }

    function Set_Marca_Producto(p_Id_MarcaProducto=0)
    {
        var l_Request = {
            Id_MarcaProducto : p_Id_MarcaProducto,
            Cod_MarcaProducto : $("#txt-Cod_MarcaProducto").val(),
            Des_MarcaProducto_Nom : $("#txt-Des_MarcaProducto_Nom").val()
        };

        var l_Response = SetActionJquery(l_Request,BASE_URL+"public/marcaproducto/Set_Marca_Producto");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {
                window.location.href = BASE_URL+"public/marcaproducto";              
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
            window.location.href = BASE_URL+"public/marcaproducto/crear/"+p_Id_Opcion;
        }
        if(p_Tip_Opcion == 3)
        {

        }
    }

    // --- ACCIONES DE LISTAR ---
    $(document).on('change', '.lst-opciones', function (e) {

        var l_Id = $(this).attr("id");
        var l_Opcion = $("#" + l_Id).val();
        
        $("#" + g_Item_Seleccionado).val(0);

        Ejecutar_Accion(l_Opcion,l_Id);

        g_Item_Seleccionado = l_Id;

    });    

    $(document).on('click', '.paginate_button_a', function (e) {        
        var l_Id = $(this).attr("Id");
        g_Num_Pagina = Get_Num_Pagina_Seleccionada(l_Id,g_Num_Pagina);
        Get_Marca_Producto(0,$("#txt-busqueda").val());
    });

    $("#txt-busqueda").keypress(function(e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if(code==13){
            g_Num_Pagina = 1;
            Get_Marca_Producto(0,$("#txt-busqueda").val());
        }
    });
    // --- ACCIONES DE LISTAR ---

    // --- ACCIONES DE CREAR ---


    $("#btn-guardar").click(function(e){

        Set_Marca_Producto(g_Id_MarcaProducto);

    });    

    // --- FIN ACCIONES DE CREAR ---

    function Go_Funciones()
    {
        if( g_listar == 1 )
        {
            Get_Marca_Producto();
        }
        
    }


    Go_Funciones();    

}); 