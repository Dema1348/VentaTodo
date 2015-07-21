<?php
class Model_Perfil extends Kohana_Database_MySQL{
    
    public function __construct(&$oDbConn = null) {
        parent::__construct($oDbConn,array());
    }

    public function tipos(){
        $parametros = array();
        return $this->exec('tipos', $parametros, 'return');
        
    }

    
}

?>