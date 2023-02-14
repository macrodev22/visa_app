<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Pdf;

class ApplicationController extends BaseController
{
    public function index()
    {
        //
    }

    public function test()
    {
        if($this->request->is('post'))
        {
            $post = $this->request->getPost();
            $files = $this->request->getFiles();
            $file = $this->request->getFile('ppt');
            $data = [
                'post' => $post,
                'files' => $files,
                'file' => $file,
            ];

            return view('test', $data);
        }
        return view('test');
    }

    public function show() //Show single application
    {
        helper('retrieve_helper');
        if(! isManagerAdmin()) return redirect()->to('/login/');
        if($this->request->is('get'))
        {
            $applicationId = $_GET['id'];
            $applicationModel = model(ApplicationModel::class);
            $applicantModel = model(ApplicantModel::class);
            $visaModel = model(VisaModel::class);
            $attachmentModel = model(AttachmentModel::class);

            $application = $applicationModel->find($applicationId);
            $applicant = $applicantModel->where('application_id', $applicationId)->find();
            $visaType = $visaModel->find($application['visa_type']);
            $other_attachments = $attachmentModel->where('applicant_id', $applicant[0]['id'])->find();

            $data = [
                'applicant' => $applicant[0],
                'application' => $application,
                'visa_type' => $visaType['category'],
                'profile_picture' => getProfilePicture($_SESSION['username']),
                'first_name' => $_SESSION['first_name'],
                'last_name' => $_SESSION['last_name'],
                'username' => $_SESSION['username'],
                'role' => $_SESSION['role'],
                'other_attachments' => $other_attachments,
            ];

            return view('action_application', $data);
        }
    }

    public function showApplicationStatus()
    {
        $session = session();

        if($this->request->is('post'))
        {
            $post = $this->request->getPost();
            $email = $post['email'];
            $password = $post['password'];
            $dob = $post['d-o-b'];
            $surname = $post['surname'];
            $application_id = $post['app-id'];

            if($email != null && $password != null) 
            {
                //Login username and password
                $model = model(ApplicantModel::class);
                $user = $model->where('email', $email)->find();
                // print_r($user[0]);
                // echo $user[0]['password'];
                if(isset($user) && $user != null)
                {
                    $user = $user[0];
                    // Check password
                    if(password_verify($password, $user['password'])) 
                    {
                        $session_data = [
                            'role' => 'Applicant',
                            'applicant_id' => $user['id'],
                            'application_id' => $user['application_id'],
                            'first_name' => $user['first_name'],
                            'middle_name' => $user['middle_name'],
                            'last_name' => $user['surname'],
                            'profile_picture' => $user['photo_path'],
                            // 'username' => $post['username'],
                            // 'email' => $post['email'],
                            'logged_in' => TRUE,
                        ];
    
                        $session->set($session_data);
                        
                        return redirect()->to('/checkapplication/user/');
                    }
                    else 
                    {
                        echo "Wrong username or password";
                    }
                
                }
            }
            else if($dob != null && $surname != null && $application_id != null) 
            {
                //Login surname
                $model = model(ApplicantModel::class);
        
                $user = $model->where('surname', $surname)->where('date_of_birth', $dob)->where('id', $application_id)->find();
                
                if($user != null)
                {
                    
                    $session_data = [
                        'role' => 'Applicant',
                        'applicant_id' => $user['id'],
                        'application_id' => $user['application_id'],
                        'first_name' => $user['first_name'],
                        'middle_name' => $user['middle_name'],
                        'last_name' => $user['surname'],
                        'profile_picture' => $user['photo_path'],
                        // 'username' => $post['username'],
                        // 'email' => $post['email'],
                        'logged_in' => TRUE,
                    ];

                    $session->set($session_data);
                }
                else
                {
                    echo "User or Application not found";
                }

            }
        
        $session = session();
        
        }
    }

