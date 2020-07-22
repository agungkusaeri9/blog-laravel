@extends('admin.templates.default')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-white bg-primary">Tambah Artikel Baru</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('admin.post.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Gambar</label>
                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                @error('image')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_id">Kategori</label>
                                <select name="category_id" class="form-control select2 @error('category_id') is-invalid @enderror">
                                    <option disabled selected>--Pilih Kategori--</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Masukan judul terbaru artikel..." value="{{ old('title') }}" autofocus>
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea name="text" id="ckeditor" cols="30" rows="10" class="form-control @error('text') is-invalid @enderror">
                                    @error('text')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                {{ old('text') }}
                                </textarea>
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
          $('.select2').select2();
          $('.tags').select2({
              placeholder: "Pilih tags",
          });
    });
    CKEDITOR.replace('ckeditor');
    CKEDITOR.editorConfig = function( config ) {
   config.removePlugins = 'easyimage, cloudservices';

};
</script>
@endpush