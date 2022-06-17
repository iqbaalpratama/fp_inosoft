<?php

namespace Database\Seeders;

use App\Models\Associate;
use Illuminate\Database\Seeder;

class AssociateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Associate::factory()->count(4)->create();
    }
}
