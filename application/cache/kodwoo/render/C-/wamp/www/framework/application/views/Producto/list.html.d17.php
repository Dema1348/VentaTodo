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
       	 	<h1>Productos</h1>
     </div>
		<div class="panel  panel-primary">
			<div class="panel-heading">Productos registrados en el sistema</div>
			<div class="table-responsive">
			<table class="table table-striped tablesorter" id="tablaG">
				<thead>
		          <tr>
		            <th>Id producto</th>
		            <th>Nombre producto</th>
		            <th>Tipo</th>
		            <th>Precio</th>
		            <?php 
                    $deputy = $_SESSION['deputy'];
                    $estado= ($deputy->allowed('Producto/edit'));
                    if($estado){
                   ?> 
                   <th>Editar</th>
					<?php
                    }
                   ?> 
		            
		            <?php 
                    $deputy = $_SESSION['deputy'];
                    $estado= ($deputy->allowed('Producto/delete'));
                    if($estado){
                   ?> 
					<th>Eliminar</th>
					<?php
                    }
                    ?> 
		          </tr>
		        </thead>
		        <tbody>
		        	
		        	<?php 
$_fh0_data = (isset($this->scope["datos"]) ? $this->scope["datos"] : null);
if ($this->isArray($_fh0_data, true) === true)
{
	foreach ($_fh0_data as $this->scope['row'])
	{
/* -- foreach start output */
?>
		        		<tr>
				            <td><?php echo $this->scope["row"]['codigo_producto'];?></td>
				            <td><?php echo $this->scope["row"]['nombre_producto'];?></td>
				            <td><?php echo $this->scope["row"]['nombre_tipo'];?></td>	
				            <td>$<?php echo number_format(intval((isset($this->scope["row"]['precio_producto']) ? $this->scope["row"]['precio_producto']:null)));?></td>
				             <?php 
		                    $deputy = $_SESSION['deputy'];
		                    $estado= ($deputy->allowed('Producto/edit'));
		                    if($estado){
		                   ?> 		            
							<td><a role="button" type="button" class="btn btn-success" key="<?php echo $this->scope["row"]['codigo_producto'];?>" href='http://localhost/framework/index.php/Producto/edit?id=<?php echo $this->scope["row"]['codigo_producto'];?>' >Editar</a></td>
							<?php
		                    }
		                   ?> 
							 <?php 
		                    $deputy = $_SESSION['deputy'];
		                    $estado= ($deputy->allowed('Producto/delete'));
		                    if($estado){
		                   ?> 
							<td><button type="submit" class="btn btn-danger eliminar" key="<?php echo $this->scope["row"]['codigo_producto'];?>"  data-target="#popupEliminarProducto">Eliminar</button></td>
							<?php
		                    }
		                    ?> 
		        		</tr>
		        	<?php 
/* -- foreach end output */
	}
}
else {
?>
		        		<tr>
		        			Sin productos
		        		</tr>	
		        	<?php 
}?>

		        </tbody>
			</table>
			</div>
		</div>
	
	</div>
	<?php echo Dwoo_Plugin_include($this, '../footer.html', null, null, null, '_root', null);?>

	<!-- popup producto -->
	<div class="modal fade" id="popupEliminarProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
		<div class="modal-dialog"> 
			<div class="modal-content"> 
				<div class="modal-header"> 
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span>
					</button> 
					<h4 class="modal-title">Estado de eliminacion</h4> 
				</div> 
				<div  class="modal-body"> 
					<h3 id="estado"></h3> 
				</div> 
				<div class="modal-footer">
			<button type="button" class="btn btn-info" data-dismiss="modal">Seguir viendo los producto</button> 
				 <a href="http://localhost/framework/index.php/Producto/" role="button" class="btn btn-success">Actualizar la pagina</a>
				</div>
			</div> 
			
		</div>
	</div>	
	<script type="text/javascript">
		$("#tablaG").tablesorter({ 
        
        	headers: { 
           
            4: { 
                sorter: false 
            }, 
            5: { 
                sorter: false 
            }
        } 
   	 });

		$(".eliminar").click(function(event) {
			event.preventDefault();
			fila= $(this).parent().parent();
			$.post("http://localhost/framework/index.php/Producto/delete",
			{
				id : $(this).attr('key')
			}
			,function(data) {
				if(data=="ok"){
					$("#estado").text("El producto fue eliminado con exito.");
					fila.remove();
					$('#popupEliminarProducto').modal('show');
				}
				else{
					$("#estado").text("El producto no pudo ser eliminado puesto que tiene detalles de ventas asociados a él");
					$('#popupEliminarProducto').modal('show');
				}
			});
		});
	</script>
</body>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>