<?php

class Motivo_modelo extends MY_Model {
	
	public function __construct() {
		parent::__construct();
	}

	public function lista_motivos() {
		$result = $this -> prepare_curl('motivoListar', 'GET', true, null);

		$motivos = json_decode($result, true);
		return $motivos;
	}

	public function exclui_motivo($id_motivo) {
		$data = array('id' => $id_motivo);
		$data_string = json_encode($data);

		return $this -> prepare_curl('motivoDeletar', 'POST', false, $data_string);
	}

	public function altera_motivo($id_motivo, $descricao) {
		$data = array('id' => $id_motivo, 'descricao' => $descricao);
		$data_string = json_encode($data);

		return $this -> prepare_curl('motivoAlterar', 'POST', false, $data_string);
	}

	public function cadastra_motivo($descricao) {
		$data = array('descricao' => $descricao);
		$data_string = json_encode($data);

		return $this -> prepare_curl('motivoCadastrar', 'POST', false, $data_string);
	}
	
}