<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>


    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      @include('admin.nav')
      <div class="container-fluid page-body-wrapper">

        @include('admin.topnav')
        <!-- partial -->
        <div class="main-panel">
            @yield('content')
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('admin.script')
  </body>
</html>
