<?php

use App\Models\VisaModel;


    function getVisaTypes() : array
    {
        $model = model(VisaModel::class);
        $visas = $model->findAll();
        return $visas;
    }

    function getVisaTypeName($id)
    {
        $model = model(VisaModel::class);
        $visa = $model->find($id);
        return $visa['type'];
    }

    function getRequirementsById($reqArr)
    {
        if(! isset($reqArr) or $reqArr == null) return null;
        else {
            $model = model(RequirementModel::class);
            $names = "";
            $reqArr = json_decode($reqArr);
            foreach($reqArr as $req)
            {
                $reqRow = $model->find($req);
                $names .= $reqRow['name'] . ", ";
            }
    
            return $names;
        }
    }

    function getProfilePicture($username) :string 
    {
        $db = \Config\Database::connect();
        $profile = $db->table('staff')->where('username', $username)->get();
        $row = $profile->getResult();
        // print_r($row[0]->profile_picture);
        $path = $row[0]->profile_picture;
        if(isset($path)) $path = ltrim($path, './'); 
        return base_url() .'/'. $path ?? '/assets/images/user-profile.webp';
    }

    function isManagerAdmin() :bool 
    {
        $session = session();
        if(isset($session->role)) {
            if($session->role == 'Admin' || $session->role == 'Manager') return true;
        }
        else return false;
    }