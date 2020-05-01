<?php

namespace Tests\Feature\GitHub;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Session;
use App\User;

class DeleteTokenTest extends TestCase
{
    use RefreshDatabase; 

    public function testDeleteGithubToken()
    {
        Session::start();
        $user = factory('App\User')->create([
            'github_token' => 'Example-github-token'
        ]);
        $response = $this->actingAs($user)->post('/delete-github-token', [
            '_token' => csrf_token()
        ]);

        $response
            ->assertStatus(202)
            ->assertJson([
                'message' => 'ok',
            ]);
    }
}
