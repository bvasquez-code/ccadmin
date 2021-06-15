<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
</ol>

<input type="hidden" id="h_crear" value="0">
<input type="hidden" id="h_listar" value="1">

<input type="hidden" id="h_Flg_Carrito_Cargado" value="<?php if(!empty($Flg_Carrito_Cargado)){ echo $Flg_Carrito_Cargado;}?>">

<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">STOCK MANUAL <small></small></h1>
<!-- end page-header -->
<div class="row">
    <div class="col-md-4">
        <a id="btn-nuevo" href="<?=base_url("public/stockmanual/crear")?>" class="btn btn-primary btn-block m-b-5"><i class="fa fa-cogs"></i> NUEVO</a>            
    </div>
</div>
<br>
<!-- begin row -->

<div class="col-xs-12">

    <br>
    <div class="table-header">
        CARGAS REALIZADAS
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
                        <th>Operación</th>
                        <th>Cod Autogenerado</th>
                        <th>Cod Manual</th>
                        <th>Tienda</th>
                        <th>Estado</th>
                        <th>Fecha Registro</th>
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
    var g_Tip_Listado = 1; // Tipo de listado para tablas
    var g_Tip_Busqueda = 1; //Tipo de busqueda para productos

    var g_OpcionesTabla = [
        [0,"[--OPCIONES--]"],
        ["ver","&#xf002;  -  VER "],
        ["editar","&#xf044;  -  EDITAR "],
        ["confirmar","&#xf044;  -  CONFIRMAR CARGA STOCK"],
        ["eliminar","&#xf1f8;  -  ELIMINAR "]
    ];


    function Get_Carga_Stock()
    {
        var l_OpcionesHtml = "";
        var l_DataTabla = [];
        var l_RowTabla = [];
        var l_OpcionesTabla = [];

        var l_Html_Estado = "";
        var l_Html_Tip_Operacion = "";

        var l_Request = {
            Paginacion: {
                Tip_Busqueda: g_Tip_Busqueda,
                Tip_Listado: g_Tip_Listado,
                Num_Seccion: g_Num_Pagina
            },
            Busqueda: {
                Busqueda_CategoriaProducto: {
                }
            }
        };

        var l_Response = GetActionJquery(l_Request,BASE_URL+"public/stockmanual/Get_Carga_Stock");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {

                $.each(data.Resultado.List_Resultado, function (i, item) {

                    l_OpcionesTabla = g_OpcionesTabla;
                    
                    if(item.Flg_EstadoOpeCom == false) l_Html_Estado = '<span class="label label-sm label-inverse arrowed-in">'+item.Des_EstaOpeCom+'</span>';
                    if(item.Flg_EstadoOpeCom == true) l_Html_Estado = '<span class="label label-sm label-success">'+item.Des_EstaOpeCom+'</span>';
                    if( item.Des_KeyOpeComercial=="Initial_Stock" ) l_Html_Tip_Operacion = '<span class="label label-info arrowed-right arrowed-in">'+item.Des_KeyOpeComercial+'</span>';
                    if( item.Des_KeyOpeComercial=="Add_Stock" ) l_Html_Tip_Operacion = '<span class="label label-warning arrowed arrowed-right">'+item.Des_KeyOpeComercial+'</span>'

                    l_OpcionesHtml = CrearComboBoxGenerico(l_OpcionesTabla,"lst-opciones",item.Id_OtrOpeComerciales,item.Id_OtrOpeComerciales,"opciones");
                    l_RowTabla = [
                        Number(data.Resultado.Num_RegistroIni+i+1),
                        l_Html_Tip_Operacion,
                        item.Cod_OtrOpeComerciales,
                        item.Cod_Manual,
                        item.Des_Tienda,
                        l_Html_Estado,
                        item.Fec_Registro,              
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

    function Ejecutar_Accion( p_Tip_Opcion = 0 , p_Id_Opcion = 0)
    {
        if( p_Tip_Opcion == "confirmar" )
        {
            window.location.href = BASE_URL+"public/stockmanual/confirmar/"+p_Id_Opcion;
        }

    }

    Get_Carga_Stock();
    
    $(document).on('click', '.paginate_button_a', function (e) {        
        var l_Id = $(this).attr("Id");
        g_Num_Pagina = Get_Num_Pagina_Seleccionada(l_Id,g_Num_Pagina);
        Get_Carga_Stock();
    });

    $("#txt-busqueda").keypress(function(e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if(code==13){
            g_Num_Pagina = 1;
            Get_Carga_Stock();
        }
    });

    $(document).on('change', '.lst-opciones', function (e) {

        var l_Id = $(this).attr("id");
        var l_Opcion = $("#" + l_Id).val();

        $("#" + g_Item_Seleccionado).val(0);

        Ejecutar_Accion(l_Opcion,l_Id);

        g_Item_Seleccionado = l_Id;

    });

});
</script>    