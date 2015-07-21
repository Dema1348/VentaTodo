<?php defined('SYSPATH') or die('No direct script access.');
session_start();

class Controller_Usuario extends Controller {


	public function action_index(){
		if (!isset($_SESSION['validado'])){
			throw new HTTP_Exception_403;
	 		exit;
	 	}
		else{
	 	$deputy = $_SESSION['deputy'];
	 	$estado= ($deputy->allowed('Usuario/'));
	 	if($estado){
	 		$parametro = array();		
			$model_usuario = new Model_Usuario();
	 		$resultado = $model_usuario->listarUsuarios();
			$parametro['datos'] = $resultado;
			
	 		$vista = Kodwoo_View::factory('/Usuario/list', $parametro);
	 		$this->response->body($vista);
		}
	 	else{
			throw new HTTP_Exception_403;
			exit;	
 		}
		
	 }
	 }


	
	public function action_new(){


			$newRut = isset($_POST['newRut'])?strip_tags($_POST['newRut']):'';
			$newUsuario = isset($_POST['newUsuario'])?strip_tags($_POST['newUsuario']):'';
			$newPassword = isset($_POST['newPassword'])?strip_tags($_POST['newPassword']):'';
			$newNombre = isset($_POST['newNombre'])?strip_tags($_POST['newNombre']):'';
			$newApellido = isset($_POST['newApellido'])?strip_tags($_POST['newApellido']):'';
			$newEmail = isset($_POST['newEmail'])?strip_tags($_POST['newEmail']):'';
			$newfecha = isset($_POST['newfecha'])?strip_tags($_POST['newfecha']):'';
			$newTipo = isset($_POST['newTipo'])?strip_tags($_POST['newTipo']):'';	
			$model_usuario = new Model_Usuario();
		
			$result= $model_usuario->validarUser($newUsuario);
			$result2= $model_usuario->validar($newRut);

			if(!isset($result[0])){

	   			$model_usuario->newUser($newRut,$newUsuario , $newPassword, $newNombre,$newApellido, $newEmail, $newfecha, $newfecha, $newTipo);
	   			echo "ok";
				exit;
	   		}
	   		if(isset($result2[0])){
	   			echo "err1";
				exit;
	   		} 
	   		else {
	   			echo "err2";
				exit;
	   		}
	   		
		
	

	}
	public function action_new2(){


			$newRut = isset($_POST['newRut'])?strip_tags($_POST['newRut']):'';
			$newUsuario = isset($_POST['newUsuario'])?strip_tags($_POST['newUsuario']):'';
			$newPassword = isset($_POST['newPassword'])?strip_tags($_POST['newPassword']):'';
			$newNombre = isset($_POST['newNombre'])?strip_tags($_POST['newNombre']):'';
			$newApellido = isset($_POST['newApellido'])?strip_tags($_POST['newApellido']):'';
			$newEmail = isset($_POST['newEmail'])?strip_tags($_POST['newEmail']):'';
			$newfecha = isset($_POST['newfecha'])?strip_tags($_POST['newfecha']):'';
			$newTipo = isset($_POST['newTipo'])?strip_tags($_POST['newTipo']):'';	
			$model_usuario = new Model_Usuario();
		
			$result= $model_usuario->validarUser($newUsuario);
			$result2= $model_usuario->validar($newRut);

			if(!isset($result[0]) and !isset($result2[0])){
				$model_usuario->newUser($newRut,$newUsuario , $newPassword, $newNombre,$newApellido, $newEmail, $newfecha, $newfecha, $newTipo);
	   			$usuarioActualizado= $model_usuario->listarUsuario($newRut);
		   		echo json_encode($usuarioActualizado);
				exit;
	   		}
	   		if(isset($result2[0])){
	   			echo "err1";
				exit;
	   		} 
	   		else {
	   			echo "err2";
				exit;
	   		}
	   		
		
	

	}
	
	public function action_edit()
	{
		if (!isset($_SESSION['validado'])){
			throw new HTTP_Exception_403;
			exit;
		}
		else{
		$deputy = $_SESSION['deputy'];
		$estado= ($deputy->allowed('Usuario/edit'));
			if($estado){
				$id = isset($_GET['id'])?strip_tags($_GET['id']):'';
				$model_usuario = new Model_Usuario();
				$model_perfil = new Model_Perfil();
				$datos = $model_usuario->listarUsuario($id);
				$tipos = $model_perfil->tipos();
				$parametro = array();
				$parametro['tipos'] = $tipos;
				$parametro['datos'] = $datos;
				
				$vista = Kodwoo_View::factory('/Usuario/edit', $parametro);
				$this->response->body($vista);
					
			}
			

			else{
				throw new HTTP_Exception_403;
				exit;
				
			}		
		}
	}

	 
public function action_delete()
	 {
	 	if (!isset($_SESSION['validado'])){
			throw new HTTP_Exception_403;
			exit;
	 	}
	 	else{
	 		$deputy = $_SESSION['deputy'];
	 		$estado= ($deputy->allowed('Usuario/delete'));
	 		if($estado){
	 			$id = isset($_POST['id'])?strip_tags($_POST['id']):'';
	 			
	 			$model_venta = new Model_Venta();
	 			$result = $model_venta->sinVenta($id);

	 			if(count($result) < 1){
	 				$model_usuario = new Model_Usuario();
	 				$model_usuario->delete($id);
	 				echo "ok";
	 				exit;
	 			}
	 			else{
	 				echo "err";
	 				exit;
	 			}
	 		}
		

		 	else{
		 		throw new HTTP_Exception_403;
		 		exit;
				
			}
		
			
	 	}
	 }
	

