<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct() {
        parent::__construct();
    }
    public function index(){
    	//if(isset($_SESSION["is_login"])){
    	//$this->session->set_userdata('is_login'
    	if($this->session->userdata('is_login')){
     	// do something when exist
    		redirect('dashboard', 'refresh');
		}else{
			redirect('login', 'refresh');
		    // do something when doesn't exist
		}
    }
    public function login(){
    	$this->load->view("header");
    	$this->load->view("login");
    	$this->load->view("footer");
    }
    public function login_process(){
    	$login_name 		= $this->input->post("login_name");
    	$password 			= $this->input->post("password");
    	$data['login_data'] = $this->Home_model->login_model($login_name,$password);
    	if(empty($data['login_data'])){
    		echo "Failed";
    	}
    	else{
    		echo "success";
    		$this->session->set_userdata('is_login',"1");
    		$this->session->set_userdata('user_data',$data['login_data']);
    	}
    }
    public function dashboard(){
    	$this->load->view("dashboard");
    }
    public function cash_voucher(){
        $this->load->view("voucher/cash");
    }
    public function bank_voucher(){
        $this->load->view("voucher/bank");
    }
    public function contra_voucher(){
        $this->load->view("voucher/contra");
    }
}
?>