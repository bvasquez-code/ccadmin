<ol class="breadcrumb pull-right">
</ol>

<input type="hidden" id="h_crear" value="1">
<input type="hidden" id="h_listar" value="0">


<input type="hidden" id="h_Id_Compra" value="<?php if(!empty($v_Obj_Compra)){echo $v_Obj_Compra['Id_Compra'];}else{echo "0";}?>">
<input type="hidden" id="h_Tip_Transaccion" value="<?php if(!empty($v_Obj_Compra)){echo $v_Obj_Compra['Tip_Transaccion'];}else{echo "0";}?>">
<input type="hidden" id="h_Id_Tienda" value="<?php if(!empty($v_Obj_Compra)){echo $v_Obj_Compra['Id_Tienda'];}else{echo "0";}?>">

<div class="row">
    <div class="col-md-12">
    <div class="tab-pane fade active in" id="tab-1">
			<div class="row">
				<div class="col-md-12 ui-sortable">
					<div class="panel panel-inverse" data-sortable-id="form-validation-1">
				        <div class="panel-body panel-form">
				            <form id="form-datos-formulariopreventa" class="form-horizontal form-bordered" data-parsley-validate="true" name="demo-form" novalidate="">
                                <div class="form-group">
                                    <div class="row" style="text-align: center;">
                                        <h1 class="page-header">CONFIRMACIÓN DE COMPRA <small></small></h1>
                                    </div>
                                </div>
                                <div class="form-group punteado">
                                    <br>
                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-sm-2"><b>COD COMPRA</b></label>
                                        <div class="col-md-3 col-sm-3">
                                            <input class="form-control" type="text" value="<?php if(!empty($v_Obj_Compra)){echo $v_Obj_Compra['Cod_Compra'];}?>" style="color: blue;" readonly>
                                        </div>
                                        <label class="control-label col-md-2 col-sm-2"><b>PROVEEDOR</b></label>
                                        <div class="col-md-5 col-sm-5">
                                            <input class="form-control" type="text" value="<?php if(!empty($v_Obj_Compra)){echo $v_Obj_Compra['Des_Proveedor'];}?>" style="color: blue;" readonly>   
                                        </div>
                                    </div>
                                    <div class="form-group">                                    
                                        <div class="col-md-5 col-sm-5"></div>
                                        <label class="control-label col-md-2 col-sm-2"><b>COMENTARIO</b></label>
                                        <div class="col-md-5 col-sm-5">
                                            <input class="form-control" type="text" value="<?php if(!empty($v_Obj_Compra)){echo $v_Obj_Compra['Des_Comentario'];}?>" style="color: blue;" readonly>   
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-sm-2"><b>TIENDA DE DESTINO</b></label>
                                        <div class="col-md-10 col-sm-10">
                                            <select id="lst-Id_Tienda" style="width: 100%;">
                                                <?php if(!empty($v_List_Tienda)){ ?>
                                                    <?php foreach($v_List_Tienda as $Item){ ?>
                                                        <option value="<?=$Item["Id_Tienda"]?>"><?="(".$Item["Cod_Tienda"].") ".$Item["Des_Tienda"]?></option>
                                                    <?php }?>
                                                <?php }?>      													                                         
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-sm-2"><b>ALMACEN DE DESTINO</b></label>
                                        <div class="col-md-10 col-sm-10">
                                            <select id="lst-Id_Almacen" style="width: 100%;">     													                                         
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group punteado">
                                    <!-- <div class="col-md-2 col-sm-2"></div> -->
                                    <div class="col-sm-12">
                                        <div class="widget-box transparent">
                                            <div class="widget-header widget-header-flat">
                                                <h4 class="widget-title lighter">
                                                    <b>LISTA DE PRODUCTOS COMPRADOS</b>
                                                </h4>

                                                <div class="widget-toolbar">
                                                    <a href="#" data-action="collapse">
                                                        <i class="ace-icon fa fa-chevron-up"></i>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="widget-body">
                                                <div class="widget-main no-padding">
                                                    <table class="table table-bordered table-striped">
                                                        <thead class="thin-border-bottom">
                                                            <tr>
                                                                <th>
                                                                    ITEM
                                                                </th>
                                                                <th>
                                                                    PRODUCTO
                                                                </th>
                                                                <th class="hidden-480">
                                                                    PRECIO UNITARIO
                                                                </th>
                                                                <th class="hidden-480">
                                                                    CANTIDAD
                                                                </th>
                                                                <th class="hidden-480">
                                                                    TOTAL EN MONEDA DE COMPRA
                                                                </th>
                                                                <th class="hidden-480">
                                                                    TOTAL CONVERTIDO
                                                                </th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <?php 
                                                                if(!empty($v_Obj_Compra)){
                                                                $lt_Contador = 0;    
                                                            ?>
                                                                <?php 
                                                                    foreach($v_Obj_Compra["List_Detalle_Compra"] as $Item){
                                                                        $lt_Contador++; 
                                                                ?>
                                                                    <tr>
                                                                        <td><?=$lt_Contador?></td>
                                                                        <td>
                                                                            <p><?="(" . $Item["Cod_Producto"] . ") " .$Item["Des_Producto"]?></p>
                                                                            <?php if( count( $Item["List_Variaciones"] ) > 0 ){ ?>
                                                                                <p style="color: red;">VARIACIONES PRODUCTO</p>
                                                                                <?php foreach($Item["List_Variaciones"] as $Item_Var){ ?>
                                                                                    <p style="color: blue;"><b>*)<?=$Item_Var["Des_Variacion"]?> : <?=$Item_Var["Num_Cantidad"]?></b></p>
                                                                                <?php } ?>
                                                                            <?php } ?>
                                                                        </td>
                                                                        <td>
                                                                            <b class="green"><?=$Item["Des_Precio"]?></b>
                                                                        </td>
                                                                        <td>
                                                                            <b class="green"><?=$Item["Num_Cantidad"]?></b>
                                                                        </td>
                                                                        <td>
                                                                            <b class="blue"><?=$Item["Des_Total"]?></b>
                                                                        </td>
                                                                        <td>
                                                                            <b class="blue"><?=$Item["Des_Total_Convertido"]?></b>
                                                                        </td>

                                                                    </tr>
                                                                <?php } ?>    
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div><!-- /.widget-main -->
                                            </div><!-- /.widget-body -->
                                        </div><!-- /.widget-box -->
                                    </div>
                                </div>
                                <div class="form-group punteado">
                                    <div class="form-group">
                                        
                                            <label class="control-label col-md-10 col-sm-10"><b>TOTAL</b></label>
                                            <div class="col-md-2 col-sm-2">
                                                <input class="form-control" type="text" value="<?php if(!empty($v_Obj_Compra)){echo $v_Obj_Compra['Des_Total'];}?>" style="color: red;" readonly>
                                            </div>
                                            <label class="control-label col-md-10 col-sm-10"><b>TOTAL CONVERTIDO</b></label>
                                            <div class="col-md-2 col-sm-2">
                                                <input class="form-control" type="text" value="<?php if(!empty($v_Obj_Compra)){echo $v_Obj_Compra['Des_Total_Convertido'];}?>" style="color: blue;" readonly>
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
			<div class="col-md-2 col-sm-2"></div>
			<div class="col-md-10 col-sm-10" style="text-align: right;">
				<a href="<?=base_url("public/facturacion")?>" id="btn-cancelar" 
                type="button" class="btn btn-danger"><i class="ace-icon fa fa-times"></i> Cancelar</a>                
				<a id="btn-confirmar" 
				type="button" class="btn btn-primary"><i class="ace-icon fa fa-pencil"></i>Confimar Pre-Venta</a>
			</div>                                   
		</div>  
  </div>
