<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>STT-GDC Portal | </title>

  <!-- Bootstrap core CSS -->

  <link href="{{URL::to('css/bootstrap.min.css')}}" rel="stylesheet">

  <link href="{{URL::to('fonts/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{URL::to('css/animate.min.css')}}" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="{{URL::to('css/custom.css')}}" rel="stylesheet">
  <link href="{{URL::to('css/icheck/flat/green.css')}}" rel="stylesheet" />
  <link href="{{URL::to('css/floatexamples.css')}}" rel="stylesheet" type="text/css" />
  <!-- data table -->
  <link href="{{URL::to('js/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{URL::to('js/datatables/buttons.bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{URL::to('js/datatables/fixedHeader.bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{URL::to('js/datatables/responsive.bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{URL::to('js/datatables/scroller.bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

  <script src="{{URL::to('js/jquery.min.js')}}"></script>
  <script src="{{URL::to('js/nprogress.js')}}"></script>

  

  <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>


<body class="nav-md">

  <div class="container body">


    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Stt-Gdc !</span></a>
          </div>
          <div class="clearfix"></div>

          <!-- menu prile quick info -->
         <!--  <div class="profile">
            <div class="profile_pic">
              <img src="images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2>John Doe</h2>
            </div>
          </div> -->
          <!-- /menu prile quick info -->

          <br />

          <!-- sidebar menu -->
          @include('templates.sidebar')
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">

        <div class="nav_menu">
          <nav class="" role="navigation">
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <?php 
                    $customer_id=$_SESSION['customer_id'];
                    $customer_data=DB::table('contact')->where('id',$customer_id)->first();
                ?>
                  <img src="images/img.jpg" alt="">Welcome {{$customer_data->name}}
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li><a href="javascript:;">  Profile</a>
                  </li>
                  <li>
                    <a href="javascript:;">
                      <span class="badge bg-red pull-right">50%</span>
                      <span>Settings</span>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:;">Help</a>
                  </li>
                  <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </li>
                </ul>
              </li>

              <li role="presentation" class="dropdown">
                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-envelope-o"></i>
                  <span class="badge bg-green">6</span>
                </a>
                <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                  <li>
                    <a>
                      <span class="image">
                                        <img src="images/img.jpg" alt="Profile Image" />
                                    </span>
                      <span>
                                        <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image">
                                        <img src="images/img.jpg" alt="Profile Image" />
                                    </span>
                      <span>
                                        <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image">
                                        <img src="images/img.jpg" alt="Profile Image" />
                                    </span>
                      <span>
                                        <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image">
                                        <img src="images/img.jpg" alt="Profile Image" />
                                    </span>
                      <span>
                                        <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                    </a>
                  </li>
                  <li>
                    <div class="text-center">
                      <a href="inbox.html">
                        <strong>See All Alerts</strong>
                        <i class="fa fa-angle-right"></i>
                      </a>
                    </div>
                  </li>
                </ul>
              </li>

            </ul>
          </nav>
        </div>

      </div>
      <!-- /top navigation -->


      <!-- page content -->
      <div class="right_col" role="main">
        @yield('content')
      </div>
      <!-- /page content -->

      <!-- footer content -->
      <footer>
        <div class="pull-right">
          Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
        </div>
        <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->
    </div>
  </div>

  <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
  </div>

  <script src="js/bootstrap.min.js"></script>

  <!-- gauge js -->
  <!-- <script type="text/javascript" src="js/gauge/gauge.min.js"></script>
  <script type="text/javascript" src="js/gauge/gauge_demo.js"></script> -->
  <!-- bootstrap progress js -->
  <script src="{{URL::to('js/progressbar/bootstrap-progressbar.min.js')}}"></script>
  <!-- icheck -->
  <script src="{{URL::to('js/icheck/icheck.min.js')}}"></script>
  <!-- daterangepicker -->
  <script type="text/javascript" src="{{URL::to('js/moment/moment.min.js')}}"></script>
  <script type="text/javascript" src="{{URL::to('js/datepicker/daterangepicker.js')}}"></script>
  <!-- chart js -->
  <script src="{{URL::to('js/chartjs/chart.min.js')}}"></script>

  <script src="{{URL::to('js/custom.js')}}"></script>

  <!-- flot js -->
  <script src="{{URL::to('js/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{URL::to('js/datatables/dataTables.bootstrap.js')}}"></script>
  <script src="{{URL::to('js/datatables/dataTables.buttons.min.js')}}"></script>
  <script src="{{URL::to('js/datatables/buttons.bootstrap.min.js')}}"></script>
  <script src="{{URL::to('js/datatables/buttons.html5.min.js')}}"></script>
  <script src="{{URL::to('js/datatables/buttons.print.min.js')}}"></script>
  <script src="{{URL::to('js/datatables/dataTables.fixedHeader.min.js')}}"></script>
  <script src="{{URL::to('js/datatables/dataTables.keyTable.min.js')}}"></script>
  <script src="{{URL::to('js/datatables/dataTables.responsive.min.js')}}"></script>
  <script src="{{URL::to('js/bootbox/bootbox.min.js')}}" type="text/javascript"></script>
  
  <!-- /datepicker -->
  <!-- /footer content -->
  <script>
          var handleDataTableButtons = function() {
              "use strict";
              0 !== $("#datatable-buttons").length && $("#datatable-buttons").DataTable({
                dom: "Bfrtip",
                buttons: [{
                  extend: "copy",
                  className: "btn-sm"
                }, {
                  extend: "csv",
                  className: "btn-sm"
                }, {
                  extend: "excel",
                  className: "btn-sm"
                }, {
                  extend: "pdf",
                  className: "btn-sm"
                }, {
                  extend: "print",
                  className: "btn-sm"
                }],
                responsive: !0
              })
            },
            TableManageButtons = function() {
              "use strict";
              return {
                init: function() {
                  handleDataTableButtons()
                }
              }
            }();

        </script>
        <script type="text/javascript">
          $(document).ready(function() {
            $('#datatable').dataTable();
            $('#datatable-keytable').DataTable({
              keys: true
            });
            $('#datatable-responsive').DataTable();
            $('#datatable-scroller').DataTable({
              ajax: "js/datatables/json/scroller-demo.json",
              deferRender: true,
              scrollY: 380,
              scrollCollapse: true,
              scroller: true
            });
            var table = $('#datatable-fixed-header').DataTable({
              fixedHeader: true
            });
          });
          TableManageButtons.init();
        </script>

        <!-- bootbox -->
        <script type="text/javascript">
          $('.delete').click(function(){
            var currentForm = $(this).closest("form");
            bootbox.confirm({
              title: 'Confirmation',
              message: $('#delete_text').html(),
              buttons: {
                  'cancel': {
                      label: 'No',
                      className: 'btn green col-md-4 pull-left'
                  },
                  'confirm': {
                      label: 'Yes',
                      className: 'btn red col-md-4 pull-right'
                  }
              },
              callback: function(result) {
                  if (result) {
                      currentForm.submit();
                  }
              }
          });
         });
        </script>
</body>

</html>
