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
                'password' => password_hash($data['email'], PASSWORD_BCRYPT), 
                'application_id' => $applicationId,
            ]);

            $this->response->setJSON($applicationId);
            $this->response->setStatusCode(400, 'Successfully added applicant');
        }
    }


// }
