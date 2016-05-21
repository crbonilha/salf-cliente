<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sala_modelo extends MY_Model {
	
	public function __construct() {
		parent::__construct();
	}

	public function lista_salas() {
		$result = $this -> prepare_curl('salaListar', 'GET', true, null);

		$salas = json_decode($result, true);
		return $salas;
	}

	public function exclui_sala($id_sala) {
		$data = array('id' => $id_sala);
		$data_string = json_encode($data);

		return $this -> prepare_curl('salaDeletar', 'POST', false, $data_string);
	}

	public function altera_sala($id_sala, $descricao) {
		$data = array('id' => $id_sala, 'descricao' => $descricao);
		$data_string = json_encode($data);

		return $this -> prepare_curl('salaAlterar', 'POST', false, $data_string);
	}

	public function cadastra_sala($descricao) {
		$data = array('descricao' => $descricao);
		$data_string = json_encode($data);

		return $this -> prepare_curl('salaCadastrar', 'POST', false, $data_string);
	}
	
}