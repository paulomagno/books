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
        $this->load->library('Pagination_bootstrap');
        $this->pagination_bootstrap->offset(3);
    }
    
    /**
	 * Index Method for list all books.
	 *
    */
	public function index()
	{
		$data['books'] = $this->pagination_bootstrap->config('index.php/books/index', $this->books_model->getAllBooks());
        $data['pageTitle'] = 'Listagem de Livros';
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav-top');
        $this->load->view('templates/footer');
        $this->load->view('templates/js');
        $this->load->view('pages/books-list', $data);
	}

   /**
	* Method for page render of adds new book 
	*
    */
	public function newBook()
	{
		$data['pageTitle'] = 'Novo Livro';
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav-top');
        $this->load->view('templates/footer');
        $this->load->view('templates/js');
        $this->load->view('pages/books-form', $data);
	}
}
