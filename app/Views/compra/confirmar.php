<ol class="breadcrumb pull-right">
</ol>

<input type="hidden" id="h_crear" value="1">
<input type="hidden" id="h_listar" value="0">


<input type="hidden" id="h_Id_Compra" value="<?php if(!empty($v_Obj_Compra)){echo $v_Obj_Compra['Id_Compra'];}else{echo "0";}?>">

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
                                        <label class="control-label col-md-2 col-sm-2"><b>CLIENTE</b></label>
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
                                        <label class="control-label col-md-2 col-sm-2"><b>TIPO DOCUMENTO COMERCIAL</b></label>
                                        <div class="col-md-3 col-sm-3">
                                            <select class="chosen-select form-control" id="lst-Tip_DocTalonario" style="width: 100%; color: blue;">
                                                <?php if(!empty($v_List_Documento_Comercial)){ ?>
                                                    <option value="0">[--SELECCIONAR--]</option>
                                                    <?php foreach($v_List_Documento_Comercial as $Item){ ?>
                                                        <option value="<?=$Item["Id_Documento"]?>"><?=$Item["Des_Documento"]?></option>
                                                    <?php }?>
                                                <?php }?>      													                                         
                                            </select>
                                        </div>
                                        <label class="control-label col-md-2 col-sm-2"><b>CODIGO EXTERNO</b></label>
                                        <div class="col-md-5 col-sm-5">
                                            <input class="form-control" type="text" id="txt-Cod_Documento_Ext" value="<?php if(!empty($v_Obj_Compra)){echo $v_Obj_Compra['Cod_Externo'];}?>" style="color: blue;">   
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-sm-2"><b>MONEDA DE LA COMPRA</b></label>
                                        <div class="col-md-3 col-sm-3">
                                            <input class="form-control" type="text" value="<?php if(!empty($v_Obj_Compra)){echo $v_Obj_Compra["Cod_Moneda"];}?>" style="color: blue;" readonly>                                               
                                        </div>
                                        <label class="control-label col-md-2 col-sm-2"><b>VALOR DE CAMBIO</b></label>
                                        <div class="col-md-3 col-sm-3">
                                            <input class="form-control" type="text" value="<?php if(!empty($v_Obj_Compra)){echo $v_Obj_Compra["Num_Cambio"];}?>" style="color: blue;" readonly>                                               
                                        </div>
                                    </div>
                                    <?php if($v_Flg_Existe_Cuenta){?>
                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-sm-2"><b>CUENTAS DESDE DONDE CONTROLAR EL PAGO</b></label>
                                        <div class="col-md-10 col-sm-10">
                                            <select class="chosen-select form-control" id="lst-Id_Cuenta" style="width: 100%; color: blue;">
                                                <?php if(!empty($v_List_Cuenta)){ ?>
                                                    <option value="0">NO UTILIZAR NINGUNA CUENTA</option>
                                                    <?php foreach($v_List_Cuenta as $Item){ ?>
                                                        <option value="<?=$Item["Id_Cuenta"]?>">
                                                        <?=$Item["Des_Cuenta"] . " : ". $Item["Cod_Cuenta"] . " [ MONEDA : " .$Item["Des_Moneda"] . " ][ SALDO : ".$Item["Des_Saldo"] ." ]"?>
                                                        </option>
                                                    <?php }?>
                                                <?php }?>      													                                         
                                            </select>
                                        </div>                                     
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-sm-2"><b>CODIGO EXTERNO GENERADO POR EL PAGO</b></label>
                                        <div class="col-md-3 col-sm-3">
                                            <input class="form-control" type="text" id="txt-Cod_Pago_Ext" value="" style="color: blue;">                                               
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="form-group punteado">
                                    <!-- <div class="col-md-2 col-sm-2"></div> -->
                                    <div class="col-sm-12">
                                        <div class="widget-box transparent">
                                            <div class="widget-header widget-header-flat">
                                                <h4 class="widget-title lighter">
                                                    <b>LISTA DE PRODUCTOS DE VENTA</b>
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
                                                                    PRECIO COMPRA
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
                                                                        <td><?="(" . $Item["Cod_Producto"] . ") " .$Item["Des_Producto"]?></td>
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

    function Set_Confirmar_Compra()
    {
        Abrir_Dialogo_Carga();
        var l_Request = {};

        l_Request = {
            Id_Compra : g_Id_Compra
            ,Id_Cuenta : $("#lst-Id_Cuenta").val()
            ,Tip_Documento : $("#lst-Tip_DocTalonario").val()
            ,Cod_Documento_Ext : $("#txt-Cod_Documento_Ext").val()
            ,Cod_Pago_Ext : $("#txt-Cod_Pago_Ext").val()
        };

        var l_Response = SetActionJquery(l_Request,BASE_URL+"public/compra/Set_Confirmar_Compra");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {
                bootbox.alert(
                    '<div class="row"><div class="col-sm-12"><h4 style="color:red;">OPERACIÓN REALIZADA CON EXITO </h4></div></div>'
                    , function(){ window.location.href = BASE_URL+"public/compra";}
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
    
    $("#btn-confirmar").click(function(e){
        Set_Confirmar_Compra();
    });

});
</script>

<style>
	select{
		font-family: fontAwesome
	}
</style>