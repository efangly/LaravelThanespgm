
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
        <div class="card mb-3 bg-incard">
        <form action="/ProjectManager/Updateproject/submit" method="POST">
        {{csrf_field()}}
          <div class="card-header bg-rowstable">
          <div class="row">
            <div class="col-md-6">
              <h3><i class="fa fa-file-pdf-o"></i> Project Detail</h3>
            </div>
            <div class="col-md-6" align="right">
              
            </div>
          </div>
          </div>
      <br>
      @foreach($project as $row)
      <div class="row">
        <div class="col-md-12">
        <div class="table-responsive">
          <table class="table table-bordered table-striped table-sm" id="dtTable">
            <tr class="bg-headtable">
              @foreach($hospital as $rows)
              <th colspan="5" class="text-nowrap" style="width: 80%"><h4 align="center">{{$rows['ProjectSite']}}:{{$rows['Hospital']}}</h4>
              </th>
              <th class="text-nowrap" style="width: 20%">
              <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated" style="width:{{$rows['Task']}}%;height:30px">
                <h4>{{$rows['Task']}}%</h4>
                </div>
              </div>
              </th>
              @endforeach
            </tr>
            <tr class="bg-headtable">
              <td style="width: 15%" class="text-nowrap"><h5 align="center">Product</h5></td>
              <td style="width: 30%" class="text-nowrap"><h5 align="center">PROJECT SITE & TASK TITLE </h5></td>
              <td style="width: 10%" class="text-nowrap"><h5 align="center">Start Date</h5></td>
              <td style="width: 10%" class="text-nowrap"><h5 align="center">End Date</h5></td>
              <td style="width: 20%" class="text-nowrap"><h5 align="center">Task Owner</h5></td>
              <td style="width: 15%" class="text-nowrap"><h5 align="center">Task Status</h5></td>
            </tr>
            <tr>
              <td rowspan="10" align="center">{{$row['productname']}}</td>
              <td style="width: 30%">คุยสรุปเรื่องการ Interface</td>
              <td style="width: 10%" align="center">{{$row['interfacedatestart']}}</td>
              <td style="width: 10%" align="center">{{$row['interfacedateend']}}</td>
              <td style="width: 20%" align="center">{{$row['interfaceowner']}}</td>
              <td style="width: 15%" align="center">
                @if($row['interfacestatus'] == 20)
                  Complete
                @else
                  In Progress
                @endif
              </td>
            </tr>
            <tr>
              <td>รอข้อมูลตัวอย่าง เพื่อทดสอบระบบเบื้องต้น</td>
              <td align="center">{{$row['datadatestart']}}</td>
              <td align="center">{{$row['datadateend']}}</td>
              <td align="center">{{$row['dataowner']}}</td>
              <td align="center">
                @if($row['datastatus'] == 20)
                  Complete
                @else
                  In Progress
                @endif
              </td>
            </tr>
            <tr>
              <td>ทดสอบการเชื่อมต่อข้อมูล</td>
              <td align="center">{{$row['testdatestart']}}</td>
              <td align="center">{{$row['testdateend']}}</td>
              <td align="center">{{$row['testowner']}}</td>
              <td align="center">
                @if($row['teststatus'] == 20)
                  Complete
                @else
                  In Progress
                @endif
              </td>
            </tr>
            <tr>
              <td>เครื่องเข้าติดตั้ง</td>
              <td align="center">{{$row['installdatestart']}}</td>
              <td align="center">{{$row['installdateend']}}</td>
              <td align="center">{{$row['installowner']}}</td>
              <td align="center">
                @if($row['installstatus'] == 20)
                  Complete
                @else
                  In Progress
                @endif
              </td>
            </tr>
            <tr>
              <td>ตั้งค่าและทดสอบอุปกรณ์</td>
              <td align="center">{{$row['settingdatestart']}}</td>
              <td align="center">{{$row['settingdateend']}}</td>
              <td align="center">{{$row['settingowner']}}</td>
              <td align="center">
                @if($row['settingstatus'] == 20)
                  Complete
                @else
                  In Progress
                @endif
              </td>
            </tr>
            <tr>
              <td>ติดตั้ง แก้ไข ตั้งค่า ทดสอบระบบ</td>
              <td align="center">{{$row['editdatestart']}}</td>
              <td align="center">{{$row['editdateend']}}</td>
              <td align="center">{{$row['editowner']}}</td>
              <td align="center">
                @if($row['editstatus'] == 20)
                  Complete
                @else
                  In Progress
                @endif
              </td>
            </tr>
            <tr>
              <td>อบรมและทดลองใช้งานจริง</td>
              <td align="center">{{$row['traindatestart']}}</td>
              <td align="center">{{$row['traindateend']}}</td>
              <td align="center">{{$row['trainowner']}}</td>
              <td align="center">
                @if($row['trainstatus'] == 20)
                  Complete
                @else
                  In Progress
                @endif
              </td>
            </tr>
            <tr>
              <td>ใช้งานจริง</td>
              <td align="center">{{$row['usingdatestart']}}</td>
              <td align="center">{{$row['usingdateend']}}</td>
              <td align="center">{{$row['usingowner']}}</td>
              <td align="center">
                @if($row['usingstatus'] == 20)
                  Complete
                @else
                  In Progress
                @endif
              </td>
            </tr>
            <tr>
              <td>ส่งงานและตรวจรับ</td>
              <td align="center">{{$row['checkdatestart']}}</td>
              <td align="center">{{$row['checkdateend']}}</td>
              <td align="center">{{$row['checkowner']}}</td>
              <td align="center">
                @if($row['checkstatus'] == 20)
                  Complete
                @else
                  In Progress
                @endif
              </td>
            </tr>
            <tr>
              <td>Standby</td>
              <td align="center">{{$row['standbydatestart']}}</td>
              <td align="center">{{$row['standbydateend']}}</td>
              <td align="center">{{$row['standbyowner']}}</td>
              <td align="center">
                @if($row['standbystatus'] == 20)
                  Complete
                @else
                  In Progress
                @endif
              </td>
            </tr>
          </table>
          </div>   
          </div>
        </div>
      @endforeach
      </form>
      <div class="card-footer small text-muted bg-rowstable"><b> แก้ไขล่าสุด : </b> {{$row['updated_at']}} <b> แก้ไขโดย : </b>{{$row['acceptuser']}} </div>
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
    <!-- Custom scripts for all pages-->
    <script src="/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="/js/sb-admin-datatables.min.js"></script>
    <script src="/js/sb-admin-charts.min.js"></script>
    <script src="/js/main.js"></script>
    <!-- Main JS-->
    <script src="/js/global.js"></script>
  </body>
</html>