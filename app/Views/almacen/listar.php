<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
</ol>

<input type="hidden" id="h_crear" value="0">
<input type="hidden" id="h_listar" value="1">

<input type="hidden" id="h_Flg_Carrito_Cargado" value="<?php if(!empty($Flg_Carrito_Cargado)){ echo $Flg_Carrito_Cargado;}?>">

<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">ALMACEN <small></small></h1>
<!-- end page-header -->
<br>
<!-- begin row -->

<div class="col-xs-12">
    <div class="row">
        <div class="col-md-6 col-sm-6">
            <select class="chosen-select form-control" id="lst-Tip_Operacion" style="width: 100%;" data-placeholder="Choose a State...">
                <option value="V">ENTREGA DE PRODUCTOS</option>
                <option value="R">RECEPCIÓN DE PRODUCTOS</option>            													                                         
            </select>
        </div>
    </div>
    <br>
    <div class="cls_entrega_productos">
        <div class="row">
            <div class="col-md-2 col-sm-2">
                <select class="chosen-select form-control" id="lst-Tip_VentaDoc" style="width: 100%;" data-placeholder="Choose a State...">
                    <?php if(!empty($List_Documento_Venta)){ ?>
                        <?php foreach($List_Documento_Venta as $Item){ ?>
                            <option value="<?=$Item["Cod_ParSis"]?>"><?=$Item["Des_ParSis_Nom"]?></option>
                        <?php }?>
                    <?php }?>      													                                         
                </select>
            </div>
            <div class="col-md-2 col-sm-2">
                <input class="form-control" type="date" id="txt-Fec_VentaIni" name="txt-Fec_VentaIni" value="<?=$Obj_FechaListado["Fec_Dia_Ini"]?>">
            </div>
            <div class="col-md-2 col-sm-2">
                <input class="form-control" type="date" id="txt-Fec_VentaFin" name="txt-Fec_VentaFin" value="<?=$Obj_FechaListado["Fec_Dia_Fin"]?>">
            </div>
            <div class="col-md-2 col-sm-2">
                <input class="form-control" type="text" id="txt-Cod_Venta" name="txt-Cod_Venta" placeholder="COD. VENTA" value="">
            </div>
            <div class="col-md-2 col-sm-2">
                <input class="form-control" type="text" id="txt-Cod_ClienteDoc" name="txt-Cod_ClienteDoc" placeholder="N° DOC. CLIENTE" value="">
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
            ENTREGA DE PRODUCTOS
        </div>
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
                            <th>Cod Venta</th>
                            <th>Cod Talonario</th>
                            <th>Cliente</th>
                            <th>Total</th>
                            <th>Fecha Registro</th>
                            <th>Comentario</th>
                            <th>Stock Fisico</th>
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

    <div class="cls_recepcion_productos" style="display: none;">
        <div class="row">
            <div class="col-md-2 col-sm-2">
                <select class="chosen-select form-control" id="lst-Tip_VentaDoc" style="width: 100%;" data-placeholder="Choose a State...">
                    <?php if(!empty($List_Documento_Venta)){ ?>
                        <?php foreach($List_Documento_Venta as $Item){ ?>
                            <option value="<?=$Item["Cod_ParSis"]?>"><?=$Item["Des_ParSis_Nom"]?></option>
                        <?php }?>
                    <?php }?>      													                                         
                </select>
            </div>
            <div class="col-md-2 col-sm-2">
                <input class="form-control" type="date" id="txt-Fec_VentaIni" name="txt-Fec_VentaIni_" value="<?=$Obj_FechaListado["Fec_Dia_Ini"]?>">
            </div>
            <div class="col-md-2 col-sm-2">
                <input class="form-control" type="date" id="txt-Fec_VentaFin" name="txt-Fec_VentaFin_" value="<?=$Obj_FechaListado["Fec_Dia_Fin"]?>">
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
            RECEPCION DE PRODUCTOS
        </div>
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

                <table id="data-table_2" class="table table-striped table-bordered">
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
                        <div class="dataTables_info_2" id="dynamic-table_info" role="status" aria-live="polite">Showing 1 to 10 of 23 entries</div>
                    </div>
                    <div class="col-xs-7" id="div-paginador_2">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

 <!-- ==================  JS COMPLEMENTOS ================== -->
 <script src="<?php echo base_url('assets/plugins/jquery/jquery-3.4.1.min.js');?>"></script>
 <script src="<?php echo base_url('assets/complement/qrcode.js'); ?>"></script>
 <script src="<?php echo base_url('assets/complement/jspdf/jspdf.debug.js'); ?>"></script>
  <!-- ================== END JS COMPLEMENTOS ================== -->

 <!-- ==================  JS FUNCIONES ================== -->
 <script src="<?php echo base_url('assets/js_sistema/backend.generico.js'); ?>"></script>
 <script src="<?php echo base_url('assets/js_sistema/backend.ventaimprimir.js'); ?>"></script>
  <!-- ================== END JS FUNCIONES ================== -->

