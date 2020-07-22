@extends('frontend.templates.default')
@section('content')
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">{{ $post->category->name }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($post->title,60, '') }}</li>
            </ol>
  
        <h4>{{ $post->title }}</h4>
        <p class="card-text">
            <i class="fa fa-fw fa-user"></i><a href="#" class="mr-3">{{ $post->author->name }}</a>
            <i class="fa fa-fw fa-list-alt"></i><a href="{{ route('category.show', $post->category->slug) }}" class="mr-3">{{ $post->category->name }}</a>
            @foreach ($post->tags as $tags)
            <i class="fa fa-fw fa-tag"></i><a href="{{ route('tag.show', $tags->slug) }}" class="mr-3">{{ $tags->name }}</a>
            @endforeach
            <i class="fa fa-fw fa-calendar"></i>{{ $post->created_at->translatedFormat('l, d F Y H:i') }} WIB 
        </p>
        <img src="{{ asset('storage/' . $post->image) }}" alt="">
        <div class="deskripsi mt-4">
            {!! $post->text !!}
        </div>
@endsection