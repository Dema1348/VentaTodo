<?php
class Model_Producto extends Kohana_Database_MySQL{
    
    public function __construct(&$oDbConn = null) {
        parent::__construct($oDbConn,array());
    }



	 public function listaProductos(){
        $parametros = array();
        return $this->exec('listaProductos', $parametros, 'return');
        
    }

    public function listarProducto($id){
        $parametros = array();
        $parametros['id'] = $id;
        return $this->exec('listarProducto', $parametros, 'return');
        
    }

    public function delete($id)
    {
        $parametros = array();
        $parametros['id'] = $id;
        $this -> exec('delete', $parametros, 'none');
    }

    public function tipos()
    {
        $parametros = array();
        return $this->exec('tipos', $parametros, 'return');
    }

 

     public  function validarProducto($codigo)
    {
        $parametros = array();
        $parametros['codigo']=$codigo;
        return $this->exec('validarProducto', $parametros, 'return') ;
     }

    
     public function newProducto($nombre, $precio, $tipo)
     {
         $parametros = array();
         $parametros['nombre']=$nombre;
         $parametros['precio']=$precio;
         $parametros['tipo']=$tipo;
         $this-> exec('newProducto', $parametros, 'none') ;  
     }


     public function updateProducto($codigo , $nombre, $precio, $tipo)
     {
         $parametros = array();
         $parametros['codigo']=$codigo;
         $parametros['nombre']=$nombre;
         $parametros['precio']=$precio;
         $parametros['tipo']=$tipo;
         $this-> exec('updateProducto', $parametros, 'none') ;  
     }


      public function sinProducto($id)
    {
        $parametros = array();
        $parametros['id'] = $id;
        return $this-> exec('sinProducto', $parametros, 'return') ;
        
    }
    
}

?>