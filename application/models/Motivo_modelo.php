<?php

class Motivo_modelo extends CI_Model {
	
	public function __construct() {
		parent::__construct();
		
		$this -> load -> database();
	}
	
	function get_motivos() {
		$query = $this -> db -> get_where('motivo', array('incidencia' => '0'));
		return $query -> result_array();
	}

	function get_incidencias() {
		$query = $this -> db -> get_where('motivo', array('incidencia' => '1'));
		return $query -> result_array();
	}
	
}