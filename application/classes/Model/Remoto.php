<?php
class Model_Remoto extends Kohana_Database_MySQL{
    
    public function __construct(&$oDbConn = null) {
        parent::__construct($oDbConn,array());
    }

    public function conexion($url){
		$ch = curl_init($url);
		
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		
		$contenido = curl_exec($ch);
		curl_close($ch);
		
		return $contenido;
	}

}

?>