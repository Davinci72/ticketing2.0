<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pager extends CI_Controller {

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
		$this->load->model('Server');
        // $this->authenticator();
	}
	public function authenticator(){
        $sess_id = $this->session->userdata('username');
        if(!empty($sess_id)){
            //do nothing
            //silence is golden
        }
		else
		{
			//error
			$this->session->set_flashdata('error', 'Your Session has expired. Please login again');
            redirect(base_url('auth'));
        }
    }
	public function index()
	{
		$locations = $this->Server->getRequests('http://localhost/ticketing/get-locations/100/0');
		$data['locations'] = $locations;
        $this->load->view('templates/pages_header');
		// $this->load->view('templates/side-nav');
		$this->load->view('pages/ticketing/home',$data);
        $this->load->view('templates/footer');
	}
	public function ncr(){
		$locations = $this->Server->getRequests('http://localhost/ticketing/get-locations/100/0');
		$data['locations'] = $locations;
        $this->load->view('templates/pages_header');
		// $this->load->view('templates/side-nav');
		$this->load->view('pages/ticketing/book-ncr',$data);
        $this->load->view('templates/footer');
	}
	public function checkRoute(){
		$data['routeinfo'] = $this->Server->getRequests('http://localhost/ticketing/get-route-info/'.
		$this->input->post('route_from').
		'/'.
		$this->input->post('route_to')
		);
		$checkError = json_decode($data['routeinfo'],true);
		$e = array_key_exists('Error',$checkError);
		// var_dump(array_key_exists('Error',$checkError));
		if( $e == true ){
			$this->session->set_flashdata('error', 'Please try a different route, the one you have selected is invalid');
            redirect(base_url());
		}
		else
		{
			$data['r_from'] = $this->Server->getRequests('http://localhost/ticketing/get-locale-by-id/'.$this->input->post('route_from'));
			$data['r_to'] = $this->Server->getRequests('http://localhost/ticketing/get-locale-by-id/'.$this->input->post('route_to'));
		}
		$this->load->view('templates/pages_header');
		// $this->load->view('templates/side-nav');
		$this->load->view('pages/ticketing/booking_info',$data);
        $this->load->view('templates/footer');
		
	}
	public function about(){
		
	}
	public function buyTicket(){
		$this->load->view('templates/pages_header');
		// $this->load->view('templates/side-nav');
		$this->load->view('pages/ticketing/buyticket');
        $this->load->view('templates/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */