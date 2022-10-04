<?php

namespace App\Http\Controllers;

use App\Models\Build;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
        $user = User::find(Auth::id());
        $builds = Build::limit('10')
            ->orderBy('created_at', 'desc')
            ->get();
        $users_count = User::count();
        $builds_count = Build::count();
        $my_builds_count = $user->builds->count();

        return view('home', [
            'builds' => $builds,
            'users_count' => $users_count,
            'builds_count' => $builds_count,
            'my_builds_count' => $my_builds_count,
        ]);
    }

    public function about()
    {
        return 'TODO';
    }
}
