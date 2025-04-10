<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        Contact::create([
            'name' => 'Lucas Silva',
            'contact' => '123456789',
            'email' => 'lucassilva@example.com',
        ]);

        Contact::create([
            'name' => 'Administrator',
            'contact' => '987654321',
            'email' => 'admin@example.com',
        ]);
    }
}
