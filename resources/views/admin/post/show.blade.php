@extends('admin.templates.default')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 mb-2">
                <div class="card">
                    <div class="card-header">
                        Info Artikel
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tr>
                                    <th>Kategori</th>
                                    <td>{{ $post->category->name }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>@if ($post->is_active == 1)
                                        Aktif
                                        @else
                                        Tidak AKtif
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Penulis</th>
                                    <td>{{ $post->author->name }}</td>
                                </tr>
                                <tr>
                                    <th>Tags</th>
                                    
                                    <td>
                                        @foreach ($post->tags as $tags)
                                        <span class="badge badge-secondary">{{ $tags->name }}</span>
                                        @endforeach
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <th>Dibuat</th>
                                    <td>{{ $post->created_at->translatedFormat('d F Y')}}</td>
                                </tr>
                                @if ($post->edited_by !== NULL)
                                <tr>
                                    <th>Diedit oleh</th>
                                    <td>{{ $post->edited_by }}</td>
                                </tr>
                                @endif
                            </table>
                        </div>
                        <a href="{{ route('admin.post.edit', $post->slug) }}" class="btn btn-info btn-sm btn-block">Edit</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h2 class="mb-2">{{ $post->title }}</h2>
                        <img src="{{ asset('storage/' . $post->image) }}" alt="" class="img-fluid">
                        <p>{!! $post->text !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection