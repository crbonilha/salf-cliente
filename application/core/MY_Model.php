<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

	private $server_url;
	protected $metodo;

	public function __construct() {
		parent::__construct();

		$this -> server_url = 'http://localhost:8080/salf-server/webresources/salf_server/';
	}

	public function lista() {
		$result = $this -> prepare_curl($this -> metodo . 'Listar', 'GET', true, null);

		$lista = json_decode($result, true);
		return $lista;
	}

	public function exclui($array) {
		$data_string = json_encode($array);

		return $this -> prepare_curl($this -> metodo . 'Deletar', 'POST', false, $data_string);
	}

	public function altera($array) {
		$data_string = json_encode($array);

		return $this -> prepare_curl($this -> metodo . 'Alterar', 'POST', false, $data_string);
	}

	public function cadastra($array) {
		$data_string = json_encode($array);

		return $this -> prepare_curl($this -> metodo . 'Cadastrar', 'POST', false, $data_string);
	}

	public function prepare_curl($action, $custom_request, $return_transfer, $post_fields) {
		$ch = curl_init($this -> server_url . $action);

		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $custom_request);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, $return_transfer);
		if($post_fields != null) {
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    	'Content-Type: application/json',
		    	'Content-Length: ' . strlen($post_fields)
			));
		}

		return curl_exec($ch);
	}

}
