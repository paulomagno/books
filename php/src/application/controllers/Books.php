<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends CI_Controller {

	/**
	 * Index Page for list books.
	 *
    */
	public function index()
	{
		$this->load->view('pages/books');
	}
}
