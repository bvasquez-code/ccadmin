<?php

    $T_Seleccion = ""; //Variable para marcar un "option html"
    $l_Num_Cont = 0;
?>

<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
</ol>

<div class="row">
    <div class="col-md-12">
    <div class="tab-pane fade active in" id="tab-1">
			<div class="row">
				<div class="col-md-12 ui-sortable">
					<div class="panel panel-inverse" data-sortable-id="form-validation-1">
				        <div class="panel-body panel-form">
				            <form id="form-datos-formulariov_Obj_Caja" class="form-horizontal form-bordered" data-parsley-validate="true" name="demo-form" novalidate="">
                                <div class="form-group">
                                    <div class="row" style="text-align: center;">
                                        <h1 class="page-header">ADMINISTRAR PROMOCIONES <small></small></h1>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3"><b>DESCRIPCIÓN (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Des_Promo" name="txt-Des_Promo" value="" placeholder="" maxlength="250">
									</div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3"><b>CODIGO (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Cod_Promo" name="txt-Cod_Promo" value="" placeholder="" maxlength="32">
									</div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3"><b>FECHA INICIO (*) :</b></label>
									<div class="col-md-3 col-sm-3">
										<input class="form-control" type="date" id="txt-Fec_Inicio" name="txt-Fec_Inicio" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3"><b>FECHA FIN (*) :</b></label>
									<div class="col-md-3 col-sm-3">
										<input class="form-control" type="date" id="txt-Fec_Fin" name="txt-Fec_Fin" value="">
                                    </div>
                                </div>
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>LANZAMIENTO AUTOMATICO (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<select class="form-control selectpicker" id="lst-Tip_Lanzamiento" name="lst-Tip_Lanzamiento" data-size="10" data-style="btn-primary">											                                       
                                            <option value="0">NO</option>
                                            <option value="1">SI</option>
                                        </select>										
									</div>
                                </div>
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>ESCALABLE (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<select class="form-control selectpicker" id="lst-Tip_Escalabilidad" name="lst-Tip_Escalabilidad" data-size="10" data-style="btn-primary">											                                       
                                            <option value="0">NO</option>
                                            <option value="1">SI</option>
                                        </select>										
									</div>
                                </div>
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>NIVEL DE APLICACIÓN DE LA PROMO (*) :</b></label>
									<div class="col-md-9 col-sm-9">
                                        <select class="form-control selectpicker" id="lst-Tip_Nivel_Aplicacion" name="lst-Tip_Nivel_Aplicacion" data-size="10" data-style="btn-primary">											
                                            <?php if(!empty($v_List_Nivel_Aplicacion)){ ?>
                                                <option value="0">[--SELECCIONE NIVEL DE APLICACIÓN--]</option>
                                                <?php foreach($v_List_Nivel_Aplicacion as $Item){ ?>
                                                    <option value="<?=$Item["Cod_ParSis"]?>"  <?=$T_Seleccion?>><?=$Item["Des_ParSis_Nom"]?></option>
                                                <?php }?>
                                            <?php }?>                                        
				                        </select>										
									</div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3"><b>BUSCAR ELEMENTO A APLICAR LA PROMO :</b></label>
									<div class="col-md-6 col-sm-">
										<input class="form-control" type="text" id="txt-Cod_Elemento" name="txt-Cod_Elemento" value="" placeholder="PRODUCTO | CATEOGORIA | MARCA" maxlength="512">
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
                                    <div class="col-md-3 col-sm-3"></div>
                                    <label class="control-label col-md-9 col-sm-9" style="text-align: left;">
                                        <b>
                                            EL PORCENTAJE DE DESCUENTO SE APLICARA AL TOTAL DE LA CANTIDAD INDICADA
                                        </b>
                                    </label>

                                </div>

                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"></label>
									<div class="col-md-9 col-sm-9">
                                        <div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline no-footer">
                                            <table id="data-table-detalle-promo" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Item</th>
                                                        <th>Producto</th>
                                                        <th>Descripcion manual</th>
                                                        <th>Descripcion de Regla</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>										
									</div>
                                </div>

                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>TIENDA DONDE APLICARA LA PROMOCIÓN (*) :</b></label>
									<div class="col-md-9 col-sm-9">
                                        <div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline no-footer">
                                            <table id="data-table" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Item</th>
                                                        <th>Tienda</th>
                                                        <th>Aplica</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if(!empty($v_List_Tienda)){ ?>
                                                        <?php 
                                                            foreach($v_List_Tienda as $Item){
                                                            $l_Num_Cont++;
                                                        ?>
                                                            <tr class="odd gradeX">
                                                                <td align="left"><?=$l_Num_Cont?></td>
                                                                <td align="left"><?="(".$Item["Cod_Tienda"].") ".$Item["Des_Tienda"]?></td>
                                                                <td align="left"><input class="clase-tienda-checkbox" type="checkbox" id="<?=$Item["Id_Tienda"]?>" name="1" value="0"></td>
                                                            </tr>
                                                        <?php }?>
                                                    <?php }?>
                                                </tbody>
                                            </table>
                                        </div>										
									</div>
                                </div>

				            </form>
				        </div>
					</div>
				</div>
			</div>
          </div>    

    </div>
</div>
<div class="row">
  <div class="col-md-12">
		<div class="form-group">
			<div class="col-md-8 col-sm-8"></div>
			<div class="col-md-4 col-sm-4" style="text-align: right;">
				<a href="<?=base_url("public/v_Obj_Caja")?>" id="btn-cancelar" 
				type="button" class="btn btn-danger"><i class="ace-icon fa fa-times"></i> Cancelar</a>
				<a id="btn-guardar" 
				type="button" class="btn btn-primary"><i class="ace-icon fa fa-pencil"></i>Guardar</a>
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

<script>
$(document).ready(function() {

    var BASE_URL = $("#URL_BASE").val();

    var g_Num_Pagina = 1; // Pagina por defecto
    var g_Tip_Listado = 1; // Tipo de listado para tablas
    var g_Tip_Busqueda = 1; //Tipo de busqueda para productos

    var g_Obj_Promocion = {
         Id_Promocion : 0
        ,Cod_Promocion : ""
        ,Des_Promocion : ""
        ,Fec_Inicio : ""
        ,Fec_Fin : ""
        ,Flg_Automatica : false
        ,Flg_Escalable : false
        ,Tip_NivelAplicacion : 0
        ,List_Detalle : []
        ,List_Tienda : []
    }

    var g_Form_Detalle_Promo_Producto = [ // modal stock de producto
            [['CODIGO', 'text', 'Cod_Producto']],
            [['PRODUCTO', 'text', 'Des_Producto']],
            [['DESCRIPCIÓN DEL DETALLE', 'text', 'Des_Detalle_Promo']],
            [['CANTIDAD', 'number', 'Num_Cantidad']],
            [['PORCENTAJE', 'number', 'Num_Porcentaje']]
        ];


    function Get_Producto(p_Des_Producto_Bus="")
    {
        var l_Obj_Producto = [];

        var l_Request = {
            Paginacion: {
                Tip_Busqueda: g_Tip_Busqueda,
                Tip_Listado: g_Tip_Listado,
                Num_Seccion: g_Num_Pagina
            },
            Busqueda: {
                Busqueda_Producto: {
                    Id_Producto : 0,
                    Des_Producto_Bus : p_Des_Producto_Bus
                }
            }
        };

        var l_Response = GetActionJquery(l_Request,BASE_URL+"public/producto/Get_Producto");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {

                if(data.Resultado.List_Resultado)
                {
                    if( data.Resultado.List_Resultado.length == 1 )
                    {
                        l_Obj_Producto = data.Resultado.List_Resultado[0];
                        Ejecutar_Modal_Generico("form-1",g_Form_Detalle_Promo_Producto,"<b>AGREGAR DETALLE</b>","large",Agregar_Detalle_Promocion,l_Obj_Producto);
                        
                        $("#txt-Des_Producto").val(l_Obj_Producto.Des_Producto_Nom);
                        $("#txt-Des_Producto").attr("readonly",true);
                        $("#txt-Cod_Producto").val(l_Obj_Producto.Cod_Producto);
                        $("#txt-Cod_Producto").attr("readonly",true);
                        $("#txt-Num_Cantidad").val(1);

                        if( $("#txt-Des_Detalle_Promo").val() == "" || $("#txt-Num_Cantidad").val() || $("#txt-Num_Porcentaje").val() )
                        {
                            $(".bootbox-accept").attr("disabled",true);
                        }
                        
                    }
                }

            }else{
                alert(data.Error.messages);
            } 
        });
        l_Response.error(function(){
            alert("ERROR 500");
        });        
    }

    function Agregar_Detalle_Promocion(p_l_Obj_Producto = [])
    {
        var l_OpcionesHtml = "";
        var l_ReglaHtml = "";
        var l_DataTabla = [];
        var l_RowTabla = [];
        var l_OpcionesTabla = [];
        var l_Num_Cont = 0;

        if ( p_l_Obj_Producto != null )
        {

            var l_Obj_Detalle_Promo = {
                Id_Producto : p_l_Obj_Producto.Id_Producto
                ,Des_Detalle : $("#txt-Des_Detalle_Promo").val()
                ,Num_Cantidad : $("#txt-Num_Cantidad").val()
                ,Num_DescPorcentaje : $("#txt-Num_Porcentaje").val()
                ,Cod_Producto : p_l_Obj_Producto.Cod_Producto
                ,Des_Producto_Nom : p_l_Obj_Producto.Des_Producto_Nom
            }

            g_Obj_Promocion.List_Detalle[p_l_Obj_Producto.Id_Producto] = l_Obj_Detalle_Promo;
        }


        Object.keys(g_Obj_Promocion.List_Detalle).forEach(function(key) {
            console.log(key, g_Obj_Promocion.List_Detalle[key]);

            l_Num_Cont++;
            l_OpcionesHtml = '<b><a class="btn-delete" id="'+key+'" style="cursor: pointer;"><i class="fa fa-times fa-3x" aria-hidden="true"></i></a></b>';

            l_ReglaHtml = '<b><a class="btn-update" id="'+key+'" style="cursor: pointer;">'+
                            g_Obj_Promocion.List_Detalle[key].Num_DescPorcentaje+" % de descuento X "+
                            g_Obj_Promocion.List_Detalle[key].Num_Cantidad+" unidades del producto"+
                          '</a></b>';

            l_RowTabla = [
                l_Num_Cont,
                "("+g_Obj_Promocion.List_Detalle[key].Cod_Producto+") "+g_Obj_Promocion.List_Detalle[key].Des_Producto_Nom,
                g_Obj_Promocion.List_Detalle[key].Des_Detalle,
                l_ReglaHtml,
                l_OpcionesHtml
            ];
            l_DataTabla.push(l_RowTabla);
            l_Num_Precio_Html = "";
            $("#txt-Cod_Elemento").val("");

        });
        CargarTablaGenerica("data-table-detalle-promo", l_DataTabla,false);
    }

    function Evaluar_Data_Formulario_Detalle(p_Des_Detalle_Promo = "",p_Num_Cantidad = 0,p_Num_Porcentaje = 0)
    {
        $(".bootbox-accept").removeAttr("disabled",true);

        if( p_Des_Detalle_Promo == "" )
        {
            $(".bootbox-accept").attr("disabled",true);
        }
        if( p_Num_Cantidad < 1 )
        {
            $(".bootbox-accept").attr("disabled",true);
            Ejecutar_Modal_Error("CANTIDAD NO PUEDE SER MENOR A 1");
            $("#txt-Num_Cantidad").val(1);
        }

        if( p_Num_Porcentaje > 100)
        {
            $(".bootbox-accept").attr("disabled",true);
            Ejecutar_Modal_Error("PORCENTAJE NO PUEDE SER MAYOR A 100");
            $("#txt-Num_Porcentaje").val(0);
        }
        if( p_Num_Porcentaje < 0)
        {
            $(".bootbox-accept").attr("disabled",true);
            Ejecutar_Modal_Error("PORCENTAJE NO PUEDE SER MENOR A 0");
            $("#txt-Num_Porcentaje").val(0);
        }
    }

    function Eliminar_Detalle(p_Id_Producto = 0)
    {
        delete g_Obj_Promocion.List_Detalle[p_Id_Producto];
        Agregar_Detalle_Promocion(null);
    }

    function Update_Detalle(p_Id_Producto = 0)
    {
        var l_Obj_Producto = g_Obj_Promocion.List_Detalle[p_Id_Producto];

        Ejecutar_Modal_Generico("form-1",g_Form_Detalle_Promo_Producto,"<b>AGREGAR DETALLE</b>","large",Agregar_Detalle_Promocion,l_Obj_Producto);
                        
        $("#txt-Des_Producto").val(l_Obj_Producto.Des_Producto_Nom);
        $("#txt-Des_Producto").attr("disabled",true);
        $("#txt-Cod_Producto").val(l_Obj_Producto.Cod_Producto);
        $("#txt-Cod_Producto").attr("disabled",true);
        $("#txt-Des_Detalle_Promo").val(l_Obj_Producto.Des_Detalle);
        $("#txt-Num_Cantidad").val(l_Obj_Producto.Num_Cantidad);
        $("#txt-Num_Porcentaje").val(l_Obj_Producto.Num_DescPorcentaje);
    }

    function Crear_Obj_Promocion()
    {
        var l_List_Detalle = [];
        var l_Obj_Promocion = [];

        g_Obj_Promocion.Des_Promocion = $("#txt-Des_Promo").val();
        g_Obj_Promocion.Cod_Promocion = $("#txt-Cod_Promo").val();
        g_Obj_Promocion.Fec_Fin = $("#txt-Fec_Fin").val();
        g_Obj_Promocion.Fec_Inicio = $("#txt-Fec_Inicio").val();
        g_Obj_Promocion.Flg_Automatica = $("#lst-Tip_Lanzamiento").val();
        g_Obj_Promocion.Flg_Escalable = $("#lst-Tip_Escalabilidad").val();
        g_Obj_Promocion.Tip_NivelAplicacion = $("#lst-Tip_Nivel_Aplicacion").val();
        
        Object.keys(g_Obj_Promocion.List_Detalle).forEach(function(key) {

            l_List_Detalle.push(g_Obj_Promocion.List_Detalle[key]);

        });

        l_Obj_Promocion = g_Obj_Promocion;
        l_Obj_Promocion.List_Detalle = [];
        l_Obj_Promocion.List_Detalle = l_List_Detalle;

        l_Obj_Promocion.List_Tienda = [];

        $('.clase-tienda-checkbox').each(function(){

            var l_Id = 0;
            if(this.checked) {
                l_Id = $(this).attr("Id");
                l_Obj_Promocion.List_Tienda.push(Number(l_Id));
            }
        });

        Set_Promocion(l_Obj_Promocion);
    }

    function Set_Promocion(p_Obj_Promocion = [])
    {
        var l_Request = p_Obj_Promocion;

        var l_Response = SetActionJquery(l_Request,BASE_URL+"public/promo/Set_Promocion");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {
                window.location.href = BASE_URL+"public/promo";
            }else{
                Ejecutar_Modal_Error(data.Error.messages);
            }
            g_Accion_Ejecutable = true;
        });
        l_Response.error(function(){
            g_Accion_Ejecutable = true;
            alert("ERROR 500");            
        });        
    }

    $(document).on('click','.btn-delete',function(e){

        var l_Id = $(this).attr("Id");
        var l_FormArray = [[['<label>¿Esta seguro que desea eliminar el detalle?</label>', "html"]]];
        Ejecutar_Modal_Generico("form-1",l_FormArray,"<b>¡ALERTA!</b>","medium",Eliminar_Detalle,l_Id);
        
    });

    $(document).on('click','.btn-update',function(e){

        var l_Id = $(this).attr("Id");
        Update_Detalle(l_Id);
    });

    $("#btn-buscar").click(function(e){

        var l_Tip_Nivel_Aplicacion = $("#lst-Tip_Nivel_Aplicacion").val();
        var l_Cod_Elemento = $("#txt-Cod_Elemento").val();

        if( l_Tip_Nivel_Aplicacion == 1 && l_Cod_Elemento != "" && l_Cod_Elemento != null )
        {
            Get_Producto(l_Cod_Elemento);
        }

    });

    $(document).on('keyup', '#txt-Des_Detalle_Promo,#txt-Num_Cantidad,#txt-Num_Porcentaje', function (e) {

        Evaluar_Data_Formulario_Detalle($("#txt-Des_Detalle_Promo").val(),$("#txt-Num_Cantidad").val(),$("#txt-Num_Porcentaje").val());

    });

    $("#btn-guardar").click(function(e){
        Crear_Obj_Promocion();
    });


});
</script>   