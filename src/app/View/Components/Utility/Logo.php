<?php

namespace App\View\Components\Utility;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Logo extends Component
{
    public ?string $href;
    public ?int $style;
    /**
     * Create a new component instance.
     */
    public function __construct($href, $style)
    {
        $this->href = $href ?? route('landing.home');
        $this->style = $style ?? 1;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.utility.logo');
    }
}
