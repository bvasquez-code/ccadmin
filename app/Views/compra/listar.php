<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
</ol>

<input type="hidden" id="h_crear" value="0">
<input type="hidden" id="h_listar" value="1">

<input type="hidden" id="h_Flg_Carrito_Cargado" value="<?php if(!empty($Flg_Carrito_Cargado)){ echo $Flg_Carrito_Cargado;}?>">

<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">TRANSACCIONES DE COMPRA <small></small></h1>
<!-- end page-header -->
<br>
<!-- begin row -->

<div class="col-xs-12">

    <div class="row">
        <div class="col-md-4">
            <a id="btn-nuevo" href="<?=base_url("public/compra/crear")?>" class="btn btn-primary btn-block m-b-5"><i class="fa fa-cogs"></i> NUEVO</a>            
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
            <input class="form-control" type="text" id="txt-Des_Busqueda" name="txt-Des_Busqueda" value="" placeholder="Codigo automatico o externo">
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
                        <!-- <label>Search:<input type="search" id="txt-busqueda" class="form-control input-sm" placeholder="" aria-controls="dynamic-table"></label> -->
                    </div>
                </div>
            </div>

            <table id="data-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Codigo</th>
                        <th>Cod Externo</th>
                        <th>Total Original</th>
                        <th>Total Convertido</th>
                        <th>Proveedor</th>
                        <th>Estado</th>
                        <th>Stock</th>
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
<!-- ==================  END JS FUNCIONES ================== -->

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
    var g_Tip_Busqueda = 1; //Tipo de busqueda

    var g_OpcionesTabla = [
        [0,"[--OPCIONES--]"],
        ["ver","&#xf002;  -  VER "],
        ["editar","&#xf002;  -  EDITAR "],
        ["confirmarpago","&#xf002;  -  CONFIRMAR PAGO "]
    ];
    var g_OpcionesTabla_Procesados = [
        [0,"[--OPCIONES--]"],
        ["ver","&#xf002;  -  VER "]   
    ];
    var g_OpcionesTabla_Procesados_Stock = [
        [0,"[--OPCIONES--]"],
        ["ver","&#xf002;  -  VER "],
        ["procesarstock","&#xf002;  -  CONFIRMAR ENTRADA DE STOCK "]
    ];
    var g_OpcionesTabla_Error = [
        [0,"[--OPCIONES--]"],
        ["ver","&#xf002;  -  VER "],
        ["reprocesar","&#xf002;  -  REPROCESAR "]  
    ];

    function Get_List_Compra(p_Id_Tienda = 0,p_Des_Busqueda = "")
    {
        Abrir_Dialogo_Carga();
        var l_OpcionesHtml = "";
        var l_DataTabla = [];
        var l_RowTabla = [];
        var l_OpcionesTabla = [];
        var l_EstadoHtml = "";
        var l_EstadoHtml_Stock = "";


        var l_Request = {
            Paginacion: {
                Tip_Busqueda: g_Tip_Busqueda,
                Tip_Listado: g_Tip_Listado,
                Num_Seccion: g_Num_Pagina
            },
            Busqueda: {
                 Des_KeyOperacion : "Get_list"
                ,Id_Tienda : p_Id_Tienda
                ,Des_Busqueda : p_Des_Busqueda
            }
        };

        var l_Response = GetActionJquery(l_Request,BASE_URL+"public/compra/Get_List_Compra");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {

                $.each(data.Resultado.List_Resultado, function (i, item) {

                    l_EstadoHtml = "";
                    l_OpcionesHtml = "";
                    l_OpcionesTabla = [];

                    if( item.Flg_Estado_Transaccion == 1 )
                    { 
                        l_OpcionesTabla = g_OpcionesTabla;
                        l_EstadoHtml = '<span class="label label-sm label-inverse arrowed-in">'+item.Des_Estado_Transaccion+'</span>';
                    }
                    if( item.Flg_Estado_Transaccion == 2 )
                    { 
                        l_OpcionesTabla = g_OpcionesTabla_Procesados;
                        l_EstadoHtml = '<span class="label label-sm label-success">'+item.Des_Estado_Transaccion+'</span>';
                    }
                    if( item.Flg_Estado_Transaccion == 3 )
                    { 
                        l_OpcionesTabla = g_OpcionesTabla_Error;
                        l_EstadoHtml = '<span class="label label-sm label-success" style="background-color:red;">'+item.Des_Estado_Transaccion+'</span>';
                    }

                    if( item.Flg_Stock_Procesado == true )
                    {  
                        l_EstadoHtml_Stock = '<span class="label label-sm label-success">'+item.Des_Stock_Procesado+'</span>';
                    }
                    if( item.Flg_Stock_Procesado == false && item.Flg_Estado_Transaccion == 2)
                    { 
                        l_OpcionesTabla = g_OpcionesTabla_Procesados_Stock;
                        l_EstadoHtml_Stock = '<span class="label label-sm label-inverse arrowed-in">'+item.Des_Stock_Procesado+'</span>';   
                    }

                    l_OpcionesHtml = CrearComboBoxGenerico(l_OpcionesTabla,"lst-opciones",item.Id_Compra,item.Tip_Transaccion,"opciones");
                    
                    l_RowTabla = [
                        Number(data.Resultado.Num_RegistroIni+i+1),
                        item.Cod_Compra,
                        item.Cod_Externo,
                        item.Des_Total,
                        item.Des_Total_Convertido,
                        item.Des_Proveedor,
                        l_EstadoHtml,
                        l_EstadoHtml_Stock,
                        item.Fec_Registro,
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

    function Set_Confirmar_Llegada_Stock( p_Request )
    {
        Abrir_Dialogo_Carga();
        var l_Request = {};

        l_Request = {
             Id_Compra : p_Request.Id_Compra
            ,Id_Tienda : p_Request.Id_Tienda
            ,Tip_Documento : p_Request.Tip_Doc_Transaccion
        };

        var l_Response = SetActionJquery(l_Request,BASE_URL+"public/compra/Set_Confirmar_Llegada_Stock");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {
                bootbox.alert(
                    '<div class="row"><div class="col-sm-12"><h4 style="color:red;">OPERACIÓN REALIZADA CON EXITO </h4></div></div>'
                    , function(){ Get_List_Compra($("#lst-Id_Tienda").val(),$("#txt-Des_Busqueda").val());}
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

    function Ejecutar_Accion( p_Tip_Opcion = 0 , p_Id_Opcion = 0,p_Id_Opcion_2)
    {
        if( p_Tip_Opcion == "confirmarpago" )
        {
            window.location.href = BASE_URL+"public/compra/confirmar/"+p_Id_Opcion;
        }
        if( p_Tip_Opcion == "procesarstock" )
        {
            window.location.href = BASE_URL+"public/compra/stockfisico/"+p_Id_Opcion;
            // var l_Request = {
            //      Id_Compra : p_Id_Opcion
            //     ,Id_Tienda :$("#lst-Id_Tienda").val()
            //     ,Tip_Doc_Transaccion : p_Id_Opcion_2
            // };
            // Ejecutar_Modal_Validacion(
            //     "CONFIRMAR LLEGADA DE STOCK"
            //     ,"¿ESTA SEGURO QUE DESEA CONFIRMAR LA ENTRADA DE STOCK, PASARA HA ESTAR DISPONIBLE PARA LA COMPRA ?"
            //     ,"medium",
            //     Set_Confirmar_Llegada_Stock,
            //     l_Request
            // );

        }

    }

    $("#btn-buscar").click(function(e){
        l_Id = $("#lst-Id_Tienda").val();

        if( l_Id != 0 && l_Id != null)
        {
            Get_List_Compra($("#lst-Id_Tienda").val(),$("#txt-Des_Busqueda").val());
        }
    });

    $(document).on('click', '.paginate_button_a', function (e) {        
        var l_Id = $(this).attr("Id");
        g_Num_Pagina = Get_Num_Pagina_Seleccionada(l_Id,g_Num_Pagina);
        Get_List_Compra($("#lst-Id_Tienda").val(),$("#txt-Des_Busqueda").val());
    });

    $(document).on('change', '.lst-opciones', function (e) {

        var l_Id = $(this).attr("id");
        var l_Id2 = $(this).attr("id2");
        var l_Opcion = $("#" + l_Id).val();

        $("#" + g_Item_Seleccionado).val(0);

        Ejecutar_Accion(l_Opcion,l_Id,l_Id2);

        g_Item_Seleccionado = l_Id;

    });

});
</script>   