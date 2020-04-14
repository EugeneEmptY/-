<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
class Main extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model("main_model");
	}
	public function index($start = 0){
		$this->load->library('pagination');
		$data["fetch_data"] = $this->main_model->fetch_data(3, $start);
		$config['base_url'] = base_url().'main/index/';
		$config['uri_segment'] = 3;
		$config['total_rows'] = $this->main_model->get_comments_count();
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['per_page'] = 3;
		$config['num_links'] = 3;
		$this->pagination->initialize($config);
		$data['pages'] = $this->pagination->create_links();
		$this->load->view("main_view", $data);
	}

	function comment($commentId){
		$data['comment']=$this->main_model->get_comment($commentId);
		$this->load->view('main_model', $data);
	}
 
 	public function form_validation(){
 		$this->load->library('form_validation');
 		$this->form_validation->set_rules("mail", "e-mail", 'required|valid_email');
		$this->form_validation->set_rules("text", "comment", 'required');
 
 		if($this->form_validation->run()){
 			$this->load->model("main_model");
 			$data = array(
				"username" =>$this->input->post("username"), 
 				"email" =>$this->input->post("mail"),
				"text" =>$this->input->post("text")
 			);
 			$this->main_model->insert_data($data);
 
			redirect(base_url() . "main/added");;
 		}
 		else{
 			$this->index();
 		}
 	}

	public function added(){
		$this->index();
	}
 }


