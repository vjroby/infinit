<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('User_model');
    }

    public function check_email($email = null){
        $data = array('state' => 1);

        $result =  $this->User_model->checkEmail($email);
        if ($result != 0){
            $data['state'] = 0;
        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));

    }
}