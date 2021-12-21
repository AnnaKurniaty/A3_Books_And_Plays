<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_customer extends CI_Model
{ 
  public function getDataVenues() {
    return $this->db->query("SELECT * FROM VENUES");
  }

  public function getDataReview() {
    return $this->db->query("SELECT * FROM REVIEWS");
  }

  public function getDataFields() {
    return $this->db->query("SELECT * FROM FIELDS");
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

  public function getFieldInVenue($venue_id) {
    $stmt = oci_parse($this->db->conn_id, 'SELECT * FROM fields WHERE venues_id = :param');
    oci_bind_by_name($stmt, ':param', $venue_id);
    oci_execute($stmt);
    oci_fetch_all($stmt, $result, 0, -1, OCI_FETCHSTATEMENT_BY_ROW);
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

  public function getBookingById($booking_id) {
    $stmt = oci_parse($this->db->conn_id, 'BEGIN getBookingById(:param); END;');
    oci_bind_by_name($stmt, ':param', $booking_id);
    oci_execute($stmt);
    $result = oci_fetch_assoc($stmt);
    return $result;
  }

  public function getListMyBooking($user_id) {
    $stmt = oci_parse($this->db->conn_id, 'BEGIN getListMyBookings(:param); END;');
    oci_bind_by_name($stmt, ':param', $user_id);
    oci_execute($stmt);
    $result = [];
    while($temp = oci_fetch_assoc($stmt)) {
      $result[] = $temp;
    }
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

  public function isJoinInBooking($booking_id) {
    $user_id = (int)$_SESSION['ID'];
    $stmt = oci_parse($this->db->conn_id, 'BEGIN :ret := isJoin(:user_id, :booking_id); END;');
    oci_bind_by_name($stmt, ':ret', $result, 255, SQLT_INT);
    oci_bind_by_name($stmt, ':user_id', $user_id);
    oci_bind_by_name($stmt, ':booking_id', $booking_id);
    oci_execute($stmt);
    return $result;
  }

  public function joinBooking($booking_id) {
    $user_id = (int)$_SESSION['ID'];
    $stmt = oci_parse($this->db->conn_id, 'BEGIN joinBooking(:user_id, :booking_id); END;');
    oci_bind_by_name($stmt, ':user_id', $user_id);
    oci_bind_by_name($stmt, ':booking_id', $booking_id);
    oci_execute($stmt);
  }

  public function unjoinBooking($booking_id) {
    $user_id = (int)$_SESSION['ID'];
    $stmt = oci_parse($this->db->conn_id, 'BEGIN unjoinBooking(:user_id, :booking_id); END;');
    oci_bind_by_name($stmt, ':user_id', $user_id);
    oci_bind_by_name($stmt, ':booking_id', $booking_id);
    oci_execute($stmt);
  }
}