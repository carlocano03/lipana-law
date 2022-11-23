<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class WebModel extends CI_Model
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

    function getAboutUs()
    {
        $this->db->limit(1);
        $this->db->order_by('about_id', 'DESC');
        $query = $this->db->get('about_us');
        return $query->row();
    }

    function getHome()
    {
        $this->db->limit(1);
        $this->db->order_by('section_id', 'DESC');
        $query = $this->db->get('home_section');
        return $query->row();
    }

    function getServices()
    {
        $this->db->order_by('service_id', 'DESC');
        $query = $this->db->get('services');
        return $query->result();
    }

    function getAreas()
    {
        $this->db->order_by('practice_id', 'DESC');
        $query = $this->db->get('practice_area');
        return $query->result();
    }

    function getAttorneys()
    {
        $this->db->limit(4);
        $this->db->order_by('attorney_id', 'DESC');
        $query = $this->db->get('attorneys');
        return $query->result();
    }


}