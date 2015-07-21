<?php defined('SYSPATH') or die('No direct script access.');
session_start();

class Controller_Producto extends Controller {

	public function action_index(){
		if (!isset($_SESSION['validado'])){
			throw new HTTP_Exception_403;
			exit;
		}
		else{
		$deputy = $_SESSION['deputy'];
		$estado= ($deputy->allowed('Producto/'));
		if($estado){
			$parametro = array();		
			$model_producto = new Model_Producto();
			$resultado = $model_producto->listaProductos();
			$parametro['datos'] = $resultado;
			
			$vista = Kodwoo_View::factory('/Producto/list', $parametro);
			$this->response->body($vista);
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
		$estado= ($deputy->allowed('Producto/create'));
		if($estado){
			$model_producto = new Model_Producto();
			$parametro = array();	
			$tipos = $model_producto->tipos();
			$parametro['tipos'] = $tipos;
			
			$vista = Kodwoo_View::factory('/Producto/create', $parametro);
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
	 		$estado= ($deputy->allowed('Producto/delete'));
	 		if($estado){
	 			$id = isset($_POST['id'])?strip_tags($_POST['id']):'';
	 			
	 			$model_detalle = new Model_Detalle();
	 			$result = $model_detalle->sinDetalle($id);
	 			if(count($result) < 1){
	 				$model_producto = new Model_Producto();
	 				$model_producto->delete($id);
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
	
	 
	public function action_new(){
		if (!isset($_SESSION['validado'])){
			throw new HTTP_Exception_403;
			exit;
		}
		else{
		$deputy = $_SESSION['deputy'];
		$estado= ($deputy->allowed('Producto/new'));
		if($estado){
			$nombre = isset($_POST['nombre'])?strip_tags($_POST['nombre']):'';
			$precio = isset($_POST['precio'])?strip_tags($_POST['precio']):'';
			$tipo = isset($_POST['tipo'])?strip_tags($_POST['tipo']):'';
			$model_producto = new Model_Producto();
			$model_producto->newProducto($nombre, $precio, $tipo);
   			echo "ok";
   			exit;
	   		
	   		
		}
		

		else{
			throw new HTTP_Exception_403;
			exit;
			
		}
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
		$estado= ($deputy->allowed('Producto/*'));
		if($estado){
			$id = isset($_GET['id'])?strip_tags($_GET['id']):'';
			$model_producto = new Model_Producto();
			$datos = $model_producto->listarProducto($id);
			$tipos = $model_producto->tipos();
			$parametro = array();
			$parametro['tipos'] = $tipos;
			$parametro['datos'] = $datos;
			
			$vista = Kodwoo_View::factory('/Producto/edit', $parametro);
			$this->response->body($vista);
				
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
		$estado= ($deputy->allowed('Producto/update'));
		if($estado){
		
			$codigo = isset($_POST['codigo'])?strip_tags($_POST['codigo']):'';
			$nombre = isset($_POST['nombre'])?strip_tags($_POST['nombre']):'';
			$precio = isset($_POST['precio'])?strip_tags($_POST['precio']):'';
			$tipo = isset($_POST['tipo'])?strip_tags($_POST['tipo']):'';
			$model_producto = new Model_Producto();
			$result= $model_producto->validarProducto($codigo);

			if(isset($result[0])){

	   			$model_producto->updateProducto($codigo , $nombre, $precio, $tipo);
	   			$productoActualizado= $model_producto->listarProducto($codigo);
	   			echo json_encode($productoActualizado);
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


	
} 
