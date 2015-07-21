<?php defined('SYSPATH') OR die('No direct script access.');

class HTTP_Exception_403 extends Kohana_HTTP_Exception_403 {

	 public function get_response()
    {
        $view = View::factory('errors/403');
 
        // Remembering that `$this` is an instance of HTTP_Exception_404
        $view->message = $this->getMessage();
 
        $response = Response::factory()
            ->status(404)
            ->body($view->render());
 
        return $response;
    }
}