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
       	 	<h1>Ingreso de ventas</h1>
     </div>
     <form role="form" method="post" action="http://localhost/framework/index.php/Producto/New" id="form">
			<div class="form-group">
				<label for="vendedor">Vendedor</label>
				<select id="vendedor" class="form-control">
					<?php 
$_fh0_data = (isset($this->scope["vendedores"]) ? $this->scope["vendedores"] : null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['row'])
	{
/* -- foreach start output */
?>
					<option value="<?php echo $this->scope["row"]['id_usuario'];?>"><?php echo $this->scope["row"]['nombre_usuario'];?> <?php echo $this->scope["row"]['apellido_usuario'];?></option>
					<?php 
/* -- foreach end output */
	}
}?>

				</select>
			</div>
			
			
			<div class="form-group">
				<label for="fecha">Fecha venta</label>
				<input type="text" class="form-control" id="fecha"
				placeholder="Introduzca la fecha de venta" >
			</div>
			<div class="form-group">
				<label for="detalle">Detalle de venta </label>
				
			</div>
			<div class="form-group">
				
				<div class="table-responsive">
				<table class="table table-striped " id="table">
				<thead>
		          <tr>
		          	<th>N°</th>
		            <th>Codigo</th>
		            <th>Nombre</th>
		            <th>Tipo</th>
		            <th>Precio</th>
		            <th>Cantidad</th>
		            <th>Subtotal</th>
		            <th>Eliminar</th>		            
		          </tr>
		        </thead>
		        <tbody>
		        		
		        </tbody>
			</table>
			</div>
			</div>
			<div class="form-group">
				<label for="total" id="total" class="pull-right">Total: $0 </label>
			</div>
			<button class="btn btn btn-info" data-toggle="modal" data-target="#popupNuevoProducto" id="popup" ><i class="fa fa-plus"></i> Agregar Producto</button>  
			<button type="submit" class="btn btn-primary" id="enviar">Enviar</button>
		</form>  
		<div id="mensaje">
            <div class='alert alert-danger'></div>
        </div> 
	</div>	
	<?php echo Dwoo_Plugin_include($this, '../footer.html', null, null, null, '_root', null);?>

	<!-- 	resultado venta -->
	<div id="boleta" >
		
	</div>

	<!-- popup producto -->
	<div class="modal fade" id="popupNuevoProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
		<div class="modal-dialog"> 
			<div class="modal-content"> 
				<div class="modal-header"> 
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span>
					</button> 
					<h4 class="modal-title">Ingreso de nuevo producto</h4> 
				</div> 
				<div  class="modal-body"> 
					<form role="form"> 
						<div class="input-group">
							 <label for="Nombre">Nombre</label>
							 <select class="form-control" id="productos">
							 	<?php 
