<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function checkEmail($email = null){

        if (!is_null($email)){
            $query = $this->db->query('SELECT COUNT(id) AS count_u FROM user WHERE email =?',array($email));
            return $query;
        }
    }
}
