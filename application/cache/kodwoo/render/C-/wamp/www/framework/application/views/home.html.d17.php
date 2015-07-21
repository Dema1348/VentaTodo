<?php
/* template head */
if (function_exists('Dwoo_Plugin_include')===false)
	$this->getLoader()->loadPlugin('include');
/* end template head */ ob_start(); /* template body */ ;
echo Dwoo_Plugin_include($this, 'cabecera.html', null, null, null, '_root', null);?>

<body class="home">
	
	<nav class="navbar navbar-default navbar-fixed-top ">
        <div class="container">
          <div class="navbar-header">   
            <a class="navbar-brand" href="#">Evaluacion 3</a>
          </div>
        </div>
	</nav>
	<div class="container">
    <?php echo Dwoo_Plugin_include($this, 'login.html', null, null, null, '_root', null);?>

    </div>

	<?php echo Dwoo_Plugin_include($this, 'footer.html', null, null, null, '_root', null);?>

</body>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>