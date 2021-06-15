<?php
	// echo json_encode($Producto);
?>
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
</ol>

<input type="hidden" id="h_crear" value="1">
<input type="hidden" id="h_listar" value="0">

<input type="hidden" id="h_Id_Producto" value="<?php if(!empty($Id_Producto)){echo $Id_Producto;}else{echo "0";}?>">

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
                                        <h1 class="page-header">PRODUCTO <small></small></h1>
                                    </div>
                                </div>
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>CODIGO BARRAS :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Cod_Barras" name="txt-Cod_Barras" placeholder="USAR PISTOLA DE CODIGO DE BARRAS" maxlength="32">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b></b></label>
									<div class="col-md-9 col-sm-9">
										<img id="producto_barcode"/>
									</div>
								</div>								
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>DESCRIPCIÓN PRODUCTO (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Des_Producto_Nom" name="txt-Des_Producto_Nom" required maxlength="128">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>CODIGO PRODUCTO - SKU (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Cod_Producto" name="txt-Cod_Producto" placeholder="C00000" maxlength="32">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>CATEGORIA PRODUCTO (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<select class="form-control selectpicker" id="lst-Id_CategoriaProducto" name="lst-Id_CategoriaProducto" data-size="10" data-style="btn-primary">
											<option value="0">[--SELECCIONE CATEGORIA--]</option>
											<?php if(!empty($List_Categoria)){ ?>
       
												<?php foreach($List_Categoria as $Item){      ?>

													<option value="<?=$Item["Id_CategoriaPro"]?>"><?=$Item["Des_CategoriaPro_Nom"]." (".$Item["Cod_CategoriaPro"].")"?></option>
													
												<?php  }?>
													
											<?php } ?>                                          
				                        </select>										
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>MARCA PRODUCTO (*) :</b></label>
									<div class="col-md-9 col-sm-9">
									<select class="form-control selectpicker" id="lst-Id_MarcaProducto" name="lst-Id_MarcaProducto" data-size="10" data-style="btn-primary">
											<option value="0">[--SELECCIONE MARCA--]</option>
											<?php if(!empty($List_Marca)){ ?>
      
												<?php foreach($List_Marca as $Item){      ?>

													<option value="<?=$Item["Id_MarcaProducto"]?>"><?=$Item["Des_MarcaProducto_Nom"]." (".$Item["Cod_MarcaProducto"].")"?></option>
													
												<?php  }?>
													
											<?php } ?>                                          
				                        </select>
									</div>
                                </div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>TIPO DE AFECTACIÓN AL IGV (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<select class="form-control selectpicker" id="lst-Tip_Afectacion" name="lst-Tip_Afectacion" data-size="10" data-style="btn-primary">
											<option value="0">[--SELECCIONE TIPO DE AFECTACIÓN--]</option>
											<?php if(!empty($List_Tip_Afectacion)){ ?>
       
												<?php foreach($List_Tip_Afectacion as $Item){      ?>

													<option value="<?=$Item["Cod_ParSis"]?>"><?=$Item["Num_ParSis_In1"] ." - ". $Item["Des_ParSis_Nom"]?></option>
													
												<?php  }?>
													
											<?php } ?>                                          
				                        </select>										
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>CÓDIGOS DE TIPOS DE TRIBUTOS (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<select class="form-control selectpicker" id="lst-Tip_Tributo" name="lst-Tip_Tributo" data-size="10" data-style="btn-primary">
											<option value="0">[--SELECCIONE DE TRIBUTO--]</option>
											<?php if(!empty($List_Tip_Tributo)){ ?>
       
												<?php foreach($List_Tip_Tributo as $Item){      ?>

													<option value="<?=$Item["Cod_ParSis"]?>"><?=$Item["Num_ParSis_In1"] ." - ". $Item["Des_ParSis_Nom"]." (".$Item["Des_ParSis_Abr"]." - ".$Item["Des_ParSis_Tx1"].")"?></option>
													
												<?php  }?>
													
											<?php } ?>                                          
				                        </select>										
									</div>
								</div>															
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b> * DESCRIPCIÓN PRODUCTO 1 :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Des_Producto_Texto1" name="txt-Des_Producto_Texto1" placeholder="" maxlength="512">
									</div>
                                </div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b> * DESCRIPCIÓN PRODUCTO 2 :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Des_Producto_Texto2" name="txt-Des_Producto_Texto2" placeholder="" maxlength="256">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3" for="message"><b>MONEDA BASE DEL PRECIO (*):</b></label>
									<div class="col-md-9 col-sm-9">
				                        <select class="form-control selectpicker" id="lst-Tip_Producto_Moneda" name="lst-Tip_Producto_Moneda" data-size="10" data-style="btn-primary">                                       
											<option value="0">[--SELECCIONE TIPO MONEDA--]</option>
											<?php foreach($List_TipoMonedas as $Item){      ?>

												<option value="<?=$Item["Cod_ParSis"]?>"><?=$Item["Des_ParSis_Nom"] . " (". $Item["Des_ParSis_Tx1"] . ")"?></option>

											<?php  }?>											
										</select>
									</div>
                                </div>								
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>PRECIO (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="number" type="text" id="txt-Num_Producto_Precio" name="txt-Num_Producto_Precio" placeholder="00.00" maxlength="16">
									</div>
                                </div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>STOCK MINIMO (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Num_Producto_StockMin" name="txt-Num_Producto_StockMin" placeholder="" maxlength="11">
									</div>
                                </div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>STOCK MAXIMO :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Num_Producto_StockMax" name="txt-Num_Producto_StockMax" placeholder="" maxlength="11">
									</div>
                                </div>                                
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3" for="message"><b>¿ACTIVA DESCUENTO? (*):</b></label>
									<div class="col-md-9 col-sm-9">
				                        <select class="form-control selectpicker" id="lst-Flg_Producto_Desc" name="lst-Flg_Producto_Desc" data-size="10" data-style="btn-primary">
                                            <option value="1">SI</option>    
                                            <option value="0">NO</option>                                            
				                        </select>
									</div>
                                </div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3" for="message"><b>TIPO DE DESCUENTO (*):</b></label>
									<div class="col-md-9 col-sm-9">
				                        <select class="form-control selectpicker" id="lst-Tip_Producto_Desc" name="lst-Tip_Producto_Desc" data-size="10" data-style="btn-primary">
											<option value="0">[--SELECCIONE TIPO DE DESCUENTO--]</option>
											<?php if(!empty($List_TipoDescuento)){ ?>
        
												<?php foreach($List_TipoDescuento as $Item){      ?>

													<option value="<?=$Item["Cod_ParSis"]?>"><?=$Item["Des_ParSis_Nom"]?></option>
													
												<?php  }?>														
											<?php } ?>                                          
				                        </select>
									</div>
                                </div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>MONTO :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Num_Producto_DescMon" name="txt-Num_Producto_DescMon" placeholder="00.00" maxlength="16">
									</div>
                                </div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>PORCENTAJE :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Num_Producto_DescPor" name="txt-Num_Producto_DescPor" placeholder="00.00" maxlength="16">
									</div>
                                </div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3" for="message"><b>¿ACTIVA HISTORICO? (*):</b></label>
									<div class="col-md-9 col-sm-9">
				                        <select class="form-control selectpicker" id="lst-Flg_Producto_Histo" name="lst-Flg_Producto_Histo" data-size="10" data-style="btn-primary">
                                            <option value="1" >SI</option>    
                                            <option value="0" >NO</option>                                            
				                        </select>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>IMAGEN PRINCIPAL :</b></label>
									<div class="col-md-6 col-sm-6">
										<input class="form-control" type="file" id="file-img-principal" name="file-img-principal">
									</div>
									<div class="col-md-3 col-sm-3" id="div-img-principal">
										<input class="form-control" type="text" id="txt-Des_Producto_ImgPrin" name="txt-Des_Producto_ImgPrin" value="" readonly>
									</div>
                                </div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>IMAGENES SECUNDARIAS :</b></label>
									<div class="col-md-6 col-sm-6">
										<input class="form-control" type="file" id="file-img-secundaria" name="file-img-secundaria">
									</div>
									<div class="col-md-3 col-sm-3">
										<a class="btn btn-inverse agregar-carrito" id="btn-agregar-img">Add +</a>
									</div>
                                </div>
								<div class="form-group carga-aplicacion">
									<label class="control-label col-md-3 col-sm-3"><b>LISTA DE IMAGENES :</b></label>
                                    <div class="col-md-9 col-sm-9">
                                        <div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline no-footer">
                                            <table id="data-table-stock" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Item</th>
                                                        <th>Imagen</th>
                                                        <th>Opciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
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
				<a href="<?=base_url("public/producto")?>" id="btn-cancelar" 
				type="button" class="btn btn-danger"><i class="ace-icon fa fa-times"></i> Cancelar</a>
				<a id="btn-guardar" 
				type="button" class="btn btn-primary"><i class="ace-icon fa fa-pencil"></i>Guardar</a>
			</div>                                   
		</div>  
  </div>
</div>

 <!-- ==================  JS COMPLEMENTOS ================== -->
 <script src="<?php echo base_url('assets/plugins/jquery/jquery-3.4.1.min.js');?>"></script>
 <script src="<?php echo base_url('assets/complement/JsBarcode.all.min.js'); ?>"></script>
  <!-- ================== END JS COMPLEMENTOS ================== -->

 <!-- ==================  JS FUNCIONES ================== -->
 <script src="<?php echo base_url('assets/js_sistema/backend.generico.js'); ?>"></script>
 <script src="<?php echo base_url('assets/js_sistema/producto/backend.producto.js'); ?>"></script>
 <!-- ================== END JS FUNCIONES ================== -->