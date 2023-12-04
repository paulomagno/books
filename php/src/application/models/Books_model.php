<?php
/**
 * Model Books .
 *
*/
require_once APPPATH.'/models/repositorys/Books_repository.php';

class Books_model extends CI_Model {

    private $bookRepository;
    
    /**
	 * Constructor Class
	 *
     * @param	none
	 * @return	void
	 */
    public function __construct() 
    {
        parent::__construct();
        $this->bookRepository = new Books_repository();
    }

    /**
	 * Returns all books in application
	 *
     * @param	none
	 * @return	object
	 */
    public function getAllBooks()
    {
       return $this->bookRepository->getAllBooks();
    }
}
