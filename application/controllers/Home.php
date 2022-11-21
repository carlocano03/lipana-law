<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Manila');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('WebModel');
        $this->load->database();
    }

    public function index()
    {
        $data['about'] = $this->WebModel->getAboutUs();
        $data['services'] = $this->WebModel->getServices();
        $this->load->view('website/partials/__header');
        $this->load->view('website/home', $data);
        $this->load->view('website/partials/__footer');
        $this->load->view('website/ajaxRequest/consultationRequest');
    }

    public function sendConsultation()
    {
        $date_created = date('Y-m-d H:i:s');
        $insertConsultation = array(
            'name_client' => $this->input->post('client_name'),
            'client_email' => $this->input->post('client_email'),
            'subject' => $this->input->post('subject'),
            'message' => $this->input->post('message'),
            'status' => 'Unread',
            'date_created' => $date_created,
        );
        $this->db->insert('inquiry', $insertConsultation);
    }

}