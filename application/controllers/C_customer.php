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

        $data->menu = "fields";
		$this->im_render->main_customer('customer/detailFields', $data); 
    }

    function detailBooking($id_booking) {
        $data = new stdClass();

        $data->Booking = $this->M_customer->getBookingById($id_booking);
        $data->Player = $this->M_customer->getListPlayerInBooking($id_booking);
        $data->JoinStatus = $this->M_customer->isJoinInBooking($id_booking);

        $data->menu = "booking";
		$this->im_render->main_customer('customer/detailBooking', $data); 
    }

    function joinBooking($id_booking) {
        $this->M_customer->joinBooking($id_booking);
        redirect(base_url("index.php/C_customer/detailBooking/" . $id_booking));
    }

    function unjoinBooking($id_booking) {
        $this->M_customer->unjoinBooking($id_booking);
        redirect(base_url("index.php/C_customer/detailBooking/" . $id_booking));
    }

    function viewBooking() {
        $data = new stdClass();
        $user_id = $_SESSION['ID'];
        $data->Booking = $this->M_customer->getListMyBooking($user_id);
        $data->menu = "booking";
		$this->im_render->main_customer('customer/listBooking', $data);
    }

    function viewReview($booking_id) {
        $data = new stdClass();
        $user_id = $_SESSION['ID'];
        $Bookings['status'] = $this->M_customer->isAlreadyReview($user_id, $booking_id);
        $data->Review = $this->M_customer->getReview($booking_id);
        $data->menu = "booking";
        $data->Booking = $booking_id;

        $Bookings = $this->M_customer->isAlreadyReview($user_id, $booking_id);
        if ($Bookings == 1){
            $this->im_render->main_customer('customer/viewReview', $data);
        }else{
            $this->im_render->main_customer('customer/addReview', $data);
        }
    }

    function invitationCode() {
        $data = new stdClass();
        $data->Booking = $this->M_customer->getBookingByInvitationCode('ASXAWRQSDA');
        $data->menu = "invitationCode";
        $this->im_render->main_customer('customer/invitationCode', $data);
    }
}