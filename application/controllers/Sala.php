<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sala extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this -> load -> helper('cookie');
		$this -> adm = ($this -> input -> cookie('adm') == 'true' ? true : false);
	}

	public function index() {
		$data['titulo'] = 'Salas';
		$data['estilos'] = array('crud');
		$data['admin'] = $this -> adm;
		$data['debug'] = true;

		$this -> load -> model('sala_modelo');
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			$data['crud_http'] = $this -> sala_modelo -> crud($_POST);
		}

        $data['get_http'] = $this -> sala_modelo -> lista(null);
        $answer = json_decode($data['get_http']['response_body_ne'], true);
        if(!isset($answer['error'])) {
			$data['salas'] = $answer;
        }

		$this -> load -> view('header', $data);
		$this -> load -> view('sala', $data);
		$this -> load -> view('footer', $data);
	}

}
