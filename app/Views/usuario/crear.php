<?php

    $T_Seleccion = ""; //Variable para marcar un "option html"

?>

<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
</ol>

<input type="hidden" id="h_crear" value="1">
<input type="hidden" id="h_listar" value="0">

<input type="hidden" id="h_Id_Usuario" value="<?php if(!empty($v_Obj_Usuario)){echo $v_Obj_Usuario['Id_Usuario'];}?>">

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
                                        <h1 class="page-header">USUARIO <small></small></h1>
                                    </div>
                                </div>
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>TIENDA (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<select class="form-control selectpicker" id="lst-Id_Tienda" name="lst-Id_Tienda" data-size="10" data-style="btn-primary">											
                                            <?php if(!empty($v_List_Tienda)){ ?>
                                                <option value="0">[--SELECCIONE TIENDA--]</option>
                                                <?php foreach($v_List_Tienda as $Item){ ?>
                                                    <?php
                                                        if(!empty($v_Obj_Usuario))
                                                        {
                                                            $T_Seleccion = ( $v_Obj_Usuario["Id_Tienda"] == $Item["Id_Tienda"] ) ? "selected" : "";
                                                        }    
                                                    ?>
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
                                            <?php if(!empty($v_List_Documentos)){ ?>
                                                <option value="0">[--SELECCIONE TIPO DOCUMENTO--]</option>
                                                <?php foreach($v_List_Documentos as $Item){ ?>
                                                    <?php
                                                        if(!empty($v_Obj_Usuario))
                                                        {
                                                            $T_Seleccion = ( $v_Obj_Usuario["Tip_Documento"] == $Item["Cod_ParSis"] ) ? "selected" : "";
                                                        }    
                                                    ?>
                                                    <option value="<?=$Item["Cod_ParSis"]?>"  <?=$T_Seleccion?>><?=$Item["Des_ParSis_Nom"]?></option>
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
									<label class="control-label col-md-3 col-sm-3"><b>NOMBRES (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Des_Nombres" name="txt-Des_Nombres" required value="<?php if(!empty($v_Obj_Usuario)){echo $v_Obj_Usuario['Des_Nombres'];}?>" maxlength="128">
									</div>
								</div>
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>APELLIDO PATERNO (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Des_ApePaterno" name="txt-Des_ApePaterno" required value="<?php if(!empty($v_Obj_Usuario)){echo $v_Obj_Usuario['Des_ApePaterno'];}?>" maxlength="32">
									</div>
								</div>
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>APELLIDO MATERNO (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Des_ApeMaterno" name="txt-Des_ApeMaterno" required value="<?php if(!empty($v_Obj_Usuario)){echo $v_Obj_Usuario['Des_ApeMaterno'];}?>" maxlength="32">
									</div>
								</div>
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>FECHA NACIMIENTO (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="date" id="txt-Fec_Nacimiento" name="txt-Fec_Nacimiento" required value="<?php if(!empty($v_Obj_Usuario)){echo $v_Obj_Usuario['Fec_Nacimiento'];}?>" maxlength="32">
									</div>
								</div>
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>EMAIL (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Des_Email" name="txt-Des_Email" value="<?php if(!empty($v_Obj_Usuario)){echo $v_Obj_Usuario['Des_Email'];}?>" placeholder="" maxlength="32">
									</div>
								</div>
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>CELULAR (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Des_Celular" name="txt-Des_Celular" value="<?php if(!empty($v_Obj_Usuario)){echo $v_Obj_Usuario['Des_Celular'];}?>" placeholder="" maxlength="16">
									</div>
								</div>
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>DIRECCIÓN :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Des_Direccion" name="txt-Des_Direccion" value="<?php if(!empty($v_Obj_Usuario)){echo $v_Obj_Usuario['Des_Direccion'];}?>" placeholder="" maxlength="256">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>USUARIO (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Des_Usuario" name="txt-Des_Usuario" value="<?php if(!empty($v_Obj_Usuario)){echo $v_Obj_Usuario['Des_Usuario'];}?>" placeholder="USUARIO" maxlength="32">
									</div>
								</div>
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>CONTRASEÑA (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="password" id="txt-Des_Password" name="txt-Des_Password" value="<?php if(!empty($v_Obj_Usuario)){echo $v_Obj_Usuario['Des_Password'];}?>" placeholder="CONTRASEÑA" maxlength="32">
									</div>
								</div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3"><b>PERMISOS (*) :</b></label>
                                    <div class="col-md-9 col-sm-9">
                                        <table id="data-table" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Item</th>
                                                    <th style="width: 30%;">Perfil</th>
                                                    <th>Permiso</th>                        
                                                </tr>
                                            </thead>
                                            <tbody>
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

    var BASE_URL = $("#URL_BASE").val();
    var g_List_Perfiles_Usuario = [];
    var g_Id_Usuario = $("#h_Id_Usuario").val();
    var g_Obj_Persona = {
      Id_Cliente: null,
      Tip_Persona: 1,
      PersonaJuridica: null,
      PersonaNatural:       {
         Id_PerNatural: 0,
         Tip_Documento: 0,
         Cod_Documento: "",
         Cod_Ruc: "",
         Des_Nombre1: "",
         Des_Nombre2: "",
         Des_Nombres: "",
         Des_ApePaterno: "",
         Des_ApeMaterno: "",
         Des_Direccion: "",
         Fec_Nacimiento: "",
         Des_Telefono: "",
         Des_Celular: "",
         Des_Email: ""
      }
   };

    function Get_Perfil_Usuario(p_Id_Usuario = 0)
    {
        var l_OpcionesHtml = "";
        var l_DataTabla = [];
        var l_RowTabla = [];

        var l_Request = {
            Id_Usuario : p_Id_Usuario
        };

        var l_Response = GetActionJquery(l_Request,BASE_URL+"public/usuario/Get_Perfil_Usuario");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {

                $.each(data.Resultado.List_Resultado, function (i, item) {
                    
                    g_List_Perfiles_Usuario[item.Id_Perfil] = item;

                    if(item.Flg_Asignado)
                    {
                        l_OpcionesHtml = '<input class="clase-perfil" type="checkbox" id="'+item.Id_Perfil+'" name="'+item.Id_Perfil+'" value="1" checked>';
                    }
                    else
                    {
                        l_OpcionesHtml = '<input class="clase-perfil" type="checkbox" id="'+item.Id_Perfil+'" name="'+item.Id_Perfil+'" value="0">';
                    }
                    
                    l_RowTabla = [
                        (i+1),
                        item.Des_Perfil,
                        l_OpcionesHtml
                    ];
                    l_DataTabla.push(l_RowTabla);
                    l_OpcionesHtml = "";

                });
                CargarTablaGenerica("data-table", l_DataTabla,false);

            }else{
                alert(data.Error.messages);
            } 
        });
        l_Response.error(function(){
            alert("ERROR 500");
        }); 
    }

    function Set_Usuario(p_Id_Usuario = 0)
    {
        Abrir_Dialogo_Carga();

        var l_Request = {      
            Id_Usuario : g_Id_Usuario,
            Id_Tienda : $("#lst-Id_Tienda").val(),
            Tip_Documento : Number($("#lst-Tip_Documento").val()),
            Cod_Documento : $("#txt-Cod_Documento").val(),
            Des_Nombres : $("#txt-Des_Nombres").val(),
            Des_ApePaterno : $("#txt-Des_ApePaterno").val(),
            Des_ApeMaterno : $("#txt-Des_ApeMaterno").val(),
            Fec_Nacimiento : $("#txt-Fec_Nacimiento").val(),
            Des_Email : $("#txt-Des_Email").val(),
            Des_Celular : $("#txt-Des_Celular").val(),
            Des_Direccion : $("#txt-Des_Direccion").val(),
            Des_Usuario : $("#txt-Des_Usuario").val(),
            Des_Password : $("#txt-Des_Password").val(),
            List_Perfiles_Usuario : Parsear_Array(g_List_Perfiles_Usuario)
        };

        var l_Response = SetActionJquery(l_Request,BASE_URL+"public/usuario/Set_Usuario");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {
                window.location.href = BASE_URL+"public/usuario";
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

    function Seleccionar_checkbox( p_Id_Perfil = 0 )
    {
        var l_val = $("#"+p_Id_Perfil).val();

        if ( l_val == 0 )
        {
            $("#"+p_Id_Perfil).val(1);
            g_List_Perfiles_Usuario[p_Id_Perfil].Flg_Asignado = true;
        }
        else
        {
            $("#"+p_Id_Perfil).val(0);
            g_List_Perfiles_Usuario[p_Id_Perfil].Flg_Asignado = false;
        }
    }

    function Parsear_Array(List_Object = [])
    {
        List_Secuencia = [];

        $.each(List_Object, function (i, item) {
            
            if(item != null)
            {
                List_Secuencia.push(item);
            }

        });

        return List_Secuencia;

    }

    $(document).on('click', '.clase-perfil', function (e) {

        var l_Id = $(this).attr("Id");
        
        Seleccionar_checkbox(l_Id);

    });

    $("#btn-guardar").click(function(e){
        Set_Usuario(g_Id_Usuario);
    });

    Get_Perfil_Usuario(g_Id_Usuario);

});
</script>   