<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
    
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('authentication');
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    }
    
	public function index()
	{
        $this->load->view('templates/header_auth');
        $this->load->view('pages/login');
        $this->load->view('templates/footer_auth');
    }
    public function login(){
        if($this->authentication->getUser()){
            //success message
            $this->session->set_flashdata('success', 'Login Successfull');
            redirect(base_url());
        }
        else
        {
            $this->session->set_flashdata('error', 'Wrong Username / Password Combination');
            //error meessage
            redirect(base_url('auth'));
        }
    }
    public function registerNew(){
        if($this->authentication->newUserd()){
            $this->session->set_flashdata('success', 'Registration Successfull');
            redirect(base_url());
        }
        else
        {
            //error
            $this->session->set_flashdata('error', 'Passwords Do Not Match. Please Try Again');
            redirect(base_url('auth/register'));
        }
    }
    public function page($page){
        $this->load->view('templates/header');
        $this->load->view('templates/side-nav');
        $this->load->view('pages/'.$page);
        $this->load->view('templates/footer');
    }
    public function addUser(){
        
        $this->page('add-user');
    }
    public function register(){
        $this->load->view('templates/header_auth');
        $this->load->view('pages/register');
        $this->load->view('templates/footer_auth');
    }
    public function userSpaces(){
        $this->page('user-spaces');
    } 
    public function userSpaceAccess(){
        $this->page('usa');
    }
    public function getUsers(){
        $users = array(
            array('david','kipkemboi','davidkla12@gmail.com','254725597552','<a href="test.html">TEst</a>'),
            array('david','kipkech','davidkla12@gmail.com','254725597552','p')
        );
        echo '{"data":'. json_encode($users).'}';
    }
}

/* End of file auth.php */
/* Location: ./application/controllers/welcome.php */