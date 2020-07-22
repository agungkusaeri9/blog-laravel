@extends('admin.templates.default')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header text-center">
                        <strong>Edit Tag</strong>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.tag.update', $tag->slug) }}" method="post">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label for="name">Tag</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $tag->name ?? old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-sm btn-block btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection