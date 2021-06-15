<?php

?>
<ol class="breadcrumb pull-right">  
</ol>

<input type="hidden" id="h_crear" value="1">
<input type="hidden" id="h_listar" value="0">

<?php if(!empty($Result_Busqueda)){ ?>
    <input type="hidden" id="h_Num_TotalReg" value="<?=$Result_Busqueda["Num_TotalReg"];?>">
    <input type="hidden" id="h_Num_TotalBus" value="<?=$Result_Busqueda["Num_TotalBus"];?>">
    <input type="hidden" id="h_Num_Seccion" value="<?=$Result_Busqueda["Num_Seccion"];?>">
    <input type="hidden" id="h_Num_RegistroIni" value="<?=$Result_Busqueda["Num_RegistroIni"];?>">
    <input type="hidden" id="h_Num_RegistroFin" value="<?=$Result_Busqueda["Num_RegistroFin"];?>">
    <input type="hidden" id="h_Num_Intervalo" value="<?=$Result_Busqueda["Num_Intervalo"];?>">
    <input type="hidden" id="h_Id_Tienda" value="<?=$v_Id_Tienda?>">
<?php } ?>

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
                                        <h1 class="page-header">
                                            <!-- <small><a class="btn-discount" id="4"><i class="fa fa-user fa-2x" aria-hidden="true"></i></a></small> -->
                                            <a id="btn-editar-cliente" href="<?=base_url("public/preventa/crear")?>">
                                                <div id="div-InfoCliente">CLIENTE DE CCADMIN</div>
                                            </a>
                                        </h1>                  
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="col-md-11 col-sm-11"></div>
                                            <div class="col-md-1 col-sm-1" style="text-align: right;">
                                                <b><a class="btn-limpiar-busqueda"><i class="fa fa-times fa-2x" aria-hidden="true"></i></a></b>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <span class="col-sm-6">
                                        <label class="pull-right inline">
                                            <small class="muted smaller-90">Modo codigo de barras :</small>

                                            <input id="id-button-borders" checked="checked" type="checkbox" class="ace ace-switch ace-switch-5">
                                            <span class="lbl middle"></span>
                                        </label>
                                    </span>
                                </div>  -->
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9"></div>
									<div class="col-md-3 col-sm-3">
                                        <input class="form-control" placeholder="Codigo Barras" type="text" id="txt-cod_barras" name="txt-cod_barras">
                                    </div>
                                </div> 
								<div class="form-group">
									<div class="col-md-12 col-sm-12">
                                        <input class="form-control" placeholder="Busqueda de productos ..." type="text" id="txt-busqueda" name="txt-busqueda" value="<?=$Array_Searchventa["search"];?>">
                                    </div>
                                </div>
                                
								<div class="form-group" style="display: none;">
									<div class="col-md-6 col-sm-6">
                                        <select class="chosen-select form-control" id="txt-Id_CategoriaPro" style="width: 100%;" data-placeholder="Choose a State...">
											<option value="0">SELECCIONAR CATEGORIA</option>
											<?php if(!empty($List_Categoria)){ ?>        
                                                <?php foreach($List_Categoria as $Item){      ?>
                                                    <?php $l_Seleccion = ($Array_Searchventa["category"] == $Item["Id_CategoriaPro"]) ? "selected" : "" ; ?>
													<option value="<?=$Item["Id_CategoriaPro"]?>" <?=$l_Seleccion?> > <?=$Item["Des_CategoriaPro_Nom"]." (".$Item["Cod_CategoriaPro"].")"?></option>													
												<?php  }?>													
											<?php } ?>                                          
				                        </select>
                                    </div>
									<div class="col-md-6 col-sm-6">
                                        <select class="chosen-select form-control" id="txt-Id_MarcaProducto" style="width: 100%;" data-placeholder="Choose a State...">
											<option value="0">SELECCIONAR MARCA</option>
											<?php if(!empty($List_Marca)){ ?>        
                                                <?php foreach($List_Marca as $Item){      ?>
                                                    <?php $l_Seleccion = ($Array_Searchventa["brand"] == $Item["Id_MarcaProducto"]) ? "selected" : "" ; ?>
													<option value="<?=$Item["Id_MarcaProducto"]?>" <?=$l_Seleccion?> > <?=$Item["Des_MarcaProducto_Nom"]." (".$Item["Cod_MarcaProducto"].")"?></option>													
												<?php  }?>													
											<?php } ?>                                          
				                        </select>
									</div>                                    
                                </div>
                                
                                <div class="form-group carr-ccadmin" style="display: none;">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 punteado">
                                            <div class="col-md-11 col-sm-11"></div>
                                            <div class="col-md-1 col-sm-1" style="text-align: right;">
                                                <b><a class="btn-delete-carrito"><i class="fa fa-times fa-2x" aria-hidden="true"></i></a></b>
                                            </div>
                                        </div>
                                    </div>                
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 punteado">
                                            <div class="col-md-3 col-sm-3">                                                
                                                <h5><b>PRODUCTO<b></h5>  
                                            </div>
                                            <div class="col-md-9 col-sm-9">
                                                <div class="col-md-2 col-sm-2">
                                                    <h5><b>PRECIO<b></h5>   
                                                </div>
                                                <div class="col-md-3 col-sm-3">                                                                                              
                                                    <h5><b>TOTAL UNIDADES<b></h5>                                                                                                                                                    
                                                </div>                                                
                                                <div class="col-md-2 col-sm-2">
                                                    <h5><b>TOTAL<b></h5>   
                                                </div>
                                                <div class="col-md-4 col-sm-4">
                                                    <h5><b>OPCIONES<b></h5>
                                                </div>
                                            </div>                                                                                                                                     
                                        </div>
                                    </div>
                                    <div id="carr-ccadmin">
                                    </div>
                                    <div id="total-carr-ccadmin">
                                    </div>
                                    <div id="div-btn">
                                        <div class="row punteado" style="text-align: right;">              
                                            <a id="btn-preventa" 
                                            type="button" class="btn btn-primary" style="width: 25%;"><i class="ace-icon fa fa-arrow-circle-right"></i>Continuar</a>
                                        </div>                                         
                                    </div>                                                                                
                                </div>
                                <div class="form-group promo-ccadmin" style="display: none;">
                                    
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-5">
                                        <div class="dataTables_info" id="dynamic-table_info" role="status" aria-live="polite"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?php if(!empty($Result_Busqueda)){ ?> 
                                        <?php 
                                            $List_Resultado  = $Result_Busqueda["List_Resultado"];
                                            $l_Num_Separacion = 0;
                                            $l_Flg_Separacion = true;  
                                        ?>   
                                        <?php foreach($List_Resultado as $Item) {  ?>

                                            <?php  $l_Num_Separacion++; ?>

                                            <?php
                                                if( $l_Num_Separacion == 1 )
                                                {
                                                    $l_Flg_Separacion = true;
                                                }
                                                else
                                                {
                                                    $l_Flg_Separacion = false;
                                                }                                    
                                            ?>

                                            <?php if($l_Flg_Separacion){ ?>
                                                <div class="row">
                                            <?php }?>
                                            
                                            <div class="col-md-3 col-sm-3 punteado">
                                                <div style="text-align: right;">
                                                    <h6><b><?=$Item["Des_CategProPdr_Nom"]." / ".$Item["Des_CategPro_Nom"]?></b></h6>
                                                </div>
                                                <div>                                                
                                                    <a href="<?=base_url("public/preventa/producto/".$Item["Id_Producto"])?>"><h5><?=$Item["Des_Producto_Nom"]?></h5></a>
                                                    <h6 style="color: #2d08fc;"><b>cod : <?=$Item["Cod_Producto"]?></b></h6>
                                                    <h6><?=$Item["Des_MarcaPro_Nom"]?></h6>
                                                    <h5><b><?=$Item["Des_Producto_PrecioStand"]?></b></h5>
                                                    <?php if(true){ ?>

                                                        <h5>Promocion disponible <i class="fa fa-check-circle fa-lg" aria-hidden="true" style="color: blue;"></i></h5>

                                                    <?php }else{ ?>

                                                        <h5>Promocion disponible <i class="fa fa-times fa-lg" aria-hidden="true" style="color: red;"></i></h5>

                                                    <?php } ?>
                                                    <h5>
                                                        <a style="color: black;cursor: pointer;" class="btn-stock-disponible" id="<?="stockpro_".$Item["Id_Producto"]?>">
                                                            Stock disponible : <b><?=$Item["Num_Producto_StockAct"]?></b>
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div>
                                                    <?php if($Item["Flg_Producto_Img"]){  ?>
                                                        <img style="width:60%; height:90%;" src="<?=base_url($Item["Des_ProductoImg_Urlp"])?>"/>
                                                    <?php }else{ ?>
                                                        <img style="width:60%; height:90%;" src="<?=base_url("imgccadmin/sinimagen2.jpg")?>"/>
                                                    <?php } ?>        
                                                </div>
                                                <div><br></div>
                                                <div style="text-align: right;">
                                                    <a class="btn btn-inverse agregar-carrito" id="<?=$Item["Id_Producto"]?>">Add +</a>
                                                </div>
                                                <div><br></div>                                      
                                            </div>

                                            <?php
                                                if( $l_Num_Separacion == 4 )
                                                {
                                                    $l_Flg_Separacion = true;
                                                    $l_Num_Separacion = 0;
                                                }
                                                else
                                                {
                                                    $l_Flg_Separacion = false;
                                                }                                    
                                            ?>

                                            <?php if($l_Flg_Separacion){ ?>
                                                </div>
                                            <?php } ?>

                                        <?php }?>
                                    <?php }?>                                                                                                             
                                </div>
                                <div class="form-group punteado">
                                    <div class="col-xs-5">
                                        <div class="dataTables_info" id="dynamic-table_info_2" role="status" aria-live="polite"></div>
                                    </div>
                                    <div class="col-xs-7" id="div-paginador_2">
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

