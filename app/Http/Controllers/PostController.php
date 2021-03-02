<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    } 

    public function index()
    {
        $posts = Post::all();
        return view('posts.index')->with(['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags        = Tag::all();

        if ($categories->count() == 0)
        {
            return redirect()->route('category.create')->with('create_category_first', 'Please Create Category First!');
        }

        if ($tags->count() == 0) {
            return redirect()->route('tag.create')->with('create_tag_first', 'Please Create Tag First!');
        }

        return view('posts.create')->with([

            'categories' => $categories,
            'tags' => $tags
            
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           
            'title'       => 'required|min:5|max:255',
            'content'     => 'required|min:3',
            'category_id' => 'required',
            'featured'    => 'required|image',
            'tags'        => 'required'
        ]);


        // Upload Image In Laravel 8 (DONE)
        // Fix name of Uploaded Image to be (Old Name + New NAme)
        $featured_new_name = time() . '.' . $request->featured->extension();
        $request->featured->move(('uploads/posts'), $featured_new_name);

        $post = Post::create([

            'title'        => $request->title,
            'content'      => $request->content,
            'category_id'  => $request->category_id,
            'featured'     => 'uploads/posts/' . $featured_new_name,
            'slug'         => Str::slug($request->title),
            'user_id'      => Auth::id(),
        ]);

        $post->save();

        $post->tags()->attach($request->tags);

        return redirect()->route('posts.index')->with('post_created', 'Post has been created');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post       = Post::find($id);
        $categories = Category::all();
        $tags       = Tag::all();
        return view('posts.edit')->with([
            
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags
             
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        $request->validate([
           
            'title'       => 'required|min:5|max:255',
            'content'     => 'required|min:3',
            'category_id' => 'required',
        ]);

        if ($request->hasFile('featured')) {

            $featured_new_name = time() . '.' . $request->featured->extension();
            $request->featured->move(('uploads/posts/'), $featured_new_name);

            $post->featured = 'uploads/posts/' . $featured_new_name;
        }


        $post->title       = $request['title'];
        $post->content     = $request['content'];
        $post->category_id = $request['category_id'];
        // $post->featured    = $request['featured'];


        $post->update();
        $post->tags()->sync($request->tags);
        return back()->with('post_updated', 'Post has been updated');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return back()->with('post_deleted', 'Post has been deleted');
    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();
        return view('posts.softdeleted')->with(['posts' => $posts]);       
    }

    public function hardDelete($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->forceDelete();
        return redirect()->back()->with('post_deleted_forever', 'Post has been deleted forever');
    }

    public function restoreItem($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->restore();
        return redirect()->route('posts.index')->with('post_restored', 'Post has been restored successfully');
    }

}
