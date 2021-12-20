<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_booking extends CI_Model
{
    private $table = "BOOKINGS";

    public function getDataBooking()
    {
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

    public function getFields()
    {
        return $this->db->query("SELECT * FROM FIELDS");
    }

    public function get_insertBooking()
    {
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

    public function addBooking()
    {
        $start_date = date('Y/m/d H:i', strtotime($_POST['PlayDateStart']));
        $duration = (int)$_POST['Duration'];
        $field_id = (int)$_POST['FieldId'];
        $user_id = (int)$_POST['UserId'];
        $stmt = oci_parse($this->db->conn_id, 'BEGIN insertBooking(:start_date, :duration, :field_id, :user_id, :invitation_code); END;');
        oci_bind_by_name($stmt, ':start_date', $start_date, 255, SQLT_CHR);
        oci_bind_by_name($stmt, ':duration', $duration, 255, SQLT_INT);
        oci_bind_by_name($stmt, ':field_id', $field_id, 255, SQLT_INT);
        oci_bind_by_name($stmt, ':user_id', $user_id, 255, SQLT_INT);
        oci_bind_by_name($stmt, ':invitation_code', $_POST['InvitationCode'], 255, SQLT_CHR);
        $result = oci_execute($stmt);

        if (!$result) {
            $e = oci_error($stmt);
            // mengambil hanya error message
            $parse1 = explode('ORA-', $e['message']);
            $parse2 = explode(':', $parse1[1]); // error message code
            $message = "Tambah Booking Gagal : " . $parse2[1]; // error message text

            $_SESSION['message'] = $message;
            $_SESSION['type_message'] = 'alert-danger';
        } else {
            $_SESSION['message'] = 'Booking Berhasil ditambahkan';
            $_SESSION['type_message'] = 'alert-success';
        }
    }
}
