@extends('admin.templates.default')
@section('content')
    <div class="container">
        <div class="row">

            <!-- Post -->
            <div class="col-xl-3 col-md-6 mb-4">
              <a href="{{ route('post.index') }}">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Artikel</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $count_post }}</div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-fw fa-newspaper fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </div>
              </a>
            </div>

            <!-- Category -->
            <div class="col-xl-3 col-md-6 mb-4">
              <a href="{{ route('category.index') }}">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Kategori</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $count_category }}</div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-fw fa-list fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                </div>
              </a>
            </div>

            <!-- tag -->
            <div class="col-xl-3 col-md-6 mb-4">
              <a href="{{ route('tag.index') }}">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Tag</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $count_tag }}</div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-fw fa-tags fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                </div>
              </a>
            </div>

          <!-- user -->
          <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('user.index') }}">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Admin</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $count_admin }}</div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-fw fa-users fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                </div>
            </a>
          </div>

        </div>
          <!-- Content Row -->
    </div>
@endsection