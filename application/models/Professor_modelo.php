<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Professor_modelo extends MY_Model {

	public function __construct() {
		parent::__construct();

		$this -> metodo = 'professor';
	}

	public function lista($params) {
		return parent::lista(isset($params) ? $params['id'] : null);
	}

	public function prepara_exclui($params) {
		return parent::exclui($params['id']);
	}

	public function prepara_altera($params) {
		return parent::altera($params['id'], array(
			'nome'            => $params['nome'],
			'senha'           => $params['senha'],
			'id_departamento' => $params['id_departamento'],
			'email'           => $params['email']
		));
	}

	public function prepara_cadastra($params) {
		return parent::cadastra(array(
			'nome'            => $params['nome'],
			'senha'           => $params['senha'],
			'id_departamento' => $params['id_departamento'],
			'email'           => $params['email']
		));
	}

}
