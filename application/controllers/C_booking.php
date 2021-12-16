<?php 
 
class C_booking extends CI_Controller{
 
	public function __construct(){
        parent::__construct();
        $this->load->model('M_booking');

        if(!$this->session->ID)
        {
            $pemberitahuan = "<div class='alert alert-warning'>Anda harus login dulu </div>";
            $this->session->set_flashdata('pemberitahuan', $pemberitahuan);
            redirect('C_login');
        }
    }
 
	function index(){
        $data['FIELDS'] = $this->M_booking->getFields()->result();
		$data['menu'] = "booking";
		$this->im_render->main('customer/AddBooking', $data);
	}

    function addBooking() {
        // $this->M_booking->insetBooking();
        $this->M_booking->get_insertBooking();
    }

}