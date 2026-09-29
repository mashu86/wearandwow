<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class LandingPageController extends Controller
{
    public function __invoke(): View
    {
        $data = config('wearandwow');
        return view('landing', $data);
    }
}
