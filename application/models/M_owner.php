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
    $stmt = oci_parse($this->db->conn_id, 'BEGIN getListMyBookings(:param); END;');
    oci_bind_by_name($stmt, ':param', $user_id);
    oci_execute($stmt);
    $result = [];
    while($temp = oci_fetch_assoc($stmt)) {
      $result[] = $temp;
    }
    return $result;
  }
}