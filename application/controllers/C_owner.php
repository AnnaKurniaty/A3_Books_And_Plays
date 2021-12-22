<?php 
 
class C_owner extends CI_Controller{
 
	public function __construct(){
        parent::__construct();
        $this->load->model('M_owner');

        if(!$this->session->ID)
        {
            $pemberitahuan = "<div class='alert alert-warning'>Anda harus login dulu </div>";
            $this->session->set_flashdata('pemberitahuan', $pemberitahuan);
            redirect('C_login');
        }

    }
 
	function index(){
        $data = new stdClass();
        $user_id = $_SESSION['ID'];
        $data->Venues = $this->M_owner->getAllMyVenues($user_id);
        //untuk menu active
        $data->menu = "venue";
		$this->im_render->main_owner('owner/listVenues', $data);
	}

    function viewFields(){
        $data = new stdClass();
        $user_id = $_SESSION['ID'];
        $data->Fields = $this->M_owner->getAllMyFIelds($user_id);
        //untuk menu active
        $data->menu = "fields";
		$this->im_render->main_owner('owner/listfields', $data);
	}

    function viewBooking() {
        $data = new stdClass();
        $user_id = $_SESSION['ID'];
        $data->Booking = $this->M_owner->getListMyBooking($user_id);
        $data->menu = "booking";
		$this->im_render->main_owner('owner/listBooking', $data);
    }
}