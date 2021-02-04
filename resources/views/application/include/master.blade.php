<?php
  $dataUser = HelperData::getDataUser(session("id_user"),"all");
  $transparent = true;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/scl-logo-white.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/scl-logo-white.png') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
  @yield('title') | SCL Studio
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
  <!-- CSS Files -->
  <link href="{{ asset('assets/css/material-dashboard.css?v=2.1.0') }}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <!-- <link href="{{ asset('assets/demo/demo.css') }}" rel="stylesheet" /> -->
  <link href="{{ asset('assets/css/grid.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/custom-template.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/highcharts.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/choiceIcon.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
  @yield('additionalCSS')
</head>
<body class="">
  <div class="wrapper ">
    <div class="modal fade modal-mini modal-primary" id="myModal10" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-small">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
          </div>
          <div class="modal-body">
            <p> Apakah anda yakin mau keluar?</p>
          </div>
          <div class="modal-footer justify-content-center">
            <button type="button" class="btn btn-link" data-dismiss="modal">Tidak! Lupakan</button>
            <a class="btn btn-success btn-link" href="{{ route('prosesLogout') }}">Ya<div class="ripple-container"></div></a>
          </div>
        </div>
      </div>
    </div>
    @yield('modal')
    <div class="sidebar" data-color="azure" data-background-color="white" data-image="{{ asset('assets/img/sidebar-1.jpg') }}">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          <img src="{{ asset('assets/img/scl-logo-white.png') }}" width="25" height="25">
        </a>
        <a href="#" class="simple-text logo-normal" style="font-size: 14px;">
          SCL Studio
        </a>
      </div>
      <div class="sidebar-wrapper">
        <div class="user">
          <div class="photo">
            <img src="{{ asset('assets/img/no_profile.jpg') }}" />
          </div>
          <div class="user-info">
            <a href="#" class="username">
              <span>
                {{ $dataUser->user }}
              </span>
            </a>
          </div>
        </div>
          @include('application.include.sidebar')
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg {{ ($transparent)?'navbar-transparent':'' }} navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-minimize">
              <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
              </button>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
              <ol class="breadcrumb">
                @for($a = 0; $a < count($pageNow); $a++)
                  @if($a == count($pageNow)-1)
                    <li class="breadcrumb-item active" aria-current="page">{{ $pageNow[$a] }}</li>
                  @else
                    <li class="breadcrumb-item old">{{ $pageNow[$a] }}</li>
                  @endif
                @endfor
              </ol>
            </nav>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form id="searchValidation" class="navbar-form">
              <!-- <div class="input-group no-border">
                <input type="text" class="form-control" id="searchEmploye" required="true" name="employee"  placeholder="Search employee...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div> -->
            </form>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      @yield('content')

      <footer class="footer hide">
        <audio id="buzzer" src="{{ asset('assets/sound/inbox.mp3') }}" type="audio/mp3"></audio>
        <div class="container-fluid">
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="https://www.tigaconsulting.co.id" target="_blank">3 Consulting Service.</a>
          </div>
        </div>
      </footer>
    </div>

    @yield('calender')
  </div>
  <!--   Core JS Files   -->
  <script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/bootstrap-material-design.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
  <!-- Plugin for the momentJs  -->
  <script src="{{ asset('assets/js/plugins/moment.min.js') }}"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="{{ asset('assets/js/plugins/sweetalert2.js') }}"></script>
  <!-- Forms Validations Plugin -->
  <script src="{{ asset('assets/js/plugins/jquery.validate.min.js') }}"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="{{ asset('assets/js/plugins/jquery.bootstrap-wizard.js') }}"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="{{ asset('assets/js/plugins/bootstrap-selectpicker.js') }}"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="{{ asset('assets/js/plugins/bootstrap-datetimepicker.min.js') }}"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <!-- <script src="{{ asset('assets/js/plugins/jquery.dataTables-quickly.min.js') }}"></script> -->
  <script src="{{ asset('assets/js/plugins/jquery.dataTables.min.js') }}"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="{{ asset('assets/js/plugins/bootstrap-tagsinput.js') }}"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="{{ asset('assets/js/plugins/jasny-bootstrap.min.js') }}"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="{{ asset('assets/js/plugins/fullcalendar.min.js') }}"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/
  <script src="{{ asset('assets/js/plugins/jquery-jvectormap.js') }}"></script> -->
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{ asset('assets/js/plugins/nouislider.min.js') }}"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="{{ asset('assets/js/core/core.js') }}"></script>
  <!-- Library for adding dinamically elements -->
  <script src="{{ asset('assets/js/plugins/arrive.min.js') }}"></script>
  <!-- Chartist JS
  <script src="{{ asset('assets/js/plugins/chartist.min.js') }}"></script> -->
  <!--  Notifications Plugin    -->
  <script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('assets/js/material-dashboard.js?v=2.1.0') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/main.js?v=2.1.0') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/highcharts.js') }}" type="text/javascript"></script>
  <!-- <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/highcharts-more.js"></script>

  <script src="https://code.highcharts.com/modules/solid-gauge.js"></script> -->
  <!-- Material Dashboard DEMO methods, don't include it in your project!
  <script src="{{ asset('assets/demo/demo.js') }}"></script>-->

  <link  href="{{ asset('assets/css/jquery.fancybox.min.css') }}" rel="stylesheet">
  <script src="{{ asset('assets/js/jquery.fancybox.min.js') }}"></script>

  <script src="{{ asset('assets/plugins/ckeditor_full/ckeditor.js') }}"></script>
  <script src="{{ asset('assets/plugins/select2/select2.min.js')}}"></script>

  @include('application.include.script')

  <script>
  var lasCount = 0;
  var lasData;
  var first = true;

  $(document).ready(function() {
    @if(!empty(session('message')))
      md.showNotification('top','right','{{ session("message_status") }}','{{ session("message") }}');
    @elseif(!empty($message))
      md.showNotification('top','right','{{ $message_status }}','{{ $message }}');
    @endif
    // Javascript method's body can be found in assets/js/demos.js
    // getMessageCount();
    setFormValidation('#searchValidation');
    // $('[data-toggle="tooltips"]').tooltip();
  });
  
  var window_focus;
  var counter = 1800;
  // var counter = 5;

  $(window).focus(function() {
      window_focus = false;
      counter = 1800;
  });

  $(window).focusout(function() {
      window_focus = true;
  });


  $(document).one('click',function() {
     // ClearSession();
      setInterval(function() {
        // console.log('Count: ' + counter);
        if(window_focus) { counter = counter-1; }
        if(counter == 0){

        }
      }, 1000);
  });
  </script>
  @yield('additionalJS')
</body>

</html>
