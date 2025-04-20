<?php

namespace App\View\Components;

use Illuminate\View\Component;

class footer extends Component
{
    public $color;
    public $showSocial;
    public $showLogo;

    /**
     * Create a new component instance.
     *
     * @param string $color
     * @param bool $showSocial
     * @param bool $showLogo
     * @return void
     */
    public function __construct($color = 'indigo', $showSocial = true, $showLogo = true)
    {
        $this->color = $color;
        $this->showSocial = $showSocial;
        $this->showLogo = $showLogo;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.footer');
    }
}