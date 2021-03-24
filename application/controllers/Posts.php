<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'/libraries/REST_Controller.php';

use CodeIgniter\HTTP\Response;
use RestServer\Libraries\Rest_Controller;

class Posts extends Rest_Controller {

	public function __construct(){

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
		$this->output->enable_profiler(TRUE);
		$this->load->view('welcome_message');
	}
	
	public function getSelectedPost_get(){
		try{

			$postId = $this->input->get('id');
			if(isset($this->uri) && !empty($this->uri)){
				$postId = $this->uri->segment(3);
			}else if(null!=$this->input->post('Data')){
				$reqData = $this->input->post('Data');
				$requestData= json_decode($reqData);
				$postId = $requestData->request->body->id;
			}


			if(is_numeric($postId)){
				$posts = $this->Posts_model->getPostById($postId);

				$this->response($posts, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
			}
		}catch(Exception $e){
			die("Something is wrong!".$e->getMessage());
		}

	}
	
	public function fetchPostById_post(){
		try{
			$reqData=[];

			if(isset($this->uri) && !empty($this->uri)){
				$postId = $this->uri->segment(3);
			}else if(null!=$this->input->post('Data')){
				$reqData = $this->input->post('Data');
				$requestData= json_decode($reqData);
				$postId = $requestData->request->body->id;
			}

			if(is_numeric($postId) && $postId>0){
				$posts = $this->Posts_model->getPostById($postId);

				$this->response($posts, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
			}
		}catch(Exception $e){
			die("Something is wrong!".$e->getMessage());
		}
	}
	public function fetchAllPosts_post(){

		try{
			$posts = $this->Posts_model->get_all_entries();

			$this->response($posts, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
		}catch(Exception $e){
			die("Something is wrong!".$e->getMessage());
		}
	}
	
	public function deletePost_delete(){

		try{
			$reqData=$msg=[];
			$postId = 0;
			if(isset($this->uri) && !empty($this->uri)){
				$postId = trim($this->uri->segment(3));
			}else if(null!=$this->input->post('Data')){
				$reqData = $this->input->post('Data');
				$requestData= json_decode($reqData);
				$postId = trim($requestData->request->body->id);
			}

			if(is_numeric($postId) && $postId>0){

				$result = $this->Posts_model->deletePost($postId);
				//$msg = ['Success'=>true,'Message'=>'Operation completed successfully','StatusCode'=>200];
			if($result) {
				$msg = ['Success'=>true,'Message'=>'Operation completed successfully','StatusCode'=>REST_Controller::HTTP_OK];
				$this->response($msg, REST_Controller::HTTP_OK);
			}
			else
			{
				$msg = ['Success'=>false,'Message'=>'Invalid PostId','StatusCode'=>REST_Controller::HTTP_NO_CONTENT];
				$this->response($msg, REST_Controller::HTTP_NO_CONTENT); // OK (200) being the HTTP response code
			}
				//$this->response($msg, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
			}else{
				$msg = ['Success'=>false,'Message'=>'Invalid PostId','StatusCode'=>400];
				$this->response($msg, REST_Controller::HTTP_BAD_REQUEST);
			}
		}catch(Exception $e){
			die("Something is wrong!".$e->getMessage());
		}

	}
	
	public function updatePost_put(){
		try{
			$reqData=$msg=$requestData=$updArr=[];
			$postId=0;
			$headline=$url=$image=$dateCreated=$datePublished=$inLanguage="";
			$contentLocation=$authorId=$publisherId=$articleSection=$articleBody=$keywords=$active="";
			if(null!=$this->input->raw_input_stream){
				$rawInput = json_decode($this->input->raw_input_stream);

				$reqData = $rawInput->request;
				$requestData= $reqData;
				$postId = sanitizeData($requestData->body->postId,'int');
				$headline = sanitizeData($requestData->body->headline);
				$headline = addslashes($headline);
				if($headline!="") $updArr['headline']=$headline;

				$url = sanitizeData($requestData->body->url);
				if($url!="") $updArr['url']=$url;
				$image = sanitizeData($requestData->body->image);
				if($image!="") $updArr['image']=$image;

				$dateCreated = sanitizeData($requestData->body->dateCreated);
				if(!validateDateTime($dateCreated)){
					$msg = ['Success'=>false,'Message'=>'Invalid dateCreated','StatusCode'=>400];
					$this->response($msg, REST_Controller::HTTP_BAD_REQUEST);					
				};
				if($dateCreated!="") $updArr['dateCreated']=$dateCreated;
				$datePublished = sanitizeData($requestData->body->datePublished);
				if(!validateDateTime($datePublished)){
					$msg = ['Success'=>false,'Message'=>'Invalid datePublished','StatusCode'=>400];
					$this->response($msg, REST_Controller::HTTP_BAD_REQUEST);
				};
				if($datePublished!="") $updArr['datePublished']=$datePublished;

				$inLanguage = sanitizeData($requestData->body->inLanguage);
				if($inLanguage!="") $updArr['inLanguage']=$inLanguage;

				$contentLocation = sanitizeData($requestData->body->contentLocation);
				if($contentLocation!="") $updArr['contentLocation']=$contentLocation;

				$authorId = sanitizeData($requestData->body->authorId,'INT');
				if($authorId!="") $updArr['authorId']=$authorId;

				$publisherId = sanitizeData($requestData->body->publisherId,'INT');
				if($publisherId!="") $updArr['publisherId']=$publisherId;

				$articleSection = sanitizeData($requestData->body->articleSection);
				if($articleSection!="") $updArr['articleSection']=$articleSection;

				$articleBody = sanitizeData($requestData->body->articleBody);
				if($articleBody!="") $updArr['articleBody']=$articleBody;

				$keywords = sanitizeData($requestData->body->keywords);
				if($keywords!="") $updArr['keywords']=$keywords;

				$active = sanitizeData($requestData->body->active,'INT');
				if($active!="") $updArr['active']=$active;

			}else{
				$msg = ['Success'=>false,'Message'=>'Data not available','StatusCode'=>400];
				$this->response($msg, REST_Controller::HTTP_BAD_REQUEST);
			}

			if(null!= ($this->input->raw_input_stream) && count($updArr)>0){

				$result = $this->Posts_model->updatePost("tblpost",$postId,$updArr);
				if($result) {
					$msg = ['Success'=>true,'Message'=>'Operation completed successfully','StatusCode'=>REST_Controller::HTTP_CREATED];
					$this->response($msg, REST_Controller::HTTP_CREATED);
				}
				else
				{
					$msg = ['Success'=>false,'Message'=>'Invalid PostId','StatusCode'=>REST_Controller::HTTP_NO_CONTENT];
					$this->response($msg, REST_Controller::HTTP_NO_CONTENT); // OK (200) being the HTTP response code
				}
			}else{
				$msg = ['Success'=>false,'Message'=>'Invalid PostId','StatusCode'=>400];
				$this->response($msg, REST_Controller::HTTP_BAD_REQUEST);
			}
		}catch(Exception $e){
			die("Something is wrong!".$e->getMessage());
		}

	}



	public function createPost_put(){
		try{
			$reqData=$msg=$requestData=[];
			$headline=$url=$image=$dateCreated=$datePublished=$inLanguage="";
			$contentLocation=$authorId=$publisherId=$articleSection=$articleBody=$keywords=$active="";
			if(null!=$this->input->raw_input_stream){
				$rawInput = json_decode($this->input->raw_input_stream);

				$reqData = $rawInput->request;
				$requestData= $reqData;

				$headline = addslashes(sanitizeData($requestData->body->headline));

				$url = sanitizeData($requestData->body->url);
				$image = sanitizeData($requestData->body->image);

				$dateCreated = sanitizeData($requestData->body->dateCreated);
				if(!validateDateTime($dateCreated)){
					$msg = ['Success'=>false,'Message'=>'Invalid dateCreated','StatusCode'=>400];
					$this->response($msg, REST_Controller::HTTP_BAD_REQUEST);					
				};
				$datePublished = sanitizeData($requestData->body->datePublished);
				if(!validateDateTime($datePublished)){
					$msg = ['Success'=>false,'Message'=>'Invalid datePublished','StatusCode'=>400];
					$this->response($msg, REST_Controller::HTTP_BAD_REQUEST);					
				};
				$inLanguage = addslashes(sanitizeData($requestData->body->inLanguage));
				$contentLocation = addslashes(sanitizeData($requestData->body->contentLocation));
				$authorId = sanitizeData($requestData->body->authorId,'INT');
				$publisherId = sanitizeData($requestData->body->publisherId,'INT');
				$articleSection = addslashes(sanitizeData($requestData->body->articleSection));
				$articleBody = addslashes(sanitizeData($requestData->body->articleBody));
				$keywords = addslashes(sanitizeData($requestData->body->keywords));
				$active = sanitizeData($requestData->body->active,'INT');

			}else{
				$msg = ['Success'=>false,'Message'=>'Data not available','StatusCode'=>400];
				$this->response($msg, REST_Controller::HTTP_BAD_REQUEST);
			}

			if(null!= ($this->input->raw_input_stream)){

				$this->Posts_model->insertPost($headline,$url,$image,$dateCreated,$datePublished,$inLanguage,$contentLocation,$authorId,$publisherId,$articleSection,$articleBody,$keywords,$active);
				$msg = ['Success'=>true,'Message'=>'Operation completed successfully','StatusCode'=>REST_Controller::HTTP_CREATED];

				$this->response($msg, REST_Controller::HTTP_CREATED); // OK (200) being the HTTP response code
			}else{
				$msg = ['Success'=>false,'Message'=>'Invalid PostId','StatusCode'=>400];
				$this->response($msg, REST_Controller::HTTP_BAD_REQUEST);
			}
		}catch(Exception $e){
			die("Something is wrong!".$e->getMessage());
		}

	}
}
