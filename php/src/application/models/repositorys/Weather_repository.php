<?php
/**
 * Repository for weather api params in application.
 *
*/
class Weather_repository {

    private $CI;

    /**
	 * Constructor Class
	 *
     * @param	none
	 * @return	void
	 */
    public function __construct() 
    {
        $this->CI =& get_instance();
        $this->CI->load->database();
    }
    
    /**
	 * Retrieve data of weather api params
	 *
     * @param	none
	 * @return	array
	 */
    public function getData(): array
    {
        try {
            return $this->CI->db->get('weather')->row_array();
        } catch (\Exception $e) {
        }  
    }

    /**
	 * Update data of weather api params
	 *
     * @param  array	$weatherData
	 * @return bool
	 */
    public function update(array $weatherData): bool
    {
        $success = true;
        
        try {
            $this->CI->db->update('weather', $weatherData);
        } catch (\Exception $e) {
           $success = false;
        } 
        
        return $success;
    }
}
