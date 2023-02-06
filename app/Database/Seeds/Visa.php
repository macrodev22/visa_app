<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Visa extends Seeder
{
    public function run()
    {
        //
        $factories = [
            [
                'id' => null,
                'category' => 'Diplomatic / Official',
                'fees' => 0,
                'multiple_entry' => false,
                'type' => 'Visa',
                'requirements' => null
            ],
            [
                'id' => null,
                'category' => 'Ordinary, Transit',
                'fees' => 50,
                'multiple_entry' => false,
                'type' => 'Visa',
                'requirements' => '[3]'
            ],
            [
                'id' => null,
                'category' => 'East African Tourist',
                'fees' => 150,
                'multiple_entry' => false,
                'type' => 'Visa',
                'requirements' => '[2,3]'
            ],
            [
                'id' => null,
                'category' => 'East African Tourist',
                'fees' => 200,
                'multiple_entry' => true,
                'type' => 'Visa',
                'requirements' => '[2,3]'
            ],
            [
                'id' => null,
                'category' => 'Students Pass',
                'fees' => 100,
                'multiple_entry' => false,
                'type' => 'Pass',
                'requirements' => '[6]'
            ],
            [
                'id' => null,
                'category' => 'Intern or research pass',
                'fees' => 700,
                'multiple_entry' => false,
                'type' => 'Pass',
                'requirements' => '[6]'
            ],
            [
                'id' => null,
                'category' => 'Dependant Pass - Spouse',
                'fees' => 350,
                'multiple_entry' => false,
                'type' => 'Pass',
                'requirements' => null
            ],
            [
                'id' => null,
                'category' => 'Dependant Pass - Child',
                'fees' => 200,
                'multiple_entry' => false,
                'type' => 'Pass',
                'requirements' => null
            ],
            [
                'id' => null,
                'category' => 'Dependant Pass - Other relatives',
                'fees' => 1000,
                'multiple_entry' => false,
                'type' => 'Pass',
                'requirements' => null
            ],
            [
                'id' => null,
                'category' => 'Dependant on a Diplomat and Official',
                'fees' => 0,
                'multiple_entry' => false,
                'type' => 'Pass',
                'requirements' => null
            ],
            [
                'id' => null,
                'category' => 'Sponsored, Individual Special Pass',
                'fees' => 400,
                'multiple_entry' => false,
                'type' => 'Pass',
                'requirements' => null
            ],
            [
                'id' => null,
                'category' => 'Diplomat & Official',
                'fees' => 0,
                'multiple_entry' => false,
                'type' => 'Pass',
                'requirements' => null
            ],
        ];

        $builder = $this->db->table('visa');

        foreach($factories as $factory)
        {
            $builder->insert($factory);
        }
    }
}
