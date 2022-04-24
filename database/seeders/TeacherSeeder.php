<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Factories\TeacherFactory;
use App\Models\Teacher;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Teacher::factory(10)->create();
    }
}
