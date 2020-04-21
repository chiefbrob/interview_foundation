<?php

namespace App\Http\Controllers\GitHubAPI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GrahamCampbell\GitHub\GitHubFactory;
use Auth;
use Log;

class GetStarredRepositories extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request)
    {
        $github_token = Auth::user()->decryptedGitHubToken();

        if ($github_token) {
            $client = app(GitHubFactory::class)->make([
                'method'     => 'token',
                'token'      => $github_token,
                'cache'     => true,
                'backoff'   => true
            ]);
            try {
                return $client->api('current_user')->starring()->all();
            } catch (Exception $e) {
                Log::error($e);
            }
        }

        return response()->json([
            'message' => 'error'
        ]);
    }
}
