<ol class="breadcrumb pull-right">
</ol>

<input type="hidden" id="h_crear" value="1">
<input type="hidden" id="h_listar" value="0">


<input type="hidden" id="h_Id_Venta" value="<?php if(!empty($Obj_PreVenta)){echo $Obj_PreVenta['Id_Venta'];}else{echo "0";}?>">
<input type="hidden" id="h_Num_Total" value="<?php if(!empty($Obj_PreVenta)){echo $Obj_PreVenta['Num_Total'];}else{echo "0";}?>">
<input type="hidden" id="h_Tip_Pago" value="<?php if(!empty($Obj_PreVenta)){echo $Obj_PreVenta["Tip_Pago"];}else{echo "0";}?>"
<input type="hidden" id="h_Tip_MedioPago_PreSelec" value="<?php if(!empty($Obj_PreVenta)){echo $Obj_PreVenta['Tip_MedioPago'];}else{echo "0";}?>">

<input type="hidden" id="h_Cod_Moneda_Base" value="<?php if(!empty($Moneda_Base)){echo $Moneda_Base['Cod_Moneda'];}else{echo "0";}?>">
<input type="hidden" id="h_Des_Key_Base" value="<?php if(!empty($Moneda_Base)){echo $Moneda_Base['Des_Key'];}else{echo "";}?>">
<input type="hidden" id="h_Des_KeyConfig_Base" value="<?php if(!empty($Moneda_Base)){echo $Moneda_Base['Des_KeyConfig'];}else{echo "";}?>">
<input type="hidden" id="h_Num_Cambio_Base" value="<?php if(!empty($Moneda_Base)){echo $Moneda_Base['Num_Cambio'];}else{echo "0";}?>">

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
                                        <h1 class="page-header">FACTURACIÓN <small></small></h1>
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
                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-sm-2"><b>TIPO DOCUMENTO COMERCIAL</b></label>
                                        <div class="col-md-3 col-sm-3">
                                            <select class="chosen-select form-control" id="lst-Tip_DocTalonario" style="width: 100%; color: blue;">
                                                <?php if(!empty($List_Documento_Venta)){ ?>
                                                    <option value="0">[--SELECCIONAR--]</option>
                                                    <?php foreach($List_Documento_Venta as $Item){ ?>
                                                        <option value="<?=$Item["Cod_ParSis"]?>"><?=$Item["Des_ParSis_Nom"]?></option>
                                                    <?php }?>
                                                <?php }?>      													                                         
                                            </select>
                                        </div>
                                        <label class="control-label col-md-2 col-sm-2"><b>SERIE</b></label>
                                        <div class="col-md-3 col-sm-3">
                                            <select class="chosen-select form-control" id="lst-Cod_SerieTalonario" style="width: 100%; color: blue;">    													                                         
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-sm-2"><b>TIPO PAGO</b></label>
                                        <div class="col-md-3 col-sm-3">
                                            <input class="form-control" type="text" value="<?php if(!empty($Des_Tip_Pago)){echo $Des_Tip_Pago;}?>" style="color: blue;" readonly>                                               
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-sm-2"><b>MONTO PAGADO</b></label>
                                        <div class="col-md-3 col-sm-3">
                                            <input class="form-control" type="text" id="txt-Num_MonPagado" value="PEN 0.00" style="color: blue;" readonly>                                               
                                        </div>
                                        <label class="control-label col-md-2 col-sm-2"><b>MONTO POR PAGAR</b></label>
                                        <div class="col-md-3 col-sm-3">
                                            <input class="form-control" type="text" id="txt-Num_MonPorPagar" value="<?php if(!empty($Obj_PreVenta)){echo $Obj_PreVenta['Des_Total'];}?>" style="color: blue;" readonly>                                               
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-sm-2"><b>TIPO DE MEDIO PAGO</b></label>
                                        <div class="col-md-3 col-sm-3">
                                            <select class="chosen-select form-control" id="lst-Tip_MedioPago" style="width: 100%; color: blue;">
                                                <?php if(!empty($List_Tip_MedioPago)){ ?>
                                                    <option value="0">[--SELECCIONAR--]</option>
                                                    <?php foreach($List_Tip_MedioPago as $Item){ ?>
                                                        <option value="<?=$Item["Cod_ParSis"]?>"><?=$Item["Des_ParSis_Nom"]?></option>
                                                    <?php }?>
                                                <?php }?>      													                                         
                                            </select>
                                        </div>
                                        <label class="control-label col-md-2 col-sm-2"><b>MONEDA</b></label>
                                        <div class="col-md-3 col-sm-3">
                                            <select class="chosen-select form-control" id="lst-Tip_Moneda" style="width: 100%; color: blue;">
                                                <?php if(!empty($List_Tip_Moneda)){ ?>
                                                    <option value="0">[--SELECCIONAR--]</option>
                                                    <?php foreach($List_Tip_Moneda as $Item){ ?>
                                                        <option value="<?=$Item["Cod_ParSis"]?>"><?= "(".$Item["Des_ParSis_Abr"].") " . $Item["Des_ParSis_Nom"]?></option>
                                                    <?php }?>
                                                <?php }?>      													                                         
                                            </select>
                                        </div>                                        
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-sm-2"><b>VALOR DE CAMBIO</b></label>
                                        <div class="col-md-3 col-sm-3">
                                            <input class="form-control" type="text" id="txt-Num_Valor_Cambio" value="" style="color: blue;" readonly>                                               
                                        </div>
                                        <label class="control-label col-md-2 col-sm-2"><b>INGRESAR PAGO</b></label>
                                        <div class="col-md-2 col-sm-2">
                                            <input class="form-control" type="number" id="txt-Num_Pago_Parcial" value="" style="color: blue;">                                               
                                        </div>
                                        <div class="col-md-3 col-sm-3">
                                            <input class="form-control" type="text" id="txt-Num_Pago_Convert" value="" style="color: blue;" readonly>                                               
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-7 col-sm-7">                                                                                      
                                        </div>             
                                        <div class="col-md-3 col-sm-3">
                                            <a class="btn btn-yellow" id="btn-add-pago" style="width: 100%;"><i class="ace-icon fa fa-check-square-o"></i>Agregar Pago</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group punteado div-detalle-pago" style="display: none;">
                                    <!-- <div class="col-md-2 col-sm-2"></div> -->
                                    <div class="col-sm-8">
                                        <div class="widget-box transparent">
                                            <div class="widget-header widget-header-flat">
                                                <h4 class="widget-title lighter">
                                                    <b>DETALLE DE PAGO</b>
                                                </h4>

                                                <div class="widget-toolbar">
                                                    <a href="#" data-action="collapse">
                                                        <i class="ace-icon fa fa-chevron-up"></i>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="widget-body">
                                                <div class="widget-main no-padding">
                                                    <table class="table table-bordered table-striped" id="data-table-pagos">
                                                        <thead class="thin-border-bottom">
                                                            <tr>
                                                                <th>
                                                                    ITEM
                                                                </th>
                                                                <th>
                                                                    MEDIO DE PAGO
                                                                </th>
                                                                <th class="hidden-480">
                                                                    MONTO
                                                                </th>
                                                                <th class="hidden-480">
                                                                    COD. PAGO
                                                                </th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                </div><!-- /.widget-main -->
                                            </div><!-- /.widget-body -->
                                        </div><!-- /.widget-box -->
                                    </div>                                    
                                    <div class="col-sm-4">
                                        <div class="widget-box transparent">
                                            <div class="widget-header widget-header-flat">
                                                <h4 class="widget-title lighter">
                                                    <b>INFO PAGO</b>
                                                </h4>

                                                <div class="widget-toolbar">
                                                    <a href="#" data-action="collapse">
                                                        <i class="ace-icon fa fa-chevron-up"></i>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="widget-body">
                                                <div class="widget-main no-padding">
                                                    <table class="table table-bordered table-striped" id="data-table-info">
                                                        <tbody>
                                                            <tr class="odd gradeX">
                                                                <td align="left">
                                                                    <b class="blue">MONTO TOTAL</b>
                                                                </td>
                                                                <td align="left">
                                                                    <b class="blue"><?php if(!empty($Obj_PreVenta)){echo $Obj_PreVenta['Des_Total'];}?></b>
                                                                </td>
                                                            </tr>
                                                            <tr class="odd gradeX">
                                                                <td align="left">
                                                                    <b class="blue">TOTAL PAGADO</b>
                                                                </td>
                                                                <td align="left">
                                                                    <b class="green" id="td-Num_TotalPagado"></b>
                                                                </td>
                                                            </tr>
                                                            <tr class="odd gradeX">
                                                                <td align="left">
                                                                    <b class="blue">VUELTO</b>
                                                                </td>
                                                                <td align="left">
                                                                    <b class="red" id="td-Num_Vuelto"></b>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div><!-- /.widget-main -->
                                            </div><!-- /.widget-body -->
                                        </div><!-- /.widget-box -->
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
                                                                <th>
                                                                    PRODUCTO
                                                                </th>
                                                                <th class="hidden-480">
                                                                    PRECIO VENTA
                                                                </th>
                                                                <th class="hidden-480">
                                                                    CANTIDAD
                                                                </th>
                                                                <th class="hidden-480">
                                                                    TOTAL
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
                                                                        <td><?="(" . $Item["Cod_Producto"] . ") " .$Item["Des_Producto"]?></td>
                                                                        <td>
                                                                            <?php if( $Item["Num_Descuento"] != 0 ){ ?>
                                                                                <small>
                                                                                    <s class="red"><?=$Item["Des_Precio"]?></s>
                                                                                </small>
                                                                            <?php } ?>
                                                                            <b class="green"><?=$Item["Des_PrecioVenta"]?></b>
                                                                        </td>
                                                                        <td>
                                                                            <b class="green"><?=$Item["Num_Cantidad"]?></b>
                                                                        </td>
                                                                        <td>
                                                                            <b class="blue"><?=$Item["Des_MontoTotal"]?></b>
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
                                        
                                            <label class="control-label col-md-10 col-sm-10"><b>SUB-TOTAL</b></label>
                                            <div class="col-md-2 col-sm-2">
                                                <input class="form-control" type="text" value="<?php if(!empty($Obj_PreVenta)){echo $Obj_PreVenta['Des_Subtotal'];}?>" style="color: blue;" readonly>
                                            </div>
                                            <label class="control-label col-md-10 col-sm-10"><b>INTERES</b></label>
                                            <div class="col-md-2 col-sm-2">
                                                <input class="form-control" type="text" value="<?php if(!empty($Obj_PreVenta)){echo $Obj_PreVenta['Des_Interes'];}?>" style="color: green;" readonly>
                                            </div>
                                        
                                            <label class="control-label col-md-10 col-sm-10"><b>DESCUENTO</b></label>
                                            <div class="col-md-2 col-sm-2">
                                                <input class="form-control" type="text" value="<?php if(!empty($Obj_PreVenta)){echo "-".$Obj_PreVenta['Des_Descuento'];}?>" style="color: red;" readonly>
                                            </div>
                                            <label class="control-label col-md-10 col-sm-10"><b>TOTAL</b></label>
                                            <div class="col-md-2 col-sm-2">
                                                <input class="form-control" type="text" value="<?php if(!empty($Obj_PreVenta)){echo $Obj_PreVenta['Des_Total'];}?>" style="color: blue;" readonly>
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
				type="button" class="btn btn-primary"><i class="ace-icon fa fa-pencil"></i>Confimar Venta</a>
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
    var g_Tip_Pago = $("#h_Tip_Pago").val();
    var g_Num_Total = Number($("#h_Num_Total").val());
    var g_Cod_Moneda_Base = Number($("#h_Cod_Moneda_Base").val());
    var g_Des_Key_Base = $("#h_Des_Key_Base").val();
    var g_Des_KeyConfig_Base = $("#h_Des_KeyConfig_Base").val();
    var g_Num_Cambio_Base = Number($("#h_Num_Cambio_Base").val());
    var g_Tip_MedioPago_PreSelec = Number($("#h_Tip_MedioPago_PreSelec").val());
    var g_List_Otr_Moneda = [];
    var g_List_Pagos = [];
    var g_Flg_Pagado = false; //Flag que indica que se realizaron todos los pagos
    
    function Get_Talonario_Usuario(p_Tip_DocTalonario = 0)
    {
        var l_ListSelector = [];
        var l_RowSelector = [];

        var l_Request = {
            Tip_DocTalonario : p_Tip_DocTalonario
        };

        var l_Response = GetActionJquery(l_Request,BASE_URL+"public/facturacion/Get_Talonario_Usuario");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {
                if(data.Resultado)
                {
                    $.each(data.Resultado.List_Talonario, function (i, item) {
                        l_RowSelector = [item.Id_Talonario,item.Cod_SerieTalonario+"-"+item.Des_Correlativo];
                        l_ListSelector.push(l_RowSelector);
                    });
                }
                CargarComboBoxGenerico("lst-Cod_SerieTalonario","",l_ListSelector,null);
            }else{
                Ejecutar_Modal_Error(data.Error.messages);
            } 
        });
        l_Response.error(function(){
            alert("ERROR 500");
        }); 
    }

    function Get_Data_Moneda_Sistema(p_Tip_DocTalonario = 0)
    {
        var l_ListSelector = [];
        var l_RowSelector = [];

        var l_Request = {};

        var l_Response = GetActionJquery(l_Request,BASE_URL+"public/facturacion/Get_Data_Moneda_Sistema");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {
                $.each(data.Resultado.List_Otr_Moneda, function (i, item) {
                    g_List_Otr_Moneda[item.Cod_Moneda] = item;
                });
            }else{
                Ejecutar_Modal_Error(data.Error.messages);
            } 
        });
        l_Response.error(function(){
            alert("ERROR 500");
        }); 
    }

    function Set_Detalle_Pago( p_Id_Venta = 0,p_Tip_MedioPago=0 , p_Tip_Moneda=0 , p_Num_Pagado = 0  )
    {
        Abrir_Dialogo_Carga();
        var l_DataTabla = [];
        var l_RowTabla = [];
        var l_Request = {
            Id_Venta : Number(p_Id_Venta),
            Tip_MedioPago : Number(p_Tip_MedioPago),
            Tip_Moneda : Number(p_Tip_Moneda),
            Num_Pagado : Number(p_Num_Pagado)
        };

        var l_Response = SetActionJquery(l_Request,BASE_URL+"public/facturacion/Set_Detalle_Pago");

        l_Response.success(function(data){
            if (!data.Error.flagerror) {
                Get_Detalle_Pago();
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

    function Get_Detalle_Pago()
    {
        var l_DataTabla = [];
        var l_RowTabla = [];
        var l_Request = {};

        var l_Response = SetActionJquery(l_Request,BASE_URL+"public/facturacion/Get_Detalle_Pago");

        l_Response.success(function(data){
            if (!data.Error.flagerror) 
            {
                if(data.Resultado.List_Detalle_Venta != null && data.Resultado.List_Detalle_Venta.length > 0 )
                {
                    $.each(data.Resultado.List_Detalle_Venta, function (i, item) {
                        l_RowTabla = [
                            Number(i+1),
                            '<b class="blue">'+item.Des_MedioPago+'</b>',
                            '<b class="green">'+item.Des_PagoReal+'</b>',
                            item.Cod_ExternoOperacion
                        ];
                        l_DataTabla.push(l_RowTabla);
                    });
                    CargarTablaGenerica("data-table-pagos", l_DataTabla,false);
                    $("#txt-Num_MonPagado").val(data.Resultado.Des_TotalPagado);
                    $("#txt-Num_MonPorPagar").val(data.Resultado.Des_PorPagar);
                    $("#td-Num_TotalPagado").html(data.Resultado.Des_TotalPagado);
                    $("#td-Num_Vuelto").html(data.Resultado.Des_Vuelto);
                    $(".div-detalle-pago").show();
                    $("#lst-Tip_MedioPago").val(0);
                    $("#lst-Tip_Moneda").val(0);
                    $("#txt-Num_Valor_Cambio").val("");
                    $("#txt-Num_Pago_Parcial").val("");
                    $("#txt-Num_Pago_Convert").val("");
                    g_Flg_Pagado = data.Resultado.Flg_Pagado;
                }

            }else{
                Ejecutar_Modal_Error(data.Error.messages);
            }
        });
    }

    function Set_Venta( p_Tip_DocTalonario = 0 , p_Id_SerieTalonario = "" )
    {
        Abrir_Dialogo_Carga();
        var l_DataTabla = [];
        var l_RowTabla = [];
        var l_Request = {
            Tip_Documento : p_Tip_DocTalonario,
            Id_Talonario : p_Id_SerieTalonario
        };

        if( p_Tip_DocTalonario == 0 || p_Id_SerieTalonario == 0 || p_Id_SerieTalonario == null )
        {
            Ejecutar_Modal_Error("No se ha seleccionado documento de venta");
            return false;
        }

        var l_Response = SetActionJquery(l_Request,BASE_URL+"public/facturacion/Set_Venta");

        l_Response.success(function(data){
            if (!data.Error.flagerror) {
                bootbox.alert('<div class="row"><div class="col-sm-12"><h4 style="color:red;">OPERACIÓN REALIZADA CON EXITO : </h4><h4 style="color:blue;">'+data.Resultado.Cod_Talonario+'</h4></div></div>', function(){ 
                    Get_Impresion_Venta(BASE_URL,g_Id_Venta); 
                });
            }else{
                Ejecutar_Modal_Error(data.Error.messages);
            }
            Cerrar_Dialogo_Carga_Proceso(data.Error.flagerror);
        });
        l_Response.error(function(){
            alert("ERROR 500");
            Cerrar_Dialogo_Carga_Proceso(true); 
        });
    }


    $("#lst-Tip_DocTalonario").change(function(e){
        var l_Id = $("#lst-Tip_DocTalonario").val();
        Get_Talonario_Usuario(l_Id);
    });

    $("#lst-Tip_Moneda").change(function(e){
        var l_Id = $("#lst-Tip_Moneda").val();
        $("#txt-Num_Valor_Cambio").val(g_List_Otr_Moneda[l_Id].Num_Cambio);
    });

    $("#lst-Tip_Moneda").change(function(e){
        $("#txt-Num_Pago_Parcial").val("");
        $("#txt-Num_Pago_Convert").val("");
    });

        

    $("#btn-add-pago").click(function(e){

        Set_Detalle_Pago(g_Id_Venta,$("#lst-Tip_MedioPago").val(),$("#lst-Tip_Moneda").val(),$("#txt-Num_Pago_Parcial").val());

    });

    $("#txt-Num_Pago_Parcial").keyup(function(e){

        var l_Num_Pago_Parcial = Number($("#txt-Num_Pago_Parcial").val());
        var l_Num_Valor_Cambio = Number($("#txt-Num_Valor_Cambio").val());

        var l_Num_Pago_Convert = l_Num_Pago_Parcial * l_Num_Valor_Cambio;
        l_Num_Pago_Convert = g_Des_Key_Base + " " + (new Intl.NumberFormat(g_Des_KeyConfig_Base).format(l_Num_Pago_Convert));

        $("#txt-Num_Pago_Convert").val(l_Num_Pago_Convert);

    });

    $("#lst-Tip_Moneda").val(g_Cod_Moneda_Base);
    $("#txt-Num_Valor_Cambio").val(g_Num_Cambio_Base);
    $("#lst-Tip_MedioPago").val(g_Tip_MedioPago_PreSelec);

    $("#btn-confirmar").click(function(e){
        if ( g_Flg_Pagado )
        {
            Set_Venta($("#lst-Tip_DocTalonario").val(),$("#lst-Cod_SerieTalonario").val());
        }else
        {
            Ejecutar_Modal_Error("AUN NO SE HA CULMINADO LOS PAGOS.");
        }
    });

    Get_Data_Moneda_Sistema();
    Get_Detalle_Pago();

});
</script>