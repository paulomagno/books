<?php
/**
 * Repository for authentication in application.
 *
*/
class Auth_repository {

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
	 * Authenticate in database application
	 *
     * @param	array $authData
	 * @return	bool
	 */
    public function authenticate(array $authData): bool
    {
        $loginValid = true;
        
        try {
            
            $this->CI->db->where('user_name', $authData['user_name']);
            $this->CI->db->where('user_password', $authData['user_password']);
            $existsUser = $this->CI->db->get('users')->num_rows();
            $loginValid = $existsUser > 0 ? true : false;
        
        } catch (\Exception $e) {
            $loginValid = false;
        }  

        return $loginValid;
    }
}
