<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
</ol>

<input type="hidden" id="h_crear" value="0">
<input type="hidden" id="h_listar" value="1">

<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">PROCESOS AUTOMATICOS <small></small></h1>
<!-- end page-header -->

<br>
<!-- begin row -->
<div class="col-xs-12">
    <div class="clearfix">
        <div class="pull-right tableTools-container"><div class="dt-buttons btn-overlap btn-group"><a class="dt-button buttons-collection buttons-colvis btn btn-white btn-primary btn-bold" tabindex="0" aria-controls="dynamic-table" data-original-title="" title=""><span><i class="fa fa-search bigger-110 blue"></i> <span class="hidden">Show/hide columns</span></span></a><a class="dt-button buttons-copy buttons-html5 btn btn-white btn-primary btn-bold" tabindex="0" aria-controls="dynamic-table" data-original-title="" title=""><span><i class="fa fa-copy bigger-110 pink"></i> <span class="hidden">Copy to clipboard</span></span></a><a class="dt-button buttons-csv buttons-html5 btn btn-white btn-primary btn-bold" tabindex="0" aria-controls="dynamic-table" data-original-title="" title=""><span><i class="fa fa-database bigger-110 orange"></i> <span class="hidden">Export to CSV</span></span></a><a class="dt-button buttons-print btn btn-white btn-primary btn-bold" tabindex="0" aria-controls="dynamic-table" data-original-title="" title=""><span><i class="fa fa-print bigger-110 grey"></i> <span class="hidden">Print</span></span></a></div></div>
    </div>
    <div class="table-header">
        LISTA DE PROCESOS
    </div>

    <!-- div.table-responsive -->

    <!-- div.dataTables_borderWrap -->
    <div>
        <table id="data-table" class="table  table-bordered table-hover">
            <thead>
                <tr>
                    <th>ITEM</th>
                    <th>PROCESO</th>
                    <th>ESPECIFIACIONES</th>
                    <th>
                        <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
                        ULTIMA EJECUCION
                    </th>
                    <th>
                        <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
                        PROXIMA EJECUCION
                    </th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
            </tbody>
        </table>
    </div>
</div>

<!-- end row -->

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
    var g_Tip_Busqueda = 1; //Tipo de busqueda

    function Get_List_Procesos()
    {
        var l_OpcionesHtml = "";
        var l_DataTabla = [];
        var l_RowTabla = [];
        var l_Html_Estado = "";

        var l_Request = {};

        var l_Response = GetActionJquery(l_Request,BASE_URL+"public/proceso/Get_List_Procesos");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {
                

                $.each(data.Resultado.List_Resultado, function (i, item) {

                    l_OpcionesHtml = "";
                    l_OpcionesHtml = '<a id="'+item.Id_Proceso+'" type="button" class="btn-ejecutar btn btn-danger"><i class="ace-icon fa fa-check"></i> EJECUTAR AHORA</a>';
                    
                    l_RowTabla = [
                        Number(i+1),
                        item.Des_Proceso,
                        item.Des_Proceso_Detalle,
                        item.Fec_Ultima_Ejecucion,
                        item.Fec_Proxima_Ejecucion,
                        l_OpcionesHtml
                    ];
                    l_DataTabla.push(l_RowTabla);

                });
                CargarTablaGenerica("data-table", l_DataTabla,false);

            }else{
                alert(data.Error.messages);
            } 
        });
        l_Response.error(function(){
            alert("ERROR 500");
        }); 
    }

    function Ejecutar_Proceso(p_Id_Proceso = 0)
    {
        var l_Request = {
            Id_Proceso : p_Id_Proceso
        };

        var l_Response = SetActionJquery(l_Request,BASE_URL+"public/proceso/Ejecutar_Proceso");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {
                Get_List_Procesos();
            }else{
                alert(data.Error.messages);
            } 
        });        
    }

    Get_List_Procesos();


    $(document).on('click', '.btn-ejecutar', function (e) {

        var l_Id = $(this).attr("Id");

        Ejecutar_Proceso(l_Id);
    });


});
</script>  