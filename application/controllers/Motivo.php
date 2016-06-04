<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Motivo extends CI_Controller {

	public function index() {
		$data['titulo'] = 'Motivos de reserva';
		$data['estilos'] = array('crud');
		$data['admin'] = true; // TODO
		$data['debug'] = true;

		$this -> load -> model('motivo_modelo');
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			$data['crud_http'] = $this -> motivo_modelo -> crud($_POST);
		}

        $data['get_http'] = $this -> motivo_modelo -> lista(null);
		$data['motivos'] = json_decode($data['get_http']['response_body_ne'], true);

		$this -> load -> view('header', $data);
		$this -> load -> view('motivo', $data);
		$this -> load -> view('footer', $data);
	}

}
