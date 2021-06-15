<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
</ol>

<input type="hidden" id="h_crear" value="0">
<input type="hidden" id="h_listar" value="1">

<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">TALONARIOS <small></small></h1>
<!-- end page-header -->
<div class="row">
<div class="col-md-4">
        <a id="btn-nuevo" href="<?=base_url("public/talonario/crear")?>" class="btn btn-primary btn-block m-b-5"><i class="fa fa-cogs"></i> NUEVO</a>            
    </div>
</div>
<br>
<!-- begin row -->
<div class="col-xs-12">

    <div class="table-header">
        TALONARIOS
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
                        <th>Serie</th>
                        <th>Tipo</th>
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

 <!-- ==================  JS FUNCIONES XML ================== -->
 <script src="<?php echo base_url('assets/complement/xmltojson.js'); ?>"></script>
<!-- ================== END JS FUNCIONES XML ================== -->

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

    g_Num_eliminar = 3; 
    g_Num_inactivar = 4; 
    g_Num_activar = 5;

    var g_OpcionesTabla = [
        [0,"[--OPCIONES--]"],
        ["ver","&#xf002;  -  VER "],
        ["editar","&#xf002;  -  EDITAR "],
        ["desactivar","&#xf002;  -  DESACTIVAR "],
        ["eliminar","&#xf002;  -  ELIMINAR "] 
    ];

    var g_OpcionesTabla_Inactiva = [
        [0,"[--OPCIONES--]"],
        ["ver","&#xf002;  -  VER "],
        ["activar","&#xf002;  -  ACTIVAR "] 
    ];


    function Get_List_Talonario(p_Des_Busqueda = "")
    {
        var l_OpcionesHtml = "";
        var l_DataTabla = [];
        var l_RowTabla = [];
        var l_OpcionesTabla = [];
        var l_Html_Estado = "";

        var l_Request = {
            Paginacion: {
                Tip_Busqueda: g_Tip_Busqueda,
                Tip_Listado: g_Tip_Listado,
                Num_Seccion: g_Num_Pagina
            },
            Busqueda: {
                Des_KeyBusqueda : "Search_List_Checkbook",
                BusquedaTalonario : {
                    Des_Busqueda : p_Des_Busqueda
                }
            }
        };

        var l_Response = GetActionJquery(l_Request,BASE_URL+"public/talonario/Get_List_Talonario");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {

                $.each(data.Resultado.List_Resultado, function (i, item) {

                   

                    if ( item.Flg_Estado == true ) 
                    {
                        l_Html_Estado = '<span class="label label-sm label-success" style="background: #6f6fed;">'+item.Des_Estado+'</span>';
                        l_OpcionesTabla = g_OpcionesTabla;
                    }
                    if ( item.Flg_Estado == false ) 
                    {
                        l_Html_Estado = '<span class="label label-sm label-inverse arrowed-in">'+item.Des_Estado+'</span>';
                        l_OpcionesTabla = g_OpcionesTabla_Inactiva;
                    }

                    l_OpcionesHtml = CrearComboBoxGenerico(l_OpcionesTabla,"lst-opciones",item.Id_Talonario,item.Id_Talonario,"opciones");

                    l_RowTabla = [
                        Number(data.Resultado.Num_RegistroIni+i+1),
                        item.Cod_SerieTalonario,
                        item.Des_DocTalonario,
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

    function Set_Estado_Talonario(p_Id_Talonario = 0,p_Tip_Accion = 0)
    {
        var l_Request = {
            Id_Talonairo : p_Id_Talonario,
            Tip_Accion : p_Tip_Accion
        };

        var l_Response = SetActionJquery(l_Request,BASE_URL+"public/talonario/Set_Estado_Talonario");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {
                Get_List_Talonario();
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
            window.location.href = BASE_URL+"public/talonario/crear/"+p_Id_Opcion;
        }
        if( p_Tip_Opcion == "activar" )
        {
            Ejecutar_Modal_Validacion(
                "CONFIRMAR ACCIÓN"
                ,"¿ESTA SEGURO QUE DESEA ACTIVAR ESTE TALONARIO?"
                ,"medium"
                ,Set_Estado_Talonario,p_Id_Opcion,g_Num_activar);
        }
        if( p_Tip_Opcion == "desactivar" )
        {
            Ejecutar_Modal_Validacion(
                "CONFIRMAR ACCIÓN"
                ,"¿ESTA SEGURO QUE DESEA DESACTIVAR ESTE TALONARIO?"
                ,"medium"
                ,Set_Estado_Talonario,p_Id_Opcion,g_Num_inactivar);
        }
        if( p_Tip_Opcion == "eliminar" )
        {
            Ejecutar_Modal_Validacion(
                "CONFIRMAR ACCIÓN"
                ,"¿ESTA SEGURO QUE DESEA ELIMINAR ESTE TALONARIO?"
                ,"medium"
                ,Set_Estado_Talonario,p_Id_Opcion,g_Num_eliminar);
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
        Get_List_Talonario($("#txt-busqueda").val());
    });

    $("#txt-busqueda").keypress(function(e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if(code==13){
            g_Num_Pagina = 1;
            Get_List_Talonario($("#txt-busqueda").val());
        }
    });

    Get_List_Talonario();

});
</script>    