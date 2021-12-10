<?php

class C_register extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model("M_register");
        $this->load->library('form_validation');
    }

    public function index(){
        $data['ROLES'] = $this->M_register->getRoles()->result();
        $this->load->view("register", $data);
    }

    public function upload_image(){
        $config['upload_path'] = './assets/images/users/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']  = '2048';
        $config['remove_space'] = TRUE;
      
        $this->load->library('upload', $config);
 
		if ( ! $this->upload->do_upload('berkas')){
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('registrasi', $error);
		}else{
			$data = array('upload_data' => $this->upload->data());
			$this->load->view('login');
		}
    }

    public function add()
    {
        $users = $this->M_register;
        $validation = $this->form_validation;
        $validation->set_rules($users->rules());

        if ($validation->run()) {
            $users->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("customer/homepage");
    }
}

?>