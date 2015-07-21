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
       	 	<h1>Crear Nuevo Tipo de Categoria</h1>
     </div>
		<form role="form" method="post" action="http://localhost/framework/index.php/Categoria/new" id="form" >
		
			<div class="form-group">
				<label for="nombre_tipo">Nombre tipo producto</label>
				<div class="input-group ancho ">
				<input type="text" class="form-control has-feedback" id="nombre_tipo" 
				placeholder="Introduzca el nombre del producto" >
				</div>
			</div>
			
			
			<button type="submit" class="btn btn-primary" id="crear"  data-target="#popupCrearCategoria">Crear</button>
		</form>
		
	</div>
	<?php echo Dwoo_Plugin_include($this, '../footer.html', null, null, null, '_root', null);?>

	<!-- popup producto -->
	<div class="modal fade" id="popupCrearCategoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
		<div class="modal-dialog"> 
			<div class="modal-content"> 
				<div class="modal-header"> 
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span>
					</button> 
					<h4 class="modal-title">Creacion completada</h4> 
				</div> 
				<div  class="modal-body"> 
					<div class='panel panel-default'>   
						<div class='panel-body mensaje'>   
							
						</div>   
					</div>   
				</div> 
				<div class="modal-footer">
				 <button type="button" class="btn btn-info" data-dismiss="modal" >Seguir creado tipos de productos</button> 
				 <a href="http://localhost/framework/index.php/Categoria/" role="button" class="btn btn-success">Volver a listar las categorias</a>
				</div>
			</div> 
			
		</div>
	</div>	

	<script>
		$(function() {
			$('#popupCrearCategoria').on('hidden.bs.modal', function (e) {
			  $("#form").get(0).reset();
			})

			$("#crear").click(function (event) {

				event.preventDefault();
				
				$('#nombre_tipo').parent().removeClass("has-error"); 
			
				$(".form-control-feedback").remove();
				$(".alert-danger").remove();

				 if($('#nombre_tipo').val() == ""){
					$('#nombre_tipo').focus().after("<div class='alert alert-danger'>Ingrese el campo solicitado</div><span class='glyphicon glyphicon-remove form-control-feedback'></span>");
                	$('#nombre_tipo').parent().addClass("has-error"); 
					return;
				}

				

			
				

				$.post("http://localhost/framework/index.php/Categoria/new",
					{
						nombre : $('#nombre_tipo').val()
						
					}, function(data) {
						if(data == "ok"){
							$(".mensaje").html
								(" <p>Categoria:<strong> "+ $('#nombre_tipo').val()+"</strong><p>");
								$('#popupCrearCategoria').modal('show');
						}

						else {
							$(".mensaje").html("<p>La creación ha fallado.</p>");
								$('#popupCrearCategoria').modal('show');
							
							
						}

						
					});
			});

		});
	</script>
</body>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>