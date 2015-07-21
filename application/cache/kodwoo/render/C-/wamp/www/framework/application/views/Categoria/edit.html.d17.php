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
       	 	<h1>Editar Categoria</h1>
     </div>
		<form role="form" method="post" action="http://localhost/framework/index.php/Categoria/update" id="form" >
			<div class="form-group">
					<label for="codigo_tipo">Codigo tipo</label>
					<div class="input-group ancho" >
					<input  class="form-control has-feedback" id="codigo_tipo"
					placeholder="Introduzca el codigo del tipo de producto" value='<?php echo $this->scope["datos"]["0"]["codigo_tipo"];?>' disabled>
					</div>
			</div>

			<div class="form-group">
				<label for="Nombre_producto">Tipo producto</label>
				<div class="input-group ancho ">
				<input type="text" class="form-control has-feedback" id="nombre_tipo" 
				placeholder="Introduzca el nombre de la categoria" value="<?php echo $this->scope["datos"]["0"]["nombre_tipo"];?>">
				</div>
			</div>
			
			<button type="submit" class="btn btn-primary" id="editar"  data-target="#popupActualizarCategoria">Editar</button>
		</form>
		
	</div>
	<?php echo Dwoo_Plugin_include($this, '../footer.html', null, null, null, '_root', null);?>

	<!-- popup producto -->
	<div class="modal fade" id="popupActualizarCategoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
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
				 <button type="button" class="btn btn-info" data-dismiss="modal">Seguir editando la categoria </button> 
				 <a href="http://localhost/framework/index.php/Categoria/" role="button" class="btn btn-success">Volver a listar los categorias</a>
				</div>
			</div> 
			
		</div>
	</div>	

	<script>
		$(function() {
			
			
			$("#editar").click(function (event) {

				event.preventDefault();
				
				$('#codigo_tipo').parent().removeClass("has-error"); 
				$('#nombre_tipo').parent().removeClass("has-error"); 
				$(".form-control-feedback").remove();
				$(".alert-danger").remove();

				if($('#codigo_producto').val() == ""){
					$('#codigo_producto').focus().after("<div class='alert alert-danger'>Ingrese el campo solicitado</div><span class='glyphicon glyphicon-remove form-control-feedback'></span>");
                	$('#codigo_producto').parent().addClass("has-error"); 
					return;
				}


				else if($('#nombre_tipo').val() == ""){
					$('#nombre_tipo').focus().after("<div class='alert alert-danger'>Ingrese el campo solicitado</div><span class='glyphicon glyphicon-remove form-control-feedback'></span>");
                	$('#nombre_tipo').parent().addClass("has-error"); 
					return;
				}

				
			
				

				$.post("http://localhost/framework/index.php/Categoria/update",
					{
						codigo : $('#codigo_tipo').val(),
						nombre : $('#nombre_tipo').val()
						

					}, function(data) {
					   var types = JSON.parse(data);
						if(data == "err"){
							$(".mensaje").html
								("<p>La actualización ha fallado.</p>");
								$('#popupActualizarCategoria').modal('show');
						}

						else {

							$(".mensaje").html
								(" \
									<p>Codigo: <strong> "+types[0].codigo_tipo+"</strong><p> \
									<p>Nombre:<strong> "+types[0].nombre_tipo+"</strong><p> \
								");
								$('#popupActualizarCategoria').modal('show');
							
						}

						
					});
			});

		});
	</script>
</body>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>