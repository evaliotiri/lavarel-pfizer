<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class UsersTest extends TestCase
{
    use RefreshDatabase;
    private $users;

    protected $seed = true;
    protected function setUp():void{
        parent::setUp();

        $this->users = User::factory()->times(10)->create();
        dd($this->users);
    }

    /**
     * Tests if the users' list retrieved successfully
     *
     * @test
     */
    public function should_return_a_list_of_users_successfully(){

        $response = $this->json('GET', '/api/users');

        $response->assertStatus(200)->assertJson(['user'=>[]]);
    }


    /**
     * A basic feature test example.
     *
     * @test
     */
    public function should_return_a_single_user(){

        $user= $this->users->random();

        $response = $this->json(GET, "/api/users/2");

        $response->assertStatus(200)->assertJson(['user' => []]);
    }
}
