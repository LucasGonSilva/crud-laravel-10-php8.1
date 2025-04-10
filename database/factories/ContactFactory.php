<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    protected $model = Contact::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'contact' => $this->faker->unique()->numerify('#########'), // 9 dígitos
            'email' => $this->faker->unique()->safeEmail(),
        ];
    }
}
