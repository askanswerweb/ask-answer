<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Svg extends Component
{
    public string $target;
    public string $icon;
    public int $width;
    public int $height;
    public string $fill;
    public string $classes;

    public function __construct($icon, $pointer = true, $absolute = false, $width = 24, $height = 24, $fill = 'fff', string $target = '', bool $icon2 = true, bool $reverse = false)
    {
        $this->icon = $icon;
        $this->target = $target;

        $classes = ['svg-icon'];

        if ($icon2) {
            $classes[] = 'svg-icon-2';
        }

        if ($pointer) {
            $classes[] = 'cursor-pointer';
        }

        if ($absolute) {
            $classes[] = 'svg-icon-gray-500';
            $classes[] = 'position-absolute';
            $classes[] = 'top-50';
            $classes[] = 'translate-middle';
            $classes[] = 'ms-6';
        }

        if ($reverse) {
            $classes[] = 'rotate rotate-360';
        }

        $this->fill = $fill;
        if (strlen($this->fill) > 0 && !str_starts_with($this->fill, '#')) {
            $this->fill = "#$this->fill";
        }

        $this->classes = implode(' ', $classes);

        $this->width = $width > 0 ? $width : 24;
        $this->height = $height > 0 ? $height : 24;
    }

    public function render()
    {
        return view('components.svg');
    }
}
