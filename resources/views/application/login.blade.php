<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/scl-logo-white.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/scl-logo-white.png') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Sign In 
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
  <!-- CSS Files -->
  <link href="{{ asset('assets/css/material-dashboard.css?v=2.1.0') }}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('assets/demo/demo.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/grid.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/custom-template.css') }}" rel="stylesheet" />
  <style>
    .navbar p {
        display: inline-block;
        margin: 0;
        line-height: 21px;
        font-weight: inherit;
        font-size: inherit;
      }
      .card-profile .card-avatar {
        border: 2px solid #a51d1e;
        max-width: 100px !important;
        max-height: 100px !important;
        margin-top: -60px !important;
      }
  </style>
</head>

<body class="off-canvas-sidebar">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">
    <div class="container">
      <div class="navbar-translate" onLoad="waktu()" style="width: 100%">
        <b> TIME : <p id="jam"></p> : <p id="menit"></p> : <p id="detik"></p></b>
        <b style="float:right;"><p id="hari"></p> , <p id="tgl"></p>  <p id="bulan"> </p>  <p id="taun"></p></b>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="wrapper wrapper-full-page">
    <div class="page-header lock-page header-filter" style="background-image: url('../../assets/img/lock.jpg')">
      <!--   you can change the color of the filter page using: data-color="blue | green | orange | red | purple" -->
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
            <form id="LoginValidation" action="" method="">
              <div class="card card-profile text-center card-hidden full-width">
                <div class="card-header ">
                  <div class="card-avatar background-white padding-20">
                    <a href="#pablo">
                      <img class="img" src="{{ asset('assets/img/scl-logo-white.png') }}">
                    </a>
                  </div>
                </div>
                <div class="card-body ">
                  <h4><p class="card-title text-center bold">SCL Studio Admin</p></h4>
                  <div class="row">
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 no-padding-right xs-hide">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons margin-top-15">person</i>
                        </span>
                      </div>
                    </div>
                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                      <div class="form-group">
                        <label for="exampleText" class="bmd-label-floating"> Username *</label>
                        <input type="text" class="form-control" id="username" required="true" name="username">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 no-padding-right xs-hide">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons margin-top-15">lock_outline</i>
                        </span>
                      </div>
                    </div>
                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                      <div class="form-group">
                        <label for="examplePassword" class="bmd-label-floating"> Password *</label>
                        <input type="password" class="form-control" id="password" required="true" name="password">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer justify-content-center no-padding-top">
                  <button type="submit" class="btn btn-primary-red">Login</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container">
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, Designed by
            <a href="https://www.instagram.com/sase_aditya/">Sase Aditya.</a>
          </div>
        </div>
      </footer>
    </div>
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
  <!-- Chartist JS -->
  <script src="{{ asset('assets/js/plugins/chartist.min.js') }}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('assets/js/material-dashboard.js?v=2.1.0') }}" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{ asset('assets/demo/demo.js') }}"></script>
  <script>
    window.setTimeout("waktu()",1000);
     function waktu() {
         var tanggal = new Date();
         setTimeout("waktu()",1000);
         document.getElementById("jam").innerHTML = tanggal.getHours();
         document.getElementById("menit").innerHTML = tanggal.getMinutes();
         document.getElementById("detik").innerHTML = tanggal.getSeconds();

             var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
       var myDays = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
         var date = new Date();
         var day = date.getDate();
         var month = date.getMonth();
         var thisDay = date.getDay(),
             thisDay = myDays[thisDay];
         var yy = date.getYear();
         var year = (yy < 1000) ? yy + 1900 : yy;
         document.getElementById("tgl").innerHTML = date.getDate();
         document.getElementById("bulan").innerHTML = months[month];
         document.getElementById("hari").innerHTML = thisDay;
         document.getElementById("taun").innerHTML = year;
       }
  </script>
  <script>
    $(document).ready(function() {
      md.checkFullPageBackgroundImage();
      setTimeout(function() {
        // after 1000 ms we add the class animated to the login/register card
        $('.card').removeClass('card-hidden');
      }, 700);

      $( "#LoginValidation" ).submit(function( event ) {
        event.preventDefault();
        var isValid = true;
        var user = $('#username').val();
        var pass = $('#password').val();

        if(user == "" || pass == ""){
          isValid = false;
        }
        if (isValid) {
          tryLogin();
        } else {
        }
      });
    });
  </script>
  <script>
    function tryLogin() {
      var user = $('#username').val();
      var pass = $('#password').val();

      $.ajax({
        type : "GET",
        url  : "{{ route('prosesLogin') }}",
        data : {
          'user'  : user,
          'pass'  : pass
        },
        success : function(response){
          if(response != "Failed") {
            swal({
              title: "Hello " + response.fullname,
              text: "Have a nice day!",
              buttonsStyling: false,
              confirmButtonClass: "btn btn-success",
              type: "success"
            }).catch(swal.noop).then((value) => {
              window.location=('./view_category');
            });
          } else {
            swal({
              title: "Oops!",
              text: "Please check your password/ username",
              buttonsStyling: false,
              confirmButtonClass: "btn btn-success",
              type: "error"
            }).catch(swal.noop);
          }
        }
      });
    }
    function setFormValidation(id) {
      $(id).validate({
        highlight: function(element) {
          $(element).closest('.form-group').removeClass('has-success').addClass('has-danger');
          $(element).closest('.form-check').removeClass('has-success').addClass('has-danger');
        },
        success: function(element) {
          $(element).closest('.form-group').removeClass('has-danger').addClass('has-success');
          $(element).closest('.form-check').removeClass('has-danger').addClass('has-success');
        },
        errorPlacement: function(error, element) {
          $(element).closest('.form-group').append(error);
        },
      });
    }

    $(document).ready(function() {
      setFormValidation('#LoginValidation');
    });
  </script>
</body>

</html>
