<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Artisan;
use App\Models\User;

class commentCommandTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_create_comments_if_parameter_valid()
    {
        $user = User::factory()->create();

        $response = Artisan::call('comment:create',[
            'id' => $user->id,
            'comment' => $this->faker->sentence(10)
        ]);

        $this->assertEquals(1, $response);
    }

    public function test_it_throws_error_if_invalid_user_id_is_provided()
    {
        $user = User::factory()->create();

        $response = Artisan::call('comment:create', [
            'id' => 21,
            'comment' => $this->faker->sentence(10)
        ]);
        
        $this->assertEquals(0, $response);
    }

    public function test_it_throws_error_if_parameter_not_passed()
    {
        $this->expectException('Symfony\Component\Console\Exception\RuntimeException');
       
        Artisan::call('comment:create');
    }

    public function test_it_throws_error_if_user_id_not_passed()
    {
        $this->expectException('Symfony\Component\Console\Exception\RuntimeException');
        
        Artisan::call('comment:create', [
            'comment' => 'Comment one'
        ]);
    }

    public function test_it_throws_error_if_comment_not_passed()
    {
        $this->expectException('Symfony\Component\Console\Exception\RuntimeException');
        
        $user = User::factory()->create();
        
        Artisan::call('comment:create', [
            'id' => $user->id
        ]);
    }
}
