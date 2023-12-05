<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Weather Controller
 *
*/
class Weather extends CI_Controller {

	private $weatherModel;

   /**
	* Constructor Class
	*
    * @param	none
	* @return	void
	*/
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('weather_model');
        isAuthenticated();
    }
    
    /**
	 * Index Method for list weather api params.
     * 
     * @param  none
	 * @return void
    */
	public function index(): void
	{
		$data['pageTitle'] = 'Parâmetros - Api de Clima';
        $data['weather'] = $this->weather_model->getData();
      
        $this->loadTemplates($data);
        $this->load->view('pages/weather-form', $data);
	}
   
   /**
	* Method for update weather api params
	*
    * @param none
    *
	* @return void
	*/
    public function editApiParams(): void
    {
        $postData = $this->input->post();
        $weatherParamsUpdated = $this->weather_model->update($postData);

        if($weatherParamsUpdated) 
        {
           redirect('weather');
        }

    }

   /**
	* Method for load some application templates
	*
    * @param  array $data
    *
	* @return void
	*/
    private function loadTemplates(array $data): void
    {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav-top');
        $this->load->view('templates/footer');
        $this->load->view('templates/js');
    }
}