</div>

<div id="qr"></div>

<style type="text/css">
.punteado{
  border-style: dotted;
   border-width: 1px;
   border-color: #e5e5e5;
   /* background-color: cc3366; */
   font-family: verdana, arial;
   font-size: 10pt;
}
</style>
 <!-- ==================  JS COMPLEMENTOS ================== -->
 <script src="<?php echo base_url('assets/plugins/jquery/jquery-3.4.1.min.js');?>"></script>
 <script src="<?php echo base_url('assets/complement/qrcode.js'); ?>"></script>
 <script src="<?php echo base_url('assets/complement/jspdf/jspdf.debug.js'); ?>"></script>
  <!-- ================== END JS COMPLEMENTOS ================== -->

<!-- ==================  JS FUNCIONES ================== -->
<script src="<?php echo base_url('assets/js_sistema/backend.generico.js'); ?>"></script>
<!-- ================== END JS FUNCIONES ================== -->

<script>
$(document).ready(function() {
    
    var BASE_URL = $("#URL_BASE").val();

    var g_Num_Pagina = 1; // Pagina por defecto
    var g_Tip_Listado = 1; // Tipo de listado para tablas
    var g_Tip_Busqueda = 1; //Tipo de busqueda para productos

    var g_Id_Compra = $("#h_Id_Compra").val();
    var g_Tip_Transaccion = $("#h_Tip_Transaccion").val();
    var g_Id_Tienda = $("#h_Id_Tienda").val();

    var g_List_Detalle_Compra = [];

    function Set_Confirmacion_Entrega_Stock()
    {
        var l_List_Stock_Fisico = [];
        var l_DataTabla = [];
        var l_RowTabla = [];

        Abrir_Dialogo_Carga();

        $.each(g_List_Detalle_Compra, function (i, item) {

            if( item.List_Variaciones.length > 0 )
            {
                $.each(item.List_Variaciones, function (j, item_Var) {

                    l_List_Stock_Fisico.push(
                        {
                            Id_Producto : item.Id_Producto
                            ,Id_VariacionProducto : item_Var.Id_Variacion
                            ,Num_Cantidad : item_Var.Num_Cantidad
                            ,Id_Almacen : Number($("#lst-Id_Almacen").val())
                        }
                    );
                });
                
            }
            else
            {
                l_List_Stock_Fisico.push(
                    {
                         Id_Producto : item.Id_Producto
                        ,Id_VariacionProducto : 0
                        ,Num_Cantidad : item.Num_Cantidad
                        ,Id_Almacen : Number($("#lst-Id_Almacen").val())
                    }
                );
            }

        });

        var l_Request = {
            Tip_Documento : g_Tip_Transaccion,
            Id_Compra : Number(g_Id_Compra),
            Id_Tienda : g_Id_Tienda,
            List_Stock_Fisico : l_List_Stock_Fisico      
        };

        var l_Response = SetActionJquery(l_Request,BASE_URL+"public/compra/Set_Confirmar_Llegada_Stock");

        l_Response.success(function(data){
            if (!data.Error.flagerror) {
                bootbox.alert(
                    '<div class="row"><div class="col-sm-12"><h4 style="color:blue;">'+data.Resultado.Des_Mensaje+'</h4></div></div>'
                    , function(){ window.location.href = BASE_URL+"public/compra";}
                );
            }else{
                Ejecutar_Modal_Error(data.Error.messages);
            }
            Cerrar_Dialogo_Carga_Proceso(data.Error.flagerror);
        });
        l_Response.error(function(){
            g_Accion_Ejecutable = true;
            alert("ERROR 500");
            Cerrar_Dialogo_Carga_Proceso(true); 
        });  
    }

    function Get_List_Almacen(p_Id_Almacen = 0)
    {
        Abrir_Dialogo_Carga();
        var l_Request = {};
        var l_List_Select = [];

        l_Request = {
            Id_Almacen : p_Id_Almacen
        };

        var l_Response = SetActionJquery(l_Request,BASE_URL+"public/generico/Get_List_Almacen");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {
                $.each(data.Resultado, function (i, item) {

                    l_List_Select.push([item.Id_Almacen,item.Des_Almacen + " - "+item.Des_Direccion ]);

                });

                CargarComboBoxGenerico("lst-Id_Almacen","",l_List_Select);
            }
            else
            {
                Ejecutar_Modal_Error(data.Error.messages);
            }
            Cerrar_Dialogo_Carga_Simple();
        });
        l_Response.error(function(){
            alert("ERROR 500");
            Cerrar_Dialogo_Carga_Simple();
        });         
    }

    function Get_Detalle_Compra(p_Id_Compra = 0)
    {
        var l_Request = {};
        var l_List_Select = [];

        l_Request = {
            Id_Compra : p_Id_Compra
        };

        var l_Response = SetActionJquery(l_Request,BASE_URL+"public/compra/Get_Detalle_Compra");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {
                g_List_Detalle_Compra = data.Resultado.List_Detalle_Compra;
            }   
            else
            {
                Ejecutar_Modal_Error(data.Error.messages);
            }
        });
        l_Response.error(function(){
            alert("ERROR 500");
        });         
    }
    
    $("#lst-Id_Tienda").change(function(e){

        Get_List_Almacen($("#lst-Id_Tienda").val());

    });

    $("#btn-confirmar").click(function(e){
        Set_Confirmacion_Entrega_Stock();
    });

    Get_List_Almacen($("#lst-Id_Tienda").val());
    Get_Detalle_Compra(g_Id_Compra);

});
</script>

<style>
	select{
		font-family: fontAwesome
	}
</style>