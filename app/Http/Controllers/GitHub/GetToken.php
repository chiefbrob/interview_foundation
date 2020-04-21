<?php

namespace App\Http\Controllers\GitHub;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;

class GetToken extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request)
    {
        $user = Auth::user();
        $tk = $user->decryptedGitHubToken();
        if ($tk) {
            return response()->json([
                'message' => 'ok',
                'github_token' => $tk
            ]);
        } else {
            return response([ 'message' => 'error' ],204);
        }
    }
}
