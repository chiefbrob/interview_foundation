<?php

namespace Tests\Feature\GitHubAPI;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Session;

class GetStarredRepositoriesTest extends TestCase
{
    use DatabaseTransactions;

    public function testGetStarredRepos()
    {
        Session::start();
        $user = factory('App\User')->create([
            'github_token' => encrypt(env('GITHUB_TOKEN')),
        ]);

        $response = $this->actingAs($user)->get('/repositories/starred', [
            '_token' => csrf_token()
        ]);

        $response->assertStatus(200);
        $response->assertSeeText('ok');
    }
}
