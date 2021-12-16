<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Im_render extends CI_Controller{
	function __construct(){
		$this->CI =& get_instance();			
	}
	
	function main($view_page, $data = NULL){
		$data['view_page'] = $view_page;
		if($data != NULL){
			$this->CI->load->view('customer/main_customer', $data);	
		}
		else{
			$this->CI->load->view('customer/main_customer');
		}
	}

	function main_customer($view_page, $data = NULL){
		$data->view_page = $view_page;
		if($data != NULL){
			$this->CI->load->view('customer/main_customer', $data);	
		}
		else{
			$this->CI->load->view('customer/main_customer');
		}
	}
	
	function main_form($view_page, $data = NULL){
		$data['view_page'] = $view_page;
		if($data != NULL){
			$this->CI->load->view('envi/main_form', $data);	
		}
		else{
			$this->CI->load->view('envi/main_form');
		}
	}

	function main_login($view_page, $data = NULL){
		$data['view_page'] = $view_page;
		if($data != NULL){
			$this->CI->load->view('envi/main_login', $data);	
		}
		else{
			$this->CI->load->view('envi/main_login');
		}
	}

	function main_profile($view_page, $data = NULL){
		$data['view_page'] = $view_page;
		if($data != NULL){
			$this->CI->load->view('envi/main_profile', $data);	
		}
		else{
			$this->CI->load->view('envi/main_profile');
		}
	}
}
?>