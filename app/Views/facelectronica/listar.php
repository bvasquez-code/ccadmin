<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
</ol>

<input type="hidden" id="h_crear" value="0">
<input type="hidden" id="h_listar" value="1">

<input type="hidden" id="h_Flg_Carrito_Cargado" value="<?php if(!empty($Flg_Carrito_Cargado)){ echo $Flg_Carrito_Cargado;}?>">

<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">FACTURACIÓN ELECTRONICA <small></small></h1>
<!-- end page-header -->
<br>
<!-- begin row -->

<div class="col-xs-12">

    <div class="row">
        <div class="col-md-4">
            <a id="btn-nuevo" href="<?=base_url("public/trxcuenta/crear")?>" class="btn btn-primary btn-block m-b-5"><i class="fa fa-cogs"></i> NUEVO</a>            
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-3 col-sm-3">
            <select class="chosen-select form-control" id="lst-Id_Tienda" style="width: 100%;" data-placeholder="Choose a State...">
                <?php if(!empty($v_List_Tienda)){ ?>
                    <option value="0">[--SELECCIONE TIENDA--]</option>
                    <?php foreach($v_List_Tienda as $Item){ ?>
                        <option value="<?=$Item["Id_Tienda"]?>"><?="(".$Item["Cod_Tienda"].") ".$Item["Des_Tienda"]?></option>
                    <?php }?>
                <?php }?>      													                                         
            </select>
        </div>
        <div class="col-md-3 col-sm-3">
            <select class="chosen-select form-control" id="lst-Tip_Documento" style="width: 100%;" data-placeholder="Choose a State...">
                <?php if(!empty($v_List_Tienda)){ ?>
                    <option value="0">[--SELECCIONE TIPO DE DOCUMENTO--]</option>
                    <?php foreach($v_List_Documentos_Sunat as $Item){ ?>
                        <option value="<?=$Item["Id_Documento"]?>"><?=$Item["Des_Documento"]?></option>
                    <?php }?>
                <?php }?>      													                                         
            </select>
        </div>
        <div class="col-md-3 col-sm-3">
            <select class="chosen-select form-control" id="lst-Flg_Estado" style="width: 100%;" data-placeholder="Choose a State...">
                <option value="0">NO ENVIADOS</option>
                <option value="1">ENVIADOS</option>
            </select>
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
                        <th>Documento</th>
                        <th>CDR</th>
                        <th>Estado</th>
                        <th>Fecha Envio</th>
                        <th>Fecha rechazo</th>
                        <th>Observación</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>

            <div class="row">
                <div class="col-xs-5">
                    <div class="dataTables_info" id="dynamic-table_info" role="status" aria-live="polite">Showing 0 to 0 of 0 entries</div>
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
        ["reenviar","&#xf002;  -  REENVIAR FACTURA A SUNAP "]     
    ];

    var g_List_Tmp_Data = [];
    var g_List_Resultado = [];

    function Get_List_Log_Sunat(p_Tip_Doc_Trx = 0,p_Id_Tienda=0,p_Flg_Enviado=0)
    {
        var l_OpcionesHtml = "";
        var l_DataTabla = [];
        var l_RowTabla = [];
        var l_OpcionesTabla = [];
        var l_EstadoHtml = "";
        var l_ObservacionHtml = "";

        var l_Request = {
            Paginacion: {
                Tip_Busqueda: g_Tip_Busqueda,
                Tip_Listado: g_Tip_Listado,
                Num_Seccion: g_Num_Pagina
            },
            Busqueda: {
                Tip_Doc_Trx : p_Tip_Doc_Trx,
                Id_Tienda : p_Id_Tienda,
                Flg_Enviado : p_Flg_Enviado
            }
        };

        var l_Response = GetActionJquery(l_Request,BASE_URL+"public/facelectronica/Get_List_Log_Sunat");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {

                $.each(data.Resultado.List_Resultado, function (i, item) {

                    g_List_Resultado[item.Id_Log] = item;

                    l_OpcionesTabla = g_OpcionesTabla;
                    l_OpcionesHtml = CrearComboBoxGenerico(l_OpcionesTabla,"lst-opciones",item.Id_Log,item.Id_Log,"opciones");
                    l_ObservacionHtml = "";
                    l_EstadoHtml = "";

                    if(item.Flg_EnvioSunat == 0)
                    {
                        l_EstadoHtml = '<span class="label label-sm label-success" style="background: #82AF6F;">'+item.Des_EnvioSunat+'</span>';
                    }
                    else if(item.Flg_EnvioSunat == 1)
                    {
                        l_EstadoHtml = '<span class="label label-sm label-success" style="background: #6f6fed;">'+item.Des_EnvioSunat+'</span>';
                    }
                    else if(item.Flg_EnvioSunat == 2)
                    {
                        l_EstadoHtml = '<span class="label label-sm label-success" style="background: #d80f0f;">'+item.Des_EnvioSunat+'</span>';
                    }

                    if(item.Flg_EnvioSunat == 1)
                    {
                        if(item.Flg_Observacion)
                        {
                            l_ObservacionHtml = '<span class="label label-sm label-success" style="background: #9aed6f;">'+item.Des_Observacion+'</span>';
                        }else{
                            l_ObservacionHtml = '<span class="label label-sm label-success" style="background: #6f6fed;">OK</span>';
                        }
                    }
                    
                    l_RowTabla = [
                        Number(data.Resultado.Num_RegistroIni+i+1),
                        item.Cod_Transaccion,
                        item.Cod_Talonario,
                        item.Des_NombreCdr,
                        l_EstadoHtml,
                        item.Fec_Envio,
                        item.Fec_Rechazo,
                        l_ObservacionHtml,
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

    function Enviar_Factura_Sunat_Individual(p_Tip_Documento = 0, p_Id_Iftrx = 0 , p_Id_Trx = 0 )
    {
        Abrir_Dialogo_Carga();
        var l_Request = {
            Tip_Documento : p_Tip_Documento,
            Id_Iftrx : p_Id_Iftrx,
            Id_Trx : p_Id_Trx
        };

        var l_Response = GetActionJquery(l_Request,BASE_URL+"public/facelectronica/Enviar_Factura_Sunat_Individual");
        l_Response.success(function(data){
            if (!data.Error.flagerror)
            { 
                bootbox.alert('<div class="row"><div class="col-sm-12"><h4 style="color:red;">OPERACIÓN REALIZADA CON EXITO : </h4><h4 style="color:blue;"></h4></div></div>', function(){ 
                    Get_List_Log_Sunat(
                        $("#lst-Tip_Documento").val()
                        ,$("#lst-Id_Tienda").val()
                        ,$("#lst-Flg_Estado").val()
                    ); 
                });
            }
            else
            {
                Ejecutar_Modal_Error(data.Error.messages);
            }
            Cerrar_Dialogo_Carga_Proceso(data.Error.flagerror);
        });
        l_Response.error(function(){
            alert("ERROR 500");
        });
        Cerrar_Dialogo_Carga_Proceso(true); 
    }

    function Ejecutar_Accion( p_Tip_Opcion = 0 , p_Id_Opcion = 0,p_Id_Opcion_2)
    {
        if( p_Tip_Opcion == "reenviar" )
        {
            var l_Log = g_List_Resultado[p_Id_Opcion];
            Enviar_Factura_Sunat_Individual(l_Log.Tip_Documento,l_Log.Id_InfoTransaccion,l_Log.Id_Transaccion);
        }
    }


    $("#btn-buscar").click(function(e){
        
        Get_List_Log_Sunat(
            $("#lst-Tip_Documento").val()
            ,$("#lst-Id_Tienda").val()
            ,$("#lst-Flg_Estado").val()
        );
        
    });

    $(document).on('click', '.paginate_button_a', function (e) {        
        var l_Id = $(this).attr("Id");
        g_Num_Pagina = Get_Num_Pagina_Seleccionada(l_Id,g_Num_Pagina);
        Get_List_Log_Sunat(
             $("#lst-Tip_Documento").val()
            ,$("#lst-Id_Tienda").val()
            ,$("#lst-Flg_Estado").val()
        );
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