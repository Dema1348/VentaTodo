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
       	 	<h1>Vendedores con mayor numero de venta</h1>
     </div>
			<div class="panel  panel-primary">
				<div class="panel-heading">Ventas</div>
				<div class="panel-body">
					<p>Estos son ventas de cada vendedor activo en el sistema.</p>
				</div>

				<div class="table-responsive">
					<table class="table table-striped tablesorter " id="tablaG">
							<thead>
					          <tr>
					        <th>N° </th>  	
				          	<th>Rut </th>
				            <th>Username</th>
				            <th>Nombre</th>
				            <th>Correo</th>
				            <th>N° Ventas</th>
				            <th>Ingresos</th>
				          </tr>
				        </thead>
				        <tbody>
				        	<?php $this->scope["i"]=1?>

				        	<?php 
$_fh0_data = (isset($this->scope["datos"]) ? $this->scope["datos"] : null);
if ($this->isArray($_fh0_data, true) === true)
{
	foreach ($_fh0_data as $this->scope['row'])
	{
/* -- foreach start output */
?>
				        		<tr>
				        			<td>#<?php echo ($this->scope["i"]++);?></td>
				        			<td><?php echo $this->scope["row"]['id_usuario'];?></td>
				        			<td><?php echo $this->scope["row"]['login_usuario'];?></td>
						            <td><?php echo $this->scope["row"]['nombre_usuario'];?> <?php echo $this->scope["row"]['apellido_usuario'];?></td>
						            <td><?php echo $this->scope["row"]['correo_usuario'];?></td>
						            <td><?php echo $this->scope["row"]['ventas'];?></td>
						            <td>$<?php echo number_format(intval((isset($this->scope["row"]['total']) ? $this->scope["row"]['total']:null)));?></td>
				        	<?php 
/* -- foreach end output */
	}
}
else {
?>
				        		<tr>
				        			No se han registrado ventas
				        		</tr>	
				        	<?php 
}?>

				        </tbody>
					</table>
				</div>
				
			</div>
				<div class='text-right'> 	
					<h3>N° de ventas <span class="label label-primary"><?php echo $this->scope["suma"];?></span></h3>
					<h3>Ingresos en ventas <span class="label label-primary">$<?php echo number_format(intval((isset($this->scope["total"]) ? $this->scope["total"] : null)));?></span></h3> 
					
				</div> 
					
			
		</div>
	<div id="chartContainer" style="height: 450px; width: 45%;  display: inline-block"></div>	
	<div id="chartContainer2" style="height: 450px; width: 45%; display: inline-block"></div>	
	<br>
	<br>
	<?php echo Dwoo_Plugin_include($this, '../footer.html', null, null, null, '_root', null);?>

	
	<script type="text/javascript">
		$(function() {
			
			$("#tablaG").tablesorter({ 
        
        	headers: { 
            1: { 
                sorter: false 
            }, 
            2: { 
                sorter: false 
            }, 
            3: { 
                sorter: false 
            } , 
            4: { 
                sorter: false 
            } 
        } 
    	});
	});
	</script>
	 <script type="text/javascript">
	window.onload = function () {
		var chart1 = new CanvasJS.Chart("chartContainer",
		{
			title:{
				text: "Cantidad de Ventas por vendedor"
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
$_fh1_data = (isset($this->scope["datos"]) ? $this->scope["datos"] : null);
if ($this->isArray($_fh1_data) === true)
{
	foreach ($_fh1_data as $this->scope['row'])
	{
/* -- foreach start output */
?>
					{  y: <?php echo intval((((isset($this->scope["row"]['ventas']) ? $this->scope["row"]['ventas']:null) * 100) / (isset($this->scope["suma"]) ? $this->scope["suma"] : null)));?>, label: "<?php echo $this->scope["row"]['nombre_usuario'];?> <?php echo $this->scope["row"]['apellido_usuario'];?> <?php echo intval((((isset($this->scope["row"]['ventas']) ? $this->scope["row"]['ventas']:null) * 100) / (isset($this->scope["suma"]) ? $this->scope["suma"] : null)));?>%" , legendText :" <?php echo $this->scope["row"]['nombre_usuario'];?> <?php echo $this->scope["row"]['apellido_usuario'];?>" },

				
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
				text: "Ingresos de Ventas por vendedor"
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
$_fh2_data = (isset($this->scope["datos"]) ? $this->scope["datos"] : null);
if ($this->isArray($_fh2_data) === true)
{
	foreach ($_fh2_data as $this->scope['row'])
	{
/* -- foreach start output */
?>
					{  y: <?php echo intval((((isset($this->scope["row"]['total']) ? $this->scope["row"]['total']:null) * 100) / (isset($this->scope["total"]) ? $this->scope["total"] : null)));?>, label: "<?php echo $this->scope["row"]['nombre_usuario'];?> <?php echo $this->scope["row"]['apellido_usuario'];?> <?php echo intval((((isset($this->scope["row"]['total']) ? $this->scope["row"]['total']:null) * 100) / (isset($this->scope["total"]) ? $this->scope["total"] : null)));?>%" , legendText :" <?php echo $this->scope["row"]['nombre_usuario'];?> <?php echo $this->scope["row"]['apellido_usuario'];?>" },

				
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
</body><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>