<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
</ol>

<input type="hidden" id="h_crear" value="0">
<input type="hidden" id="h_listar" value="1">

<input type="hidden" id="h_Flg_Carrito_Cargado" value="<?php if(!empty($Flg_Carrito_Cargado)){ echo $Flg_Carrito_Cargado;}?>">

<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">ADMINISTRADOR DE PROMOCIONES <small></small></h1>
<!-- end page-header -->
<br>
<!-- begin row -->

<div class="col-xs-12">

    <div class="row">
        <div class="col-md-4">
            <a id="btn-nuevo" href="<?=base_url("public/promo/crear")?>" class="btn btn-primary btn-block m-b-5"><i class="fa fa-cogs"></i> NUEVO</a>            
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4 col-sm-4">
            <select class="chosen-select form-control" id="lst-Id_Tienda" style="width: 100%;" data-placeholder="Choose a State...">
                <?php if(!empty($v_List_Tienda)){ ?>
                    <option value="0">[--SELECCIONE TIENDA--]</option>
                    <?php foreach($v_List_Tienda as $Item){ ?>
                        <option value="<?=$Item["Id_Tienda"]?>"><?="(".$Item["Cod_Tienda"].") ".$Item["Des_Tienda"]?></option>
                    <?php }?>
                <?php }?>      													                                         
            </select>
        </div>
        <div class="col-md-4 col-sm-4">
            <input class="form-control" type="text" id="txt-Cod_Producto" name="txt-Cod_Producto" placeholder="COD. PRODUCTO" value="">
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
        PREVENTAS REALIZADAS AL
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
                        <th>Codigo</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th>Periodo Duración</th>
                        <th>Lanzamiento</th>
                        <th>Escalabilidad</th>
                        <th>Nivel de Aplicación</th>
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
    var g_Tip_Busqueda = 1; //Tipo de busqueda

    var g_Item_Seleccionado = 0;

    var g_OpcionesTabla = [
        [0,"[--OPCIONES--]"],
        ["ver","&#xf002;  -  VER "],
        ["eliminar","&#xf002;  -  ELIMINAR"]  
    ];

    var g_OpcionesTabla_Inactivo = [
        [0,"[--OPCIONES--]"],
        ["ver","&#xf002;  -  VER "],
        ["activar","&#xf002;  -  ACTIVAR"],
        ["eliminar","&#xf002;  -  ELIMINAR"] 
    ];

    function Get_List_Promocion(p_Id_Tienda = 0,p_Des_Busqueda = "",p_Cod_Producto = "")
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
                Des_KeyBusqueda : "Search_List",
                Des_Busqueda : p_Des_Busqueda,
                Cod_Producto : p_Cod_Producto,
                Id_Tienda : p_Id_Tienda
            }
        };

        var l_Response = GetActionJquery(l_Request,BASE_URL+"public/promo/Get_List_Promocion");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {

                $.each(data.Resultado.List_Resultado, function (i, item) {
                    
                    if(item.Des_Estado.trim() == "ACTIVO")
                    {
                        l_Html_Estado = '<span class="label label-sm label-success" style="background: #6f6fed;">'+item.Des_Estado+'</span>';
                        l_OpcionesTabla = g_OpcionesTabla;
                    }else if(item.Des_Estado.trim() == "INACTIVA")
                    {
                        l_Html_Estado = '<span class="label label-sm label-success" style="background: #red;">'+item.Des_Estado+'</span>';
                        l_OpcionesTabla = g_OpcionesTabla_Inactivo;
                    }else
                    {
                        l_Html_Estado = '<span class="label label-sm label-inverse arrowed-in">'+item.Des_Estado+'</span>';
                        l_OpcionesTabla = g_OpcionesTabla_Inactivo;
                    }

                    l_OpcionesHtml = CrearComboBoxGenerico(l_OpcionesTabla,"lst-opciones",item.Id_Promocion,item.Id_Promocion,"opciones");

                    
                    l_RowTabla = [
                        Number(data.Resultado.Num_RegistroIni+i+1),
                        item.Cod_Promocion,
                        item.Des_Promocion,
                        l_Html_Estado,
                        item.Fec_Inicio+" - "+item.Fec_Fin,
                        item.Des_Automatica,
                        item.Des_Escalable,
                        item.Des_NivelAplicacion,
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

    function Set_Confirmar_Promocion(p_Id_Promocion = 0)
    {
        var l_Request = {
            Id_Promocion : p_Id_Promocion
        };

        var l_Response = GetActionJquery(l_Request,BASE_URL+"public/promo/Set_Confirmar_Promocion");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {
                Get_List_Promocion($("#lst-Id_Tienda").val(),$("#txt-busqueda").val(),$("#txt-Cod_Producto").val());
            }else{
                Ejecutar_Modal_Error(data.Error.messages);
            } 
        });
        l_Response.error(function(){
            alert("ERROR 500");
        }); 
    }

    function Set_Eliminar_Promocion(p_Id_Promocion = 0)
    {
        var l_Request = {
            Id_Promocion : p_Id_Promocion
        };

        var l_Response = GetActionJquery(l_Request,BASE_URL+"public/promo/Set_Eliminar_Promocion");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {
                Get_List_Promocion($("#lst-Id_Tienda").val(),$("#txt-busqueda").val(),$("#txt-Cod_Producto").val());
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
        if(p_Tip_Opcion == "activar")
        {
            Ejecutar_Modal_Validacion("CONFIRMAR PROMOCIÓN","¿ESTA SEGURO QUE DESEA CONFIRMAR ESTA PROMOCIÓN?","medium",Set_Confirmar_Promocion,p_Id_Opcion);

        }
        if(p_Tip_Opcion == "eliminar")
        {
            Ejecutar_Modal_Validacion("ELIMINAR PROMOCIÓN","¿ESTA SEGURO QUE DESEA ELIMINAR LA PROMOCIÓN?","medium",Set_Eliminar_Promocion,p_Id_Opcion);
        }

    }

    $("#btn-buscar").click(function(e){

        var l_Id_Tienda = $("#lst-Id_Tienda").val();

        if( l_Id_Tienda > 0 && l_Id_Tienda != null)
        {
            Get_List_Promocion(l_Id_Tienda,$("#txt-busqueda").val(),$("#txt-Cod_Producto").val());
        }
        
    });

    $(document).on('click', '.paginate_button_a', function (e) {        
        var l_Id = $(this).attr("Id");
        g_Num_Pagina = Get_Num_Pagina_Seleccionada(l_Id,g_Num_Pagina);
        Get_List_Promocion($("#lst-Id_Tienda").val(),$("#txt-busqueda").val(),$("#txt-Cod_Producto").val());
    });

    $("#txt-busqueda").keypress(function(e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if(code==13){
            g_Num_Pagina = 1;
            Get_List_Promocion($("#lst-Id_Tienda").val(),$("#txt-busqueda").val(),$("#txt-Cod_Producto").val());
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