<div id="modal-stock-disponible" class="modal" tabindex="-1">
        <div class="modal-dialog" style="width:40%;">
            <div class="modal-content" style="float:left;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="blue bigger">INFORMACION DE STOCK DEL PRODUCTO</h4>
                </div>
                <input type="hidden" id="producto_actual_modal" value="0">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <select class="form-control" id="lst-Id_Tienda">
                            <?php if(!empty($v_List_Tienda)){ ?>
                                <?php foreach($v_List_Tienda as $Item){ ?>
                                    <option value="<?=$Item["Id_Tienda"]?>"><?="(".$Item["Cod_Tienda"].") ".$Item["Des_Tienda"]?></option>
                                <?php }?>
                            <?php }?>                                   
                            </select>
                        </div>
                    </div>
                    <br><br>
                    <div class="form-group" id="tbl-stock-disponible">
                    </div>
                </div>
                <br><br><br><br><br><br><br><br>
            </div>
        </div>
    </div>

<style type="text/css">
.punteado{
  border-style: dotted;
   border-width: 1px;
   border-color: #e5e5e5;
   background-color: cc3366;
   font-family: verdana, arial;
   font-size: 10pt;
}
</style>

 <!-- ==================  JS COMPLEMENTOS ================== -->
 <script src="<?php echo base_url('assets/plugins/jquery/jquery-3.4.1.min.js');?>"></script>
  <!-- ================== END JS COMPLEMENTOS ================== -->

 <!-- ==================  JS FUNCIONES ================== -->
 <script src="<?php echo base_url('assets/js_sistema/backend.generico.js'); ?>"></script>
  <!-- ================== END JS FUNCIONES ================== -->
 <script>
