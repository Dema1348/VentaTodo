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
       	 	<h1>Crear Nuevo Producto</h1>
     </div>
		<form role="form" method="post" action="http://localhost/framework/index.php/Producto/new" id="form" >
			
			<div class="form-group">
				<label for="Nombre_producto">Nombre producto</label>
				<div class="input-group ancho ">
				<input type="text" class="form-control has-feedback" id="nombre_producto" 
				placeholder="Introduzca el nombre del producto" >
				</div>
			</div>
			<div class="form-group ">
				<label for="precio">Precio</label>
				<div class="input-group ancho ">
				
				<input type="text" class="form-control  has-feedback" id="precio"
				placeholder="Introduzca el precio del producto" required >
				</div>
			</div>
			<div class="form-group">
				<label for="tipo">Tipo</label>
				<div class="input-group ancho ">		
				<select class="form-control has-feedback" id="tipo">
				<?php 
$_fh0_data = (isset($this->scope["tipos"]) ? $this->scope["tipos"] : null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['row'])
	{
/* -- foreach start output */
?>
				<option value="<?php echo $this->scope["row"]['codigo_tipo'];?>"><?php echo $this->scope["row"]['nombre_tipo'];?></option>
				<?php 
/* -- foreach end output */
	}
}?>

				</select>
				</div>
			</div>	
			<button type="submit" class="btn btn-primary" id="crear"  data-target="#popupCrearProducto">Crear</button>
		</form>
		
	</div>
	<?php echo Dwoo_Plugin_include($this, '../footer.html', null, null, null, '_root', null);?>

	<!-- popup producto -->
	<div class="modal fade" id="popupCrearProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
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
				 <button type="button" class="btn btn-info" data-dismiss="modal" >Seguir creado productos</button> 
				 <a href="http://localhost/framework/index.php/Producto/" role="button" class="btn btn-success">Volver a listar los productos</a>
				</div>
			</div> 
			
		</div>
	</div>	

	<script>
		$(function() {
			$('#popupCrearProducto').on('hidden.bs.modal', function (e) {
			  $("#form").get(0).reset();
			})

			$("#crear").click(function (event) {

				event.preventDefault();
				
				$('#nombre_producto').parent().removeClass("has-error"); 
				$('#precio').parent().removeClass("has-error");  
				$('#tipo').parent().removeClass("has-error");  
				$(".form-control-feedback").remove();
				$(".alert-danger").remove();

				 if($('#nombre_producto').val() == ""){
					$('#nombre_producto').focus().after("<div class='alert alert-danger'>Ingrese el campo solicitado</div><span class='glyphicon glyphicon-remove form-control-feedback'></span>");
                	$('#nombre_producto').parent().addClass("has-error"); 
					return;
				}

				else if($('#precio').val() == ""){
					$('#precio').focus().after("<div class='alert alert-danger'>Ingrese el campo solicitado</div><span class='glyphicon glyphicon-remove form-control-feedback'></span>");
                	$('#precio').parent().addClass("has-error"); 
					return;
				}

				else if($('#tipo').val() == ""){
					$('#tipo').focus().after("<div class='alert alert-danger'>Ingrese el campo solicitado</div><span class='glyphicon glyphicon-remove form-control-feedback'></span>");
                	$('#tipo').parent().addClass("has-error"); 
					return;
				}
				else if(!$.isNumeric($("#precio").val())){
					$('#precio').focus().after("<div class='alert alert-danger'>Ingrese un numero valido</div><span class='glyphicon glyphicon-remove form-control-feedback'></span>");
                	$('#precio').parent().addClass("has-error");     
					return;
				}

			
				

				$.post("http://localhost/framework/index.php/Producto/new",
					{
						nombre : $('#nombre_producto').val(),
						precio : $('#precio').val(),
						tipo: $('select#tipo option:selected').val()

					}, function(data) {
						if(data == "ok"){
							$(".mensaje").html
								(" \
									<p>Nombre:<strong> "+$('#nombre_producto').val()+"</strong><p> \
									<p>Precio:<strong> "+ $.number($('#precio').val())+"</strong><p> \
									<p>Tipo:<strong> "+$('#tipo').val()+"</strong></p>\
								");
								$('#popupCrearProducto').modal('show');
						}

						else {
							$(".mensaje").html("<p>La creación ha fallado.</p>");
								$('#popupCrearProducto').modal('show');
							
							
						}

						
					});
			});

		});
	</script>
</body>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>