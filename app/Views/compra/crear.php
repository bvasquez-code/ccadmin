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
				            <form id="form-datos-formularioproducto" class="form-horizontal form-bordered" name="demo-form" novalidate="">
                                <div class="form-group">
                                    <div class="row" style="text-align: center;">
                                        <h1 class="page-header">COMPRA DE PRODUCTOS<small></small></h1>
                                    </div>
                                </div>
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>PROVEEDOR :</b></label>
									<div class="col-md-9 col-sm-9">
										<select class="form-control selectpicker" id="lst-Id_Proveedor" name="lst-Id_Proveedor" data-size="10" data-style="btn-primary">
                                            <option value="0">SIN PROVEEDOR</option>
                                            <?php if(!empty($v_List_Proveedor)){ ?>
                                                <?php foreach($v_List_Proveedor as $Item){ ?>
                                                    <option value="<?=$Item["Id_Proveedor"]?>"><?="(".$Item["Cod_Documento"].") ".$Item["Des_Proveedor"]?></option>
                                                <?php } ?>
                                            <?php } ?>                                  
				                        </select>										
									</div>
                                </div>
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>COMENTARIO :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Des_Comentario" name="txt-Des_Comentario"  value="<?php if(!empty($Producto)){echo $Producto['Des_Comentario'];}?>" maxlength="128">
									</div>
                                </div>                             
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3"><b>TIENDA DE DESTINO (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<select class="form-control selectpicker" id="lst-Id_Tienda" name="lst-Id_Tienda" data-size="10" data-style="btn-primary">
											<option value="0">[--SELECCIONE TIENDA--]</option>
                                            <?php if(!empty($v_List_Tienda)){ ?>
                                                <?php foreach($v_List_Tienda as $Item){ ?>
                                                    <option value="<?=$Item["Id_Tienda"]?>"><?="(".$Item["Cod_Tienda"].") ".$Item["Des_Tienda"]?></option>
                                                <?php } ?>
                                            <?php } ?>                                        
				                        </select>										
									</div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3"><b>MONEDA DE COMPRA (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<select class="form-control selectpicker" id="lst-Tip_Moneda" name="lst-Tip_Moneda" data-size="10" data-style="btn-primary">
											<option value="0">[--SELECCIONE MONEDA DE COMPRA--]</option>
                                            <?php if(!empty($v_List_Moneda)){ ?>
                                                <?php foreach($v_List_Moneda as $Item){ ?>
                                                    <option value="<?=$Item["Cod_Moneda"]?>" Num_Cambio="<?=$Item["Num_Cambio"]?>"><?="(".$Item["Des_Key"].") ".$Item["Des_Moneda"]. "  -  [ Valor de cambio : ".$Item["Num_Cambio"] ." ]"?></option>
                                                <?php } ?>
                                            <?php } ?>                                        
				                        </select>										
									</div>
                                </div>
                                <div class="form-group carga-aplicacion">
                                    <div class="col-md-12 col-sm-12">
                                        <div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline no-footer">
                                            <table id="data-table-stock" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Item</th>
                                                        <th>Producto</th>
                                                        <th>Cantidad</th>
                                                        <th>Precio Unitario</th>
                                                        <th>Total Por Producto</th>
                                                        <th>Nuevo Precio</th>
                                                        <th>Nuevo Descuento</th>
                                                        <th>Opciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group carga-aplicacion">  
                                    <div class="col-md-12 col-sm-12">
                                        <div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline no-footer">
                                            <div class="row">
                                                <div class="col-xs-6"></div>
                                                <div class="col-xs-6">
                                                    <div id="dynamic-table_filter" class="dataTables_filter">
                                                        <label>Codigo Producto:<input type="search" id="txt-busqueda" class="form-control input-sm" placeholder="" aria-controls="dynamic-table"></label>
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

    var g_Flg_Ejecucion = true;

    var g_List_Producto_Stock = [];
    var g_List_Producto = [];
    var g_Item_Seleccionado = 0;
    var g_List_Tipo_Descuento_Producto = [];
    var g_Data_Pagina = {
        Moneda_Base : {},
        List_Moneda : [],
        Moneda_Compra : {},
        Moneda_Producto_Actual : {},
        Num_Cambio_Operacional : 0
    };

    var g_OpcionesTabla = [
        [0,"[--OPCIONES--]"],
        ["ver_stock","&#xf002;  -  VER STOCK ACTUAL"],
        ["cargar_stock","&#xf0ad;  -  CARGAR STOCK"]
    ];

    var g_OpcionesTabla_Detalle_Compra = [
        [0,"[--OPCIONES--]"],
        ["editar","&#xf002;  -  EDITAR"],
        ["eliminar","&#xf0ad;  -  ELIMINAR"]
    ];

    var g_List_Boolena = [[0,"NO"],[1,"SI"]];

    var g_Form_diagnostico = [ // modal stock de producto
            [['PRODUCTO', 'text', 'Des_Producto']],
            [['CANTIDAD', 'number', 'Num_Cantidad']],
            [['<div id="div-variaciones"></div>', 'html']],
            [['PRECIO COMPRA UNITARIO', 'number', 'Num_PrecioCompra_Uni']],
            [['PRECIO COMPRA TOTAL', 'number', 'Num_PrecioCompra_Tot']],
            [['MONEDA DE COMPRA', 'text', 'Des_Moneda_Compra']],
            [['MODIFICAR PRECIO', 'select', 'Flg_ModPrecio']],
            [['NUEVO PRECIO', 'number', 'Num_Precio']],
            [['MONEDA DEL PRODUCTO', 'text', 'Des_Moneda_Producto']],
            [['RESETEAR DESCUENTO', 'select', 'Flg_ResetDescuento']],
            [['TIPO DE DESCUENTO', 'select', 'Tip_Descuento']],
            [['MONTO DE DESCUENTO (%)', 'number', 'Num_ValDescuento']]
        ];

    function Set_Compra()
    {
        Abrir_Dialogo_Carga();
        var l_Request = {};
        var l_List_Detalle_Compra = [];

        Object.keys(g_List_Producto_Stock).forEach(function(key) {  

            var l_Item_Compra = {
                Id_Producto : g_List_Producto_Stock[key].Id_Producto,
                Cod_Producto :  g_List_Producto_Stock[key].Cod_Producto,
                Num_Cantidad : g_List_Producto_Stock[key].Num_Cantidad,
                Flg_ModPrecio : g_List_Producto_Stock[key].Flg_ModPrecio,
                Num_PreVenta_Nue : g_List_Producto_Stock[key].Num_NuevoPrecio_Ven,
                Num_PreCompra_Uni : g_List_Producto_Stock[key].Num_PrecioCompra_Uni,
                Num_PreCompra_Tot : g_List_Producto_Stock[key].Num_PrecioCompra_Tot,
                Flg_ResetDescuento : g_List_Producto_Stock[key].Flg_ResetDescuento,
                Tip_Descuento : g_List_Producto_Stock[key].Tip_Descuento,
                Num_Descuento : g_List_Producto_Stock[key].Num_ValDescuento,
                Tip_Producto_Mon : g_List_Producto_Stock[key].Tip_Producto_Moneda,
                List_Variaciones : g_List_Producto_Stock[key].List_Variaciones
            };

            l_List_Detalle_Compra.push(l_Item_Compra);
        });

        l_Request = {
            Id_Proveedor : $("#lst-Id_Proveedor").val()
           ,Id_Tienda : $("#lst-Id_Tienda").val()
           ,Tip_Moneda : $("#lst-Tip_Moneda").val()
           ,Des_Comentario : $("#txt-Des_Comentario").val()
           ,List_Detalle_Compra : l_List_Detalle_Compra
        };

        var l_Response = SetActionJquery(l_Request,BASE_URL+"public/compra/Set_Compra");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {
                bootbox.alert(
                    '<div class="row"><div class="col-sm-12"><h4 style="color:red;">OPERACIÓN REALIZADA CON EXITO : </h4><h4 style="color:blue;">'+data.Resultado.Cod_Compra+'</h4></div></div>'
                    , function(){ window.location.href = BASE_URL+"public/compra";}
                );
            }
            else
            {
                Ejecutar_Modal_Error(data.Error.messages);
            }
            Cerrar_Dialogo_Carga_Proceso(data.Error.flagerror);
        });
        l_Response.error(function(){
            alert("ERROR 500");
            Cerrar_Dialogo_Carga_Proceso(true);
        });   
    }

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
                    Cod_Producto : p_Des_Producto_Bus
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
            Cerrar_Dialogo_Carga_Simple();
        });
        l_Response.error(function(){
            alert("ERROR 500");
            Cerrar_Dialogo_Carga_Simple();
        });        
    }

    function Get_Detalle_Producto(p_Id_Producto = 0)
    {
        Abrir_Dialogo_Carga();

        var l_Html_Aux = "";

        var l_Request = {
            Id_Producto : p_Id_Producto
        };

        var l_Response = GetActionJquery(l_Request,BASE_URL+"public/producto/Get_Data_Crear");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {
                Cerrar_Dialogo_Carga_Simple();
                Mostrar_Modal_Stock(p_Id_Producto);
                if(data.Resultado.Producto.List_Variaciones.length > 0)
                {
                    $.each(data.Resultado.Producto.List_Variaciones, function (i, item) {
                        l_Html_Aux += '<div class="col-md-12">';
                        l_Html_Aux += '<div class="col-md-2"></div>';
                        l_Html_Aux += '<label class="control-label col-md-4">'+item.Des_Variacion+' :</label>';
                        l_Html_Aux += '<div class="col-md-6">';
                        l_Html_Aux += '<input type="number" class="form-control class-text class-stock-variacion" name="txt-variacion-'+item.Id_Variacion+'" id="txt-variacion-'+item.Id_Variacion+'">';
                        l_Html_Aux += '</div>';
                        l_Html_Aux += '</div>';
                    });
                    
                    $("#txt-Num_Cantidad").attr("readonly",true);
                }

                $("#div-variaciones").html(l_Html_Aux);

                if(g_List_Producto_Stock.hasOwnProperty(p_Id_Producto))
                {
                    $.each(g_List_Producto_Stock[p_Id_Producto].List_Variaciones, function (i, item) {
                        $("#txt-variacion-"+item.Id_Variacion).val(item.Num_Cantidad);
                    });
                }
            }else{
                Cerrar_Dialogo_Carga_Simple();
                Ejecutar_Modal_Error(data.Error.messages);
            } 
        });
        l_Response.error(function(){
            alert("ERROR 500");
            Cerrar_Dialogo_Carga_Simple();
        });            
    }

    function Mostrar_Modal_Stock(p_Id_Producto)
    {
        var Data_Moneda_Producto = {};
        var l_Num_Cambio = 0;

        Ejecutar_Modal_Generico("form-1",g_Form_diagnostico,"<b>AGREGAR STOCK</b>","large",Agregar_Stock_Producto,p_Id_Producto);

        CargarComboBoxGenerico("lst-Flg_ResetDescuento", "",g_List_Boolena,null);
        CargarComboBoxGenerico("lst-Flg_ModPrecio", "",g_List_Boolena,null);
        CargarComboBoxGenerico("lst-Tip_Descuento", "[--SELECCIONAR TIPO DESCUENTO--]",g_List_Tipo_Descuento_Producto,null);
        $("#txt-Num_Precio").attr("readonly", true);
        $("#lst-Tip_Descuento").attr("disabled", true);
        $("#txt-Num_ValDescuento").attr("readonly", true);
        $("#txt-Des_Producto").attr("readonly",true);
        $("#txt-Des_Moneda_Producto").attr("readonly",true);
        $("#txt-Des_Moneda_Compra").attr("readonly",true);

        if(g_List_Producto_Stock.hasOwnProperty(p_Id_Producto))
        {
            $("#txt-Des_Producto").val("(" +g_List_Producto[p_Id_Producto].Cod_Producto +") - "+g_List_Producto[p_Id_Producto].Des_Producto_Nom);

            $("#txt-Num_Cantidad").val(g_List_Producto_Stock[p_Id_Producto].Num_Cantidad);
            $("#txt-Num_PrecioCompra_Uni").val(g_List_Producto_Stock[p_Id_Producto].Num_PrecioCompra_Uni);
            $("#txt-Num_PrecioCompra_Tot").val(g_List_Producto_Stock[p_Id_Producto].Num_PrecioCompra_Tot);

            $("#lst-Flg_ModPrecio").val(g_List_Producto_Stock[p_Id_Producto].Flg_ModPrecio);
            $("#txt-Num_Precio").val(g_List_Producto_Stock[p_Id_Producto].Num_NuevoPrecio_Ven);

            $("#lst-Flg_ResetDescuento").val(g_List_Producto_Stock[p_Id_Producto].Flg_ResetDescuento);
            $("#lst-Tip_Descuento").val(g_List_Producto_Stock[p_Id_Producto].Tip_Descuento);
            $("#txt-Num_ValDescuento").val(g_List_Producto_Stock[p_Id_Producto].Num_ValDescuento)
            
            if( $("#lst-Flg_ModPrecio").val() == 1 ){
                $("#txt-Num_Precio").removeAttr("readonly",true);
            }
            if( $("#lst-Flg_ResetDescuento").val() == 1 ){
                $("#lst-Tip_Descuento").removeAttr("readonly",true);
                $("#txt-Num_ValDescuento").removeAttr("readonly",true);
            }

        }else
        {
            $("#txt-Des_Producto").val("(" +g_List_Producto[p_Id_Producto].Cod_Producto +") - "+g_List_Producto[p_Id_Producto].Des_Producto_Nom);
        }

        Data_Moneda_Producto = g_Data_Pagina.List_Moneda[g_List_Producto[p_Id_Producto].Tip_Producto_Moneda];

        l_Num_Cambio = Calcular_Valor_Cambio(g_Data_Pagina.Moneda_Compra,Data_Moneda_Producto);

        g_Data_Pagina.Num_Cambio_Operacional = l_Num_Cambio;
        g_Data_Pagina.Moneda_Producto_Actual = Data_Moneda_Producto;

        $("#txt-Des_Moneda_Producto").val(Data_Moneda_Producto.Des_Moneda + " - ( "+Data_Moneda_Producto.Des_Key+" )");
        $("#txt-Des_Moneda_Compra").val(g_Data_Pagina.Moneda_Compra.Des_Moneda + " - ( "+g_Data_Pagina.Moneda_Compra.Des_Key+" ) [ Valor de Cambio : "+l_Num_Cambio+" ]");

    }

    function Agregar_Stock_Producto(p_Id_Producto=0)
    {
        var l_OpcionesHtml = "";
        var l_DataTabla = [];
        var l_RowTabla = [];
        var l_OpcionesTabla = [];
        var l_Producto_Stock = {};
        var l_Num_Precio_Html = "";
        var l_Num_Descuento_Html = "";
        var l_Item = 0;
        var l_List_Variaciones = [];

        if( p_Id_Producto != 0 )
        {
            if( Number($("#txt-Num_Cantidad").val()) == 0)
            {
                alert("NO AGREGO NÚMERO DE STOCK");
                return false;
            }
            else
            {
                $(".class-stock-variacion").each(function(index){

                    var l_Id = $(this).attr("id");
                    
                    if( Number($("#"+l_Id).val()) > 0 )
                    {
                        l_List_Variaciones.push(
                            {
                                 Id_Variacion : Number(l_Id.split("-")[2])
                                ,Num_Cantidad : Number($("#"+l_Id).val())
                            }
                        );
                    }

                });

                l_Producto_Stock = { 
                    Id_Producto : p_Id_Producto,
                    Cod_Producto :  g_List_Producto[p_Id_Producto].Cod_Producto,
                    Des_Producto :  g_List_Producto[p_Id_Producto].Des_Producto_Nom,
                    Num_Cantidad : Number($("#txt-Num_Cantidad").val()),
                    Flg_ModPrecio : $("#lst-Flg_ModPrecio").val(),
                    Num_NuevoPrecio_Ven: Number($("#txt-Num_Precio").val()),
                    Num_PrecioCompra_Uni : Number($("#txt-Num_PrecioCompra_Uni").val()),
                    Num_PrecioCompra_Tot : Number($("#txt-Num_PrecioCompra_Tot").val()),
                    Flg_ResetDescuento : $("#lst-Flg_ResetDescuento").val(),
                    Tip_Descuento : Number($("#lst-Tip_Descuento").val()),
                    Num_ValDescuento : Number($("#txt-Num_ValDescuento").val()),
                    Tip_Producto_Moneda : g_List_Producto[p_Id_Producto].Tip_Producto_Moneda,
                    List_Variaciones : l_List_Variaciones
                }

                g_List_Producto_Stock[p_Id_Producto] = l_Producto_Stock;
            }
        }
        console.log(g_List_Producto_Stock);

        Object.keys(g_List_Producto_Stock).forEach(function(key) {
            
            l_Item++;
            l_OpcionesTabla = g_OpcionesTabla_Detalle_Compra;

            l_OpcionesHtml = CrearComboBoxGenerico(l_OpcionesTabla,"lst-opciones",g_List_Producto[key].Id_Producto,g_List_Producto[key].Id_Producto,"opciones");

            
            if( g_List_Producto_Stock[key].Flg_ModPrecio == 0 )
            {
                l_Num_Precio_Html = "NO SE MODIFICA";
            }else{
                l_Num_Precio_Html = g_Data_Pagina.List_Moneda[g_List_Producto_Stock[key].Tip_Producto_Moneda].Des_Key + " "
                                    + (new Intl.NumberFormat().format(g_List_Producto_Stock[key].Num_NuevoPrecio_Ven));
            }
          
            if( g_List_Producto_Stock[key].Flg_ResetDescuento == 0 )
            {
                l_Num_Descuento_Html = "NO SE MODIFICA";
            }else
            {
                if(g_List_Producto_Stock[key].Tip_Descuento == 2)
                {
                    l_Num_Descuento_Html = g_List_Producto_Stock[key].Num_ValDescuento + "%";
                }else
                {
                    l_Num_Descuento_Html = g_Data_Pagina.List_Moneda[g_List_Producto_Stock[key].Tip_Producto_Moneda].Des_Key + " "
                    + (new Intl.NumberFormat().format(g_List_Producto_Stock[key].Num_ValDescuento));
                }
                
            }

            l_RowTabla = [
                l_Item,
                "("+g_List_Producto[key].Cod_Producto+") - "+g_List_Producto[key].Des_Producto_Nom,
                g_List_Producto_Stock[key].Num_Cantidad,
                g_Data_Pagina.Moneda_Compra.Des_Key +" "+ (new Intl.NumberFormat().format(g_List_Producto_Stock[key].Num_PrecioCompra_Uni)),
                g_Data_Pagina.Moneda_Compra.Des_Key +" "+ (new Intl.NumberFormat().format(g_List_Producto_Stock[key].Num_PrecioCompra_Tot)),
                l_Num_Precio_Html,
                l_Num_Descuento_Html,
                l_OpcionesHtml
            ];
            l_DataTabla.push(l_RowTabla);
            l_Num_Precio_Html = "";
            l_Num_Descuento_Html = "";

        });
        CargarTablaGenerica("data-table-stock", l_DataTabla,false);
        $("#" + g_Item_Seleccionado).val(0);

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

    function Calcular_Valor_Cambio(Moneda_Compra = {},Mondeda_Producto = {})
    {
        var l_Num_Cambio_Base = g_Data_Pagina.Moneda_Base.Num_Cambio;
        var l_Num_Factor_Compra = l_Num_Cambio_Base / Moneda_Compra.Num_Cambio;
        var l_Num_Factor_Producto = l_Num_Cambio_Base / Mondeda_Producto.Num_Cambio;
        var l_Num_Cambio_Final =  l_Num_Factor_Producto / l_Num_Factor_Compra;
        return  Math.round(l_Num_Cambio_Final*100)/100;;
    }

    function Data_Crear(p_Cod_Sistema=0) 
    {
        var l_OpcionesHtml = "";
        var l_Data_List = [];
        var l_Row_List = [];

        var l_Request = {
            Cod_Sistema: p_Cod_Sistema,Cod_ParaSistem : 0
        }
        var l_Response = GetActionJquery(l_Request,BASE_URL+"public/compra/Data_Crear");

        l_Response.success(function(data){
            if (!data.Error.flagerror) {                
                g_Data_Pagina.Moneda_Base = data.Resultado.Moneda_Base;

                $.each(data.Resultado.List_Moneda, function (i, item) {
                    g_Data_Pagina.List_Moneda[item.Cod_Moneda] = item;
                });

                console.log(g_Data_Pagina);
                
            }else{
                Ejecutar_Modal_Error(data.Error.messages);
            } 
        });
        l_Response.error(function(){
            alert("ERROR 500");
        });

    }

    function Ejecutar_Accion( p_Tip_Opcion = "" , p_Id_Opcion = 0 )
    {
        if ( p_Tip_Opcion == "cargar_stock" )
        {
            if( $("#lst-Tip_Moneda").val() == 0 || $("#lst-Tip_Moneda").val() == null )
            {
                Ejecutar_Modal_Error("DEBE SELECCIONAR PRIMERO EL TIPO DE MONEDA DE LA COMPRA");
            }else
            {
                Get_Detalle_Producto(p_Id_Opcion);
            }
        }
        if( p_Tip_Opcion == "editar" )
        {
            Get_Detalle_Producto(p_Id_Opcion);
        }
    }

    function Establecer_Precio(p_Num_Opcion = 1)
    {
        var l_Num_PrecioCompra_Uni = Number($("#txt-Num_PrecioCompra_Uni").val());
        var l_Num_PrecioCompra_Tot = Number($("#txt-Num_PrecioCompra_Tot").val());
        var l_Num_Cantidad = Number($("#txt-Num_Cantidad").val());

        if( p_Num_Opcion == 1 && l_Num_PrecioCompra_Uni >= 0)
        {
            $("#txt-Num_PrecioCompra_Tot").val(l_Num_PrecioCompra_Uni * l_Num_Cantidad);
        }
        if( p_Num_Opcion == 2 && l_Num_PrecioCompra_Tot >= 0)
        {
            $("#txt-Num_PrecioCompra_Uni").val(l_Num_PrecioCompra_Tot / l_Num_Cantidad);
        }
        if( p_Num_Opcion == 3 && l_Num_Cantidad > 0)
        {
            if ( l_Num_PrecioCompra_Uni == 0 ||  l_Num_PrecioCompra_Uni == "" )
            {
                $("#txt-Num_PrecioCompra_Uni").val(l_Num_PrecioCompra_Tot / l_Num_Cantidad);
            }
            else if( l_Num_PrecioCompra_Tot == 0 ||  l_Num_PrecioCompra_Tot == "")
            {
                $("#txt-Num_PrecioCompra_Tot").val(l_Num_PrecioCompra_Uni * l_Num_Cantidad);
            }
            else
            {
                $("#txt-Num_PrecioCompra_Tot").val(l_Num_PrecioCompra_Uni * l_Num_Cantidad);
            }
        }
    }

    function Evaluar_Data_Formulario_Detalle(
        p_Num_Cantidad=0
        ,p_Num_PrecioCompra_Tot=0
        ,p_Num_PrecioCompra_Uni=0
        ,p_Tip_Descuento=0
        ,p_Num_ValDescuento=0
        ,p_Flg_ModPrecio = 0
        ,p_Num_Precio = 0
    )
    {
        $(".bootbox-accept").removeAttr("disabled",true);
        if( p_Num_Cantidad < 1 && p_Num_Cantidad != "")
        {
            $(".bootbox-accept").attr("disabled",true);
            Ejecutar_Modal_Error("CANTIDAD NO PUEDE SER MENOR A 1");
            $("#txt-Num_Cantidad").val(1);
            return false;
        }
        if( p_Num_PrecioCompra_Tot < 0 || p_Num_PrecioCompra_Uni < 0)
        {
            $(".bootbox-accept").attr("disabled",true);
            Ejecutar_Modal_Error("PRECIO NO PUEDE SER MENOR A 0");
            $("#txt-Num_PrecioCompra_Tot").val(0);
            return false;
        }

        if( (p_Num_ValDescuento < 0 || p_Num_ValDescuento > 100) && p_Tip_Descuento == 2)
        {
            $(".bootbox-accept").attr("disabled",true);
            Ejecutar_Modal_Error("DESCUENTO DEBE ESTAR ENTRE 0% Y 100%");
            $("#txt-Num_ValDescuento").val(0);
            return false;
        }
        if( p_Num_Precio < 0 && p_Flg_ModPrecio == 1)
        {
            $(".bootbox-accept").attr("disabled",true);
            Ejecutar_Modal_Error("NUEVO PRECIO NO PUEDE SER MENOR A 0");
            $("#txt-Num_Precio").val($("#txt-Num_PrecioCompra_Uni").val());
            return false;
        }
        if( p_Num_Precio < p_Num_PrecioCompra_Uni * g_Data_Pagina.Num_Cambio_Operacional && p_Flg_ModPrecio == 1)
        {
            $(".bootbox-accept").attr("disabled",true);
            if( g_Data_Pagina.Moneda_Compra.Cod_Moneda != g_Data_Pagina.Moneda_Producto_Actual.Cod_Moneda )
            {
                Ejecutar_Modal_Error("NUEVO PRECIO NO PUEDE SER MENOR AL PRECIO DE COMPRA, SE HA DETECTADO QUE LA MONEDA DE COMPRA"+
                                      " ES DIFERENTE A LA DEL PRODUCTO, VERIFIQUE EL VALOR DE CAMBIO");
                $("#txt-Num_Precio").val($("#txt-Num_PrecioCompra_Uni").val() * g_Data_Pagina.Num_Cambio_Operacional);
            }else
            {
                Ejecutar_Modal_Error("NUEVO PRECIO NO PUEDE SER MENOR AL PRECIO DE COMPRA");
                $("#txt-Num_Precio").val($("#txt-Num_PrecioCompra_Uni").val());
            }
            
            
            return false;
        }

        return true;
    }

    function Limpiar_Tabla_Productos()
    {
        g_List_Producto_Stock = [];
        CargarTablaGenerica("data-table-stock", [],false);
    }

    function Go_Funciones()
    {
        Data_Crear();
        var l_Tipo_Descuento_Producto = 12;
        Get_Parametros_Sistema(l_Tipo_Descuento_Producto);
        Get_Producto();
        
    }

    function Get_Validacion_Tipo_Cambio_Fecha(p_Tip_Moneda=0) 
    {

        var l_Request = {
            Tip_Moneda: p_Tip_Moneda
        }
        var l_Response = GetActionJquery(l_Request,BASE_URL+"public/generico/Get_Validacion_Tipo_Cambio_Fecha");

        l_Response.success(function(data){
            if (!data.Error.flagerror) {                
                g_Flg_Ejecucion = true;
            }else{

                g_Flg_Ejecucion = false;
                Ejecutar_Modal_Error_Accion(
                    data.Error.messages
                    ,function(){
                        g_Data_Pagina.Moneda_Compra.Cod_Moneda = 0;
                        $("#lst-Tip_Moneda").val(g_Data_Pagina.Moneda_Compra.Cod_Moneda);
                        window.open(BASE_URL+"public/parsistema/config/7", '_blank');
                    }
                );

            } 
        });
        l_Response.error(function(){
            alert("ERROR 500");
        });

    }

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

    $("#lst-Tip_Moneda").change(function(e){

        var l_Id = $("#lst-Tip_Moneda").val();
        
        if( g_List_Producto_Stock.length == 0 )
        {
            g_Data_Pagina.Moneda_Compra = g_Data_Pagina.List_Moneda[l_Id];
        }
        else
        {
            Ejecutar_Modal_Error_Accion(
                "YA EXISTEN, PRODUCTOS EN LA TABLA, LIMPIAR LA TABLA O SEGUIR CON LA OPERACION"
                ,Limpiar_Tabla_Productos
                ,function(){ $("#lst-Tip_Moneda").val(g_Data_Pagina.Moneda_Compra.Cod_Moneda); }
                );
        }

        Get_Validacion_Tipo_Cambio_Fecha(l_Id);
        
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

    $(document).on('blur', '#txt-Num_PrecioCompra_Uni', function (e) {

        Establecer_Precio(1);
    });

    $(document).on('blur', '#txt-Num_PrecioCompra_Tot', function (e) {

        Establecer_Precio(2);
    });

    $(document).on('blur', '#txt-Num_Cantidad', function (e) {

        Establecer_Precio(3);
    });

    $(document).on('blur', '#txt-Num_ValDescuento,#txt-Num_PrecioCompra_Uni,#txt-Num_PrecioCompra_Tot,#txt-Num_Cantidad,#txt-Num_Precio', function (e) {

        
        Evaluar_Data_Formulario_Detalle(
             $("#txt-Num_Cantidad").val()
            ,$("#txt-Num_PrecioCompra_Tot").val()
            ,$("#txt-Num_PrecioCompra_Uni").val()
            ,$("#lst-Tip_Descuento").val()
            ,$("#txt-Num_ValDescuento").val()
            ,$("#lst-Flg_ModPrecio").val()
            ,$("#txt-Num_Precio").val()
        );

    });

    $(document).on('change', '.lst-opciones', function (e) {

        var l_Id = $(this).attr("id");
        var l_Opcion = $("#" + l_Id).val();
        
        $("#" + g_Item_Seleccionado).val(0);

        Ejecutar_Accion(l_Opcion,l_Id);

        g_Item_Seleccionado = l_Id;

    });

    $("#btn-guardar").click(function(e){
        Set_Compra();
    });

    $(document).on('change','.class-stock-variacion',function(e){
        var l_Id = $(this).attr("id");
        var l_val = Number($("#"+l_Id).val());
        var l_Num_Cantidad = Number($("#txt-Num_Cantidad").val());

        $("#txt-Num_Cantidad").val(l_Num_Cantidad + l_val);
        Establecer_Precio(3);
    });


    Go_Funciones();

});
</script>

<style>
	select{
		font-family: fontAwesome
	}
</style>