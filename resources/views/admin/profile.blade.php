@extends('admin.templates.default')
@section('content')
    <div class="container-fluid">
        @if (session('success'))

            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                
            @endif
        <div class="row justify-content-center">
            
            <div class="col-lg-6">
                <div class="card text-center">
                    <div class="card-header">
                        Administrator
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('storage/'. $user->image) }}" alt="" class="img-fluid rounded-circle border border-danger" style="height: 250px;width:250px;">

                        <table class="table table-borderless text-left mt-5">
                            <tr>
                                <th>Nama</th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th>Username</th>
                                <td>{{ $user->username }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th>Dibuat</th>
                                <td>{{ $user->created_at->format('d F Y') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection