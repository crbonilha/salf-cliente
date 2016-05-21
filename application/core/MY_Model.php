<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

	private $server_url;
	
	public function __construct() {
		parent::__construct();

		$this -> server_url = 'http://localhost:8080/salf-server/webresources/salf_server/';
	}

	public function prepare_curl($action, $custom_request, $return_transfer, $post_fields) {
		$ch = curl_init($this -> server_url . $action);

		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $custom_request);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, $return_transfer);
		if($post_fields != null) {
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    	'Content-Type: application/json',
		    	'Content-Length: ' . strlen($post_fields)
			));
		}

		return curl_exec($ch);
	}
	
}
