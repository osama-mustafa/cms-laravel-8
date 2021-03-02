<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;


class SiteUIController extends Controller
{

   public function index()
   {
        $tags             = Tag::take(12)->get();
        $categories       = Category::take(4)->get();
        $first_post       = Post::orderBy('created_at', 'DESC')->first();
        $second_post      = Post::orderBy('created_at', 'DESC')->skip(1)->take(1)->get()->first();
        $third_post       = Post::orderBy('created_at', 'DESC')->skip(2)->take(1)->get()->first();
        $first_category   = Category::orderBy('created_at', 'ASC')->first();
        $second_category  = Category::orderBy('created_at', 'ASC')->skip(1)->take(1)->get()->first();
        $third_category   = Category::orderBy('created_at', 'ASC')->skip(2)->take(1)->get()->first();
        $posts            = Post::take(4)->orderBy('created_at', 'ASC')->get();
        $all_posts        = Post::orderBy('created_at', 'DESC')->paginate(4); 


       return view('index')->with([

            'blog_name'          => Setting::first()->blog_name,
            'settings'           => Setting::first(),
            'categories'         => $categories,
            'tags'               => $tags,
            'posts'              => $posts,
            'first_post'         => $first_post,
            'second_post'        => $second_post,
            'third_post'         => $third_post,
            'first_category'     => $first_category,
            'second_category'    => $second_category,
            'third_category'     => $third_category,
            'all_posts'          => $all_posts

       ]);

   }


   public function category($id)
   {
       $category   = Category::find($id);
       $categories = Category::all();
       $tags       = Tag::all();
       return view('category.category')->with([

        'blog_name'    => Setting::first()->blog_name,
        'settings'     => Setting::first(),
        'category'     => $category,
        'categories'   => $categories,
        'tags'         => $tags

       ]);
   }

   public function tag($id)
   {
       $tag        = Tag::find($id);
       $categories = Category::all();
       $tags       = Tag::all();
       return view('tags.tags')->with([

        'tag'          => $tag,
        'blog_name'    => Setting::first()->blog_name,
        'settings'     => Setting::first(),
        'categories'   => $categories,
        'tags'         => $tags

       ]);

   }

   public function showPost($slug)
   {
       $post             = Post::where('slug', $slug)->first();
       $next_post        = Post::where('id', '>', $post->id)->min('id');
       $previous_post    = Post::where('id', '<', $post->id)->max('id');
       $tags             = Tag::take(12)->get();
       $categories       = Category::take(4)->get();


       return view('posts.show')->with([

        'post'           => $post,
        'slug'           => $slug,
        'next'           => Post::find($next_post),
        'previous'       => Post::find($previous_post),
        'blog_name'      => Setting::first()->blog_name,
        'settings'       => Setting::first(),
        'categories'     => $categories,
        'tags'           => $tags,
      
       ]);

   }


   public function searchEngine(Request $request)
   {
       $search          = $request->get('search');
       $post            = DB::table('posts')->where('title', 'LIKE', '%' . $search . '%')->paginate(5);
       $tags            = Tag::take(12)->get();
       $categories      = Category::all();
       

       return view('results.result')->with([

        'blog_name'      => Setting::first()->blog_name,
        'settings'       => Setting::first(),
        'posts'          => $post,
        'categories'     => $categories,
        'tags'           => $tags,

       ]);

   }

   public function about()
    {

       return view('about')->with([

        'blog_name'      => Setting::first()->blog_name,
        'settings'       => Setting::first(),
        'categories'     => Category::take(4)->get(),
        'tags'           => Tag::take(12)->get(),

       ]);

    }
}
