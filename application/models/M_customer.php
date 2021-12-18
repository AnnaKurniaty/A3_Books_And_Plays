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

  public function getFields($where) {
    $query = $this->db->get_where('FIELDS', $where);
		return $query->result();
  }

  public function getAddress($where) {
    return $this->db->query("SELECT  (ADDRESSES.ADDRESS || ', ' ||
    CITIES.CITY_NAME || ', ' ||
    PROVINCIES.PROVINCE_NAME || ' ' ||
    ADDRESSES.POST_CODE) full_address
FROM    ADDRESSES
    INNER JOIN CITIES ON CITIES.ID = addresses.CITIES_ID
    INNER JOIN PROVINCIES ON PROVINCIES.ID = CITIES.PROVINCIES_ID", $where);
    
  }
  
  public function test() {
    $id = 81;
    // persiapin statement dulu
    // oci_parse -> dilakuin buat parsing statment
    // oci_parse(koneksi_ke_database_nya, PLSQL_BLOCK_NYA)
    $stmt = oci_parse($this->db->conn_id, 'BEGIN getUserById(:PARAMETER_1); END;');

    // bind variable nya
    // bind dilakuin buat nentuin tipe parameternya
    // lengkapnya disini : https://www.php.net/manual/en/function.oci-bind-by-name.php
    oci_bind_by_name($stmt, ':PARAMETER_1', $id);

    // eksekusi statementnya
    // sebelum fetch, eksekusi dulu statementnya
    oci_execute($stmt);

    // fetch jadiin array association
    // fetch array nya
    // oci_fetch_assoc() buat jadiin array association (cuma satu baris kalau gk salah)
    // oci_fetch_all() buat hasilnya lebih dari satu baris
    $result = oci_fetch_assoc($stmt);

    // coba tampilin hasilnya
    // tinggal return aja hasil querynya di result
    var_dump($result);
  }
}