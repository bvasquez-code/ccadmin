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
                                        <h1 class="page-header">CAJA <small></small></h1>
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
									<label class="control-label col-md-3 col-sm-3"><b>DESCRIPCIÓN CAJA (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Des_Caja" name="txt-Des_Caja" required value="<?php if(!empty($v_Obj_Caja)){echo $v_Obj_Caja['Des_Caja'];}?>" maxlength="64">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>CODIGO (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Cod_Caja" name="txt-Cod_Caja" required value="<?php if(!empty($v_Obj_Caja)){echo $v_Obj_Caja['Cod_Caja'];}?>" maxlength="16">
									</div>
								</div>
                                
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>USUARIO DE CAJA (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<select class="form-control selectpicker" id="lst-Id_Usuario" name="lst-Id_Usuario" data-size="10" data-style="btn-primary">											                                       
				                        </select>										
									</div>
                                </div>
                                
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>IP :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Cod_Caja" name="txt-Cod_Caja" required value="<?php if(!empty($v_Obj_Caja)){echo $v_Obj_Caja['Cod_Caja'];}?>" maxlength="16">
									</div>
                                </div>
                                
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>MAC :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Cod_Caja" name="txt-Cod_Caja" required value="<?php if(!empty($v_Obj_Caja)){echo $v_Obj_Caja['Cod_Caja'];}?>" maxlength="16">
									</div>
                                </div>
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>HORARIOS (*) :</b></label>
									<div class="col-md-3 col-sm-3">
										<input class="form-control" type="time" id="txt-Cod_Caja" name="txt-Cod_Caja" required value="<?php if(!empty($v_Obj_Caja)){echo $v_Obj_Caja['Cod_Caja'];}?>" maxlength="16">
                                    </div>
									<div class="col-md-3 col-sm-3">
										<input class="form-control" type="time" id="txt-Cod_Caja" name="txt-Cod_Caja" required value="<?php if(!empty($v_Obj_Caja)){echo $v_Obj_Caja['Cod_Caja'];}?>" maxlength="16">
									</div>
                                </div>
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>DIAS ACCESO :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Cod_Caja" name="txt-Cod_Caja" required value="<?php if(!empty($v_Obj_Caja)){echo $v_Obj_Caja['Cod_Caja'];}?>" maxlength="16">
									</div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3 col-sm-3"></div>
									<div class="col-md-9 col-sm-9">
										<select class="form-control selectpicker" id="lst-Num_Dias" name="lst-Num_Dias" data-size="10" multiple="">											
                                            <?php if(!empty($V_List_Dias)){ ?>
                                                <option value="0">[--SELECCIONE TIENDA--]</option>
                                                <?php foreach($V_List_Dias as $Item){ ?>
                                                    <option value="<?=$Item["Cod_ParSis"]?>"  <?=$T_Seleccion?>><?=$Item["Des_ParSis_Nom"]?></option>
                                                <?php }?>
                                            <?php }?>                                        
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
    var g_List_Perfiles_Usuario = [];
    var g_Id_Caja = $("#h_Id_Caja").val();
    var g_Id_Tienda = $("#h_Id_Tienda").val();
    var g_Id_Usuario = $("#h_Id_Usuario").val();

    function Get_List_Usuarios_Caja( p_Id_Tienda = 0 ,p_Id_Caja = 0)
    {
        var l_ListSelector = [];
        var l_RowSelector = [];

        var l_Request = {
            Id_Tienda : p_Id_Tienda,
            Id_Caja : p_Id_Caja
        };

        var l_Response = GetActionJquery(l_Request,BASE_URL+"public/caja/Get_List_Usuarios_Caja");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {
                if(data.Resultado)
                {
                    $.each(data.Resultado.List_Resultado, function (i, item) {
                        l_RowSelector = [item.Id_Usuario,item.Des_Usuario];
                        l_ListSelector.push(l_RowSelector);
                    });
                }
                CargarComboBoxGenerico("lst-Id_Usuario","[--Seleccionar usuario de caja--]",l_ListSelector,null);
                
                if(g_Id_Usuario != 0)
                {
                    $("#lst-Id_Usuario").val(g_Id_Usuario);
                }

            }else{
                alert(data.Error.messages);
            } 
        });
        l_Response.error(function(){
            alert("ERROR 500");
        }); 
    }

    function Set_Caja(p_Id_Caja = 0)
    {
        var l_Request = {      
            Id_Caja : p_Id_Caja,
            Id_Usuario : Number($("#lst-Id_Usuario").val()),
            Des_Caja : $("#txt-Des_Caja").val(),
            Cod_Caja : $("#txt-Cod_Caja").val(),
            Id_Tienda : $("#lst-Id_Tienda").val()
        };

        var l_Response = SetActionJquery(l_Request,BASE_URL+"public/caja/Set_Caja");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {
                window.location.href = BASE_URL+"public/caja";
            }else{
                Ejecutar_Modal_Error(data.Error.messages);
            } 
        });
        l_Response.error(function(){
            alert("ERROR 500");
        });
    }

    function Cargar_Info_Inicial()
    {
        if(g_Id_Tienda != 0)
        {
            $("#lst-Id_Tienda").val(g_Id_Tienda);
            Get_List_Usuarios_Caja(g_Id_Tienda,g_Id_Caja)
        }
        
    }

    $("#lst-Id_Tienda").change(function(e){
        Get_List_Usuarios_Caja($("#lst-Id_Tienda").val(),g_Id_Caja)
    });

    $("#btn-guardar").click(function(e)
    {
        Set_Caja(g_Id_Caja);
    });

    Cargar_Info_Inicial();



});
</script>   