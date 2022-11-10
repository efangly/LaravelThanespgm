
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Thanes Programmer : Dashboard</title>
    <!-- Bootstrap core CSS-->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="/css/sb-admin.css" rel="stylesheet">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="/images/icons/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="/css/jquery.dataTables.min.css"/>
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
  </head>
  <body class="fixed-nav sticky-footer bg-dark sidenav-toggled" id="page-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-navbg fixed-top" id="mainNav">
      <a class="navbar-brand" href="/"><img src="/images/bbb.png" class="rounded" alt="Cinque Terre" width="30" height="30">&nbsp;Thanes Programmer</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Home">
            <a class="nav-link" href="/Monitor/Timeline">
            <i class="fa fa-home"></i>
            <span class="nav-link-text">&nbsp;Home</span>
            </a>
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
            <a class="nav-link">ชื่อพนักงาน : {{ Auth::user()->Name }} &nbsp;&nbsp; </a>
            <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i><span class="nav-link-text">&nbsp;Logout</span></a>
        </ul>
      </div>
    </nav>
    <!-- ********************************************Headerbar********************************************* -->
    <div class="content-wrapper p-3 mb-2 bg-bgtemplate text-white">
      <div class="container-fluid">
      @if(Session::has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong>Success!! </strong>{{ Session::get('success') }}
      </div>
      @elseif(Session::has('error'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert" id="danger-alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong>Add User!! </strong>{{ Session::get('error') }}
      </div>
      @endif
      <div class="card mb-3 bg-incard">
        <div class="card-header bg-rowstable">
        <div class="row">
          <div class="col-md-6">
            <h3><i class="fa fa-file-pdf-o"></i> Project List</h3>
          </div>
          <div class="col-md-6" align="right">
      
          </div>
        </div>
        </div>
    <br>
    <div class="row">
      <div class="col-md-12">
      <div class="table-responsive">
        <table class="table table-bordered table-striped table-sm" id="dtTable">
        <thead>
          <tr class="bg-headtable">
            <th class="text-nowrap" style="width: 25%"><h5 align="center">Product Name</h5></th>
            <th class="text-nowrap" style="width: 13%"><h5 align="center">เริ่มโปรเจค</h5></th>
            <th class="text-nowrap" style="width: 40%"><h5 align="center">ชื่อโรงพยาบาล</h5></th>
            <th class="text-nowrap" style="width: 15%"><h5 align="center">ความคืบหน้า</h5></th>
            <th class="text-nowrap" style="width: 7%"><h5 align="center">แก้ไข</h5></th>
          </tr>
        </thead>
        <tbody>
        @foreach($project as $row)
          <tr class="bg-rowstable">
            <td class="text-nowrap">{{$row['ProjectSite']}}</td>
            <td class="text-nowrap" align="center">{{date("d/m/Y", strtotime($row['Project_Start'])).' - '.date("d/m/Y", strtotime($row['Project_End']))}}</td>
            <td class="text-nowrap">{{$row['Hospital']}}</td>
            <td class="text-nowrap" >
              <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated" style="width:{{$row['Task']}}%;height:30px">
                  <h5>{{$row['Task']}}%</h5>
                </div>
              </div>
            </td>
            <td class="text-nowrap" align="center">
            <a href="/Monitor/Timeline/Detail/{{$row['ID_Project']}}" class="btn btn-edit btn-sm">
                <i class="fa fa-edit"></i></a>
            </td>
          </tr>
        @endforeach
        </tbody>
        </table>
        </div>   
        </div>
      </div>
    <div class="card-footer small text-muted bg-rowstable">Updated at {{  NOW() }}</div>
    </div>
    </div>
    </div>
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
    <script src="/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
    //datatable
    $('#dtTable').DataTable({
      "pageLength": 5,
      "lengthMenu": [[5,10,15], [5,10,15]],
      "ordering": false,
      "language":{
        "info": "จำนวนรายการทั้งหมด _TOTAL_ รายการ",
        "search": "ค้นหา",
        "zeroRecords": "ไม่พบข้อมูลที่ค้นหา",
        "lengthMenu": "แสดง _MENU_ รายการ"
      }
    });

    /*var table = $('#dtTable').DataTable();
    $('#dtTable tbody').on('click', 'tr', function () {
        var data = table.row(this).data();
        alert( 'You clicked on '+data[0]+'\'s row' );
    });*/
    </script>
  </body>
</html>
