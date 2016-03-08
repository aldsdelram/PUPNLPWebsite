<?php
class Users extends CI_Controller {
	public function register()
	{
        $this->load->view('Users/register');
	}
}