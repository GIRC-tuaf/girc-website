<?php

namespace App\View\Components\Website;

use App\Models\Announcement as AnnouncementModel;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Announcement extends Component
{
    public function render(): View|Closure|string
    {
        return view('components.website.announcement', [
            'announcements' => AnnouncementModel::query()
                ->published()
                ->latest('published_at')
                ->latest('updated_at')
                ->take(4)
                ->get(),
        ]);
    }
}
