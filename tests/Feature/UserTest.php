<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_check_if_user_id_pass_as_querystring()
    {
        $user = User::factory()->create();

        $response = $this->get("/?id={$user->id}");
        
        $response->assertViewHas('user', $user);
    }

    public function test_it_check_if_user_id_pass_as_routeparams()
    {
        $user = User::factory()->create();

        $response = $this->get("/users/{$user->id}");
        
        $response->assertViewHas('user', $user);
    }
}
