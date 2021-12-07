<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model
{ 
  public function login($table, $where){
    // var_dump($table);
    // var_dump($where);
    // die;
      return $this->db->get_where($table, $where);
  }	
  
  public function rules(){
    return [
        [
            'field' => 'EMAIL',
            'label' => 'Email',
            'rules' => 'required'
        ],

        [
            'field' => 'PASSWORD',
            'label' => 'Password',
            'rules' => 'required'
        ]
    ];
  }

  public function return_result($a, $b = 1){
    $query = $this->db->query($a);

    if($b == 1){
        return $query->result();
    }else if($b == "row"){
        return $query->num_rows();
    }else{
        return $query->row();
    }
  }
}