<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Motivo extends CI_Controller {

	public function index() {
		$data['titulo'] = 'Motivos de reserva';
		$data['estilos'] = array('motivo');
		$data['admin'] = true; // TODO

		$this -> load -> model('motivo_modelo');

		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			if(isset($_POST['excluir']) && isset($_POST['id'])) {
				$this -> motivo_modelo -> exclui_motivo($_POST['id']);
			} else if(isset($_POST['alterar']) && isset($_POST['id']) && isset($_POST['descricao'])) {
				$this -> motivo_modelo -> altera_motivo($_POST['id'], $_POST['descricao']);
			} else if(isset($_POST['cadastrar']) && isset($_POST['descricao'])) {
				$this -> motivo_modelo -> cadastra_motivo($_POST['descricao']);
			}
		}

		$data['motivos'] = $this -> motivo_modelo -> lista_motivos();

		$this -> load -> view('header', $data);
		$this -> load -> view('motivo', $data);
		$this -> load -> view('footer', $data);
	}

}
