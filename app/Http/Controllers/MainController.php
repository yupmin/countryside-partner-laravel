<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use Illuminate\Http\Request;

class MainController extends Controller
{
    protected function index()
    {
        $mentors = Mentor::inRandomOrder()
            ->limit(8)
            ->get();

        return $mentors;
    }
}
