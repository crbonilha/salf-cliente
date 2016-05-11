<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Envia extends CI_Controller {

	function logar($login, $senha){
		$data = array($login,$senha);
		$data_string = json_encode($data);                                                                                   

		$ch = curl_init('http://localhost:8080/salf-server/webresources/salf_server/post');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'Content-Type: application/json',
		    'Content-Length: ' . strlen($data_string))
		);                                                                                                                   

		$result = curl_exec($ch);
		echo $result;
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
