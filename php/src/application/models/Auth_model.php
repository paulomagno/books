<?php
/**
 * Auth Model.
 *
*/
require_once APPPATH.'/models/repositorys/Auth_repository.php';

class Auth_model extends CI_Model {

    private $authRepository;
    
    /**
	 * Constructor Class
	 *
     * @param	none
	 * @return	void
	 */
    public function __construct() 
    {
        parent::__construct();
        $this->authRepository = new Auth_repository();
    }

     
    /**
	 * Method that validates authentication in application
	 *
     * @param  array $authData
	 * @return bool
	 */
    public function authenticate(array $authData): bool
    {
        return $this->authRepository->authenticate($authData);
    }
}
