<?php

namespace Database\Seeders;

use App\Semester;
use Illuminate\Database\Seeder;

class SemestersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $semesters = [
            [
                'name' => 'Semester I'
            ],
            [
                'name' => 'Semester II'
            ],
            [
                'name' => 'Semester III'
            ],
            [
                'name' => 'Semester IV'
            ],
            [
                'name' => 'Semester V'
            ],
            [
                'name' => 'Semester VI'
            ],
            [
                'name' => 'Semester VII'
            ],
            [
                'name' => 'Semester VIII'
            ],
        ];
        foreach ($semesters as $semester) {
            Semester::create($semester);
        }
    }
}
