<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?>
<footer class="footer">
      <div class="container">
        <p class="text-muted">Desarrollado para el examen transversal con kohana y bootstrap, por <span>Edson Pérez</span> y <span>Alejandro Soto</span>.</p>
      </div>
</footer><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>