<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Manila');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('UserModel');
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function registerAccount()
    {
        $message = '';
        $username = 'LPW-' . date('Y') . '-' . rand(10, 1000);
        $tempPass = $this->generateRandomString();
        $exist = $this->UserModel->existing_account($username);
        if ($exist->num_rows() > 0) {
            $message = 'Account exist';
        } else {
            $date_created = date('Y-m-d H:i:s');

            $insert_account = array(
                'username' => $username,
                'password' => password_hash($tempPass, PASSWORD_DEFAULT),
                // 'fullname' => 'TheBox Software Dev',
                'fullname' => $this->input->post('fullname'),
                'is_active' => 'Active',
                'created_at' => $date_created,
                'temp_pass' => $tempPass,
            );
            $this->db->insert('user', $insert_account);
        }
        $output = array(
			'message' => $message,
		);
		echo json_encode($output);
    }

    public function login_process()
    {
        $success = '';
        $error = '';
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $session = $this->UserModel->user_check_admin($username, $password);
        $userCheck = $this->UserModel->userCheck($username);

        if ($userCheck > 0) {
            if ($session) {
                if ($session->is_active == 'Inactive') {
                    $error = '<div class="alert alert-danger">Your account is deactivated.</div>';
                } elseif ($session->user_status == 'For Reset') {
                    $error = '<div class="alert alert-danger">Your account is for reset.</div>';
                } else {
                    $sess_array = array(
                        'user_id' => $session->user_id,
                        'username' => $session->username,
                        'status' => $session->is_active,
                        'fullname' => $session->fullname,
                        'temp_pass' => $session->temp_pass,
                    );
                    $this->session->set_userdata('loggedIn', $sess_array);
                    $success = '<div class="alert alert-success">Please wait redirecting...</div>';
                }
            } else {
                $error = '<div class="alert alert-danger">Invalid password!</div>';
            }
        } else {
            $error = '<div class="alert alert-danger">Invalid username!</div>';
        }
        $output = array(
            'success' => $success,
            'error' => $error,
        );
        echo json_encode($output);
    }

    //generate temporary password
    function generateRandomString($length = 6)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
