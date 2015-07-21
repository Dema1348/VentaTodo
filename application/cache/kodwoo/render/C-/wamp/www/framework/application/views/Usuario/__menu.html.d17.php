<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">   
            <a class="navbar-brand" href="http://localhost/framework/index.php/Session/home">Home</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">   
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Ventas
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                   <?php 
                    $deputy = $_SESSION['deputy'];
                    $estado= ($deputy->allowed('Venta/'));
                    if($estado){
                   ?> 
                   <li><a href="http://localhost/framework/index.php/Venta/">Ventas realizadas</a></li>
                    <?php
                    }
                   ?> 
                   <?php 
                    $deputy = $_SESSION['deputy'];
                    $estado= ($deputy->allowed('Venta/create'));
                    if($estado){
                   ?> 
                  <li><a href="http://localhost/framework/index.php/Venta/create">Ingreso venta</a></li>
                  <?php
                  }
                 ?> 
                </ul>
               </li>
                <?php 
                    $deputy = $_SESSION['deputy'];
                    $estado= ($deputy->allowed('Usuario/'));
                    if($estado){
                ?>  
                <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Productos
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="http://localhost/framework/index.php/Producto/">Listar Producto</a></li>
                   
                   <?php 
                    $deputy = $_SESSION['deputy'];
                    $estado= ($deputy->allowed('Producto/create'));
                    if($estado){
                   ?> 
                   <li><a href="http://localhost/framework/index.php/Producto/create">Agregar Producto</a></li>
                    <?php
                    }
                   ?> 
                </ul>
               </li>
                <?php
                    }
                   ?> 
              <?php 
                    $deputy = $_SESSION['deputy'];
                    $estado= ($deputy->allowed('Usuario/'));
                    if($estado){
                ?>  
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Usuarios
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="http://localhost/framework/index.php/Usuario/">Listar Usuarios</a></li>
                   <?php 
                    $deputy = $_SESSION['deputy'];
                    $estado= ($deputy->allowed('Usuario/create'));
                    if($estado){
                   ?> 
                   <li><a href="http://localhost/framework/index.php/Usuario/create">Agregar Usuario</a></li>
                    <?php
                    }
                   ?> 
                </ul>
               </li>
               <?php
                    }
                   ?>
                <?php 
                    $deputy = $_SESSION['deputy'];
                    $estado= ($deputy->allowed('Categoria/'));
                    if($estado){
                ?>      
                <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Categorias
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="http://localhost/framework/index.php/Categoria/">Listar Categorias</a></li>
                    <?php 
                    $deputy = $_SESSION['deputy'];
                    $estado= ($deputy->allowed('Categoria/create'));
                    if($estado){
                   ?> 
                   <li><a href="http://localhost/framework/index.php/Categoria/create">Agregar categoria</a></li>
                    <?php
                    }
                   ?> 
                </ul>
               </li>
               <?php
                    }
                   ?> 
                <?php 
                    $deputy = $_SESSION['deputy'];
                    $estado= ($deputy->allowed('Categoria/'));
                    if($estado){
                ?>       
               <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Consultas
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="http://localhost/framework/index.php/Consulta/">Producto Más Vendido</a></li>
                   <li><a href="http://localhost/framework/index.php/Consulta/MejorVendedor">Mejor Vendedor</a></li>
                </ul>
               </li>
              <?php
                    }
                   ?> 
            </ul>

            <ul class="nav navbar-nav navbar-right">
              <li ><a href="http://localhost/framework/index.php/Session/salir">Salir</a></li>
            </ul>
          </div>
        </div>
</nav><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>