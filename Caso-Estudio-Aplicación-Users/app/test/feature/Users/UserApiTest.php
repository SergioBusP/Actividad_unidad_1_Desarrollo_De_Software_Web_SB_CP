<?php

namespace Tests\Feature\Users;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserApiTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function puede_registrar_un_usuario()
    {
        $response = $this->postJson('/api/users', [
            'username' => 'sergio123',
            'email' => 'sergio@example.com',
            'password' => 'Password123!'
        ]);

        $response->assertStatus(201)
                 ->assertJsonStructure(['id', 'username', 'email']);
    }
}
