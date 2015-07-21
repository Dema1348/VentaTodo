<?php
/* template head */
if (function_exists('Dwoo_Plugin_include')===false)
	$this->getLoader()->loadPlugin('include');
/* end template head */ ob_start(); /* template body */ ;
echo Dwoo_Plugin_include($this, 'cabecera.html', null, null, null, '_root', null);?>

<body >
	<?php echo Dwoo_Plugin_include($this, 'menu.html', null, null, null, '_root', null);?>

	<div class="container">
    	<div class="page-header">
       	 	<h1>Sistema de administración "VendoTodo"</h1>
        </div>
        <p class="lead">
        	Bienvenido  <?php echo $this->scope["nombre"];?> <?php echo $this->scope["apellido"];?>.
        </p>
        <p class="lead">
        	Fecha actual del  sistema <?php echo date("j F, Y");?>.
        </p>
         <p class="lead">
        	Hora actual del  sistema <?php echo date("g:i a");?>.
        </p>
         <p class="lead">
        	Nombre de usuario: <?php echo $this->scope["usuario"];?>.
        </p>
         <p class="lead">
        	Tipo de perfil actual: <?php echo $this->scope["perfil"];?>.
        </p>
	</div>
	<?php echo Dwoo_Plugin_include($this, 'footer.html', null, null, null, '_root', null);?>

</body>



<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>