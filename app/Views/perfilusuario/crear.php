<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
</ol>

<input type="hidden" id="h_Id_Perfil" value="<?php if(!empty($PerfilUsuario)){echo $PerfilUsuario['Id_Perfil'];}else{echo "0";}?>">


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
                                        <h1 class="page-header">PERFIL DE USUARIO <small></small></h1>
                                    </div>
                                </div>
                                
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>DESCRIPCIÓN DE PERFIL (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Des_Perfil" name="txt-Des_Perfil" value="<?php if(!empty($PerfilUsuario)){echo $PerfilUsuario['Des_Perfil'];}?>" maxlength="64">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>KEY DE PERIL (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Cod_KeyPerfil" name="txt-Cod_KeyPerfil" value="<?php if(!empty($PerfilUsuario)){echo $PerfilUsuario['Cod_KeyPerfil'];}?>" placeholder="AAAAA" maxlength="5">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3" for="message"><b>RESTRINGE A TIENDA (*):</b></label>
									<div class="col-md-9 col-sm-9">
				                        <select class="form-control selectpicker" id="lst-Flg_RestrinTienda" name="lst-Flg_RestrinTienda" data-size="10" data-style="btn-primary" data-live-search="true">
                                            <option value="1" <?php if(!empty($PerfilUsuario)){if($PerfilUsuario["Flg_RestrinTienda"]){ echo "selected";}}?>>SI</option>
                                            <option value="0" <?php if(!empty($PerfilUsuario)){if(!$PerfilUsuario["Flg_RestrinTienda"]){ echo "selected";}}?>>NO</option>
				                        </select>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3" for="message"><b>RESTRINGE A CAJA (*):</b></label>
									<div class="col-md-9 col-sm-9">
				                        <select class="form-control selectpicker" id="lst-Flg_RestrinCaja" name="lst-Flg_RestrinCaja" data-size="10" data-style="btn-primary" data-live-search="true">
											<option value="1" <?php if(!empty($PerfilUsuario)){if($PerfilUsuario["Flg_RestrinCaja"]){ echo "selected";}}?>>SI</option>
                                            <option value="0" <?php if(!empty($PerfilUsuario)){if(!$PerfilUsuario["Flg_RestrinCaja"]){ echo "selected";}}?>>NO</option>
				                        </select>
									</div>
                                </div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3" for="message"><b>HORARIOS (*):</b></label>
									<div class="col-md-3 col-sm-3">
										<input class="form-control" type="text" id="txt-Fec_Inicio" name="txt-Fec_Inicio" value="<?php if(!empty($PerfilUsuario)){echo $PerfilUsuario['Fec_Inicio'];}else{ echo "7:00";}?>" placeholder="07:00" maxlength="5">
                                    </div>
									<div class="col-md-3 col-sm-3">
										<input class="form-control" type="text" id="txt-Fec_Final" name="txt-Fec_Final" value="<?php if(!empty($PerfilUsuario)){echo $PerfilUsuario['Fec_Final'];}else{ echo "19:00";}?>" placeholder="19:00" maxlength="5">
									</div>                                    
                                </div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>DÍAS DE ACCESO (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Des_DiasPermi" name="txt-Des_DiasPermi" value="<?php if(!empty($PerfilUsuario)){echo $PerfilUsuario['Des_DiasPermi'];}else{ echo "1,2,3,4,5";}?>" placeholder="1,2,3,4,5,6,7" maxlength="13">
									</div>
								</div>                                                                
				                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3"><b>PERMISOS OPERACIONALES(*) :</b></label>
                                    <div class="col-md-9 col-sm-9">
                                        <table id="data-table" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Item</th>
                                                    <th style="width: 30%;">Validacion</th>
                                                    <th>Permiso</th>                        
                                                </tr>
                                            </thead>
                                            <tbody>
											<?php if(!empty($v_List_Validaciones)) {?>
												<?php foreach($v_List_Validaciones as $Key => $ItemVal) { ?>
													<tr class="odd gradeX">
														<td align="left"><?=($Key + 1)?></td>
														<td align="left"><?= $ItemVal["Des_Mensaje"]?></td>
														<td align="left">
															<input class="clase-validacion" type="checkbox" id="<?= "validacion-" . $ItemVal["Cod_Validacion"]?>" name="<?= "validacion-" .$ItemVal["Cod_Validacion"]?>" value="0">
														</td>
													</tr>
												<?php } ?>
											<?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
				                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3"><b>PERMISOS OPCIONES SISTEMA(*) :</b></label>
                                    <div class="col-md-9 col-sm-9">
                                        <table id="data-table" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Item</th>
													<th style="width: 30%;">MENU</th>
													<th style="width: 30%;">KEY</th>
                                                    <th>Permiso</th>                        
                                                </tr>
                                            </thead>
                                            <tbody>
											<?php if(!empty($v_List_Menu)) {?>
												<?php foreach($v_List_Menu as $Key => $ItemVal) { ?>
													<?php
														$t_Style = "";
														if($ItemVal["Num_Nivel"] == 1) $t_Style = 'style="background:#b7b5b5;"';
														if($ItemVal["Num_Nivel"] != 1 && $ItemVal["Flg_Redigirible"] == true) $t_Style = 'style="background:#fff;"';
														if($ItemVal["Num_Nivel"] != 1 && $ItemVal["Flg_Redigirible"] == false) $t_Style = 'style="background:#ddd;"';

													?>
													<tr class="odd gradeX" <?=$t_Style?>>
														<td align="left"><?=($Key + 1)?></td>
														<td align="left"><?= $ItemVal["Des_Menu"]?></td>
														<td align="left"><?= $ItemVal["Cod_KeyMenu"]?></td>
														<td align="left">
															<input class="clase-menu" type="checkbox" id="<?= "menu-" . $ItemVal["Id_Menu"]?>" name="<?= "menu-" .$ItemVal["Id_Menu"]?>" value="0">
														</td>
													</tr>
												<?php } ?>
											<?php } ?>
                                            </tbody>
                                        </table>
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
				<a href="<?=base_url("public/perfilusuario")?>" id="btn-cancelar" 
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
 <script src="<?php echo base_url('assets/js_sistema/perfilusuario/backend.crearperfilusuario.js'); ?>"></script>


