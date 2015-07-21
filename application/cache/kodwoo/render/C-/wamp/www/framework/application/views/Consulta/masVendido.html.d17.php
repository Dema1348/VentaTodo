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
       	 	<h1>Productos más vendidos por categoria</h1>
     </div>
		<form role="form" method="post" action="http://localhost/framework/index.php/Categoria/new" id="form" >
		
			<div class="form-group">
				<label for="categoria">Categoria</label>
				<div class="input-group ancho ">		
				<select class="form-control has-feedback" id="tipo">
				<?php 
$_fh0_data = (isset($this->scope["datos"]) ? $this->scope["datos"] : null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['row'])
	{
/* -- foreach start output */
?>
				<option value='<?php echo $this->scope["row"]["codigo_tipo"];?>'> <?php echo $this->scope["row"]["nombre_tipo"];?> </option>
				<?php 
/* -- foreach end output */
	}
}?>

				</select>
				</div>
			</div>
			
			
			<button type="submit" class="btn btn-primary" id="mostrar"  data-target="#popupMasVendidos">Mostrar</button>
		</form>
	
	</div>

	<div id="chartContainer" style="height: 450px; width: 45%;  display: inline-block"></div>	
	<div id="chartContainer2" style="height: 450px; width: 45%; display: inline-block"></div>	
	<br>
	<br>
	<?php echo Dwoo_Plugin_include($this, '../footer.html', null, null, null, '_root', null);?>

	<!-- popup productos -->
	<div class="modal fade" id="popupMasVendidos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
		<div class="modal-dialog modal-lg"> 
			<div class="modal-content"> 
				<div class="modal-header"> 
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span>
					</button> 
					<h4 class="modal-title">Creacion completada</h4> 
				</div> 
				<div  class="modal-body"> 
					<div class="table-responsive">
						<table class="table table-striped tablesorter " id="tablaG">
							<thead>
					          <tr>
					            <th>Codigo producto</th>
					            <th>Nombre producto</th>
					            <th>Cantidad de ventas</th>
					            <th>Precio actual del producto</th>
					            <th>Total de ventas</th>
					          </tr>
					        </thead>
					        <tbody>
					        	
					        </tbody>
						</table>
					</div> 
					<div class='text-right'> 
						<div >
						<h3>Total: <span class="label label-primary" id="total">0</span></h3>
						</div> 
					</div> 
					
				</div> 
				<div class="modal-footer">
				 <button type="button" class="btn btn-info" data-dismiss="modal" >Seguir viendo productos mas vendidos</button> 
				 <a href="http://localhost/framework/index.php/Venta/" role="button" class="btn btn-success">Volver ventas</a>
				</div>
			</div> 
			
		</div>
	</div>	

	<script>
		$(function  () {
			$("table").tablesorter();
			
			

			$('#mostrar').click(function(event) {
				event.preventDefault();
				$("#tablaG").find("tr:gt(0)").remove();
				

				$.post("http://localhost/framework/index.php/Consulta/vendidos",
					{
						id: $('select#tipo option:selected').val()
					},
					function(data) {
					   var types = JSON.parse(data);			
					  
					  for (var i = 0; i < types.length; i++) {
						  var fila = "<tr>";	
						  fila = fila+"<td>"+types[i].codigo_producto+"</td>";
						  fila = fila+"<td>"+types[i].nombre_producto+"</td>";
						  fila = fila+"<td>"+types[i].cantidad+"</td>";
						  fila = fila+"<td>$"+$.number(types[i].precio_producto)+"</td>";
						  fila = fila+"<td class='subtotal'>$"+$.number(types[i].total)+"</td>";
						  fila = fila+"</tr>";
						 
						   $("table tbody").append(fila);
							$("table").trigger("update"); 

					  };
					   
					 
	

					  $('#popupMasVendidos').modal('show').sum();
						
						
					

					});


			});

			$.fn.sum = function() {
				sum=0;
					$('.subtotal').each(function() { 
						numero = $(this).text().replace('$','');  
						numero=numero.replace('.','');
						numero=numero.replace('.','');
						numero=numero.replace(',','');
						numero=numero.replace(',','');
						sum += parseInt(numero);
						
	           		                    
	   				});
					$('#total').html("$"+$.number(sum));
			};


	});
    </script>
    <script type="text/javascript">
	window.onload = function () {
		var chart1 = new CanvasJS.Chart("chartContainer",
		{
			title:{
				text: "Ventas por Categoria"
			},
                        animationEnabled: true,
			theme: "theme1",
			data: [
			{        
				type: "doughnut",
				indexLabelFontFamily: "Garamond",       
				indexLabelFontSize: 20,
				startAngle:60,
				showInLegend: true,
				indexLabelFontColor: "dimgrey",       
				indexLabelLineColor: "darkgrey", 
				toolTipContent: "<strong>#percent% </strong>" , 					

				dataPoints: [
				
				<?php 
$_fh1_data = (isset($this->scope["grafico"]) ? $this->scope["grafico"] : null);
if ($this->isArray($_fh1_data) === true)
{
	foreach ($_fh1_data as $this->scope['row'])
	{
/* -- foreach start output */
?>
					{  y: <?php echo intval((((isset($this->scope["row"]['cantidad']) ? $this->scope["row"]['cantidad']:null) * 100) / (isset($this->scope["suma"]) ? $this->scope["suma"] : null)));?>, label: "<?php echo $this->scope["row"]['nombre_tipo'];?> <?php echo intval((((isset($this->scope["row"]['cantidad']) ? $this->scope["row"]['cantidad']:null) * 100) / (isset($this->scope["suma"]) ? $this->scope["suma"] : null)));?>%" , legendText :" <?php echo $this->scope["row"]['nombre_tipo'];?>" },

				
				<?php 
/* -- foreach end output */
	}
}?>

				
				

				]
			}
			]
		});

		chart1.render();

		var chart2 = new CanvasJS.Chart("chartContainer2",
		{
			title:{
				text: "Ventas por Ingresos"
			},
                        animationEnabled: true,
			theme: "theme1",
			data: [
			{        
				type: "doughnut",
				indexLabelFontFamily: "Garamond",       
				indexLabelFontSize: 20,
				startAngle:60,
				showInLegend: true,
				indexLabelFontColor: "dimgrey",       
				indexLabelLineColor: "darkgrey", 
				toolTipContent: "<strong>#percent% </strong>" , 					

				dataPoints: [
				
				<?php 
$_fh2_data = (isset($this->scope["grafico"]) ? $this->scope["grafico"] : null);
if ($this->isArray($_fh2_data) === true)
{
	foreach ($_fh2_data as $this->scope['row'])
	{
/* -- foreach start output */
?>
					{  y: <?php echo intval((((isset($this->scope["row"]['suma']) ? $this->scope["row"]['suma']:null) * 100) / (isset($this->scope["suma"]) ? $this->scope["suma"] : null)));?>, label: "<?php echo $this->scope["row"]['nombre_tipo'];?> <?php echo intval((((isset($this->scope["row"]['suma']) ? $this->scope["row"]['suma']:null) * 100) / (isset($this->scope["suma2"]) ? $this->scope["suma2"] : null)));?>%" , legendText :" <?php echo $this->scope["row"]['nombre_tipo'];?>" },

				
				<?php 
/* -- foreach end output */
	}
}?>

				
				

				]
			}
			]
		});

		chart2.render();
	}
	</script>
	
</body>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>