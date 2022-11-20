<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class WebsiteSettings extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Manila');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('WebsiteModel');
        $this->load->database();
        if (!isset($_SESSION['loggedIn'])) {
            redirect('user');
        }
    }

    public function addAbout()
    {
        $date_created = date('Y-m-d H:i:s');
        $videoID = 'VD' . time() . rand(10, 1000);
        if (!empty($_FILES['inpFile']['name'])) {
            $extension = explode('.', $_FILES['inpFile']['name']);
            $new_name = $videoID . '.' . $extension[1];
            $config['upload_path'] = 'uploaded_file/corporateVideo';
            $config['allowed_types'] = 'mp4|jpg|png';
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config);
            $this->upload->display_errors();
            $this->upload->initialize($config);
            if ($this->upload->do_upload('inpFile')) {
                $uploadData = $this->upload->data();
                $uploadFile = $uploadData['file_name'];
            } else {
                $uploadFile = '';
            }
        } else {
            $uploadFile = '';
        }

        $insertAbout = array(
            'title' => str_replace("'", "", $this->input->post('title')),
            'about_desc' => str_replace("'", "", $this->input->post('about_us')),
            'mission' => str_replace("'", "", $this->input->post('mission')),
            'vision' => str_replace("'", "", $this->input->post('vision')),
            'our_values' => str_replace("'", "", $this->input->post('values')),
            'corporate_video' => $uploadFile,
            'date_added' => $date_created,
        );
        $this->db->insert('about_us', $insertAbout);
    }

    public function getAbout()
    {
        $list = $this->WebsiteModel->getAbout();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $about) {
            $no++;
            $row = array();


            $row[] = $about->title;
            $row[] = '<div class="short" title="' . $about->about_desc . '">' . $about->about_desc . '</div>';
            $row[] = '<div class="short" title="' . $about->mission . '">' . $about->mission . '</div>';
            $row[] = '<div class="short" title="' . $about->vision . '">' . $about->vision . '</div>';
            $row[] = '<div class="short" title="' . $about->our_values . '">' . $about->our_values . '</div>';
            $row[] = $about->corporate_video;

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->WebsiteModel->count_all(),
            "recordsFiltered" => $this->WebsiteModel->count_filtered(),
            "data" => $data
        );
        echo json_encode($output);
    }

    public function getServices()
    {
        $list = $this->WebsiteModel->getServices();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $services) {
            $no++;
            $row = array();


            $row[] = $services->service_title;
            $row[] = $services->short_desc;
            $row[] = $services->service_image;
            $row[] = '<button class="btn btn-danger btn-sm delete_services" id="' . $services->service_id . '"><i class="bi bi-trash3-fill me-2"></i>Delete</button>';

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->WebsiteModel->count_all_services(),
            "recordsFiltered" => $this->WebsiteModel->count_filtered_services(),
            "data" => $data
        );
        echo json_encode($output);
    }

    public function addServices()
    {
        $date_created = date('Y-m-d H:i:s');
        $imgID = 'IMG' . time() . rand(10, 1000);
        if (!empty($_FILES['inpFile']['name'])) {
            $extension = explode('.', $_FILES['inpFile']['name']);
            $new_name = $imgID . '.' . $extension[1];
            $config['upload_path'] = 'uploaded_file/services';
            $config['allowed_types'] = 'mp4|jpg|png|jpeg|gif';
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config);
            $this->upload->display_errors();
            $this->upload->initialize($config);
            if ($this->upload->do_upload('inpFile')) {
                $uploadData = $this->upload->data();
                $uploadFile = $uploadData['file_name'];
            } else {
                $uploadFile = '';
            }
        } else {
            $uploadFile = '';
        }

        $insertServices = array(
            'service_title' => str_replace("'", "", $this->input->post('title')),
            'short_desc' => str_replace("'", "", $this->input->post('short_desc')),
            'service_image' => $uploadFile,
            'date_added' => $date_created,
        );
        $this->db->insert('services', $insertServices);
    }

    public function deleteServices()
    {
        $message = '';
        $servID = $this->input->post('servID');
        $date_created = date('Y-m-d H:i:s');
        $updateServices = array(
            'is_deleted' => 'Yes',
            'date_deleted' => $date_created
        );
        if ($this->db->where('service_id', $servID)->update('services', $updateServices)) {
            $message = 'Success';
        } else {
            $message = '';
        }
        $output = array(
            'message' => $message
        );
        echo json_encode($output);
    }

    public function getPracticeArea()
    {
        $list = $this->WebsiteModel->getPracticeArea();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $area) {
            $no++;
            $row = array();

            $row[] = $area->practice_title;
            $row[] = $area->short_desc;
            $row[] = $area->image;
            $row[] = '<button class="btn btn-danger btn-sm delete_practice" id="' . $area->practice_id . '"><i class="bi bi-trash3-fill me-2"></i>Delete</button>';

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->WebsiteModel->count_all_practice(),
            "recordsFiltered" => $this->WebsiteModel->count_filtered_practice(),
            "data" => $data
        );
        echo json_encode($output);
    }

    public function addPracticeArea()
    {
        $date_created = date('Y-m-d H:i:s');
        $imgID = 'ICN' . time() . rand(10, 1000);
        if (!empty($_FILES['inpFile']['name'])) {
            $extension = explode('.', $_FILES['inpFile']['name']);
            $new_name = $imgID . '.' . $extension[1];
            $config['upload_path'] = 'uploaded_file/practiceArea';
            $config['allowed_types'] = 'mp4|jpg|png|jpeg|gif';
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config);
            $this->upload->display_errors();
            $this->upload->initialize($config);
            if ($this->upload->do_upload('inpFile')) {
                $uploadData = $this->upload->data();
                $uploadFile = $uploadData['file_name'];
            } else {
                $uploadFile = '';
            }
        } else {
            $uploadFile = '';
        }

        $insertPractice = array(
            'practice_title' => str_replace("'", "", $this->input->post('title')),
            'short_desc' => str_replace("'", "", $this->input->post('short_desc')),
            'image' => $uploadFile,
            'date_created' => $date_created,
        );
        $this->db->insert('practice_area', $insertPractice);
    }

    public function deletePractice()
    {
        $message = '';
        $practiceID = $this->input->post('practiceID');
        $date_created = date('Y-m-d H:i:s');
        $updateServices = array(
            'is_deleted' => 'Yes',
            'date_deleted' => $date_created
        );
        if ($this->db->where('practice_id', $practiceID)->update('practice_area', $updateServices)) {
            $message = 'Success';
        } else {
            $message = '';
        }
        $output = array(
            'message' => $message
        );
        echo json_encode($output);
    }
}
