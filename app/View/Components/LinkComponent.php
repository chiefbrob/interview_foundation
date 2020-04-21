<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LinkComponent extends Component
{
    public $variant;
    public $text;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($variant = 'success', $text = 'Button')
    {
        $this->variant = $variant;
        $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.link-component');
    }
}
