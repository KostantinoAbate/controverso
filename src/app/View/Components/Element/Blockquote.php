<?php

namespace App\View\Components\Element;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Blockquote extends Component
{
    public ?string $author;
    /**
     * Create a new component instance.
     */
    public function __construct($author = null)
    {
        $this->author = $author;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.element.blockquote');
    }
}
