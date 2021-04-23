<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserCommentTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_forbid_to_create_a_comment_if_invalid_password_sent()
    {
        $user = User::factory()->create();
        $response = $this->json('POST', '/users/comments', [
            'id'       => $user->id,
            'comment'  => 'Comment one',
            'password' => 'abc'
        ]);
        
        $response->assertForbidden();
    }

    public function test_it_forbid_to_create_a_comment_if__no_password_sent()
    {
        $user = User::factory()->create();
        $response = $this->json('POST', '/users/comments', [
            'id' => $user->id,
            'comment' => 'Comment 1'
        ]);
        
        $response->assertForbidden();
    }

    public function test_it_failed_validation_if_invalid_user_id_is_sent()
    {
        $user = User::factory()->create();
        $response = $this->json('POST', '/users/comments', [
            'id'       => 12,
            'password' => 'LChXAtEquJxmjByV',
            'comments' => 'Comment 12'
        ]);

        $response->assertStatus(422);
    }

    public function test_it_storecomments_of_an_user()
    {
        $user = User::factory()->create();
        
        $response = $this->json('POST', '/users/comments', [
            'id' => $user->id,
            'password' => 'LChXAtEquJxmjByV',
            'comments' => 'Comment 2'
        ]);

        $response->assertStatus(200);
    }
}
