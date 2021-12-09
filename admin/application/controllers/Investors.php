<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Investors extends CI_Controller {

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
    public function add(){
    	//if(isset($_SESSION["is_login"])){
    	//$this->session->set_userdata('is_login'
    	$this->load->view('investors/add');
    }
    public function list(){
    	$data["investors"] = $this->Home_model->investors();
    	 
    	$this->load->view('investors/index',$data);
    }
    public function investor_process(){
    	$array = array(
    			'name'=>$_POST['name'],
    			'number'=>$_POST['number'],
    			'nic'=>$_POST['nic'],
    			);
    	$this->db->insert("investors",$array);
    	$id = $this->db->insert_id();
    	if($id==0){}
    	else{
    		$array = array(
    			'user_name'=>$_POST['number'],
    			'mobile_number'=>$_POST['number'],
    			'password'=>$_POST['password'],
    			'role_id'=>2,
    			);
    		$this->db->insert("user_login",$array);
    		$id = $this->db->insert_id();
    		if($id==0){}
    		else{
    			echo "Data Inserted";
    		}
    	}
    }
    
}
?>