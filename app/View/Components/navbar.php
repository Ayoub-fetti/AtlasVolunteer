<?php

namespace App\View\Components;

use Illuminate\View\Component;

class navbar extends Component
{
    public $color;

    public function __construct($color = 'blue')
    {
        $this->color = $color;
    }

    public function render()
    {
        return view('components.navbar');
    }
}