<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Requirements extends Seeder
{
    public function run()
    {
        //
        $requirements = [
            [
                'id' => null,
                'name' => 'Yellow Fever Vaccination',
                'mandatory' => True
            ],
            [
                'id' => null,
                'name' => 'Tour Itinerary',
                'mandatory' => False
            ],
            [
                'id' => null,
                'name' => 'Travel Reservation',
                'mandatory' => False
            ],
            [
                'id' => null,
                'name' => 'Invitation Letter',
                'mandatory' => False
            ],
            [
                'id' => null,
                'name' => 'Hotel Accomodation',
                'mandatory' => False
            ],
            [
                'id' => null,
                'name' => 'Academic Admission Letter',
                'mandatory' => False
            ],
            [
                'id' => null,
                'name' => 'Medical Documents',
                'mandatory' => False
            ],
        ];

        $destination = $this->db->table('requirement');
        foreach ($requirements as $requirement) {
            $destination->insert($requirement);
        }
    }
}
