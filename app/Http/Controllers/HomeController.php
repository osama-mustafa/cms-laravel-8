<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Models\Category;




class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

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
        $posts_count         = Post::all()->count();
        $tags_count          = Tag::all()->count();
        $categories_count    = Category::all()->count();
        $users_count         = User::all()->count();
        $trashed_posts_count = Post::onlyTrashed()->get()->count();


        return view('dashboard')->with([

            'posts_count'         => $posts_count,
            'users_count'         => $users_count,
            'tags_count'          => $tags_count,
            'categories_count'    => $categories_count,
            'trashed_posts_count' => $trashed_posts_count

        ]);
    }
}
