<!doctype html>
<html lang="en">
  <head>
    @include('frontend.templates.partials.head')
  </head>
  <body>
    @include('frontend.templates.partials.navbar')

    <div class="container" style="margin-top:70px;">
        <div class="row">
            <div class="col-lg-7 card pt-3">
              @yield('content')
            </div>
            @include('frontend.templates.partials.sidebar')

        </div>
    </div>
    
    @include('frontend.templates.partials.footer')

    @include('frontend.templates.partials.scripts')
  </body>
</html>