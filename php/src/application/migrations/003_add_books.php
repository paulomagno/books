<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Books extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'book_id' => array(
                                'type'           => 'INT',
                                'constraint'     => 10,
                                'unsigned'       => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'book_title' => array(
                                'type'       => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'book_description' => array(
                                'type'       => 'TEXT',
                                'null'       => TRUE
                        ),
                        'book_author' => array(
                                'type'       => 'VARCHAR',
                                'constraint' => '50',
                        ),
                        'book_pages' => array(
                                'type'       => 'INT',
                                'constraint' => 10,
                                 'null'      => TRUE
                        ),
                         'book_created_at' => array(
                                'type'       => 'DATETIME'
                        ),
                ));
                $this->dbforge->add_key('book_id', TRUE);
                $this->dbforge->create_table('books');
        }

        public function down()
        {
                $this->dbforge->drop_table('books');
        }
}