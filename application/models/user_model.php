<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    /**
     * @param $email
     * @param $password
     * @return bool
     */
    function login($email, $password){
        $query = $this->db->query('SELECT id, active, first_name, last_name FROM user WHERE email = ?
                            AND password = SHA1(?) ', array($email, $password));

        if($query->num_rows() == 1)
        {
            return $query->result();
        }
        else
        {
            return false;
        }

    }

    /**
     * the email must be unique
     * @param null $email
     * @return mixed
     */
    public function checkEmail($email = null){

        if (!is_null($email)){
            $query = $this->db->query('SELECT COUNT(id) AS count_users FROM user WHERE email =?',array($email));
            return $query->row()->count_users;
        }
    }

    /**
     *
     */
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
        $this->sendEmail($email, $first_name, $last_name, $token);

    }

    public function activate_account($token, $email){
        $sql = "UPDATE user SET active =1 WHERE token = ? AND email = ?";
        $query = $this->db->query($sql, array($token, $email));
        return $this->db->affected_rows();
    }

    /**
     * @param $email
     * @param $first_name
     * @param $last_name
     * @param $token
     * @return string
     */
    private function compose_email_message($email, $first_name, $last_name, $token){
        $return = "<div>
        <span>Buna ziua {$first_name} {$last_name}</span><br />
        <span>Pentru activarea contului dumneavoastra va rog sa faceti click <a href=";
        $return .= '"'.base_url().'/user/activate_account/'.$token.'/'.urlencode($email).'/">Aici</a>';
        $return .= "</span>
        </div>";

        return $return;
    }

    /**
     * @param $email
     * @param $first_name
     * @param $last_name
     * @param $token
     */
    private function sendEmail($email, $first_name, $last_name, $token){
        $message = $this->compose_email_message($email, $first_name, $last_name, $token);

        $this->load->library('email');

        $this->email->from('clr@media.com', 'CLR Media');
        $this->email->to($email);
        $this->email->cc('dinu.robert.gabriel@gmail.com');

        $this->email->subject('CLR Media Activare cont');
        $this->email->message($message);

        $this->email->send();

        $error =  $this->email->print_debugger();

    }

    /**
     * update usr in database after login
     */
    public  function  update_login($userId){
        $sql = "UPDATE user SET logged = 1, longip = ? WHERE id = ?";
        $params = array(
            ip2long($_SERVER['REMOTE_ADDR']),
            $userId
        );
        $this->db->query($sql, $params);
    }
}
