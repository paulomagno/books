<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Books Controller
 *
*/
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
        isAuthenticated();
    }
    
    /**
	 * Index Method for list all books.
     * 
     * @param  none
	 * @return void
    */
	public function index(): void
	{
		$data['books'] = $this->pagination_bootstrap->config('index.php/books/index', $this->books_model->getAllBooks());
        $data['pageTitle'] = 'Listagem de Livros';
        
        $this->loadTemplates($data);
        $this->load->view('pages/books-list', $data);
	}

   /**
	* Method for page render of adds new book 
	*
    * @param  none
    *
    * @return void
    */
	public function newBook(): void
	{
		$data['pageTitle'] = 'Novo Livro';
        
        $this->loadTemplates($data);

        $this->load->view('pages/books-form', $data);
	}
   
   /**
	* Method for save a new book
	*
    * @param  none
    *
	* @return void
	*/
    public function saveBook(): void
    {
        $postData = $this->input->post();
        $postData['book_created_at'] = date('Y-m-d H:i:s');
        
        $bookInserted = $this->books_model->save($postData);

        if($bookInserted) 
        {
            redirect('books');
        }

    }

   /**
	* Method for page render of edit book 
	*
    * @param  int $bookId
    *
    * @return void
    */
	public function viewBook(int $bookId): void
	{
		$data['pageTitle'] = 'Edição de Livro';
        
        $this->loadTemplates($data);

        $data['book'] = $this->books_model->getBookById($bookId);

        $this->load->view('pages/books-form', $data);
	}

   /**
	* Method for update book
	*
    * @param int $bookId
    *
	* @return void
	*/
    public function editBook(int $bookId): void
    {
        $postData = $this->input->post();
        $bookUpdated = $this->books_model->update($bookId, $postData);

        if($bookUpdated) 
        {
           redirect('books');
        }

    }

   /**
	* Method for delete book
	*
    * @param int $bookId
    *
	* @return void
	*/
    public function deleteBook(int $bookId): void
    {
        $bookDeleted = $this->books_model->delete($bookId);

        if($bookDeleted) 
        {
           redirect('books');
        }

    }

   /**
	* Method for search given book
	*
    * @param none
    *
	* @return void
	*/
    public function searchBook()
    {
        $searchTerm = $this->input->post('search_term');
       
        if(!empty($searchTerm)) 
        {
            $data['books'] = $this->pagination_bootstrap->config('index.php/books/index', $this->books_model->search($searchTerm));
            $data['pageTitle'] = 'Pesquisa de Livros pelo termo : '.$searchTerm;
            
            $this->loadTemplates($data);
            $this->load->view('pages/books-list', $data);
        }
        else {
            redirect('books');
        }
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
