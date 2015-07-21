<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><div id="login">
<h1><i class="fa fa-lock"></i> Entrar</h1>
<h3>Por favor <strong> Inicie sesión </strong> o <strong>Registrese</strong></h3>
<form action="http://localhost/framework/index.php/Session/login" id="Loginform" method="post" class="form-horizontal">

    <div class="form-group">
        <div class="col-xs-12">
            <div class="input-group ">
                <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                <input type="text" class="form-control input-lg " placeholder="Usuario" autocomplete="off" id="usuario">

            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-12">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                <input type="password" class="form-control input-lg" placeholder="Password" autocomplete="off" id="password">
            </div>
        </div>
    </div>
    <div class="form-group Submit Registro">
        <div class="col-xs-6 submitWrap">
            <button type="submit" class="btn btn-primary btn-lg" id="entrar">Iniciar sessión</button>
        </div>
        <div class="col-xs-6">
            <p class="text-center">¿No tienes una cuenta? <span>¡Registrate ahora!</span></p>
        </div>
    </div>
</form>
<form action="http://localhost/framework/index.php/Usuario/new" id="RegistroForm" method="post" class="form-horizontal" style="display: block;">
           <div class="form-group">
            <div class="col-xs-12">
                <div class="input-group ">
                    <span class="input-group-addon"><i class="fa fa-shield fa-fw"></i></span>
                    <input type="text" class="form-control input-lg has-feedback" placeholder="Rut" autocomplete="off" id="newRut">

                </div>
            </div>
        </div>

            <div class="form-group">
                <div class="col-xs-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                        <input type="text" class="form-control input-lg  has-feedback" placeholder="Usuario" autocomplete="off" id="newUsuario">
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                        <input type="password" class="form-control input-lg  has-feedback" placeholder="Password" autocomplete="off" id="newPassword">
                    </div>
                </div>
            </div>
             <div class="form-group">
                <div class="col-xs-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-cog fa-fw"></i></span>
                        <input type="text" class="form-control input-lg has-feedback" placeholder="Nombre" autocomplete="off" id="newNombre">
                    </div>
                </div>
            </div>
             <div class="form-group">
                <div class="col-xs-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-cog fa-fw"></i></span>
                        <input type="text" class="form-control input-lg has-feedback" placeholder="Apellido" autocomplete="off" id="newApellido">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
                        <input type="text" class="form-control input-lg has-feedback" placeholder="Email" autocomplete="off" id="newEmail">
                    </div>
                </div>
            </div>
             <div class="form-group">
                <div class="col-xs-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-star fa-fw"></i></span>
                          <select class="form-control input-lg has-feedback" id="newTipo">
                            <option value="1">Administrador</option>
                            <option value="2">Consulta</option>
                            <option value="3">Vendedor</option>

                          </select>
                        
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar-o  fa-fw"></i></span>
                        <input type="text" class="form-control input-lg has-feedback" placeholder="Fecha nacimiento" autocomplete="off" id="newfecha">
                    </div>
                </div>
            </div>
            <div class="form-group Submit login">
                <div class="col-xs-6 submitWrap">
                    <button type="submit" class="btn btn-success btn-lg" id="registro">Registrarse</button>
                </div>
                <div class="col-xs-6">
                    <p class="text-center">¿Ya tienes una cuenta? <span >Inicia sesión aqui</span></p>
                </div>
            </div>
            
        </form>
        <div id="mensaje">
            <div class='alert alert-danger'></div>
        </div> 
        <div id="mensaje2">
            <div class='alert '></div>
        </div> 
</div>


