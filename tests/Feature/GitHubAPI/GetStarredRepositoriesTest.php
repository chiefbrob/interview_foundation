<?php

namespace Tests\Feature\GitHubAPI;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Session;

use Tests\Feature\MocksGitHubAPI;
use App\User;

class GetStarredRepositoriesTest extends TestCase
{
    use RefreshDatabase, MocksGitHubAPI;

    public function testGetStarredRepos()
    {
        $this->addMockHttpResponse(json_encode([]));
        $this->actingAs(factory(User::class)->create(['github_token' => 'some-token']))
            ->getJson('/repositories/starred')
            ->assertStatus(200)
            ->assertOk();
    }
}
