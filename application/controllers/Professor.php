<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Professor extends CI_Controller {

	public function index() {
		$data['titulo'] = 'Professores';
		$data['estilos'] = array('crud');
		$data['admin'] = true; // TODO

		$this -> load -> model('professor_modelo');

		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			if(isset($_POST['excluir']) && isset($_POST['id'])) {
				$this -> professor_modelo -> exclui($_POST['id']);
			} else if(isset($_POST['alterar']) && isset($_POST['id']) && isset($_POST['nome']) &&
			isset($_POST['senha']) && isset($_POST['id_departamento']) && isset($_POST['email'])) {
				$this -> professor_modelo -> altera($_POST['id'], array(
					'nome'            => $_POST['nome'],
					'senha'           => $_POST['senha'],
					'id_departamento' => $_POST['id_departamento'],
					'email'           => $_POST['email'],
				));
			} else if(isset($_POST['cadastrar']) && isset($_POST['nome']) && isset($_POST['senha']) &&
			isset($_POST['id_departamento']) && isset($_POST['email'])) {
				$this -> professor_modelo -> cadastra(array(
					'nome'            => $_POST['nome'],
					'senha'           => $_POST['senha'],
					'id_departamento' => $_POST['id_departamento'],
					'email'           => $_POST['email'],
				));
			}
		}

		$data['professores'] = $this -> professor_modelo -> lista(null);

		$this -> load -> model('departamento_modelo');
		$data['departamentos'] = $this -> departamento_modelo -> lista(null);

		$this -> load -> view('header', $data);
		$this -> load -> view('professor', $data);
		$this -> load -> view('footer', $data);
	}

}
