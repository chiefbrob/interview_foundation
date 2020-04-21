<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RepoContainer extends Component
{
    public $github_token;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($github_token)
    {
        $this->$github_token = $github_token;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.repo-container');
    }
}
