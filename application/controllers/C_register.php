<?php

class C_register extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model("M_register");
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function index(){
        $data['ROLES'] = $this->M_register->getRoles()->result();
        $this->load->view("register", $data);
    }

    public function add()
    {
        $upload = $this->M_register->uploadGambar();
        $users = $this->M_register;
        $validation = $this->form_validation;
        $validation->set_rules($users->rules());

        if ($validation->run()) {
            $users->save($upload);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        redirect("C_customer");
    }
}

?>