@extends('admin.templates.default')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-white bg-primary">Edit Artikel : {{ $post->title }}</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('post.update', $post->slug) }}" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="form-group row">
                                <div class="col-lg-3 mb-2">
                                    <label for="">Gambar awal</label>
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="" class="img-fluid">
                                </div>
                                <div class="col-lg-9">
                                    <label for="">Pilih gambar baru</label>
                                    <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="image">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                    @error('image')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="category_id">Kategori</label>
                                <select name="category_id" id="select2" class="form-control @error('category_id') is-invalid @enderror">
                                    @foreach ($categories as $category)
                                        <option {{ $category->id == $post->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tags">Tags</label>
                                <select name="tags[]" class="form-control tags @error('tags') is-invalid @enderror" multiple>
                                    @foreach ($post->tags as $tag)
                                        <option selected value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                                @error('tags')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="title">Judul</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Masukan judul terbaru artikel..." value="{{$post->title ?? old('title') }}">
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea name="text" id="ckeditor" cols="30" rows="10" class="form-control @error('text') is-invalid @enderror">
                                {{ $post->text ?? old('text') }}
                                </textarea>
                                @error('text')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-sm btn-primary float-left">Post</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>   
    </div>
@endsection
@push('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
<script>
    $(document).ready(function() {
          $('#select2').select2();
          $('.tags').select2();
    });
    CKEDITOR.replace('ckeditor');
    CKEDITOR.editorConfig = function( config ) {
   config.removePlugins = 'easyimage, cloudservices';

};
</script>
@endpush