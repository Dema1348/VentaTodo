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
       	 	<h1>Categorias</h1>
     </div>
		<div class="panel  panel-primary">
			<div class="panel-heading">Categorias registradas en el sistema</div>
			<div class="table-responsive">
			<table class="table table-striped tablesorter" id="tablaG">
				<thead>
		          <tr>
		            <th>Id categoria</th>
		            <th>Nombre categoria</th>
		             <?php 
                    $deputy = $_SESSION['deputy'];
                    $estado= ($deputy->allowed('Categoria/edit'));
                    if($estado){
                   ?> 
		            <th>Editar</th>
		            <?php
                    }
                    ?> 
		           <?php 
                    $deputy = $_SESSION['deputy'];
                    $estado= ($deputy->allowed('Categoria/delete'));
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
				            <td><?php echo $this->scope["row"]['codigo_tipo'];?></td>
				            <td><?php echo $this->scope["row"]['nombre_tipo'];?></td>
				            <?php 
		                    $deputy = $_SESSION['deputy'];
		                    $estado= ($deputy->allowed('Categoria/edit'));
		                    if($estado){
		                   ?>           
							<td><a role="button" type="button" class="btn btn-success" key="<?php echo $this->scope["row"]['codigo_tipo'];?>" href='http://localhost/framework/index.php/Categoria/edit?id=<?php echo $this->scope["row"]['codigo_tipo'];?>' >Editar</a></td>
							 <?php
		                    }
		                    ?> 
				           <?php 
		                    $deputy = $_SESSION['deputy'];
		                    $estado= ($deputy->allowed('Categoria/delete'));
		                    if($estado){
		                   ?> 
							<td><button type="submit" class="btn btn-danger eliminar" key="<?php echo $this->scope["row"]['codigo_tipo'];?>"  data-target="#popupEliminarCategoria">Eliminar</button></td>
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
		        			Sin categorias
		        		</tr>	
		        	<?php 
}?>

		        </tbody>
			</table>
			</div>
		</div>
	
	</div>
	<?php echo Dwoo_Plugin_include($this, '../footer.html', null, null, null, '_root', null);?>

	<!-- popup categoria -->
	<div class="modal fade" id="popupEliminarCategoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
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
			<button type="button" class="btn btn-info" data-dismiss="modal">Seguir viendo los categoria</button> 
				 <a href="http://localhost/framework/index.php/Categoria/" role="button" class="btn btn-success">Actualizar la pagina</a>
				</div>
			</div> 
			
		</div>
	</div>	
	<script type="text/javascript">
		$("#tablaG").tablesorter({ 
        
        	headers: { 
           
            2: { 
                sorter: false 
            }, 
            3: { 
                sorter: false 
            }
        } 
   	 });

		$(".eliminar").click(function(event) {
			event.preventDefault();
			fila= $(this).parent().parent();
			$.post("http://localhost/framework/index.php/Categoria/delete",
			{
				id : $(this).attr('key')
			}
			,function(data) {
				if(data=="ok"){
					$("#estado").text("El categoria fue eliminado con exito.");
					fila.remove();
					$('#popupEliminarCategoria').modal('show');
				}
				else{
					$("#estado").text("El categoria no pudo ser eliminado puesto que tiene productos asociados a él");
					$('#popupEliminarCategoria').modal('show');
				}
			});
		});
	</script>
</body>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>