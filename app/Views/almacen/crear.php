<ol class="breadcrumb pull-right">
</ol>

<input type="hidden" id="h_crear" value="1">
<input type="hidden" id="h_listar" value="0">


<input type="hidden" id="h_Id_Venta" value="<?php if(!empty($Obj_PreVenta)){echo $Obj_PreVenta['Id_Venta'];}else{echo "0";}?>">
<input type="hidden" id="h_Tip_Venta" value="<?php if(!empty($Obj_PreVenta)){echo $Obj_PreVenta['Tip_Venta'];}else{echo "0";}?>">

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
                                        <h1 class="page-header">ENTREGAR PRODUCTOS <small></small></h1>
                                    </div>
                                </div>
                                <div class="form-group punteado">
                                    <br>
                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-sm-2"><b>COD VENTA</b></label>
                                        <div class="col-md-3 col-sm-3">
                                            <input class="form-control" type="text" value="<?php if(!empty($Obj_PreVenta)){echo $Obj_PreVenta['Cod_Venta'];}?>" style="color: blue;" readonly>
                                        </div>
                                        <label class="control-label col-md-2 col-sm-2"><b>CLIENTE</b></label>
                                        <div class="col-md-5 col-sm-5">
                                            <input class="form-control" type="text" value="<?php if(!empty($Obj_PreVenta)){echo $Obj_PreVenta['Cod_DocCliente']." ".$Obj_PreVenta['Des_NomCliente'];}?>" style="color: blue;" readonly>   
                                        </div>
                                    </div>
                                    <div class="form-group">                                    
                                        <div class="col-md-5 col-sm-5"></div>
                                        <label class="control-label col-md-2 col-sm-2"><b>DIRECCIÓN</b></label>
                                        <div class="col-md-5 col-sm-5">
                                            <input class="form-control" type="text" value="<?php if(!empty($Obj_PreVenta)){echo $Obj_PreVenta['Des_DirCliente'];}?>" style="color: blue;" readonly>   
                                        </div>
                                    </div>
                                    <div class="form-group">                                    
                                        <div class="col-md-5 col-sm-5"></div>
                                        <label class="control-label col-md-2 col-sm-2"><b>COMENTARIO</b></label>
                                        <div class="col-md-5 col-sm-5">
                                            <input class="form-control" type="text" value="<?php if(!empty($Obj_PreVenta)){echo $Obj_PreVenta['Des_Comentario'];}?>" style="color: blue;" readonly>   
                                        </div>
                                    </div>
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
                                                                <th style="width: 25%;">
                                                                    PRODUCTO
                                                                </th>
                                                                <th class="hidden-480" style="width: 25%;">
                                                                    CANTIDAD DE PRODUCTOS
                                                                </th>
                                                                <th class="hidden-480">
                                                                    STOCK DISPONIBLE POR ALMACEN
                                                                </th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <?php 
                                                                if(!empty($Obj_PreVenta)){
                                                                $lt_Contador = 0;    
                                                            ?>
                                                                <?php 
                                                                    foreach($Obj_PreVenta["List_Item_Venta"] as $Item){
                                                                        $lt_Contador++; 
                                                                ?>
                                                                    <tr>
                                                                        <td><?=$lt_Contador?></td>
                                                                        <td>
                                                                            <p style="color: blue;"><?="(" . $Item["Cod_Producto"] . ") " .$Item["Des_Producto"]?></p>                                                                         
                                                                        </td>
                                                                        <td>
                                                                            <p><b class="green">TOTAL : <?=$Item["Num_Cantidad"]?></b></p>
                                                                            <?php if( !empty($Item["List_Variaciones"]) ){ ?>
                                                                                <p><b> VARIACIONES : </b></p>
                                                                                <?php foreach( $Item["List_Variaciones"] as $Item_Variaciones ){ ?>
                                                                                    <p style="color: red;"><b>*) <?=$Item_Variaciones["Des_Variacion"] . " : " .$Item_Variaciones["Num_Cantidad"] ?></b></p>
                                                                                <?php } ?>
                                                                            <?php } ?>   
                                                                        </td>
                                                                        <td>                                                                           
                                                                            <?php if(!empty($Item["List_Stock_Disponible"])){ ?>
                                                                                <?php foreach($Item["List_Stock_Disponible"] as $Item_Stock){ ?>
                                                                                    <div class="form-group">
                                                                                        <label class="control-label col-md-12 col-sm-12"><b><?=$Item_Stock["Des_Almacen"]?></b></label>
                                                                                        <label class="control-label col-md-12 col-sm-12" style="color: green;"><b>DIRECCION : <?=$Item_Stock["Des_Direccion"]?></b></label>
                                                                                        <label class="control-label col-md-12 col-sm-12" style="color: blue;"><b>DISPONIBLE : <?=$Item_Stock["Num_Stock"]?></b></label>
                                                                                        
                                                                                        <?php if( count($Item_Stock["List_StockFisico_Variacion"]) == 0 ){ ?>   
                                                                                            
                                                                                            <div class="col-md-12 col-sm-12">
                                                                                                <input class="form-control cla-stock-producto" id="<?=$Item_Stock["Id_StockFisico"]?>"
                                                                                                id_almacen="<?=$Item_Stock["Id_Almacen"]?>"
                                                                                                id_producto="<?=$Item_Stock["Id_Producto"]?>"
                                                                                                type="number" value="<?=$Item_Stock["Num_Cantidad_Escogida"]?>" style="color: blue;">
                                                                                            </div>

                                                                                        <?php }else{ ?>
                                                                                            
                                                                                            <?php foreach( $Item_Stock["List_StockFisico_Variacion"] as $Item_Stock_Var ){ ?>
                                                                                                
                                                                                                <label class="control-label col-md-12 col-sm-12" style="color: red;"><b><?=$Item_Stock_Var["Des_VariacionProducto"] ." : ". $Item_Stock_Var["Num_Stock"]?></b></label>
                                                                                                <div class="col-md-12 col-sm-12">
                                                                                                    <input class="form-control cla-stock-varproducto" id="<?=$Item_Stock_Var["Id_VariacionStockFisico"]?>"
                                                                                                    id_almacen="<?=$Item_Stock["Id_Almacen"]?>"
                                                                                                    id_producto="<?=$Item_Stock["Id_Producto"]?>"
                                                                                                    id_variacionproducto="<?=$Item_Stock_Var["Id_VariacionProducto"]?>"
                                                                                                    type="number" value="<?=$Item_Stock_Var["Num_Cantidad_Escogida"]?>" style="color: blue;">
                                                                                                </div>

                                                                                            <?php } ?>

                                                                                        <?php } ?>
                                                                                    </div>
                                                                                <?php }?>
                                                                            <?php }?>      													                                                                                                                
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
				type="button" class="btn btn-primary"><i class="ace-icon fa fa-pencil"></i>Confimar Entrega</a>
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
 <script src="<?php echo base_url('assets/js_sistema/backend.ventaimprimir.js'); ?>"></script>
<!-- ================== END JS FUNCIONES ================== -->

 <script>
$(document).ready(function() {

    var BASE_URL = $("#URL_BASE").val();
    var g_Accion_Ejecutable = true;
    var g_Id_Venta = $("#h_Id_Venta").val();
    var g_Tip_Venta = $("#h_Tip_Venta").val();

    var g_List_Otr_Moneda = [];
    var g_List_Pagos = [];
    var g_Flg_Pagado = false; //Flag que indica que se realizaron todos los pagos
    


    function Set_Confirmacion_Entrega_Stock()
    {
        let l_List_Stock_Fisico = [];
        let l_DataTabla = [];
        let l_RowTabla = [];
        let l_Id = 0;
        let l_Id_almacen = 0;
        let l_Id_Producto = 0;
        let l_Id_VariacionProducto = 0;
        let l_Num_Cantidad = 0;

        Abrir_Dialogo_Carga();

        $(".cla-stock-producto").each(function(index){

            l_Id = $(this).attr("id");
            l_Id_almacen = Number($(this).attr("id_almacen"));
            l_Id_Producto = Number($(this).attr("id_producto"));
            l_Num_Cantidad = Number($(this).attr("value"));

            if( l_Num_Cantidad > 0 )
            {
                l_List_Stock_Fisico.push(
                    {
                         Id_Producto : l_Id_Producto
                        ,Id_VariacionProducto : 0
                        ,Num_Cantidad : l_Num_Cantidad
                        ,Id_Almacen : l_Id_almacen
                    }
                );
            }

        });
        $(".cla-stock-varproducto").each(function(index){

            l_Id = $(this).attr("id");
            l_Id_almacen = Number($(this).attr("id_almacen"));
            l_Id_Producto = Number($(this).attr("id_producto"));
            l_Id_VariacionProducto = Number($(this).attr("id_variacionproducto"));
            l_Num_Cantidad = Number($(this).attr("value"));

            if( l_Num_Cantidad > 0 )
            {
                l_List_Stock_Fisico.push(
                    {
                         Id_Producto : l_Id_Producto
                        ,Id_VariacionProducto : l_Id_VariacionProducto
                        ,Num_Cantidad : l_Num_Cantidad
                        ,Id_Almacen : l_Id_almacen
                    }
                );
            }

        });

        var l_Request = {
            Des_KeyOperacion : "Sale",
            Obj_Venta : {
                Tip_Documento : g_Tip_Venta,
                Id_Venta : Number(g_Id_Venta),
                List_Stock_Fisico : l_List_Stock_Fisico
            }
        };

        var l_Response = SetActionJquery(l_Request,BASE_URL+"public/almacen/Set_Confirmacion_Entrega_Stock");

        l_Response.success(function(data){
            if (!data.Error.flagerror) {
                bootbox.alert(
                    '<div class="row"><div class="col-sm-12"><h4 style="color:blue;">'+data.Resultado.Des_Mensaje+'</h4></div></div>'
                    , function(){ window.location.href = BASE_URL+"public/almacen";}
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


    $("#btn-confirmar").click(function(e){
        Set_Confirmacion_Entrega_Stock();
    });


});
</script>