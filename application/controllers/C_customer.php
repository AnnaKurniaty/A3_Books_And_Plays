<?php 
 
class C_customer extends CI_Controller{
 
	public function __construct(){
        parent::__construct();
        $this->load->model('M_customer');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));

        if($this->session->userdata('STATUS') != "login")
        {
            redirect(base_url("login.php/C_login"));
        }
        if($this->session->userdata('ROLES_ID') != "1")
        {
            redirect(base_url("login.php/C_login"));
        }

        $this->load->helper('download');
    }
 
	function index(){
		$this->load->view('customer/homepage');
	}
}