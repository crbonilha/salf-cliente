<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reserva extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this -> load -> helper('cookie');
		$this -> adm = ($this -> input -> cookie('adm') == 'true' ? true : false);

		$this -> load -> library('util');
		if(!$this -> util -> validacao_adm()) {
			$this -> adm = true;
		}
	}

	public function index() {
		$data['titulo'] = 'Reserva';
		$data['estilos'] = array('crud');
		$data['admin'] = $this -> adm;
		$data['debug'] = true;

		$this -> load -> model('reserva_modelo');
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			$data['crud_http'] = $this -> reserva_modelo -> crud($_POST);
		}

        $data['get_http'] = $this -> reserva_modelo -> lista(null);
        $answer = json_decode($data['get_http']['response_body_ne'], true);
        if(!isset($answer['error'])) {
			$data['reservas'] = $answer;
        }

		$this -> load -> model('sala_modelo');
		$data['get_http'] = $this -> sala_modelo -> lista(null);
        $answer = json_decode($data['get_http']['response_body_ne'], true);
        if(!isset($answer['error'])) {
			$data['salas'] = $answer;
        }

		$this -> load -> model('motivo_modelo');
		$data['get_http'] = $this -> motivo_modelo -> lista(null);
        $answer = json_decode($data['get_http']['response_body_ne'], true);
        if(!isset($answer['error'])) {
			$data['motivos'] = $answer;
        }

        $this -> load -> model('horario_modelo');
		$data['get_http'] = $this -> horario_modelo -> lista(null);
        $answer = json_decode($data['get_http']['response_body_ne'], true);
        if(!isset($answer['error'])) {
			$data['horarios'] = $answer;
        }

		$this -> load -> view('header', $data);
		$this -> load -> view('reserva', $data);
		$this -> load -> view('footer', $data);
	}

}
