<?php

namespace Tests\Feature;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactValidationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Cria e autentica um usuário
        $user = User::factory()->create();
        $this->actingAs($user);
    }

    public function test_name_is_required_and_minimum_length()
    {
        $response = $this->post('/contacts', [
            'name' => 'Abc',
            'contact' => '123456789',
            'email' => 'valid@email.com',
        ]);

        $response->assertSessionHasErrors(['name']);
    }

    public function test_contact_must_be_9_digits_and_unique()
    {
        Contact::create([
            'name' => 'Test User',
            'contact' => '123456789',
            'email' => 'test1@email.com',
        ]);

        $response = $this->post('/contacts', [
            'name' => 'Another User',
            'contact' => '123456789', // Duplicado
            'email' => 'test2@email.com',
        ]);

        $response->assertSessionHasErrors(['contact']);

        $response = $this->post('/contacts', [
            'name' => 'Another User',
            'contact' => '12345', // Formato inválido
            'email' => 'test3@email.com',
        ]);

        $response->assertSessionHasErrors(['contact']);
    }

    public function test_email_must_be_valid_and_unique()
    {
        Contact::create([
            'name' => 'João',
            'contact' => '111111111',
            'email' => 'joao@email.com',
        ]);

        $response = $this->post('/contacts', [
            'name' => 'Maria',
            'contact' => '999999999',
            'email' => 'joao@email.com', // Duplicado
        ]);

        $response->assertSessionHasErrors(['email']);

        $response = $this->post('/contacts', [
            'name' => 'Invalid Email',
            'contact' => '888888888',
            'email' => 'invalid-email', // Formato inválido
        ]);

        $response->assertSessionHasErrors(['email']);
    }

    public function test_all_fields_are_required()
    {
        $response = $this->post('/contacts', []);

        $response->assertSessionHasErrors(['name', 'contact', 'email']);
    }
}
