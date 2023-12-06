<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
*----------------------------------------------------------------
*------------  Weather API   ------------------------------------
*----------------------------------------------------------------
*
* Api Simples de consulta do clima atual de determinada cidade
* Os dados são fornecidos pela equipe do site https://hgbrasil.com/
* 
* Call library: $this->load->library("weather_api");
*
* @author Paulo Magno Miranda
* @version 1.0
* @access public
*/

class Weather_Api 
{
   /**
	* Retrieve data of weather api
	*
    * @param	array  $parameters
    * @param    string $apiKey
    * @param    string $endpoint
    *
    * @return	array
	*/
    public function requestWeather(array $parameters, string $apiKey, string $endPoint = 'weather'): array
    {
        $url = 'https://api.hgbrasil.com/'.$endPoint.'/?format=json&';

        if(is_array($parameters))
        {
            if(!empty($apiKey)) $parameters = array_merge($parameters, array('key' => $apiKey));
            
            foreach($parameters as $key => $value)
            {
                if(empty($value)) continue;
                $url .= $key.'='.urlencode($value).'&';
            }
            
            try {
                $response = file_get_contents(substr($url, 0, -1));
                return json_decode($response, true);
            } catch (\Throwable $th) {
                $messageError =  'Error when trying to get content from the Weather API: ' . $th->getMessage();
                show_error($messageError, 400, 'An Error Was Encountered');
            }
        } 
        
        return []; 
    }
}