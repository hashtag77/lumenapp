<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    public function createUser()
    {
      return factory('App\User')->create();
    }

    public function testUserCreation()
    {
      $response = $this->post('/testing/register', [
          'name'                  => 'Sally',
          'email'                 => 'testaccount4@mail.com',
          'password'              => 'secret',
          'password_confirmation' => 'secret'
      ]);
      
      $response->seeJsonEquals([
          "message" => "Created!"
      ]);
    }

    public function testUserLogin()
    {
      $this->post('/testing/login', [
            'email'                 => 'user@test.com',
            'password'              => 'secret'
        ])
        ->seeJsonStructure([
            'token',
            'token_type',
            'expires_in'
        ]);
    }

    public function testUserProfile()
    {
      $user = $this->createUser();

      $this->actingAs($user)
            ->get('/testing/profile')
            ->seeJsonEquals([
                "message" => "Works!"
            ]);
    }

    public function testUserData()
    {
      $user = $this->createUser();
      
      $this->actingAs($user)
            ->get('/testing/users/' . $user->id)
            ->seeJsonEquals([
                "message" => "User!"
            ]);
    }

    public function testUserAll()
    {
      $user = $this->createUser();
      
      $this->actingAs($user)
            ->get('/testing/users')
            ->seeJsonEquals([
                "message" => "Fetched!"
            ]);
    }
}