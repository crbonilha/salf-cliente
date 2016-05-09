<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Envia extends CI_Controller {

	function logar($login, $senha){
		$mensagem = json_encode(array($login,$senha));
		$resultado = file_get_contents('endereço_do_servidor/classe/metodo?login='.$login.'&senha='.$senha);
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
