<?php

namespace App\View\Components\Element;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Image extends Component
{
    public ?string $src;
    public ?string $alt;
    public ?string $credits;
    /**
     * Create a new component instance.
     */
    public function __construct($src, $alt = null, $credits = null)
    {
        $this->src = $src ?? asset('images/placeholder.png');
        $this->alt = $alt;
        $this->credits = $credits;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.element.image');
    }
}
