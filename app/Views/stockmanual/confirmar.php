<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
</ol>
<input type="hidden" id="h_Id_Otr_Trx_Comercial" value="<?=$Obj_OtrOpeComerciales["Id_OtrOpeComerciales"]?>">
<input type="hidden" id="h_Id_Tienda_Destino" value="<?=$Obj_OtrOpeComerciales["Id_Tienda"]?>">
<input type="hidden" id="h_Des_KayTipoCarga" value="<?=$Obj_OtrOpeComerciales["Des_KeyOpeComercial"]?>">

<div class="row">
    <div class="col-md-12">
    <div class="tab-pane fade active in" id="tab-1">
			<div class="row">
				<div class="col-md-12 ui-sortable">
					<div class="panel panel-inverse" data-sortable-id="form-validation-1">
				        <div class="panel-body panel-form">
				            <form id="form-datos-formularioproducto" class="form-horizontal form-bordered" data-parsley-validate="true" name="demo-form" novalidate="">
                                <div class="form-group">
                                    <div class="row" style="text-align: center;">
                                        <h1 class="page-header"><?=$Obj_OtrOpeComerciales["Des_OpeComercial"]?> <small></small></h1>
                                    </div>
                                </div>
                                <div class="form-group punteado">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9">
                                        <div class="profile-user-info profile-user-info-striped">
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> COD. TRANSACCIÓN </div>
                                                <div class="profile-info-value">
                                                    <b><?=$Obj_OtrOpeComerciales["Cod_OtrOpeComerciales"]?></b>
                                                </div>
                                            </div>

                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> COD. MANUAL </div>
                                                <div class="profile-info-value">
                                                    <b><?=$Obj_OtrOpeComerciales["Cod_Manual"]?></b>
                                                </div>
                                            </div>

                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> OPERACIÓN COMERCIAL </div>
                                                <div class="profile-info-value">
                                                    <b><?=$Obj_OtrOpeComerciales["Des_OpeComercial"]." (".$Obj_OtrOpeComerciales["Des_KeyOpeComercial"].")"?></b>
                                                </div>
                                            </div>

                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> ESTADO </div>
                                                <div class="profile-info-value">
                                                    <span class="label label-sm label-inverse arrowed-in"><b><?=$Obj_OtrOpeComerciales["Des_EstaOpeCom"]?></b></span>                    
                                                </div>
                                            </div>

                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> TIENDA </div>
                                                <div class="profile-info-value">
                                                    <b><?=$Obj_OtrOpeComerciales["Cod_Tienda"]." - ".$Obj_OtrOpeComerciales["Des_Tienda"]?></b>
                                                </div>
                                            </div>

                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> DIRECCIÓN </div>
                                                <div class="profile-info-value">
                                                    <i class="fa fa-map-marker light-orange bigger-110"></i>
                                                    <b><?=$Obj_OtrOpeComerciales["Des_Direccion"]?></b>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group punteado">
                                    
                                    <div class="col-sm-12">
                                        <div class="widget-box transparent">
                                            <div class="widget-header widget-header-flat">
                                                <h4 class="widget-title lighter">
                                                    <b>LISTA DE PRODUCTOS</b>
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
                                                                    CANTIDAD DE UNIDADES
                                                                </th>
                                                                <th class="hidden-480">
                                                                    MODIFICA PRECIO
                                                                </th>
                                                                <th class="hidden-480">
                                                                    NUEVO PRECIO
                                                                </th>
                                                                <th class="hidden-480">
                                                                    MODIFICA DESCUENTO
                                                                </th>
                                                                <th class="hidden-480">
                                                                    TIPO DESCUENTO
                                                                </th>
                                                                <th class="hidden-480">
                                                                    VALOR DESCUENTO
                                                                </th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <?php 
                                                                if(!empty($Obj_OtrOpeComerciales["List_Item_Productos"])){
                                                                $lt_Contador = 0;    
                                                            ?>
                                                                <?php 
                                                                    foreach($Obj_OtrOpeComerciales["List_Item_Productos"] as $Item){
                                                                        $lt_Contador++; 
                                                                ?>
                                                                    <tr>
                                                                        <td><?=$lt_Contador?></td>
                                                                        <td><?="(".$Item["Cod_Producto"].") ".$Item["Des_Producto"]?></td>
                                                                        <td>
                                                                            <b class="blue"><?=$Item["Obj_Data_Jason"]["Num_Stock"]?></b>
                                                                        </td>
                                                                        <td>
                                                                            <?php if($Item["Obj_Data_Jason"]["Flg_ModPrecio"] == 0){ ?>
                                                                                <span class="label label-inverse arrowed">False</span>
                                                                            <?php }else{ ?>
                                                                                <span class="label label-info arrowed-in arrowed-in-right">True</span>
                                                                            <?php } ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php if($Item["Obj_Data_Jason"]["Flg_ModPrecio"] == 1){ ?>
                                                                                <b class="blue"><?=$Item["Des_Precio"]?></b>
                                                                            <?php } ?>                                                                            
                                                                        </td>
                                                                        <td>
                                                                            <?php if($Item["Obj_Data_Jason"]["Flg_ResetDescuento"] == 0){ ?>
                                                                                <span class="label label-inverse arrowed">False</span>
                                                                            <?php }else{ ?>
                                                                                <span class="label label-info arrowed-in arrowed-in-right">True</span>
                                                                            <?php } ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php if($Item["Obj_Data_Jason"]["Flg_ResetDescuento"] == 1){ ?>
                                                                                <b class="blue"><?=$Item["Des_TipDescuento"]?></b>
                                                                            <?php } ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php if($Item["Obj_Data_Jason"]["Flg_ResetDescuento"] == 1){ ?>
                                                                                <b class="blue"><?=$Item["Obj_Data_Jason"]["Num_ValDescuento"]?></b>
                                                                            <?php } ?>
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
			<div class="col-md-8 col-sm-8"></div>
			<div class="col-md-4 col-sm-4" style="text-align: right;">
				<a href="<?=base_url("public/stockmanual")?>" id="btn-cancelar" 
				type="button" class="btn btn-danger"><i class="ace-icon fa fa-times"></i> Cancelar</a>
				<a id="btn-confirmar" 
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
   <!-- ================== END JS FUNCIONES ================== -->
<script>

$(document).ready(function() {
    
    var BASE_URL = $("#URL_BASE").val();

    var g_Id_Otr_Trx_Comercial = $("#h_Id_Otr_Trx_Comercial").val();
    var g_Id_Tienda_Destino = $("#h_Id_Tienda_Destino").val();
    var g_Des_KayTipoCarga = $("#h_Des_KayTipoCarga").val();

    function Set_Confirmacion_Stock( p_Id_Otr_Trx_Comercial = 0 ,p_Id_Tienda_Destino = 0, Des_KayTipoCarga = "" )
    {
        var l_Request = {
            Id_OtrTrxComercial : p_Id_Otr_Trx_Comercial,
            Id_Tienda_Destino : p_Id_Tienda_Destino,
            Des_KayTipoCarga : g_Des_KayTipoCarga
        };

        var l_Response = SetActionJquery(l_Request,BASE_URL+"public/stockmanual/Set_Confirmacion_Stock");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {
                window.location.href = BASE_URL+"public/stockmanual";           
            }else{
                Ejecutar_Modal_Error(data.Error.messages);
            }
        });
        l_Response.error(function(){
            g_Accion_Ejecutable = true;
            alert("ERROR 500");
        });
    }

    $("#btn-confirmar").click(function(e){
        Set_Confirmacion_Stock(g_Id_Otr_Trx_Comercial,g_Id_Tienda_Destino);
    });

});
</script>