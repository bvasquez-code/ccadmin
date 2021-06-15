<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
</ol>

<input type="hidden" id="h_crear" value="0">
<input type="hidden" id="h_listar" value="1">

<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">TRANSACCIONES TIENDA <small></small></h1>
<!-- end page-header -->
<div class="row">
    <div class="col-md-4 col-sm-4" style="display: none;" id="div-descarga">
        <a class="btn btn-success" id="btn-descargar" style="width: 100%;"><i class="ace-icon fa fa-file-excel-o"></i>DESCARGAR AQUI</a>
    </div>
    <div class="col-md-6"></div>
</div>
<br>
<!-- begin row -->
<div class="col-xs-12">

    <div class="table-header">
        TRANSACCIONES TIENDA
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
                        <th>Estado</th>
                        <th>Transaccion</th>
                        <th>Id Orgien</th>
                        <th>Usuario</th>
                        <th>Tienda</th>
                        <th>Movimiento</th>
                        <th>Operacion</th>                        
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

    var g_OpcionesTabla = [
        [0,"[--OPCIONES--]"],
        ["ver","&#xf002;  -  VER "],
        ["descargar_json","&#xf016;  -  DESCARGAR JSON "],
        ["descargar_xml","&#xf016;  -  DESCARGAR XML "]        
    ];
    var g_OpcionesTabla_Error = [
        [0,"[--OPCIONES--]"],
        ["ver","&#xf002;  -  VER "],
        ["descargar_json","&#xf016;  -  DESCARGAR JSON "],
        ["descargar_xml","&#xf016;  -  DESCARGAR XML "], 
        ["descargar_json_error","&#xf016;  -  DESCARGAR ERROR JSON "],
        ["descargar_xml_error","&#xf016;  -  DESCARGAR ERROR XML "]
    ];


    function Get_List_Trx(p_Des_Busqueda = "")
    {
        var l_OpcionesHtml = "";
        var l_DataTabla = [];
        var l_RowTabla = [];
        var l_OpcionesTabla = [];
        var l_Html_Resultado = "";
        var l_Html_Movimeinto = "";
        var l_Html_Operacion = "";

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

        var l_Response = GetActionJquery(l_Request,BASE_URL+"public/transaccion/Get_List_Trx");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {

                $.each(data.Resultado.List_Resultado, function (i, item) {

                    
                    if ( item.Flg_Resultado == 1 ) 
                    {
                        l_Html_Resultado = '<span class="label label-sm label-success" style="background: #6f6fed;">'+item.Des_Resultado+'</span>';
                        l_OpcionesTabla = g_OpcionesTabla;
                    }
                    if ( item.Flg_Resultado == 0 ) 
                    {
                        l_Html_Resultado = '<span class="label label-sm label-success" style="background: #d80f0f;">'+item.Des_Resultado+'</span>';
                        l_OpcionesTabla = g_OpcionesTabla_Error;
                    }

                    if( item.Flg_Movimiento == 1 )
                    {
                        l_Html_Movimeinto = '<span class="label label-sm label-success" style="background: #38387b;">'+item.Des_Movimiento+'</span>';
                    }else
                    {
                        l_Html_Movimeinto = '<span class="label label-sm label-success" style="background: #9aed6f;">'+item.Des_Movimiento+'</span>';
                    }

                    if( item.Tip_OpeComercial == 1)
                    {
                        l_Html_Operacion = '<span class="label label-sm label-success" style="font-size: 13px;background: #6f6fed;">'+item.Des_Operacion+'</span>';

                    }else if ( item.Tip_OpeComercial == 2 ||  item.Tip_OpeComercial == 3 )
                    {
                        l_Html_Operacion = '<span class="label label-sm label-success" style="font-size: 13px;">'+item.Des_Operacion+'</span>';
                    }

                    l_OpcionesHtml = CrearComboBoxGenerico(l_OpcionesTabla,"lst-opciones",item.Id_Trx,item.Id_Trx,"opciones");
                    

                    l_RowTabla = [
                        Number(data.Resultado.Num_RegistroIni+i+1),
                        l_Html_Resultado,
                        item.Id_Trx,
                        item.Id_Origen,
                        item.Des_Usuario,
                        item.Cod_Tienda,
                        l_Html_Movimeinto,
                        l_Html_Operacion,
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
        });
        l_Response.error(function(){
            alert("ERROR 500");
        }); 
    }

    function Get_Obj_Trx(p_Id_Trx = 0,p_Num_Opcion = 0, p_Tip_Opcion = "")
    {
        var l_Obj_String = "";
        var l_Btn_Elem = "";

        var l_Request = {
            Id_Trx : p_Id_Trx,
            Num_Opcion : p_Num_Opcion
        };

        var l_Response = GetActionJquery(l_Request,BASE_URL+"public/transaccion/Get_Obj_Trx");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {

                if( p_Tip_Opcion == "descargar_json" || p_Tip_Opcion == "descargar_json_error")
                {
                    l_Obj_String = JSON.stringify((JSON.parse(data.Resultado)));
                }
                if( p_Tip_Opcion == "descargar_xml" || p_Tip_Opcion == "descargar_xml_error")
                {
                    l_Obj_String = jsonToXml(data.Resultado);
                }

                l_Btn_Elem = document.getElementById('btn-descargar');

                if( p_Tip_Opcion == "descargar_json" || p_Tip_Opcion == "descargar_json_error" )
                {
                    l_Btn_Elem.download = p_Id_Trx+".JSON";
                }
                if( p_Tip_Opcion == "descargar_xml" || p_Tip_Opcion == "descargar_xml_error" )
                {
                    l_Btn_Elem.download = p_Id_Trx+".XML";
                }

                l_Btn_Elem.href = "data:application/octet-stream," + encodeURIComponent(l_Obj_String);

                $("#div-descarga").show();
                    

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
            window.location.href = BASE_URL+"public/usuario/crear/"+p_Id_Opcion;
        }
        if( p_Tip_Opcion == "descargar_json" )
        {
            Get_Obj_Trx(p_Id_Opcion,1,p_Tip_Opcion);
        }
        if( p_Tip_Opcion == "descargar_xml" )
        {
            Get_Obj_Trx(p_Id_Opcion,1,p_Tip_Opcion);
        }
        if( p_Tip_Opcion == "descargar_json_error" )
        {
            Get_Obj_Trx(p_Id_Opcion,2,p_Tip_Opcion);
        }
        if( p_Tip_Opcion == "descargar_xml_error" )
        {
            Get_Obj_Trx(p_Id_Opcion,2,p_Tip_Opcion);
        }

        

    }

    $("#div-descarga").click(function(e){
        
        $("#div-descarga").hide();

    });

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
        Get_List_Trx($("#txt-busqueda").val());
    });

    $("#txt-busqueda").keypress(function(e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if(code==13){
            g_Num_Pagina = 1;
            Get_List_Trx($("#txt-busqueda").val());
        }
    });

    Get_List_Trx();

});
</script>    