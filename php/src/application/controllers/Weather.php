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
        $this->load->library('Weather_api');
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
        
        validateFields(['weather_city', 'weather_api_key', 'weather_state'], 'weather');
        
        $weatherParamsUpdated = $this->weather_model->update($postData);

        if($weatherParamsUpdated) 
        {
           redirect('weather');
        }

    }

   /**
	* Method for show screen weather of a region (City, State)
	*
    * @param none
    *
	* @return void
	*/
    public function view(): void
    {
        $data['pageTitle'] = 'Informações do Clima';
        $dataWeather = $this->weather_model->getData();
        
        $dataWeatherCity= $this->weather_api->requestWeather(
            [
                'city_name' => $dataWeather['weather_city'].",".$dataWeather['weather_state'],
                'fields'    => 'temp,description,city,sunrise,sunset,wind_speedy'
            ], 
            $dataWeather['weather_api_key']
        );
        
        $data['dataWeather'] = $dataWeatherCity;

        $this->loadTemplates($data);
        $this->load->view('pages/weather-info', $data);

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
