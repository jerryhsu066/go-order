<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use App\User;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testStoreUser()
    {
        $this->json('POST', 'api/v1/user', [
            'name'     => 'Akira',
            'email'    => 'test@gmail.com',
            'password' => '123qwe',
        ])->assertStatus(204);

        $this->assertDatabaseHas('users', [
            'name' => 'Akira',
            'email' => 'test@gmail.com',
        ]);

        $this->assertTrue(Hash::check('123qwe', User::query()->where('name', 'Akira')->first()->password));
    }

    public function testUpdateUser()
    {
        /** @var User $user */
        $user = factory(User::class)->create();

        $this->json('PUT', "api/v1/user/{$user->id}", [
            'email' => 'test2@gmail.com'
        ])->assertStatus(204);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'email' => 'test2@gmail.com'
        ]);
    }
}
