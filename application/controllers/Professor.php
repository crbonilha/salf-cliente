<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Professor extends CI_Controller {

	public function index() {
		$data['titulo'] = 'Professores';
		$data['estilos'] = array('crud');
		$data['admin'] = true; // TODO
		$data['debug'] = true;

		$this -> load -> model('professor_modelo');
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			$data['crud_http'] = $this -> professor_modelo -> crud($_POST);
		}

        $data['get_http'] = $this -> professor_modelo -> lista(null);
		$data['professores'] = json_decode($data['get_http']['response_body_ne'], true);

		$this -> load -> model('departamento_modelo');
		$data['dep_get_http'] = $this -> departamento_modelo -> lista(null);
		$data['departamentos'] = json_decode($data['dep_get_http']['response_body_ne'], true);

		$this -> load -> view('header', $data);
		$this -> load -> view('professor', $data);
		$this -> load -> view('footer', $data);
	}

}
