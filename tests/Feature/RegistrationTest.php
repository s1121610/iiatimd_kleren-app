<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function register_new_user()
    {
        $response = $this->post('/api/registration', [
            'name' => 'Constantin Druc',
            'email' => 'druc@pinsmile.com',
            'password' => 'Password!1234',
            'password_confirmation' => 'Password!1234',
            'device_name' => 'iphone2'
        ]);

        $response->assertSuccessful();
        $this->assertNotEmpty($response->getContent());
        $this->assertDatabaseHas('users', ['email' => 'druc@pinsmile.com']);
        $this->assertDatabaseHas('personal_access_tokens', ['name' => 'iphone2']);
    }
}