<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'/libraries/REST_Controller.php';

use CodeIgniter\HTTP\Response;
use RestServer\Libraries\Rest_Controller;

class Posts extends Rest_Controller {

	public function __construct(){
		ini_set('display_errors', 1);
		parent::__construct();
		$this->load->model("Posts_model");
	}
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
		$this->load->view('welcome_message');
	}
	
	public function getSelectedPost_get(){
		try{

			$postId = $this->input->get('id');


			if(is_numeric($postId)){
				$posts = $this->Posts_model->getPostById($postId);
				//print_r(array_values($posts));
				$this->response($posts, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
			}
		}catch(Exception $e){
			die("Something is wrong!".$e->getMessage());
		}

	}
	
	public function fetchPostById_post(){
		try{

			$reqData = $this->input->post('Data');
			$requestData= json_decode($reqData);
			$postId = $requestData->request->body->id;

			if(is_numeric($postId)){
				$posts = $this->Posts_model->getPostById($postId);
				//print_r(array_values($posts));
				$this->response($posts, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
			}
		}catch(Exception $e){
			die("Something is wrong!".$e->getMessage());
		}		
	}
	public function fetchAllPosts_post(){
		
		ini_set('display_errors',1);
		try{
		$posts = $this->Posts_model->get_all_entries();
		//print_r(array_values($posts));
		$this->response($posts, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
		}catch(Exception $e){
			die("Something is wrong!".$e->getMessage());
		}
	}
	
	public function deletePost_delete(){

	}
	
	public function updatePost_put(){

	}

}
