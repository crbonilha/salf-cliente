<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sala extends CI_Controller {

	public function index() {
		$data['titulo'] = 'Salas';
		$data['estilos'] = array('crud');
		$data['admin'] = true; // TODO

		$this -> load -> model('sala_modelo');

		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			if(isset($_POST['excluir']) && isset($_POST['id'])) {
				$this -> sala_modelo -> exclui($_POST['id']);
			} else if(isset($_POST['alterar']) && isset($_POST['id']) && isset($_POST['descricao'])) {
				$this -> sala_modelo -> altera($_POST['id'], array(
					'descricao' => $_POST['descricao']
				));
			} else if(isset($_POST['cadastrar']) && isset($_POST['descricao'])) {
				$this -> sala_modelo -> cadastra(array(
					'descricao' => $_POST['descricao']
				));
			}
		}

		$data['salas'] = $this -> sala_modelo -> lista(null);

		$this -> load -> view('header', $data);
		$this -> load -> view('sala', $data);
		$this -> load -> view('footer', $data);
	}

}
