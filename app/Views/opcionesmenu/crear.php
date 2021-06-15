<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
</ol>

<input type="hidden" id="h_crear" value="1">
<input type="hidden" id="h_listar" value="0">

<input type="hidden" id="h_Id_Menu" value="<?php if(!empty($Menu)){echo $Menu['Id_Menu'];}else{echo "0";}?>">

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
                                        <h1 class="page-header">MANTENIMIENTO DE MENU <small></small></h1>
                                    </div>
                                </div>
                                
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>DESCRIPCIÓN DE MENU (*) :</b></label>
									<div class="col-md-6 col-sm-6">
										<input class="form-control" type="text" id="txt-Des_Menu" name="txt-Des_Menu" value="<?php if(!empty($Menu)){echo $Menu['Des_Menu'];}?>" maxlength="128"><ul class="parsley-errors-list" ></ul>
									</div>
                                </div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3" for="message"><b>MENU PADRE (*):</b></label>
									<div class="col-md-6 col-sm-6">
				                        <select class="form-control selectpicker" id="lst-Id_MenuPadre" name="lst-Id_MenuPadre" data-size="10" data-style="btn-primary" data-live-search="true">
                                            <option>[--ELEGIR MENU PADRE--]</option>
                                            <?php
                                                $t_selected = "";  
                                                foreach($ListMenu as $item){
                                                    if(!empty($Menu)){
                                                        $t_selected = ((int)$Menu["Id_MenuPadre"]==(int)$item->Id_Menu) ? "selected" : "";
                                                    }
                                            ?>
                                                <option value="<?=$item->Id_Menu?>" <?=$t_selected?>><?=$item->Des_Menu?></option>
                                            <?php  }  ?>
				                        </select>
									</div>
                                </div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>URL DE MENU (*) :</b></label>
									<div class="col-md-6 col-sm-6">
										<input class="form-control" type="text" id="txt-Des_UrlMenu" name="txt-Des_UrlMenu" value="<?php if(!empty($Menu)){echo $Menu['Des_UrlMenu'];}?>" maxlength="512"><ul class="parsley-errors-list" ></ul>
									</div>
                                </div>                                                               
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>KEY DE MENU (*) :</b></label>
									<div class="col-md-6 col-sm-6">
										<input class="form-control" type="text" id="txt-Cod_KeyMenu" name="txt-Cod_KeyMenu" value="<?php if(!empty($Menu)){echo $Menu['Cod_KeyMenu'];}?>" placeholder="AAAAA" maxlength="64"><ul class="parsley-errors-list"></ul>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3" for="message"><b>MENU REDIRECCIONABLE (*):</b></label>
									<div class="col-md-6 col-sm-6">
				                        <select class="form-control selectpicker" id="lst-Flg_Redigirible" name="lst-Flg_Redigirible" data-size="10" data-style="btn-primary" data-live-search="true">
                                            <option value="1" <?php if(!empty($Menu)){if($Menu["Flg_Redigirible"]){ echo "selected";}}?>>SI</option>
                                            <option value="0" <?php if(!empty($Menu)){if(!$Menu["Flg_Redigirible"]){ echo "selected";}}?>>NO</option>
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
  <div class="col-md-12 ui-sortable">
    <div class="panel panel-inverse" data-sortable-id="form-validation-1">
          <div class="panel-body panel-form">
            <form class="form-horizontal form-bordered" data-parsley-validate="true" novalidate="">
                <div class="form-group">
                    <div class="col-md-6 col-sm-6" style="text-align: right;">
                        <a data-bb-handler="cancel" href="<?=base_url("public/Menu")?>" id="btn-cancelar" 
                        type="button" class="btn btn-danger"><i class="ace-icon fa fa-times"></i> Cancelar</a>
                    </div>             
                    <div class="col-md-6 col-sm-6" style="text-align: left;">
                        <a data-bb-handler="ok" id="btn-guardar" 
                        type="button" class="btn btn-primary"><i class="ace-icon fa fa-pencil"></i>Guardar</a>
                    </div>                                   
                </div>            
            </form>
      </div>
    </div>
  </div>
</div>

 <!-- ==================  JS COMPLEMENTOS ================== -->
 <script src="<?php echo base_url('assets/plugins/jquery/jquery-3.4.1.min.js');?>"></script>
  <!-- ================== END JS COMPLEMENTOS ================== -->

 <!-- ==================  JS FUNCIONES ================== -->
 <script src="<?php echo base_url('assets/js_sistema/backend.generico.js'); ?>"></script>
 <script src="<?php echo base_url('assets/js_sistema/opcionesmenu/backend.opcionesmenu.js'); ?>"></script>


