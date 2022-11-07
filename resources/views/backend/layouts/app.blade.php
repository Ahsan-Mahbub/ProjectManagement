<!doctype html>
<html lang="en" class="no-focus">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Admin Panel</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700&display=swap">
        <link rel="stylesheet" id="css-main" href="{{ asset('asset/backend_asset/assets/css/codebase.min.css')}}">
        <link rel="stylesheet" href="{{ asset('asset/toastr.min.css')}}">
        <link rel="icon" href="/asset/frontend_asset/assets/img/core/logo.png"/>
        <style type="text/css">
            .container{
              margin-top: 20px;
            }
            .table thead th {
              text-transform: capitalize;
            }
            .justify{
              justify-content: center;
            }
            .toast-success {
              background-color: #266525 !important;
              opacity: 1;
            }
        </style>
        @yield('css')
    </head>
    <body>

        <!-- Page Container -->
        <div id="page-container" class="sidebar-o sidebar-inverse enable-page-overlay side-scroll page-header-fixed main-content-narrow">

            @include('backend.layouts.sideoverflow')
            @include('backend.layouts.sidebar')
            @include('backend.layouts.header')
            @yield('content')
            @include('backend.layouts.footer')

        </div>
        <!-- END Page Container -->

        <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
        <script src="{{ asset('asset/toastr.min.js')}}"></script>
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

        <script>
          @if(Session::has('message'))
          toastr.options =
          {
            "closeButton" : true,
            "progressBar" : true
          }
                toastr.success("{{ session('message') }}");
          @endif

          @if(Session::has('error'))
          toastr.options =
          {
            "closeButton" : true,
            "progressBar" : true
          }
                toastr.error("{{ session('error') }}");
          @endif

          @if(Session::has('info'))
          toastr.options =
          {
            "closeButton" : true,
            "progressBar" : true
          }
                toastr.info("{{ session('info') }}");
          @endif

          @if(Session::has('warning'))
          toastr.options =
          {
            "closeButton" : true,
            "progressBar" : true
          }
                toastr.warning("{{ session('warning') }}");
          @endif
        </script>
        <script src="{{ asset('asset/backend_asset/assets/js/codebase.core.min.js')}}"></script>
        <script src="{{ asset('asset/backend_asset/assets/js/codebase.app.min.js')}}"></script>
        <!-- Page JS Plugins -->
        <script src="{{ asset('asset/backend_asset/assets/js/plugins/chartjs/Chart.bundle.min.js')}}"></script>
        <!-- Page JS Code -->
        <script src="{{ asset('asset/backend_asset/assets/js/pages/be_pages_dashboard.min.js')}}"></script>
        <script src="{{ asset('asset/backend_asset/assets/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{ asset('asset/backend_asset/assets/js/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{ asset('asset/backend_asset/assets/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
        <!-- Page JS Code -->
        <script src="{{ asset('asset/backend_asset/assets/js/pages/be_tables_datatables.min.js')}}"></script>
        <script src="{{ asset('ckeditor/ckeditor.js')}}"></script>
        <script>
            CKEDITOR.replace('editor');
        </script>
        @yield('script')
    </body>
</html>