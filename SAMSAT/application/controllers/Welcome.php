<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function index()
	{
		$data = array(
			'judul' => 'Home',
			'page' => 'v_home',
		);
		$this->load->view('v_template', $data, false);
	}
}
