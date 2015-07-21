<?php
class Model_Cliente extends Kohana_Database_MySQL{
    
    public function __construct(&$oDbConn = null) {
        parent::__construct($oDbConn,array());
    }

    public function listaCliente(){
        $parametros = array();
        return $this->exec('listaCliente', $parametros, 'return');
        
    }

    public function changeEstado($key, $estado)
	{
		$parametros['key']=$key;
		if($estado == 1)
			$parametros['estado']= 0;
		else
			$parametros['estado']= 1;
		$this->exec('changeEstado',$parametros,'none');
	}
	
	public function newCliente($id_cliente , $rut, $razon_social, $direccion, $comuna, $email,$telefono,$estado)
	{
		$parametros = array();
		$parametros['id_cliente']=$id_cliente;
		$parametros['rut']=$rut;
		$parametros['razon_social']=$razon_social;
		$parametros['direccion']=$direccion;
		$parametros['comuna']=$comuna;
		$parametros['email']=$email;
		$parametros['telefono']=$telefono;
		$parametros['estado']=$estado;
		$this-> exec('newCliente', $parametros, 'none') ;
		 
		
	}
	
	public  function validarCliente($id_cliente)
	{
		$parametros = array();
		$parametros['id_cliente']=$id_cliente;
		return $this-> exec('validarCliente', $parametros, 'return') ;
	}

	

	public function editCliente($id_cliente)
	{
		$parametros = array();
		$parametros['id_cliente']=$id_cliente;
		return $this-> exec('editCliente', $parametros, 'return') ;
	}

	public function updateCliente($id_cliente , $rut, $razon_social, $direccion, $comuna, $email,$telefono,$estado)
	{
		$parametros = array();
		$parametros['id_cliente']=$id_cliente;
		$parametros['rut']=$rut;
		$parametros['razon_social']=$razon_social;
		$parametros['direccion']=$direccion;
		$parametros['comuna']=$comuna;
		$parametros['email']=$email;
		$parametros['telefono']=$telefono;
		$parametros['estado']=$estado;
		$this-> exec('updateCliente', $parametros, 'none') ;
		 
		
	}

	public function FunctionName($value='')
	{
		# code...
	}
}

?>