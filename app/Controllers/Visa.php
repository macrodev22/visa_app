<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Visa extends BaseController
{
    public function index()
    {
        //
        return view('visa_application');
    }

    public function getVisaRequirements() //Get requirements for a visa as JSON Array
    {
        try
        {
            $visaId = $_GET['visaId'] ?? null;
            if(isset($visaId))
            {
                $model = model(VisaModel::class);
                $visa = $model->find($visaId);
                $visaRequirementsJSON = $visa['requirements'];
                $visaRequrements = json_decode($visaRequirementsJSON);
    
                $requirementNames = [];
                $requirementModel = model(RequirementModel::class);
                $requrementsResultSet = $visaRequrements ? $requirementModel->find($visaRequrements) : null;

                $mandatoryReqs = $requirementModel->where('mandatory', 1)->find();
                foreach($mandatoryReqs as $mandReq)
                {
                    array_push($requirementNames, $mandReq['name']);
                }

                if(isset($requrementsResultSet)) 
                {
                    foreach($requrementsResultSet as $req)
                    {
                        array_push($requirementNames, $req['name']);
                    }
                }
                

    
                return $this->response->setJSON($requirementNames);
                // echo json_encode($requirementNames);
            }
        }
        catch(Exception $e)
        {
            show_404();
        }
    }

    public function managerLogin()
    {
        $data = ['staff_role' => 'Manager'];
        return view('staff_login', $data);
    }

    public function adminLogin()
    {
        $data = ['staff_role' => 'Admin'];
        return view('staff_login', $data);
    }

    public function signup()
    {
        return view('staff_signup');
    }
    public function checkApplication()
    {
        return view('check_application');
    }

    public function processApplicantForm()
    {
        $data = $this->request->getPost();
        // print_r($data);
        // $this->response->setJSON($data);
        //Validate the data
        // if(!$this->validateData($data, [
        //     'ppt-number' => 'required|min_length[5]',
        //     'ppt-expiry' => 'required',
        //     'nationality' => 'required',
        //     'date-arrival' => 'required',
        //     'visa-type' => 'required',
        //     'gender' => 'required',
        //     'surname' => 'required|min_length[2]',
        //     'firstname' => 'required|min_length[2]',
        //     'middlename' => 'min_length[2]',
        //     'd-o-b' => 'required',
        //     'marital-status' => 'required',
        //     'place-of-birth' => 'min_length[3]',
        //     'father-name' => 'required|min_length[5]',
        //     'mother-name' => 'required|min_length[5]',
        //     'email' => 'required|is_unique[applicant.email]|valid_email',
        //     'password1' => 'required|min_length[8]',
        //     'password2' => 'matches[password1]|required'
        // ]))
        // {
        //     $errors = $this->validator->getErrors();
        //     $this->response->setStatusCode(405, 'Validation failed');
        //     $this->response->setJSON($errors);
        // }
        // else //Validation passed
        // {
            $model = model(ApplicantModel::class);
            $applicationModel = model(ApplicationModel::class);
            $applicationData = [
                'date_of_arrival' => $data['date-arrival'],
                'visa_type' => $data['visa-type']
            ];
            $applicationModel->insert($applicationData);
            $applicationId = $applicationModel->getInsertID();

            $rules = [
                'ppt-copy' => 'mime_in[ppt-copy,image/jpg,image/jpeg,image/gif,image/png,image/webp,application/pdf]',
                'ppt-photo' => 'is_image[ppt-photo]|mime_in[ppt-photo,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
            ];

            $files = ['ppt' => '', 'photo' => ''];
            $other_files_paths = array();
            if($this->validate($rules))
            {
                $ppt_file = $this->request->getFile('ppt-copy');
                $ppt_pic_file = $this->request->getFile('ppt-photo');
                $ppt_name = $ppt_file->getRandomName();
                $photo_name = $ppt_pic_file->getRandomName();
                $storage_path = './assets/uploads/applicants/';
                $ppt_file->move($storage_path, $ppt_name);
                $ppt_pic_file->move($storage_path, $photo_name);
                $files['ppt'] = ltrim($storage_path, '.').$ppt_name;
                $files['photo'] = ltrim($storage_path, '.').$photo_name;

                //Other files
                $other_files = $this->request->getFiles();
                foreach($other_files as $name => $file)
                {
                    if(!$file->hasMoved())
                    {
                        $rule_txt = "mime_in[$name,image/jpg,image/jpeg,image/gif,image/png,image/webp,application/pdf]";
                        $rule_key = $name;
                        $rule_arr = [
                            $rule_key => $rule_txt,
                        ];
                        if($this->validate($rule_arr))
                        {    
                            $file_name = $file->getRandomName();
                            $storage_path = './assets/files/other-files/';
                            $file->move($storage_path, $file_name);
                            $path = ltrim($storage_path ,'.') . $file_name;
                            // array_push($other_files_paths, [$name => $path]);
                            $other_files_paths[$name] = $path;
                        }
                    }
                }

            }
            else 
            {
                $errors = $this->validator->getError();
                echo json_encode($errors);
            }
            $model->save([
                'first_name' => $data['firstname'],
                'middle_name' => $data['middlename'],
                'surname' => $data['surname'], 
                'date_of_birth' => $data['d-o-b'], 
                'nationality' => $data['nationality'], 
                'gender' => $data['gender'], 
                'marital_status' => $data['marital-status'], 
                'passport_number' => $data['ppt-number'], 
                'passport_expiry' => $data['ppt-expiry'], 
                'father_name' => $data['father-name'], 
                'mother_name' => $data['mother-name'],  
                'place_of_birth' => $data['place-of-birth'], 
                'email' => $data['email'], 
                'password' => password_hash($data['password1'], PASSWORD_BCRYPT), 
                'application_id' => $applicationId,
                'passport_path' => $files['ppt'],
                'photo_path' => $files['photo'],
            ]);

            $attachmentModel = model(AttachmentModel::class);
            // $requirementModel = model(RequirementModel::class);
            $applicantId = $model->getInsertID();
            foreach($other_files_paths as $key => $file_path)
            {
                
                // $name = $file_path['name'];
                $name = $key;
                
                $attachment_data = [
                    'applicant_id' => $applicantId,
                    // 'requirement_id' => null,
                    'name' => $name,
                    'attachment_path' => $file_path,
                ];

                $attachmentModel->save($attachment_data);
            }

            $this->response->setJSON($applicationId);
            $this->response->setStatusCode(400, 'Successfully added applicant');
        }
    }


// }
