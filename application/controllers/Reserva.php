<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reserva extends CI_Controller {

	public function index() {
		$data['titulo'] = 'Reserva';
		$data['estilos'] = array('crud');
		$data['admin'] = true; // TODO

		$this -> load -> model('reserva_modelo');
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			switch ($_POST['formulario']) {
				case 'cadastrar':
					$this -> reserva_modelo -> cadastra(array(
						'sala' => $_POST['sala'],
						'motivo' => $_POST['motivo'],
						'data' => $_POST['data'],
						'hora' => $_POST['hora'],
					));
					break;
				case 'alterar':
					$this -> reserva_modelo -> altera($_POST['id'], array(
						'sala' => $_POST['sala'],
						'motivo' => $_POST['motivo'],
						'data' => $_POST['data'],
						'hora' => $_POST['hora'],
					));
					break;
				case 'excluir':
					$this -> reserva_modelo -> exclui($_POST['id']);
					break;
				default:
					echo 'Problema ao executar operação';
			}
		}

		$data['reservas'] = $this -> reserva_modelo -> lista(null);

		$this -> load -> view('header', $data);
		$this -> load -> view('reserva', $data);
		$this -> load -> view('footer', $data);
	}

}
