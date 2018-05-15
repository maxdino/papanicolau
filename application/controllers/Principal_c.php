<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Principal_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Principal_m');
		
	}


	public function index()
	{
		$this->load->view('principal/Principal_v');
	}
 
	public function logout()
	{
		if($_SESSION["recuerdo"]=='0'){
				setcookie('usuario','', time()-3000,"/");
				setcookie('recuerdo','', time()- 3000,"/");
			}
		session_destroy();
        redirect('Portal_c');
	}





}