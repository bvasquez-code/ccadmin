<?php

    $T_Seleccion = ""; //Variable para marcar un "option html"

?>

<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
</ol>

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
                                        <h1 class="page-header">TRANSACCIÓN DE CUENTA <small></small></h1>
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
									<label class="control-label col-md-3 col-sm-3"><b>CUENTA (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<select class="form-control selectpicker" id="lst-Id_Cuenta" name="lst-Id_Cuenta" data-size="10" data-style="btn-primary">											                                    
				                        </select>										
									</div>
                                </div>
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>TIPO DE MOVIMIENTO (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<select class="form-control selectpicker" id="lst-Tip_Movimiento" name="lst-Tip_Movimiento" data-size="10" data-style="btn-primary">											                                    
                                            <?php if(!empty($v_List_Tipo_Mov_Cuenta)){ ?>
                                                <option value="0">[--SELECCIONE TIPO DE MOVIMEINTO--]</option>
                                                <?php foreach($v_List_Tipo_Mov_Cuenta as $Item){ ?>
                                                    <option value="<?=$Item["Cod_ParSis"]?>"  <?=$T_Seleccion?>><?=$Item["Des_ParSis_Nom"]?></option>
                                                <?php }?>
                                            <?php }?>
                                        </select>										
									</div>
                                </div>
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>MONTO (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="number" type="text" id="txt-Num_Monto" name="txt-Num_Monto" value="<?php if(!empty($Producto)){echo $Producto['Num_Monto'];}?>" placeholder="00.00" maxlength="16">
									</div>
                                </div>
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>DESCRIPCIÓN (*) :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Des_Transaccion" name="txt-Des_Transaccion" value="<?php if(!empty($Producto)){echo $Producto['Des_Transaccion'];}?>" placeholder="" maxlength="512">
									</div>
                                </div>
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>CODIGO EXTERNO DE LA OPERACIÓN :</b></label>
									<div class="col-md-9 col-sm-9">
										<input class="form-control" type="text" id="txt-Cod_Externo" name="txt-Cod_Externo" value="<?php if(!empty($Producto)){echo $Producto['Cod_Externo'];}?>" placeholder="" maxlength="512">
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

    function Get_List_Cuenta(p_Id_Tienda=0)
    {
        var l_ListSelector = [];
        var l_RowSelector = [];
        var l_Request = {      
            Id_Tienda : p_Id_Tienda
        };

        var l_Response = SetActionJquery(l_Request,BASE_URL+"public/trxcuenta/Get_List_Cuenta");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {
                if(data.Resultado)
                {
                    $.each(data.Resultado.List_Cuenta, function (i, item) {
                        l_RowSelector = [item.Id_Cuenta,item.Des_Cuenta+" - ("+ item.Cod_Cuenta+") : "+item.Des_Saldo];
                        l_ListSelector.push(l_RowSelector);
                    });
                }
                CargarComboBoxGenerico("lst-Id_Cuenta","",l_ListSelector,null);
            }else{
                Ejecutar_Modal_Error(data.Error.messages);
            } 
        });
        l_Response.error(function(){
            alert("ERROR 500");
        });
    }

    function Set_Trx_Cuenta()
    {
        var l_Request = {      
             Id_Cuenta : $("#lst-Id_Cuenta").val()
            ,Tip_Movimiento : $("#lst-Tip_Movimiento").val()
            ,Des_Manual_Operacion : $("#txt-Des_Transaccion").val()
            ,Cod_Ex_Operacion : $("#txt-Cod_Externo").val()
            ,Num_Monto : Number($("#txt-Num_Monto").val())
        };

        var l_Response = SetActionJquery(l_Request,BASE_URL+"public/trxcuenta/Set_Trx_Cuenta");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {
                window.location.href = BASE_URL+"public/trxcuenta";
            }else{
                Ejecutar_Modal_Error(data.Error.messages);
            } 
        });
        l_Response.error(function(){
            alert("ERROR 500");
        });
    }

    $("#lst-Id_Tienda").change(function(e){

        var l_Id = $("#lst-Id_Tienda").val();
        
        if( l_Id != 0 && l_Id != null )
        {
            Get_List_Cuenta(l_Id);
        }
    });

    $("#btn-guardar").click(function(e){

        Ejecutar_Modal_Validacion("CONFIRMAR TRANSACCIÓN","¿ESTA SEGURO QUE DESEA REGISTRAR ESTE MOVIMIENTO DE DINERO?","medium",Set_Trx_Cuenta);

    });

});
</script>   