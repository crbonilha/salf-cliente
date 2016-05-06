<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$data['titulo'] = null;

		$this -> load -> view('header', $data);
		$this -> load -> view('login', $data);
		$this -> load -> view('footer', $data);
	}
}
