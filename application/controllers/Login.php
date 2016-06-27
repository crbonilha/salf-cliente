<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index() {
		$data['titulo'] = 'Página inicial';
		$data['debug'] = true;

		$this -> load -> model('login_modelo');
		if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['formulario'] == 'execLogin') {
			$data['get_http'] = $this -> login_modelo -> login($_POST['login'], $_POST['senha']);
			$ans = json_decode($data['get_http']['response_body_ne'], true);

			if(isset($ans['adm'])) {
				$this -> load -> helper('cookie');
				$this -> input -> set_cookie(array(
					'name' => 'user',
					'value' => $_POST['login'],
					'expire' => '1234567'
				));
				$this -> input -> set_cookie(array(
					'name' => 'password',
					'value' => $_POST['senha'],
					'expire' => '1234567'
				));
				$this -> input -> set_cookie(array(
					'name' => 'adm',
					'value' => ($ans['adm'] ? 'true' : 'false'),
					'expire' => '1234567'
				));
				header('Location: ' . base_url() . 'index.php/reserva');
			}
		}

		$this -> load -> view('header', $data);
		$this -> load -> view('login', $data);
		$this -> load -> view('footer', $data);
	}

	public function logout() {
		$this -> load -> helper('cookie');
		delete_cookie('user');
		delete_cookie('password');
		delete_cookie('adm');

		header('Location: ' . base_url());
	}
}
