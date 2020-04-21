<?php

namespace Tests\Feature\Github;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Session;
use App\User;

class CheckTokenTest extends TestCase
{
    use DatabaseTransactions; 

    public function testGetDecryptedGitHubTokenIfItsExists()
    {
        Session::start();
        $user = factory('App\User')->create([
            'github_token' => encrypt('example-token')
        ]);

        $response = $this->actingAs($user)->get('/get-github-token');

        $response->assertStatus(200);

        $user2 = factory('App\User')->create();

        $response = $this->actingAs($user2)->get('/get-github-token');
        $response
            ->assertStatus(204)
            ->assertJson([
                'message' => 'error',
            ]);
    }
}
