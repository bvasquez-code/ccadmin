<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
</ol>

<input type="hidden" id="h_crear" value="0">
<input type="hidden" id="h_listar" value="1">


<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">CLIENTES <small></small></h1>
<!-- end page-header -->
<br>
<!-- begin row -->

<div class="col-xs-12">

    <div class="row">
        <div class="col-md-4">
            <a id="btn-nuevo" href="<?=base_url("public/cliente/crear")?>" class="btn btn-primary btn-block m-b-5"><i class="fa fa-cogs"></i> NUEVO</a>            
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4 col-sm-4">
            <input class="form-control" type="text" id="txt-Cod_Documento" name="txt-Cod_Documento" placeholder="NUMERO DOCUMENTO CLIENTE" value="">
        </div>
        <div class="col-md-2 col-sm-2">
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
        CLIENTES
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
                    </div>
                </div>
            </div>

            <table id="data-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Cod Documento</th>
                        <th>Cliente</th>
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
<!-- ==================  END JS FUNCIONES ================== -->

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
    var g_Tip_Busqueda = 2; //Tipo de busqueda para listar

    var g_OpcionesTabla = [
        [0,"[--OPCIONES--]"],
        ["ver","&#xf002;  -  VER "]   
    ];

    function Get_List_Cliente(p_Des_Busqueda = "")
    {
        Abrir_Dialogo_Carga();
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
                Des_Busqueda : p_Des_Busqueda
            }
        };

        var l_Response = GetActionJquery(l_Request,BASE_URL+"public/cliente/Get_List_Cliente");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {

                $.each(data.Resultado.List_Resultado, function (i, item) {

                    l_OpcionesTabla = g_OpcionesTabla;
                    l_OpcionesHtml = CrearComboBoxGenerico(l_OpcionesTabla,"lst-opciones",item.Id_Cliente,item.Tip_Persona,"opciones");
                    
                    l_RowTabla = [
                        Number(data.Resultado.Num_RegistroIni+i+1),
                        item.Cod_Documento,
                        item.Des_Cliente,
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

    $("#btn-buscar").click(function(e){

        Get_List_Cliente($("#txt-Cod_Documento").val());
        
    });

    $(document).on('click', '.paginate_button_a', function (e) {        
        var l_Id = $(this).attr("Id");
        g_Num_Pagina = Get_Num_Pagina_Seleccionada(l_Id,g_Num_Pagina);
        Get_List_Cliente($("#txt-Cod_Documento").val());
    });

    Get_List_Cliente();
});
</script>   