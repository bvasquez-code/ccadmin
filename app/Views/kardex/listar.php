<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
</ol>

<input type="hidden" id="h_crear" value="0">
<input type="hidden" id="h_listar" value="1">

<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">MOVIMIENTOS - KARDEX <small></small></h1>
<!-- end page-header -->
<div class="row">
    <div class="col-md-4">
        <a id="btn-nuevo" class="btn btn-primary btn-block m-b-5"><i class="fa fa-search"></i> BUSQUEDA AVANZADA </a>            
    </div>
</div>
<br>
<!-- begin row -->
<div class="col-xs-12">
<div class="row">
        <div class="col-md-3 col-sm-3">
            <select class="chosen-select form-control" id="lst-Tip_VentaDoc" style="width: 100%;" data-placeholder="Choose a State...">
                <option value="0">[-- DOCUMENTO VENTA --]</option>
                <?php if(!empty($List_Documento_Venta)){ echo print_r($List_Documento_Venta);?>
                    <?php foreach($List_Documento_Venta as $Item){ ?>
                        <option value="<?=$Item["Cod_ParSis"]?>"><?=$Item["Des_ParSis_Nom"]?></option>
                    <?php }?>
                <?php }?>    													                                         
            </select>
        </div>
        <div class="col-md-3 col-sm-3">
            <input class="form-control" type="text" id="txt-Cod_Transaccion" name="txt-Cod_Transaccion" placeholder="COD. DOCUMENTO" value="">
        </div>
        <div class="col-md-3 col-sm-3">
            <input class="form-control" type="text" id="txt-Cod_Producto" name="txt-Cod_Producto" placeholder="COD. PRODUCTO (SKU)" value="">
        </div>
        <div class="col-md-3 col-sm-3">
            <div class="dt-buttons btn-overlap btn-group">
                <a class="dt-button buttons-collection buttons-colvis btn btn-white btn-primary btn-bold" id="btn-buscar" title="Buscar">
                    <span><i class="fa fa-search bigger-110 blue"></i> 
                    <span class="hidden">Show/hide columns</span></span>
                </a>
                <a class="dt-button buttons-collection buttons-colvis btn btn-white btn-primary btn-bold" id="btn-limpiar" title="Eliminar">
                    <span><i class="fa fa-times bigger-110 blue"></i> 
                    <span class="hidden">Show/hide columns</span></span>
                </a>
            </div>
        </div>
    </div>
    <br>
    <div class="table-header">
        MOVIMIENTOS - KARDEX
    </div>

    <!-- div.table-responsive -->

    <!-- div.dataTables_borderWrap -->
    <div>
        <div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline no-footer">
            <div class="row"><div class="col-xs-6">
                <div class="dataTables_length" id="dynamic-table_length">
                <label>Display <select name="dynamic-table_length" aria-controls="dynamic-table" class="form-control input-sm">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select> records</label></div></div>
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
                        <th style="width: 30%;">Producto</th>
                        <th>Movimiento</th>                        
                        <th>N° Unidades</th>
                        <th>Stock Pos-Operación</th>
                        <th>Cod. Documento</th>
                        <th>Cod. Operacion</th>
                        <th>Fecha</th>
                        <th>Tip Movimiento</th>
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
    var g_Accion_Ejecutable = true;
    var g_Item_Seleccionado = 0;

    var g_Num_Pagina = 1; // Pagina por defecto
    var g_Tip_Listado = 2; // Tipo de listado para tablas
    var g_Tip_Busqueda = 1; //Tipo de busqueda para productos


    function Get_List_Mov_Kardex(p_Cod_Producto = "" , p_Tip_Transaccion = 0, p_Cod_Transaccion = "", p_Id_Producto = 0, p_Id_Transaccion = 0)
    {
        var l_OpcionesHtml = "";
        var l_DataTabla = [];
        var l_RowTabla = [];
        var l_OpcionesTabla = [];

        var l_Tip_DesMovHtml = "";
        var l_Tip_OpeComerHtml = "";
        var l_Num_CantidadHtml = "";

        var l_Request = {
            Paginacion: {
                Tip_Busqueda: g_Tip_Busqueda,
                Tip_Listado: g_Tip_Listado,
                Num_Seccion: g_Num_Pagina
            },
            Busqueda: {
                Id_Transaccion : p_Id_Transaccion, 
                Cod_Transaccion : p_Cod_Transaccion,
                Tip_Transaccion : p_Tip_Transaccion, 
                Id_Producto : p_Id_Producto,
                Cod_Producto : p_Cod_Producto
            }
        };

        var l_Response = GetActionJquery(l_Request,BASE_URL+"public/kardex/Get_List_Mov_Kardex");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {

                $.each(data.Resultado.List_Resultado, function (i, item) {
                    
                    l_Num_CantidadHtml = item.Num_Cantidad;

                    if( item.Num_Cantidad > 0 ) 
                    {
                        l_Tip_DesMovHtml = '<span class="label label-sm label-info arrowed arrowed-righ">Entrada_Stock</span>';
                        l_Num_CantidadHtml = "+" + l_Num_CantidadHtml;
                    }
                    if( item.Num_Cantidad < 0 ) l_Tip_DesMovHtml = '<span class="label label-danger arrowed">  Salida_Stock  </span>';
                    if ( item.Num_Cantidad == 0 ) l_Tip_DesMovHtml = '';
                    
                    if ( item.Tip_Transaccion == 9 ) l_Tip_OpeComerHtml = '<span class="label label-sm label-warning" style="background-color: #c64a4a;font-size: 13px;">'+item.Des_KeyTransaccion+'</span>';
                    if ( item.Tip_Transaccion == 10 ) l_Tip_OpeComerHtml = '<span class="label label-sm label-warning" style="background-color: #6868b6;font-size: 13px;">'+item.Des_KeyTransaccion+'</span>';
                    if ( item.Tip_Transaccion == 3 ) l_Tip_OpeComerHtml = '<span class="label label-sm label-success" style="font-size: 13px;">'+item.Des_KeyTransaccion+'</span>';
                    if ( item.Tip_Transaccion == 2 ) l_Tip_OpeComerHtml = '<span class="label label-sm label-success" style="font-size: 13px;">'+item.Des_KeyTransaccion+'</span>';
                    if ( item.Tip_Transaccion == 5 ) l_Tip_OpeComerHtml = '<span class="label label-sm label-success" style="background-color: #837ff0;font-size: 13px;">'+item.Des_KeyTransaccion+'</span>';

                    l_RowTabla = [
                        Number(data.Resultado.Num_RegistroIni+i+1),
                        "(" + item.Cod_Producto + ")" + item.Des_Producto,
                        l_Tip_DesMovHtml,                        
                        '<b class="green">'+l_Num_CantidadHtml+'</b>',
                        '<b class="blue">'+item.Num_CantidadPosOperacion+'</b>',
                        item.Cod_Documento,
                        item.Cod_Transaccion,
                        item.Fec_Registro,
                        l_Tip_OpeComerHtml,
                        
                    ];
                    l_DataTabla.push(l_RowTabla);
                    l_Tip_OpeComerHtml = "";

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
    
    $(document).on('click', '.paginate_button_a', function (e) {        
        var l_Id = $(this).attr("Id");
        g_Num_Pagina = Get_Num_Pagina_Seleccionada(l_Id,g_Num_Pagina);
        Get_List_Mov_Kardex($("#txt-Cod_Producto").val(),$("#lst-Tip_VentaDoc").val(),$("#txt-Cod_Transaccion").val());
    });

    $("#btn-buscar").click(function(e){

        g_Num_Pagina = 1;
        Get_List_Mov_Kardex($("#txt-Cod_Producto").val(),$("#lst-Tip_VentaDoc").val(),$("#txt-Cod_Transaccion").val());

    });

    $("#btn-limpiar").click(function(e){
        location.reload();
    });

    Get_List_Mov_Kardex();

});
</script>    