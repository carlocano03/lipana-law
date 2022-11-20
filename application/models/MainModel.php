<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class MainModel extends CI_Model
{
    /**
     * __construct function.
     * 
     * @access public
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function exportAccount()
    {
        $query = $this->db->get('user');
        return $query->result_array();
    }

    function exportInquiry()
    {
        $query = $this->db->get('inquiry');
        return $query->result_array();
    }

    function exportContact()
    {
        $query = $this->db->get('contact_us');
        return $query->result_array();
    }

    function getPermission()
    {
        $this->db->where('user_id', $_SESSION['loggedIn']['user_id']);
        $this->db->order_by('perm_id', 'ASC');
        return $this->db->get('roles_permission')->result();
    }
    

}
