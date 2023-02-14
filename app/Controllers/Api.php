<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Api extends BaseController
{
    public function index()
    {
        //
    }
    public function getUsers()
    {
        $model = model(StaffModel::class);
        $resultSet = $model->findAll();
        $csrf = csrf_field();
        $responseText = <<<EOT
        <div class='title'>
        <span class='text'>Users</span>
        </div>
        <div>
        <button style="padding: 0.5rem 1rem;" onclick="addUserRow('#user-table')" >Add user</button>
        </div>
        <form method="POST" id="admin-user-form" />
        {$csrf}
        <table class='tabular-data' id='user-table' data-addinguser=true>
        <tr>
        <th>Role</th>
        <th>Fullname</th>
        <th>Username</th>
        <th>Email</th>
        <th></th>
        <th></th>
        </tr>
        EOT;
        
        foreach($resultSet as $user)
        {
            $responseText .= <<<EOT
            <tr>
            <td> <input type=text disabled name=role value='{$user['role']}'> </td>
            <td><div class="fullname-txt" style="display:flex"><input type=text disabled name=first_name value='{$user['first_name']}'> <input name=last_name disabled value='{$user['last_name']}'></div> </td>
            <td> <input name=username value='{$user['username']}' disabled> </td>
            <td> <input name=email value='{$user['email']}' disabled > </td>
            <td><button class="modifyBtn" data-uid='{$user['id']}'>Modify</button></td>
            <td><button class="deleteBtn" data-uid='{$user['id']}'>Delete</button></td>
            </tr>
            EOT; 
        }

        $responseText .= "</table></form>";

        // return $this->response->setJSON($resultSet);
        return $responseText;
    }

    public function getVisaTypes() {
        $model = model(VisaModel::class);
        $visas = $model->findAll();

        $responseText = <<<EOT
        <div class="title">
        <span class="text">Visa Types</span>
        </div>
        <table class="tabular-data">
        <tr>
        <th>ID</th>
        <th>Visa Name</th>
        <th>Type</th>
        <th>Fees</th>
        <th>Requirements</th>
        </tr>
        EOT;

        helper('retrieve_helper');
       
        foreach($visas as $visa) 
        {
            $reqs = getRequirementsById($visa['requirements']);
            $responseText .= <<<EOT
            <tr>
            <td>{$visa['id']}</td>
            <td>{$visa['category']}</td>
            <td>{$visa['type']}</td>
            <td>\${$visa['fees']}</td>
            <td>{$reqs}</td>
            </tr>
            EOT;
        }
        $responseText .= "</table>";
        return $responseText;
    }

    public function getRequirements()
    {
        $model = model(RequirementModel::class);
        $reqs = $model->findAll();

        $responseText = <<<EOT
        <div class="title">
        <span class="text">Requirements</span>
        </div>
        <table class="tabular-data">
        <tr>
        <th>ID</th>
        <th>Name</th>
        </tr>
        EOT;
        foreach($reqs as $req)
        {
            $responseText .= <<<EOT
            <tr>
            <td>{$req['id']}</td>
            <td>{$req['name']}</td>
            </tr>
            EOT;
        }

        $responseText .= "</table>";

        return $responseText;
    }

    //Add a new user from Admin dashboard
    public function adminAddStaff()
    {
        if($this->request->is('post'))
        {
            //If it's a post request
             $post = $this->request->getPost(['firstname', 'lastname', 'email', 'username', 'password', 'role', 'method']);
            $method = $post['method'];
             //Check validation
             //Add a user
             if($method == 'POST')
             {
                 if($this->validateData($post, [
                     'firstname' => 'required|max_length[50]|min_length[2]',
                     'lastname' => 'required|max_length[50]|min_length[2]',
                     'email' => 'required|valid_email|is_unique[staff.email]', 
                     'username' => 'required|min_length[5]', 
                     'password' => 'required|min_length[8]', 
                     'role' => 'required',
                    //  'profile' => 'is_image[profile]|mime_in[profile,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                 ])) //Passed save new data
                 {
                    $model = model(StaffModel::class);
                    $model->save([
                        'role' => $post['role'],
                        'first_name' => $post['firstname'],
                        'last_name' => $post['lastname'],
                        // 'profile_picture' => $profile_path,
                        'username' => $post['username'],
                        'email' => $post['email'],
                        'password' => password_hash($post['password'], PASSWORD_BCRYPT),
                    ]);
                    $res = [
                        'success' => true,
                        'method' => $method,
                    ];
                    return $this->response->setJSON($res);
                 }
                 else //Validation failed
                 {
                    $errors = $this->validator->getErrors();
                    $res = [
                        'success' => false,
                        'method' => $method,
                        'errors' => $errors,
                    ];
    
                    return $this->response->setJSON($res);
                 }
             }//End of add user

             //Delete user
             else if($method == "DELETE") 
             {
                $post = $this->request->getPost();
                $user_to_delete = $post['user_id'];

                $model = model(StaffModel::class);
                
                if($model->delete($user_to_delete)) 
                {
                    return $this->response->setJSON(['success' => true, 'user_id' => $user_to_delete]);
                }
                else{
                    return $this->response->setJSON(['success' => false, 'user_id' => $user_to_delete]);
                }
             }

             //Modify user
             else if($method == 'PUT')
             {
                $post = $this->request->getPost();
                $user_to_modify = $post['user_id'];

                $model = model(StaffModel::class);
                $data = [
                    'id' => $post['user_id'],
                    'role' => $post['role'],
                    'first_name' => $post['first_name'],
                    'last_name' => $post['last_name'],
                    'username' => $post['username'],
                    'email' => $post['email'],
                ];
                $model->save($data);
                return $this->response->setJSON($post);
             }
        } 
        else //Not an AJAX request
        {
            return $this->response->setJSON(['message' => 'Not an AJAX request']);
        }
    }

    //Approve or reject applications
    public function applications()
    {
        if($this->request->is('get'))
        {
            
            $get = ['id' => $_GET['id'], 'action' => $_GET['action']];
            $action = $get['action'];

            if($action == 'approve')
            {
                $model = model(ApplicationModel::class);
    
                $data = [
                    'id' => $get['id'],
                    'status' => 'Approved',
                ];
                $model->save($data);
                return $this->response->setJSON($get);
            }
            else if ($action == 'reject')
            {
                $model = model(ApplicationModel::class);
    
                $data = [
                    'id' => $get['id'],
                    'status' => 'Rejected',
                ];
                $model->save($data);
                return $this->response->setJSON($get);
            }
        }
    }

}

