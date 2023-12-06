<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Authenticator Controller
 *
*/
class Auth extends CI_Controller {

   /**
	* Constructor Class
	*
    * @param	none
	* @return	void
	*/
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('auth_model');
    }

   /**
	* Index Method for login page.
    * 
    * @param  none
	* @return void
    */
	public function index(): void
	{
		$data['pageTitle'] = 'Books App - Login';

        $this->load->view('pages/login', $data);
	}

   /**
	* Auth Method for login in application.
    * 
    * @param  none
	* @return void
    */
	public function authenticate(): void
	{
		$postData = $this->input->post();
        
        validateFields(['user_name', 'user_password'], 'auth');

        $isAuthenticated = $this->auth_model->authenticate($postData);

        if ($isAuthenticated) 
        {
            $this->session->set_userdata('logged_user', true);
            redirect('books');
        }
        
        redirect('auth');
    }

   /**
	* Method for logout in application.
    * 
    * @param  none
	* @return void
    */
	public function logout(): void
	{
		$this->session->unset_userdata('logged_user');
        redirect('auth');
    }
}    