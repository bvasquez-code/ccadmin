$(document).ready(function() {
    
    var BASE_URL = $("#URL_BASE").val();

    var g_Num_Pagina = 1; // Pagina por defecto
    var g_Tip_Listado = 1; // Tipo de listado para tablas
    var g_Tip_Busqueda = 1; //Tipo de busqueda para productos

    var g_Id_Producto = $("#h_Id_Producto").val();
    var g_crear = $("#h_crear").val();
    var g_listar = $("#h_listar").val();
    var g_Item_Seleccionado = 0;
    var g_List_Producto = [];
    var g_Array_Imagen = [];
    var g_Array_Imagen_Secun = [];

    var g_List_Variaciones_Producto = [];
    var g_Num_Contador_Aux = 0; //Contador global axuliar

    var g_OpcionesTabla = [
        [0,"[--OPCIONES--]"],
        [1,"&#xf002;  -  VER "],
        [2,"&#xf044;  -  EDITAR "],
        [3,"&#xf0ad;  -  CONFIGURAR"],
        [4,"&#xf1f8;  -  ELIMINAR "]
    ];

    function Get_Producto(p_Id_Producto=0,p_Des_Producto_Bus="")
    {
        Abrir_Dialogo_Carga();
        var l_OpcionesHtml = "";
        var l_DataTabla = [];
        var l_RowTabla = [];
        var l_OpcionesTabla = [];

        var Des_Producto_Desc = "";
        var Des_Producto_Histo = "";

        var l_Request = {
            Paginacion: {
                Tip_Busqueda: g_Tip_Busqueda,
                Tip_Listado: g_Tip_Listado,
                Num_Seccion: g_Num_Pagina
            },
            Busqueda: {
                Busqueda_Producto: {
                    Id_Producto : p_Id_Producto,
                    Des_Producto_Bus : p_Des_Producto_Bus
                }
            }
        };

        var l_Response = GetActionJquery(l_Request,BASE_URL+"public/producto/Get_Producto");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {

                $.each(data.Resultado.List_Resultado, function (i, item) {

                    Des_Producto_Desc = (item.Flg_Producto_Desc) ? '<i class="fa fa-check-circle fa-lg" aria-hidden="true" style="color: blue;"></i> ACTIVO' : '<i class="fa fa-times fa-lg" aria-hidden="true" style="color: red;"></i> INACTIVO';
                    Des_Producto_Histo = (item.Flg_Producto_Histo) ? '<i class="fa fa-check-circle fa-lg" aria-hidden="true" style="color: blue;"></i> ACTIVO' : '<i class="fa fa-times fa-lg" aria-hidden="true" style="color: red;"></i> INACTIVO';

                    l_OpcionesTabla = g_OpcionesTabla;

                    l_OpcionesHtml = CrearComboBoxGenerico(l_OpcionesTabla,"lst-opciones",item.Id_Producto,item.Id_Producto,"opciones");
                    l_RowTabla = [
                        Number(data.Resultado.Num_RegistroIni+i+1),
                        item.Cod_Producto,
                        item.Des_Producto_Nom,
                        item.Des_CategoriaProducto,
                        item.Des_MarcaProducto,
                        Des_Producto_Desc,
                        Des_Producto_Histo,                        
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
            Cerrar_Dialogo_Carga_Simple();
        });
        l_Response.error(function(){
            alert("ERROR 500");
            Cerrar_Dialogo_Carga_Simple();
        });        
    }

    function Get_Data_Crear()
    {
        Abrir_Dialogo_Carga();

        var l_Html_Aux = "";

        var l_Request = {
            Id_Producto : g_Id_Producto
        };

        var l_Response = GetActionJquery(l_Request,BASE_URL+"public/producto/Get_Data_Crear");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {

                $("#txt-Des_Producto_Nom").val(data.Resultado.Producto.Des_Producto_Nom);
                $("#txt-Cod_Producto").val(data.Resultado.Producto.Cod_Producto);
                $("#txt-Cod_Barras").val(data.Resultado.Producto.Cod_Barras);
                $("#lst-Id_CategoriaProducto").val(data.Resultado.Producto.Id_CategoriaProducto);
                $("#lst-Id_MarcaProducto").val(data.Resultado.Producto.Id_MarcaProducto);

                $("#lst-Tip_Afectacion").val(data.Resultado.Producto.Tip_Afectacion);
                $("#lst-Tip_Tributo").val(data.Resultado.Producto.Tip_Tributo);

                $("#txt-Des_Producto_Texto1").val(data.Resultado.Producto.Des_Producto_Texto1);
                $("#txt-Des_Producto_Texto2").val(data.Resultado.Producto.Des_Producto_Texto2);
                $("#lst-Tip_Producto_Moneda").val(data.Resultado.Producto.Tip_Producto_Moneda);
                $("#txt-Num_Producto_StockMin").val(data.Resultado.Producto.Num_Producto_StockMin);
                $("#txt-Num_Producto_StockMax").val(data.Resultado.Producto.Num_Producto_StockMax);
                $("#lst-Flg_Producto_Desc").val(Number(data.Resultado.Producto.Flg_Producto_Desc));
                $("#lst-Tip_Producto_Desc").val(data.Resultado.Producto.Tip_Producto_Desc);
                $("#txt-Num_Producto_DescMon").val(data.Resultado.Producto.Num_Producto_DescMon);
                $("#txt-Num_Producto_DescPor").val(data.Resultado.Producto.Num_Producto_DescPor);
                $("#lst-Flg_Producto_Histo").val(Number(data.Resultado.Producto.Flg_Producto_Histo));
                $("#txt-Num_Producto_Precio").val(Number(data.Resultado.Producto.Num_Producto_Precio))
                
                if( $("#txt-Cod_Barras").val().trim() != "" ) JsBarcode("#producto_barcode", $("#txt-Cod_Barras").val());
                

                if(data.Resultado.Producto.Flg_Imagen)
                {
                    l_Html_Aux = '<a href="'+BASE_URL+data.Resultado.Producto.Obj_Imgen.Des_Url_Imagen_Principal+'" target="_blank">';
                    l_Html_Aux +=    '<input class="form-control" type="text" id="txt-Des_Producto_ImgPrin" name="txt-Des_Producto_ImgPrin" value="'+data.Resultado.Producto.Obj_Imgen.Des_Url_Imagen_Principal+'" readonly>';
                    l_Html_Aux +='</a>';

                    $("#div-img-principal").html(l_Html_Aux);

                    g_Array_Imagen.push( { Tip_Imagen : "url" , Des_Ruta : data.Resultado.Producto.Obj_Imgen.Des_Url_Imagen_Principal} );
                }

                if(data.Resultado.Producto.Obj_Imgen.List_Imagen_Secundaria.length > 0)
                {
                    for(var i = 0 ; data.Resultado.Producto.Obj_Imgen.List_Imagen_Secundaria.length > i ; i++ )
                    {
                        g_Array_Imagen_Secun.push( { Tip_Imagen : "url" , Des_Ruta : data.Resultado.Producto.Obj_Imgen.List_Imagen_Secundaria[i]} );
                    }
                        
                }

            }else{
                alert(data.Error.messages);
            }
            Cerrar_Dialogo_Carga_Simple();
        });
        l_Response.error(function(){
            alert("ERROR 500");
            Cerrar_Dialogo_Carga_Simple();
        });            
    }

    function getBase64(p_Obj_file,p_Num_Opcion = 1) {
        if(p_Obj_file)
        {
            var reader = new FileReader();
            reader.readAsDataURL(p_Obj_file);        
            reader.onload = function () {
                if( p_Num_Opcion == 1 )
                {
                    g_Array_Imagen.push( { Tip_Imagen : "base_64" , Des_Ruta : reader.result} );
                }
                else
                {
                    g_Array_Imagen_Secun.push({ Tip_Imagen : "base_64" , Des_Ruta : reader.result});
                }
                console.log(g_Array_Imagen_Secun);
                console.log(g_Array_Imagen);
              
            };
            reader.onerror = function (error) {
              console.log('Error: ', error);
            };
        }
     }

    function Set_Producto(p_Id_Producto=0)
    {
        Abrir_Dialogo_Carga();
        var l_List_Producto_Img = [];

        if( g_Array_Imagen.length == 1 ) l_List_Producto_Img = g_Array_Imagen;

        if( g_Array_Imagen_Secun.length > 0 ) l_List_Producto_Img = g_Array_Imagen.concat(g_Array_Imagen_Secun);


        var l_Request = {
            Id_Producto : p_Id_Producto,
            Cod_Barras : $("#txt-Cod_Barras").val(),
            Des_Producto_Nom : $("#txt-Des_Producto_Nom").val(),
            Id_CategoriaProducto : $("#lst-Id_CategoriaProducto").val(),
            Id_MarcaProducto : $("#lst-Id_MarcaProducto").val(),
            Tip_Afectacion : $("#lst-Tip_Afectacion").val(),
            Tip_Tributo : $("#lst-Tip_Tributo").val(),
            Cod_Producto : $("#txt-Cod_Producto").val(),
            Des_Producto_Texto1 : $("#txt-Des_Producto_Texto1").val(),
            Des_Producto_Texto2 : $("#txt-Des_Producto_Texto2").val(),
            Num_Producto_Precio : $("#txt-Num_Producto_Precio").val(),
            Tip_Producto_Moneda : $("#lst-Tip_Producto_Moneda").val(),
            Num_Producto_StockMin : $("#txt-Num_Producto_StockMin").val(),
            Num_Producto_StockMax : $("#txt-Num_Producto_StockMax").val(),
            Flg_Producto_Desc : $("#lst-Flg_Producto_Desc").val(),
            Tip_Producto_Desc : $("#lst-Tip_Producto_Desc").val(),
            Num_Producto_DescMon : $("#txt-Num_Producto_DescMon").val(),
            Num_Producto_DescPor : $("#txt-Num_Producto_DescPor").val(),
            Flg_Producto_Histo : $("#lst-Flg_Producto_Histo").val(),
            List_Producto_Img : l_List_Producto_Img
        };

        var l_Response = SetActionJquery(l_Request,BASE_URL+"public/producto/Set_Producto");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {
                // window.location.href = BASE_URL+"public/producto";              
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

    function Set_Producto_Masivo()
    {
        Abrir_Dialogo_Carga();
        var l_Request = g_List_Producto;

        var l_Response = SetActionJquery(l_Request,BASE_URL+"public/producto/Set_Producto_Masivo");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {
                Get_Producto();              
            }else{
                alert(data.Error.messages);
            }
            Cerrar_Dialogo_Carga_Proceso(data.Error.flagerror);
        });
        l_Response.error(function(){
            alert("ERROR 500");
            Cerrar_Dialogo_Carga_Proceso(true);
        });        
    }

    function Get_Formato_Carga_Producto()
    {
        var l_Request = {};
        var l_Response = GetActionJquery(l_Request,BASE_URL+"public/producto/Get_Formato_Carga_Producto");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {
                Crete_Excel(data.Resultado.Des_NombreExcel,"carga_stock",data.Resultado.Obj_Cabecera, data.Resultado.List_Obj_Contenido);
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
            window.location.href = BASE_URL+"public/producto/ver/"+p_Id_Opcion;
        }
        if(p_Tip_Opcion == 2)
        {
            window.location.href = BASE_URL+"public/producto/crear/"+p_Id_Opcion;
        }
        if(p_Tip_Opcion == 3)
        {
            window.location.href = BASE_URL+"public/producto/config/"+p_Id_Opcion;
        }
    }

    $("#txt-Cod_Barras").keypress(function(e) {

        JsBarcode("#producto_barcode", $("#txt-Cod_Barras").val());

    });    

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
        Get_Producto(0,$("#txt-busqueda").val());
    });

    $("#txt-busqueda").keypress(function(e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if(code==13){
            g_Num_Pagina = 1;
            Get_Producto(0,$("#txt-busqueda").val());
        }
    });
    // --- ACCIONES DE LISTAR ---

    // --- ACCIONES DE CREAR ---

    $("#btn-guardar").click(function(e){

        Set_Producto(g_Id_Producto);

    });

    $("#btn-carga-masiva").click(function(e){

        var l_Html_1 = "";
        var l_Html_2 = "";

        l_Html_1 += '<div class="col-md-12 col-sm-12">';
        l_Html_1 += '<a class="btn btn-success" id="btn-exportar-formato" style="width: 100%;"><i class="ace-icon fa fa-file-excel-o"></i>EXPORTAR FORMATO</a>';
        l_Html_1 += '</div>';

        l_Html_2 += '<div class="col-md-12 col-sm-12">';
        l_Html_2 += '<input class="form-control" type="file" id="file-excel-carga" name="file-excel-carga">';
        l_Html_2 += '</div>';

        var l_FormArray = [[[l_Html_2, "html"]],[[l_Html_1, "html"]]];
        Ejecutar_Modal_Generico("form-1",l_FormArray,"<b>CARGA MASIVA DE PRODUCTOS</b>","medium",Set_Producto_Masivo);

    });
    
    $(document).on('click', '#btn-exportar-formato', function (e) {

        Get_Formato_Carga_Producto();

    });

    $(document).on('change', '#file-excel-carga', function (evt) {

        var selectedFile = evt.target.files[0];
        var reader = new FileReader();
        reader.onload = function (event) {
            var data = event.target.result;
            var workbook = XLSX.read(data, {
                type: 'binary'
            });
            workbook.SheetNames.forEach(function (sheetName) {

                var XL_row_object = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
                var json_object = JSON.stringify(XL_row_object);
                g_List_Producto = XL_row_object;
                console.log(g_List_Producto);
            })
        };

        reader.onerror = function (event) {
            console.error("File could not be read! Code " + event.target.error.code);
        };

        reader.readAsBinaryString(selectedFile);
    }); 
    
    $("#file-img-principal").blur(function(e)
    {
        if( g_Array_Imagen.length > 0 )
        {
            g_Array_Imagen = [];
        }
        getBase64(document.getElementById("file-img-principal").files[0],1);
    });

    $("#btn-agregar-img").click(function(e)
    {
        getBase64(document.getElementById("file-img-secundaria").files[0],2);
    });
    
    $("#btn-agregar-variacion").click(function(e){

        var l_val = $("#txt-Des_Nueva_Variacion_Producto").val();

        if(l_val != "")
        {
            Agregar_Variacion_Producto_HTML(l_val);
        }

    });


    // --- FIN ACCIONES DE CREAR ---

    function Go_Funciones()
    {
        if( g_listar == 1 )
        {
            Get_Producto();
        }else
        {
            Get_Data_Crear();
            $("#txt-Cod_Barras").focus();            
        }
        
    }

   
    Go_Funciones();    

}); 