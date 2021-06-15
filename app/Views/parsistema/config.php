<?php
    $InfoTbl = [];
    array_push($InfoTbl,"CORRELATIVO");
?>
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
</ol>

<input type="hidden" id="h_crear" value="1">
<input type="hidden" id="h_listar" value="0">

<input type="hidden" id="h_Cod_ConfigSis" value="<?php if(!empty($DataObject)){echo $DataObject['Cod_ConfigSis'];}else{echo "0";}?>">

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
                                        <h1 class="page-header"><?php if(!empty($DataObject)){echo $DataObject['Cod_ConfigSis']." - ".$DataObject['Des_ConfigSis_Nom'] . " (".$DataObject['Des_ConfigSis_Key'].")";}?><small></small></h1>
                                    </div>
                                </div>
                                
                                <?php if(!empty($DataObject)){ ?>  
                                    
                                <?php if($DataObject['Desconfigsistema']['Des_DesParam_Nom']!=""){ ?>
    
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b>CORRELATIVO :</b></label>
									<div class="col-md-9 col-sm-9">
                                        <input class="form-control form-ccadmin" type="number" id="txt-Cod_ParSis" name="txt-Cod_ParSis" 
                                        value="" 
                                        maxlength="3"><ul class="parsley-errors-list" ></ul>
                                    </div>                                  
                                </div>                                    

                                <?php array_push($InfoTbl,$DataObject['Desconfigsistema']['Des_DesParam_Nom']); ?>    
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b><?=$DataObject['Desconfigsistema']['Des_DesParam_Nom']?> :</b></label>
									<div class="col-md-9 col-sm-9">
                                        <input class="form-control form-ccadmin" type="text" id="txt-Des_ParSis_Nom" name="txt-Des_ParSis_Nom" 
                                        value="" 
                                        maxlength="256"><ul class="parsley-errors-list" ></ul>
                                    </div>                                  
                                </div>
                                <?php } ?>

                                <?php if($DataObject['Desconfigsistema']['Des_DesParam_Abr']!=""){ ?>
                                    <?php array_push($InfoTbl,$DataObject['Desconfigsistema']['Des_DesParam_Abr']); ?>    
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b><?=$DataObject['Desconfigsistema']['Des_DesParam_Abr']?> :</b></label>
									<div class="col-md-9 col-sm-9">
                                        <input class="form-control form-ccadmin" type="text" id="txt-Des_ParSis_Abr" name="txt-Des_ParSis_Abr" 
                                        value="" 
                                        maxlength="256"><ul class="parsley-errors-list" ></ul>
                                    </div>                                  
                                </div>
                                <?php } ?>
                                
                                <?php if($DataObject['Desconfigsistema']['Des_DesParam_Tx1']!=""){ ?>
                                    <?php array_push($InfoTbl,$DataObject['Desconfigsistema']['Des_DesParam_Tx1']); ?>    
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b><?=$DataObject['Desconfigsistema']['Des_DesParam_Tx1']?> :</b></label>
									<div class="col-md-9 col-sm-9">
                                        <input class="form-control form-ccadmin" type="text" id="txt-Des_ParSis_Tx1" name="txt-Des_ParSis_Tx1" 
                                        value="" 
                                        maxlength="256"><ul class="parsley-errors-list" ></ul>
                                    </div>                                  
                                </div>
                                <?php } ?>
                                
                                <?php if($DataObject['Desconfigsistema']['Des_DesParam_Tx2']!=""){ ?>
                                    <?php array_push($InfoTbl,$DataObject['Desconfigsistema']['Des_DesParam_Tx2']); ?>    
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b><?=$DataObject['Desconfigsistema']['Des_DesParam_Tx2']?> :</b></label>
									<div class="col-md-9 col-sm-9">
                                        <input class="form-control form-ccadmin" type="text" id="txt-Des_ParSis_Tx2" name="txt-Des_ParSis_Tx2" 
                                        value="" 
                                        maxlength="256"><ul class="parsley-errors-list" ></ul>
                                    </div>                                  
                                </div>
                                <?php } ?>
                                
                                <?php if($DataObject['Desconfigsistema']['Des_DesParam_Tx3']!=""){ ?>
                                <?php array_push($InfoTbl,$DataObject['Desconfigsistema']['Des_DesParam_Tx3']); ?>    
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b><?=$DataObject['Desconfigsistema']['Des_DesParam_Tx3']?> :</b></label>
									<div class="col-md-9 col-sm-9">
                                        <input class="form-control form-ccadmin" type="text" id="txt-Des_ParSis_Tx3" name="txt-Des_ParSis_Tx3" 
                                        value="" 
                                        maxlength="512"><ul class="parsley-errors-list" ></ul>
                                    </div>                                  
                                </div>
                                <?php } ?>                                

                                <?php if($DataObject['Desconfigsistema']['Des_DesParam_Ch1']!=""){ ?>
                                <?php array_push($InfoTbl,$DataObject['Desconfigsistema']['Des_DesParam_Ch1']); ?>    
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b><?=$DataObject['Desconfigsistema']['Des_DesParam_Ch1']?> :</b></label>
									<div class="col-md-9 col-sm-9">
                                        <input class="form-control form-ccadmin" type="text" id="txt-Des_ParSis_Ch1" name="txt-Des_ParSis_Ch1" 
                                        value="" 
                                        maxlength="256"><ul class="parsley-errors-list" ></ul>
                                    </div>                                  
                                </div>
                                <?php } ?>

                                <?php if($DataObject['Desconfigsistema']['Des_DesParam_In1']!=""){ ?>
                                <?php array_push($InfoTbl,$DataObject['Desconfigsistema']['Des_DesParam_In1']); ?>    
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b><?=$DataObject['Desconfigsistema']['Des_DesParam_In1']?> :</b></label>
									<div class="col-md-9 col-sm-9">
                                        <input class="form-control form-ccadmin" type="text" id="txt-Num_ParSis_In1" name="txt-Num_ParSis_In1" 
                                        value="" 
                                        maxlength="256"><ul class="parsley-errors-list" ></ul>
                                    </div>                                  
                                </div>
                                <?php } ?>
                                
                                <?php if($DataObject['Desconfigsistema']['Des_DesParam_In2']!=""){ ?>
                                <?php array_push($InfoTbl,$DataObject['Desconfigsistema']['Des_DesParam_In2']); ?>    
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b><?=$DataObject['Desconfigsistema']['Des_DesParam_In2']?> :</b></label>
									<div class="col-md-9 col-sm-9">
                                        <input class="form-control form-ccadmin" type="text" id="txt-Num_ParSis_In2" name="txt-Num_ParSis_In2" 
                                        value="" 
                                        maxlength="256"><ul class="parsley-errors-list" ></ul>
                                    </div>                                  
                                </div>
                                <?php } ?>
                                
                                <?php if($DataObject['Desconfigsistema']['Des_DesParam_In3']!=""){ ?>
                                <?php array_push($InfoTbl,$DataObject['Desconfigsistema']['Des_DesParam_In3']); ?>    
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b><?=$DataObject['Desconfigsistema']['Des_DesParam_In3']?> :</b></label>
									<div class="col-md-9 col-sm-9">
                                        <input class="form-control form-ccadmin" type="text" id="txt-Num_ParSis_In3" name="txt-Num_ParSis_In3" 
                                        value="" 
                                        maxlength="256"><ul class="parsley-errors-list" ></ul>
                                    </div>                                  
                                </div>
                                <?php } ?>
                                
                                <?php if($DataObject['Desconfigsistema']['Des_DesParam_Sm1']!=""){ ?>
                                <?php array_push($InfoTbl,$DataObject['Desconfigsistema']['Des_DesParam_Sm1']); ?>    
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b><?=$DataObject['Desconfigsistema']['Des_DesParam_Sm1']?> :</b></label>
									<div class="col-md-9 col-sm-9">
                                        <input class="form-control form-ccadmin" type="text" id="txt-Num_ParSis_Sm1" name="txt-Num_ParSis_Sm1" 
                                        value="" 
                                        maxlength="256"><ul class="parsley-errors-list" ></ul>
                                    </div>                                  
                                </div>
                                <?php } ?> 
                                
                                <?php if($DataObject['Desconfigsistema']['Des_DesParam_Sm2']!=""){ ?>
                                <?php array_push($InfoTbl,$DataObject['Desconfigsistema']['Des_DesParam_Sm2']); ?>    
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b><?=$DataObject['Desconfigsistema']['Des_DesParam_Sm2']?> :</b></label>
									<div class="col-md-9 col-sm-9">
                                        <input class="form-control form-ccadmin" type="text" id="txt-Num_ParSis_Sm2" name="txt-Num_ParSis_Sm2" 
                                        value="" 
                                        maxlength="256"><ul class="parsley-errors-list" ></ul>
                                    </div>                                  
                                </div>
                                <?php } ?>

                                <?php if($DataObject['Desconfigsistema']['Des_DesParam_Sm3']!=""){ ?>
                                <?php array_push($InfoTbl,$DataObject['Desconfigsistema']['Des_DesParam_Sm3']); ?>    
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b><?=$DataObject['Desconfigsistema']['Des_DesParam_Sm3']?> :</b></label>
									<div class="col-md-9 col-sm-9">
                                        <input class="form-control form-ccadmin" type="text" id="txt-Num_ParSis_Sm3" name="txt-Num_ParSis_Sm3" 
                                        value="" 
                                        maxlength="256"><ul class="parsley-errors-list" ></ul>
                                    </div>                                  
                                </div>
                                <?php } ?>
                                
                                <?php if($DataObject['Desconfigsistema']['Des_DesParam_Dc1']!=""){ ?>
                                <?php array_push($InfoTbl,$DataObject['Desconfigsistema']['Des_DesParam_Dc1']); ?>    
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b><?=$DataObject['Desconfigsistema']['Des_DesParam_Dc1']?> :</b></label>
									<div class="col-md-9 col-sm-9">
                                        <input class="form-control form-ccadmin" type="text" id="txt-Num_ParSis_Dc1" name="txt-Num_ParSis_Dc1" 
                                        value="" 
                                        maxlength="256"><ul class="parsley-errors-list" ></ul>
                                    </div>                                  
                                </div>
                                <?php } ?>
                                
                                <?php if($DataObject['Desconfigsistema']['Des_DesParam_Dc2']!=""){ ?>
                                <?php array_push($InfoTbl,$DataObject['Desconfigsistema']['Des_DesParam_Dc2']); ?>    
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b><?=$DataObject['Desconfigsistema']['Des_DesParam_Dc2']?> :</b></label>
									<div class="col-md-9 col-sm-9">
                                        <input class="form-control form-ccadmin" type="text" id="txt-Num_ParSis_Dc2" name="txt-Num_ParSis_Dc2" 
                                        value="" 
                                        maxlength="256"><ul class="parsley-errors-list" ></ul>
                                    </div>                                  
                                </div>
                                <?php } ?>
                                
                                <?php if($DataObject['Desconfigsistema']['Des_DesParam_Dc3']!=""){ ?>
                                <?php array_push($InfoTbl,$DataObject['Desconfigsistema']['Des_DesParam_Dc3']); ?>    
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b><?=$DataObject['Desconfigsistema']['Des_DesParam_Dc3']?> :</b></label>
									<div class="col-md-9 col-sm-9">
                                        <input class="form-control form-ccadmin" type="text" id="txt-Num_ParSis_Dc3" name="txt-Num_ParSis_Dc3" 
                                        value="" 
                                        maxlength="256"><ul class="parsley-errors-list" ></ul>
                                    </div>                                  
                                </div>
                                <?php } ?> 
                                
                                <?php if($DataObject['Desconfigsistema']['Des_DesParam_Bo1']!=""){ ?>
                                <?php array_push($InfoTbl,$DataObject['Desconfigsistema']['Des_DesParam_Bo1']); ?>    
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b><?=$DataObject['Desconfigsistema']['Des_DesParam_Bo1']?> :</b></label>
									<div class="col-md-9 col-sm-9">
                                        <select class="form-control selectpicker" id="lst-Flg_ParSis_Bo1" name="lst-Flg_ParSis_Bo1" data-size="10" data-style="btn-primary" data-live-search="true">
                                            <option value="1">TRUE</option>
                                            <option value="0">FALSE</option>
				                        </select>
                                    </div>                                  
                                </div>
                                <?php } ?>

                                <?php if($DataObject['Desconfigsistema']['Des_DesParam_Bo2']!=""){ ?>
                                <?php array_push($InfoTbl,$DataObject['Desconfigsistema']['Des_DesParam_Bo2']); ?>    
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b><?=$DataObject['Desconfigsistema']['Des_DesParam_Bo2']?> :</b></label>
									<div class="col-md-9 col-sm-9">
                                        <select class="form-control selectpicker" id="lst-Flg_ParSis_Bo2" name="lst-Flg_ParSis_Bo2" data-size="10" data-style="btn-primary" data-live-search="true">
                                            <option value="1">TRUE</option>
                                            <option value="0">FALSE</option>
				                        </select>
                                    </div>                                  
                                </div>
                                <?php } ?>
                                
                                <?php if($DataObject['Desconfigsistema']['Des_DesParam_Bo3']!=""){ ?>
                                <?php array_push($InfoTbl,$DataObject['Desconfigsistema']['Des_DesParam_Bo3']); ?>    
                                <div class="form-group">
									<label class="control-label col-md-3 col-sm-3"><b><?=$DataObject['Desconfigsistema']['Des_DesParam_Bo3']?> :</b></label>
									<div class="col-md-9 col-sm-9">
                                        <select class="form-control selectpicker" id="lst-Flg_ParSis_Bo3" name="lst-Flg_ParSis_Bo3" data-size="10" data-style="btn-primary" data-live-search="true">
                                            <option value="1">TRUE</option>
                                            <option value="0">FALSE</option>
				                        </select>
                                    </div>                                  
                                </div>
                                <?php } ?>
                                                                                              
                                <?php } ?>
				            </form>
                        </div>
                        <div>                       
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
                type="button" class="btn btn-warning"><i class="ace-icon fa fa-share"></i> Volver</a>
				<a id="btn-limpiar" 
				type="button" class="btn btn-light"><i class="ace-icon fa fa-eraser"></i>Limpiar</a>                
				<a id="btn-guardar" 
				type="button" class="btn btn-primary"><i class="ace-icon fa fa-pencil"></i>Guardar</a>
			</div>                                   
		</div>  
  </div>
