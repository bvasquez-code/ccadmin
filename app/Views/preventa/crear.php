<ol class="breadcrumb pull-right">
</ol>

<input type="hidden" id="h_crear" value="1">
<input type="hidden" id="h_listar" value="0">

<input type="hidden" id="h_Id_Producto" value="<?php if(!empty($Producto)){echo $Producto['Id_Producto'];}else{echo "0";}?>">

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
                                        <h1 class="page-header">PREVENTA <small></small></h1>
                                    </div>
                                </div>
								<!-- <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>TIPO PERSONA :</b></label>
									<div class="col-md-9 col-sm-9">
									<select class="form-control selectpicker" id="lst-Tip_DocCliente" name="lst-Tip_DocCliente" data-size="10" data-style="btn-primary" data-live-search="true">
											<option value="0">[--SELECCIONE TIPO PERSONA--]</option>
											<?php if(!empty($List_Tip_Persona)){ ?>
												<?php
													$l_Seleccion = "";
													// $l_Tip_Documento = 0;
													// if(!empty($Producto)) $l_Tip_Documento = $Producto['Tip_Documento'];
												?>         
												<?php foreach($List_Tip_Persona as $Item){      ?>

													<?php //if($l_Tip_Documento == $Item["Tip_Documento"]) $l_Seleccion = "selected"; ?>
													<?php if($Item["Flg_ParSis_Bo1"] == true) $l_Seleccion = "selected"; ?>
													<option value="<?=$Item["Cod_ParSis"]?>" <?=$l_Seleccion?>><?=$Item["Des_ParSis_Nom"]?></option>
													<?php $l_Seleccion = "";?>
													
												<?php  }?>
													
											<?php } ?>                                          
				                        </select>
									</div>
								</div> -->
								                                
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>TIPO DE DOCUMENTO :</b></label>
									<div class="col-md-9 col-sm-9">
									<select class="form-control selectpicker" id="lst-Tip_DocCliente" name="lst-Tip_DocCliente" data-size="10" data-style="btn-primary" data-live-search="true">
											<option value="0">[--SELECCIONE TIPO DE DOCUMENTO--]</option>
											<?php if(!empty($List_Tip_Documento)){ ?>
												<?php
													$l_Seleccion = "";
												?>         
												<?php foreach($List_Tip_Documento as $Item){      ?>

													<?php //if($l_Tip_Documento == $Item["Tip_Documento"]) $l_Seleccion = "selected"; ?>
													<?php if($Item["Flg_ParSis_Bo3"] == true) $l_Seleccion = "selected"; ?>
													<option value="<?=$Item["Cod_ParSis"]?>" <?=$l_Seleccion?>><?=$Item["Des_ParSis_Nom"]?></option>
													<?php $l_Seleccion = "";?>
													
												<?php  }?>
													
											<?php } ?>                                          
				                        </select>
									</div>
                                </div>

								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>N° DOCUMENTO :</b></label>
									<div class="col-md-8 col-sm-8">
										<input class="form-control" type="text" id="txt-Cod_DocCliente" name="txt-Cod_DocCliente" required maxlength="128">
									</div>
									<div class="col-md-1 col-sm-1">
										<div class="dt-buttons btn-overlap btn-group">
											<a class="dt-button buttons-collection buttons-colvis btn btn-white btn-primary btn-bold" id="btn-buscar" title="Buscar">
												<span><i class="fa fa-search bigger-110 blue"></i> 
												<span class="hidden">Show/hide columns</span></span>
											</a>
											<a class="dt-button buttons-collection buttons-colvis btn btn-white btn-primary btn-bold" id="btn-limpiar" title="Eliminar">
												<span><i class="fa fa-times bigger-110 blue"></i> 
												<span class="hidden">Show/hide columns</span></span>
											</a>
										</div>
									</div>
                                </div>
								<div class="form-group persona-juridica" style="display: none;">
									<label class="control-label col-md-3 col-sm-3"><b>RAZON SOCIAL :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Des_RazonSocial" name="txt-Des_RazonSocial" required maxlength="128">
									</div>
                                </div>
								<div class="form-group persona-natural">
									<label class="control-label col-md-3 col-sm-3"><b>NOMBRES :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Des_NomCliente" name="txt-Des_NomCliente" required maxlength="128">
									</div>
                                </div>
								<div class="form-group persona-natural">
									<label class="control-label col-md-3 col-sm-3"><b>APELLIDOS PATERNO :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Des_ApeClientePat" name="txt-Des_ApeClientePat" required maxlength="128">
									</div>
								</div>
								<div class="form-group persona-natural">
									<label class="control-label col-md-3 col-sm-3"><b>APELLIDOS MATERNO :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Des_ApeClienteMat" name="txt-Des_ApeClienteMat" required maxlength="128">
									</div>
								</div>
								<div class="form-group data-extra-cliente" style="display: none;">
									<label class="control-label col-md-3 col-sm-3"><b>CELULAR :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Des_Celular" name="txt-Des_Celular" required maxlength="128">
									</div>
								</div>
								<div class="form-group data-extra-cliente" style="display: none;">
									<label class="control-label col-md-3 col-sm-3"><b>EMAIL :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Des_Email" name="txt-Des_Email" required maxlength="128">
									</div>
								</div>
								<div class="form-group data-extra-cliente" style="display: none;">
									<label class="control-label col-md-3 col-sm-3"><b>TELEFONO :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Des_Telefono" name="txt-Des_Telefono" required maxlength="128">
									</div>
								</div>
								<?php if(empty($Flg_Peru)=== false && $Flg_Peru === true) {?>
									<div class="form-group" data-extra-cliente" style="display: none;">
										<label class="control-label col-md-3 col-sm-3"><b>DEPARTAMENTO :</b></label>
										<div class="col-md-9 col-sm-9">
											<select class="form-control selectpicker" id="lst-Departamento" name="lst-Departamento">                                   
											</select>
										</div>
									</div>
									<div class="form-group" data-extra-cliente" style="display: none;">
										<label class="control-label col-md-3 col-sm-3"><b>PROVINCIA :</b></label>
										<div class="col-md-9 col-sm-9">
											<select class="form-control selectpicker" id="lst-Provincia" name="lst-Provincia" disabled>                                   
											</select>
										</div>
									</div>
									<div class="form-group" data-extra-cliente" style="display: none;">
										<label class="control-label col-md-3 col-sm-3"><b>DISTRITO :</b></label>
										<div class="col-md-9 col-sm-9">
											<select class="form-control selectpicker" id="lst-Distrito" name="lst-Distrito" disabled>                                   
											</select>
										</div>
									</div>								
								<?php }else{ ?>
									<div class="form-group" data-extra-cliente" style="display: none;">
										<label class="control-label col-md-3 col-sm-3"><b>PAIS :</b></label>
										<div class="col-md-9 col-sm-9">
											<select class="form-control selectpicker" id="lst-Pasi" name="lst-Pasi">                                   
											</select>
										</div>
									</div>
									<div class="form-group" data-extra-cliente" style="display: none;">
										<label class="control-label col-md-3 col-sm-3"><b>ESTADO :</b></label>
										<div class="col-md-9 col-sm-9">
											<select class="form-control selectpicker" id="lst-Pasi" name="lst-Pasi" disabled>                                   
											</select>
										</div>
									</div>
								<?php } ?>
								<div class="form-group data-extra-cliente" style="display: none;">
									<label class="control-label col-md-3 col-sm-3"><b>DIRECCIÓN :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Des_Dirreccion" name="txt-Des_Dirreccion" required maxlength="128">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>TIPO DE PAGO :</b></label>
									<div class="col-md-9 col-sm-9">
									<select class="form-control selectpicker" id="lst-Tip_Pago" name="lst-Tip_Pago" data-size="10" data-style="btn-primary" data-live-search="true">
											<option value="0">[--SELECCIONE TIPO DE VENTA--]</option>
											<?php if(!empty($List_Tip_Pago)){ ?>
												<?php
													$l_Seleccion = "";													
													// $l_Tip_Pago = 0;
													// if(!empty($Producto)) $l_Tip_Pago = $Producto['Tip_Pago'];
												?>         
												<?php foreach($List_Tip_Pago as $Item){      ?>

													<?php //if($l_Tip_Pago == $Item["Tip_Pago"]) $l_Seleccion = "selected"; ?>
													<?php if($Item["Flg_ParSis_Bo2"] == true) $l_Seleccion = "selected"; ?>
													<option value="<?=$Item["Cod_ParSis"]?>" <?=$l_Seleccion?>><?=$Item["Des_ParSis_Nom"]?></option>
													<?php $l_Seleccion = "";?>
													
												<?php  }?>
													
											<?php } ?>                                          
				                        </select>
									</div>
                                </div>                                

								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>MEDIO DE PAGO :</b></label>
									<div class="col-md-9 col-sm-9">
									<select class="form-control selectpicker" id="lst-Tip_MedioPago" name="lst-Tip_MedioPago" data-size="10" data-style="btn-primary" data-live-search="true">
											<option value="0">[--SELECCIONE MEDIO DE PAGO--]</option>
											<?php if(!empty($List_Tip_MedioPago)){ ?>
												<?php
													$l_Seleccion = "";													
													// $l_Tip_MedioPago = 0;
													// if(!empty($Producto)) $l_Tip_MedioPago = $Producto['Tip_MedioPago'];
												?>         
												<?php foreach($List_Tip_MedioPago as $Item){      ?>

													<?php //if($l_Tip_MedioPago == $Item["Tip_MedioPago"]) $l_Seleccion = "selected"; ?>
													<?php if($Item["Flg_ParSis_Bo2"] == true) $l_Seleccion = "selected"; ?>
													<option value="<?=$Item["Cod_ParSis"]?>" <?=$l_Seleccion?>><?=$Item["Des_ParSis_Nom"]?></option>
													<?php $l_Seleccion = "";?>
													
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
			<div class="col-md-2 col-sm-2"></div>
			<div class="col-md-10 col-sm-10" style="text-align: right;">
				<a href="<?=base_url("public/producto")?>" id="btn-cancelar" 
                type="button" class="btn btn-danger"><i class="ace-icon fa fa-times"></i> Cancelar</a>
				<a id="btn-completar" 
				type="button" class="btn btn-primary"><i class="ace-icon fa fa-pencil"></i>Completar datos cliente</a>                
				<a id="btn-continuar" 
				type="button" class="btn btn-primary"><i class="ace-icon fa fa-pencil"></i>Continuar</a>
			</div>                                   
		</div>  
  </div>
</div>

 <!-- ==================  JS COMPLEMENTOS ================== -->
 <script src="<?php echo base_url('assets/plugins/jquery/jquery-3.4.1.min.js');?>"></script>
  <!-- ================== END JS COMPLEMENTOS ================== -->

 <!-- ==================  JS FUNCIONES ================== -->
 <script src="<?php echo base_url('assets/js_sistema/backend.generico.js'); ?>"></script>
 <!-- <script src="<?php echo base_url('assets/js_sistema/producto/backend.producto.js'); ?>"></script> -->

 <script>
$(document).ready(function() {

    var BASE_URL = $("#URL_BASE").val();
	var g_Accion_Ejecutable = true;
	var g_Id_Cliente = 0;
	var g_Tip_Per_Nautal = 1;
	var g_Tip_Per_Juridica = 2;
	var g_Obj_Cliente = {
		 Id_Cliente: 0
		,Tip_Persona: 0
		,PersonaJuridica: {
			 Cod_Ruc: ""
			,Des_Celular: ""
			,Des_Dirreccion: ""
			,Des_Email: ""
			,Des_Facebook: ""
			,Des_Instagram: ""
			,Des_NomComercial: ""
			,Des_PaginaWeb: ""
			,Des_RazonSocial: ""
			,Des_Telefono: ""
			,Des_Twitter: ""
			,Id_PerJuridica: 0
		}
		,PersonaNatural: {
			 Cod_Documento: ""
			,Cod_Ruc: ""
			,Des_ApeMaterno: ""
			,Des_ApePaterno: ""
			,Des_Celular: ""
			,Des_Direccion: ""
			,Des_Email: ""
			,Des_Nombre1: ""
			,Des_Nombre2: ""
			,Des_Nombres: ""
			,Des_Telefono: ""
			,Fec_Nacimiento: ""
			,Id_PerNatural: 0
			,Tip_Documento: 0
		}
		
	};

    function Set_Producto_Carrito( p_Cod_Accion="")
    {
        if(!g_Accion_Ejecutable) return false;
        g_Accion_Ejecutable = false;

		if( Number($("#lst-Tip_DocCliente").val()) != 0 )
		{
			if( Number($("#lst-Tip_DocCliente").val()) == 4 && $("#txt-Cod_DocCliente").val().trim() != "" 
				&& $("#txt-Des_RazonSocial").val().trim() != ""
			) //Personja Juridica
			{
				g_Obj_Cliente.PersonaNatural = null;
				g_Obj_Cliente.Tip_Persona = g_Tip_Per_Juridica;
				g_Obj_Cliente.PersonaJuridica.Cod_Ruc = $("#txt-Cod_DocCliente").val();
				g_Obj_Cliente.PersonaJuridica.Des_RazonSocial = $("#txt-Des_RazonSocial").val();
			}
			else if( $("#txt-Cod_DocCliente").val().trim() != "" && $("#txt-Des_NomCliente").val().trim() != "" )
			{
				g_Obj_Cliente.PersonaJuridica = null;
				g_Obj_Cliente.Tip_Persona = g_Tip_Per_Nautal;
				g_Obj_Cliente.PersonaNatural.Tip_Documento = Number($("#lst-Tip_DocCliente").val());
				g_Obj_Cliente.PersonaNatural.Cod_Documento = $("#txt-Cod_DocCliente").val();
				g_Obj_Cliente.PersonaNatural.Des_Nombres = $("#txt-Des_NomCliente").val();
				g_Obj_Cliente.PersonaNatural.Des_ApePaterno = $("#txt-Des_ApeClientePat").val();
				g_Obj_Cliente.PersonaNatural.Des_ApeMaterno = $("#txt-Des_ApeClienteMat").val();
			}
		}else
		{
			g_Obj_Cliente.Tip_Persona = 0;
			g_Obj_Cliente.PersonaNatural.Des_Nombres = $("#txt-Des_NomCliente").val();
			g_Obj_Cliente.PersonaNatural.Des_ApePaterno = $("#txt-Des_ApeClientePat").val();
			g_Obj_Cliente.PersonaNatural.Des_ApeMaterno = $("#txt-Des_ApeClienteMat").val();
		}


        var l_Request = { 
			Cod_Accion : p_Cod_Accion,
			Cliente : g_Obj_Cliente,
			Tip_Pago : Number($("#lst-Tip_Pago").val()),
			Tip_MedioPago : Number($("#lst-Tip_MedioPago").val())
        };

        var l_Response = SetActionJquery(l_Request,BASE_URL+"public/preventa/Set_Producto_Carrito");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {
                if(data.Resultado == true)
                {
                    window.location.href = BASE_URL+"public/preventa/search";
                }           
            }else{
                Ejecutar_Modal_Error(data.Error.messages);
            }
            g_Accion_Ejecutable = true; 
        });
        l_Response.error(function(){
            g_Accion_Ejecutable = true;
            alert("ERROR 500");
        }); 
    }

	function Get_Producto_Carrito()
    {        
        var l_Html_Carr = "";
        var l_Html_Info_Cliente = "";
        var l_Request = {};

        var l_Response = SetActionJquery(l_Request,BASE_URL+"public/preventa/Get_Producto_Carrito");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {

				if(data.Resultado.Flg_EnProceso)
				{
					if(data.Resultado.Cliente.Tip_Persona == 0)
					{
						$("#txt-Des_NomCliente").val(data.Resultado.Cliente.PersonaNatural.Des_Nombres);
						$("#txt-Des_ApeClientePat").val(data.Resultado.Cliente.PersonaNatural.Des_ApePaterno);
						$("#txt-Des_ApeClienteMat").val(data.Resultado.Cliente.PersonaNatural.Des_ApeMaterno);
						$(".persona-juridica").hide();
						$(".persona-natural").show();
					}
					if(data.Resultado.Cliente.Tip_Persona == 1)
					{
						$("#lst-Tip_DocCliente").val(data.Resultado.Cliente.PersonaNatural.Tip_Documento);
						$("#txt-Cod_DocCliente").val(data.Resultado.Cliente.PersonaNatural.Cod_Documento);
						$("#txt-Des_NomCliente").val(data.Resultado.Cliente.PersonaNatural.Des_Nombres);
						$("#txt-Des_ApeClientePat").val(data.Resultado.Cliente.PersonaNatural.Des_ApePaterno);
						$("#txt-Des_ApeClienteMat").val(data.Resultado.Cliente.PersonaNatural.Des_ApeMaterno);
						$(".persona-juridica").hide();
						$(".persona-natural").show();
					}
					if(data.Resultado.Cliente.Tip_Persona == 2)
					{
						$("#lst-Tip_DocCliente").val(4);
						$("#txt-Cod_DocCliente").val(data.Resultado.Cliente.PersonaJuridica.Cod_Ruc);
						$("#txt-Des_RazonSocial").val(data.Resultado.Cliente.PersonaJuridica.Des_RazonSocial);
						$(".persona-juridica").show();
						$(".persona-natural").hide();
					}
					g_Id_Cliente = data.Resultado.Cliente.Id_Cliente;

					if(data.Resultado.Tip_Pago!=0)$("#lst-Tip_Pago").val(data.Resultado.Tip_Pago);
					if(data.Resultado.Tip_MedioPago!=0)$("#lst-Tip_MedioPago").val(data.Resultado.Tip_MedioPago);
				}

            }else{
                Ejecutar_Modal_Error(data.Error.messages);
            }
            g_Accion_Ejecutable = true; 
        });
        l_Response.error(function(){
            g_Accion_Ejecutable = true;
            alert("ERROR 500");            
        }); 
    }

	function Get_Cliente( p_Tip_DocCliente = 0, p_Cod_DocCliente = "")
	{
		Abrir_Dialogo_Carga();
		var l_Tip_Persona = 0;
		
		l_Tip_Persona = ( p_Tip_DocCliente == 4 ) ? g_Tip_Per_Juridica : g_Tip_Per_Nautal;

		var l_Request = {
            Paginacion: {
                Tip_Busqueda: 1
            },
            Busqueda: {
				Tip_Persona : l_Tip_Persona,
				Tip_Documento : p_Tip_DocCliente,
				Cod_Documento : p_Cod_DocCliente
			}
		};
		
		var l_Response = GetActionJquery(l_Request,BASE_URL+"public/cliente/Get_Cliente");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {

				g_Obj_Cliente = data.Resultado;
				g_Id_Cliente = null;
					$("#txt-Des_NomCliente").val("");
					$("#txt-Des_ApeClientePat").val("");
					$("#txt-Des_ApeClienteMat").val("");
					$("#txt-Des_RazonSocial").val("");

				if(data.Resultado.PersonaNatural != null)
				{	
					$("#txt-Des_NomCliente").val(data.Resultado.PersonaNatural.Des_Nombres);
					$("#txt-Des_ApeClientePat").val(data.Resultado.PersonaNatural.Des_ApePaterno);
					$("#txt-Des_ApeClienteMat").val(data.Resultado.PersonaNatural.Des_ApeMaterno);
				}
				if(data.Resultado.PersonaJuridica != null)
				{
					$("#txt-Des_RazonSocial").val(data.Resultado.PersonaJuridica.Des_RazonSocial);	
				}

            }else{
                Ejecutar_Modal_Error(data.Error.messages);
            }
			g_Accion_Ejecutable = true;
			Cerrar_Dialogo_Carga_Simple();
        });
        l_Response.error(function(){
            g_Accion_Ejecutable = true;
			alert("ERROR 500");
			Cerrar_Dialogo_Carga_Simple();
        }); 		
	}
	function Establecer_Forma_Busqueda()
	{

		var l_Cod_DocCliente = $("#txt-Cod_DocCliente").val();
		var l_Num_Tamanio = l_Cod_DocCliente.length;
		var l_Tip_DocCliente = Number($("#lst-Tip_DocCliente").val());

		if ( l_Num_Tamanio >= 8 && l_Tip_DocCliente >= 0 )
		{
			if( l_Num_Tamanio == 8 && l_Tip_DocCliente == 1 )
			{
				Get_Cliente(l_Tip_DocCliente,l_Cod_DocCliente);
			}
			else if( l_Num_Tamanio == 11 && l_Tip_DocCliente == 4 )
			{
				Get_Cliente(l_Tip_DocCliente,l_Cod_DocCliente);
			}
			if( (l_Tip_DocCliente == 2 || l_Tip_DocCliente == 3) && l_Num_Tamanio<=16 )
			{
				Get_Cliente(l_Tip_DocCliente,l_Cod_DocCliente);
			}
		}else
		{
			g_Id_Cliente = null;
			$("#txt-Des_NomCliente").val("");
			$("#txt-Des_ApeClientePat").val("");
			$("#txt-Des_ApeClienteMat").val("");
		}

	}

	function Get_List_Departamento()
	{
		var l_DataSelect = [];
		var l_Request = {
		};
		
		var l_Response = GetActionJquery(l_Request,BASE_URL+"public/generico/Get_List_Departamento");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {

				$('#lst-Provincia').empty();
				$('#lst-Distrito').empty();

				$.each(data.Resultado.List_Resultado, function (i, item) {
					l_DataSelect.push([item.Cod_Departamento,item.Des_Departamento]);
				});
				CargarComboBoxGenerico("lst-Departamento",'[--SELECCIONAR DEPARTAMENTO--]',l_DataSelect);
			}else{
                Ejecutar_Modal_Error(data.Error.messages);
            }
		});
	}

	function Get_List_Provincia(p_Cod_Departamento = '')
	{
		var l_DataSelect = [];
		var l_Request = {
			Cod_Departamento : p_Cod_Departamento
		};
		
		var l_Response = GetActionJquery(l_Request,BASE_URL+"public/generico/Get_List_Provincia");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {
				$('#lst-Distrito').empty();
				$("#lst-Provincia").attr("disabled",true);
				$("#lst-Distrito").attr("disabled",true);
				if( data.Resultado.List_Resultado.length > 0)
				{
					$.each(data.Resultado.List_Resultado, function (i, item) {
						l_DataSelect.push([item.Cod_Provincia,item.Des_Provincia]);
					});
					CargarComboBoxGenerico("lst-Provincia",'[--SELECCIONAR PROVINCIA--]',l_DataSelect);
					$("#lst-Provincia").removeAttr("disabled",true);
				}
			}else{
                Ejecutar_Modal_Error(data.Error.messages);
            }
		});
	}

	function Get_List_Distrito(p_Cod_Departamento,p_Cod_Provincia)
	{
		var l_DataSelect = [];
		var l_Request = {
			 Cod_Departamento : p_Cod_Departamento
			,Cod_Provincia : p_Cod_Provincia
		};
		
		var l_Response = GetActionJquery(l_Request,BASE_URL+"public/generico/Get_List_Distrito");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {

				$("#lst-Distrito").attr("disabled",true);
				if( data.Resultado.List_Resultado.length > 0)
				{
					$.each(data.Resultado.List_Resultado, function (i, item) {
						l_DataSelect.push([item.Cod_Ubigeo,item.Des_Distrito]);
					});
					CargarComboBoxGenerico("lst-Distrito",'[--SELECCIONAR PROVINCIA--]',l_DataSelect);
					$("#lst-Distrito").removeAttr("disabled",true);
				}

			}else{
                Ejecutar_Modal_Error(data.Error.messages);
            }
		});
	}

	$("#lst-Departamento").change(function(e){
		Get_List_Provincia($("#lst-Departamento").val());
	});

	$("#lst-Provincia").change(function(e){
		Get_List_Distrito($("#lst-Departamento").val(),$("#lst-Provincia").val());
	});

	$("#btn-continuar").click(function(e){
		Set_Producto_Carrito("adddata");
	});

	$("#btn-buscar").click(function(e){
		Establecer_Forma_Busqueda();
	});

	

	$("#lst-Tip_DocCliente").change(function(e){

		if( Number($("#lst-Tip_DocCliente").val() == 4 ) )
		{
			$(".persona-juridica").show();
			$(".persona-natural").hide();
		}else{
			$(".persona-juridica").hide();
			$(".persona-natural").show();
		}

	});

	Get_List_Departamento();
	Get_Producto_Carrito();

});
</script>