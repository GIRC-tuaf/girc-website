<?php

namespace App\View\Components\Website;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DynamicMenu extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Category $category,
        public bool $isChild = false
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.website.dynamic-menu');
    }
}
