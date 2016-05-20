<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function logar($login, $senha){
		$data = array('usuario' => $login, 'senha' => $senha);
		$data_string = json_encode($data);

		$ch = curl_init('http://localhost:8080/salf-server/webresources/salf_server/login');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'Content-Type: application/json',
		    'Content-Length: ' . strlen($data_string))
		);

		$result = curl_exec($ch);
		$login = json_decode($result, true);
		var_dump($login);
	}

	public function index()
	{
		switch ($_POST['formulario']) {
			case 'execLogin':
				$this->logar($_POST['login'], $_POST['senha']);
				break;
			
			default:
				$data['titulo'] = null;
				$this -> load -> view('header', $data);
				$this -> load -> view('login', $data);
				$this -> load -> view('footer', $data);
				break;
		}
	}
}
