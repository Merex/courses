<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProcCourse extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->output->enable_profiler(TRUE);
	}
	public function index()
	{
		$this->load->model('Course');
		$course=$this->Course->get_all_courses();		
		$this->load->view('course_display', array('courses' => $course));
	}

	public function addcourse(){
		$course = $this->input->post('c_name');
		$description = $this->input->post('c_desc');
		
		$this->load->model('Course');

		$course= $this->Course->add_course($course,$description);
		redirect("/");
		//$this->load->view('course_display');
	}

	public function dropcourse($id){
		//redirect("/");
		$this->session->set_userdata('id',$id);
		$this->load->model('Course');
		$course= $this->Course->get_course_by_id($id);
		
		$this->load->view('del_course', array('courses' => $course));
	}

	public function deletecourse($id){//TODO: load model to del
		$this->load->model('Course');
		$course=$this->Course->delete_course($id);
		redirect("/");
	}
}
