<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
</ol>

<div class="row">
    <div class="col-md-12">
    <div class="tab-pane fade active in" id="tab-1">
			<div class="row">
				<div class="col-md-12 ui-sortable">
					<div class="panel panel-inverse" data-sortable-id="form-validation-1">
				        <div class="panel-body panel-form">
				            <form id="form-datos-formularioproducto" class="form-horizontal form-bordered" data-parsley-validate="true" name="demo-form" novalidate="">
                                <div class="form-group">
                                    <div class="row" style="text-align: center;">
                                        <h1 class="page-header">CARGA DE STOCK MANUAL <small></small></h1>
                                    </div>
                                </div>
                                
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>TIPO DE CARGA DE STOCK (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<select class="form-control selectpicker" id="lst-Tip_Carga" name="lst-Tip_Carga" data-size="10" data-style="btn-primary">
											<option value="0">[--SELECCIONE CATEGORIA--]</option>
                                            <option value="Initial_Stock">CARGAR STOCK INICIAL</option>
                                            <option value="Add_Stock">AGREGAR STOCK</option>                                        
				                        </select>										
									</div>
                                </div>
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>CODIGO MANUAL :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Des_Producto_Nom" name="txt-Des_Producto_Nom"  value="<?php if(!empty($Producto)){echo $Producto['Des_Producto_Nom'];}?>" maxlength="128">
									</div>
                                </div>                                
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3"><b>TIENDA DE DESTINO (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<select class="form-control selectpicker" id="lst-Id_Tienda" name="lst-Id_Tienda" data-size="10" data-style="btn-primary">
											<option value="0">[--SELECCIONE TIENDA--]</option>
                                            <?php if(!empty($List_Tienda)){ ?>
                                                <?php foreach($List_Tienda as $Item){ ?>
                                                    <option value="<?=$Item["Id_Tienda"]?>"><?="(".$Item["Cod_Tienda"].") ".$Item["Des_Tienda"]?></option>
                                                <?php } ?>
                                            <?php } ?>                                        
				                        </select>										
									</div>
                                </div>
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>FORMA DE CARGA (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<select class="form-control selectpicker" id="lst-Tip_Metodo_Carga" name="lst-Tip_Metodo_Carga" data-size="10" data-style="btn-primary">
											<option value="0">[--SELECCIONE CATEGORIA--]</option>
                                            <option value="Accion_Excel">CARGA MASIVA (ARCHIVO EXCEL)</option>
                                            <option value="Accion_Aplicacion">CARGA UNO A UNO (APLICACIÓN)</option>                                        
				                        </select>										
									</div>
                                </div>
                                <div class="form-group carga-archivo" style="display: none;">
									<label class="control-label col-md-3 col-sm-3"><b>ARCHIVO EXCEL :</b></label>
									<div class="col-md-6 col-sm-6">
										<input class="form-control" type="file" id="file-excel-carga" name="file-excel-carga"  value="<?php if(!empty($Producto)){echo $Producto['Des_Producto_Nom'];}?>" maxlength="128">
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <a class="btn btn-success" id="btn-exportar-formato" style="width: 100%;"><i class="ace-icon fa fa-file-excel-o"></i>EXPORTAR FORMATO DE CARGA</a>
                                    </div>
                                </div>

                                <div class="form-group carga-aplicacion" style="display: none;">  
                                    <div class="col-md-6 col-sm-6">
                                        <div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline no-footer">
                                            <div class="row">
                                                <div class="col-xs-6"></div>
                                                <div class="col-xs-6">
                                                    <div id="dynamic-table_filter" class="dataTables_filter">
                                                        <label>Search:<input type="search" id="txt-busqueda" class="form-control input-sm" placeholder="" aria-controls="dynamic-table"></label>
                                                    </div>
                                                </div>
                                            </div>

                                            <table id="data-table" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Item</th>
                                                        <th>Cod</th>
                                                        <th>Descripción</th>
                                                        <th>Opciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>

                                            <div class="row">
                                                <div class="col-xs-5">
                                                    <div class="dataTables_info" id="dynamic-table_info" role="status" aria-live="polite">Showing 1 to 10 of 23 entries</div>
                                                </div>
                                                <div class="col-xs-7" id="div-paginador">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline no-footer">
                                            <div class="row">
                                                <div class="col-xs-6"></div>
                                                <div class="col-xs-6">
                                                    <div id="dynamic-table_filter" class="dataTables_filter">
                                                        <label>Search:<input type="search" id="txt-busqueda" class="form-control input-sm" placeholder="" aria-controls="dynamic-table"></label>
                                                    </div>
                                                </div>
                                            </div>

                                            <table id="data-table-stock" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Producto</th>
                                                        <th>Cantidad</th>
                                                        <th>Nuevo Precio</th>
                                                        <th>Opciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>     
                                </div>
                                
				            </form>
				        </div>
					</div>
				</div>
			</div>
          </div>    

    </div>
</div>
<div class="row">
  <div class="col-md-12">
		<div class="form-group">
			<div class="col-md-8 col-sm-8"></div>
			<div class="col-md-4 col-sm-4" style="text-align: right;">
				<a href="<?=base_url("public/producto")?>" id="btn-cancelar" 
				type="button" class="btn btn-danger"><i class="ace-icon fa fa-times"></i> Cancelar</a>
				<a id="btn-guardar" 
				type="button" class="btn btn-primary"><i class="ace-icon fa fa-pencil"></i>Guardar</a>
			</div>                                   
		</div>  
  </div>
</div>

 <!-- ==================  JS COMPLEMENTOS ================== -->
 <script src="<?php echo base_url('assets/plugins/jquery/jquery-3.4.1.min.js');?>"></script>
  <!-- ================== END JS COMPLEMENTOS ================== -->

 <!-- ==================  JS FUNCIONES EXCEL ================== -->
 <script src="<?php echo base_url('assets/complement/xlsx.full.min.js'); ?>"></script>
 <script src="<?php echo base_url('assets/complement/FileSaver.js'); ?>"></script>
   <!-- ================== END JS FUNCIONES EXCEL ================== -->

 <!-- ==================  JS FUNCIONES ================== -->
 <script src="<?php echo base_url('assets/js_sistema/backend.generico.js'); ?>"></script>
   <!-- ================== END JS FUNCIONES ================== -->
<script>

$(document).ready(function() {
    
    var BASE_URL = $("#URL_BASE").val();

    var g_Num_Pagina = 1; // Pagina por defecto
    var g_Tip_Listado = 1; // Tipo de listado para tablas
    var g_Tip_Busqueda = 1; //Tipo de busqueda para productos

    var g_Id_Producto = $("#h_Id_Producto").val();
    var g_crear = $("#h_crear").val();
    var g_listar = $("#h_listar").val();
    var g_Item_Seleccionado = 0;

    var g_List_Tienda_Seleccionadas = [];
    var g_List_Producto_Stock = [];
    var g_List_Producto = [];
    var g_List_Tipo_Descuento_Producto = [];

    var g_OpcionesTabla = [
        [0,"[--OPCIONES--]"],
        ["ver_stock","&#xf002;  -  VER STOCK ACTUAL"],
        ["cargar_stock","&#xf0ad;  -  CARGAR STOCK"]
    ];

    var g_List_Boolena = [[0,"NO"],[1,"SI"]];

    var g_Form_diagnostico = [ // modal stock de producto
            [['NÚMERO STOCK', 'number', 'Num_Stock']],
            [['PRECIO COMPRA', 'number', 'Num_PrecioCompra']],
            [['MODIFICAR PRECIO', 'select', 'Flg_ModPrecio']],
            [['NUEVO PRECIO', 'number', 'Num_Precio']],
            [['RESETEAR DESCUENTO', 'select', 'Flg_ResetDescuento']],
            [['TIPO DE DESCUENTO', 'select', 'Tip_Descuento']],
            [['MONTO DE DESCUENTO', 'number', 'Num_ValDescuento']]
        ];

    function Get_Producto(p_Id_Producto=0,p_Des_Producto_Bus="")
    {
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

                    g_List_Producto[item.Id_Producto] = item;

                    Des_Producto_Desc = (item.Flg_Producto_Desc) ? '<i class="fa fa-check-circle fa-lg" aria-hidden="true" style="color: blue;"></i> ACTIVO' : '<i class="fa fa-times fa-lg" aria-hidden="true" style="color: red;"></i> INACTIVO';
                    Des_Producto_Histo = (item.Flg_Producto_Histo) ? '<i class="fa fa-check-circle fa-lg" aria-hidden="true" style="color: blue;"></i> ACTIVO' : '<i class="fa fa-times fa-lg" aria-hidden="true" style="color: red;"></i> INACTIVO';

                    l_OpcionesTabla = g_OpcionesTabla;

                    l_OpcionesHtml = CrearComboBoxGenerico(l_OpcionesTabla,"lst-opciones",item.Id_Producto,item.Id_Producto,"opciones");
                    l_RowTabla = [
                        Number(data.Resultado.Num_RegistroIni+i+1),
                        item.Cod_Producto,
                        item.Des_Producto_Nom,              
                        l_OpcionesHtml
                    ];
                    l_DataTabla.push(l_RowTabla);

                });
                CargarTablaGenerica("data-table", l_DataTabla,false);
                CargarInfoTabla("dynamic-table_info",data.Resultado.Num_RegistroIni,data.Resultado.Num_RegistroFin,data.Resultado.Num_TotalBus);
                Crear_Paginador_Tabla("div-paginador",data.Resultado.Num_TotalBus,data.Resultado.Num_Seccion,data.Resultado.Num_Intervalo);

            }else{
                Ejecutar_Modal_Error(data.Error.messages);
            } 
        });
        l_Response.error(function(){
            alert("ERROR 500");
        });        
    }


    function Get_Parametros_Sistema(p_Cod_Sistema=0) 
    {
        var l_OpcionesHtml = "";
        var l_Data_List = [];
        var l_Row_List = [];

        var l_Request = {
            Cod_Sistema: p_Cod_Sistema,Cod_ParaSistem : 0
        }
        var l_Response = GetActionJquery(l_Request,BASE_URL+"public/parsistema/Get_Parametros_Sistema");

        l_Response.success(function(data){
            if (!data.Error.flagerror) {                

                $.each(data.Resultado, function (i, item) {

                    l_Row_List.push(item.Cod_ParSis);
                    l_Row_List.push(item.Des_ParSis_Nom);
                    l_Data_List.push(l_Row_List);
                    l_Row_List = [];
                });

                g_List_Tipo_Descuento_Producto = l_Data_List;
                console.log(g_List_Tipo_Descuento_Producto);

            }else{
                Ejecutar_Modal_Error(data.Error.messages);
            } 
        });
        l_Response.error(function(){
            alert("ERROR 500");
        });

    }

    function Add_Tienda(p_Id_Tienda=0,p_Des_Tienda="")
    {
        var l_DataTabla = [];
        var l_RowTabla = [];
        var l_Flg_Agregar = true;
        var l_Tienda = {
            Id_Tienda :p_Id_Tienda, Des_Tienda : p_Des_Tienda
        };       

        $.each(g_List_Tienda_Seleccionadas, function (i, item) {
            if ( item.Id_Tienda == l_Tienda.Id_Tienda )
            {
                l_Flg_Agregar = false;
            }
        });

        if(l_Flg_Agregar){

            g_List_Tienda_Seleccionadas.push(l_Tienda);

            $.each(g_List_Tienda_Seleccionadas, function (i, item) {
                l_RowTabla = [item.Des_Tienda];
                l_DataTabla.push(l_RowTabla);            
            });
            CargarTablaGenerica("data-table-tienda", l_DataTabla,false);

        }else{
            alert('¡ TIENDA "'+p_Des_Tienda+'" YA FUE AGREGADA A LA LISTA !');
        }       
    }

    function Mostrar_Modal_Stock(p_Id_Producto)
    {
        Ejecutar_Modal_Generico("form-1",g_Form_diagnostico,"<b>AGREGAR STOCK</b>","large",Agregar_Stock_Producto,p_Id_Producto);

        CargarComboBoxGenerico("lst-Flg_ResetDescuento", "",g_List_Boolena,null);
        CargarComboBoxGenerico("lst-Flg_ModPrecio", "",g_List_Boolena,null);
        CargarComboBoxGenerico("lst-Tip_Descuento", "[--SELECCIONAR TIPO DESCUENTO--]",g_List_Tipo_Descuento_Producto,null);
        $("#txt-Num_Precio").attr("readonly", true);
        $("#lst-Tip_Descuento").attr("disabled", true);
        $("#txt-Num_ValDescuento").attr("readonly", true);

        if(g_List_Producto_Stock.hasOwnProperty(p_Id_Producto))
        {
            $("#txt-Num_Stock").val(g_List_Producto_Stock[p_Id_Producto].Num_Stock);
            $("#txt-Num_Precio").val(g_List_Producto_Stock[p_Id_Producto].Num_Precio);
            $("#txt-Num_PrecioCompra").val(g_List_Producto_Stock[p_Id_Producto].Num_PrecioCompra);
            $("#lst-Flg_ModPrecio").val(g_List_Producto_Stock[p_Id_Producto].Flg_ModPrecio);
            $("#lst-Flg_ResetDescuento").val(g_List_Producto_Stock[p_Id_Producto].Flg_ResetDescuento);
            
            if( $("#lst-Flg_ModPrecio").val() == 1 ) $("#txt-Num_Precio").removeAttr("readonly",true);
        }

    }

    function Agregar_Stock_Producto(p_Id_Producto=0)
    {
        var l_OpcionesHtml = "";
        var l_DataTabla = [];
        var l_RowTabla = [];
        var l_OpcionesTabla = [];
        var l_Producto_Stock = {};
        var l_Num_Precio_Html = "";

        if( p_Id_Producto != 0 )
        {
            if( Number($("#txt-Num_Stock").val()) == 0)
            {
                alert("NO AGREGO NÚMERO DE STOCK");
                return false;
            }
            else
            {
                l_Producto_Stock = { 
                    Id_Producto : p_Id_Producto,
                    Cod_Producto :  g_List_Producto[p_Id_Producto].Cod_Producto,
                    Num_Stock : Number($("#txt-Num_Stock").val()),
                    Flg_ModPrecio : $("#lst-Flg_ModPrecio").val(),
                    Num_Precio: Number($("#txt-Num_Precio").val()),
                    Num_PrecioCompra : Number($("#txt-Num_PrecioCompra").val()),
                    Flg_ResetDescuento : $("#lst-Flg_ResetDescuento").val(),
                    Tip_Descuento : $("#lst-Tip_Descuento").val(),
                    Num_ValDescuento : $("#txt-Num_ValDescuento").val()
                }

                g_List_Producto_Stock[p_Id_Producto] = l_Producto_Stock;
            }
        }
        
        Object.keys(g_List_Producto_Stock).forEach(function(key) {
            console.log(key, g_List_Producto_Stock[key]);

            l_OpcionesHtml = '<b><a class="btn-delete" id="'+key+'"><i class="fa fa-times fa-3x" aria-hidden="true"></i></a></b>';

            l_Num_Precio_Html = g_List_Producto_Stock[key].Num_Precio;
            if( g_List_Producto_Stock[key].Num_Precio == 0 ) l_Num_Precio_Html = "X";

            l_RowTabla = [
                g_List_Producto[key].Cod_Producto,
                g_List_Producto_Stock[key].Num_Stock,
                l_Num_Precio_Html,
                l_OpcionesHtml
            ];
            l_DataTabla.push(l_RowTabla);
            l_Num_Precio_Html = "";

        });
        CargarTablaGenerica("data-table-stock", l_DataTabla,false);
        $("#" + g_Item_Seleccionado).val(0);

    }

    function Set_Stock(p_Id_Tienda = 0,p_Tip_Carga=0,p_Cod_Manual="",p_Tip_Metodo_Carga="",p_List_Producto_Stock = [])
    {
        var l_Request = {
            Des_KayTipoCarga : p_Tip_Carga,
            Cod_Manual : p_Cod_Manual,
            List_Stock_Producto : []
        }

        var l_Item_Stock_Producto =  {
            Id_Tienda_Destino : p_Id_Tienda,            
            List_Data_Producto : []
        }

        if ( p_Tip_Metodo_Carga == "Accion_Aplicacion" )
        {
            Object.keys(p_List_Producto_Stock).forEach(function(key) {       
                l_Item_Stock_Producto.List_Data_Producto.push(p_List_Producto_Stock[key]);
            });
        }
        if ( p_Tip_Metodo_Carga == "Accion_Excel" )
        {
            l_Item_Stock_Producto.List_Data_Producto = p_List_Producto_Stock;
        }

        l_Request.List_Stock_Producto.push(l_Item_Stock_Producto);

        var l_Response = SetActionJquery(l_Request,BASE_URL+"public/stockmanual/Set_Stock");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {
                window.location.href = BASE_URL+"public/stockmanual";          
            }else{
                Ejecutar_Modal_Error(data.Error.messages);
            }
        });
        l_Response.error(function(){
            g_Accion_Ejecutable = true;
            alert("ERROR 500");
        });

    }

    function Ejecutar_Accion( p_Tip_Opcion = "" , p_Id_Opcion = 0 )
    {
        if ( p_Tip_Opcion == "cargar_stock" )
        {
            Mostrar_Modal_Stock(p_Id_Opcion);
        }
    }

    function Get_Formato_Carga_Stock()
    {
        var l_Request = {};
        var l_Response = GetActionJquery(l_Request,BASE_URL+"public/stockmanual/Get_Formato_Carga_Stock");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {
                Crete_Excel(data.Resultado.Des_NombreExcel,"carga_stock",data.Resultado.Obj_Cabecera, data.Resultado.List_Obj_Contenido);
            }else{
                Ejecutar_Modal_Error(data.Error.messages);
            } 
        });
        l_Response.error(function(){
            alert("ERROR 500");
        });        
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
        Get_Producto(0,$("#txt-busqueda").val());
    });

    $(document).on('click','.btn-delete',function(e){
        var l_Id = $(this).attr("Id");
        delete g_List_Producto_Stock[l_Id];
        Agregar_Stock_Producto(0);
    });

    $(document).on('change','#lst-Flg_ModPrecio',function(e){        
        var l_Id = $("#lst-Flg_ModPrecio").val();        
        if( l_Id == 0)
        {
            $("#txt-Num_Precio").attr("readonly", true);
            $("#txt-Num_Precio").val("");
        }
        else
        {
            $("#txt-Num_Precio").removeAttr("readonly",true);
        }        
    });

    $(document).on('change','#lst-Flg_ResetDescuento',function(e){        
        var l_Id = $("#lst-Flg_ResetDescuento").val();        
        if( l_Id == 0)
        {
            $("#lst-Tip_Descuento").attr("disabled", true);
            $("#lst-Tip_Descuento").val(0);
            $("#txt-Num_ValDescuento").attr("readonly", true);
            $("#txt-Num_ValDescuento").val("");
        }
        else
        {
            $("#lst-Tip_Descuento").removeAttr("disabled",true);
            $("#txt-Num_ValDescuento").removeAttr("readonly",true);
        }        
    });    

    $("#txt-busqueda").keypress(function(e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if(code==13){
            g_Num_Pagina = 1;
            Get_Producto(0,$("#txt-busqueda").val());
        }
    });

    $("#btn-add-tienda").click(function(e){

        var l_Id = $("#lst-Id_Tienda").val();
        var l_Des = $('#lst-Id_Tienda option[value=' + l_Id + ']').text();
        Add_Tienda(l_Id,l_Des);
    });

    $("#lst-Tip_Metodo_Carga").change(function(e){
        var l_Id = $("#lst-Tip_Metodo_Carga").val();

        if( l_Id == "Accion_Excel")
        {
            $(".carga-aplicacion").hide();
            $(".carga-archivo").show();
        }
        else
        {
            $(".carga-archivo").hide();
            $(".carga-aplicacion").show();
        }

    });

    // --- ACCIONES DE LISTAR ---

    // --- ACCIONES DE CREAR ---

    $("#btn-exportar-formato").click(function(e){

        Get_Formato_Carga_Stock();     

    }); 

    $("#btn-guardar").click(function(e){
        
        Set_Stock($("#lst-Id_Tienda").val(),$("#lst-Tip_Carga").val(),$("#txt-Des_Producto_Nom").val(),$("#lst-Tip_Metodo_Carga").val(),g_List_Producto_Stock);

    });

    $("#file-excel-carga").change(function (evt) {

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
                g_List_Producto_Stock = XL_row_object;
                console.log(g_List_Producto_Stock);
            })
        };

        reader.onerror = function (event) {
            console.error("File could not be read! Code " + event.target.error.code);
        };

        reader.readAsBinaryString(selectedFile);
    });    

    // --- FIN ACCIONES DE CREAR ---

    function Go_Funciones()
    {
        var l_Tipo_Descuento_Producto = 12;
        Get_Parametros_Sistema(l_Tipo_Descuento_Producto);
        Get_Producto();
        
    }


    Go_Funciones();    

});
</script>

<style>
	select{
		font-family: fontAwesome
	}
</style>