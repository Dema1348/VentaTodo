<?php
class Model_Usuario extends Kohana_Database_MySQL{
    
    public function __construct(&$oDbConn = null) {
        parent::__construct($oDbConn,array());
    }

    public function listarVendedores(){
        $parametros = array();
        return $this->exec('listarVendedores', $parametros, 'return');
        
    }

    public function listarUsuarios(){
        $parametros = array();
        return $this->exec('listarUsuarios', $parametros, 'return');
        
    }

    public function delete($id)
    {
    	$parametros = array();
    	$parametros['id'] = $id;
    	$this -> exec('delete', $parametros, 'none');
    }
	
	public function newUser($newRut,$newUsuario , $newPassword, $newNombre,$newApellido, $newEmail, $newfecha, $newfecha, $newTipo)
	{
		$parametros = array();
		$parametros['newRut']=$newRut;
		$parametros['newUsuario']=$newUsuario;
		$parametros['newPassword']=md5($newPassword);
		$parametros['newNombre']=$newNombre;
		$parametros['newApellido']=$newApellido;
		$parametros['newEmail']=$newEmail;
		$parametros['newfecha']=date("Y-m-d", strtotime($newfecha));
		$parametros['newTipo']=$newTipo;
		$this-> exec('newUser', $parametros, 'none') ;
		 
		
	}
	
	public  function validarUserPass($usuario, $password)
	{
		$parametros = array();
		$parametros['usuario']=$usuario;
		$parametros['password']=md5($password);
		return $this-> exec('validarUserPass', $parametros, 'return') ;
	}

	public  function validarUser($newUsuario)
	{
		$parametros = array();
		$parametros['newUsuario']=$newUsuario;
		return $this-> exec('validarUser', $parametros, 'return') ;
	}

	public  function validar($id)
	{
		$parametros = array();
		$parametros['id']=$id;
		return $this-> exec('validar', $parametros, 'return') ;
	}

	
	 public function listarUsuario($id)
	 {
	 	$parametros = array();
	 	$parametros['id']=$id;
	 	return $this-> exec('listarUsuario', $parametros, 'return') ;
	 }

	 public function updateUsuario($id,$usuario,$nombre,$apellido,$correo,$perfil,$fecha)
	 {
	 	$parametros = array();
	 	$parametros['id']= $id;
	 	$parametros['usuario']=$usuario;
	 	$parametros['nombre']=$nombre;
	 	$parametros['apellido']=$apellido;
	 	$parametros['correo']=$correo;
	 	$parametros['perfil']=$perfil;
	 	$parametros['fecha']=date("Y-m-d", strtotime($fecha));
	 	$this-> exec('updateUser', $parametros, 'none') ;
	}


	public function updateUsuarioC($id,$usuario,$password)
	{
		$parametros = array();
	 	$parametros['id']= $id;
	 	$parametros['usuario']=$usuario;
	 	$parametros['password']=md5($password);
	 
	 	$this-> exec('updateUsuarioC', $parametros, 'none') ;
	}
}
?>