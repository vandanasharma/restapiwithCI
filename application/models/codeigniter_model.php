<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class codeigniter_model extends CI_Model{

	public function __construct() {

		parent::__construct();
		//$this->load->database();

	}


public function get_all_entries() {
  $query = $this->db->get('emp');
  $results = array();
  foreach ($query->result() as $result) {
    $results[] = $result;
  }
  return $results;
}

}




?>