	public function action_update()
	{
		if (!isset($_SESSION['validado'])){
			throw new HTTP_Exception_403;
			exit;
		}
		else{
		$deputy = $_SESSION['deputy'];
		$estado= ($deputy->allowed('Usuario/update'));
		if($estado){

			$id = isset($_POST['id'])?strip_tags($_POST['id']):'';
			$usuario = isset($_POST['usuario'])?strip_tags($_POST['usuario']):'';
			$nombre = isset($_POST['nombre'])?strip_tags($_POST['nombre']):'';
			$apellido = isset($_POST['apellido'])?strip_tags($_POST['apellido']):'';
			$correo = isset($_POST['correo'])?strip_tags($_POST['correo']):'';
			$perfil = isset($_POST['perfil'])?strip_tags($_POST['perfil']):'';
			$fecha = isset($_POST['fecha'])?strip_tags($_POST['fecha']):'';
			$model_usuario = new Model_Usuario();
			$result= $model_usuario->validar($id);
			$result2= $model_usuario->validarUser($usuario);
		

			if(isset($result[0]) and isset($result2[0])){			
		   			$model_usuario->updateUsuario($id,$usuario,$nombre,$apellido,$correo,$perfil,$fecha);
		   			$usuarioActualizado= $model_usuario->listarUsuario($id);
		   			echo json_encode($usuarioActualizado);
		   			exit;
	   		}
	   		
	   		else {

	   			echo "err";
				exit;
	   		}

			
	   		
		}
		

		else{
			throw new HTTP_Exception_403;
			exit;
			
		}
		}
	}

	public function action_updateC()
	{
		if (!isset($_SESSION['validado'])){
			throw new HTTP_Exception_403;
			exit;
		}
		else{
		$deputy = $_SESSION['deputy'];
		$estado= ($deputy->allowed('Usuario/updateC'));
		if($estado){

			$id = isset($_POST['id'])?strip_tags($_POST['id']):'';
			$usuario = isset($_POST['usuario'])?strip_tags($_POST['usuario']):'';
			$password = isset($_POST['password'])?strip_tags($_POST['password']):'';
			
			$model_usuario = new Model_Usuario();
			$result= $model_usuario->validar($id);
			$result2= $model_usuario->validarUser($usuario);
		

			if(isset($result[0]) and isset($result2[0])){			
		   			$model_usuario->updateUsuarioC($id,$usuario,$password);
		   			echo "ok";
		   			exit;
	   		}
	   		
	   		else {

	   			echo "err";
				exit;
	   		}

			
	   		
		}
		

		else{
			throw new HTTP_Exception_403;
			exit;
			
		}
		}
	}


	public function action_create(){
		if (!isset($_SESSION['validado'])){
			throw new HTTP_Exception_403;
			exit;
		}
		else{
		$deputy = $_SESSION['deputy'];
		$estado= ($deputy->allowed('Usuario/create'));
		if($estado){
			$parametro = array();	
			$model_perfil = new Model_Perfil();
			$tipos = $model_perfil->tipos();
			$parametro['tipos'] = $tipos;
			
			$vista = Kodwoo_View::factory('/Usuario/create', $parametro);
			$this->response->body($vista);
			
		}
		

		else{
			throw new HTTP_Exception_403;
			exit;
			
		}
		
	}
	}


	public function action_editClave()
	{
		if (!isset($_SESSION['validado'])){
			throw new HTTP_Exception_403;
			exit;
		}
		else{
		$deputy = $_SESSION['deputy'];
		$estado= ($deputy->allowed('Usuario/editClave'));
			if($estado){
				$id = isset($_GET['id'])?strip_tags($_GET['id']):'';
				$model_usuario = new Model_Usuario();
				$datos = $model_usuario->listarUsuario($id);			
				$parametro = array();
				$parametro['datos'] = $datos;
				
				$vista = Kodwoo_View::factory('/Usuario/editClave', $parametro);
				$this->response->body($vista);
					
			}
			

			else{
				throw new HTTP_Exception_403;
				exit;
				
			}		
		}
	}

	
} 
