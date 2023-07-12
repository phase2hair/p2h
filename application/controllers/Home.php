<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    /**
	 * activation code
	 *
	 * @var string
	 **/
    public $activation_code;
    
     /**
	 * Date format
	 *
	 * @var string
	 **/
    public $format = 'Y-m-d';
    public $format_two = 'd/m/Y';

	
	public function index()
	{
        $data['clients'] = $this->clients->getCheckedIn();
		$this->load->view('welcome', $data);
    }
    
    public function resetAll(){
        echo json_encode( $this->db->select('*')->where('checked_in',TRUE)->get('clients')->result());
        $this->db->where('checked_in',TRUE)
        ->set('last_visit', Date($this->format_two))
        ->set('checked_in',FALSE)
        ->update('clients');
    }
    
    public function signin_as_admin()
    {
        $this->load->view('login');
    }

    public function register_new_client()
    {
        $this->load->view('new_client');
    }

    public function check_in($id = null)
    {
        if($id == null){
            $this->load->view('checkin');
        }else{
            
            $this->clients->checkClientIn($id);
           redirect('home');
        }
    }

    public function check_out($id = null)
    {
        if($id == null){
            redirect('home');
        }else{
            $client = $this->clients->getClient($id);
            $this->clients->checkClientOut($id, $client->last_visit, $client->last_visit2);
           
            redirect('admin/dashboard');
        }
    }

    protected function _set_validation() {
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('email_address', 'Email Address', 'required|is_unique[clients.email]');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('birth_month', 'Birth Month', 'required');
        $this->form_validation->set_rules('birth_day', 'Birth Day', 'required');
        $this->form_validation->set_rules('postal_code', 'Postal Code', 'required');
        $this->form_validation->set_rules('mobile_number', 'Mobile Number', 'required');
        $this->form_validation->set_error_delimiters('', '<br />');
       

        return $this->form_validation->run();
    }

    public function saveClient()
    {
        if($_POST){
            $this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('email_address', 'Email Address', 'required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required');
            $this->form_validation->set_rules('birth_month', 'Birth Month', 'required');
            $this->form_validation->set_rules('birth_day', 'Birth Day', 'required');
            $this->form_validation->set_rules('postal_code', 'Postal Code', 'required');
            $this->form_validation->set_rules('mobile_number', 'Mobile Number', 'required');
            $this->form_validation->set_error_delimiters('', '<br />');
            if($this->form_validation->run() == TRUE){
                // echo "fjdf";
                if(count(explode(" ",$_POST['postal_code']))<2){
                    $data['error'] = "Post Code should be ZZZZ XXX or ZZZ XXX";
                    $this->load->view('new_client', $data);
                    return;
                }
                $_POST['stylist'] = '2';
                $_POST['total_visits'] = 1;
               $this->clients->createClient($_POST);
               $data['success'] = "New Client Added Successfully";
                redirect('home');
            }else{
                $data['error'] = validation_errors();
                $this->load->view('new_client', $data);
            }
        }
    }

    public function getUsers()
    {
        # code...
        $data['clients'] = $this->clients->getUsers($_GET['month'], $_GET['day'], Date($this->format_two));

        $this->load->view('allClients', $data);
    }


    
}

