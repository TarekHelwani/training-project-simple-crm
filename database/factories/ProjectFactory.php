<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = collect(User::all()->modelKeys());
        $clients = collect(Client::all()->modelKeys());

        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'deadline' => $this->faker->dateTimeBetween('+1 month', '+6 month'),
            'status' => Arr::random(Project::STATUS),
            'user_id' => $users->random(),
            'client_id' => $clients->random(),
        ];
    }
}
