<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $posts = $category->posts()->latest()->simplePaginate(10);
        $categories = Category::orderBy('name','asc')->get();
        return view('frontend.post.index',[
            'title' => 'Artikel berdasarkan ' . $category->name,
            'posts' => $posts,
            'categories' => $categories,
        ]);
    }
}
