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
       	 	<h1>Lista de ventas</h1>
     </div>
		<div class="panel  panel-primary">
			<div class="panel-heading">Ventas</div>
			<div class="panel-body">
				<p>Estos son las ventas registrados en el sistema.</p>
			</div>

			<div class="table-responsive">
				<table class="table table-striped tablesorter " id="tablaG">
					<thead>
			          <tr>
			            <th>N° transacción</th>
			            <th>Vendedor</th>
			            <th>Fecha de transacción</th>
			            <th>Total</th>
			            <th>Detalle</th>
			            <?php 
		                    $deputy = $_SESSION['deputy'];
		                    $estado= ($deputy->allowed('Venta/delete'));
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
$_fh0_data = (isset($this->scope["ventas"]) ? $this->scope["ventas"] : null);
if ($this->isArray($_fh0_data, true) === true)
{
	foreach ($_fh0_data as $this->scope['row'])
	{
/* -- foreach start output */
?>
			        	<tr>
			        		<td><?php echo $this->scope["row"]["codigo_venta"];?></td>
				            <td><?php echo $this->scope["row"]["nombre_usuario"];?> <?php echo $this->scope["row"]["apellido_usuario"];?></td>
				            <td><?php echo date("d-m-Y", strtotime((isset($this->scope["row"]["fecha_venta"]) ? $this->scope["row"]["fecha_venta"]:null)));?></td>
				            <td>$<?php echo number_format(intval((isset($this->scope["row"]["total_venta"]) ? $this->scope["row"]["total_venta"]:null)));?></td>
				            <td><button class="btn btn btn-info popup" data-toggle="modal" data-target="#detalleVenta"  key='<?php echo $this->scope["row"]["codigo_venta"];?>'>Ver detalle</button></td>
				             <?php 
				             $deputy = $_SESSION['deputy'];
		                    $estado= ($deputy->allowed('Venta/delete'));
		                    if($estado){
		                   ?> 
				            <td><button type="submit" class="btn btn-danger eliminar" key="<?php echo $this->scope["row"]["codigo_venta"];?>"  data-target="#popupEliminarVenta">Eliminar</button></td>
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
		        			Sin ventas
		        		</tr>	
		        	<?php 
}?>       
			        </tbody>
				</table>
			</div>
			<!-- <ul class="pagination">
			    <li class="disabled"><a href="#">&laquo;</a></li>
			    <li class="active"><a href="#">1</a></li>
			    <li><a href="#">2</a></li>
			    <li><a href="#">3</a></li>
			    <li><a href="#">4</a></li>
			    <li><a href="#">5</a></li>
			    <li><a href="#">&raquo;</a></li>
			</ul> -->
		</div>
		
	</div>
	<?php echo Dwoo_Plugin_include($this, '../footer.html', null, null, null, '_root', null);?>

	<!-- popup producto -->
	<div class="modal fade" id="detalleVenta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
		<div class="modal-dialog"> 
			<div class="modal-content"> 
				<div class="modal-header"> 
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span>
					</button> 
					<h4 class="modal-title">Detalles de la venta</h4> 
				</div> 
				<div  class="modal-body"> 
					<div class="table-responsive">
						<table class="table table-striped" id="table">
							<thead>
					          <tr>
					            <th>Codigo producto</th>
					            <th>Nombre producto</th>
					            <th>Tipo producto</th>
					            <th>Cantidad</th>
					            <th>Sub-Total</th>
					          </tr>
					        </thead>
					        <tbody>
					        	
					        </tbody>
						</table>
					</div>
				</div> 
			</div> 
		</div>
	</div>
	<div class="modal fade" id="popupEliminarVenta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
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
			<button type="button" class="btn btn-info" data-dismiss="modal">Seguir viendo las ventas</button> 
				 <a href="http://localhost/framework/index.php/Venta/" role="button" class="btn btn-success">Actualizar la pagina</a>
				</div>
			</div> 
			
		</div>
	</div>		
	<script type="text/javascript">
		$(function() {
			
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
			$(".popup").click(function(event) {
				event.preventDefault();
				 $("#table").find("tr:gt(0)").remove();
				$.post("http://localhost/framework/index.php/Venta/detalle",
					{
						codigo_venta : $(this).attr('key')
					},
					function(data) {
						var types = JSON.parse(data);
					for (var i = 0; i < types.length; i++) {
								 var fila = "<tr>";	 
								  fila = fila+"<td>"+types[i].codigo_producto+"</td>";
								  fila = fila+"<td>"+types[i].nombre_producto+"</td>";
								  fila = fila+"<td>"+types[i].nombre_tipo+"</td>";
								  fila = fila+"<td>"+types[i].cantidad+"</td>";
								  fila = fila+"<td>$"+$.number(types[i].total)+"</td>";
								  fila = fila+"</tr>";
								  $('#table tr:last').after(fila);
							};		
					 
					});
			});

			$(".eliminar").click(function(event) {
			event.preventDefault();
			fila= $(this).parent().parent();
			$.post("http://localhost/framework/index.php/Venta/delete",
			{
				id : $(this).attr('key')
			}
			,function(data) {
				if(data=="ok"){
					$("#estado").text("La venta fue eliminado con exito.");
					fila.remove();
					$('#popupEliminarVenta').modal('show');
				}
				else{
					$("#estado").text("La venta no pudo ser eliminado intente mas tarde");
					$('#popupEliminarVenta').modal('show');
				}
			});
		});


		});
	</script>
</body>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>