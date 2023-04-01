<?php

namespace App\View\Components\Widgets;

use Illuminate\View\Component;

class Badge extends Component
{
    public string $class;

    public function __construct(string $variant, bool $light = true, bool $outline = false)
    {
        $class = [];
        $class[] = 'badge';

        if ($outline) {
            $class[] = 'badge-outline';
        }

        // Color
        $color = $light ? 'badge-' : 'badge-light-';
        $color .= $variant;
        $class[] = $color;

        $this->class = implode(' ', $class);
    }

    public function render()
    {
        return view('components.widgets.badge');
    }
}
