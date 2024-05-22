<?php

namespace App\View\Components\Website;

use App\Models\Cooperation;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Partners extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $cooperations = Cooperation::query()
            ->latest()
            ->get();
        return view('components.website.partners', [
            'cooperations' => $cooperations,
        ]);
    }
}
