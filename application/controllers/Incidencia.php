<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Incidencia extends CI_Controller {

	public function index() {
		$data['titulo'] = 'Incidências';
		$data['estilos'] = array('crud');
		$data['admin'] = true; // TODO
		$data['debug'] = true;

		$this -> load -> model('incidencia_modelo');
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			$data['crud_http'] = $this -> incidencia_modelo -> crud($_POST);
		}

        $data['get_http'] = $this -> incidencia_modelo -> lista(null);
		$data['incidencias'] = json_decode($data['get_http']['response_body_ne'], true);

		$this -> load -> view('header', $data);
		$this -> load -> view('incidencia', $data);
		$this -> load -> view('footer', $data);
	}

}
