<?php defined('SYSPATH') or die('No direct script access.');
session_start();

class Controller_Categoria extends Controller {

	public function action_index(){
		if (!isset($_SESSION['validado'])){
			throw new HTTP_Exception_403;
			exit;
		}
		else{
		$deputy = $_SESSION['deputy'];
		$estado= ($deputy->allowed('Categoria/'));
		if($estado){
			$parametro = array();		
			$model_categoria = new Model_Categoria();
			$resultado = $model_categoria->listaCategorias();
			$parametro['datos'] = $resultado;
			
			$vista = Kodwoo_View::factory('/Categoria/list', $parametro);
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
		$estado= ($deputy->allowed('Categoria/create'));
		if($estado){
			$model_categoria = new Model_Categoria();
			$parametro = array();	
			
			$vista = Kodwoo_View::factory('/Categoria/create', $parametro);
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
	 		$estado= ($deputy->allowed('Categoria/delete'));
	 		if($estado){
	 			$id = isset($_POST['id'])?strip_tags($_POST['id']):'';
	 			$model_producto = new Model_Producto();
	 			$result = $model_producto->sinProducto($id);
	 			if(count($result) < 1){
	 				$model_categoria = new Model_Categoria();
	 				$model_categoria->delete($id);
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
		$estado= ($deputy->allowed('Categoria/new'));
		if($estado){
			$nombre = isset($_POST['nombre'])?strip_tags($_POST['nombre']):'';
			$model_categoria = new Model_Categoria();
			$model_categoria->newCategoria($nombre);
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
		$estado= ($deputy->allowed('Categoria/*'));
		if($estado){
			$id = isset($_GET['id'])?strip_tags($_GET['id']):'';
			$model_categoria = new Model_Categoria();
			$datos = $model_categoria->listarCategoria($id);
			$parametro = array();
			$parametro['datos'] = $datos;
			
			$vista = Kodwoo_View::factory('/Categoria/edit', $parametro);
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
		$estado= ($deputy->allowed('Categoria/update'));
		if($estado){
		
			$codigo = isset($_POST['codigo'])?strip_tags($_POST['codigo']):'';
			$nombre = isset($_POST['nombre'])?strip_tags($_POST['nombre']):'';
			$model_categoria = new Model_Categoria();
			$result= $model_categoria->validarCategoria($codigo);

			if(isset($result[0])){

	   			$model_categoria->updateCategoria($codigo , $nombre);
	   			$categoriaActualizado= $model_categoria->listarCategoria($codigo);
	   			echo json_encode($categoriaActualizado);
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
