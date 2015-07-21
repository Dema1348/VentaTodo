<?php defined('SYSPATH') or die('No direct script access.');
session_start();

class Controller_Cliente extends Controller {


	public function action_index(){
		if (!isset($_SESSION['validado'])){
			throw new HTTP_Exception_403;
			exit;
		}
		else{
		$deputy = $_SESSION['deputy'];
		$estado= ($deputy->allowed('Cliente/'));
		if($estado){
			$parametro = array();		
			$model_cliente = new Model_Cliente();
			$resultado = $model_cliente->listaCliente();
			$parametro['datos'] = $resultado;

			$vista = Kodwoo_View::factory('/Cliente/list', $parametro);
			$this->response->body($vista);
		}
		

		else{
			throw new HTTP_Exception_403;
			exit;
			
		}
	
	}
		
	}


	
	
	public function action_changeEstado()
	{
		if (!isset($_SESSION['validado'])){
			throw new HTTP_Exception_403;
			exit;
		}
		else{
		$deputy = $_SESSION['deputy'];
		$estado= ($deputy->allowed('Cliente/*'));
		if($estado){
			try{
			$key = isset($_POST['key'])?strip_tags($_POST['key']):'';
			$estado = isset($_POST['estado'])?strip_tags($_POST['estado']):'';
			$model_cliente = new Model_Cliente();
			$model_cliente->changeEstado($key , $estado);
			echo "ok";
			}catch (Exception $e) {
	   			echo "err";

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
		$estado= ($deputy->allowed('Cliente/*'));
		if($estado){
			$parametro = array();	
			$vista = Kodwoo_View::factory('/Cliente/create', $parametro);
			$this->response->body($vista);
		}
		

		else{
			throw new HTTP_Exception_403;
			exit;
			
		}
		
		}
	}

	public function action_new(){
		if (!isset($_SESSION['validado'])){
			throw new HTTP_Exception_403;
			exit;
		}
		else{
		$deputy = $_SESSION['deputy'];
		$estado= ($deputy->allowed('Cliente/*'));
		if($estado){
			try{
			$id_cliente = isset($_POST['id_cliente'])?strip_tags($_POST['id_cliente']):'';
			$rut = isset($_POST['rut'])?strip_tags($_POST['rut']):'';
			$razon_social = isset($_POST['razon_social'])?strip_tags($_POST['razon_social']):'';
			$direccion = isset($_POST['direccion'])?strip_tags($_POST['direccion']):'';
			$comuna = isset($_POST['comuna'])?strip_tags($_POST['comuna']):'';
			$email = isset($_POST['email'])?strip_tags($_POST['email']):'';	
			$telefono = isset($_POST['telefono'])?strip_tags($_POST['telefono']):'';	
			$estado = isset($_POST['estado'])?strip_tags($_POST['estado']):'';	
			$model_cliente = new Model_Cliente();
			$result= $model_cliente->validarCliente($id_cliente);

			if(!isset($result[0])){

	   			$model_cliente->newCliente($id_cliente , $rut, $razon_social, $direccion, $comuna, $email,$telefono,$estado);
	   			echo '<div class="alert alert-success">El cliente fue registrado con exito</div>';
	   		}
	   		else {
	   			echo '<div class="alert alert-danger">El cliente ya se encuentra registrado en el sistema</div>';
	   		}
	   		}catch (Exception $e) {
	   			echo '<div class="alert alert-danger">Error en el sistema ',$e->getMessage(),'</div>';

			}
		}
		

		else{
			throw new HTTP_Exception_403;
			exit;
			
		}		
		}
	}


	public function action_editCliente()
	{
		if (!isset($_SESSION['validado'])){
			throw new HTTP_Exception_403;
			exit;
		}
		else{
		$deputy = $_SESSION['deputy'];
		$estado= ($deputy->allowed('Cliente/*'));
		if($estado){
			$id_cliente = isset($_GET['Id_cliente'])?strip_tags($_GET['Id_cliente']):'';
			$model_cliente = new Model_Cliente();
			$datos = $model_cliente->editCliente($id_cliente);
			$parametro = array();
			$parametro['datos'] = $datos;
			$vista = Kodwoo_View::factory('/Cliente/edit', $parametro);
			$this->response->body($vista);
		}
		

		else{
			throw new HTTP_Exception_403;
			exit;
			
		}		
			
		}
	}


	
	public function action_updateCliente()
	{
		if (!isset($_SESSION['validado'])){
			throw new HTTP_Exception_403;
			exit;
		}
		else{
		$deputy = $_SESSION['deputy'];
		$estado= ($deputy->allowed('Cliente/'));
		if($estado){
			try{
			$id_cliente = isset($_POST['id_cliente'])?strip_tags($_POST['id_cliente']):'';
			$rut = isset($_POST['rut'])?strip_tags($_POST['rut']):'';
			$razon_social = isset($_POST['razon_social'])?strip_tags($_POST['razon_social']):'';
			$direccion = isset($_POST['direccion'])?strip_tags($_POST['direccion']):'';
			$comuna = isset($_POST['comuna'])?strip_tags($_POST['comuna']):'';
			$email = isset($_POST['email'])?strip_tags($_POST['email']):'';	
			$telefono = isset($_POST['telefono'])?strip_tags($_POST['telefono']):'';	
			$estado = isset($_POST['estado'])?strip_tags($_POST['estado']):'';	
			$model_cliente = new Model_Cliente();
			$result= $model_cliente->validarCliente($id_cliente);

			if(isset($result[0])){

	   			$model_cliente->updateCliente($id_cliente , $rut, $razon_social, $direccion, $comuna, $email,$telefono,$estado);
	   			echo '<div class="alert alert-success">El cliente fue actualizado con exito</div>';
	   		}
	   		else {
	   			echo '<div class="alert alert-danger">El cliente no  se encuentra registrado en el sistema</div>';
	   		}
	   		}catch (Exception $e) {
	   			echo '<div class="alert alert-danger">Error en el sistema ',$e->getMessage(),'</div>';

			}
		}
		

		else{
			throw new HTTP_Exception_403;
			exit;
			
		}		
		}
	}
} 
