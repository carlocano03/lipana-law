<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Main extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Manila');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('UserModel');
        $this->load->model('MainModel');
        $this->load->database();
        if (!isset($_SESSION['loggedIn'])) {
            redirect('user');
        }
    }

    //========================================================================================

    public function index()
    {
        $data['permissions'] = $this->MainModel->getPermission();
        $this->load->view('admin/partials/__header', $data);
        $this->load->view('admin/dashboard');
        $this->load->view('admin/partials/__footer');
        $this->load->view('admin/adminAjaxRequest/profileRequest');
    }

    //========================================================================================

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('user');
    }

    //========================================================================================

    public function accountManagement()
    {
        $data['permissions'] = $this->MainModel->getPermission();
        $this->load->view('admin/partials/__header', $data);
        $this->load->view('admin/account_management');
        $this->load->view('admin/partials/__footer');
        $this->load->view('admin/adminAjaxRequest/profileRequest');
    }

    public function about()
    {
        $data['permissions'] = $this->MainModel->getPermission();
        $this->load->view('admin/partials/__header', $data);
        $this->load->view('admin/about');
        $this->load->view('admin/partials/__footer');
        $this->load->view('admin/adminAjaxRequest/websiteRequest');
    }

    public function services()
    {
        $data['permissions'] = $this->MainModel->getPermission();
        $this->load->view('admin/partials/__header', $data);
        $this->load->view('admin/services');
        $this->load->view('admin/partials/__footer');
        $this->load->view('admin/adminAjaxRequest/websiteRequest');
    }

    public function practiceAreas()
    {
        $data['permissions'] = $this->MainModel->getPermission();
        $this->load->view('admin/partials/__header', $data);
        $this->load->view('admin/practice_areas');
        $this->load->view('admin/partials/__footer');
        $this->load->view('admin/adminAjaxRequest/websiteRequest');
    }

    public function inquiry()
    {
        $data['permissions'] = $this->MainModel->getPermission();
        $this->load->view('admin/partials/__header', $data);
        $this->load->view('admin/inquiry');
        $this->load->view('admin/partials/__footer');
        $this->load->view('admin/adminAjaxRequest/websiteRequest');
    }

    public function contactUs()
    {
        $data['permissions'] = $this->MainModel->getPermission();
        $this->load->view('admin/partials/__header', $data);
        $this->load->view('admin/contact');
        $this->load->view('admin/partials/__footer');
        $this->load->view('admin/adminAjaxRequest/websiteRequest');
    }

    public function viewInquiry()
    {
        $inquiryID = $this->uri->segment(3);
        $this->db->where('inquiry_id', $inquiryID)->update('inquiry', array('status' => 'Read'));
        $data['inquiry'] = $this->db->where('inquiry_id', $inquiryID)->get('inquiry')->row();
        $data['permissions'] = $this->MainModel->getPermission();
        $this->load->view('admin/partials/__header', $data);
        $this->load->view('admin/view_inquiry', $data);
        $this->load->view('admin/partials/__footer');
        $this->load->view('admin/adminAjaxRequest/websiteRequest');
    }

    public function viewContact()
    {
        $contactID = $this->uri->segment(3);
        $this->db->where('contact_id', $contactID)->update('contact_us', array('status' => 'Read'));
        $data['contact'] = $this->db->where('contact_id', $contactID)->get('contact_us')->row();
        $data['permissions'] = $this->MainModel->getPermission();
        $this->load->view('admin/partials/__header', $data);
        $this->load->view('admin/view_contact', $data);
        $this->load->view('admin/partials/__footer');
        $this->load->view('admin/adminAjaxRequest/websiteRequest');
    }

    //========================================================================================

    public function changePassword()
    {
        $message = '';
        $updatePassword = array(
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'temp_pass' => NULL,
        );
        if ($this->db->where('user_id', $_SESSION['loggedIn']['user_id'])->update('user', $updatePassword)) {
            $message = 'Success';
        } else {
            $message = '';
        }
        $output = array(
            'message' => $message,
        );
        echo json_encode($output);
    }

    public function get_accountData()
    {
        $list = $this->UserModel->get_accountData();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $account) {
            $no++;
            $row = array();

            $row[] = '<button class="btn btn-secondary btn-sm add_permission" title="Add Permission" id="' . $account->user_id . '"><i class="bi bi-person-fill-gear me-2"></i>Add Permission</butto>';
            $row[] = $account->username;
            $row[] = $account->fullname;
            $row[] = date('D F j, Y h:i a', strtotime($account->created_at));

            if (isset($account->is_active) && $account->is_active == 'Active') {
                $row[] = '<label class="switch">
							  <input type="checkbox" class="account_activation" id="' . $account->user_id . '" checked>
							  <span class="slider round"></span>
					  	  </label><br>' . $account->is_active . '';
            } else {
                $row[] = '<label class="switch">
						  <input type="checkbox" class="account_activation" id="' . $account->user_id . '">
						  <span class="slider round"></span>
					  	 </label><br>' . $account->is_active . '';
            }

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->UserModel->count_all(),
            "recordsFiltered" => $this->UserModel->count_filtered(),
            "data" => $data
        );
        echo json_encode($output);
    }

    public function account_activated()
    {
        $error = '';
        if ($this->db->where('user_id', $_POST['userID'])->update('user', array('is_active' => 'Active')))
            $error = 'Success';
        else
            $error = 'Error';
        $output = array(
            'success' => $error,
        );
        echo json_encode($output);
    }

    public function account_deactivated()
    {
        $error = '';
        if ($this->db->where('user_id', $_POST['userID'])->update('user', array('is_active' => 'Inactive')))
            $error = 'Success';
        else
            $error = 'Error';
        $output = array(
            'success' => $error,
        );
        echo json_encode($output);
    }

    public function get_Permission()
    {
        $user = $this->uri->segment(3);
        $list = $this->db->get('permissions')->result();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $account) {
            $no++;
            $row = array();

            $query = $this->db->query("
                SELECT * FROM roles_permission WHERE perm_id = '" . $account->perm_id . "'
                AND user_id = '" . $user . "'
            ");

            $res = $query->row();

            $row[] = $account->perm_desc;

            if (isset($res->access) && $res->access == 'Yes') {
                $row[] = '<label class="switch">
							  <input type="checkbox" class="action_session" id="' . $account->perm_id . '" data-user="' . $user . '" data-desc="' . $account->perm_desc . '" checked>
							  <span class="slider round"></span>
					  	  </label><br>ON';
            } else {
                $row[] = '<label class="switch">
						  <input type="checkbox" class="action_session" id="' . $account->perm_id . '" data-user="' . $user . '" data-desc="' . $account->perm_desc . '">
						  <span class="slider round"></span>
					  	 </label><br>OFF';
            }

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "data" => $data
        );
        echo json_encode($output);
    }

    public function add_permission()
    {
        $success = '';
        $userID = $this->input->post('userID');
        $permID = $this->input->post('perm_id');
        $desc = $this->input->post('desc');
        $grantPermission = array(
            'user_id' => $userID,
            'perm_id' => $permID,
            'permissions' => $desc,
            'access' => 'Yes',
        );
        if ($this->db->insert('roles_permission', $grantPermission))
            $success = 'Success';
        else
            $success = 'Error';
        $output = array(
            'success' => $success,
        );
        echo json_encode($output);
    }

    public function remove_permission()
    {
        $success = '';
        $userID = $this->input->post('userID');
        $permID = $this->input->post('perm_id');
        $removePermission = array(
            'user_id' => $userID,
            'perm_id' => $permID,
        );
        if ($this->db->delete('roles_permission', $removePermission))
            $success = 'Success';
        else
            $success = 'Error';
        $output = array(
            'success' => $success,
        );
        echo json_encode($output);
    }

    public function exportAccount()
    {
        require_once 'vendor/autoload.php';
        $account = $this->MainModel->exportAccount();
        $objReader = IOFactory::createReader('Xlsx');
        $fileName = 'Account.xlsx';

        $spreadsheet = $objReader->load(FCPATH . '/assets/template/' . $fileName);
        $sheet = $spreadsheet->getActiveSheet();
        $startRow = 5;
        $currentRow = 5;
        foreach ($account as $val) {
            $spreadsheet->getActiveSheet()->insertNewRowBefore($currentRow + 1, 1);
            $spreadsheet->getActiveSheet()
                ->setCellValue('A' . $currentRow, $val['username'])
                ->setCellValue('B' . $currentRow, $val['fullname'])
                ->setCellValue('C' . $currentRow, $val['is_active'])
                ->setCellValue('D' . $currentRow, $val['created_at']);
            $currentRow++;
        } //end of foreach
        $spreadsheet->getActiveSheet()->removeRow($currentRow, 1);
        $objWriter = IOFactory::createWriter($spreadsheet, 'Xlsx');
        header('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); //mime type
        header('Content-Disposition: attachment;filename="' . $fileName . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
        $objWriter->save('php://output');
    }

    public function exportInquiry()
    {
        require_once 'vendor/autoload.php';
        $inquiry = $this->MainModel->exportInquiry();
        $objReader = IOFactory::createReader('Xlsx');
        $fileName = 'Inquiry.xlsx';

        $spreadsheet = $objReader->load(FCPATH . '/assets/template/' . $fileName);
        $sheet = $spreadsheet->getActiveSheet();
        $startRow = 4;
        $currentRow = 4;
        foreach ($inquiry as $val) {
            $spreadsheet->getActiveSheet()->insertNewRowBefore($currentRow + 1, 1);
            $spreadsheet->getActiveSheet()
                ->setCellValue('A' . $currentRow, $val['name_client'])
                ->setCellValue('B' . $currentRow, $val['client_email'])
                ->setCellValue('C' . $currentRow, $val['subject'])
                ->setCellValue('D' . $currentRow, $val['message'])
                ->setCellValue('E' . $currentRow, $val['date_created']);
            $currentRow++;
        } //end of foreach
        $spreadsheet->getActiveSheet()->removeRow($currentRow, 1);
        $objWriter = IOFactory::createWriter($spreadsheet, 'Xlsx');
        header('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); //mime type
        header('Content-Disposition: attachment;filename="' . $fileName . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
        $objWriter->save('php://output');
    }

    public function exportContact()
    {
        require_once 'vendor/autoload.php';
        $inquiry = $this->MainModel->exportContact();
        $objReader = IOFactory::createReader('Xlsx');
        $fileName = 'Contact Us.xlsx';

        $spreadsheet = $objReader->load(FCPATH . '/assets/template/' . $fileName);
        $sheet = $spreadsheet->getActiveSheet();
        $startRow = 4;
        $currentRow = 4;
        foreach ($inquiry as $val) {
            $spreadsheet->getActiveSheet()->insertNewRowBefore($currentRow + 1, 1);
            $spreadsheet->getActiveSheet()
                ->setCellValue('A' . $currentRow, $val['contact_name'])
                ->setCellValue('B' . $currentRow, $val['contact_email'])
                ->setCellValue('C' . $currentRow, $val['contact_subject'])
                ->setCellValue('D' . $currentRow, $val['contact_message'])
                ->setCellValue('E' . $currentRow, $val['date_created']);
            $currentRow++;
        } //end of foreach
        $spreadsheet->getActiveSheet()->removeRow($currentRow, 1);
        $objWriter = IOFactory::createWriter($spreadsheet, 'Xlsx');
        header('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); //mime type
        header('Content-Disposition: attachment;filename="' . $fileName . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
        $objWriter->save('php://output');
    }
}
