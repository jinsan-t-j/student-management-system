<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Factories\MarkFactory;
use App\Models\Mark;

class MarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mark::factory(10)->create();
    }
}
