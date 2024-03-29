<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Roles;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\FileIterator\Factory;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::truncate();
        DB::table('admin_roles')->truncate();

        $adminRoles = Roles::where('name', 'admin')->first();
        $userRoles = Roles::where('name', 'user')->first();
        $authorRoles = Roles::where('name', 'author')->first();

        $admin = Admin::create([
            'admin_email' => 'longadmin@gmail.com',
            'admin_password' => md5('123456'),
            'admin_name' => 'longAdmin',
            'admin_phone' => '12345789',
            'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        $author = Admin::create([
            'admin_email' => 'longauthor@gmail.com',
            'admin_password' => md5('123456'),
            'admin_name' => 'longAuthor',
            'admin_phone' => '123457891',
            'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        $user = Admin::create([
            'admin_email' => 'longuser@gmail.com',
            'admin_password' => md5('123456'),
            'admin_name' => 'longUser',
            'admin_phone' => '123415789',
            'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
        ]);

        $admin->roles()->attach($adminRoles);
        $author->roles()->attach($authorRoles);
        $user->roles()->attach($userRoles);

        Admin::factory()->count(50)->create();

    }
}
