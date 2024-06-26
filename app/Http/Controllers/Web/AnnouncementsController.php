<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\View\View;

class AnnouncementsController extends Controller
{
    public function index(): View
    {
        return view('web.announcements.index', [
            'announcements' => Announcement::query()
                ->published()
                ->latest('published_at')
                ->latest('updated_at')
                ->paginate(6),
        ]);
    }

    public function show(Announcement $announcement): View
    {
        return view('web.announcements.show', [
            'announcement' => $announcement,
        ]);
    }
}
