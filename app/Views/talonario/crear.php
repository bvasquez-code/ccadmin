<?php

    $T_Seleccion = ""; //Variable para marcar un "option html"

?>

<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
</ol>

<input type="hidden" id="h_crear" value="1">
<input type="hidden" id="h_listar" value="0">

<input type="hidden" id="h_Id_Caja" value="<?php if(!empty($v_Obj_Caja)){echo $v_Obj_Caja['Id_Caja'];}?>">
<input type="hidden" id="h_Id_Tienda" value="<?php if(!empty($v_Obj_Caja)){echo $v_Obj_Caja['Id_Tienda'];}?>">
<input type="hidden" id="h_Id_Usuario" value="<?php if(!empty($v_Obj_Caja)){echo $v_Obj_Caja['Id_Usuario'];}?>">

<div class="row">
    <div class="col-md-12">
    <div class="tab-pane fade active in" id="tab-1">
			<div class="row">
				<div class="col-md-12 ui-sortable">
					<div class="panel panel-inverse" data-sortable-id="form-validation-1">
				        <div class="panel-body panel-form">
				            <form id="form-datos-formulariov_Obj_Caja" class="form-horizontal form-bordered" data-parsley-validate="true" name="demo-form" novalidate="">
                                <div class="form-group">
                                    <div class="row" style="text-align: center;">
                                        <h1 class="page-header">TALONARIO <small></small></h1>
                                    </div>
                                </div>
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>TIENDA (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<select class="form-control selectpicker" id="lst-Id_Tienda" name="lst-Id_Tienda" data-size="10" data-style="btn-primary">											
                                            <?php if(!empty($v_List_Tienda)){ ?>
                                                <option value="0">[--SELECCIONE TIENDA--]</option>
                                                <?php foreach($v_List_Tienda as $Item){ ?>
                                                    <option value="<?=$Item["Id_Tienda"]?>"  <?=$T_Seleccion?>><?="(".$Item["Cod_Tienda"].") ".$Item["Des_Tienda"]?></option>
                                                <?php }?>
                                            <?php }?>                                        
				                        </select>										
									</div>
                                </div>
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>TIPO DOCUMENTO (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<select class="form-control selectpicker" id="lst-Tip_Documento" name="lst-Tip_Documento" data-size="10" data-style="btn-primary">											
                                            <?php if(!empty($v_List_Tienda)){ ?>
                                                <option value="0">[--SELECCIONE DOCUMENTO--]</option>
                                                <?php foreach($v_List_Documento as $Item){ ?>
                                                    <option value="<?=$Item["Id_Documento"]?>"  <?=$T_Seleccion?>><?=$Item["Des_Documento"]?></option>
                                                <?php }?>
                                            <?php }?>                                        
				                        </select>										
									</div>
                                </div>
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>TIPO ASIGNACIÓN (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<select class="form-control selectpicker" id="lst-Tip_Asignacion" name="lst-Tip_Asignacion" data-size="10" data-style="btn-primary">											
                                            <?php if(!empty($v_List_Tienda)){ ?>
                                                <option value="0">[--SELECCIONE TIPO DE ASIGNACIÓN--]</option>
                                                <?php foreach($v_List_TipTalonario as $Item){ ?>
                                                    <option value="<?=$Item["Cod_ParSis"]?>"  <?=$T_Seleccion?>><?=$Item["Des_ParSis_Nom"]?></option>
                                                <?php }?>
                                            <?php }?>                                        
				                        </select>										
									</div>
								</div>
                                
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>SERIE(*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Cod_Serie" name="txt-Cod_Serie" required value="<?php if(!empty($v_Obj_Caja)){echo $v_Obj_Caja['Des_Caja'];}?>" maxlength="64">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>LIMITE (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Num_Limite" name="txt-Num_Limite" required value="<?php if(!empty($v_Obj_Caja)){echo $v_Obj_Caja['Cod_Caja'];}?>" maxlength="16">
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
				<a href="<?=base_url("public/v_Obj_Caja")?>" id="btn-cancelar" 
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
<!-- ==================  END JS FUNCIONES ================== -->


<script>
$(document).ready(function() {

    var BASE_URL = $("#URL_BASE").val();
    var g_Id_Talonario = 0;


    function Set_Talonario()
    {
        var l_Request = {      
             Id_Talonario : g_Id_Talonario
            ,Id_Tienda : $("#lst-Id_Tienda").val()
            ,Id_Caja : null
            ,Tip_Documento : $("#lst-Tip_Documento").val()
            ,Des_Documento : ""
            ,Cod_Serie : $("#txt-Cod_Serie").val()
            ,Num_UltimoCorr : 1
            ,Num_Limite : $("#txt-Num_Limite").val()
            ,Tip_Asignacion : $("#lst-Tip_Asignacion").val()
            ,Id_UsuarioTal : null
        };

        var l_Response = SetActionJquery(l_Request,BASE_URL+"public/talonario/Set_Talonario");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {
                window.location.href = BASE_URL+"public/talonario";
            }else{
                Ejecutar_Modal_Error(data.Error.messages);
            } 
        });
        l_Response.error(function(){
            alert("ERROR 500");
        });
    }

    $("#btn-guardar").click(function(e)
    {
        Set_Talonario();
    });


});
</script>   