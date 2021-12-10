<?php

class C_login extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model("M_login");
    }

    public function index(){
        $this->load->view("login");
    }

    public function proses_login(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $where = array(
            'EMAIL' => $email,
            'PASSWORD' => $password
        );

        $cek = $this->M_login->login("USERS", $where)->num_rows();
        if($cek > 0){
            $query = "SELECT * FROM USERS a, ROLES b WHERE a.ROLES_ID = b.ID AND EMAIL = '$email'" ;
            $data_akun = $this->M_login->return_result($query);

            foreach($data_akun as $a){
                $name = $a->NAME;
                $email = $a->EMAIL;
                $password = $a->PASSWORD;
                $image = $a->IMAGE;
                $roles_id = $a->ROLES_ID;
            }

            $data_session = array(
                'NAME' => $name,
                'EMAIL' => $email,
                'PASSWORD' => $password,
                'IMAGE' => $image,
                'ROLES_ID' => $roles_id
            );

            switch($a->ROLES_ID){
                case "1":
                    $this->session->set_userdata('logged_in', $data_session);
                    redirect(base_url("index.php/C_customer"));
                break;
                case "2":
                    $this->session->set_userdata('logged_in', $data_session);
                    redirect(base_url("index.php/C_owner"));
                break;
                case "3":
                    $this->session->set_userdata('logged_in', $data_session);
                    redirect(base_url("index.php/C_admin"));
                break;
            }
        }else{
            echo "Error: Hubungi Admin !";
        }
    }

    
    public function logout(){
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect(base_url("index.php/C_login"));
    }
}

?>