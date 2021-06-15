<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Login Page - Ace Admin</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/design/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/design/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/design/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/design/css/ace.min.css" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="<?php echo base_url();?>assets/design/css/ace-part2.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/design/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="<?php echo base_url();?>assets/design/css/ace-ie.min.css" />
		<![endif]-->
	</head>

    <input type="hidden" id="URL_BASE" name="URL_BASE" value="<?php echo base_url()?>">    
    
    <body class="login-layout" style="background-color:#ffffff;">
        <div class="main-container">
            <div class="main-content">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="login-container">

                            <div class="space-6"></div>

                            <div class="position">
                                <div id="signup" class="signup widget">
                                    <div class="wid">
                                        <div class="widget-main">
                                            <h4 class="header green lighter bigger">
                                                <i class="ace-icon fa fa-users blue"></i>
                                                Crear nueva contraseña
                                            </h4>

                                            <div class="space-6"></div>
                                            <p> Ingrese la información solicitada: </p>

                                            <form>
                                                <fieldset>

                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="password" id="txt-des_nuevo_password" class="form-control" placeholder="Nueva Contraseña" />
                                                            <i class="ace-icon fa fa-lock"></i>
                                                        </span>
                                                    </label>

                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="password" id="txt-des_nuevo_password_confirmado" class="form-control" placeholder="Repita Contraseña" />
                                                            <i class="ace-icon fa fa-retweet"></i>
                                                        </span>
                                                    </label>

                                                    <label class="block">
                                                        <input type="checkbox" class="ace" />
                                                        <span class="lbl">
                                                            Acepto el 
                                                            <a href="#">acuerdo de usuario</a>
                                                        </span>
                                                    </label>

                                                    <div class="space-24"></div>

                                                    <div class="clearfix">
                                                        <button type="reset" class="width-30 pull-left btn btn-sm">
                                                            <i class="ace-icon fa fa-refresh"></i>
                                                            <span class="bigger-110">Reset</span>
                                                        </button>

                                                        <button type="button" id="btn-resetear-password" class="width-65 pull-right btn btn-sm btn-success">
                                                            <span class="bigger-110">Confirmar operación</span>

                                                            <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                                                        </button>
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div>

                                        <div class="toolbar center">
                                            <a href="<?=base_url("public/Login")?>" data-target="#login-box" class="back-to-login-link">
                                                <i class="ace-icon fa fa-arrow-left"></i>
                                                Volver al Login
                                            </a>
                                        </div>
                                    </div><!-- /.widget-body -->
                                </div><!-- /.signup-box -->
                            </div><!-- /.position-relative -->
                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.main-content -->
        </div><!-- /.main-container -->  
    </body>


</html>


 <!-- ==================  JS COMPLEMENTOS ================== -->
 <script src="<?php echo base_url('assets/plugins/jquery/jquery-3.4.1.min.js');?>"></script>
  <!-- ================== END JS COMPLEMENTOS ================== -->

 <!-- ==================  JS FUNCIONES ================== -->
 <script src="<?php echo base_url('assets/js_sistema/backend.generico.js'); ?>"></script>
  <!-- ================== END JS FUNCIONES ================== -->


 <script>
$(document).ready(function() {

    var BASE_URL = $("#URL_BASE").val();

    function Cambiar_password()
    {
        var l_Request = { 
                Des_Nuevo_Password : $("#txt-des_nuevo_password").val(), 
                Des_Nuevo_Password_Confirmado : $("#txt-des_nuevo_password_confirmado").val()
            };

        $.ajax({
            type: "POST",
            url: BASE_URL + "public/login/Cambiar_password",
            data: JSON.stringify(l_Request),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: successFunc,
        });
        function successFunc(data, status) {

            if (!data.Error.flagerror) {
                window.location.href = data.Resultado.redireccion_url;
            }else{
                alert(data.Error.messages);
            }          
        }
    }

    $("#btn-resetear-password").click(function(e){
        Cambiar_password();
    })

});
</script>
