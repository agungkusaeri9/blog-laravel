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
            <h1 class="h3 mb-2 text-gray-800">Kategori</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Kategori</h6>
                <a href="{{ route('admin.category.create') }}" class="btn btn-sm btn-primary">Tambah Kategori</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th width="10">No.</th>
                            <th>Kategori</th>
                            <th>Slug</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($categories as $category)
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->slug }}</td>
                                <td>
                                    <a href="{{ route('admin.category.edit', $category->slug) }}" class="btn btn-sm btn-info">Edit</a>
                                    <form action="{{ route('admin.category.destroy', $category->slug) }}" class="d-inline" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin?')">Delete</button>
                                    </form>
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