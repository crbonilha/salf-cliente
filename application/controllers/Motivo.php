<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Motivo extends CI_Controller {

	public function index()
	{
		$data['titulo'] = 'Motivos de reserva';

		$this -> load -> model('motivo_modelo');
		$data['motivos'] = $this -> motivo_modelo -> get_motivos();

		$this -> load -> view('header', $data);
		$this -> load -> view('motivo', $data);
		$this -> load -> view('footer', $data);
	}
}
