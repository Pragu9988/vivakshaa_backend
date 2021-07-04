<?php

namespace Database\Seeders;

use App\Program;
use Illuminate\Database\Seeder;

class ProgramsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Program::factory()->times(5)->create();
    }
}
