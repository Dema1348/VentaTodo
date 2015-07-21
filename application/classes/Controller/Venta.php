<?php defined('SYSPATH') or die('No direct script access.');
session_start();

class Controller_Venta extends Controller {
	
	public function action_index(){
		if (!isset($_SESSION['validado'])){
			throw new HTTP_Exception_403;
			exit;
		}
		else{
		$deputy = $_SESSION['deputy'];
		$estado= ($deputy->allowed('Venta/'));
		if($estado){
		
			$parametro = array();		
			$model_venta = new Model_Venta();
			$resultado = $model_venta->listaVentas();
			$parametro['ventas'] = $resultado;
			
			$vista = Kodwoo_View::factory('/Venta/list', $parametro);
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
	 		$estado= ($deputy->allowed('Venta/delete'));
	 		if($estado){
	 			$id = isset($_POST['id'])?strip_tags($_POST['id']):'';
	 			
	 			$model_venta = new Model_Venta();
	 			$result = $model_venta->findVenta($id);
 				$model_detalle = new Model_Detalle();
 				$model_detalle->delete($id);
 				$model_venta->delete($id);
 				echo "ok";
 				exit;
	 			
	 		}
		

		 	else{
		 		throw new HTTP_Exception_403;
		 		exit;
				
			}
		
			
	 	}
	 }

	public function action_detalle()
	{
		if (!isset($_SESSION['validado'])){
			throw new HTTP_Exception_403;
			exit;
		}
		else{
			$deputy = $_SESSION['deputy'];
			$estado= ($deputy->allowed('Venta/'));
			if($estado){
				$parametro = array();
				$codigo_venta = isset($_POST['codigo_venta'])?strip_tags($_POST['codigo_venta']):'';
				$model_detalle = new Model_Detalle();
				$detalle=$model_detalle->findDetalle($codigo_venta);
				echo json_encode($detalle); 
				exit;
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
			$estado= ($deputy->allowed('Venta/create'));
			if($estado){
				$parametro = array();
				$model_usuario = new Model_Usuario();
				$vendedores = $model_usuario->listarVendedores();
				$parametro['vendedores']=$vendedores;
				$model_producto = new Model_Producto();
				$productos = $model_producto->listaProductos();
				$parametro['productos']=$productos;	
				
				$vista = Kodwoo_View::factory('/Venta/create', $parametro);
				$this->response->body($vista);	
			}		
			

			else{
				throw new HTTP_Exception_403;
				exit;
				
			}				
		
		}

	}

	public function action_addProducto(){
		if (!isset($_SESSION['validado'])){
			throw new HTTP_Exception_403;
			exit;
		}
		else{
			$deputy = $_SESSION['deputy'];
			$estado= ($deputy->allowed('Venta/addProducto'));
			if($estado){
				$parametro = array();
				$id = isset($_POST['id'])?strip_tags($_POST['id']):'';
				$cantidad = isset($_POST['cantidad'])?strip_tags($_POST['cantidad']):'';
				$model_producto = new Model_Producto();
				$producto = $model_producto->listarProducto($id);	
				$precio=$producto[0]['precio_producto'];
				$producto[0]['precio_producto'] ="$".number_format(intval($producto[0] ['precio_producto']), 0, '.', '.');
				$producto[0]['cantidad']=$cantidad;
				$producto[0]['subtotal']="$".number_format(intval($precio)*$producto[0]['cantidad'], 0, '.', '.');
				// echo ('<tr>
				// 		<td>'.$cont.'</td>
				// 		<td>'.$producto[0] ['codigo_producto'].'</td>
				// 		<td>'.$producto[0] ['nombre_producto'].'</td>
				// 		<td>'.$producto[0] ['nombre_tipo'].'</td>
				// 		<td>$'.number_format(intval($producto[0] ['precio_producto']), 0, '.', '.').'</td>
				// 		<td>'.$cantidad.'</td>
				// 		<td><span>$'.number_format(intval($producto[0] ['precio_producto'])*intval($cantidad), 0, '.', '.').'</span></td>
				// 	</tr>');
				echo json_encode($producto);
				exit;
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
			$estado= ($deputy->allowed('Venta/new'));
			if($estado){
				
				$tabla = isset($_POST['tabla'])?strip_tags($_POST['tabla']):'';
				$vendedor = isset($_POST['vendedor'])?strip_tags($_POST['vendedor']):'';
				$fecha = isset($_POST['fecha'])?strip_tags($_POST['fecha']):'';
				$tablaArray= (json_decode($tabla, true));
				$total=0;
				foreach ($tablaArray as $valor) {
					$model_producto = new Model_Producto();
					$producto = $model_producto->listarProducto($valor["Codigo"]);	
					$precio=$producto[0]['precio_producto'];
					$total = $total+($precio * $valor["Cantidad"] );
				}
				
				
				$model_venta= new Model_Venta();
				$maximo = $model_venta ->lastVenta();
				$ultimaVenta=0;
				if(($maximo[0]['maximo'])=='null'){
					$ultimaVenta=1;
				}else{
					$ultimaVenta=(intval($maximo[0]['maximo'])+1);	
				}
				$model_venta->newVenta($ultimaVenta,$vendedor,$fecha,$total);

				$model_detalle = new Model_Detalle();
				foreach ($tablaArray as $valor) {
					$model_producto = new Model_Producto();
					$producto = $model_producto->listarProducto($valor["Codigo"]);	
					$precio=$producto[0]['precio_producto'];    
					$model_detalle->newDetalle($ultimaVenta,$valor["Cantidad"],($precio*$valor["Cantidad"]),$valor["Codigo"]);
					
				}

				$ventaExito=$model_venta ->findVenta($ultimaVenta);
				$ventaExitoDetalle=$model_detalle->findDetalle($ultimaVenta);
				$factura['ventaExito']=$ventaExito;
				$factura['ventaExitoDetalle']=$ventaExitoDetalle;
				echo json_encode($factura);  
				exit;	
			
			}		
			

			else{
				throw new HTTP_Exception_403;
				exit;
				
			}				
			
		}
	}


	
} 
