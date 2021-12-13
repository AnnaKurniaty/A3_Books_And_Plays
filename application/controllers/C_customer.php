<?php 
 
class C_customer extends CI_Controller{
 
	public function __construct(){
        parent::__construct();
        $this->load->model('M_customer');

        if(!$this->session->ID)
        {
            $pemberitahuan = "<div class='alert alert-warning'>Anda harus login dulu </div>";
            $this->session->set_flashdata('pemberitahuan', $pemberitahuan);
            redirect('C_login');
        }

    }
 
	function index(){
        //$data = $this->M_customer->getDataVenues();
        $data['Venues'] = $this->M_customer->getDataVenues()->result();
        //untuk menu active
        $data['menu'] = "dasboard";
		$this->load->view('customer/homepage', $data);
	}

    function testing() {
        $data['menu'] = "testing";
		$this->load->view('customer/homepage', $data);
    }
}