    public function showApplicationStatusLoggedIn() 
    {
        $session = session();
        if($session->has('role') && $session->has('applicant_id'))
        {
            $applicationModel = model(ApplicationModel::class);
            $db = \Config\Database::connect();
            $application_id = $session->get('application_id');
            $application = $applicationModel->find($application_id);
            
            $data = [
                'first_name' => $session->get('first_name'),
                'last_name' => $session->get('last_name'),
                'middle_name' => $session->get('middle_name'),
                'status' => $application['status'],
                'application_id' => $application_id,
            ];
            return view('application_status_page', $data);
        }
        else
        {
            return redirect()->to('/checkapplication/');
        }
    }

    public function generateVisa()
    {
        
        $public_path = realpath(__DIR__ . "/../../public/");
        // $this->load->library('pdf');
        $dompdf = new \App\Libraries\Pdf([
            "chroot" => $public_path,
            "enable_remote" => true,
        ]);
        
        // print_r($dompdf->getOptions()->getChroot());
        // $dompdf->getOptions()->setChroot($public_path);
        // print_r($dompdf->getOptions()->getChroot());

        if(isset($_GET['id']))
        {
            if($_GET['id'] == null) return;
        }
        else
        {
            return;
        }
        $application_id = $_GET['id'];
        $action = $_GET['action'];

        $session = session();
        if($session->has('applicant_id'))
        {
            $applicant_id = $session->get('applicant_id');
        }
        // print_r($dompdf);

        $applicantModel = model(ApplicantModel::class);
        $applicationModel = model(ApplicationModel::class);
        $visaModel = model(VisaModel::class);

        $applicant = $applicantModel->find($applicant_id);
        $application = $applicationModel->find($application_id);
        $visa = $visaModel->find($application['visa_type']);

        $visaInfo = [
            "maxstay" => "30",
            "visatype" => $visa['category'],
            "visaentry" => $visa['multiple_entry'] ? "Multiple Entry" : "Single Entry",
            "visanumber" => $application['id'],
            "dateissue" => date("l d F, Y"),
            "placeissue" => "Kampala",
            "validunitl" => Date('l d F, Y', strtotime('+90 days')),
            "fullname" => $applicant['first_name'] . " " . $applicant['middle_name'] . " ". $applicant['surname'],
            "nationality" => $applicant['nationality'],
            "pob" => $applicant['place_of_birth'],
            "dob" => $applicant['date_of_birth'],
            "pptno" => $applicant['passport_number'],
            "profession" => "Business",
            "category" => "Ordinary",
            "pptphoto" => $public_path . $applicant['photo_path'],
            "public" => $public_path,
            
        ];

        $fields = [
            "{{ duration }}", "{{ visa-type }}", "{{ visa-entry }}", "{{ visa-number }}", "{{ date-of-issue }}", "{{ place-of-issue }}", "{{ last-day-valid }}" ,"{{ full-name }}", "{{ nationality }}", "{{ place-of-birth }}", "{{ dob }}", "{{ ppt-number }}", "{{ profession }}", "{{ category }}", "{{ passport-photo }}", "{{ public }}"  
        ];

        $dompdf->setPaper("A4", "portrait");

        $template_path = __DIR__ . "/../Views/templates/";
        if($application['status'] == 'Approved') $html = file_get_contents($template_path . "visa-template.html");
        else if($application['status'] == 'Rejected') $html = file_get_contents($template_path . "visa-reject-template.html");
        else if($application['status'] == 'Processing') return redirect()->to('/checkapplication/user/');

        $html = str_replace($fields, $visaInfo, $html);
        // $html .= __DIR__ . "/../../public";

        $dompdf->setBasePath(__DIR__ . "/../../public");
        $dompdf->loadHtml($html);

        $dompdf->render();

        $attachment = ($action == 'view') ? 0 : 1;
        $dompdf->stream($visaInfo['fullname'] . "_Visa.pdf", ["Attachment" => $attachment]);

        // echo $html;
        // echo json_encode($visaInfo);
    }

}
