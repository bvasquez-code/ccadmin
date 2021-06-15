<?php

    $t_Seleccion = ""; //Variable para seleccionar

?>
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
</ol>

<input type="hidden" id="h_crear" value="1">
<input type="hidden" id="h_listar" value="0">

<input type="hidden" id="h_Id_CategoriaPro" value="<?php if(!empty($CategoriaProducto)){echo $CategoriaProducto['Id_CategoriaPro'];}else{echo "0";}?>">

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
                                        <h1 class="page-header">CATEGORIA PRODUCTO <small></small></h1>
                                    </div>
                                </div>
                                
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>DESCRIPCIÓN CATEGORIA (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Des_CategoriaPro_Nom" name="txt-Des_CategoriaPro_Nom" value="<?php if(!empty($CategoriaProducto)){echo $CategoriaProducto['Des_CategoriaPro_Nom'];}?>" maxlength="128">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>CODIGO CATEGORIA (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Cod_CategoriaPro" name="txt-Cod_CategoriaPro" value="<?php if(!empty($CategoriaProducto)){echo $CategoriaProducto['Cod_CategoriaPro'];}?>" placeholder="AAAAA" maxlength="32">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3" for="message"><b>¿ES CATEGORIA PADRE? (*):</b></label>
									<div class="col-md-9 col-sm-9">
				                        <select class="form-control selectpicker" id="lst-Tip_CategoriaPro_Pdr" name="lst-Tip_CategoriaPro_Pdr" data-size="10" data-style="btn-primary" data-live-search="true">
                                            <option value="1" <?php if(!empty($CategoriaProducto)){if($CategoriaProducto["Tip_CategoriaPro_Pdr"]==1){ echo "selected";}}?>>SI</option>    
                                            <option value="2" <?php if(!empty($CategoriaProducto)){if($CategoriaProducto["Tip_CategoriaPro_Pdr"]==2){ echo "selected";}}?>>NO</option>                                            
				                        </select>
									</div>
								</div>
                                <?php
                                    $l_display = 'style="display:none;"';
                                    $l_display_2 = 'style="display:none;"';
                                    if(!empty($CategoriaProducto))
                                    {
                                        if($CategoriaProducto["Tip_CategoriaPro_Pdr"]==1)
                                        {
                                            $l_display = 'style="display:none;"';
                                            $l_display_2 = '';
                                        }else
                                        {
                                            $l_display = '';
                                            $l_display_2 = 'style="display:none;"';
                                        }
                                        
                                    }else
                                    {
                                        $l_display = 'style="display:none;"';
                                    }
                                ?>
								<div class="form-group" <?=$l_display?> id="div-Id_CategoriaPro_Pdr">
									<label class="control-label col-md-3 col-sm-3" for="message"><b>CATEGORIA PADRE (*):</b></label>
									<div class="col-md-9 col-sm-9">
				                        <select class="form-control selectpicker" id="lst-Id_CategoriaPro_Pdr" name="lst-Id_CategoriaPro_Pdr" data-size="10" data-style="btn-primary" data-live-search="true">
                                            <option value="0">[--SELECCIONE CATEGORIA PADRE--]</option>
                                            <?php if(!empty($ListCategoriasPadre)){ ?>
                                            <?php
                                                $l_Seleccion = "";
                                                $l_Id_CategoriaPro = 0;
                                                $l_Id_CategoriaPro_Pdr = 0;
                                                if(!empty($CategoriaProducto)) $l_Id_CategoriaPro = $CategoriaProducto['Id_CategoriaPro'];
                                                if(!empty($CategoriaProducto)) $l_Id_CategoriaPro_Pdr = $CategoriaProducto['Id_CategoriaPro_Pdr'];
                                            ?>         
                                                <?php foreach($ListCategoriasPadre as $Item){      ?>
                                                    
                                                    <?php if($l_Id_CategoriaPro != $Item["Id_CategoriaPro"]){ ?>

                                                        <?php if($l_Id_CategoriaPro_Pdr == $Item["Id_CategoriaPro"]) $l_Seleccion = "selected"; ?>
                                                        <option value="<?=$Item["Id_CategoriaPro"]?>" <?=$l_Seleccion?>><?="(".$Item["Cod_CategoriaPro"].")  ".$Item["Des_CategoriaPro_Nom"]?></option>
                                                        <?php $l_Seleccion = "";?>
                                                    
                                                        <?php  }?>
                                                <?php  }?>
                                                
                                            <?php } ?>    
                                        </select>
									</div>
                                </div>
                                <div class="form-group" <?=$l_display_2?> id="div-Flg_ValidaStock">
									<label class="control-label col-md-3 col-sm-3" for="message"><b>¿CATEGORIA ACEPTA STOCK? (*):</b></label>
									<div class="col-md-9 col-sm-9">
				                        <select class="form-control selectpicker" id="lst-Flg_ValidaStock" name="lst-Flg_ValidaStock" data-size="10" data-style="btn-primary" data-live-search="true">
                                            <option value="0">[--SELECCIONE CATEGORIA PADRE--]</option>
                                            <?php if(!empty($v_List_Flg_ValStock)){ ?>
                                                
                                                <?php foreach($v_List_Flg_ValStock as $Item){      ?>
                                                    <?php
                                                        if(!empty($CategoriaProducto))
                                                        {
                                                            $t_Seleccion = ( $CategoriaProducto["Flg_ValidaStock"] == $Item["Cod_ParSis"] ) ? "selected" : "";
                                                        }    
                                                    ?>
                                                    <option value="<?=$Item["Cod_ParSis"]?>" <?=$t_Seleccion?>><?=$Item["Des_ParSis_Nom"]?></option>
                                                <?php  }?>                                                
                                            <?php } ?>    
                                        </select>
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
				<a href="<?=base_url("public/categoriaproducto")?>" id="btn-cancelar" 
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
 <script src="<?php echo base_url('assets/js_sistema/categoriaproducto/backend.categoriaproducto.js'); ?>"></script>