<?php

namespace Tests\Feature\Github;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Session;
use App\User;

class SaveTokenTest extends TestCase
{
    use RefreshDatabase; 

    public function testUserCanSaveGitHubToken()
    {
        Session::start();
        $user = factory('App\User')->create();
        $response = $this->actingAs($user)->post('/save-github-token', [
            'github_token' => 'Example-github-token',
            '_token' => csrf_token()
        ]);

        $response
            ->assertStatus(201)
            ->assertJson([
                'message' => 'ok',
            ]);
    }
}
