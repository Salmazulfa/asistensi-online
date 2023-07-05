<!DOCTYPE html>
<html dir="ltr" lang="en">

  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/icon.png') }}" />
    <title>{{ $title }}</title>
    {{-- Bootsrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- This page plugin CSS -->
    <link href="{{ asset('assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('assets/extra-libs/c3/c3.min.css" rel="stylesheet') }}" />
    <link href="{{ asset('assets/libs/chartist/dist/chartist.min.css" rel="stylesheet') }}" />
    <link href="{{ asset('assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet') }}" />
    <!-- Custom CSS -->
    <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    @include('dosen.partials.preloader')
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
   
      @include('dosen.partials.navbar')
      @include('dosen.partials.sidebar')

      <div class="page-wrapper">
        @include('dosen.partials.header')
        @yield('container')
        @include('dosen.partials.footer')
      </div>

    <script>
      window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function(){
          $(this).remove(); 
      });
      }, 1200);
    </script>

    </div>
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    {{-- Bootsrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="{{ asset('dist/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('dist/js/feather.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('dist/js/custom.min.js') }}"></script>
    <!--This page JavaScript -->
    <script src="{{ asset('assets/extra-libs/c3/d3.min.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/c3/c3.min.js') }}"></script>
    <script src="{{ asset('assets/libs/chartist/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('dist/js/pages/dashboards/dashboard1.min.js') }}"></script>
    <!--This page plugins -->
    <script src="{{ asset('assets/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dist/js/pages/datatable/datatable-basic.init.js') }}"></script>

    <script>
      $('#hapusAdmin').on('show.bs.modal', function (event) {
          console.log('Modal Open');
          var button = $(event.relatedTarget)
          var username = button.data('username')
          console.log(username);
      })

      $('#hapusDosen').on('show.bs.modal', function (event) {
          console.log('Modal Open');
          var button = $(event.relatedTarget)
          var id = button.data('id')
          console.log(id);
      })
      
      $('#editMatkul').on('show.bs.modal', function (event) {
          
          console.log('Modal Open');
          var button = $(event.relatedTarget)
          var id = button.data('id')
          var matkul = button.data('matkul')
          console.log(id);

          var modal = $(this)
          modal.find('.modal-body #id').val(id);
          modal.find('.modal-body #matkul').val(matkul);
      })
      
      $('#ubahPass').on('show.bs.modal', function (event) {
          
          console.log('Modal Open');
          var button = $(event.relatedTarget)
          var id = button.data('id')
          console.log(id);

          var modal = $(this)
          modal.find('.modal-body #id').val(id);
      })


      // $(function() {
      //       $('#nama_dosen').on('change', function() {
      //           let matkul = $('#nama_dosen').val();

      //           console.log(matkul);
      //       })
      //   });
  </script>
  </body>
</html>
