<?php

namespace App\Http\Controllers\GitHub;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class DeleteToken extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request)
    {
        $user = Auth::user();
        $user->deleteGitHubToken()
        return response([ 'message' => 'ok' ], 202);
    }
}
