@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <repo-container github_token="{{ Auth::user()->decryptedGitHubToken() }}" />
        </div>
    </div>
</div>
@endsection
