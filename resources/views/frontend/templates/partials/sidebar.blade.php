@php
    $post_lain = App\Post::latest()->get()->random(10);
    $post_suka = App\Post::latest()->get()->random(5);
@endphp
<div class="col-lg-4 offset-lg-1">
    <aside class="card mb-3">
        <h5 class="p-2">Artikel Lainnya</h5>
        <ul class="list-group list-group-flush">
            @foreach ($post_lain as $post)
            <li class="list-group-item"> 
                <a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a>
            </li>
            @endforeach
        </ul>
    </aside>
    <aside class="card">
        <h5 class="p-2">Kamu Juga suka</h5>
        <ul class="list-group list-group-flush">
            @foreach ($post_suka as $post)
            <li class="list-group-item"> 
                <a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a>
            </li>
            @endforeach
        </ul>
    </aside>
</div>