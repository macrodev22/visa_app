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