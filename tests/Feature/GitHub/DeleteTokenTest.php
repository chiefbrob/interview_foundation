<?php

namespace Tests\Feature\GitHub;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Session;
use App\User;

class DeleteTokenTest extends TestCase
{
    use DatabaseTransactions; 

    public function testDeleteGithubToken()
    {
        Session::start();
        $user = factory('App\User')->create();
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
