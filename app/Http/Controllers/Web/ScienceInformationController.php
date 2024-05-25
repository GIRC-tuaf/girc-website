<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ScienceInformation;
use Illuminate\View\View;

class ScienceInformationController extends Controller
{
    public function index(): View
    {
        return view('web.science-information.index', [
            'science-information' => ScienceInformation::query()
                ->where('keep_on_top', 1)
                ->where('published_at', '<=', now())
                ->latest('published_at')
                ->paginate(6),
        ]);
    }

    public function show(ScienceInformation $scienceInformation): View
    {
        return view('web.science-information.show', [
            'scienceInformation' => $scienceInformation,
        ]);
    }
}
