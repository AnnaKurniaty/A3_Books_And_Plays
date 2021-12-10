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

    public function save()
    {
        $post = $this->input->post();
        $this->NAME = $post["NAME"];
        $this->EMAIL = $post["PASSWORD"];
        $this->PASSWORD = $post["PASSWORD"];
        $this->ROLES_ID = $post["ROLES_ID"];
        $this->IMAGE = $post["IMAGE"];
        return $this->db->insert($this->_table, $this);
    }

    public function getRoles(){
        return $this->db->query("SELECT * FROM ROLES");
    }
}