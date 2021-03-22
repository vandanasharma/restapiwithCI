<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		ini_set('display_errors',1);
		 $this->output->enable_profiler(TRUE);
 		//$db_obj = $this->load->database();

			$this->db->query('select 1= 1');			
			
			echo "done";		
		$this->load->view('welcome_message');
	}
	
	public function fetchAllPosts(){
		ini_set('display_errors',1);
		echo "sgn";die;
	}
}
