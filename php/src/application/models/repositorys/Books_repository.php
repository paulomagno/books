<?php
/**
 * Repository for collection books.
 *
*/
class Books_repository {

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
	 * Returns all books
	 *
     * @param	none
	 * @return	object
	 */
    public function getAllBooks() 
    {
        return $this->CI->db->get('books');
    }
}
