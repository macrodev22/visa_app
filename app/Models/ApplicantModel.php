<?php

namespace App\Models;

use CodeIgniter\Model;

class ApplicantModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'applicant';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = ['first_name', 'middle_name', 'surname', 'date_of_birth', 'nationality', 'gender', 'marital_status', 'passport_number', 'passport_expiry', 'father_name', 'mother_name', 'place_of_birth', 'email', 'password', 'passport_path', 'photo_path', 'application_id'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules = [];
    // protected $validationRules      = [
    //     'first_name' => 'required|alpha_numeric_space|min_length[3]',
    //     'middle_name' => 'min_length[3]',
    //     'surname' => 'required|alpha_numeric_space|min_length[3]', 
    //     'date_of_birth' => 'required', 
    //     'nationality' => 'required', 
    //     'gender' => 'required', 
    //     'marital_status' => 'required|max_length[20]', 
    //     'passport_number' => 'required|min_length[5]', 
    //     'passport_expiry' => 'required', 
    //     'father_name' => 'required|min_length[5]', 
    //     'mother_name' => 'required|min_length[5]',  
    //     'place_of_birth' => 'min_length[3]', 
    //     'email' => 'required|valid_email|is_unique[applicant.email]', 
    //     'password' => 'required', 
    //     // 'passport_path' => 'required', 
    //     // 'photo_path' => 'required'
    // ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
    
    //New code
    public function initialize()
    {
    
    }
}
