<?php

namespace Database\Seeders;

use App\Models\Product\ProductCategory;
use App\Models\User;
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
        User::factory()->count(100)->create();
        ProductCategory::factory()->count(20)->create();
        // $this->call('UsersTableSeeder');
    }
}
