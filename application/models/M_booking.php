<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_booking extends CI_Model
{ 
    private $table = "BOOKINGS";

    public function getDataBooking() {
        return $this->db->query("SELECT * FROM VENUES");
    }

    // public function insetBooking() {
    //     $PlayDateStart = $this->input->post('PlayDateStart');
    //     $newPlayDateStart = date("yyyy/mm/dd hh24:mi", strtotime($PlayDateStart));
    //     $PlayDateEnd = $this->input->post('PlayDateEnd');
    //     $newPlayDateEnd = date("yyyy/mm/dd hh24:mi", strtotime($PlayDateEnd));
    //     $this->db->set('PLAY_DATE_START', $newPlayDateStart);
    //     $this->db->set('PLAY_DATE_END', $newPlayDateEnd);
    //     $this->db->set('DURATION', $this->input->post('Duration'));
    //     $this->db->set('INVITATION_CODE', $this->input->post('InvitationCode'));
    //     $this->db->set('FIELDS_ID', $this->input->post('FieldsId'));
    //     $this->db->set('USERS_ID', $this->input->post('UsersId'));
    //     return $this->db->insert($this->table);
    // }

    public function getFields(){
        return $this->db->query("SELECT * FROM FIELDS");
    }

    public function get_insertBooking(){
        // $filter = 'date("yyyy/mm/dd hh24:mi", strtotime)';
        // $this->db->query('call INSERTBOOKING()');

        // $params = array(
        //     array('name' => ':params1', 'value' => $params1_val, 'type' => SQLT_CHR, 'length' => 32),
        //     array('name' => ':params2', 'value' => $params2_val, 'type' => SQLT_CHR, 'length' => 32),
        //     array('name' => ':params3', 'value' => $params3_val, 'type' => SQLT_CHR, 'length' => 32)
        //     );

        // $stmt = oci_parse($this->db->conn_id, "INSERTBOOKING(:params1, :params2, :params3); end;");

        // foreach($params as $p)
        // oci_bind_by_name($stmt, $p['name'], $p['value'], $p['length']);
        // $r = ociexecute($stmt);
    }
}