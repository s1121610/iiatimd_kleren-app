<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class LoginTest extends TestCase
{
    
    use RefreshDatabase;

    /** @test */
    public function login_existing_user()
    {
        $user = User::create([
            'name' => 'Sam',
            'email' => 'sam@mail.nl',
            'password' => bcrypt('psw123')
        ]);

        $response = $this->post('api/sanctum/token', [
            'email' => $user->email,
            'password' => 'psw123',
            'device_name' => 'samsung_A71-test'
        ]);

        $response->assertSuccessful();
        $this->assertNotEmpty($response->getContent());
        $this->assertDatabaseHas('personal_access_tokens', [
            'name' => 'iphone',
            'tokenable_type' => User::class,
            'tokenable_id' => $user->id
        ]);
    }
}
