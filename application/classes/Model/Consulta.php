<?php
class Model_Consulta extends Kohana_Database_MySQL{ 

	public function __construct(&$oDbConn = null) {
        parent::__construct($oDbConn,array());
    }
    
	 public function listarVentasTipo($id)
    {
        $parametros = array();
        $parametros['id'] = $id;
        return $this-> exec('listarVentasTipo', $parametros, 'return') ;
    }

     public function grafico()
    {
        $parametros = array();
        return $this-> exec('grafico', $parametros, 'return') ;
    }

   
    public function masVendedor()
    {
        $parametros = array();
        return $this-> exec('masVendedor', $parametros, 'return') ;
    }
}
?>