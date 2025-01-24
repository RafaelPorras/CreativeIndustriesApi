<?php

namespace Database\Seeders;

use App\Models\CreativeIndustry;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CreativeIndustry::factory()->count(50)->create();
    }
}
