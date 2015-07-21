<?php
class Model_Administrador extends Kohana_Database_MySQL{
    
    public function __construct(&$oDbConn = null) {
        parent::__construct($oDbConn,array());
    }

    public function validarAdmin($usuario, $password){
        $parametros = array();
		$parametros['usuario'] = $usuario;
		$parametros['password'] = md5($password);
        return $this->exec('validarAdmin', $parametros, 'return');
        
    }
	
	
	
}

?>