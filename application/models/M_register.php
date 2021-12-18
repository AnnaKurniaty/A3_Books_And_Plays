<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_register extends CI_Model
{ 
    private $_table = "USERS";

    public $NAME;
    public $EMAIL;
    public $PASSWORD;
    public $IMAGE;
    public $ROLES_ID;

    public function rules()
    {
        return [
            ['field' => 'NAME',
            'label' => 'NAME',
            'rules' => 'required'],

            ['field' => 'EMAIL',
            'label' => 'EMAIL',
            'rules' => 'required'],
            
            ['field' => 'PASSWORD',
            'label' => 'PASSWORD',
            'rules' => 'required'],

            ['field' => 'ROLES_ID',
            'label' => 'ROLES_ID',
            'rules' => 'required']
        ];
    }

    public function save($upload)
    {
        $post = $this->input->post();
        $this->NAME = $post["NAME"];
        $this->EMAIL = $post["EMAIL"];
        $this->PASSWORD = $post["PASSWORD"];
        $this->ROLES_ID = $post["ROLES_ID"];
        $this->IMAGE = $upload['file']['file_name'];
        return $this->db->insert($this->_table, $this);
    }

    public function getRoles(){
        return $this->db->query("SELECT * FROM ROLES");
    }

     // Fungsi untuk melakukan proses upload file
    public function uploadGambar(){
        $config['upload_path'] = './assets/images/users/';
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