<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Motivo extends CI_Controller {

	public function lista_motivos() {
		$ch = curl_init('http://localhost:8080/salf-server/webresources/salf_server/listaMotivos');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'Content-Type: application/json',
		    'Content-Length: 0'
		));

		$result = curl_exec($ch);
		$motivos = json_decode($result, true);
		//echo var_dump($motivos);

		return $motivos;
	}

	public function index() {
		$data['titulo'] = 'Motivos de reserva';
		$data['estilos'] = array('motivo');
		$data['admin'] = true;

		$data['motivos'] = $this -> lista_motivos();

		$this -> load -> view('header', $data);
		$this -> load -> view('motivo', $data);
		$this -> load -> view('footer', $data);
	}

}
