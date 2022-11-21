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


            $row[] = '<div>' . $about->title . '</div>
                      <span class="span-link update_about" title="Edit" id="' . $about->about_id . '"><i class="bi bi-pencil-square me-1"></i>Edit About</span>';
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

    public function getInquiry()
    {
        $inquiry = $this->WebsiteModel->getInquiry();
        $data = array();
        $no = $_POST['start'];
        foreach ($inquiry as $list) {
            $no++;
            $row = array();

            $row[] = $list->inquiry_id;
            $row[] = '<i class="bi bi-person-circle me-2"></i>' . $list->name_client;
            $row[] = 'Subject: ' . $list->subject;
            $row[] = date('D M j, Y', strtotime($list->date_created));
            $row[] = $list->status;

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->WebsiteModel->count_all_inquiry(),
            "recordsFiltered" => $this->WebsiteModel->count_filtered_inquiry(),
            "data" => $data
        );
        echo json_encode($output);
    }

    public function getContact()
    {
        $contact = $this->WebsiteModel->getContact();
        $data = array();
        $no = $_POST['start'];
        foreach ($contact as $list) {
            $no++;
            $row = array();

            $row[] = $list->contact_id;
            $row[] = '<i class="bi bi-person-circle me-2"></i>' . $list->contact_name;
            $row[] = 'Subject: ' . $list->contact_subject;
            $row[] = date('D M j, Y', strtotime($list->date_created));
            $row[] = $list->status;

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->WebsiteModel->count_all_contact(),
            "recordsFiltered" => $this->WebsiteModel->count_filtered_contact(),
            "data" => $data
        );
        echo json_encode($output);
    }

    public function getCount()
    {
        if (isset($_POST['count'])) {
            $inquiry_query  = $this->db->query("
                        SELECT *
                        FROM inquiry WHERE status='Unread'
                        ");
            $inquiry = $inquiry_query->num_rows();

            $contact_query  = $this->db->query("
                        SELECT *
                        FROM contact_us WHERE status='Unread'
                        ");
            $contact = $contact_query->num_rows();

            $data = array(
                'inquiry_count'  => $inquiry,
                'contact_count' => $contact
            );
            echo json_encode($data);
        }
    }

    public function getAboutUsData()
    {
        $aboutID = $this->input->post('aboutID');
        $output = array();
        $this->db->where('about_id', $aboutID);
        $query = $this->db->get('about_us')->result();
        foreach ($query as $row) {
            $output['title'] = $row->title;
            $output['about_us'] = $row->about_desc;
            $output['mission'] = $row->mission;
            $output['vision'] = $row->vision;
            $output['values'] = $row->our_values;
        }
        echo json_encode($output);
    }

    public function updateAboutUs()
    {
        $options = $this->input->post('update_trans');
        switch ($options) {
            case '2':
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

                $updateAbout = array(
                    'title' => str_replace("'", "", $this->input->post('title')),
                    'about_desc' => str_replace("'", "", $this->input->post('about_us')),
                    'mission' => str_replace("'", "", $this->input->post('mission')),
                    'vision' => str_replace("'", "", $this->input->post('vision')),
                    'our_values' => str_replace("'", "", $this->input->post('values')),
                    'corporate_video' => $uploadFile,
                );
                $this->db->where('about_id', $this->input->post('about_id'))->update('about_us', $updateAbout);
                break;

            default:
                $updateAbout = array(
                    'title' => str_replace("'", "", $this->input->post('title')),
                    'about_desc' => str_replace("'", "", $this->input->post('about_us')),
                    'mission' => str_replace("'", "", $this->input->post('mission')),
                    'vision' => str_replace("'", "", $this->input->post('vision')),
                    'our_values' => str_replace("'", "", $this->input->post('values')),
                );
                $this->db->where('about_id', $this->input->post('about_id'))->update('about_us', $updateAbout);
                break;
        }
    }
}