<style>
	select{
		font-family: fontAwesome
	}
</style>

<script>

    const BASE_URL = $("#URL_BASE").val();
    let g_Accion_Ejecutable = true;
    let g_Item_Seleccionado = 0;

    let g_Num_Pagina = 1; // Pagina por defecto
    let g_Tip_Listado = 1; // Tipo de listado para tablas
    let g_Tip_Busqueda = 1; //Tipo de busqueda para productos

    let g_Flg_Carrito_Cargado = $("#h_Flg_Carrito_Cargado").val();

    let g_OpcionesTabla = [
        [0,"[--OPCIONES--]"],
        ["ver","&#xf002;  -  VER "],
        ["entregar","&#xf044;  -  ENTREGAR PRODUCTOS "]
    ];
    let g_OpcionesTabla_Procesados = [
        [0,"[--OPCIONES--]"],
        ["ver","&#xf002;  -  VER "]
    ];

    let g_OpcionesTabla_Procesados_Stock_Compras = [
        [0,"[--OPCIONES--]"],
        ["ver","&#xf002;  -  VER "],
        ["procesarstock","&#xf002;  -  CONFIRMAR ENTRADA DE STOCK "]
    ];
    var g_OpcionesTabla_Procesados_Compras = [
        [0,"[--OPCIONES--]"],
        ["ver","&#xf002;  -  VER "]   
    ];

    $(document).ready(function() {

        Get_PreVenta(
             $("#txt-Cod_Venta").val()
            ,$("#txt-Cod_ClienteDoc").val()
            ,""
            ,$("#txt-Fec_VentaIni").val()
            ,$("#txt-Fec_VentaFin").val()
            ,$("#lst-Tip_VentaDoc").val()
        );
    });




    let Get_PreVenta = function(p_Cod_Venta = "",p_Cod_ClienteDoc="",p_Des_VentaBus="",p_Fec_VentaIni = "",p_Fec_VentaFin = "",p_Tip_VentaDoc=0)
    {
        Abrir_Dialogo_Carga();
        var l_OpcionesHtml = "";
        var l_DataTabla = [];
        var l_RowTabla = [];
        var l_OpcionesTabla = [];
        var l_EstadoHtml = "";

        var Des_Producto_Desc = "";
        var Des_Producto_Histo = "";
        var Des_Cliente = "";

        var l_Request = {
            Paginacion: {
                Tip_Busqueda: g_Tip_Busqueda,
                Tip_Listado: g_Tip_Listado,
                Num_Seccion: g_Num_Pagina
            },
            Busqueda: {
                Tip_VentaDoc: Number(p_Tip_VentaDoc),
                Id_Venta: 0,
                Cod_Venta: p_Cod_Venta,
                Cod_ClienteDoc: p_Cod_ClienteDoc,
                Des_VentaBus: p_Des_VentaBus,
                Fec_VentaIni: p_Fec_VentaIni,
                Fec_VentaFin: p_Fec_VentaFin
            }
        };

        var l_Response = GetActionJquery(l_Request,BASE_URL+"public/preventa/Get_PreVenta");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {

                $.each(data.Resultado.List_Resultado, function (i, item) {

                    if( item.Flg_StockFisico == false )
                    { 
                        l_OpcionesTabla = g_OpcionesTabla;
                        l_EstadoHtml = '<span class="label label-sm label-inverse arrowed-in">'+item.Des_StockFisico+'</span>';
                    }
                    if( item.Flg_StockFisico == true )
                    { 
                        l_OpcionesTabla = g_OpcionesTabla_Procesados;
                        l_EstadoHtml = '<span class="label label-sm label-success">'+item.Des_StockFisico+'</span>';
                    }

                    l_OpcionesHtml = CrearComboBoxGenerico(l_OpcionesTabla,"lst-opciones",item.Id_Venta,item.Id_Venta,"opciones");

                    if ( item.Cod_Doccliente != "")
                    { 
                        Des_Cliente = item.Cod_Doccliente+" - "+item.Des_Nomcliente;
                    }
                    else
                    {
                        Des_Cliente = item.Des_Nomcliente;
                    }                    

                    if ( Des_Cliente ==  "") Des_Cliente = "CONSUMIDOR FINAL";

                    l_RowTabla = [
                        Number(data.Resultado.Num_RegistroIni+i+1),
                        item.Cod_Venta,
                        item.Cod_Talonario,
                        Des_Cliente,
                        item.Des_Total,
                        item.Fec_Registro,
                        item.Des_Comentario,
                        l_EstadoHtml,
                        l_OpcionesHtml
                    ];
                    l_DataTabla.push(l_RowTabla);
                    Des_Cliente = "";

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
   

    let Accion_Redireccionar = function()
    {
        window.location.href = BASE_URL+"public/preventa/search";
    }


    let Ejecutar_Accion= function( p_Tip_Opcion = "" , p_Id_Opcion = 0)
    {
        if(p_Tip_Opcion == "ver")
        {

        }
        if(p_Tip_Opcion == "entregar")
        {
            window.location.href = BASE_URL+"public/almacen/crear/"+p_Id_Opcion;
        }
        if(p_Tip_Opcion == "procesarstock")
        {
            window.location.href = BASE_URL+"public/compra/stockfisico/"+p_Id_Opcion;
        }
    }
    
    let Get_List_Compra = function(p_Id_Tienda = 0,p_Des_Busqueda = "")
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

                    
                    l_OpcionesTabla = g_OpcionesTabla_Procesados_Compras;

                    if( item.Flg_Estado_Transaccion == 1 )
                    { 
                        l_EstadoHtml = '<span class="label label-sm label-inverse arrowed-in">'+item.Des_Estado_Transaccion+'</span>';
                    }
                    if( item.Flg_Estado_Transaccion == 2 )
                    { 
                        l_EstadoHtml = '<span class="label label-sm label-success">'+item.Des_Estado_Transaccion+'</span>';
                    }
                    if( item.Flg_Estado_Transaccion == 3 )
                    { 
                        l_EstadoHtml = '<span class="label label-sm label-success" style="background-color:red;">'+item.Des_Estado_Transaccion+'</span>';
                    }

                    if( item.Flg_Stock_Procesado == true )
                    {  
                        l_EstadoHtml_Stock = '<span class="label label-sm label-success">'+item.Des_Stock_Procesado+'</span>';
                    }
                    if( item.Flg_Stock_Procesado == false && item.Flg_Estado_Transaccion == 2)
                    { 
                        l_OpcionesTabla = g_OpcionesTabla_Procesados_Stock_Compras;
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
                CargarTablaGenerica("data-table_2", l_DataTabla,false);
                CargarInfoTabla("dynamic-table_info_2",data.Resultado.Num_RegistroIni,data.Resultado.Num_RegistroFin,data.Resultado.Num_TotalBus);
                Crear_Paginador_Tabla("div-paginador_2",data.Resultado.Num_TotalBus,data.Resultado.Num_Seccion,data.Resultado.Num_Intervalo);

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

    // --- ACCIONES DE LISTAR ---
    $(document).on('change', '.lst-opciones', function (e) {

        var l_Id = $(this).attr("id");
        var l_Opcion = $("#" + l_Id).val();

        $("#" + g_Item_Seleccionado).val(0);

        Ejecutar_Accion(l_Opcion,l_Id);

        g_Item_Seleccionado = l_Id;

    });

    $(document).on('click', '#btn-buscar', function (e) {

        g_Num_Pagina = 1;
        Get_PreVenta($("#txt-Cod_Venta").val(),$("#txt-Cod_ClienteDoc").val(),"",$("#txt-Fec_VentaIni").val(),$("#txt-Fec_VentaFin").val(),$("#lst-Tip_VentaDoc").val());

    });

    $(document).on('click', '#btn-limpiar', function (e) {
        location.reload();
    });

    $(document).on('click', '.paginate_button_a', function (e) {        
        var l_Id = $(this).attr("Id");
        g_Num_Pagina = Get_Num_Pagina_Seleccionada(l_Id,g_Num_Pagina);
        Get_PreVenta(
            $("#txt-Cod_Venta").val()
            ,$("#txt-Cod_ClienteDoc").val()
            ,""
            ,$("#txt-Fec_VentaIni").val()
            ,$("#txt-Fec_VentaFin").val()
            ,$("#lst-Tip_VentaDoc").val()
        );
    });

    $(document).on('keypress', '#btn-busqueda', function (e) {

        var code = (e.keyCode ? e.keyCode : e.which);
        if(code==13){
            g_Num_Pagina = 1;
            Get_PreVenta(
                 $("#txt-Cod_Venta").val()
                ,$("#txt-Cod_ClienteDoc").val()
                ,$("#txt-busqueda").val()
                ,$("#txt-Fec_VentaIni").val()
                ,$("#txt-Fec_VentaFin").val()
                ,$("#lst-Tip_VentaDoc").val()
            );
        }
    });

    $(document).on('change', '#lst-Tip_Operacion', function (e) {

        let l_Id = $("#lst-Tip_Operacion").val();

        if( l_Id === "V" )
        {
            $(".cls_entrega_productos").show();
            $(".cls_recepcion_productos").hide();

            Get_PreVenta(
             $("#txt-Cod_Venta").val()
            ,$("#txt-Cod_ClienteDoc").val()
            ,""
            ,$("#txt-Fec_VentaIni").val()
            ,$("#txt-Fec_VentaFin").val()
            ,$("#lst-Tip_VentaDoc").val()
        );
        }
        else
        {
            $(".cls_entrega_productos").hide();
            $(".cls_recepcion_productos").show();

            Get_List_Compra(1,"");
        }

    });


</script>    