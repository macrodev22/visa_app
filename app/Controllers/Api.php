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
        $responseText = "<div class='title'><span class='text'>Users</span></div>";
        $responseText .= "<table style='color:var(--text-color);' ><tr><th>Role</th><th>Name</th><th></th></tr>";
        foreach($resultSet as $user)
        {
            $responseText .= "<tr><td>" . $user['role']. "</td><td>" . $user['first_name'] . "</td><td><a href='#'>Modify</a></td></tr>";
        }

        $responseText .= "</table>";
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
        <table style='color:var(--text-color);'>
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
        <table style='color:var(--text-color);'>
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

}
