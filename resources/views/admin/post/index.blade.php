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
            <h1 class="h3 mb-2 text-gray-800">Artikel</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Artikel</h6>
                <a href="{{ route('post.create') }}" class="btn btn-sm btn-primary">Tambah Artikel</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th width="10">No.</th>
                            <th>Gambar</th>
                            <th>Kategori</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Dibuat</th>
                            <th style="min-width:100px;">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td><img width="80" src="{{ asset('storage/' . $post->image) }}" alt=""></td>
                                    <td>{{ $post->category->name }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->author->name }}</td>
                                    <td>{{ $post->created_at->format('d/m/y') }}</td>
                                    <td style="min-width:100px;">
                                        <a href="{{ route('post.show', $post->slug) }}" class="btn btn-sm btn-warning" title="Tampilkan"><i class="fas fa-fw fa-eye"></i></a>
                                        <a href="{{ route('post.edit', $post->slug) }}" class="btn btn-sm btn-success" title="Edit"><i class="fas fa-fw fa-edit"></i></a>
                                        <form action="{{ route('post.destroy', $post->slug) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm" type="submit" title="Hapus" onclick="return confirm('Yakin?');"><i class="fas fa-fw fa-trash"></i></button>
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