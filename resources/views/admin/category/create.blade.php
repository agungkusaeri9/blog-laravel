@extends('admin.templates.default')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header text-center">
                        <strong>Tambah Kategori</strong>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.category.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama Kategori</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Masukan Kategori Baru...">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-sm btn-block btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection