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

    /**
     * @test
     */
    public function userLoginUsernameShouldBeRequired()
    {
        $user = User::factory()->create();

        $response = $this->post(route('login'),[
            'password' => '1234'
        ]);

        $response->assertRedirect(route('login-page'));
        $response->assertSessionHasErrors(['username']);
    }

    /**
     * @test
     */
    public function userLoginPasswordShouldBeRequired()
    {
        $user = User::factory()->create();

        $response = $this->post(route('login'),[
            'username' => 'admin'
        ]);

        $response->assertRedirect(route('login-page'));
        $response->assertSessionHasErrors(['password']);
    }

    /**
     * @test
     */
    public function userLoginReturnErrorIfCredentialsAreInvalid()
    {
        $user = User::factory()->create();

        $response = $this->post(route('login'),[
            'username' => 'sample',
            'password' => '1234567890'
        ]);

        $response->assertRedirect(route('login-page'));
        $response->assertSessionHasErrors(['success' => false, 'message']);
    }
}
