<?php

namespace App\View\Components\Utility;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Toast extends Component
{
    public string $type;
    /**
     * Create a new component instance.
     */
    public function __construct($type)
    {
        $this->type = $type ?? 'info';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.utility.toast');
    }
}
