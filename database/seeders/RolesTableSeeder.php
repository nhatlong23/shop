<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Roles;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Roles::truncate();
        Roles::create([
            'name' => 'Admin',
        ]);
        Roles::create([
            'name' => 'User',
        ]);
        Roles::create([
            'name' => 'Author',
        ]);
    }
}
