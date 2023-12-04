<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migrations extends CI_Controller {

   /**
	* Controller that creates books application tables.
	*/
	public function index()
	{
		
        $this->load->library('migration');
        
        if ($this->migration->current() === FALSE)
        {
            show_error($this->migration->error_string());
        }
        else {
            echo " Tables are created successfully ";
        }
	}
}