$(document).ready(function() {

    var BASE_URL = $("#URL_BASE").val();
    var g_Accion_Ejecutable = true;

    var g_Modo_Escaner = true; 

    var g_Num_Pagina = 1; // Pagina por defecto
    var g_Des_Contexto = "ccadmin";
    var g_Des_Comentario = "";
    var g_Id_Tienda = $("#h_Id_Tienda").val();

    var g_Num_TotalReg  = Number($("#h_Num_TotalReg").val());
    var g_Num_TotalBus  = Number($("#h_Num_TotalBus").val());
    var g_Num_Seccion   = Number($("#h_Num_Seccion").val());
    var g_Num_RegistroIni   = Number($("#h_Num_RegistroIni").val());
    var g_Num_RegistroFin   = Number($("#h_Num_RegistroFin").val());
    var g_Num_Intervalo = Number($("#h_Num_Intervalo").val());
    var g_List_Promo = [];
    var g_List_Item_Carrito = [];

    var g_Form_Descuento = [ // modal stock de producto
            [['DESCUENTO INDIVIDUAL', 'number', 'descuento-individual']],
            [['DESCUENTO TOTAL', 'number', 'descuento-total']]
        ];

    var g_Form_variaciones = [ // modal stock de producto
        [['<div id="div-variaciones"></div>', 'html']],
        [['STOCK TOTAL A COMPRAR', 'number', 'cantidad-productos']]
    ];

    $('.chosen-select').chosen({allow_single_deselect:true});

    function Establecer_Configuracion_Escaner()
    {
        if( g_Modo_Escaner == true )
        {
            $("#txt-cod_barras").focus();
        }
    }

    function Set_Producto_Carrito( p_Id_Producto=0,p_Cod_Accion="",p_Num_Descuento=0,p_Num_Cantidad = 0, p_List_Variaciones = [] )
    {

        if(!g_Accion_Ejecutable) return false;
        g_Accion_Ejecutable = false;

        Abrir_Dialogo_Carga();

        var l_Request = { 
                Id_Producto : Number(p_Id_Producto), 
                Cod_Accion : p_Cod_Accion,
                Num_Descuento : Number(p_Num_Descuento),
                Num_Cantidad : Number(p_Num_Cantidad),
                List_Variaciones : p_List_Variaciones
            };

        var l_Response = SetActionJquery(l_Request,BASE_URL+"public/preventa/Set_Producto_Carrito");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {
                if(data.Resultado == true)
                {
                    Get_Producto_Carrito();
                }           
            }else{

                if( data.Error.error == 10)
                {   
                    Ejecutar_Modal_Variaciones_Producto(data.Resultado,p_Id_Producto);
                }
                else
                {
                    Ejecutar_Modal_Error(data.Error.messages);
                }
                
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

    function Ejecutar_Modal_Variaciones_Producto(List_Variaciones = [],p_Id_Producto = 0)
    {
        var l_Html_Aux = "";
        var l_Num_Cantidad = 0;

        Ejecutar_Modal_Generico("form-1",g_Form_variaciones,"<b>AGREGAR STOCK ESPECIFICO DE PRODUCTO</b>","large",Accion_Cantidad_Manual_Variacion_Producto,p_Id_Producto);

        $("#txt-cantidad-productos").attr("readonly",true);

        $.each(List_Variaciones, function (i, item) {

            l_Num_Cantidad = ( item.hasOwnProperty("Num_Cantidad") ) ? item.Num_Cantidad : 0;

            l_Html_Aux += '<div class="col-md-12">';
            l_Html_Aux += '<label class="control-label col-md-7"><b>'+item.Des_Variacion+'</b> ( Stock disponible : <b>'+item.Num_Stock_Actual+'</b> )</label>';                  
            l_Html_Aux += '<div class="col-md-5">';
            l_Html_Aux += '<input type="number" min="0" max="'+item.Num_Stock_Actual+'" class="form-control class-text class-stock-variacion" value="'+l_Num_Cantidad+'" name="txt-variacion-'+item.Id_Variacion+'" id="txt-variacion-'+item.Id_Variacion+'">';
            l_Html_Aux += '</div>';
            l_Html_Aux += '</div>';
        });

        $("#div-variaciones").html(l_Html_Aux);

        Validar_Stock_Variacion_Producto();
    }

    function Get_Producto_Carrito()
    {        
        var l_Html_Carr = "";
        var l_Html_Info_Cliente = "";
        var l_Request = {};

        var l_Response = SetActionJquery(l_Request,BASE_URL+"public/preventa/Get_Producto_Carrito");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {

                g_List_Item_Carrito = [];

                if(data.Resultado.Flg_Cargado)
                {
                    g_List_Item_Carrito = data.Resultado.List_Item_Pro;

                    $(".carr-ccadmin").show();
                    $.each(data.Resultado.List_Item_Pro, function (i, item) {
                        l_Html_Carr += '<div class="row">';
                        l_Html_Carr += '<div class="col-md-12 col-sm-12 punteado">';
                        l_Html_Carr += '<div class="col-md-3 col-sm-3">';                                                
                        l_Html_Carr += '<a href="'+BASE_URL+'public/preventa/producto/'+item.Id_Producto+'"><h5><b>'+item.Des_Producto+'</h5><h6>cod : '+item.Cod_Producto+'<h6></a>';
                        l_Html_Carr += '<h6>'+item.Des_Producto_text+'</h6>';
                        l_Html_Carr += '<h6></h6>';   
                        l_Html_Carr += '</div>';
                        l_Html_Carr += '<div class="col-md-9 col-sm-9">';
                        l_Html_Carr += '<div class="col-md-2 col-sm-2">';
                        l_Html_Carr += '<h6 style="color:black;"><b>'+item.Des_Precio+'</b></h6>';   
                        l_Html_Carr += '</div>';
                        l_Html_Carr += '<div class="col-md-1 col-sm-1">';
                        l_Html_Carr += '<a type="button" class="btn btn-inverse btn-minus" id="'+item.Id_Producto+'">';
                        l_Html_Carr += '<span class="fa fa-minus"></span>';
                        l_Html_Carr += '</a>';                                                                                                
                        l_Html_Carr += '</div>';
                        l_Html_Carr += '<div class="col-md-1 col-sm-1" style="text-align: center;">';
                        l_Html_Carr += '<a class="btn-cantidad" id="'+item.Id_Producto+'"><h6 style="color:black;"><b>'+item.Num_Cantidad+' U</b></h6></a>';                                                                                                 
                        l_Html_Carr += '</div>';                                                
                        l_Html_Carr += '<div class="col-md-1 col-sm-1">';                                                    
                        l_Html_Carr += '<a type="button" class="btn btn-inverse btn-plus" id="'+item.Id_Producto+'">';
                        l_Html_Carr += '<span class="fa fa-plus"></span>';
                        l_Html_Carr += '</a>';
                        l_Html_Carr += '</div>';                                                
                        l_Html_Carr += '<div class="col-md-2 col-sm-2">';
                        l_Html_Carr += '<h6 style="color:blue;"><b>'+item.Des_MontoTotal+'</b></h6>';
                        if(item.Des_DescuentoTotal != "")
                        {
                            l_Html_Carr += '<h6 style="color:#e1c4c4;"><b>'+item.Des_Descuento+" x "+item.Num_Cantidad+'</b></h6>';
                            l_Html_Carr += '<h6 style="color:red;"><b>'+item.Des_DescuentoTotal+'</b></h6>';   
                        }

                        l_Html_Carr += '</div>';
                        l_Html_Carr += '<div class="col-md-4 col-sm-4">';
                        l_Html_Carr += '<a class="btn-discount" id="'+item.Id_Producto+'"><i class="fa fa-money fa-3x" aria-hidden="true"></i></a>';
                        l_Html_Carr += '</div>';
                        l_Html_Carr += '<div class="col-md-1 col-sm-1">';
                        l_Html_Carr += '<a class="btn-delete" id="'+item.Id_Producto+'"><i class="fa fa-times fa-3x" aria-hidden="true"></i></a>';
                        l_Html_Carr += '</div>';                    
                        l_Html_Carr += '</div>';                                                                                                                                     
                        l_Html_Carr += '</div>';
                        l_Html_Carr += '</div>';
                    });
                    $("#carr-ccadmin").html(l_Html_Carr);
                    l_Html_Carr = "";
                    l_Html_Carr += '<div class="row">';
                    l_Html_Carr += '<div class="col-md-12 col-sm-12 punteado">';
                    l_Html_Carr += '<div class="col-md-4 col-sm-4"></div>';
                    l_Html_Carr += '<div class="col-md-8 col-sm-8">';
                    l_Html_Carr += '<div class="col-md-2 col-sm-2">';
                    l_Html_Carr += '<h6><b>SUB-TOTAL:<b></h6> ';  
                    l_Html_Carr += '</div>';
                    l_Html_Carr += '<div class="col-md-2 col-sm-2">';
                    l_Html_Carr += '<h6 style="color: gray;"><b>'+data.Resultado.Des_SubTotalVenta+'<b></h6>';   
                    l_Html_Carr += '</div>';
                    l_Html_Carr += '<div class="col-md-2 col-sm-2">';
                    l_Html_Carr += '<h6><b>DESCUENTO:<b></h6>';   
                    l_Html_Carr += '</div>';
                    l_Html_Carr += '<div class="col-md-2 col-sm-2">';
                    l_Html_Carr += '<h6 style="color: red;"><b>'+data.Resultado.Des_Descuento+'<b></h6>';   
                    l_Html_Carr += '</div>';
                    l_Html_Carr += '<div class="col-md-2 col-sm-2">';
                    l_Html_Carr += '<h6><b>TOTAL:<b></h6>';   
                    l_Html_Carr += '</div>';
                    l_Html_Carr += '<div class="col-md-2 col-sm-2">';
                    l_Html_Carr += '<h5 style="color: blue;"><b>'+data.Resultado.Des_Total+'<b></h5>';   
                    l_Html_Carr += '</div>';                                                 
                    l_Html_Carr += '</div>';                                                                                                                                     
                    l_Html_Carr += '</div>';
                    l_Html_Carr += '</div>';
                    $("#total-carr-ccadmin").html(l_Html_Carr);                  
                 
                }else{
                    $(".carr-ccadmin").hide();
                }

                if( data.Resultado.Cliente != null )
                {
                    if( data.Resultado.Cliente.Tip_Persona == 0 )
                    {
                        l_Html_Info_Cliente = data.Resultado.Cliente.PersonaNatural.Des_Nombres
                                                +' '+data.Resultado.Cliente.PersonaNatural.Des_ApePaterno
                                                +' '+data.Resultado.Cliente.PersonaNatural.Des_ApeMaterno;
                    }
                    if( data.Resultado.Cliente.Tip_Persona == 1 )
                    {
                        l_Html_Info_Cliente = data.Resultado.Cliente.PersonaNatural.Cod_Documento
                                             +' '+data.Resultado.Cliente.PersonaNatural.Des_Nombres
                                             +' '+data.Resultado.Cliente.PersonaNatural.Des_ApePaterno
                                             +' '+data.Resultado.Cliente.PersonaNatural.Des_ApeMaterno;
                    }
                    if( data.Resultado.Cliente.Tip_Persona == 2 )
                    {
                        l_Html_Info_Cliente = data.Resultado.Cliente.PersonaJuridica.Cod_Ruc
                                             +' '+data.Resultado.Cliente.PersonaJuridica.Des_RazonSocial;
                    }
                    if(l_Html_Info_Cliente.trim()!= "") $("#div-InfoCliente").html(l_Html_Info_Cliente);  
                }

                g_Des_Comentario = data.Resultado.Des_Comentario;
                Get_Promocion();
                Establecer_Configuracion_Escaner();

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

    function Delete_Producto_Carrito()
    {
        var l_Request = { Cod_Accion : "DeleteItemCar" };

        var l_Response = SetActionJquery(l_Request,BASE_URL+"public/preventa/Delete_Producto_Carrito");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {
                Get_Producto_Carrito();
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

    function Set_Preventa()
    {
        Abrir_Dialogo_Carga();

        var l_Request = {
            Des_Comentario : $("#txt-comentario").val()
        };

        var l_Response = SetActionJquery(l_Request,BASE_URL+"public/preventa/Set_Preventa");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {

                bootbox.alert('<div class="row"><div class="col-sm-12"><h4 style="color:red;">OPERACIÓN REALIZADA CON EXITO : </h4><h4 style="color:blue;">'+data.Resultado.Cod_Venta+'</h4></div></div>', function(){ 
                    window.location.href = BASE_URL+"public/preventa"; 
                });
            }else{
                Ejecutar_Modal_Error(data.Error.messages);
            }
            g_Accion_Ejecutable = true;
            Cerrar_Dialogo_Carga_Proceso(data.Error.flagerror);
        });
        l_Response.error(function(){
            g_Accion_Ejecutable = true;
            alert("ERROR 500");
            Cerrar_Dialogo_Carga_Proceso(true);          
        });       
    }

    function Accion_Descuento(p_Id_Producto=0)
    {
        var l_Cod_Accion = "discount";
        var l_Num_Descuento_Ind = $("#txt-descuento-individual").val();
        var l_Num_Descuento_Tot = $("#txt-descuento-total").val();
        var l_Num_Descuento = 0;

        if( l_Num_Descuento_Ind != "")
        {
            l_Num_Descuento = l_Num_Descuento_Ind;
        }        

        Set_Producto_Carrito(p_Id_Producto,l_Cod_Accion,l_Num_Descuento);
    }

    function Accion_Cantidad_Manual(p_Id_Producto=0)
    {
        var l_Cod_Accion = "addquantity";
        var l_Num_Cantidad = $("#txt-cantidad-productos").val();

        Set_Producto_Carrito(p_Id_Producto,l_Cod_Accion,0,l_Num_Cantidad);
    }

    function Accion_Cantidad_Manual_Variacion_Producto(p_Id_Producto=0)
    {
        var l_List_Variaciones = [];
        var l_Cod_Accion = "addquantity";
        var l_Num_Cantidad = 0;

         $(".class-stock-variacion").each(function(index){

            var l_Id = $(this).attr("id");
            
            if( Number($("#"+l_Id).val()) > 0 )
            {
                l_List_Variaciones.push(
                    {
                         Id_Variacion : Number(l_Id.split("-")[2])
                        ,Num_Cantidad : Number($("#"+l_Id).val())
                    }
                );

                l_Num_Cantidad = l_Num_Cantidad + Number($("#"+l_Id).val());
            }

        });

        Set_Producto_Carrito(p_Id_Producto,l_Cod_Accion,0,l_Num_Cantidad,l_List_Variaciones);

    }
    
    function Cargar_Data_Inicial()
    {
        if ( g_Num_Seccion != 0 )
        {
            g_Num_Pagina = g_Num_Seccion;
        }
        Establecer_Configuracion_Escaner();
    }

    function Get_Producto()
    {
        var obj = { 
            search: $("#txt-busqueda").val(), 
            category: $("#txt-Id_CategoriaPro").val(), 
            brand: $("#txt-Id_MarcaProducto").val(),
            context: g_Des_Contexto,
            page : g_Num_Pagina 
        };
        var str = jQuery.param(obj);

        window.location.href = BASE_URL+"public/preventa/search?"+str;
    }

    function Get_Promocion()
    {        
        var l_Html_Promo = "";
        var l_Request = {};
        g_List_Promo = [];

        var l_Response = SetActionJquery(l_Request,BASE_URL+"public/preventa/Get_Promocion");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {

                if( data.Resultado.List_Promocion.length > 0 )
                {
                    $(".promo-ccadmin").show();

                    l_Html_Promo += '<div class="col-md-7 col-sm-7"></div>';
                    l_Html_Promo += '<div class="col-md-5 col-sm-5">';
                    l_Html_Promo += '<div class="row punteado"><p><small>PROMOCIONES DIPONIBLES</small></p></div>';

                    $.each(data.Resultado.List_Promocion, function (i, item) {
                        
                        l_Html_Promo += '<div class="row punteado">';
                        l_Html_Promo += '<a class="btn-promo" id="'+item.Id_Promocion+'" style="cursor: pointer;"><p><small>'+item.Des_Promocion+'</small></p></a>';
                        l_Html_Promo += '</div>';

                        g_List_Promo[item.Id_Promocion] = item;            
                    });

                    l_Html_Promo += '</div>';
                    $(".promo-ccadmin").html(l_Html_Promo);

                }else{
                    $(".promo-ccadmin").hide();
                    $(".promo-ccadmin").html("")
                }

            }else{
                Ejecutar_Modal_Error(data.Error.messages);
            }

        });
        l_Response.error(function(){
            alert("ERROR 500");            
        }); 
    }

    function Set_Promocion(p_Obj_Promocion = [])
    {
        var l_Request = p_Obj_Promocion;

        var l_Response = SetActionJquery(l_Request,BASE_URL+"public/preventa/Set_Promocion");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {
                Get_Producto_Carrito();
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

    function Validar_Stock_Variacion_Producto()
    {
        var l_Id = 0;
        var l_cantidad_productos = 0;
        var l_Num_Cantidad_Actual_Variacion = 0;
        var l_Num_Stock_min = 0;
        var l_Num_Stock_max = 0;

        $(".class-stock-variacion").each(function(index){

            l_Id = $(this).attr("id");
            l_Num_Stock_max = $(this).attr("max");
            l_Num_Cantidad_Actual_Variacion = Number($("#"+l_Id).val());

            if(l_Num_Cantidad_Actual_Variacion > l_Num_Stock_max)
            {
                Ejecutar_Modal_Error("NO EXISTE EL STOCK SUFICIENTE PARA EL PRODUCTO { DISPONIBLE : "+l_Num_Stock_max+" ,SOLICITADO : "+l_Num_Cantidad_Actual_Variacion+" }");
                $("#"+l_Id).val(0);
                return false;
            }
            if(l_Num_Stock_min > l_Num_Cantidad_Actual_Variacion)
            {
                Ejecutar_Modal_Error("STOCK SOLICITADO NO PUEDE SER MENOR A 0");
                $("#"+l_Id).val(0);
                return false;
            }

            if(  l_Num_Cantidad_Actual_Variacion > 0 )
            {
                l_cantidad_productos = l_cantidad_productos +  l_Num_Cantidad_Actual_Variacion;
            }

        });

        $("#txt-cantidad-productos").val(l_cantidad_productos);
        
    }

    function Get_Stock_Disponible(p_Id_Tienda = 0,p_Id_Producto = 0)
    {        
        var l_Html = "";
        var l_Request = {
            Id_Tienda : p_Id_Tienda,
            Id_Producto : p_Id_Producto
        };

        $("#tbl-stock-disponible").html("");

        var l_Response = SetActionJquery(l_Request,BASE_URL+"public/preventa/Get_Stock_Disponible");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {

                $.each(data.Resultado.List_Almacen_Stock, function (i, item) {

                    // l_Html += '<table class="table table-bordered table-striped">';
                    $.each(item.List_Stock_Disponible, function (i, item_2) {
                        l_Html += '<div class="col-sm-12">';
                        l_Html += '    <div class="profile-user-info profile-user-info-striped" style="TEXT-ALIGN: CENTER; background: beige;">';
                        l_Html += '        <h6><b>ALMACEN : </b>'+item_2.Des_Almacen+'</h6>';
                        l_Html += '    </div>';
                        l_Html += '</div>';
                        l_Html += '<div class="col-sm-12">';
                        l_Html += '    <div class="profile-user-info profile-user-info-striped" style="TEXT-ALIGN: CENTER;">';
                        l_Html += '        <h6><b>DIRECCIÓN : </b><i class="fa fa-map-marker light-orange bigger-110"></i>'+item_2.Des_Direccion+'</h6>';
                        l_Html += '    </div>';
                        l_Html += '</div>';
                        l_Html += '<div class="col-sm-12">';
                        l_Html += '<div class="col-sm-12">';
                        l_Html += '    <table class="table table-bordered table-striped">';
                        l_Html += '     <tbody>';
                        l_Html += '         <tr>';
                        l_Html += '             <td><b>TOTAL DISPONIBLE</b></td>';
                        l_Html += '             <td>'+item_2.Num_Stock+'</td>';
                        l_Html += '         </tr>';
                        $.each(item_2.List_StockFisico_Variacion, function (i, item_3) {
                            l_Html += '         <tr style="background: white;">';
                            l_Html += '             <td>'+item_3.Des_VariacionProducto+'</td>';
                            l_Html += '             <td>'+item_3.Num_Stock+'</td>';
                            l_Html += '         </tr>';
                        });
                        l_Html += '     </tbody>';
                        l_Html += '    </table>';
                        l_Html += '</div>';
                        l_Html += '</div>';
                         
                    });

                    // l_Html += '</table>';
                });
                $("#tbl-stock-disponible").html(l_Html);

            }else{
                Ejecutar_Modal_Error(data.Error.messages);
            }
           

        });
        l_Response.error(function(){
            alert("ERROR 500");         
        }); 
    }

    function Ejecutar_Accion_Codigo_Barras()
    {
        g_Accion_Ejecutable = false;
        Abrir_Dialogo_Carga();

        var l_Request = {
            Cod_Barras : $("#txt-cod_barras").val()
        };

        var l_Response = SetActionJquery(l_Request,BASE_URL+"public/preventa/Ejecutar_Accion_Codigo_Barras");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {
                Get_Producto_Carrito();                                
            }else{

                if( data.Error.error == 10)
                {   
                    Ejecutar_Modal_Variaciones_Producto(data.Resultado.Obj_Rpt_Carrito,data.Resultado.Id_Producto);
                }
                else
                {
                    Ejecutar_Modal_Error(data.Error.messages);
                }
            }
            $("#txt-cod_barras").val("");
            g_Accion_Ejecutable = true;
            Cerrar_Dialogo_Carga_Simple();
        });
        l_Response.error(function(){
            g_Accion_Ejecutable = true;
            Cerrar_Dialogo_Carga_Simple();
            // alert("ERROR 500");            
        });           
    }

    $("#txt-busqueda").keypress(function(e) {
        var code = (e.keyCode ? e.keyCode : e.which);

        g_Num_Pagina = 1;

        if(code==13){

            var obj = { 
                search: $("#txt-busqueda").val(), 
                category: $("#txt-Id_CategoriaPro").val(), 
                brand: $("#txt-Id_MarcaProducto").val(),
                context: g_Des_Contexto,
                page : g_Num_Pagina 
            };
            var str = jQuery.param(obj);

            window.location.href = BASE_URL+"public/preventa/search?"+str;

        }
    });

    $("#txt-cod_barras").keypress(function(e) {

        var code = (e.keyCode ? e.keyCode : e.which);

        if( g_Accion_Ejecutable == true && code == 13  )
        {
            setTimeout(Ejecutar_Accion_Codigo_Barras,200);
            g_Accion_Ejecutable = false;
        }
       
    });

    $(".btn-limpiar-busqueda").click(function(e){
        window.location.href = BASE_URL+"public/preventa/search";
    });

    $(".agregar-carrito").click(function(e){
        
        var l_Id = $(this).attr("Id");
        Set_Producto_Carrito(l_Id,"add");

    });

    $(".btn-delete-carrito").click(function(e){
        // Delete_Producto_Carrito();
        var l_FormArray = [[['<label>¿Esta seguro que desea eliminar todos los productos seleccionados?</label>', "html"]]];
        Ejecutar_Modal_Generico("form-1",l_FormArray,"<b>¡ALERTA!</b>","medium",Delete_Producto_Carrito);
    });

    $(document).on("click",".btn-delete",function() {
        var l_Id = $(this).attr("Id");
        var l_FormArray = [[['<label>¿Esta seguro que desea eliminar este producto del carrito?</label>', "html"]]];
        Ejecutar_Modal_Generico("form-1",l_FormArray,"<b>¡ALERTA!</b>","medium",Set_Producto_Carrito,l_Id,"delete");
    });

    $(document).on("click",".btn-plus",function() {
        var l_Id = $(this).attr("Id");
        Set_Producto_Carrito(l_Id,"add");
    });

    $(document).on("click",".btn-minus",function() {
        var l_Id = $(this).attr("Id");
        Set_Producto_Carrito(l_Id,"decrease");
    });   

    $(document).on("click",".btn-cantidad",function() {
        var l_Id = $(this).attr("Id");
        var l_FormArray = [[['<input type="number" id="txt-cantidad-productos" class="form-control">', "html"]]];
        var l_Item_Producto = [];

        if(g_List_Item_Carrito.hasOwnProperty(l_Id))
        {
            l_Item_Producto = g_List_Item_Carrito[l_Id]
            
            if(l_Item_Producto.List_Variaciones.length == 0)
            {
                Ejecutar_Modal_Generico("form-1",l_FormArray,"<b>CANTIDAD PRODUCTOS</b>","medium",Accion_Cantidad_Manual,l_Id);
            }else
            {
                Ejecutar_Modal_Variaciones_Producto(l_Item_Producto.List_Variaciones,l_Id);
            }

            $("#txt-cantidad-productos").val(l_Item_Producto.Num_Cantidad);
        }

    });  

    $(document).on("click",".btn-discount",function() {
        var l_Id = $(this).attr("Id");
        // var l_FormArray = [[['<input type="text" id="txt-descuento" class="form-control">', "html"]]];
        Ejecutar_Modal_Generico("form-1",g_Form_Descuento,"<b>INGRESAR DESCUENTO</b>","medium",Accion_Descuento,l_Id);
    });


    $("#btn-preventa").click(function(e){
        var l_FormArray = [[['<input type="text" id="txt-comentario" class="form-control">', "html"]]];
        Ejecutar_Modal_Generico("form-1",l_FormArray,"<b>COMENTARIO SOBRE LA PREVENTA</b>","medium",Set_Preventa);
        $("#txt-comentario").val(g_Des_Comentario);
    });

    $(document).on('click', '.paginate_button_a', function (e) {        
        var l_Id = $(this).attr("Id");
        g_Num_Pagina = Get_Num_Pagina_Seleccionada(l_Id,g_Num_Pagina);
        Get_Producto();
    });

    $(document).on('click', '.btn-promo', function (e) {        
        var l_Id = $(this).attr("Id");
        var l_Html_Promo = "";
        var l_Obj_Promo = g_List_Promo[l_Id];
        console.log(l_Obj_Promo);

        l_Html_Promo += '<div class="row">';
        l_Html_Promo += '<div class="col-md-3 col-sm-3"><label><b>PROMOCIÓN</b></label></div>';
        l_Html_Promo += '<div class="col-md-9 col-sm-9"><label>'+l_Obj_Promo.Cod_Promocion+'</label></div>';
        l_Html_Promo += '</div>';
        l_Html_Promo += '<div class="row">';
        l_Html_Promo += '<div class="col-md-3 col-sm-3"><label><b>DESCRIPCIÓN</b></label></div>';
        l_Html_Promo += '<div class="col-md-9 col-sm-9"><label>'+l_Obj_Promo.Des_Promocion+'</label></div>';
        l_Html_Promo += '</div>';
        l_Html_Promo += '<div class="row">';
        l_Html_Promo += '<div class="col-md-3 col-sm-3"><label><b>PROMO INICIO</b></label></div>';
        l_Html_Promo += '<div class="col-md-9 col-sm-9"><label>'+l_Obj_Promo.Fec_Inicio+'</label></div>';
        l_Html_Promo += '</div>';
        l_Html_Promo += '<div class="row">';
        l_Html_Promo += '<div class="col-md-3 col-sm-3"><label><b>PROMO FIN</b></label></div>';
        l_Html_Promo += '<div class="col-md-9 col-sm-9"><label>'+l_Obj_Promo.Fec_Fin+'</label></div>';
        l_Html_Promo += '</div>';

        $.each(l_Obj_Promo.List_Detalle, function (i, item) {

            l_Html_Promo += '<div class="row">';
            l_Html_Promo += '<div class="col-md-1 col-sm-1"><i class="fa fa-check-circle fa-lg" aria-hidden="true" style="color: blue;"></i></div>';
            l_Html_Promo += '<div class="col-md-11 col-sm-11"><label>';
            l_Html_Promo +=  item.Des_Detalle;
            l_Html_Promo += '</label></div>';
            l_Html_Promo += '</div>';

        });

        var l_FormArray = [[[l_Html_Promo, "html"]]];

        Ejecutar_Modal_Generico_boton("form-promo",l_FormArray,"<b>DATOS DE PROMOCIÓN</b>","mediun","Aplicar","Cancelar",Set_Promocion,l_Obj_Promo);
    });

    $(document).on('change','.class-stock-variacion',function(e){

        Validar_Stock_Variacion_Producto();

    });

    $(document).on('click','.btn-stock-disponible',function(e){

        var l_Id = $(this).attr("Id");
        var l_Id_Producto = l_Id.split("_")[1];
        $("#lst-Id_Tienda").val(g_Id_Tienda);
        $("#producto_actual_modal").val(l_Id_Producto);

        Get_Stock_Disponible($("#lst-Id_Tienda").val(),l_Id_Producto);

        $("#modal-stock-disponible").modal('show');

    });

    $("#lst-Id_Tienda").change(function(e){
        Get_Stock_Disponible($("#lst-Id_Tienda").val(),$("#producto_actual_modal").val());
    });

    

    Cargar_Data_Inicial();
    Get_Producto_Carrito();

    CargarInfoTabla("dynamic-table_info",g_Num_RegistroIni,g_Num_RegistroFin,g_Num_TotalBus);
    Crear_Paginador_Tabla("div-paginador",g_Num_TotalBus,g_Num_Seccion,g_Num_Intervalo);

    CargarInfoTabla("dynamic-table_info_2",g_Num_RegistroIni,g_Num_RegistroFin,g_Num_TotalBus);
    Crear_Paginador_Tabla("div-paginador_2",g_Num_TotalBus,g_Num_Seccion,g_Num_Intervalo);

});
</script>