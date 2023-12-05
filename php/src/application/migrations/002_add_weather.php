<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Weather extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'weather_id' => array(
                                'type'           => 'INT',
                                'constraint'     => 5,
                                'unsigned'       => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'weather_city' => array(
                                'type'       => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'weather_state' => array(
                                'type'       => 'CHAR',
                                'constraint' => '2',
                        ),
                        'weather_api_key' => array(
                                'type'       => 'VARCHAR',
                                'constraint' => '20',
                        ),
                ));
                $this->dbforge->add_key('weather_id', TRUE);
                $this->dbforge->create_table('weather');
                $this->createWeatherData();
        }

        public function down()
        {
                $this->dbforge->drop_table('weather');
        }

       /**
	* Mocks datas for weather api
        * @param  none
        * @return void
	*/
        private function createWeatherData() 
        {
              $this->db->insert('weather', 
                [
                   'weather_city'    => 'Porto Alegre',
                   'weather_state'   => 'RS',
                   'weather_api_key' => '7886fba3'
                ]
             );           
        }
}