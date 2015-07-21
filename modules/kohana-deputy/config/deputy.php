<?php defined('SYSPATH') or die('No direct script access.');

return array
(
	'autoload'	=> TRUE,
	'resources'	=> array(),
	'roles' => array
		(
			'administrador'	=> array
			(

				'allow' => array
			    (
			        'Session/home',
			        'Venta/*',
			        'Usuario/*',
			        'Consulta/*', 
			        'Producto/*',
			        'Categoria/*'
			    ),
			    'deny'  => array
			    (
			         
			    )
			),
			'consulta'	=> array
			(

				'allow' => array
			    (
			      'Session/home',
			      'Consulta/*', 
			      'Venta/', 
			      'Usuario/', 
			      'Producto/',
			      'Categoria/'
			    ),
			    'deny'  => array
			    (
			       	'Venta/create',
			        'Venta/addProducto',
			        'Venta/new',
			    )
			),
			'vendedor'	=> array
			(

				'allow' => array
			    (
			    	'Session/home',
			        'Venta/create',
			        'Venta/addProducto',
			        'Venta/new'
			    ),
			    'deny'  => array
			    (
			        'Usuario/*',
			        'Consulta/*', 
			        'Producto/*',
			        'Categoria/*'
			    )
			)
		)
);
