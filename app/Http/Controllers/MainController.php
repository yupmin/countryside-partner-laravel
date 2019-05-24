<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use Illuminate\Http\Request;

class MainController extends Controller
{
    const PER_PAGE = 8;

    public function index()
    {
        $mentors = Mentor::inRandomOrder()
            ->limit(static::PER_PAGE)
            ->get();

        return $mentors;
    }
}
