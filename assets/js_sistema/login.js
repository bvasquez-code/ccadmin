$(document).ready(function() {
    
    var BASE_URL = $("#URL_BASE").val();

    function Autentificar(p_Email="",p_Password="") 
    {

        var l_Request = {
            usuario: p_Email,
            password: p_Password
        }
        $.ajax({
            type: "POST",
            url: BASE_URL + "public/login/Autentificar",
            data: JSON.stringify(l_Request),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: successFunc,
        });
        function successFunc(data, status) {

            if (!data.Error.flagerror) {
                window.location.href = data.Resultado.redireccion_url;
            }else{
                if(data.Resultado.hasOwnProperty('redireccion_url'))
                {
                    window.location.href = data.Resultado.redireccion_url;
                }
            }          
        }
    }

    function CerrarSession()
    {
        $.ajax({
            type: "POST",
            url: BASE_URL + "public/login/CerrarSession",
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: successFunc,
        });
        function successFunc(data, status) {
            window.location.href = BASE_URL+"public/Login";       
        }
    }

    function Recuperar_Cuenta()
    {
        var l_Html = "";
        var l_Request = {
             Des_Usuario : $("#txt-Usuario_Recuperacion").val()
            ,Des_Email : $("#txt-Des_Email").val()
        }
        $.ajax({
            type: "POST",
            url: BASE_URL + "public/login/Recuperar_Cuenta",
            data: JSON.stringify(l_Request),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: successFunc,
        });
        function successFunc(data, status) {

            if (!data.Error.flagerror) 
            {
                l_Html += '<br>';
                l_Html += '<div class="col-xs-12 alert alert-danger">';
                l_Html += '    <button type="button" class="close" data-dismiss="alert">';
                l_Html += '    </button>';
                l_Html += '    <strong>';
                l_Html += '        <i class="ace-icon fa fa-exclamation-circle"></i>';
                l_Html += '        ¡INFO!';
                l_Html += '    </strong>';
                l_Html += '    <br>';
                l_Html += '    <span>VERIFIQUE LA BANDEJA DE SU CORREO, SI NO LO ENCUENTRE BUSQUE EN CORREO NO DESEADO</span>';
                l_Html += '    <br>';
                l_Html += '</div>';
                l_Html += '<br><br></br>';

                $("#div-mensaje").html(l_Html);
            }
            else{
                alert(data.Error.messages);
            }          
        }
    }

    $("#btn-login").click(function(e){
        Autentificar($("#email").val(),$("#password").val());
    });

    $("#cerrar-session").click(function(e){
        CerrarSession();
    });

    $("#btn-enviar-recuperacion").click(function(e){
        Recuperar_Cuenta();
    });
    

});