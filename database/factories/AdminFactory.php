<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Admin;
use App\Models\Roles;
use Illuminate\Database\Seeder;

class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Admin::class;
    public function definition()
    {
        return [
            'admin_name' => $this->faker->name(),
            'admin_email' => $this->faker->unique()->safeEmail(),
            'admin_password' => 'dcddb75469b4b4875094e14561e573d8',
            'admin_phone' => $this->faker->phoneNumber(),
        ];
    }
    public function configure()
    {
        return $this->afterMaking(function (Admin $admin) {
            //
        })->afterCreating(function (Admin $admin) {
            $role = Roles::where('name', 'user')->get();
            $admin->roles()->sync($role->pluck('id_roles')->toArray());
        });
    }
}
