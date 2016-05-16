<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sala extends CI_Controller {

	public function lista_salas() {
		$ch = curl_init('http://localhost:8080/salf-server/webresources/salf_server/listaSalas');
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

	public function exclui_sala($id_sala) {
		$data = array('id_sala' => $id_sala);
		$data_string = json_encode($data);

		$ch = curl_init('http://localhost:8080/salf-server/webresources/salf_server/excluiSala');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'Content-Type: application/json',
		    'Content-Length: ' . strlen($data_string)
		));

		curl_exec($ch);
	}

	public function altera_sala($id_sala, $descricao) {
		$data = array('id_sala' => $id_sala, 'descricao' => $descricao);
		$data_string = json_encode($data);

		$ch = curl_init('http://localhost:8080/salf-server/webresources/salf_server/alteraSala');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'Content-Type: application/json',
		    'Content-Length: ' . strlen($data_string)
		));

		curl_exec($ch);
	}

	public function cadastra_sala($descricao) {
		$data = array('descricao' => $descricao);
		$data_string = json_encode($data);

		$ch = curl_init('http://localhost:8080/salf-server/webresources/salf_server/cadastraSala');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'Content-Type: application/json',
		    'Content-Length: ' . strlen($data_string)
		));

		curl_exec($ch);
	}

	public function index() {
		$data['titulo'] = 'Salas';
		$data['estilos'] = array('sala');
		$data['admin'] = true;

		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			if(isset($_POST['excluir']) && isset($_POST['id_sala'])) {
				$this -> exclui_sala($_POST['id_sala']);
			} else if(isset($_POST['alterar']) && isset($_POST['id_sala']) && isset($_POST['descricao'])) {
				$this -> altera_sala($_POST['id_sala'], $_POST['descricao']);
			} else if(isset($_POST['cadastrar']) && isset($_POST['descricao'])) {
				$this -> cadastra_sala($_POST['descricao']);
			}
		}

		$data['salas'] = $this -> lista_salas();

		$this -> load -> view('header', $data);
		$this -> load -> view('sala', $data);
		$this -> load -> view('footer', $data);
	}

}
