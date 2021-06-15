<?php

    $T_Seleccion = ""; //Variable para marcar un "option html"

?>

<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
</ol>

<input type="hidden" id="h_Id_Proveedor" value="<?php if(!empty($v_Id_Proveedor)){echo $v_Id_Proveedor;}?>">

<div class="row">
    <div class="col-md-12">
    <div class="tab-pane fade active in" id="tab-1">
			<div class="row">
				<div class="col-md-12 ui-sortable">
					<div class="panel panel-inverse" data-sortable-id="form-validation-1">
				        <div class="panel-body panel-form">
				            <form id="form-datos-formulariov_Obj_Usuario" class="form-horizontal form-bordered" data-parsley-validate="true" name="demo-form" novalidate="">
                                <div class="form-group">
                                    <div class="row" style="text-align: center;">
                                        <h1 class="page-header">PROVEEDOR <small></small></h1>
                                    </div>
                                </div>
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>TIPO PERSONA (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<select class="form-control selectpicker" id="lst-Tip_Persona" name="lst-Tip_Persona" data-size="10" data-style="btn-primary">											
                                            <option value="1">PERSONA NATURAL</option>
                                            <option value="2">PERSONA JURIDICA</option>                                          
				                        </select>										
									</div>
								</div>         
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>TIPO DOCUMENTO (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<select class="form-control selectpicker" id="lst-Tip_Documento" name="lst-Tip_Documento" data-size="10" data-style="btn-primary">											
                                            <?php if(!empty($v_List_Documentos)){ ?>
                                                <option value="0">[--SELECCIONE TIPO DOCUMENTO--]</option>
                                                <?php foreach($v_List_Documentos as $Item){ ?>
                                                    <option value="<?=$Item["Cod_ParSis"]?>"><?=$Item["Des_ParSis_Nom"]?></option>
                                                <?php }?>
                                            <?php }?>                                        
				                        </select>										
									</div>
								</div>
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>NÚMERO DOCUMENTO (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Cod_Documento" name="txt-Cod_Documento" required value="<?php if(!empty($v_Obj_Usuario)){echo $v_Obj_Usuario['Cod_Documento'];}?>" maxlength="16">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>DESCRIPCION (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Des_RazonSocial" name="txt-Des_RazonSocial" required value="<?php if(!empty($v_Obj_Usuario)){echo $v_Obj_Usuario['Des_Nombres'];}?>" maxlength="128">
									</div>
								</div>
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>DIRECCIÓN :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Des_Direccion" name="txt-Des_Direccion" value="<?php if(!empty($v_Obj_Usuario)){echo $v_Obj_Usuario['Des_Direccion'];}?>" placeholder="" maxlength="256">
									</div>
								</div>
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>CELULAR (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Des_Celular" name="txt-Des_Celular" value="<?php if(!empty($v_Obj_Usuario)){echo $v_Obj_Usuario['Des_Celular'];}?>" placeholder="" maxlength="16">
									</div>
								</div>
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>TELEFONO (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Des_Telefono" name="txt-Des_Telefono" value="<?php if(!empty($v_Obj_Usuario)){echo $v_Obj_Usuario['Des_Celular'];}?>" placeholder="" maxlength="16">
									</div>
								</div>
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>EMAIL (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Des_Email" name="txt-Des_Email" value="<?php if(!empty($v_Obj_Usuario)){echo $v_Obj_Usuario['Des_Email'];}?>" placeholder="" maxlength="32">
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
				<a href="<?=base_url("public/v_Obj_Usuario")?>" id="btn-cancelar" 
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

    const BASE_URL = $("#URL_BASE").val();
    const g_Id_Proveedor = Number($("#h_Id_Proveedor").val());

    let Registrar_Proveedor = function()
    {
        Abrir_Dialogo_Carga();

        let l_Request = {      
            Id_Proveedor : g_Id_Proveedor,
            Tip_Documento : Number($("#lst-Tip_Documento").val()),
            Tip_Persona : Number($("#lst-Tip_Persona").val()),
            Cod_Documento : $("#txt-Cod_Documento").val(),
            Des_RazonSocial : $("#txt-Des_RazonSocial").val(),
            Des_Email : $("#txt-Des_Email").val(),
            Des_Celular : $("#txt-Des_Celular").val(),
            Des_Telefono : $("#txt-Des_Telefono").val(),
            Des_Direccion : $("#txt-Des_Direccion").val(),            
        };

        var l_Response = SetActionJquery(l_Request,BASE_URL+"public/proveedor/Registrar_Proveedor");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {
                window.location.reload;
            }else{
                Ejecutar_Modal_Error(data.Error.messages);
            }
            Cerrar_Dialogo_Carga_Proceso(data.Error.flagerror);
        });
        l_Response.error(function(){
            alert("ERROR 500");
            Cerrar_Dialogo_Carga_Proceso(true);
        });
    }

    let Obtener_Detalle_Proveedor = function(p_Id_Proveedor = 0)
    {
        Abrir_Dialogo_Carga();

        let l_Request = {      
            Id_Proveedor : p_Id_Proveedor         
        };

        var l_Response = SetActionJquery(l_Request,BASE_URL+"public/proveedor/Obtener_Detalle_Proveedor");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {

                $("#lst-Tip_Persona").val(data.Resultado.Tip_Persona);
                $("#lst-Tip_Documento").val(data.Resultado.Tip_Documento);
                $("#txt-Cod_Documento").val(data.Resultado.PersonaJuridica.Cod_Ruc);
                $("#txt-Des_RazonSocial").val(data.Resultado.PersonaJuridica.Des_RazonSocial);            
                $("#txt-Des_Direccion").val(data.Resultado.PersonaJuridica.Des_Dirreccion);
                $("#txt-Des_Celular").val(data.Resultado.PersonaJuridica.Des_Celular);
                $("#txt-Des_Telefono").val(data.Resultado.PersonaJuridica.Des_Telefono);
                $("#txt-Des_Email").val(data.Resultado.PersonaJuridica.Des_Email);
                
            }else{
                Ejecutar_Modal_Error(data.Error.messages);
            }
            Cerrar_Dialogo_Carga_Simple();
        });
        l_Response.error(function(){
            alert("ERROR 500");
            Cerrar_Dialogo_Carga_Simple();
        });
    }

    let IniciarPagina = function()
    {
        Obtener_Detalle_Proveedor(g_Id_Proveedor);
    }

    $("#btn-guardar").click(function(e){
        Registrar_Proveedor();
    });

    IniciarPagina();

});
</script>   