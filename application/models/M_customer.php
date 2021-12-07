<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_customer extends CI_Model
{ 
  public function login($table, $where){
      return $this->db->get_where($table, $where);
  }	
}