<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserLoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function attemptLoginUser()
    {
        $user = User::factory()->create();

        $response = $this->post(route('login'),[
            'username' => 'admin',
            'password' => '1234'
        ]);

        $response->assertRedirect(route('dashboard'));
    }
}
