<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Statistics;
class StatisticsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_date' => $this->faker->name(),
            'sales' => $this->faker->unique()->safeEmail(),
            'profit' => 'dcddb75469b4b4875094e14561e573d8',
            'quantity' => $this->faker->phoneNumber(),
            'total_order' => $this->faker->phoneNumber(),
        ];
    }
    // public function configure()
    // {
    //     return $this->afterMaking(function (Admin $admin) {
    //         //
    //     })->afterCreating(function (Admin $admin) {
    //         $role = Roles::where('name', 'user')->get();
    //         $admin->roles()->sync($role->pluck('id_roles')->toArray());
    //     });
    // }
}
