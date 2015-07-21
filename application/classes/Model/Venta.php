<?php
class Model_Venta extends Kohana_Database_MySQL{
    
    public function __construct(&$oDbConn = null) {
        parent::__construct($oDbConn,array());
    }



	

    public function newVenta($maximo,$vendedor, $fecha ,$total)
    {
        $parametros = array();
        $parametros['maximo']=$maximo;
        $parametros['vendedor']=$vendedor;
        $parametros['fecha']=date("Y-m-d", strtotime($fecha));
        $parametros['total']=$total;
        $this-> exec('newVenta', $parametros, 'none') ;
         
        
    }

    public function lastVenta()
    {
        $parametros = array();
        return $this-> exec('lastVenta', $parametros, 'return') ;
    }

     public function findVenta($ultimaVenta)
    {
        $parametros = array();
        $parametros['ultimaVenta'] = $ultimaVenta;
        return $this-> exec('findVenta', $parametros, 'return') ;
    }

     public function listaVentas()
    {
        $parametros = array();
        return $this-> exec('listaVentas', $parametros, 'return') ;
    } 
   
    public function sinVenta($id)
    {
        $parametros = array();
        $parametros['id'] = $id;
        return $this-> exec('sinVenta', $parametros, 'return') ;
        
    }

     public function delete($id)
    {
        $parametros = array();
        $parametros['id'] = $id;
        $this-> exec('delete', $parametros, 'none') ;
        
    }

}

?>