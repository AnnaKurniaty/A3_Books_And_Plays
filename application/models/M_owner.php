<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_owner extends CI_Model
{ 
    public function getDataVenues() {
        return $this->db->query("SELECT * FROM VENUES");
      }
      
  public function getAllMyVenues($user_id) {
    $stmt = oci_parse($this->db->conn_id, 'BEGIN getAllMyVenues(:param); END;');
    oci_bind_by_name($stmt, ':param', $user_id);
    oci_execute($stmt);
    $result = [];
    while($temp = oci_fetch_assoc($stmt)) {
      $result[] = $temp;
    }
    return $result;
  }

  public function getVenueById($venue_id) {
    $stmt = oci_parse($this->db->conn_id, 'BEGIN getVenueById(:param); END;');
    oci_bind_by_name($stmt, ':param', $venue_id);
    oci_execute($stmt);
    $result = oci_fetch_assoc($stmt);
    return $result;
  }

  public function getAddress($venue_id) {
    $stmt = oci_parse($this->db->conn_id, 'BEGIN :ret := getFullAddress(:venue_id); END;');
    oci_bind_by_name($stmt, ':ret', $result, 255, SQLT_CHR);
    oci_bind_by_name($stmt, ':venue_id', $venue_id);
    oci_execute($stmt);
    return $result;
  }

  public function getFieldById($field_id) {
    $stmt = oci_parse($this->db->conn_id, 'BEGIN getFieldById(:param); END;');
    oci_bind_by_name($stmt, ':param', $field_id);
    oci_execute($stmt);
    $result = oci_fetch_assoc($stmt);
    return $result;
  }

  public function getBookingInField($field_id) {
    $stmt = oci_parse($this->db->conn_id, 'BEGIN getListBooking(:param); END;');
    oci_bind_by_name($stmt, ':param', $field_id);
    oci_execute($stmt);
    $result = [];
    while($temp = oci_fetch_assoc($stmt)) {
      $result[] = $temp;
    }
    return $result;
  }

  public function deleteBooking($booking_id) {
    $stmt = oci_parse($this->db->conn_id, 'BEGIN deleteBooking(:param); END;');
    oci_bind_by_name($stmt, ':param', $booking_id);
    oci_execute($stmt);
  }

  public function deleteField($field_id) {
    $stmt = oci_parse($this->db->conn_id, 'BEGIN deleteField(:param); END;');
    oci_bind_by_name($stmt, ':param', $field_id);
    oci_execute($stmt);
  }

  public function deleteVenue($venue_id) {
    $stmt = oci_parse($this->db->conn_id, 'BEGIN deleteVenue(:param); END;');
    oci_bind_by_name($stmt, ':param', $venue_id);
    oci_execute($stmt);
  }

  public function deleteReview($review_id) {
    $stmt = oci_parse($this->db->conn_id, 'BEGIN deleteReview(:param); END;');
    oci_bind_by_name($stmt, ':param', $review_id);
    oci_execute($stmt);
  }

  public function getFieldInVenue($venue_id) {
    $stmt = oci_parse($this->db->conn_id, 'SELECT * FROM fields WHERE venues_id = :param');
    oci_bind_by_name($stmt, ':param', $venue_id);
    oci_execute($stmt);
    oci_fetch_all($stmt, $result, 0, -1, OCI_FETCHSTATEMENT_BY_ROW);
    return $result;
  }

  public function getAllMyFields($user_id) {
    $stmt = oci_parse($this->db->conn_id, 'BEGIN getAllMyFields(:param); END;');
    oci_bind_by_name($stmt, ':param', $user_id);
    oci_execute($stmt);
    $result = [];
    while($temp = oci_fetch_assoc($stmt)) {
      $result[] = $temp;
    }
    return $result;
  }

  public function getListMyBooking($user_id) {
    $stmt = oci_parse($this->db->conn_id, 'BEGIN getListBookingOwnedByOwner(:param); END;');
    oci_bind_by_name($stmt, ':param', $user_id);
    oci_execute($stmt);
    $result = [];
    while($temp = oci_fetch_assoc($stmt)) {
      $result[] = $temp;
    }
    return $result;
  }

  public function getReviewInField($booking_id) {
    $stmt = oci_parse($this->db->conn_id, 'BEGIN getReviewByIdBooking(:param); END;');
    oci_bind_by_name($stmt, ':param', $booking_id);
    oci_execute($stmt);
    $result = [];
    while($temp = oci_fetch_assoc($stmt)) {
      $result[] = $temp;
    }
    return $result;
  }

  public function getBookingById($booking_id) {
    $stmt = oci_parse($this->db->conn_id, 'BEGIN getBookingById(:param); END;');
    oci_bind_by_name($stmt, ':param', $booking_id);
    oci_execute($stmt);
    $result = oci_fetch_assoc($stmt);
    return $result;
  }

  public function getListPlayerInBooking($booking_id) {
    $stmt = oci_parse($this->db->conn_id, 'BEGIN getListPlayerInBooking(:param); END;');
    oci_bind_by_name($stmt, ':param', $booking_id);
    oci_execute($stmt);
    $result = [];
    while($temp = oci_fetch_assoc($stmt)) {
      $result[] = $temp;
    }
    return $result;
  }

  public function getCities(){
    $stmt = oci_parse($this->db->conn_id, 'BEGIN getCities(); END;');
    oci_execute($stmt);
    $result = [];
    while($temp = oci_fetch_assoc($stmt)) {
      $result[] = $temp;
    }
    return $result;
  }

  public function addVenue()
    {
        $name = $_POST['Name'];
        $phone = (int)$_POST['Phone'];
        $description = $_POST['Description'];
        $image = $_POST['image'];
        $open_time = date('H:i', strtotime($_POST['open_time']));
        $closed_time = date('H:i', strtotime($_POST['closed_time']));
        $user_id = (int)$_POST['UserId'];
        $address = $_POST['Address'];
        $post_code = $_POST['post_code'];
        $city_id = (int)$_POST['city_id'];
        $stmt = oci_parse($this->db->conn_id, "BEGIN insertVenueWithAddress(:name, :phone, :description, :image, TO_DATE(:open_time, 'hh24:mi'), TO_DATE(:closed_time, 'hh24:mi'), :user_id, :address, :post_code, :city_id ); END;");
        oci_bind_by_name($stmt, ':name', $name, 255, SQLT_CHR);
        oci_bind_by_name($stmt, ':phone', $phone, 255, SQLT_INT);
        oci_bind_by_name($stmt, ':description', $description, 255, SQLT_CHR);
        oci_bind_by_name($stmt, ':image', $image, 255, SQLT_CHR);
        oci_bind_by_name($stmt, ':open_time', $open_time, 255, SQLT_CHR);
        oci_bind_by_name($stmt, ':closed_time', $closed_time, 255, SQLT_CHR);
        oci_bind_by_name($stmt, ':user_id', $user_id, 255, SQLT_INT);
        oci_bind_by_name($stmt, ':address', $address, 255, SQLT_CHR);
        oci_bind_by_name($stmt, ':post_code', $post_code, 255, SQLT_CHR);
        oci_bind_by_name($stmt, ':city_id', $city_id, 255, SQLT_INT);
        $result = oci_execute($stmt);

        if (!$result) {
            $e = oci_error($stmt);
            // mengambil hanya error message
            $parse1 = explode('ORA-', $e['message']);
            $parse2 = explode(':', $parse1[1]); // error message code
            $message = "Tambah Venue Gagal : " . $parse2[1]; // error message text

            $_SESSION['message'] = $message;
            $_SESSION['type_message'] = 'alert-danger';
        } else {
            $_SESSION['message'] = 'Venue Berhasil ditambahkan';
            $_SESSION['type_message'] = 'alert-success';
        }
    }

    public function uploadGambar(){
      $config['upload_path'] = './assets/images/venues/';
      $config['allowed_types'] = 'jpg|png|jpeg';
      $config['max_size']  = '2048';
      $config['remove_space'] = TRUE;
  
      $this->load->library('upload', $config); // Load konfigurasi uploadnya
      if($this->upload->do_upload('gambar')){ // Lakukan upload dan Cek jika proses upload berhasil
      // Jika berhasil :
      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
      return $return;
      }else{
      // Jika gagal :
      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
      return $return;
      }
  }
}