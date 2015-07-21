<?php
/* template head */
if (function_exists('Dwoo_Plugin_include')===false)
	$this->getLoader()->loadPlugin('include');
/* end template head */ ob_start(); /* template body */ ?>
<?php echo Dwoo_Plugin_include($this, '../cabecera.html', null, null, null, '_root', null);?>

<body >
	<?php echo Dwoo_Plugin_include($this, '../menu.html', null, null, null, '_root', null);?>

	<div class="container">
	<div class="page-header">
       	 	<h1>Usuarios</h1>
     </div>
		<div class="panel  panel-primary">
			<div class="panel-heading">Usuarios registrados en el sistema</div>
			<div class="table-responsive">
			<table class="table table-striped tablesorter" id="tablaG">
				<thead>
		          <tr>
		            <th>Rut</th>
		            <th>Username</th>
		            <th>Nombre</th>
		            <th>Apellido</th>
		            <th>Correo</th>
		            <th>Fecha Nacimiento</th>
		            <th>Tipo de Perfil</th>
		            <?php 
                    $deputy = $_SESSION['deputy'];
                    $estado= ($deputy->allowed('Usuario/editClave'));
                    if($estado){
                   ?> 
		            <th>Contraseña</th>
		            <?php
                    }
                    ?> 

		            <?php 
                    $deputy = $_SESSION['deputy'];
                    $estado= ($deputy->allowed('Usuario/edit'));
                    if($estado){
                   ?> 
		            <th>Editar</th>
		            <?php
                    }
                    ?> 
		            <?php 
                    $deputy = $_SESSION['deputy'];
                    $estado= ($deputy->allowed('Usuario/delete'));
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
		        			<td><?php echo $this->scope["row"]['id'];?></td>
				            <td><?php echo $this->scope["row"]['login'];?></td>
				            <td><?php echo $this->scope["row"]['nombre'];?></td>
				            <td><?php echo $this->scope["row"]['apellido'];?></td>
				            <td><?php echo $this->scope["row"]['correo'];?></td>
				            <td><?php echo date("d-m-Y", strtotime((isset($this->scope["row"]["fecha"]) ? $this->scope["row"]["fecha"]:null)));?></td>
				            <td><?php echo $this->scope["row"]['perfil'];?></td>
				            <?php 
		                    $deputy = $_SESSION['deputy'];
		                    $estado= ($deputy->allowed('Usuario/editClave'));
		                    if($estado){
		                   ?> 
				            <td><a role="button" type="button" class="btn btn-warning" key="<?php echo $this->scope["row"]['id'];?>" href='http://localhost/framework/index.php/Usuario/editClave?id=<?php echo $this->scope["row"]['id'];?>' >Cambiar</a></td>
				             <?php
		                    }
		                    ?> 

				            <?php 
		                    $deputy = $_SESSION['deputy'];
		                    $estado= ($deputy->allowed('Usuario/edit'));
		                    if($estado){
		                   ?> 
				            <td><a role="button" type="button" class="btn btn-success" key="<?php echo $this->scope["row"]['id'];?>" href='http://localhost/framework/index.php/Usuario/edit?id=<?php echo $this->scope["row"]['id'];?>' >Editar</a></td>
				              <?php
		                    }
		                    ?> 
				            <?php 
		                    $deputy = $_SESSION['deputy'];
		                    $estado= ($deputy->allowed('Usuario/delete'));
		                    if($estado){
		                   ?> 
				            <td><button type="submit" class="btn btn-danger eliminar" key="<?php echo $this->scope["row"]['id'];?>"  data-target="#popupEliminarUsuario">Eliminar</button></td>
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
		        			Sin usuarios
		        		</tr>	
		        	<?php 
}?>

		        </tbody>
			</table>
			</div>
		</div>
	
	</div>
	<?php echo Dwoo_Plugin_include($this, '../footer.html', null, null, null, '_root', null);?>

	<!-- popup usuarios -->
	<div class="modal fade" id="popupEliminarUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
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
			<button type="button" class="btn btn-info" data-dismiss="modal">Seguir viendo los usuarios</button> 
				 <a href="http://localhost/framework/index.php/Usuario/" role="button" class="btn btn-success">Actualizar la pagina</a>
				</div>
			</div> 
			
		</div>
	</div>	
	<script type="text/javascript">
		$("#tablaG").tablesorter({ 
        
        	headers: { 
           
            7: { 
                sorter: false 
            }, 
            8: { 
                sorter: false 
            }, 
            9: { 
                sorter: false 
            }
        } 
   	 });

		$(".eliminar").click(function(event) {
			event.preventDefault();
			fila= $(this).parent().parent();
			$.post("http://localhost/framework/index.php/Usuario/delete",
			{
				id : $(this).attr('key')
			}
			,function(data) {
				if(data=="ok"){
					$("#estado").text("El usuario fue eliminado con exito.");
					fila.remove();
					$('#popupEliminarUsuario').modal('show');
				}
				else{
					$("#estado").text("El usuario no pudo ser eliminado puesto que tiene ventas asociadas a él");
					$('#popupEliminarUsuario').modal('show');
				}
			});
		});
	</script>
</body>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>