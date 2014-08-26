<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function login($email, $password){
        $query = $this->db->query('SELECT id FROM user WHERE email = ?
                            AND password = SHA1(?)', array($email, $password));



        if($query->num_rows() == 1)
        {
            return $query->result();
        }
        else
        {
            return false;
        }

    }

    public function checkEmail($email = null){

        if (!is_null($email)){
            $query = $this->db->query('SELECT COUNT(id) AS count_users FROM user WHERE email =?',array($email));
            return $query->row()->count_users;
        }
    }

    public function entry_insert(){

        $this->load->helper('string');
        $this->load->helper('email');
        $token = random_string('unique');
        $email = $this->input->post('email');
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $data = array(
            'first_name'=>$first_name,
            'last_name'=>$last_name,
            'password'=>sha1($this->input->post('password')),
            'phone'=>$this->input->post('phone'),
            'token'=>$token,
            'email'=>$email,

        );
        $this->db->insert('user',$data);

        $message = $this->compose_email_message($email, $first_name, $last_name, $token);

        send_email($email, 'CLR Media: Activati contul', $message);
    }

    private function compose_email_message($email, $first_name, $last_name, $token){
        $return = "<div>
        <span>Buna ziua {$first_name} {$last_name}</span><br />
        <span>Pentru activarea contului dumneavoastra va rog sa faceti click <a href=";
        $return .= '"'.base_url().'/users/activate/'.$email.'/'.$token.'/">Aici</a>';
        $return .= "</span>
        </div>";

        return $return;
    }
}
