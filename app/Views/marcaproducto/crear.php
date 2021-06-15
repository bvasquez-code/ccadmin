<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
</ol>

<input type="hidden" id="h_crear" value="1">
<input type="hidden" id="h_listar" value="0">

<input type="hidden" id="h_Id_MarcaProducto" value="<?php if(!empty($MarcaProducto)){echo $MarcaProducto['Id_MarcaProducto'];}else{echo "0";}?>">

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
                                        <h1 class="page-header">MARCA PRODUCTO <small></small></h1>
                                    </div>
                                </div>
                                
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>DESCRIPCIÓN MARCA (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Des_MarcaProducto_Nom"  name="txt-Des_MarcaProducto_Nom" value="<?php if(!empty($MarcaProducto)){echo $MarcaProducto['Des_MarcaProducto_Nom'];}?>" maxlength="128">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>CODIGO MARCA (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Cod_MarcaProducto" name="txt-Cod_MarcaProducto" value="<?php if(!empty($MarcaProducto)){echo $MarcaProducto['Cod_MarcaProducto'];}?>" placeholder="AAAAA" maxlength="32">
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
				<a href="<?=base_url("public/marcaproducto")?>" id="btn-cancelar" 
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
 <script src="<?php echo base_url('assets/js_sistema/marcaproducto/backend.marcaproducto.js'); ?>"></script>
 <!-- ================== END JS FUNCIONES ================== -->