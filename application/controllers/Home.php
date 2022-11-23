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
        $data['home'] = $this->WebModel->getHome();
        $data['attorneys'] = $this->WebModel->getAttorneys();
        $this->load->view('website/partials/__header');
        $this->load->view('website/home', $data);
        $this->load->view('website/partials/__footer');
        $this->load->view('website/ajaxRequest/consultationRequest');
    }

    public function about()
    {
        $data['about'] = $this->WebModel->getAboutUs();
        $this->load->view('website/partials/__header');
        $this->load->view('website/about', $data);
        $this->load->view('website/partials/__footer');
        $this->load->view('website/ajaxRequest/consultationRequest');
    }

    public function attorneys()
    {
        $this->load->view('website/partials/__header');
        $this->load->view('website/attorneys');
        $this->load->view('website/partials/__footer');
        $this->load->view('website/ajaxRequest/consultationRequest');
    }

    public function practiceAreas()
    {
        $data['areas'] = $this->WebModel->getAreas();
        $this->load->view('website/partials/__header');
        $this->load->view('website/practice_areas', $data);
        $this->load->view('website/partials/__footer');
        $this->load->view('website/ajaxRequest/consultationRequest');
    }

    public function contact()
    {
        $this->load->view('website/partials/__header');
        $this->load->view('website/contact');
        $this->load->view('website/partials/__footer');
        $this->load->view('website/ajaxRequest/consultationRequest');
    }

    public function sendConsultation()
    {
        $date_created = date('Y-m-d H:i:s');
        $insertConsultation = array(
            'contact_name' => $this->input->post('client_name'),
            'contact_email' => $this->input->post('client_email'),
            'contact_subject' => $this->input->post('subject'),
            'contact_message' => $this->input->post('message'),
            'status' => 'Unread',
            'date_created' => $date_created,
        );
        $this->db->insert('contact_us', $insertConsultation);
    }

}