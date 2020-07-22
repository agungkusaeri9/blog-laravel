<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    public function show(Tag $tag)
    {
        $posts = $tag->posts()->latest()->simplePaginate(10);
        $tags = Tag::orderBy('name','asc')->get();
        return view('frontend.post.index',[
            'title' => 'Artikel berdasarkan ' . $tag->name,
            'posts' => $posts,
            'tags' => $tags,
        ]);
    }
}
