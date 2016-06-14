<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reserva_modelo extends MY_Model {

	public function __construct() {
		parent::__construct();

		$this -> metodo = 'reserva';
	}

	public function lista($params) {
		return parent::lista(isset($params) ? $params['id'] : null);
	}

	public function prepara_exclui($params) {
		return parent::exclui($params['id']);
	}

	public function prepara_altera($params) {
		return parent::altera($params['id'], array(
			'sala'       => $params['sala'],
			'motivo'     => $params['motivo'],
			'data'       => $params['data'],
			'id_horario' => $params['id_horario'],
		));
	}

	public function prepara_cadastra($params) {
		return parent::cadastra(array(
			'sala'       => $params['sala'],
			'motivo'     => $params['motivo'],
			'data'       => $params['data'],
			'id_horario' => $params['id_horario'],
		));
	}

}
