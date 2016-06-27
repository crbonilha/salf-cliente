<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Horario_modelo extends MY_Model {

	public function __construct() {
		parent::__construct();

		$this -> metodo = 'horarios';
	}

	public function lista($params) {
		return parent::lista(isset($params) ? $params['id'] : null);
	}
}
