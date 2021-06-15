<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
</ol>

<input type="hidden" id="h_crear" value="1">
<input type="hidden" id="h_listar" value="0">

<input type="hidden" id="h_Id_ConfigSis" value="<?php if(!empty($DataObject)){echo $DataObject['Id_ConfigSis'];}else{echo "0";}?>">

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
									<label class="control-label col-md-3 col-sm-3"><b>CODIGO CORRELATIVO (*) :</b></label>
									<div class="col-md-9 col-sm-9">
                                        <input class="form-control" type="text" id="txt-Cod_ConfigSis" name="txt-Cod_ConfigSis"                                         
                                        value="<?php if(!empty($DataObject)){echo $DataObject['Cod_ConfigSis'];}?>" maxlength="4" readonly="true">
									</div>                                   
                                </div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>DESCRIPCIÓN (*) :</b></label>
									<div class="col-md-9 col-sm-9">
                                        <input class="form-control" type="text" id="txt-Des_ConfigSis_Nom" name="txt-Des_ConfigSis_Nom"                                         
                                        value="<?php if(!empty($DataObject)){echo $DataObject['Des_ConfigSis_Nom'];}?>" maxlength="128">
									</div>                                   
                                </div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>ABREVIATURA (*) :</b></label>
									<div class="col-md-9 col-sm-9">
                                        <input class="form-control" type="text" id="txt-Des_ConfigSis_Abr" name="txt-Des_ConfigSis_Abr"                                         
                                        value="<?php if(!empty($DataObject)){echo $DataObject['Des_ConfigSis_Abr'];}?>" maxlength="5">
									</div>                                   
                                </div>
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>KEY (*) :</b></label>
									<div class="col-md-9 col-sm-9">
                                        <input class="form-control" type="text" id="txt-Des_ConfigSis_Key" name="txt-Des_ConfigSis_Key"                                         
                                        value="<?php if(!empty($DataObject)){echo $DataObject['Des_ConfigSis_Key'];}?>" maxlength="64">
									</div>                                   
                                </div>                                

							</form>
				            <form id="form-datos-formularioproducto" class="form-horizontal form-bordered" data-parsley-validate="true" name="demo-form" novalidate="">
                                <div class="form-group">
                                    <div class="row" style="text-align: center;">
                                        <h2 class="page-header">PARAMETROS A UTILIZAR<small></small></h2>
                                    </div>
                                </div>
                                
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>NOMBRE :</b></label>
									<div class="col-md-9 col-sm-9">
                                        <input class="form-control" type="text" id="txt-Des_DesParam_Nom" name="txt-Des_DesParam_Nom" 
                                        value="<?php if(!empty($DataObject)){echo $DataObject['Desconfigsistema']['Des_DesParam_Nom'];}?>" 
                                        maxlength="256"><ul class="parsley-errors-list" ></ul>
                                    </div>                                  
                                </div>
                                
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>ABREVIATURA :</b></label>
									<div class="col-md-9 col-sm-9">
                                        <input class="form-control" type="text" id="txt-Des_DesParam_Abr" name="txt-Des_DesParam_Abr" 
                                        value="<?php if(!empty($DataObject)){echo $DataObject['Desconfigsistema']['Des_DesParam_Abr'];}?>" 
                                        maxlength="256"><ul class="parsley-errors-list" ></ul>
                                    </div>                                  
                                </div>
                                
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>TEXTO UNO :</b></label>
									<div class="col-md-9 col-sm-9">
                                        <input class="form-control" type="text" id="txt-Des_DesParam_Tx1" name="txt-Des_DesParam_Tx1" 
                                        value="<?php if(!empty($DataObject)){echo $DataObject['Desconfigsistema']['Des_DesParam_Tx1'];}?>" 
                                        maxlength="256"><ul class="parsley-errors-list" ></ul>
                                    </div>                                  
                                </div>
                                
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>TEXTO DOS :</b></label>
									<div class="col-md-9 col-sm-9">
                                        <input class="form-control" type="text" id="txt-Des_DesParam_Tx2" name="txt-Des_DesParam_Tx2" 
                                        value="<?php if(!empty($DataObject)){echo $DataObject['Desconfigsistema']['Des_DesParam_Tx2'];}?>" 
                                        maxlength="256"><ul class="parsley-errors-list" ></ul>
                                    </div>                                  
                                </div>
                                
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>TEXTO TRES :</b></label>
									<div class="col-md-9 col-sm-9">
                                        <input class="form-control" type="text" id="txt-Des_DesParam_Tx3" name="txt-Des_DesParam_Tx3" 
                                        value="<?php if(!empty($DataObject)){echo $DataObject['Desconfigsistema']['Des_DesParam_Tx3'];}?>" 
                                        maxlength="256"><ul class="parsley-errors-list" ></ul>
                                    </div>                                  
                                </div>
                                
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>CHAR :</b></label>
									<div class="col-md-9 col-sm-9">
                                        <input class="form-control" type="text" id="txt-Des_DesParam_Ch1" name="txt-Des_DesParam_Ch1" 
                                        value="<?php if(!empty($DataObject)){echo $DataObject['Desconfigsistema']['Des_DesParam_Ch1'];}?>" 
                                        maxlength="256"><ul class="parsley-errors-list" ></ul>
                                    </div>                                  
                                </div>
                                
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>ENTERO UNO :</b></label>
									<div class="col-md-9 col-sm-9">
                                        <input class="form-control" type="text" id="txt-Des_DesParam_In1" name="txt-Des_DesParam_In1" 
                                        value="<?php if(!empty($DataObject)){echo $DataObject['Desconfigsistema']['Des_DesParam_In1'];}?>" 
                                        maxlength="256"><ul class="parsley-errors-list" ></ul>
                                    </div>                                  
                                </div>
                                
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>ENTERO DOS :</b></label>
									<div class="col-md-9 col-sm-9">
                                        <input class="form-control" type="text" id="txt-Des_DesParam_In2" name="txt-Des_DesParam_In2" 
                                        value="<?php if(!empty($DataObject)){echo $DataObject['Desconfigsistema']['Des_DesParam_In2'];}?>" 
                                        maxlength="256"><ul class="parsley-errors-list" ></ul>
                                    </div>                                  
                                </div>                                
                                
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>ENTERO TRES :</b></label>
									<div class="col-md-9 col-sm-9">
                                        <input class="form-control" type="text" id="txt-Des_DesParam_In3" name="txt-Des_DesParam_In3" 
                                        value="<?php if(!empty($DataObject)){echo $DataObject['Desconfigsistema']['Des_DesParam_In3'];}?>" 
                                        maxlength="256"><ul class="parsley-errors-list" ></ul>
                                    </div>                                  
                                </div> 
                                
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>SHORT UNO :</b></label>
									<div class="col-md-9 col-sm-9">
                                        <input class="form-control" type="text" id="txt-Des_DesParam_Sm1" name="txt-Des_DesParam_Sm1" 
                                        value="<?php if(!empty($DataObject)){echo $DataObject['Desconfigsistema']['Des_DesParam_Sm1'];}?>" 
                                        maxlength="256"><ul class="parsley-errors-list" ></ul>
                                    </div>                                  
                                </div> 
                                
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>SHORT DOS :</b></label>
									<div class="col-md-9 col-sm-9">
                                        <input class="form-control" type="text" id="txt-Des_DesParam_Sm2" name="txt-Des_DesParam_Sm2" 
                                        value="<?php if(!empty($DataObject)){echo $DataObject['Desconfigsistema']['Des_DesParam_Sm2'];}?>" 
                                        maxlength="256"><ul class="parsley-errors-list" ></ul>
                                    </div>                                  
                                </div>
                                
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>SHORT TRES :</b></label>
									<div class="col-md-9 col-sm-9">
                                        <input class="form-control" type="text" id="txt-Des_DesParam_Sm3" name="txt-Des_DesParam_Sm3" 
                                        value="<?php if(!empty($DataObject)){echo $DataObject['Desconfigsistema']['Des_DesParam_Sm3'];}?>" 
                                        maxlength="256"><ul class="parsley-errors-list" ></ul>
                                    </div>                                  
                                </div> 

								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>DECIMAL UNO :</b></label>
									<div class="col-md-9 col-sm-9">
                                        <input class="form-control" type="text" id="txt-Des_DesParam_Dc1" name="txt-Des_DesParam_Dc1" 
                                        value="<?php if(!empty($DataObject)){echo $DataObject['Desconfigsistema']['Des_DesParam_Dc1'];}?>" 
                                        maxlength="256"><ul class="parsley-errors-list" ></ul>
                                    </div>                                  
                                </div>
                                
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>DECIMAL DOS :</b></label>
									<div class="col-md-9 col-sm-9">
                                        <input class="form-control" type="text" id="txt-Des_DesParam_Dc2" name="txt-Des_DesParam_Dc2" 
                                        value="<?php if(!empty($DataObject)){echo $DataObject['Desconfigsistema']['Des_DesParam_Dc2'];}?>" 
                                        maxlength="256"><ul class="parsley-errors-list" ></ul>
                                    </div>                                  
                                </div>
                                
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>DECIMAL TRES :</b></label>
									<div class="col-md-9 col-sm-9">
                                        <input class="form-control" type="text" id="txt-Des_DesParam_Dc3" name="txt-Des_DesParam_Dc3" 
                                        value="<?php if(!empty($DataObject)){echo $DataObject['Desconfigsistema']['Des_DesParam_Dc3'];}?>" 
                                        maxlength="256"><ul class="parsley-errors-list" ></ul>
                                    </div>                                  
                                </div>
                                
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>FLAG UNO :</b></label>
									<div class="col-md-9 col-sm-9">
                                        <input class="form-control" type="text" id="txt-Des_DesParam_Bo1" name="txt-Des_DesParam_Bo1" 
                                        value="<?php if(!empty($DataObject)){echo $DataObject['Desconfigsistema']['Des_DesParam_Bo1'];}?>" 
                                        maxlength="256"><ul class="parsley-errors-list" ></ul>
                                    </div>                                  
                                </div> 

								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>FLAG DOS :</b></label>
									<div class="col-md-9 col-sm-9">
                                        <input class="form-control" type="text" id="txt-Des_DesParam_Bo2" name="txt-Des_DesParam_Bo2" 
                                        value="<?php if(!empty($DataObject)){echo $DataObject['Desconfigsistema']['Des_DesParam_Bo2'];}?>" 
                                        maxlength="256"><ul class="parsley-errors-list" ></ul>
                                    </div>                                  
                                </div> 
                                
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>FLAG TRES :</b></label>
									<div class="col-md-9 col-sm-9">
                                        <input class="form-control" type="text" id="txt-Des_DesParam_Bo3" name="txt-Des_DesParam_Bo3" 
                                        value="<?php if(!empty($DataObject)){echo $DataObject['Desconfigsistema']['Des_DesParam_Bo3'];}?>" 
                                        maxlength="256"><ul class="parsley-errors-list" ></ul>
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
				<a href="<?=base_url("public/parsistema")?>" id="btn-cancelar" 
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
 <script src="<?php echo base_url('assets/js_sistema/parsistema/backend.parsistema.js'); ?>"></script>
  <!-- ==================  JS FUNCIONES ================== -->


