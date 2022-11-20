<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class WebsiteModel extends CI_Model
{
    var $about = 'about_us';
    var $about_order = array('title', 'about_desc', 'mission', 'vision', 'our_values');
    var $about_search = array('title', 'about_desc', 'mission', 'vision', 'our_values'); //set column field database for datatable searchable just article , description , serial_num, property_num, department are searchable
    var $order = array('about_id' => 'desc'); // default order

    var $services = 'services';
    var $services_order = array('service_title', 'short_desc', 'service_image', 'date_added');
    var $services_search = array('service_title', 'short_desc', 'service_image', 'date_added'); //set column field database for datatable searchable just article , description , serial_num, property_num, department are searchable
    var $order_services = array('service_id' => 'desc'); // default order

    var $area = 'practice_area';
    var $area_order = array('practice_title', 'short_desc', 'image', 'date_created');
    var $area_search = array('practice_title', 'short_desc', 'image', 'date_created'); //set column field database for datatable searchable just article , description , serial_num, property_num, department are searchable
    var $order_area = array('practice_id' => 'desc'); // default order
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

    public function getAbout()
    {
        $this->_getAbout_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered()
    {
        $this->_getAbout_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->about);
        return $this->db->count_all_results();
    }

    private function _getAbout_query()
    {
        $this->db->from($this->about);

        $i = 0;
        foreach ($this->about_search as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {
                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->about_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->about_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    //Get Services
    public function getServices()
    {
        $this->_getServices_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_services()
    {
        $this->_getServices_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_services()
    {
        $this->db->where('is_deleted', NULL);
        $this->db->from($this->services);
        return $this->db->count_all_results();
    }

    private function _getServices_query()
    {
        $this->db->where('is_deleted', NULL);
        $this->db->from($this->services);

        $i = 0;
        foreach ($this->services_search as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {
                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->services_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->services_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order_services)) {
            $order = $this->order_services;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    //Get Practice Area
    public function getPracticeArea()
    {
        $this->_getPracticeArea_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_practice()
    {
        $this->_getPracticeArea_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_practice()
    {
        $this->db->where('is_deleted', NULL);
        $this->db->from($this->area);
        return $this->db->count_all_results();
    }

    private function _getPracticeArea_query()
    {
        $this->db->where('is_deleted', NULL);
        $this->db->from($this->area);

        $i = 0;
        foreach ($this->area_search as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {
                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->area_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->area_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order_area)) {
            $order = $this->order_area;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

}