<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Envia extends CI_Controller {

	public function index()
	{
		$login = array ($_POST['login'], $_POST['senha']);
		$json = json_encode($login);
		echo $json;
	}
}
