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
				            <form id="form-datos-formularioproducto" class="form-horizontal form-bordered" data-parsley-validate="true" name="demo-form" novalidate="">
                                <div class="form-group">
                                    <div class="row" style="text-align: center;">
                                    </div>
                                </div>
                                <div class="form-group punteado">
                                    <div class="col-sm-6">
                                        <div class="profile-user-info profile-user-info-striped">
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> CODIGO </div>
                                                <div class="profile-info-value">
                                                    <b><?=$v_Producto["Cod_Producto"]?></b>
                                                </div>
                                            </div>

                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> DESCRIPCIÓN </div>
                                                <div class="profile-info-value">
                                                    <b><?=$v_Producto["Des_Producto"]?></b>
                                                </div>
                                            </div>

                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> DESCRIPCIÓN 1 </div>
                                                <div class="profile-info-value">
                                                    <b><?=$v_Producto["Des_Producto_Texto_1"]?></b>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> DESCRIPCIÓN 2 </div>
                                                <div class="profile-info-value">
                                                    <b><?=$v_Producto["Des_Producto_Texto_2"]?></b>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> MARCA </div>
                                                <div class="profile-info-value">
                                                    <b><?=$v_Producto["Des_Marca"]?></b>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> CATEGORIA </div>
                                                <div class="profile-info-value">
                                                    <b><?=$v_Producto["Des_Categoria"]?></b>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> CATEGORIA PADRE </div>
                                                <div class="profile-info-value">
                                                    <b><?=$v_Producto["Des_Categoria_Padre"]?></b>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> FECHA REGISTRO </div>
                                                <div class="profile-info-value">
                                                    <b><?=$v_Producto["Fec_Registro"]?></b>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> FECHA MODIFICA </div>
                                                <div class="profile-info-value">
                                                    <b><?=$v_Producto["Fec_Modificacion"]?></b>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> ESTADO COMERCIAL </div>
                                                <div class="profile-info-value">
                                                    <span class="label label-sm label-success" style="background: blue;"><?=$v_Producto["Des_Estado"]?></span>                 
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> ESTADO SISTEMA </div>
                                                <div class="profile-info-value">
                                                    <span class="label label-sm label-success" style="background: blue;"><?=$v_Producto["Des_Baja"]?></span>                 
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> WEB EXTERNA </div>
                                                <div class="profile-info-value">
                                                    <span class="label label-sm label-success" style="background: blue;"><?=$v_Producto["Des_Vista_Web"]?></span>                 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <span class="profile-picture">
                                            <img id="avatar" src="<?=base_url($v_Producto["ProductoImg"]["Des_ImgProducto_UrlPrin"])?>" style="width: 76%;"
                                             class="editable img-responsive editable-click editable-empty" alt="Alex's Avatar">
                                        </span>
                                    </div>
                                </div>
                                <?php foreach( $v_Producto["List_Tienda_Configuracion"] as $Item ){ ?>
                                <div class="form-group punteado">
                                    <div class="col-sm-12">
                                        <div class="profile-user-info profile-user-info-striped" style="TEXT-ALIGN: CENTER;">
                                            <h4><i class="fa fa-map-marker light-orange bigger-110"></i> <?=$Item["Des_Tienda"]?></h4>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="profile-user-info profile-user-info-striped">
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> PRECIO </div>
                                                <div class="profile-info-value">
                                                    <b><?=$Item["Des_Precio"]?></b>
                                                </div>
                                            </div>

                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> STOCK </div>
                                                <div class="profile-info-value">
                                                    <b><?=$Item["Num_Stock_Actual"]?></b>
                                                </div>
                                            </div>

                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> DESCUENTO </div>
                                                <div class="profile-info-value">
                                                    <?php if($Item["Flg_Descuento"]) { ?>
                                                        <span class="label label-sm label-success" style="background: blue;"><?=$Item["Des_Descuento"]?></span>
                                                    <?php }else{ ?>
                                                        <span class="label label-sm label-success" style="background: red;"><?=$Item["Des_Descuento"]?></span>
                                                    <?php } ?>          
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> TIPO DESCUENTO </div>
                                                <div class="profile-info-value">
                                                    <b><?=$Item["Des_Nombre_Descuento"]?></b>
                                                </div>
                                            </div>
                                            
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> VALOR DESCUENTO </div>
                                                <div class="profile-info-value">
                                                    <?php if($Item["Flg_Descuento"]){ ?>
                                                        <?php if($Item["Tip_Descuento"] == 1) { ?>
                                                            <b><?=$Item["Num_Descuento"]?></b>
                                                        <?php }else{ ?>
                                                            <b><?=($Item["Num_Descuento"]*100) . " %" ?></b>
                                                        <?php } ?>
                                                    <?php } ?> 
                                                </div>
                                            </div>

                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> HISTORICO </div>
                                                <div class="profile-info-value">
                                                    <?php if($Item["Flg_Historico"]) { ?>
                                                        <span class="label label-sm label-success" style="background: blue;"><?=$Item["Des_Historico"]?></span>
                                                    <?php }else{ ?>
                                                        <span class="label label-sm label-success" style="background: red;"><?=$Item["Des_Historico"]?></span>
                                                    <?php } ?>          
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> FECHA ULTIMA INTERACCIÓN </div>
                                                <div class="profile-info-value">
                                                    <b><?=$Item["Fec_Interaccion"]?></b>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="widget-box transparent">

                                            <div class="widget-body">
                                                <div class="widget-main no-padding">
                                                    <table class="table table-bordered table-striped">
                                                        <thead class="thin-border-bottom">
                                                            <tr>
                                                                <th>
                                                                    STOCK DISPONIBLE
                                                                </th>
                                                                <th class="hidden-480">
                                                                    PRECIO COMPRA
                                                                </th>
                                                                <th>
                                                                    PRECIO COMPRA ORIGINAL
                                                                </th>
                                                                
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <?php 
                                                                if(!empty($Item["List_Stock"])){
                                                                $lt_Contador = 0;    
                                                            ?>
                                                                <?php 
                                                                    foreach($Item["List_Stock"] as $Item_Stock){
                                                                        $lt_Contador++; 
                                                                ?>
                                                                    <?php
                                                                        
                                                                        $t_Style = ($Item_Stock["Flg_Uso"]) ? 'style="background: #e4e43d;"' : "";
                                                                    ?>
                                                                    <tr <?=$t_Style?> >
                                                                        <td >
                                                                            <b class="blue"><?=$Item_Stock["Num_Disponible"]?></b>
                                                                        </td>
                                                                        <td>
                                                                            <b class="blue"><?=$Item_Stock["Des_Precio_Sistema"]?></b>
                                                                        </td>
                                                                        <td>
                                                                            <b class="blue"><?=$Item_Stock["Des_Precio_Origen"]?></b>
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
                                <?php } ?>
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