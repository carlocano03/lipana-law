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

    var $inquiry = 'inquiry';
    var $inquiry_order = array('name_client', 'client_email', 'subject', 'status');
    var $inquiry_search = array('name_client', 'client_email', 'subject', 'status'); //set column field database for datatable searchable just article , description , serial_num, property_num, department are searchable
    var $order_inquiry = array('inquiry_id' => 'desc'); // default order

    var $contact = 'contact_us';
    var $contact_order = array('contact_id', 'contact_name', 'contact_subject', 'status', 'date_created');
    var $contact_search = array('contact_id', 'contact_name', 'contact_subject', 'status', 'date_created'); //set column field database for datatable searchable just article , description , serial_num, property_num, department are searchable
    var $order_contact = array('contact_id' => 'desc'); // default order

    var $home = 'home_section';
    var $home_order = array('why_select_us', 'sec_one_title', 'sec_one_desc', 'sec_two_title', 'sec_two_desc', 'sec_three_title', 'sec_three_desc');
    var $home_search = array('why_select_us', 'sec_one_title', 'sec_one_desc', 'sec_two_title', 'sec_two_desc', 'sec_three_title', 'sec_three_desc'); //set column field database for datatable searchable just article , description , serial_num, property_num, department are searchable
    var $order_home = array('section_id' => 'desc'); // default order

    var $attorneys = 'attorneys';
    var $attorneys_order = array('name', 'practice_area', 'short_quotes', 'image');
    var $attorneys_search = array('name', 'practice_area', 'short_quotes'); //set column field database for datatable searchable just article , description , serial_num, property_num, department are searchable
    var $order_attorneys = array('attorney_id' => 'desc'); // default order
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

    //Get Home
    public function getHome()
    {
        $this->_getHome_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_home()
    {
        $this->_getHome_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_home()
    {
        $this->db->from($this->home);
        return $this->db->count_all_results();
    }

    private function _getHome_query()
    {
        $this->db->from($this->home);

        $i = 0;
        foreach ($this->home_search as $item) // loop column 
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

                if (count($this->home_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->home_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order_home)) {
            $order = $this->order_home;
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

    //Get Attorneys
    public function getAttorney()
    {
        $this->_getAttorney_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_attorney()
    {
        $this->_getAttorney_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_attorney()
    {
        $this->db->where('is_deleted', NULL);
        $this->db->from($this->attorneys);
        return $this->db->count_all_results();
    }

    private function _getAttorney_query()
    {
        $this->db->where('is_deleted', NULL);
        $this->db->from($this->attorneys);

        $i = 0;
        foreach ($this->attorneys_search as $item) // loop column 
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

                if (count($this->attorneys_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->attorneys_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order_attorneys)) {
            $order = $this->order_attorneys;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    //Get Inquiry
    public function getInquiry()
    {
        $this->_getInquiry_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_inquiry()
    {
        $this->_getInquiry_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_inquiry()
    {
        $this->db->from($this->inquiry);
        return $this->db->count_all_results();
    }

    private function _getInquiry_query()
    {
        $this->db->from($this->inquiry);

        $i = 0;
        foreach ($this->inquiry_search as $item) // loop column 
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

                if (count($this->inquiry_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->inquiry_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order_inquiry)) {
            $order = $this->order_inquiry;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    //Get Contact Us
    public function getContact()
    {
        $this->_getContact_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_contact()
    {
        $this->_getContact_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_contact()
    {
        $this->db->from($this->contact);
        return $this->db->count_all_results();
    }

    private function _getContact_query()
    {
        $this->db->from($this->contact);

        $i = 0;
        foreach ($this->contact_search as $item) // loop column 
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

                if (count($this->contact_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->contact_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order_contact)) {
            $order = $this->order_contact;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

}