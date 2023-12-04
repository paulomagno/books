<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends CI_Controller {

	private $booksModel;

   /**
	* Constructor Class
	*
    * @param	none
	* @return	void
	*/
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('books_model');
    }
    
    /**
	 * Index Method for list all books.
	 *
    */
	public function index()
	{
		$data['books'] = $this->books_model->getAllBooks();
        
        $this->load->view('pages/books', $data);
	}
}
