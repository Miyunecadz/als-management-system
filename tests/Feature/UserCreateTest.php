<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserCreateTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function userCreatePageIsAccessable()
    {
        $user = User::factory()->create();

        $response  = $this->actingAs($user)->get(route('users.create'));

        $response->assertViewIs('pages.users.create');
    }

    /**
     * @test
     */
    public function storeUserWithCompleteInformation()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('users.store'),[
            'firstname' => 'jv',
            'lastname' => 'cadz',
            'username' => 'jvcadz',
            'password' => '1234',
            'role' => User::$ADMIN
        ]);

        $response->assertRedirect(route('users.index'));
        $response->assertSessionHasAll(['success' => true, 'message']);
        $this->assertDatabaseCount('users', 2);
    }

    /**
     * @test
     */
    public function firstnameShouldBeRequired()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('users.store'),[
            'lastname' => 'cadz',
            'username' => 'jvcadz',
            'password' => '1234',
            'role' => User::$ADMIN
        ]);

        $response->assertSessionHasErrors(['firstname']);
    }

    /**
     * @test
     */
    public function lastnameShouldBeRequired()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('users.store'),[
            'firstname' => 'jv',
            'username' => 'jvcadz',
            'password' => '1234',
            'role' => User::$ADMIN
        ]);
        $response->assertSessionHasErrors(['lastname']);
    }

    /**
     * @test
     */
    public function usernameShouldBeRequired()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('users.store'),[
            'firstname' => 'jv',
            'lastname' => 'cadz',
            'password' => '1234',
            'role' => User::$ADMIN
        ]);

        $response->assertSessionHasErrors(['username']);
    }

    /**
     * @test
     */
    public function usernameShouldBeUnique()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('users.store'),[
            'firstname' => 'jv',
            'lastname' => 'cadz',
            'username' => 'admin',
            'password' => '1234',
            'role' => User::$ADMIN
        ]);

        $response->assertSessionHasErrors(['username']);
    }


    public function passwordShouldBeRequired()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post(route('users.store'),[
            'firstname' => 'jv',
            'lastname' => 'cadz',
            'username' => 'admin',
            'role' => User::$ADMIN
        ]);
        $response->assertSessionHasErrors(['password']);
    }

    /**
     * @test
     */
    public function roleShouldBeRequired()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post(route('users.store'),[
            'firstname' => 'jv',
            'lastname' => 'cadz',
            'username' => 'admin',
            'password' => '1234',
        ]);

        $response->assertSessionHasErrors(['role']);
    }

    /**
     * @test
     */
    public function roleShouldBeValid()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post(route('users.store'),[
            'firstname' => 'jv',
            'lastname' => 'cadz',
            'username' => 'admin',
            'password' => '1234',
            'role' => 'sample'
        ]);

        $response->assertSessionHasErrors(['role']);
    }
}
