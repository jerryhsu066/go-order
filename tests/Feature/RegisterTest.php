<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use refreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRegisterSuccessful()
    {
        $this->json('POST', 'api/v1/register', [
            'name'     => 'Akira',
            'email'    => 'test@gmail.com',
            'password' => '123qwe',
            'password_confirmation' => '123qwe',
        ])->assertStatus(204);
    }
}