</div>
<br>
<div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline no-footer">
        <div class="row"><div class="col-xs-6">
        </div>
        <?php array_push($InfoTbl,"OPCIONES"); ?>
        <table id="data-table" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <?php for($i=0;$i<count($InfoTbl);$i++){ ?>
                        <th><?=$InfoTbl[$i]?></th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div> 

 <!-- ==================  JS COMPLEMENTOS ================== -->
 <script src="<?php echo base_url('assets/plugins/jquery/jquery-3.4.1.min.js');?>"></script>
  <!-- ================== END JS COMPLEMENTOS ================== -->

 <!-- ==================  JS FUNCIONES ================== -->
 <script src="<?php echo base_url('assets/js_sistema/backend.generico.js'); ?>"></script>

 <style>
	select{
		font-family: fontAwesome
	}
</style>

<script>
    $(document).ready(function() {
    
    var BASE_URL = $("#URL_BASE").val();

    var g_Num_Pagina = 1;
    var g_Cod_ConfSis = $("#h_Cod_ConfigSis").val();
    var g_Id_ParSis = 0;
    var g_Item_Seleccionado = 0;

    var g_crear = $("#h_crear").val();
    var g_listar = $("#h_listar").val();

    var g_OpcionesTabla = [
        [0,"[--OPCIONES--]"],
        [1,"&#xf044;  -  EDITAR "],
        [2,"&#xf1f8;  -  DESACTIVAR "]
        
    ];

    function Get_Parametros_Sistema(p_Cod_Sistema=0) {

        var l_OpcionesHtml = "";
        var l_DataTabla = [];
        var l_RowTabla = [];
        var l_OpcionesTabla = [];
        var l_Estado = "Inactivo";

        var l_Request = {
            Cod_Sistema: p_Cod_Sistema,Cod_ParaSistem : 0
        }
        var l_Response = GetActionJquery(l_Request,BASE_URL+"public/parsistema/Get_Parametros_Sistema");

        l_Response.success(function(data){
            if (!data.Error.flagerror) {                

                $.each(data.Resultado, function (i, item) {

                    l_OpcionesTabla = g_OpcionesTabla;

                    l_Estado = (item.Flg_Estado) ? "Activo" : "Inactivo";

                    l_OpcionesHtml = CrearComboBoxGenerico(l_OpcionesTabla,"lst-opciones",item.Cod_ParSis,item.Cod_ParSis,"opciones");
                    
                    l_RowTabla.push(item.Cod_ParSis);
                    if(item.Des_ParSis_Nom!=null) l_RowTabla.push(item.Des_ParSis_Nom);
                    if(item.Des_ParSis_Abr!=null) l_RowTabla.push(item.Des_ParSis_Abr);
                    if(item.Des_ParSis_Tx1!=null) l_RowTabla.push(item.Des_ParSis_Tx1);
                    if(item.Des_ParSis_Tx2!=null) l_RowTabla.push(item.Des_ParSis_Tx2);
                    if(item.Des_ParSis_Tx3!=null) l_RowTabla.push(item.Des_ParSis_Tx3);
                    if(item.Des_ParSis_Ch1!=null) l_RowTabla.push(item.Des_ParSis_Ch1);
                    if(item.Num_ParSis_In1!=null) l_RowTabla.push(item.Num_ParSis_In1);
                    if(item.Num_ParSis_In2!=null) l_RowTabla.push(item.Num_ParSis_In2);
                    if(item.Num_ParSis_In3!=null) l_RowTabla.push(item.Num_ParSis_In3);
                    if(item.Num_ParSis_Sm1!=null) l_RowTabla.push(item.Num_ParSis_Sm1);
                    if(item.Num_ParSis_Sm2!=null) l_RowTabla.push(item.Num_ParSis_Sm2);
                    if(item.Num_ParSis_Sm3!=null) l_RowTabla.push(item.Num_ParSis_Sm3);
                    if(item.Num_ParSis_Dc1!=null) l_RowTabla.push(item.Num_ParSis_Dc1);
                    if(item.Num_ParSis_Dc2!=null) l_RowTabla.push(item.Num_ParSis_Dc2);
                    if(item.Num_ParSis_Dc3!=null) l_RowTabla.push(item.Num_ParSis_Dc3);
                    if(item.Flg_ParSis_Bo1!=null) l_RowTabla.push(item.Flg_ParSis_Bo1);
                    if(item.Flg_ParSis_Bo2!=null) l_RowTabla.push(item.Flg_ParSis_Bo2);
                    if(item.Flg_ParSis_Bo3!=null) l_RowTabla.push(item.Flg_ParSis_Bo3);
                    l_RowTabla.push(l_OpcionesHtml);                    
                    l_DataTabla.push(l_RowTabla);
                    l_RowTabla = [];

                });
                CargarTablaGenerica("data-table", l_DataTabla,false);

            }else{

            } 
        });
        l_Response.error(function(){
            alert("ERROR 500");
        });

    }

    function Get_Parametros_Sistema_Individual(p_Cod_Sistema=0,p_Cod_ParaSistem=0) {
        var l_Flg_ParSis_Bo1 = 0;
        var l_Flg_ParSis_Bo2 = 0;
        var l_Flg_ParSis_Bo3 = 0;
        var l_Request = {
            Cod_Sistema: p_Cod_Sistema,Cod_ParaSistem : p_Cod_ParaSistem
        }
        var l_Response = GetActionJquery(l_Request,BASE_URL+"public/parsistema/Get_Parametros_Sistema");

        l_Response.success(function(data){
            if (!data.Error.flagerror) {                

                $.each(data.Resultado, function (i, item) {
                    l_Flg_ParSis_Bo1 = (item.Flg_ParSis_Bo1) ? 1 : 0;
                    l_Flg_ParSis_Bo2 = (item.Flg_ParSis_Bo2) ? 1 : 0;
                    l_Flg_ParSis_Bo3 = (item.Flg_ParSis_Bo3) ? 1 : 0;
                    g_Id_ParSis = item.Id_ParSis;
                    $("#txt-Cod_ParSis").val(item.Cod_ParSis);
                    if(item.Des_ParSis_Nom!=null) $("#txt-Des_ParSis_Nom").val(item.Des_ParSis_Nom);
                    if(item.Des_ParSis_Abr!=null) $("#txt-Des_ParSis_Abr").val(item.Des_ParSis_Abr);
                    if(item.Des_ParSis_Tx1!=null) $("#txt-Des_ParSis_Tx1").val(item.Des_ParSis_Tx1);
                    if(item.Des_ParSis_Tx2!=null) $("#txt-Des_ParSis_Tx2").val(item.Des_ParSis_Tx2);
                    if(item.Des_ParSis_Tx3!=null) $("#txt-Des_ParSis_Tx3").val(item.Des_ParSis_Tx3);
                    if(item.Des_ParSis_Ch1!=null) $("#txt-Des_ParSis_Ch1").val(item.Des_ParSis_Ch1);
                    if(item.Num_ParSis_In1!=null) $("#txt-Num_ParSis_In1").val(item.Num_ParSis_In1);
                    if(item.Num_ParSis_In2!=null) $("#txt-Num_ParSis_In2").val(item.Num_ParSis_In2);
                    if(item.Num_ParSis_In3!=null) $("#txt-Num_ParSis_In3").val(item.Num_ParSis_In3);
                    if(item.Num_ParSis_Sm1!=null) $("#txt-Num_ParSis_Sm1").val(item.Num_ParSis_Sm1);
                    if(item.Num_ParSis_Sm2!=null) $("#txt-Num_ParSis_Sm2").val(item.Num_ParSis_Sm2);
                    if(item.Num_ParSis_Sm3!=null) $("#txt-Num_ParSis_Sm3").val(item.Num_ParSis_Sm3);
                    if(item.Num_ParSis_Dc1!=null) $("#txt-Num_ParSis_Dc1").val(item.Num_ParSis_Dc1);
                    if(item.Num_ParSis_Dc2!=null) $("#txt-Num_ParSis_Dc2").val(item.Num_ParSis_Dc2);
                    if(item.Num_ParSis_Dc3!=null) $("#txt-Num_ParSis_Dc3").val(item.Num_ParSis_Dc3);
                    if(item.Flg_ParSis_Bo1!=null) $("#lst-Flg_ParSis_Bo1").val(l_Flg_ParSis_Bo1);
                    if(item.Flg_ParSis_Bo2!=null) $("#lst-Flg_ParSis_Bo2").val(l_Flg_ParSis_Bo2);
                    if(item.Flg_ParSis_Bo3!=null) $("#lst-Flg_ParSis_Bo3").val(l_Flg_ParSis_Bo3);                   

                });

            }else{

            } 
        });
        l_Response.error(function(){
            alert("ERROR 500");
        });

    }    

    function Set_Parametros_Sistema(p_Id_ParSis=0)
    {
        var l_Tip_Accion = 1;
        var l_Parsistema = {
            Tip_Accion : 1,
            Id_ParSis : null,
            Cod_ConfSis : 0,
            Cod_ParSis : 0,
            Des_ParSis_Nom : null,
            Des_ParSis_Abr : null,
            Des_ParSis_Tx1 : null,
            Des_ParSis_Tx2 : null,
            Des_ParSis_Tx3 : null,
            Des_ParSis_Ch1 : null,
            Num_ParSis_In1 : null,
            Num_ParSis_In2 : null,
            Num_ParSis_In3 : null,
            Num_ParSis_Sm1 : null,
            Num_ParSis_Sm2 : null,
            Num_ParSis_Sm3 : null,
            Num_ParSis_Dc1 : null,
            Num_ParSis_Dc2 : null,
            Num_ParSis_Dc3 : null,
            Flg_ParSis_Bo1 : null,
            Flg_ParSis_Bo2 : null,
            Flg_ParSis_Bo3 : null          
        };

        l_Tip_Accion = (p_Id_ParSis == 0) ? 1 : 2;

        l_Parsistema.Tip_Accion = l_Tip_Accion;
        l_Parsistema.Id_ParSis = p_Id_ParSis;
        l_Parsistema.Cod_ConfSis = g_Cod_ConfSis;
        l_Parsistema.Cod_ParSis = $("#txt-Cod_ParSis").val();
        if($("#txt-Des_ParSis_Nom").length != 0) l_Parsistema.Des_ParSis_Nom = $("#txt-Des_ParSis_Nom").val();
        if($("#txt-Des_ParSis_Abr").length != 0) l_Parsistema.Des_ParSis_Abr = $("#txt-Des_ParSis_Abr").val();
        if($("#txt-Des_ParSis_Tx1").length != 0) l_Parsistema.Des_ParSis_Tx1 = $("#txt-Des_ParSis_Tx1").val();
        if($("#txt-Des_ParSis_Tx2").length != 0) l_Parsistema.Des_ParSis_Tx2 = $("#txt-Des_ParSis_Tx2").val();
        if($("#txt-Des_ParSis_Tx3").length != 0) l_Parsistema.Des_ParSis_Tx3 = $("#txt-Des_ParSis_Tx3").val();
        if($("#txt-Des_ParSis_Ch1").length != 0) l_Parsistema.Des_ParSis_Ch1 = $("#txt-Des_ParSis_Ch1").val();
        if($("#txt-Num_ParSis_In1").length != 0) l_Parsistema.Num_ParSis_In1 = $("#txt-Num_ParSis_In1").val();
        if($("#txt-Num_ParSis_In2").length != 0) l_Parsistema.Num_ParSis_In2 = $("#txt-Num_ParSis_In2").val();
        if($("#txt-Num_ParSis_In3").length != 0) l_Parsistema.Num_ParSis_In3 = $("#txt-Num_ParSis_In3").val();
        if($("#txt-Num_ParSis_Sm1").length != 0) l_Parsistema.Num_ParSis_Sm1 = $("#txt-Num_ParSis_Sm1").val();
        if($("#txt-Num_ParSis_Sm2").length != 0) l_Parsistema.Num_ParSis_Sm2 = $("#txt-Num_ParSis_Sm2").val();
        if($("#txt-Num_ParSis_Sm3").length != 0) l_Parsistema.Num_ParSis_Sm3 = $("#txt-Num_ParSis_Sm3").val();
        if($("#txt-Num_ParSis_Dc1").length != 0) l_Parsistema.Num_ParSis_Dc1 = $("#txt-Num_ParSis_Dc1").val();
        if($("#txt-Num_ParSis_Dc2").length != 0) l_Parsistema.Num_ParSis_Dc2 = $("#txt-Num_ParSis_Dc2").val();
        if($("#txt-Num_ParSis_Dc3").length != 0) l_Parsistema.Num_ParSis_Dc3 = $("#txt-Num_ParSis_Dc3").val();
        if($("#lst-Flg_ParSis_Bo1").length != 0) l_Parsistema.Flg_ParSis_Bo1 = $("#lst-Flg_ParSis_Bo1").val();
        if($("#lst-Flg_ParSis_Bo2").length != 0) l_Parsistema.Flg_ParSis_Bo2 = $("#lst-Flg_ParSis_Bo2").val();
        if($("#lst-Flg_ParSis_Bo3").length != 0) l_Parsistema.Flg_ParSis_Bo3 = $("#lst-Flg_ParSis_Bo3").val();

        var l_Response = SetActionJquery(l_Parsistema,BASE_URL+"public/parsistema/Set_Parametros_Sistema");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {
                g_Id_ParSis = 0;
                Get_Parametros_Sistema(g_Cod_ConfSis);
                $(".form-ccadmin").val("");               
            }else{
                alert(data.Error.messages);
            } 
        });
        l_Response.error(function(){
            alert("ERROR 500");
        });        
    }

    function Ejecutar_Accion( p_Tip_Opcion = 0 , p_Id_Opcion = 0)
    {
        if(p_Tip_Opcion == 1) //EDITAR
        {
            Get_Parametros_Sistema_Individual(g_Cod_ConfSis,p_Id_Opcion);
        }
        if(p_Tip_Opcion == 2) //DESACTIVAR
        {
            window.location.href = BASE_URL+"public/parsistema/config/"+p_Id_Opcion;
        }
    }

    $(document).on('change', '.lst-opciones', function (e) {

        var l_Id = $(this).attr("id");
        var l_Opcion = $("#" + l_Id).val();

        $("#" + g_Item_Seleccionado).val(0);

        Ejecutar_Accion(l_Opcion,l_Id);

        g_Item_Seleccionado = l_Id;
       

    });

    $("#btn-guardar").click(function(e){

        Set_Parametros_Sistema(g_Id_ParSis);

    });

    $("#btn-limpiar").click(function(e){
        g_Id_ParSis = 0;
        $(".form-ccadmin").val("");
        $("#" + g_Item_Seleccionado).val(0);  
    });

    function Go_Funciones()
    {
        if( g_listar == 1 )
        {
            Get_Config_Parametros_Sistema(0,"",g_Num_Pagina);
        }
        if( g_crear == 1 )
        {

        }
        
    }

    Get_Parametros_Sistema(g_Cod_ConfSis);

    Go_Funciones();
    

});
</script>



