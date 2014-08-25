<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function check_email($email = null){
        $data = array('state' => 1);

        $this->load->view('ajax', $data);
    }
}