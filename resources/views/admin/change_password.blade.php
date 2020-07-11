@extends('admin.templates.default')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif
                <div class="card">
                    <div class="card-header text-center">Ubah Password</div>
                    <div class="card-body">
                        <form action="{{ route('updatepassword') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="current_password">Password saat ini</label>
                                <input type="password" name="current_password" class="form-control" id="current_password">
                            </div>
                            <div class="form-group">
                                <label for="new_password">Password baru</label>
                                <input type="password" name="new_password" class="form-control" id="new_password">
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Konfirmasi password baru</label>
                                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-sm btn-block btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection