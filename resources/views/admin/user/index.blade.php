@extends('admin.templates.default')
@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">

            @if (session('success'))

            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                
            @endif

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Admin</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Admin</h6>
                <a href="{{ route('admin.user.create') }}" class="btn btn-sm btn-primary">Tambah Admin</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="10">No.</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($users as $user)
                                <tr>
                                    <td class="text-center">{{ $i++ }}</td>
                                    <td><img width="100" src="{{ asset('storage/' . $user->image) }}" alt=""></td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <a href="{{ route('admin.user.show', $user->username) }}" class="btn btn-sm btn-warning">Show</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
            </div>

        </div>
    </div>

</div>
<!-- End of Main Content -->

@endsection
@push('style')
<link href="{{ asset('assets/sbadmin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush
@push('scripts')
    <!-- Page level plugins -->
  <script src="{{ asset('assets/sbadmin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/sbadmin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('assets/sbadmin/js/demo/datatables-demo.js') }}"></script>
@endpush