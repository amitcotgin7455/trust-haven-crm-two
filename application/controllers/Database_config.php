<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Database_config extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
    public function __construct()
    {
        parent::__construct();
        $this->load->library('auth');
        //$this->load->library('migration');
        $this->load->dbforge();
    }
	public function create_table($request)
	{
        // $this->load->dbforge();
        // $prefix = "tbl_";
		// $table = $prefix.$request;
        // $this->dbforge->add_field(array(
        //     'id' => array(
        //         'type' => "integer",
        //         'constraint' => 11,
        //         'auto_increment' => true,
        //         'unsigned'      => true
        //     ),
        //     'name' => array(
        //         'type' => "varchar",
        //         'constraint' => 100
        //     ),
        //     'username' => array(
        //         'type' => "varchar",
        //         'constraint' => 100,
        //     ),
        //     'password' => array(
        //         'type' => "varchar",
        //         'constraint' => 55
        //     ),
        //     'image' => array(
        //         'type' => "varchar",
        //         'constraint' => 255,
        //         'null' => true
        //     ),
        //     'user_type' => array(
        //         'type' => "tinyint",
        //         'constraint' => 1,
        //         'defualt_value' => 1,
        //         'comment'      => '1-Super Admin,2-Manager,3-Tech,4-Sales'
        //     ),
        //     'created_date' => array(
        //         'type' => "datetime"
        //     ),
        //     'mod_date' => array(
        //         'type' => "datetime"
        //     ),
        //     'status'  => array(
        //         'type'  => "INT",
        //         'constraint' => 1,
        //         'defualt_value' => 1,
        //         'comment'      => '1-Active,2-InActive,3-Deleted'
        //     )));

        //     $this->dbforge->add_key("id",true);
        //     $this->dbforge->create_table($table);

	}
}
