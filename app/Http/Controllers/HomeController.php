<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{ Build, User };

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {
        $builds = Build::limit('10')->orderBy('created_at', 'desc')->get();
        $users_count = User::count();
        $builds_count = Build::count();        
        return view('dashboard', ['builds' => $builds, 'users_count' => $users_count, 'builds_count' => $builds_count]);
    }

    public function about()
    {
        return "TODO";
    }
}