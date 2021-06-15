<?php
    // echo json_encode($v_Obj_Producto);
?>
<div class="col-xs-12">

    <input type="hidden" id="h_Id_Producto" value="<?=$v_Obj_Producto["Id_Producto"]?>">

    <div class="clearfix">
    </div>

    <div class="hr dotted"></div>

    <div>
        <div id="user-profile-1" class="user-profile row">
            <div class="col-xs-12 col-sm-3 center">
                <div>
                    <?php if($v_Obj_Producto["Flg_Producto_Img"]) { ?>
                        <span class="profile-picture">
                            <img id="avatar" class="editable img-responsive editable-click editable-empty" 
                            alt="Alex's Avatar" src="<?=base_url($v_Obj_Producto["ProductoImg"]["Des_ImgProducto_UrlPrin"])?>">
                        </span>
                    <?php }else{ ?>
                        <span class="profile-picture">
                            <img id="avatar" class="editable img-responsive editable-click editable-empty" 
                            alt="Alex's Avatar" src="<?=base_url("imgccadmin/sinimagen2.jpg")?>">
                        </span>
                    <?php } ?>
                    <div class="space-4"></div>

                </div>

            </div>

            <div class="col-xs-12 col-sm-9">

                <div class="profile-user-info profile-user-info-striped">
                    <div class="profile-info-row">
                        <div class="profile-info-name"><b> CODIGO </b></div>

                        <div class="profile-info-value">
                            <span><b><?=$v_Obj_Producto["Cod_Producto"]?></b></span>
                        </div>
                    </div>
                    <div class="profile-info-row">
                        <div class="profile-info-name"><b> PRODUCTO </b></div>

                        <div class="profile-info-value">
                            <span><b><?=$v_Obj_Producto["Des_Producto_Nom"]?></b></span>
                        </div>
                    </div>
                    <div class="profile-info-row">
                        <div class="profile-info-name"><b> MARCA </b></div>

                        <div class="profile-info-value">
                            <span><b><?=$v_Obj_Producto["Des_MarcaPro_Nom"]?></b></span>
                        </div>
                    </div>
                    <div class="profile-info-row">
                        <div class="profile-info-name"><b> CATEGORIA </b></div>

                        <div class="profile-info-value">
                            <span><b><?=$v_Obj_Producto["Des_CategPro_Nom"] ." >> ". $v_Obj_Producto["Des_CategPro_Nom_Pdr"]?></b></span>
                        </div>
                    </div>
                    <div class="profile-info-row">
                        <div class="profile-info-name"><b>DESCRIPCIÓN ADICIONAL </b></div>

                        <div class="profile-info-value">
                            <span><b><?=$v_Obj_Producto["Des_Producto_tx1"]?></b></span>
                        </div>
                    </div>
                    <div class="profile-info-row">
                        <div class="profile-info-name"><b> PRECIO </b></div>

                        <div class="profile-info-value">
                            <span><b><?=$v_Obj_Producto["Des_Producto_PrecioStand"]?></b></span>
                        </div>
                    </div>
                    <div class="profile-info-row">
                        <div class="profile-info-name"><b> STOCK DISPONIBLE </b></div>

                        <div class="profile-info-value">
                            <span><b><?=$v_Obj_Producto["Num_Producto_StockAct"]?></b></span>
                        </div>
                    </div>
                    <div class="profile-info-row">
                        <div class="profile-info-name"><b> DESCUENTO </b></div>

                        <div class="profile-info-value">
                            <div class="col-sm-12">
                                <?php if( $v_Obj_Producto["Flg_Producto_Desc"] ){ ?>
                                    <span class="label label-sm label-success" style="background: blue;">ACTIVO</span>
                                <?php }else{ ?>
                                    <span class="label label-sm label-success" style="background: red;">SIN DESCUENTO</span>
                                <?php } ?>   
                            </div>
                        </div>
                    </div>

                    <div class="profile-info-row">
                        <div class="profile-info-name"><b> PROMOCIÓN </b></div>

                        <div class="profile-info-value">
                            <?php if( !empty($v_List_Promocion) && count($v_List_Promocion)>0 ){ ?>
                                <div class="col-sm-12 profile-info-value">
                                    <span class="label label-sm label-success" style="background: blue;">ACTIVO</span>  
                                </div>
                                <?php foreach($v_List_Promocion as $Item){ ?>
                                    <div class="col-sm-12 profile-info-value">
                                        <span>
                                            <i class="fa fa-check-circle fa-lg" aria-hidden="true" style="color: blue;"></i>
                                            <b><?=$Item["Des_Promocion"]?></b>
                                        </span>
                                    </div>
                                <?php } ?>
                            <?php }else{ ?>
                                <div class="col-sm-12 profile-info-value">
                                    <span class="label label-sm label-success" style="background: red;">SIN PROMOCIÓN</span>  
                                </div>
                            <?php } ?>               
                        </div>
                    </div>
                </div>

                <div class="space-20"></div>

            </div>
        </div>
    </div>

    <div class="row">
  <div class="col-md-12">
		<div class="form-group">
			<div class="col-md-8 col-sm-8"></div>
			<div class="col-md-4 col-sm-4" style="text-align: right;">
                <a id="btn-atras" type="button" class="btn btn-warning">
                    <i class="ace-icon fa fa-share"></i> Volver
                </a>
				<a id="btn-agregar" type="button" class="btn btn-inverse">
                    <i class="ace-icon fa fa-plus"></i>Agregar
                </a>
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
 <script>
$(document).ready(function() {

    var BASE_URL = $("#URL_BASE").val();
    var g_Id_Producto = $("#h_Id_Producto").val();
    var g_Accion_Ejecutable = true;

    function Set_Producto_Carrito( p_Id_Producto=0,p_Cod_Accion="",p_Num_Descuento=0,p_Num_Cantidad = 0 )
    {
        if(!g_Accion_Ejecutable) return false;
        g_Accion_Ejecutable = false;

        var l_Request = { 
                Id_Producto : Number(p_Id_Producto), 
                Cod_Accion : p_Cod_Accion,
                Num_Descuento : Number(p_Num_Descuento),
                Num_Cantidad : Number(p_Num_Cantidad) 
            };

        var l_Response = SetActionJquery(l_Request,BASE_URL+"public/preventa/Set_Producto_Carrito");
        l_Response.success(function(data){
            if (!data.Error.flagerror) {
                if(data.Resultado == true)
                {
                    window.history.back();
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

    $("#btn-atras").click(function(e){
        window.history.back();
    });

    $("#btn-agregar").click(function(e){
        Set_Producto_Carrito(g_Id_Producto,"add");
    });
    

});
</script>