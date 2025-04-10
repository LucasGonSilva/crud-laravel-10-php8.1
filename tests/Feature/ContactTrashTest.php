<?php

namespace Tests\Feature;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactTrashTest extends TestCase
{
    use RefreshDatabase;

    public function test_trashed_contacts_can_be_listed()
    {
        $user = User::factory()->create();

        $contact = Contact::factory()->create();
        $contact->delete();

        $response = $this->actingAs($user)->get(route('contacts.trashed'));
        $response->assertStatus(200);
        $response->assertSee($contact->name);
    }

    public function test_soft_deleted_contact_can_be_restored()
    {
        $user = User::factory()->create();
        $contact = Contact::factory()->create();

        $contact->delete();

        $this->actingAs($user)
            ->put(route('contacts.restore', $contact->id))
            ->assertRedirect(route('contacts.index'));

        $this->assertDatabaseHas('contacts', [
            'id' => $contact->id,
            'deleted_at' => null,
        ]);
    }
}
