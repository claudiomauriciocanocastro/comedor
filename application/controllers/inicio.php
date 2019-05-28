<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class inicio extends CI_Controller {
   function __construct()
    {
     parent::__construct();
     $this->load->model('bases_model');
    }
    
	public function index()
	{
		$this->load->view('header');
		$this->load->view('menu_general');
		$this->load->view('inicio');
		$this->load->view('footer');
	}
}