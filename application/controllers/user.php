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

    public function register(){
        $this->load->library('form_validation');
        if (!$this->input->post('regUser')){
            $this->load->view('tmpl/header');
            $this->load->view('tmpl/user_menu');
            $this->load->view('user_register');
            $this->load->view('tmpl/footer');
        }else{
            $this->form_validation->set_rules('first_name', 'Nume', 'trim|required|xss_clean');
            $this->form_validation->set_rules('last_name', 'Prenume', 'trim|required|xss_clean');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|is_unique[user.email]');
            $this->form_validation->set_rules('phone', 'Telefon', 'trim|required|xss_clean||max_length[10]');
            $this->form_validation->set_rules('password', 'Parola', 'trim|required|xss_clean|matches[passwordConf]');
            $this->form_validation->set_rules('passwordConf', 'Confirma parola', 'trim|required|xss_clean');


            if($this->form_validation->run() != FALSE)
            {
                $email = $this->input->post("email");
                $this->User_model->entry_insert();
                $data['email'] = $email;
                //Field validation failed.  User redirected to login page
                $this->load->helper(array('form'));

                $this->load->view('tmpl/header');
                $this->load->view('tmpl/user_menu');
                $this->load->view('User_register_success',$data);
                $this->load->view('tmpl/footer');
            }
            else
            {
                $this->load->view('tmpl/header');
                $this->load->view('tmpl/user_menu');
                $this->load->view('user_register');
                $this->load->view('tmpl/footer');
            }

        }


    }

    public function login(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

        if($this->form_validation->run() == FALSE)
        {
            //Field validation failed.  User redirected to login page
            $this->load->helper(array('form'));

            $this->load->view('tmpl/header');
            $this->load->view('tmpl/user_menu');
            $this->load->view('user_login');
            $this->load->view('tmpl/footer');
        }
        else
        {
            //Go to private area
            redirect('user/index');
        }

    }

    public function index(){
        $this->load->view('tmpl/header');
        $this->load->view('tmpl/user_menu');
        $this->load->view('user_index');
        $this->load->view('tmpl/footer');
    }


    public function check_database($password)
    {
        //Field validation succeeded.  Validate against database
        $email = $this->input->post('email');

        //query the database
        $result = $this->User_model->login($email, $password);

        if($result)
        {
            $sess_array = array();
            foreach($result as $row)
            {
                $sess_array = array(
                    'id' => $row->id,
                    'username' => $row->email
                );
                $this->session->set_userdata('logged_in', $sess_array);
            }
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('check_database', 'Invalid username or password');
            return false;
        }
    }
}