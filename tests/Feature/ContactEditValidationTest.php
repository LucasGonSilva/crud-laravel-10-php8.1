<?php

namespace Tests\Feature;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactEditValidationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->contact = Contact::factory()->create();
    }

    public function test_name_is_required_on_edit()
    {
        $response = $this->actingAs($this->user)->put(route('contacts.update', $this->contact), [
            'name' => '',
            'contact' => '123456789',
            'email' => 'valid@email.com',
        ]);

        $response->assertSessionHasErrors(['name']);
    }

    public function test_contact_must_be_9_digits_on_edit()
    {
        $response = $this->actingAs($this->user)->put(route('contacts.update', $this->contact), [
            'name' => 'Updated Name',
            'contact' => '123',
            'email' => 'valid@email.com',
        ]);

        $response->assertSessionHasErrors(['contact']);
    }

    public function test_email_must_be_valid_on_edit()
    {
        $response = $this->actingAs($this->user)->put(route('contacts.update', $this->contact), [
            'name' => 'Updated Name',
            'contact' => '123456789',
            'email' => 'not-an-email',
        ]);

        $response->assertSessionHasErrors(['email']);
    }
}
