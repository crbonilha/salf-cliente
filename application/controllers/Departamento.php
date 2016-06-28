<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departamento extends CI_Controller {

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
		$data['titulo'] = 'Departamentos';
		$data['estilos'] = array('crud');
		$data['admin'] = $this -> adm;
		$data['debug'] = true;

		$this -> load -> model('departamento_modelo');
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			$data['crud_http'] = $this -> departamento_modelo -> crud($_POST);
		}

        $data['get_http'] = $this -> departamento_modelo -> lista(null);
        $answer = json_decode($data['get_http']['response_body_ne'], true);
        if(!isset($answer['error'])) {
			$data['departamentos'] = $answer;
        }

		$this -> load -> view('header', $data);
		$this -> load -> view('departamento', $data);
		$this -> load -> view('footer', $data);
	}

}
