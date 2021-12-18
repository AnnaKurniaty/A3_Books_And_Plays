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
        $where = array('ID' => $id_venues);
        $data->Fields = $this->M_customer->getFields($where);
        $data->Address = $this->M_customer->getAddress($where);
        //untuk menu active
        $data->menu = "dasboard";
		$this->im_render->main_customer('customer/detailVenues', $data); 
    }
}