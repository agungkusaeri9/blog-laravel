<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id','desc')->get();
        return view('admin.post.index', [
            'title' => 'All Post',
            'posts' => $posts 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = \App\Category::orderBy('name','asc')->get();
        $tags = Tag::latest()->get();
        return view('admin.post.create', [
            'title' => 'Tambah Artikel',
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
            'category_id' => 'required',
            'tags' => 'array|required',
            'title' => 'required|min:5|max:191',
            'text' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $image = $request->file('image')->store('images/posts');
        $post = Post::create([
            'category_id' => $request->category_id,
            'title' => Str::title($request->title),
            'slug' => Str::slug($request->title),
            'text' => $request->text,
            'image' => $image,
            'is_active' => 1,
            'user_id' => Auth()->user()->id
        ]);

        $post->tags()->attach($request->tags);

        return redirect()->route('post.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.post.show',[
            'title' => $post->slug,
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::latest()->get();
        $categories = \App\Category::orderBy('name','asc')->get();
        return view('admin.post.edit', [
            'title' => 'Edit Artikel ' . $post->slug,
            'categories' => $categories,
            'post' => $post,
            'tags' => $tags
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $user_login = Auth::user()->name;
        $request->validate([
            'category_id' => 'required',
            'title' => 'required|min:5|max:191',
            'text' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if($request->file('image')){
            \Storage::delete($post->image);
            $image = $request->file('image')->store('images/posts');
        }else{
            $image = $post->image;
        }

        $post->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'text' => $request->text,
            'image' => $image,
            'edited_by' => $user_login
        ]);

        $post->tags()->sync($request->tags);

        return redirect()->route('post.index')->with('success','Artikel berhasil di update.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        \Storage::delete($post->image);
        $post->delete();
        return redirect()->route('post.index')->with('success','Artikel berhasil di hapus.');
    }
}
