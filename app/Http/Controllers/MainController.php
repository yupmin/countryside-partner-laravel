<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use Illuminate\Http\Request;

class MainController extends Controller
{

    private $mentor = null;

    public function __construct(Mentor $mentor)
    {
        $this->mentor = $mentor;
    }

    protected function index()
    {
        $mentors = $this->mentor::inRandomOrder()->limit(8)->get();
        return response()->success($mentors);
    }
}
