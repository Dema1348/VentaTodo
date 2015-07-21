<?php
/* template head */
if (function_exists('Dwoo_Plugin_include')===false)
	$this->getLoader()->loadPlugin('include');
/* end template head */ ob_start(); /* template body */ ;
echo Dwoo_Plugin_include($this, '../cabecera.html', null, null, null, '_root', null);?>

<body >
	<?php echo Dwoo_Plugin_include($this, '../menu.html', null, null, null, '_root', null);?>

	<div class="container">
	<div class="page-header">
       	 	<h1>Editar usuario</h1>
     </div>
		<form role="form" method="post" action="http://localhost/framework/index.php/Usuario/update" id="form" >
			<div class="form-group">
				<label for="rut">Rut</label>
				<div class="input-group ancho ">
				<input type="text" class="form-control has-feedback" id="rut" 
				placeholder="Introduzca el rut del usuario" value="<?php echo $this->scope["datos"]["0"]["id_usuario"];?>" disabled>
				</div>
			</div>
			<div class="form-group ">
				<label for="usuario">Usuario</label>
				<div class="input-group ancho ">
				
				<input type="text" class="form-control  has-feedback" id="usuario"
				placeholder="Introduzca el nombre del usuario" required   value="<?php echo $this->scope["datos"]["0"]["login_usuario"];?>" disabled>
				</div>
			</div>
			
			<div class="form-group ">
				<label for="password">Nueva Contraseña</label>
				<div class="input-group ancho ">
				
				<input type="text" class="form-control  has-feedback" id="password"
				placeholder="Introduzca la nueva constraseña del usuario" required  >
				</div>
			</div>
			<button type="submit" class="btn btn-primary" id="editar"  data-target="#popupActualizarUsuario">Editar</button>
		</form>
		
	</div>
	<?php echo Dwoo_Plugin_include($this, '../footer.html', null, null, null, '_root', null);?>

	<!-- popup usuario -->
	<div class="modal fade" id="popupActualizarUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
		<div class="modal-dialog"> 
			<div class="modal-content"> 
				<div class="modal-header"> 
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span>
					</button> 
					<h4 class="modal-title">Actualización completada</h4> 
				</div> 
				<div  class="modal-body"> 
					<div class='panel panel-default'>   
						<div class='panel-body mensaje'>   
							
						</div>   
					</div>   
				</div> 
				<div class="modal-footer">
				 <button type="button" class="btn btn-info" data-dismiss="modal">Cambiar contraseña nuevamente</button> 
				 <a href="http://localhost/framework/index.php/usuario/" role="button" class="btn btn-success">Volver a listar los usuarios</a>
				</div>
			</div> 
			
		</div>
	</div>	

	<script>
		$(function() {
		
			
			$("#editar").click(function (event) {

				event.preventDefault();
				alert("dsa");
				$('#rut').parent().removeClass("has-error"); 
				$('#usuario').parent().removeClass("has-error"); 
				$('#password').parent().removeClass("has-error");  
;  
				$(".form-control-feedback").remove();
				$(".alert-danger").remove();

				if($('#rut').val() == ""){
					$('#rut').focus().after("<div class='alert alert-danger'>Ingrese el campo solicitado</div><span class='glyphicon glyphicon-remove form-control-feedback'></span>");
                	$('#rut').parent().addClass("has-error"); 
					return;
				}


				else if($('#usuario').val() == ""){
					$('#usuario').focus().after("<div class='alert alert-danger'>Ingrese el campo solicitado</div><span class='glyphicon glyphicon-remove form-control-feedback'></span>");
                	$('#usuario').parent().addClass("has-error"); 
					return;
				}

				else if($('#password').val() == ""){
					$('#password').focus().after("<div class='alert alert-danger'>Ingrese el campo solicitado</div><span class='glyphicon glyphicon-remove form-control-feedback'></span>");
                	$('#password').parent().addClass("has-error"); 
					return;
				}

				

				$.post("http://localhost/framework/index.php/Usuario/updateC",
					{
						id : $('#rut').val(),
						usuario : $('#usuario').val(),
						password : $('#password').val()
						

					}, function(data) {
					   
						if(data == "err"){
							$(".mensaje").html
								("<p>La actualización de constraseña ha fallado.</p>");
								$('#popupActualizarUsuario').modal('show');
						}


						else {
							$(".mensaje").html
								(" <p>La actualización de constraseña ha sido exitosa.</p>");
								$('#popupActualizarUsuario').modal('show');
							
						}

						
					});
			});

		});
	</script>
</body>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>