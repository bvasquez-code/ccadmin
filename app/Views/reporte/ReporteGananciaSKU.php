<?php

$t_Seleccion = "";

?>
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
</ol>

<input type="hidden" id="h_crear" value="0">
<input type="hidden" id="h_listar" value="1">

<input type="hidden" id="h_Flg_Carrito_Cargado" value="<?php if(!empty($Flg_Carrito_Cargado)){ echo $Flg_Carrito_Cargado;}?>">

<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">REPORTE DE GANANCIA POR SKU POR VENTA<small></small></h1>
<!-- end page-header -->
<br>
<!-- begin row -->

<div class="col-xs-12">
    <div class="row">
        <div class="col-md-6 col-sm-6">
            <select class="chosen-select form-control" id="lst-Id_Periodo" style="width: 100%;" data-placeholder="Choose a State...">
                <?php if(!empty($v_List_Periodo)){ ?>
                    <?php foreach($v_List_Periodo as $Item){ ?>
                        <?php if($v_Id_Periodo_Select == $Item["Id_Periodo"]) $t_Seleccion = "selected"; ?>
                        <option value="<?=$Item["Id_Periodo"]?>" <?=$t_Seleccion?>><?=$Item["Des_Periodo"] . " - (  Inicio : " . $Item["Fec_Inicio"] . " - Fin : ". $Item["Fec_Fin"] . " )"?></option>
                        <?php $t_Seleccion = "";?>
                    <?php }?>
                <?php }?>      													                                         
            </select>
        </div>
        <div class="col-md-2 col-sm-2">
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
    <br>
    <div class="table-header">
        PREVENTAS REALIZADAS AL
    </div>

    <!-- div.table-responsive -->

    <!-- div.dataTables_borderWrap -->
    <div>
        <div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline no-footer">
            <div class="row"><div class="col-xs-6">
                <div class="dataTables_length" id="dynamic-table_length">
                </div></div>
                <div class="col-xs-6">
                    <div id="dynamic-table_filter" class="dataTables_filter">
                        <label>Search:<input type="search" id="txt-busqueda" class="form-control input-sm" placeholder="" aria-controls="dynamic-table"></label>
                    </div>
                </div>
            </div>

            <table id="data-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Cod Venta</th>
                        <th>Producto</th>
                        <th>Precio Unitario</th>
                        <th>Cantidad</th>
                        <th>Precio Costo Total</th>
                        <th>Total Vendido</th>
                        <th>Ganancia</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(!empty($v_List_Ganancia_Venta_x_SKU)){
                            $t_Num_Contador = 0;
                            foreach($v_List_Ganancia_Venta_x_SKU as $Item){
                            $t_Num_Contador++;
                    ?> 
                            <tr class="odd gradeX">
                                <td align="left"><?=$t_Num_Contador?></td>
                                <td align="left"><?=$Item["Cod_Venta"]?></td>
                                <td align="left"><?="(".$Item["Cod_Producto"] . ") - " . $Item["Des_Nombre"]?></td>
                                <td align="left"><?=$Item["Num_PrecioUnitario"]?></td>
                                <td align="left"><?=$Item["Num_Cantidad"]?></td>
                                <td align="left"><?=$Item["Num_PrecioTotalCosto"]?></td>
                                <td align="left"><?=$Item["Num_TotalVendido"]?></td>
                                <td align="left"><?=$Item["Num_Ganancia"]?></td>
                            </tr>
                    <?php
                            }
                        }
                    ?>
                </tbody>
            </table>

            <div class="row">
                <div class="col-xs-5">
                    <div class="dataTables_info" id="dynamic-table_info" role="status" aria-live="polite"><?="TOTAL DE REGISTROS ENCONTRADOS : " . count($v_List_Ganancia_Venta_x_SKU)?></div>
                </div>
                <div class="col-xs-7" id="div-paginador">
                </div>
            </div>
        </div>
    </div>
</div>

 <!-- ==================  JS COMPLEMENTOS ================== -->
 <script src="<?php echo base_url('assets/plugins/jquery/jquery-3.4.1.min.js');?>"></script>
  <!-- ================== END JS COMPLEMENTOS ================== -->

 <!-- ==================  JS FUNCIONES ================== -->
 <script src="<?php echo base_url('assets/js_sistema/backend.generico.js'); ?>"></script>
  <!-- ================== END JS FUNCIONES ================== -->

<style>
	select{
		font-family: fontAwesome
	}
</style>

<script>
$(document).ready(function() {

    var BASE_URL = $("#URL_BASE").val();

    $("#btn-buscar").click(function(e){

        var l_Id_Periodo = $("#lst-Id_Periodo").val();

        window.location.href = BASE_URL+"public/reporte/ReporteGananciaSKU?Id_Periodo="+l_Id_Periodo;

    });


});
</script>  