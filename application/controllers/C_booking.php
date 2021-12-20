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
        $data['menu'] = "booking";
		$this->im_render->main('customer/AddBooking', $data);
	}

    function fieldBooking($field_id) {
        $data = new stdClass();

        $data->menu = "booking";
        $data->Field = $field_id;
		$this->im_render->main_customer('customer/AddBooking', $data);
    }

    function addBooking() {
        $this->M_booking->addBooking();
        redirect(base_url("index.php/C_customer/detailField/" . $_POST['FieldId']));
    }

}