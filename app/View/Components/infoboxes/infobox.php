<?php

namespace App\View\Components\infoboxes;

use Illuminate\View\Component;

class infobox extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.infoboxes.infobox');
    }
}
