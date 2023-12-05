<?php
/**
 * Books Model.
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

    /**
	 * Save a book in database
	 *
     * @param	array $data
	 * @return	bool
	 */
    public function save(array $data)
    {
       return $this->bookRepository->save($data);
    }

     /**
	 * Retrieve a book by ID
	 *
     * @param	int  $bookId
	 * @return	array
	 */
    public function getBookById(int $bookId): array
    {
       return $this->bookRepository->getBookById($bookId);
    }

    /**
	 * Update a book in database
	 *
     * @param	int   $bookId
     * @param   array $bookData
	 * @return	bool
	 */
    public function update(int $bookId, array $bookData): bool
    {
        return $this->bookRepository->update($bookId, $bookData);
    }

    /**
	 * Delete a book in database
	 *
     * @param	int   $bookId
     *
	 * @return	bool
	 */
    public function delete(int $bookId): bool
    {
        return $this->bookRepository->delete($bookId);
    }
}
