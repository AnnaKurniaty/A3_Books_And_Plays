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
        $data = new stdClass();
        $data->Venues = $this->M_customer->getDataVenues()->result();
        $data->Review = $this->M_customer->getDataReview()->result();
        //untuk menu active
        $data->menu = "dasboard";
		$this->im_render->main_customer('customer/homepage', $data);
	}

    function viewFields() {
        $data = new stdClass();
        $data->Fields = $this->M_customer->getDataFields()->result();
        //untuk menu active
        $data->menu = "fields";
		$this->im_render->main_customer('customer/listFields', $data);
    }

    function detailVenues($id_venues) {
        $data = new stdClass();

        $data->Venue = $this->M_customer->getVenueById($id_venues);
        $data->Fields = $this->M_customer->getFieldInVenue($id_venues);
        $data->Address = $this->M_customer->getAddress($id_venues);

        //untuk menu active
        $data->menu = "dasboard";
		$this->im_render->main_customer('customer/detailVenues', $data); 
    }

    function detailField($id_field) {
        $data = new stdClass();

        $data->Field = $this->M_customer->getFieldById((int)$id_field);
        $data->Booking = $this->M_customer->getBookingInField($id_field);

        $data->menu = "dasboard";
		$this->im_render->main_customer('customer/detailFields', $data); 
    }
}