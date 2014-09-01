<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

    private $captcha;

    public function __construct(){
        parent::__construct();
        $this->load->model('User_model');
    }

    /**
     * @param null $email
     */
    public function check_email($email = null){
        $data = array('valid' => true);

        $result =  $this->User_model->checkEmail($email);
        if ($result != 0){
            $data['valid'] = false;
        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));

    }

    /**
     * register new account
     */
    public function register(){
        $this->load->library('form_validation');
        $this->load->helper('captcha');
        $data = array();

        $vals = array(
            'img_path'	=> './captcha/',
            'img_url'	=> 'http://localhost/infinit/captcha/',
//            'font_path'	=> './path/to/fonts/texb.ttf',
            'img_width'	=> '150',
            'img_height' => 30,
            'expiration' => 7200
        );
        $data['captcha'] = create_captcha($vals);
        $this->captcha = $data['captcha']['word'];

        if (!$this->input->post('regUser')){
            $this->load->view('tmpl/header');
            $this->load->view('tmpl/user_menu');
            $this->load->view('user_register',$data);
            $this->load->view('tmpl/footer');
        }else{
            $this->form_validation->set_rules('first_name', 'Nume', 'trim|required|xss_clean');
            $this->form_validation->set_rules('last_name', 'Prenume', 'trim|required|xss_clean');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|is_unique[user.email]');
            $this->form_validation->set_rules('phone', 'Telefon', 'trim|required|xss_clean||max_length[10]');
            $this->form_validation->set_rules('password', 'Parola', 'trim|required|xss_clean|matches[passwordConf]');
            $this->form_validation->set_rules('passwordConf', 'Confirma parola', 'trim|required|xss_clean');
            $this->form_validation->set_rules('captcha', 'Introdu captcha', 'trim|required|xss_clean|callback_check_captcha');


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
                $this->load->view('user_register',$data);
                $this->load->view('tmpl/footer');
            }

        }


    }

    /**
     * login
     */
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

    /**
     *
     */
    public function index(){
        $data['session'] =  $this->session->userdata('logged_in');
        $this->load->view('tmpl/header');
        $this->load->view('tmpl/user_menu');
        $this->load->view('user_index',$data);
        $this->load->view('tmpl/footer');
    }

    /**
     * check the login credentials
     *
     * @param $password
     * @return bool
     */
    public function check_database($password){
        //Field validation succeeded.  Validate against database
        $email = $this->input->post('email');

        //query the database
        $result = $this->User_model->login($email, $password);

        if($result[0]->active == 1)
        {
            $sess_array = array();
            foreach($result as $row)
            {
                $sess_array = array(
                    'id' => $row->id,
                    'first_name' => $row->first_name,
                    'last_name' => $row->last_name,
                );
                $this->session->set_userdata('logged_in', $sess_array);
                $this->User_model->update_login( $row->id);
            }
            return TRUE;
        }elseif($result[0]->active == 0){
            $this->form_validation->set_message('check_database', 'Contul nu este activat. Verificati email-ul');
            return false;
        }
        else
        {
            $this->form_validation->set_message('check_database', 'Credentiale invalide');
            return false;
        }
    }

    public function activate_account($token = null, $email = null){
//        var_dump(urlencode('dinu.robert.gabriel@gmail.com'));
        if (is_null($token) || is_null($email)){
            redirect('user/register');
        }else{

            $email = urldecode($email);
            $response = $this->User_model->activate_account($token, $email);
            $data['activated'] = 'Credentiale invalide, va rog sa reluati procesul de inregistrare';
            if ($response == 1){
                $data['activated'] = 'C0ntul a fost activat. Va puteti loga.';
            }

            $this->load->view('tmpl/header');
            $this->load->view('tmpl/user_menu');
            $this->load->view('user_activation', $data);
            $this->load->view('tmpl/footer');
        }

    }

    public function logout(){
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('user', 'login');
    }

    public function check_captcha($val_from_input){
        if ( $val_from_input == $this->captcha){
            return true;
        }else{
            $this->form_validation->set_message('check_captcha', 'Captcha invalid.');
            return false;
        }
    }


}