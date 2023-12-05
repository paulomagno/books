<?php
/**
 * Weather Model.
 *
*/
require_once APPPATH.'/models/repositorys/Weather_repository.php';

class Weather_model extends CI_Model {

    private $weatherRepository;
    
    /**
	 * Constructor Class
	 *
     * @param	none
	 * @return	void
	 */
    public function __construct() 
    {
        parent::__construct();
        $this->weatherRepository = new Weather_repository();
    }

     
    /**
	 * Retrieve data of weather api params
	 *
     * @param	none
	 * @return	array
	 */
    public function getData(): array
    {
        return $this->weatherRepository->getData();
    }

   /**
	* Update data of weather api params
	*
    * @param  array	$weatherData
	* @return bool
	*/
    public function update(array $weatherData): bool
    {
        return $this->weatherRepository->update($weatherData);
    }
}
