<?php
class Model_Categoria extends Kohana_Database_MySQL{
    
    public function __construct(&$oDbConn = null) {
        parent::__construct($oDbConn,array());
    }



	 public function listaCategorias(){
        $parametros = array();
        return $this->exec('listaCategorias', $parametros, 'return');
        
    }

    public function listarCategoria($id){
        $parametros = array();
        $parametros['id'] = $id;
        return $this->exec('listarCategoria', $parametros, 'return');
        
    }

    public function delete($id)
    {
        $parametros = array();
        $parametros['id'] = $id;
        $this -> exec('delete', $parametros, 'none');
    }
 

     public  function validarCategoria($codigo)
    {
        $parametros = array();
        $parametros['codigo']=$codigo;
        return $this->exec('validarCategoria', $parametros, 'return') ;
     }

    
     public function newCategoria($nombre)
     {
         $parametros = array();
         $parametros['nombre']=$nombre;
         $this-> exec('newCategoria', $parametros, 'none') ;  
     }


     public function updateCategoria($codigo , $nombre)
     {
         $parametros = array();
         $parametros['codigo']=$codigo;
         $parametros['nombre']=$nombre;
         $this-> exec('updateCategoria', $parametros, 'none') ;  
     }

    

    
}

?>