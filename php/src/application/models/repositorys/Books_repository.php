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
        return $this->CI->db->order_by('book_id', 'DESC')->get('books');
    }

    /**
	 * Save a book in database
	 *
     * @param	array $data
	 * @return	bool
	 */
    public function save(array $data): bool
    {
        $success = true;
        
        try {
            $this->CI->db->insert('books', $data);
        } catch (\Exception $e) {
           $success = false;
        }  
        
        return $success;
    }

    /**
	 * Retrieve a book by ID
	 *
     * @param	int  $bookId
	 * @return	array
	 */
    public function getBookById(int $bookId): array
    {
        $data = [];
        
        try {
            $data = $this->CI->db->get_where(
                'books', 
                [
                  'book_id' => $bookId
                ]
            )->row_array();
        } catch (\Exception $e) {
          
        } 
        
        return $data;
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
        $success = true;
        
        try {
           $this->CI->db->where('book_id', $bookId);
           $this->CI->db->update('books', $bookData);
        } catch (\Exception $e) {
           $success = false;
        } 
        
        return $success;
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
        $success = true;
        
        try {
           $this->CI->db->where('book_id', $bookId);
           $this->CI->db->delete('books');
        } catch (\Exception $e) {
           $success = false;
        } 
        
        return $success;
    }

    /**
	 * Search a book in database
	 *
     * @param	string   $searchTerm
     *
     * @return	object
	 */
    public function search(string $searchTerm)
    {
        try {
           $this->CI->db->like('book_title', $searchTerm);
           $this->CI->db->or_like('book_description', $searchTerm);
           $this->CI->db->or_like('book_author', $searchTerm);  
           return $this->CI->db->get('books'); 
        } catch (\Exception $e) {
           $success = false;
        } 
    }
}
