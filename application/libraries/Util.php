<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Util {

	// flag que libera funções de administrador para usuário comum (para testes)
	public function validacao_adm() {
		return true;
	}

}
