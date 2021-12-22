<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_booking extends CI_Model
{
    private $table = "BOOKINGS";

    public function getDataBooking()
    {
        return $this->db->query("SELECT * FROM VENUES");
    }

    public function getFields()
    {
        return $this->db->query("SELECT * FROM FIELDS");
    }

    public function addBooking()
    {
        $start_date = date('Y/m/d H:i', strtotime($_POST['PlayDateStart']));
        $duration = (int)$_POST['Duration'];
        $field_id = (int)$_POST['FieldId'];
        $user_id = (int)$_POST['UserId'];
        $stmt = oci_parse($this->db->conn_id, "BEGIN insertBooking(TO_DATE(:start_date, 'yyyy/mm/dd hh24:mi'), :duration, :field_id, :user_id); END;");
        oci_bind_by_name($stmt, ':start_date', $start_date, 255, SQLT_CHR);
        oci_bind_by_name($stmt, ':duration', $duration, 255, SQLT_INT);
        oci_bind_by_name($stmt, ':field_id', $field_id, 255, SQLT_INT);
        oci_bind_by_name($stmt, ':user_id', $user_id, 255, SQLT_INT);
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
