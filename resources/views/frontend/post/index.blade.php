@extends('frontend.templates.default')

@section('content')
    <main class="row">
        @foreach ($posts as $post)
        <div class="col-lg-6">
            <div class="card mb-3">
                <a href="{{ route('post.show', $post->slug) }}">
                    <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="..." height="200">
                </a>
                <div class="card-body">
                    <p class="card-text">
                        <i class="fa fa-fw fa-user"></i> <a href="#" class="mr-2">{{ $post->author->name }}</a>
                        <i class="fa fa-fw fa-list-alt"></i> <a href="{{ route('category.show', $post->category->slug) }}">{{ $post->category->name }}</a>
                    </p>
                    <a href="{{ route('post.show', $post->slug) }}">
                        <h5 class="card-title">{{ Str::limit($post->title,50,'') }}</h5>
                    </a>
                    <p class="card-text"><small class="text-muted">Dibuat {{ $post->created_at->diffForHumans() }}</small></p>
                </div>
            </div>
        </div>
        
        @endforeach

        @if ($posts->isEmpty() == true)
        <div class="alert alert-danger m-3" role="alert">
            <h4 class="alert-heading">Data Tidak Ditemukan</h4>
            <p>Data tidak ada atau sistem sedang mengalami masalah. Mohon segera hubungi admin untuk memperbaikinya.</p>
        </div>
        @endif
        

        
    </main>

    {{$posts->links()}}
@endsection