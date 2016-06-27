<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_modelo extends MY_Model {

	public function __construct() {
		parent::__construct();

		$this -> metodo = 'login';
	}

	public function login($user, $password) {
		return parent::prepare_curl($this -> metodo, 'POST', null, $user, $password);
	}

}
