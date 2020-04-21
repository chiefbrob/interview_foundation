<?php

namespace App\Http\Controllers\GitHub;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class SaveToken extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request)
    {
        $request->validate([
            'github_token' => 'required|string'
        ]);

        $user = Auth::user();
        
        $user->setGitHubToken($request->github_token);

        return response([ 'message' => 'ok' ], 201);
    }
}
