<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
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
            'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        Roles::create([
            'name' => 'User',
            'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        Roles::create([
            'name' => 'Author',
            'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
    }
}
