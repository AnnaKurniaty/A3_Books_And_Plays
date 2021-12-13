<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_booking extends CI_Model
{ 
    private $table = "BOOKINGS";

    public function getDataBooking() {
        return $this->db->query("SELECT * FROM VENUES");
    }

    public function insetBooking() {
        $PlayDateStart = $this->input->post('PlayDateStart');
        $newPlayDateStart = date("d-M-Y H:i:s", strtotime($PlayDateStart));
        $PlayDateEnd = $this->input->post('PlayDateEnd');
        $newPlayDateEnd = date("d-M-Y H:i:s", strtotime($PlayDateEnd));
        $this->db->set('PLAY_DATE_START', $newPlayDateStart);
        $this->db->set('PLAY_DATE_END', $newPlayDateEnd);
        $this->db->set('DURATION', $this->input->post('Duration'));
        $this->db->set('INVITATION_CODE', $this->input->post('InvitationCode'));
        $this->db->set('FIELDS_ID', $this->input->post('FieldsId'));
        $this->db->set('USERS_ID', $this->input->post('UsersId'));
        return $this->db->insert($this->table);
    }

    public function getFields(){
        return $this->db->query("SELECT * FROM FIELDS");
    }
}