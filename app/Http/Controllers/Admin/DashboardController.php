<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
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
        $count_post = \App\Post::count();
        $count_category = \App\Category::count();
        $count_tag = \App\Tag::count();
        $count_admin = \App\User::count();
        return view('admin.dashboard', [
            'title' => 'Dashboard',
            'count_post' => $count_post,
            'count_category' => $count_category,
            'count_tag' => $count_tag,
            'count_admin' => $count_admin,
        ]);
    }
}