<script type="text/javascript">
    $(function() {

        $("#newfecha").datepicker();
        $("#RegistroForm").toggle();
        $("#mensaje").hide();
        $("#mensaje2").hide();

        $('.text-center span').click(function() {
        $("#Loginform").toggle("swing");
        $("#RegistroForm").toggle("swing");
        $("#mensaje").hide();
        $("#mensaje2").hide();

        });


        $('#entrar').click(function(event) {
           
            event.preventDefault();
            $('#usuario').parent().removeClass("has-error");
            $('#password').parent().removeClass("has-error");
            $(".form-control-feedback").remove();
           
            if($('#usuario').val() == ""){
                $('#usuario').focus().after("<span class='glyphicon glyphicon-remove form-control-feedback'></span>");
                $('#usuario').parent().addClass("has-error");

                    return;

                }
            else if($('#password').val() == ""){
                 $('#password').focus().after("<span class='glyphicon glyphicon-remove form-control-feedback'></span>");
                $('#password').parent().addClass("has-error");

                    return;

                }


            $.post("http://localhost/framework/index.php/Session/login",
                {
                    usuario : $('#usuario').val(),
                    password: $('#password').val()
                })
                .done(function(data) {
                    if(data =="ok"){
                         $(location).attr('href',"http://localhost/framework/index.php/Session/home"); 
                    }
                    else if(data =="err"){
                       $('#mensaje .alert').html("El usuario o la contraseña no es válida. Por favor, asegúrate de que el bloqueo de mayúsculas no está activado e inténtalo de nuevo."); 
                       $('#mensaje').delay(250).fadeIn("slow");

                    }
                });
            
        });

         $('#registro').click(function(event) {
           
            event.preventDefault();

            $('#newUsuario').parent().removeClass("has-error");
            $('#newPassword').parent().removeClass("has-error");
            $('#newNombre').parent().removeClass("has-error");    
            $('#newApellido').parent().removeClass("has-error");    
            $('#newEmail').parent().removeClass("has-error");    
            $('#newfecha').parent().removeClass("has-error");    
            $('#newRut').parent().removeClass("has-error");    
            $(".form-control-feedback").remove();
           
           if( $('#newRut').val() == ""){
                $('#newRut').focus().after("<span class='glyphicon glyphicon-remove form-control-feedback'></span>");
                $('#newRut').parent().addClass("has-error");

                    return;

                }

            else if( $('#newUsuario').val() == ""){
                $('#newUsuario').focus().after("<span class='glyphicon glyphicon-remove form-control-feedback'></span>");
                $('#newUsuario').parent().addClass("has-error");

                    return;

                }
            else if($('#newPassword').val() == ""){
                 $('#newPassword').focus().after("<span class='glyphicon glyphicon-remove form-control-feedback'></span>");
                $('#newPassword').parent().addClass("has-error");

                    return;

                }
            else if($('#newNombre').val() == ""){
                 $('#newNombre').focus().after("<span class='glyphicon glyphicon-remove form-control-feedback'></span>");
                $('#newNombre').parent().addClass("has-error");

                    return;

                }
            else if($('#newApellido').val() == ""){
                 $('#newApellido').focus().after("<span class='glyphicon glyphicon-remove form-control-feedback'></span>");
                $('#newApellido').parent().addClass("has-error");

                    return;

                }
            else if($('#newEmail').val() == ""){
                 $('#newEmail').focus().after("<span class='glyphicon glyphicon-remove form-control-feedback'></span>");
                $('#newEmail').parent().addClass("has-error");

                    return;

                }
            else if($('#newfecha').val() == ""){
                 $('#newfecha').focus().after("<span class='glyphicon glyphicon-remove form-control-feedback'></span>");
                $('#newfecha').parent().addClass("has-error");

                    return;

                }   

            $.post("http://localhost/framework/index.php/Usuario/new",
                {
                   newRut : $('#newRut').val(),
                   newUsuario : $('#newUsuario').val(),
                   newPassword: $('#newPassword').val(),
                   newNombre : $('#newNombre').val(),
                   newApellido : $('#newApellido').val(),
                   newEmail: $('#newEmail').val(),
                   newfecha:  $('#newfecha').val(),
                   newTipo: $("select#newTipo").val()
                   
                })
                .done(function(data) {
                    if(data =="ok"){
                        $('#mensaje2 .alert').removeClass("alert-danger");
                        $('#mensaje2 .alert').addClass("alert-success");
                        $('#mensaje2 .alert').html("El registro se ha completado con exito.");
                        $('#mensaje2').delay(250).fadeIn("slow");
                        $('#RegistroForm')[0].reset();
                        
                    }
                     else if(data =="err1"){
                        $('#mensaje2 .alert').removeClass("alert-success");
                        $('#mensaje2 .alert').addClass("alert-danger");
                        $('#mensaje2 .alert').html("El rut del  usuario ya se encuentra registrado en el sistema.");
                        $('#mensaje2').delay(250).fadeIn("slow");

                    }

                    else if(data =="err2"){
                        $('#mensaje2 .alert').removeClass("alert-success");
                        $('#mensaje2 .alert').addClass("alert-danger");
                        $('#mensaje2 .alert').html("El username del usuario ya se encuentra registrado en el sistema.");
                        $('#mensaje2').delay(250).fadeIn("slow");

                    }
                });     
            
        });

       
                    
                
            


    });

</script>

<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>