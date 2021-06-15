<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
</ol>

<input type="hidden" id="h_crear" value="0">
<input type="hidden" id="h_listar" value="1">

<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">CAJAS <small></small></h1>
<!-- end page-header -->
<div class="row">
    <div class="col-md-4">
        <a id="btn-nuevo" href="<?=base_url("public/caja/crear")?>" class="btn btn-primary btn-block m-b-5"><i class="fa fa-cogs"></i> NUEVO</a>            
    </div>
</div>
<br>
<!-- begin row -->
<div class="col-xs-12">
    <div class="clearfix">
        <div class="pull-right tableTools-container"><div class="dt-buttons btn-overlap btn-group"><a class="dt-button buttons-collection buttons-colvis btn btn-white btn-primary btn-bold" tabindex="0" aria-controls="dynamic-table" data-original-title="" title=""><span><i class="fa fa-search bigger-110 blue"></i> <span class="hidden">Show/hide columns</span></span></a><a class="dt-button buttons-copy buttons-html5 btn btn-white btn-primary btn-bold" tabindex="0" aria-controls="dynamic-table" data-original-title="" title=""><span><i class="fa fa-copy bigger-110 pink"></i> <span class="hidden">Copy to clipboard</span></span></a><a class="dt-button buttons-csv buttons-html5 btn btn-white btn-primary btn-bold" tabindex="0" aria-controls="dynamic-table" data-original-title="" title=""><span><i class="fa fa-database bigger-110 orange"></i> <span class="hidden">Export to CSV</span></span></a><a class="dt-button buttons-print btn btn-white btn-primary btn-bold" tabindex="0" aria-controls="dynamic-table" data-original-title="" title=""><span><i class="fa fa-print bigger-110 grey"></i> <span class="hidden">Print</span></span></a></div></div>
    </div>
    <div class="table-header">
        CAJAS
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
                        <th>Cod Caja</th>
                        <th>Caja</th>
                        <th>Usuario</th>
                        <th>Tienda</th>
                        <th>Estado</th>
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
        ["asignar","&#xf044;  -  ASIGNAR USUARIO "],
        ["inactivar","&#xf1f8;  -  INACTIVAR "]
    ];
    var g_OpcionesTabla_Inactiva = [
        [0,"[--OPCIONES--]"],
        ["ver","&#xf002;  -  VER "],
        ["activar","&#xf1f8;  -  ACTIVAR "]
    ];


    function Get_List_Caja(p_Des_Busqueda="")
    {
        var l_OpcionesHtml = "";
        var l_DataTabla = [];
        var l_RowTabla = [];
        var l_OpcionesTabla = [];
        var l_Html_Estado = "";
        var l_Html_User = "";

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

        var l_Response = GetActionJquery(l_Request,BASE_URL+"public/caja/Get_List_Caja");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {

                $.each(data.Resultado.List_Resultado, function (i, item) {

                    
                    if ( item.Flg_Estado == true ) 
                    {
                        l_Html_Estado = '<span class="label label-sm label-success" style="background: #6f6fed;">Activo</span>';
                        l_OpcionesTabla = g_OpcionesTabla;
                    }
                    if ( item.Flg_Estado == false ) 
                    {
                        l_Html_Estado = '<span class="label label-sm label-inverse arrowed-in">Inactivo</span>';
                        l_OpcionesTabla = g_OpcionesTabla_Inactiva;
                    }

                    l_Html_User = (item.Flg_UserCaja) ? item.Des_Usuario : '<h6 style="color: red;">'+item.Des_Usuario+'</h6>';

                    l_OpcionesHtml = CrearComboBoxGenerico(l_OpcionesTabla,"lst-opciones",item.Id_Caja,item.Id_Caja,"opciones");
                    

                    l_RowTabla = [
                        Number(data.Resultado.Num_RegistroIni+i+1),
                        item.Cod_Caja,
                        item.Des_Caja,
                        l_Html_User,
                        item.Des_Tienda,
                        l_Html_Estado,
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

    function Ejecutar_Accion( p_Tip_Opcion = 0 , p_Id_Opcion = 0)
    {
        if( p_Tip_Opcion == "editar" )
        {
            window.location.href = BASE_URL+"public/caja/crear/"+p_Id_Opcion;
        }

    }

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
        Get_List_Caja($("#txt-busqueda").val());
    });

    $("#txt-busqueda").keypress(function(e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if(code==13){
            g_Num_Pagina = 1;
            Get_List_Caja($("#txt-busqueda").val());
        }
    });

    Get_List_Caja("");

});
</script>    