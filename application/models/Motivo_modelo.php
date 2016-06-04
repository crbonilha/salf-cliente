<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Motivo_modelo extends MY_Model {

	public function __construct() {
		parent::__construct();

		$this -> metodo = 'motivo';
	}

	public function lista($params) {
		return parent::lista(isset($params) ? $params['id'] : null);
	}

	public function prepara_exclui($params) {
		return parent::exclui($params['id']);
	}

	public function prepara_altera($params) {
		return parent::altera($params['id'], array(
			'descricao' => $params['descricao']
		));
	}

	public function prepara_cadastra($params) {
		return parent::cadastra(array(
			'descricao' => $params['descricao']
		));
	}

}
