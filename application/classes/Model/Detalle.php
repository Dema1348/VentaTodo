<?php
class Model_Detalle extends Kohana_Database_MySQL{
    
    public function __construct(&$oDbConn = null) {
        parent::__construct($oDbConn,array());
    }



	 public function newDetalle($ultimaVenta,$cantidad,$subtotal,$codigo){
        $parametros = array();
        $parametros['ultimaVenta'] = $ultimaVenta;
        $parametros['cantidad'] = $cantidad;
        $parametros['subtotal'] = $subtotal;
        $parametros['codigo'] = $codigo;
        $this->exec('newDetalle', $parametros, 'none');
        
    }

    public function findDetalle($ultimaVenta)
    {
        $parametros = array();
        $parametros['ultimaVenta'] = $ultimaVenta;
        return $this-> exec('findDetalle', $parametros, 'return') ;
    }

    public function sinDetalle($id)
    {
        $parametros = array();
        $parametros['id'] = $id;
        return $this-> exec('sinDetalle', $parametros, 'return') ;
        
    }

    public function delete($id)
    {
        $parametros = array();
        $parametros['id'] = $id;
        $this-> exec('delete', $parametros, 'none') ;
        
    }

   
    
}

?>