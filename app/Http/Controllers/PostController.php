<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $posts = Post::latest()->get();

        return view('blog.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {

        $data = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $post->title = $data['title'];

        $post->description = $data['description'];

        $post->user_id = Auth::id();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = uniqid() . '-' . $ext;
            $request->image->move(public_path('images/'), $filename);
            $post->image = $filename;
        }

        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

        $post->slug = $slug;

        $post->save();

        session()->flash('message', 'Your post has been added');

        return redirect('/blog');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id)->first();
        return view('blog.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = Post::where('slug', '=', $slug)->first();

        return view('blog.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $post = Post::where('slug', '=', $slug)->first();

        $data = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        $post->title = $data['title'];
        $post->description = $data['description'];
        $post->user_id = Auth::id();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = uniqid() . '-' . $ext;
            $request->image->move(public_path('images/'), $filename);
            $post->image = $filename;
        }
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        $post->slug = $slug;
        $post->update();
        session()->flash('message', 'Your post has been updated');
        return redirect('/blog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = Post::where('slug', '=', $slug)->first();

        $post->delete();

        session()->flash('message', 'Your post has been deleted');

        return redirect('/blog');
    }
}
