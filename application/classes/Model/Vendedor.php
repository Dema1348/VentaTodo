<?php
class Model_Vendedor extends Kohana_Database_MySQL{
    
    public function __construct(&$oDbConn = null) {
        parent::__construct($oDbConn,array());
    }



    public  function validarVendedor($codigo_vendedor)
    {
        $parametros = array();
        $parametros['codigo_vendedor']=$codigo_vendedor;
        return $this-> exec('validarVendedor', $parametros, 'return') ;
    }

}

?>