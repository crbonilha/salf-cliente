<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reserva extends CI_Controller {

	public function index() {
		$data['titulo'] = 'Reserva';
		$data['estilos'] = array('crud');
		$data['admin'] = true; // TODO
		$data['debug'] = true;

		$this -> load -> model('reserva_modelo');
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			$data['crud_http'] = $this -> reserva_modelo -> crud($_POST);
		}

        $data['get_http'] = $this -> reserva_modelo -> lista(null);
		$data['reservas'] = json_decode($data['get_http']['response_body_ne'], true);

		$this -> load -> model('sala_modelo');
		$data['get_http'] = $this -> sala_modelo -> lista(null);
		$data['salas'] = json_decode($data['get_http']['response_body_ne'], true);

		$this -> load -> model('motivo_modelo');
		$data['get_http'] = $this -> motivo_modelo -> lista(null);
		$data['motivos'] = json_decode($data['get_http']['response_body_ne'], true);

		$this -> load -> view('header', $data);
		$this -> load -> view('reserva', $data);
		$this -> load -> view('footer', $data);
	}

}
