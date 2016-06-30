<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

	private $server_url;
	protected $metodo;

	public function __construct() {
		parent::__construct();

		$this -> server_url = 'http://localhost:8080/salf-server/webresources/salf_server/';
		//$this -> server_url = 'http://192.168.173.225:8000/';
	}

	/*
	chama os métodos responsáveis por preparar os parâmetros que serão
	enviados pelas requisições de crud (ex Motivo_modelo).
	assim o preparamento dos parâmetros sai do controlador e fica no modelo
	*/
	public function crud($params) {
		switch($params['formulario']) {
			case 'excluir':
				return $this -> prepara_exclui($params);
			case 'alterar':
				return $this -> prepara_altera($params);
			case 'cadastrar':
				return $this -> prepara_cadastra($params);
			default:
				return null;
		}
	}

	public function lista($id) {
		return $this -> prepare_curl($this -> metodo . ($id != null ? '/' . $id : ''), 'GET', null);
	}

	public function exclui($id) {
		return $this -> prepare_curl($this -> metodo . '/' . $id, 'DELETE', null);
	}

	public function altera($id, $array) {
		$data_string = json_encode($array);

		return $this -> prepare_curl($this -> metodo . '/' . $id, 'PUT', $data_string);
	}

	public function cadastra($array) {
		$data_string = json_encode($array);

		return $this -> prepare_curl($this -> metodo, 'POST', $data_string);
	}

	public function prepare_curl($action, $custom_request, $post_fields, $user = null, $password = null) {
		$ch = curl_init($this -> server_url . $action); // endereço do servidor
		$extra_headers = array();

		curl_setopt($ch, CURLOPT_HEADER, true); // para imprimir o header da resposta
		curl_setopt($ch, CURLINFO_HEADER_OUT, true); // para imprimir a requisição enviada
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $custom_request); // get, post, put ou delete
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // se trará resultados

		$this -> load -> helper('cookie');
 		$cuser = ($user === null ? $this -> input -> cookie('user') : $user);
		$cpassword = ($password === null ? $this -> input -> cookie('password') : $password);
		if($cuser != null && $cpassword != null) {
			$extra_headers []= 'user: ' . $cuser;
			$extra_headers []= 'password: ' . $cpassword;
		}

		if($post_fields != null) { // para enviar parâmetros no corpo
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
			$extra_headers []= 'Content-Type: application/json';
			$extra_headers []= 'Content-Length: ' . strlen($post_fields);
			
		}
		curl_setopt($ch, CURLOPT_HTTPHEADER, $extra_headers);

		// envia a requisição
		$response['all'] = curl_exec($ch);
		if($response['all'] !== false) {
			// informações sobre a requisição e resposta para debug
			$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
			$response['request_header'] = $this -> escape(curl_getinfo($ch, CURLINFO_HEADER_OUT));
			$response['request_body'] = $this -> escape($post_fields);
			$response['request'] = $response['request_header'] . $response['request_body'];
			$response['response_header'] = $this -> escape(substr($response['all'], 0, $header_size));
			$response['response_body'] = $this -> escape(substr($response['all'], $header_size));
			$response['response'] = $response['response_header'] . $response['response_body'];

			// não escapado pois precisa ser interpretado pelo php
			$response['response_body_ne'] = substr($response['all'], $header_size);
		} else {
			// servidor não respondeu
			$response['request'] = null;
			$response['response_body'] = "{\"error\": \"Não houve resposta do servidor.\"}";
			$response['response'] = null;
			$response['response_body_ne'] = "{\"error\": \"Não houve resposta do servidor.\"}";
		}

		return $response;
	}

	/*
	utilizado para substituir caracteres que não são interpretados
	corretamente pelo javascript/html
	*/
	private function escape($str) {
		$str = str_replace("\r\n", "\\n", $str);
		$str = str_replace("\"", "\'", $str);
		return $str;
	}

}
