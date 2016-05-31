<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Incidencia_modelo extends MY_Model {

	public function __construct() {
		parent::__construct();

		$this -> metodo = 'incidencia';
	}

}
