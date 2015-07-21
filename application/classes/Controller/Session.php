<?php defined('SYSPATH') or die('No direct script access.');
session_start();

class Controller_Session extends Controller {

	
	public function action_index(){


		$parametro = array();		
		$vista = Kodwoo_View::factory('home', $parametro);
		$this->response->body($vista);

	}


	public function action_login(){

		$usuario = (isset($_POST['usuario']))?strip_tags($_POST['usuario']):'';
		$password = (isset($_POST['password']))?strip_tags($_POST['password']):'';

		$model_usuario = new Model_Usuario();
		$resultado = $model_usuario->validarUserPass($usuario, $password);

		if (count($resultado) < 1 ){
			 echo "err";
			 exit;
		}
		
		$_SESSION['usuario'] = $usuario;
		$_SESSION['nombre'] = strip_tags($resultado[0]['nombre_usuario']);
		$_SESSION['apellido'] = strip_tags($resultado[0]['apellido_usuario']);
		$_SESSION['validado'] = 1;
		$nivel = strip_tags($resultado[0]['codigo_perfil']);
	
		$deputy = Deputy::instance();	

		if($nivel == 1){
		$deputy->set_role('administrador', Kohana::$config->load('deputy.roles.administrador'));
		$_SESSION['deputy']= $deputy;
		$_SESSION['tipo']= "administrador";	
		echo "ok";
		exit;
		}

		else if($nivel == 2) {
		$deputy->set_role('consulta', Kohana::$config->load('deputy.roles.consulta'));
		$_SESSION['deputy']= $deputy;	
		$_SESSION['tipo']= "consulta";		
		echo "ok";
		exit;

		}
		else if($nivel == 3) {
		$deputy->set_role('vendedor', Kohana::$config->load('deputy.roles.vendedor'));
		$_SESSION['deputy']= $deputy;
		$_SESSION['tipo']= "vendedor";	
		echo "ok";
		exit;

		}
		
	}

	public function action_home()
	{
		if (!isset($_SESSION['validado'])){
			throw new HTTP_Exception_403;
			exit;
		}
		else{
		$deputy = $_SESSION['deputy'];
		$estado= ($deputy->allowed('Session/home'));
		if($estado){
			$parametro = array();
			$parametro['usuario']=$_SESSION['usuario'];	
			$parametro['nombre']=$_SESSION['nombre'];
			$parametro['apellido']=$_SESSION['apellido'];
			$parametro['perfil']=$_SESSION['tipo'];
			
			$vista = Kodwoo_View::factory('homeG', $parametro);
			$this->response->body($vista);
		}
		

		else{
			throw new HTTP_Exception_403;
			exit;
			}
		}
	}
	

	public function action_salir(){
		$_SESSION = array();
		session_destroy();
		$parametro = array();		
		$vista = Kodwoo_View::factory('home', $parametro);
		$this->response->body($vista);
	}



} 
