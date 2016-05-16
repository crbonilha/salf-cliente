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

	public function exclui_motivo($id_motivo) {
		$data = array('id_motivo' => $id_motivo);
		$data_string = json_encode($data);

		$ch = curl_init('http://localhost:8080/salf-server/webresources/salf_server/excluiMotivo');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'Content-Type: application/json',
		    'Content-Length: ' . strlen($data_string)
		));

		curl_exec($ch);
	}

	public function altera_motivo($id_motivo, $descricao) {
		$data = array('id_motivo' => $id_motivo, 'descricao' => $descricao);
		$data_string = json_encode($data);

		$ch = curl_init('http://localhost:8080/salf-server/webresources/salf_server/alteraMotivo');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'Content-Type: application/json',
		    'Content-Length: ' . strlen($data_string)
		));

		curl_exec($ch);
	}

	public function cadastra_motivo($descricao) {
		$data = array('descricao' => $descricao);
		$data_string = json_encode($data);

		$ch = curl_init('http://localhost:8080/salf-server/webresources/salf_server/cadastraMotivo');
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
		$data['titulo'] = 'Motivos de reserva';
		$data['estilos'] = array('motivo');
		$data['admin'] = true;

		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			if(isset($_POST['excluir']) && isset($_POST['id_motivo'])) {
				$this -> exclui_motivo($_POST['id_motivo']);
			} else if(isset($_POST['alterar']) && isset($_POST['id_motivo']) && isset($_POST['descricao'])) {
				$this -> altera_motivo($_POST['id_motivo'], $_POST['descricao']);
			} else if(isset($_POST['cadastrar']) && isset($_POST['descricao'])) {
				$this -> cadastra_motivo($_POST['descricao']);
			}
		}

		$data['motivos'] = $this -> lista_motivos();

		$this -> load -> view('header', $data);
		$this -> load -> view('motivo', $data);
		$this -> load -> view('footer', $data);
	}

}
