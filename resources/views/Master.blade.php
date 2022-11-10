<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <!-- Bootstrap core CSS-->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="/css/sb-admin.css" rel="stylesheet">
    <!-- DateTimePicker -->
    <link rel="stylesheet" media="all" type="text/css" href="/datepicker/jquery-ui.css" />
    <link rel="stylesheet" media="all" type="text/css" href="/datepicker/jquery-ui-timepicker-addon.css" />
    <!--===============================================================================================-->
    	<link rel="icon" type="image/png" href="/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="/vendor/bootstrap/css/bootstrap.min.css">
    	<link rel="stylesheet" type="text/css" href="/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="/vendor/animate/animate.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="/css/util.css">
    <!--===============================================================================================-->
      <!-- Icons font CSS-->
      <link href="/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
      <!-- Vendor CSS-->
      <link href="/vendor/select2/select2.min.css" rel="stylesheet" media="all">
      <link href="/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
      <style media="screen">
        .btn-close {
          background-color: #dc3545;
          border: none;
          color: white;
          padding: 5px 16px;
          font-size: 16px;
          cursor: pointer;
          border-radius: 0.50rem;
        }
        .btn-pdf {
          background-color: #8B4513;
          border: none;
          color: white;
          padding: 5px 16px;
          font-size: 16px;
          cursor: pointer;
          border-radius: 0.50rem;
        }
        .btn-pdf1 {
          background-color: #DAA520;
          border: none;
          color: white;
          padding: 5px 16px;
          font-size: 16px;
          cursor: pointer;
          border-radius: 0.50rem;
        }
        .btn-edit {
          background-color: #28a745;
          border: none;
          color: white;
          padding: 5px 16px;
          font-size: 16px;
          cursor: pointer;
          border-radius: 0.50rem;
        }
        .btn-export {
          background-color: #6A5ACD;
          border: none;
          color: white;
          padding: 5px 16px;
          font-size: 16px;
          cursor: pointer;
          border-radius: 0.50rem;
        }
        .bg-headtable {
          background-color: #333366 !important;
        }
        .bg-navbg {
          background-color: #393939 !important;
        }
        .bg-rowstable {
          background-color: #595959 !important;
        }
        .bg-incard {
          background-color: #696969 !important;
        }
        .bg-bgtemplate {
          background-color: #797979 !important;
        }
        table {
          border-collapse: collapse;
          border-radius: 1em;
          overflow: hidden;
        }
        input.largerCheckbox { 
            width: 20px; 
            height: 20px; 
        }
        .table-responsive {
          -webkit-overflow-scrolling: touch !important;
        }

        .table-responsive .table {
          max-width: none;
        }
        
      </style>
      @yield('css')
  </head>
  <body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-navbg fixed-top" id="mainNav">
      <a class="navbar-brand" href="/"><img src="/images/bbb.png" class="rounded" alt="Cinque Terre" width="30" height="30">&nbsp;Thanes Programmer</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Home">
            <a class="nav-link" href="/">
            <i class="fa fa-home"></i>
            <span class="nav-link-text">Home</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Report">
            <a class="nav-link" href="/Report">
            <i class="fa fa-file-pdf-o"></i>
            <span class="nav-link-text">&nbsp;Report</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Report">
            <a class="nav-link" href="/ProjectManager">
            <i class="fa fa-calendar-check-o"></i>
            <span class="nav-link-text">&nbsp;Project Manager</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="About">
            <a class="nav-link" href="/AddUser">
            <i class="fa fa-address-book-o"></i>
            <span class="nav-link-text">&nbsp;Add User</span>
            </a>
          </li>

          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="About">
            <a class="nav-link" href="/CheckWorking">
            <i class="fa fa-check-square"></i>
            <span class="nav-link-text">&nbsp;รายงานตัว</span>
            </a>
          </li>

          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Logout">
            <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i><span class="nav-link-text">&nbsp;Logout</span></a>
          </li>

        </ul>
        <ul class="navbar-nav sidenav-toggler">
          <li class="nav-item">
            <a class="nav-link text-center" id="sidenavToggler">
              <i class="fa fa-fw fa-angle-left"></i>
            </a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <a class="nav-link">ชื่อพนักงาน : {{ Auth::user()->Name }} &nbsp;&nbsp; แผนก : {{ Auth::user()->Sine }}</a>
        </ul>
      </div>
    </nav>
    <!-- ********************************************Headerbar********************************************* -->
      @yield('content')
    <!-- *********************************************Footerbar ****************************************** -->
    <footer class="sticky-footer bg-rowstable text-white">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Thanes 2020</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header bg-rowstable text-white">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body bg-bgtemplate text-white">คุณต้องการ logout?</div>
          <div class="modal-footer bg-rowstable text-white">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="/logout">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/popper/popper.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="/vendor/chart.js/Chart.min.js"></script>
    <script src="/vendor/datatables/jquery.dataTables.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="/js/sb-admin-datatables.min.js"></script>
    <script src="/js/sb-admin-charts.min.js"></script>
    <script src="/js/main.js"></script>
    <!-- Main JS-->
    <script src="/js/global.js"></script>
    <script src="/js/bootstrap-confirmation.js"></script>
    <script src="/js/bootstrap-confirmation.min.js"></script>
    @yield('script')
  </body>
</html>
