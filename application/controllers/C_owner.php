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
		$this->im_render->main_owner('owner/fields', $data);
	}

    function fields($id_venues){
        $data = new stdClass();
        $data->Venue = $this->M_owner->getVenueById($id_venues);
        $data->Fields = $this->M_owner->getFieldInVenue($id_venues);
        $data->Address = $this->M_owner->getAddress($id_venues);
        //untuk menu active
        $data->menu = "fields";
		$this->im_render->main_owner('owner/fields', $data);
    }
}