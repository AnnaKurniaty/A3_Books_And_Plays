<?php 
 
class C_customer extends CI_Controller{
 
	public function __construct(){
        parent::__construct();
        $this->load->model('M_customer');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));

        if(!$this->session->userdata('logged_in'))
        {
            $pemberitahuan = "<div class='alert alert-warning'>Anda harus login dulu </div>";
            $this->session->set_flashdata('pemberitahuan', $pemberitahuan);
            redirect('C_login');
        }

        $session_data = $this->session->userdata('logged_in');
    }
 
	function index(){
		$this->load->view('customer/homepage');
	}
}