$_fh1_data = (isset($this->scope["productos"]) ? $this->scope["productos"] : null);
if ($this->isArray($_fh1_data) === true)
{
	foreach ($_fh1_data as $this->scope['row'])
	{
/* -- foreach start output */
?>
								<option value="<?php echo $this->scope["row"]['codigo_producto'];?>" ><?php echo $this->scope["row"]['nombre_producto'];?> $<?php echo number_format(intval((isset($this->scope["row"]['precio_producto']) ? $this->scope["row"]['precio_producto']:null)), 0, '.', '.');?></option>
								<?php 
/* -- foreach end output */
	}
}?>

							 </select>
						</div>
						
						<div class="form-group">

							<label for="cantidad">Cantidad</label> 
							<input type="number" class="form-control " id="cantidad" placeholder="Cantidad del producto" value="1" required>
						</div> 					
					  
				
						<div class="modal-footer"> 
							<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button> 
							<button type="button" class="btn btn-success" id="addProducto" >Agregar</button>  
						</div> 
					</form>
				</div> 
			</div> 
		</div>
	</div>	
	
	

	<script type="text/javascript">
		$(function  () {
			var idItemTabla=0;
			$('#fecha').datepicker({ dateFormat: 'dd-mm-yy' ,  maxDate: "+0M +0D +0Y" });
			$('#mensaje').hide();
			$('#popup').click(function(event) {
				event.preventDefault();			
			});

			function isDate(date) {
		        var valid = true;
		        if(date.length !=10)
		        	return false;

		        date = date.replace('-', '');
		        date = date.replace('-', '');
		        if(date.length !=8)
		        	return false;
		        var dia = parseInt(date.substring(0, 2),10);
		        var mes   = parseInt(date.substring(2, 4),10);
		        var anio  = parseInt(date.substring(4, 8),10);
		        

		        if((mes < 1) || (mes > 12)) 
		        	valid = false;
		        else if((dia < 1) || (dia > 31))
		         valid = false;
		        else if(((mes == 4) || (mes == 6) || (mes == 9) || (mes == 11)) && (dia > 30)) 
		        	valid = false;
		        else if((mes == 2) && (((anio % 400) == 0) || ((anio % 4) == 0)) && ((anio % 100) != 0) && (dia > 29)) 
		        	valid = false;
		        else if((mes == 2) && ((anio % 100) == 0) && (dia > 29)) 
		        	valid = false;

		    return valid;
		}

			$('#addProducto').click(function(event) {
				event.preventDefault();
				$('#cantidad').parent().removeClass("has-error");
				if(!$.isNumeric($("#cantidad").val())){
					$('#cantidad').focus();
                	$('#cantidad').parent().addClass("has-error");     
					return;
				}

				$.post("http://localhost/framework/index.php/Venta/addProducto",
					{
						id: $('select#productos option:selected').val(),
						cantidad: $('#cantidad').val() 
					},
					function(data) {
					  var fila = "<tr class='itemProducto' key="+idItemTabla+">";	
					  var types = JSON.parse(data);	
					  fila = fila+"<td class='numberDetalle'>#"+$('#table tr').length+"</td>";
					  fila = fila+"<td>"+types[0].codigo_producto+"</td>";
					  fila = fila+"<td>"+types[0].nombre_producto+"</td>";
					  fila = fila+"<td>"+types[0].nombre_tipo+"</td>";
					  fila = fila+"<td>"+types[0].precio_producto+"</td>";
					  fila = fila+"<td>"+types[0].cantidad+"</td>";
					  fila = fila+"<td class='subtotal'>"+types[0].subtotal+"</td>";
					  fila = fila+"<td > <a role='button' type='button' class='btn btn-danger' onclick='quitarItem("+idItemTabla+")'>Quitar</a></td>";
					  fila = fila+"</tr>";
					  idItemTabla++;

						
					$('#table tr:last').after(fila).sum();
					

					});


			});

			$.fn.sum = function() {
				sum=0;
					$('.subtotal').each(function() { 
						numero = $(this).text().replace('$','');  
						numero=numero.replace('.','');    
						sum += parseInt(numero);
	           		                    
	   				});
					$('#total').html("Total: $"+$.number(sum));
			};

			
			$('#enviar').click(function(event) {
				event.preventDefault();
				var table = $('#table').tableToJSON();

				$('#fecha').parent().removeClass("has-error");  
				if($('#fecha').val() == ""){
					$('#fecha').focus();
                	$('#fecha').parent().addClass("has-error"); 
					return;
				}

				if(!isDate($('#fecha').val())){
					$('#fecha').focus();
                	$('#fecha').parent().addClass("has-error"); 
					return;
				}

				else if($('#table tr').length==1){
					$('#mensaje .alert').html("La venta no puede ser realizada si agregar algun producto a la venta."); 
					$('#mensaje').delay(250).fadeIn("slow");
					return;
				}
				
				$.post("http://localhost/framework/index.php/Venta/new",
					{ 
						tabla : JSON.stringify(table) , 
						vendedor : $("select#vendedor option:selected").val(),
						fecha : $("#fecha").val()
					}
					,function(data) {
						var types = JSON.parse(data);
						var dt = new Date();
						var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
						
						var factura ="<div class='row'>   \
								<div class='col-xs-6'>   \
									<div class='panel panel-default'>   \
										<div class='panel-heading'>   \
										<h4>Vendedor: "+types.ventaExito[0].nombre_usuario+" "+types.ventaExito[0].apellido_usuario+"</h4>   \
										</div>   \
										<div class='panel-body'>   \
											<p>Fecha transaccion: "+types.ventaExito[0].fecha_venta+"</p>   \
											<p>Hora transaccion: "+time+"</p>   \
										</div>   \
									</div>   \
								</div>   \
								<div class='col-xs-6  text-right'>   \
									<div class='panel panel-default'>   \
										<div class='panel-heading'>   \
											<h4>Factura #"+types.ventaExito[0].codigo_venta+"</h4>   \
										</div>   \
										<div class='panel-body'>Venta realizada por el sistema  \
										'VendoTodo'  \
										</div>  \
									</div>  \
								</div>  \
							</div>  \
							<table class='table table-bordered table-striped'>  \
								<thead>  \
									<tr>  \
										<th>  \
										<h4>Codigo</h4>  \
										</th>  \
										<th>  \
										<h4>Nombre</h4>  \
										</th>  \
										<th>  \
										<h4>Tipo</h4>  \
										</th>  \
										<th>  \
										<h4>Cantidad</h4>  \
										</th>  \
										<th>  \
										<h4>Sub-Total</h4>  \
										</th>  \
										  \
									</tr>  \
								</thead>  \
								<tbody> ";
						for (var i = 0; i < types.ventaExitoDetalle.length; i++) {
									factura=factura+"<tr>";
									factura=factura+"<td>"+types.ventaExitoDetalle[i].codigo_producto+"</td>";
									factura=factura+"<td>"+types.ventaExitoDetalle[i].nombre_producto+"</td>";
									factura=factura+"<td>"+types.ventaExitoDetalle[i].nombre_tipo+"</td>";
									factura=factura+"<td>"+types.ventaExitoDetalle[i].cantidad+"</td>";
									factura=factura+"<td class=' text-right '>$"+$.number(types.ventaExitoDetalle[i].total)+"</td>";
									factura=factura+"</tr>";
						};			
										
						factura=factura+"</tbody>  \
							</table>  \
							<div class='row text-right'>  \
								<div class='col-xs-3 col-xs-offset-7'><strong>  \
									<p>Sub-Total:</p>  \
									<p>Impuestos (IVA 19%):</p>  \
									<p>Total:</p>  \
									</strong></div>  \
									<div class='col-xs-2'><strong>  \
									<p>$"+$.number( types.ventaExito[0].total_venta*0.81)+"</p>   \
									<p>$"+$.number( types.ventaExito[0].total_venta*0.19 )+"</p>   \
									<p>$"+$.number( types.ventaExito[0].total_venta)+"</p>   \
									</strong>  \
								</div>  \
							</div>";
						$('#form').html(factura);	
						
					}); 


			});

		});

		function quitarItem(idItemTabla) { 
   			
   			$('.itemProducto').each(function() {
   				if($(this).attr('key')== idItemTabla){
   					$(this).remove();
   				}
   			});

   			sum=0;
			$('.subtotal').each(function() { 
				numero = $(this).text().replace('$','');  
				numero=numero.replace('.','');    
				sum += parseInt(numero);
       		                    
				});
			$('#total').html("Total: $"+$.number(sum));
			
			numeberDetalle=1;
			$('.numberDetalle').each(function() { 
			numero = $(this).text("#"+numeberDetalle++);  
   		                    
			});

			



		}
	</script>
</body><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>