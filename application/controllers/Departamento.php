<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departamento extends CI_Controller {

	public function index() {
		$data['titulo'] = 'Departamentos';
		$data['estilos'] = array('crud');
		$data['admin'] = true; // TODO
		$data['debug'] = true;

		$this -> load -> model('departamento_modelo');
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			$data['crud_http'] = $this -> departamento_modelo -> crud($_POST);
		}

        $data['get_http'] = $this -> departamento_modelo -> lista(null);
		$data['departamentos'] = json_decode($data['get_http']['response_body_ne'], true);

		$this -> load -> view('header', $data);
		$this -> load -> view('departamento', $data);
		$this -> load -> view('footer', $data);
	}

}
