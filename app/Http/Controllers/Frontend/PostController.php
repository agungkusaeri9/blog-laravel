<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;

class PostController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name','asc')->get();
        $posts = Post::orderBy('created_at','desc')->simplePaginate('10');
        return view('frontend.post.index',[
            'categories' => $categories,
            'posts' => $posts,
            'title' => 'My Blog'
        ]);
    }
    public function show(Post $post)
    {
        $categories = Category::orderBy('name','asc')->get();
        $tags = Tag::orderBy('name','asc')->get();
        return view('frontend.post.show',[
            'title' => $post->title,
            'post' => $post,
            'categories' => $categories,
        ]);
    }
}
