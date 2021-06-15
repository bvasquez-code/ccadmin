<?php

$password = 'ADMIN';
$options = [
    'memory_cost' => 1<<5, // 128 Mb
    'time_cost'   => 1,
    'threads'     => 3,
];
$hash = password_hash($password, PASSWORD_ARGON2I, $options);
echo $hash;

?>
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
</ol>

<input type="hidden" id="h_crear" value="0">
<input type="hidden" id="h_listar" value="1">

<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">CATEGORIAS DE PRODUCTO <small></small></h1>
<!-- end page-header -->
<div class="row">
    <div class="col-md-4">
        <a id="btn-nuevo" href="<?=base_url("public/categoriaproducto/crear")?>" class="btn btn-primary btn-block m-b-5"><i class="fa fa-cogs"></i> NUEVO</a>            
    </div>
</div>
<br>
<!-- begin row -->
<div class="col-xs-12">
    <div class="clearfix">
        <div class="pull-right tableTools-container"><div class="dt-buttons btn-overlap btn-group"><a class="dt-button buttons-collection buttons-colvis btn btn-white btn-primary btn-bold" tabindex="0" aria-controls="dynamic-table" data-original-title="" title=""><span><i class="fa fa-search bigger-110 blue"></i> <span class="hidden">Show/hide columns</span></span></a><a class="dt-button buttons-copy buttons-html5 btn btn-white btn-primary btn-bold" tabindex="0" aria-controls="dynamic-table" data-original-title="" title=""><span><i class="fa fa-copy bigger-110 pink"></i> <span class="hidden">Copy to clipboard</span></span></a><a class="dt-button buttons-csv buttons-html5 btn btn-white btn-primary btn-bold" tabindex="0" aria-controls="dynamic-table" data-original-title="" title=""><span><i class="fa fa-database bigger-110 orange"></i> <span class="hidden">Export to CSV</span></span></a><a class="dt-button buttons-print btn btn-white btn-primary btn-bold" tabindex="0" aria-controls="dynamic-table" data-original-title="" title=""><span><i class="fa fa-print bigger-110 grey"></i> <span class="hidden">Print</span></span></a></div></div>
    </div>
    <div class="table-header">
        CATEGORIAS DE PRODUCTO
    </div>

    <!-- div.table-responsive -->

    <!-- div.dataTables_borderWrap -->
    <div>
        <div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline no-footer">
            <div class="row"><div class="col-xs-6">
                <div class="dataTables_length" id="dynamic-table_length">
                <label>Display <select name="dynamic-table_length" aria-controls="dynamic-table" class="form-control input-sm">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select> records</label></div></div>
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
                        <th>Cod</th>
                        <th>Descripción</th>
                        <th>Tipo</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>

            <div class="row">
                <div class="col-xs-5">
                    <div class="dataTables_info" id="dynamic-table_info" role="status" aria-live="polite">Showing 1 to 10 of 23 entries</div>
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
 <script src="<?php echo base_url('assets/js_sistema/categoriaproducto/backend.categoriaproducto.js'); ?>"></script>
  <!-- ================== END JS FUNCIONES ================== -->

<style>
	select{
		font-family: fontAwesome
	}
</style>