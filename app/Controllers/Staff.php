<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\IncomingRequest;

class Staff extends BaseController
{
    public function index()
    {
        //
    }
    //Authenticate a login of Staff
    public function create()
    {
        $session = session();
        helper('form');
        // $request = service('request');
        // $username = $request->getPost('username');
        // $password = $request->getPost('password');

        if(!$this->request->is('post')) //Request is get
        {
            return view('staff_signup');
        }

        //If it's a post request
        $post = $this->request->getPost(['firstname', 'lastname', 'email', 'username', 'password', 'role']);

        //Check validation
        if(!$this->validateData($post, [
            'firstname' => 'required|max_length[50]|min_length[2]',
            'lastname' => 'required|max_length[50]|min_length[2]',
            'email' => 'required|valid_email|is_unique[staff.email]', 
            'username' => 'required|min_length[5]', 
            'password' => 'required|min_length[8]', 
            'role' => 'required'
        ])) //Failed validation redisplays form
        {
            return view('staff_signup');
        }

        $model = model(StaffModel::class);
        $model->save([
            'role' => $post['role'],
            'first_name' => $post['firstname'],
            'last_name' => $post['lastname'],
            // 'profile_picture' => $post['lastname'],
            'username' => $post['username'],
            'email' => $post['email'],
            'password' => password_hash($post['password'], PASSWORD_BCRYPT),
        ]);

        $session_data = [
            'role' => $post['role'],
            'first_name' => $post['firstname'],
            'last_name' => $post['lastname'],
            // 'profile_picture' => $post['lastname'],
            'username' => $post['username'],
            'email' => $post['email'],
            'logged_in' => TRUE,
        ];

        $session->set($session_data);

        return redirect()->to('/user/staff/');
    }

    public function dashboard()
    {
        $session = session();
        
        $data = [];
        if($session->has('username') && $session->has('email'))
        {
            // User data 
            $username = $session->get('username');
            $email = $session->get('email');
            $fname = $session->get('first_name');
            $lname = $session->get('last_name');
            $role = $session->get('role');
            $data = [
                'role' => $role,
                'first_name' => $fname,
                'last_name' => $lname,
                // 'profile_picture' => $post['lastname'],
                'username' => $username,
                'email' => $email,
            ];

            // Dashboard content 
            $merge_data = [];
            $model = model(ApplicationModel::class);
            $db = \Config\Database::connect();
            $num_applications = $db->table('application')->countAll();
            $num_approved = $db->table('application')->where('status', 'Approved')->countAllResults();
            $num_processing = $db->table('application')->where('status', 'Processing')->countAllResults();
            $merge_data['num_applications'] = $num_applications;
            $merge_data['num_approved'] = $num_approved;
            $merge_data['num_processing'] = $num_processing;
            $data = array_merge($data, $merge_data);

            //Get current applications
            $model = model(ApplicantModel::class);
            $applications = [];
            $applications['applications'] = $db->table('applicant')->select('*')
                ->join('application', 'applicant.application_id = application.id')->get();
            
            $data = array_merge($data, $applications);
            
            return view('admin_dash', $data);
        }
        else return redirect()->to('/login/manager/');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login/manager');
    }


    public function staffLoginAuthenticate()
    {
        if(!$this->request->is('post'))
        {
            return redirect()->to('/login/manager/');
        }
        $session = session();
        helper('form');
        $post = $this->request->getPost();
        $uname = $post['username'];
        $passwd = $post['password'];

        $model = model(StaffModel::class);
        $where = "username = '$uname' OR email = '$uname'";
        $user = $model->where($where)->find();
        if(isset($user[0]))
        {
            $user = $user[0];

            if(password_verify($passwd, $user['password']))
            {
                $session_data = [
                    'role' => $user['role'],
                    'first_name' => $user['first_name'],
                    'last_name' => $user['last_name'],
                    // 'profile_picture' => $user['lastname'],
                    'username' => $user['username'],
                    'email' => $user['email'],
                    'logged_in' => TRUE,
                ];
    
                $session->set($session_data);
    
                return redirect()->to('/user/staff/');
            }
        }
        else
        {
            $_SESSION['login_error'] = 'Invalid username or password';
            $session->markAsFlashData('login_error');

            return redirect()->back();
        }
    }
}
