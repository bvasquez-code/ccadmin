<?php
	// echo json_encode($Producto);
?>
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
</ol>

<input type="hidden" id="h_crear" value="1">
<input type="hidden" id="h_listar" value="0">

<input type="hidden" id="h_Id_Producto" value="<?php if(!empty($Id_Producto)){echo $Id_Producto;}else{echo "0";}?>">

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
                                        <h1 class="page-header">PRODUCTO <small></small></h1>
                                    </div>
                                </div>
                                
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>VARIACIONES DEL PRODUCTO :</b></label>
									<div class="col-md-7 col-sm-7">
										<input class="form-control" type="text" id="txt-Des_Nueva_Variacion_Producto" name="txt-Des_Nueva_Variacion_Producto" placeholder="" maxlength="128">
									</div>
									<div class="col-md-2 col-sm-2">
										<a class="btn btn-inverse agregar-carrito" id="btn-agregar-variacion">Add +</a>
									</div>
                                </div>
								<div class="form-group carga-aplicacion">
									<label class="control-label col-md-3 col-sm-3"><b>LISTA DE VARIACIONES :</b></label>
                                    <div class="col-md-7 col-sm-7">
                                        <div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline no-footer">
                                            <table id="data-table-variaciones" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Item</th>
                                                        <th>Variación</th>
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

 <!-- ==================  JS FUNCIONES ================== -->
 <script src="<?php echo base_url('assets/js_sistema/backend.generico.js'); ?>"></script>
 
  <!-- ================== END JS FUNCIONES ================== -->
  <style>
	select{
		font-family: fontAwesome
	}
</style>

<script>
$(document).ready(function() {

    var BASE_URL = $("#URL_BASE").val();

    var g_Num_Pagina = 1; // Pagina por defecto
    var g_Tip_Listado = 1; // Tipo de listado para tablas
	var g_Tip_Busqueda = 1; //Tipo de busqueda para productos
	
	var g_Item_Seleccionado = 0;

	var g_Id_Producto = $("#h_Id_Producto").val();
	var g_List_Variaciones_Producto = [];
	var g_Varacion_Seleccionada = {
		 Id_Variacion : 0
		,Des_Variacion : ""
	};

	var g_OpcionesTabla = [
        [0,"[--OPCIONES--]"],
        ["editar","&#xf044;  -  EDITAR "],
        ["eliminar","&#xf1f8;  -  ELIMINAR "]
    ];

	function Get_Data_Crear()
    {
        Abrir_Dialogo_Carga();

        var l_OpcionesHtml = "";
        var l_DataTabla = [];
        var l_RowTabla = [];
		var l_OpcionesTabla = [];

        var l_Request = {
            Id_Producto : g_Id_Producto
        };

        var l_Response = GetActionJquery(l_Request,BASE_URL+"public/producto/Get_Data_Crear");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {


                if(data.Resultado.Producto.List_Variaciones.length > 0)
                {

                    $.each(data.Resultado.Producto.List_Variaciones, function (i, item) {

						l_OpcionesTabla = g_OpcionesTabla;

						g_List_Variaciones_Producto[item.Id_Variacion] = item;

						l_OpcionesHtml = CrearComboBoxGenerico(l_OpcionesTabla,"lst-opciones",item.Id_Variacion,item.Num_Stock,"opciones");
						l_RowTabla = [
							Number(i+1),
							item.Des_Variacion,                    
							l_OpcionesHtml
						];
						l_DataTabla.push(l_RowTabla);
                        
                    });
					CargarTablaGenerica("data-table-variaciones", l_DataTabla,false);
					console.log(g_List_Variaciones_Producto);
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

	function Ejecutar_Accion( p_Tip_Opcion = 0 , p_Id_Opcion = 0)
    {
        if(p_Tip_Opcion == "editar")
        {
			$("#txt-Des_Nueva_Variacion_Producto").val(g_List_Variaciones_Producto[p_Id_Opcion].Des_Variacion);
			g_Varacion_Seleccionada = g_List_Variaciones_Producto[p_Id_Opcion];

        }
        if(p_Tip_Opcion == "eliminar")
        {
			if(g_List_Variaciones_Producto[p_Id_Opcion].Num_Stock > 0)
			{
				Ejecutar_Modal_Validacion("ERROR","VARIACIÓN QUE INTENTA ELIMINAR TIENE STOCK","medium");
			}
            $("#" + g_Item_Seleccionado).val(0);
        }

	}
	
	function Set_Variacion_Producto()
	{
		Abrir_Dialogo_Carga();
		var l_Request = {
			 Id_Producto : g_Id_Producto
			,Id_Variacion : g_Varacion_Seleccionada.Id_Variacion
			,Des_Variacion : $("#txt-Des_Nueva_Variacion_Producto").val()
		};
		var l_Response = GetActionJquery(l_Request,BASE_URL+"public/producto/Set_Variacion_Producto");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {
				g_Varacion_Seleccionada.Id_Variacion = 0;
				$("#" + g_Item_Seleccionado).val(0);
				Get_Data_Crear();
				$("#txt-Des_Nueva_Variacion_Producto").val("");
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

	$(document).on('change', '.lst-opciones', function (e) {

		var l_Id = $(this).attr("id");
		var l_Opcion = $("#" + l_Id).val();

		$("#" + g_Item_Seleccionado).val(0);
		g_Varacion_Seleccionada.Id_Variacion = 0;
		$("#txt-Des_Nueva_Variacion_Producto").val("");
		Ejecutar_Accion(l_Opcion,l_Id);

		g_Item_Seleccionado = l_Id;

	});

	$("#btn-agregar-variacion").click(function(e){
		Set_Variacion_Producto();
	});
	
	Get_Data_Crear();

});
</script>   