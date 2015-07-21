<?php defined('SYSPATH') or die('No direct script access.');
session_start();

class Controller_Consulta extends Controller {


	public function action_index()
	{

		if (!isset($_SESSION['validado'])){
			throw new HTTP_Exception_403;
			exit;
		}
		else{

		$deputy = $_SESSION['deputy'];
		$estado= ($deputy->allowed('Consulta/masVendido'));
		if($estado){
			$model_categoria = new Model_Categoria();
			$resultado = $model_categoria->listaCategorias();
			$model_consulta = new Model_Consulta();
			$grafico = $model_consulta->grafico();
			$sum=0;
			$sum2=0;
			for ($i=0; $i < count($grafico); $i++) { 
				$sum= $sum+$grafico[$i]['cantidad'];
				$sum2= $sum2+$grafico[$i]['suma'];
			}
			$parametro['suma'] =$sum;
			$parametro['suma2'] =$sum2;
			$parametro['datos'] = $resultado;
			$parametro['grafico'] = $grafico;
			
			$vista = Kodwoo_View::factory('/Consulta/masVendido', $parametro);
			$this->response->body($vista);
		}
		

		else{
			throw new HTTP_Exception_403;
			exit;
			
		}
		}


	}

	public function action_vendidos()
	{
		
		if (!isset($_SESSION['validado'])){
			throw new HTTP_Exception_403;
			exit;
		}
		else{

		$deputy = $_SESSION['deputy'];
		$estado= ($deputy->allowed('Consulta/vendidos'));
		if($estado){
			$id = isset($_POST['id'])?strip_tags($_POST['id']):'';
			$model_consulta= new Model_Consulta();
			$resultado = $model_consulta->listarVentasTipo($id);
			echo json_encode($resultado);
			exit;
		}
		

		else{
			throw new HTTP_Exception_403;
			exit;
			
		}
		}
	}

	public function action_MejorVendedor()
	{

		if (!isset($_SESSION['validado'])){
			throw new HTTP_Exception_403;
			exit;
		}
		else{

		$deputy = $_SESSION['deputy'];
		$estado= ($deputy->allowed('Consulta/MejorVendedor'));
		if($estado){
			$model_consulta = new Model_Consulta();
			$resultado = $model_consulta->masVendedor();
			$sum=0;
			$total=0;
			for ($i=0; $i < count($resultado); $i++) { 
				$sum= $sum+$resultado[$i]['ventas'];
				$total= $total+$resultado[$i]['total'];
			}
			$parametro['total'] = $total;
			$parametro['suma'] = $sum;
			$parametro['datos'] = $resultado;
			
			$vista = Kodwoo_View::factory('/Consulta/masVendedor', $parametro);
			$this->response->body($vista);
		}
		

		else{
			throw new HTTP_Exception_403;
			exit;
			
		}
		}
	}

	
}

?>