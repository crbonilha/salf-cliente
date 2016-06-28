<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Professor extends CI_Controller {

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
		$data['titulo'] = 'Professores';
		$data['estilos'] = array('crud');
		$data['admin'] = $this -> adm;
		$data['debug'] = true;

		$this -> load -> model('professor_modelo');
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			$data['crud_http'] = $this -> professor_modelo -> crud($_POST);
		}

        $data['get_http'] = $this -> professor_modelo -> lista(null);
        $answer = json_decode($data['get_http']['response_body_ne'], true);
        if(!isset($answer['error'])) {
			$data['professores'] = $answer;
        }

		$this -> load -> model('departamento_modelo');
		$data['dep_get_http'] = $this -> departamento_modelo -> lista(null);
        $answer = json_decode($data['dep_get_http']['response_body_ne'], true);
        if(!isset($answer['error'])) {
			$data['departamentos'] = $answer;
        }

		$this -> load -> view('header', $data);
		$this -> load -> view('professor', $data);
		$this -> load -> view('footer', $data);
	}

}
