<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_customer extends CI_Model
{ 
  public function getDataVenues() {
    return $this->db->query("SELECT * FROM VENUES");
  }

}