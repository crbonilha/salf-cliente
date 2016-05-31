<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Incidencia extends CI_Controller {

	public function index() {
		$data['titulo'] = 'Incidências';
		$data['estilos'] = array('crud');
		$data['admin'] = true; // TODO

		$this -> load -> model('incidencia_modelo');

		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			if(isset($_POST['excluir']) && isset($_POST['id'])) {
				$this -> incidencia_modelo -> exclui($_POST['id']);
			} else if(isset($_POST['alterar']) && isset($_POST['id']) && isset($_POST['descricao'])) {
				$this -> incidencia_modelo -> altera($_POST['id'], array(
					'descricao' => $_POST['descricao']
				));
			} else if(isset($_POST['cadastrar']) && isset($_POST['descricao'])) {
				$this -> incidencia_modelo -> cadastra(array(
					'descricao' => $_POST['descricao']
				));
			}
		}

		$data['incidencias'] = $this -> incidencia_modelo -> lista(null);

		$this -> load -> view('header', $data);
		$this -> load -> view('incidencia', $data);
		$this -> load -> view('footer', $data);
	}

}
