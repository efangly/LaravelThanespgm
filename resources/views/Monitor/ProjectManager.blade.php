@extends('Master')
@section('title','Thanes Programmer : Project Manager')
@section('css')
<link rel="stylesheet" type="text/css" href="/css/jquery.dataTables.min.css">
@endsection
@section('content')
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
        <h3><i class="fa fa-file-pdf-o"></i> Project Manager</h3>
      </div>
      <div class="col-md-6" align="right">
        <a class="btn btn-success btn-lg btn-sm" href="/ProjectManager/Createproject" role="button">
        <i class="fa fa-fw fa-file-text-o"></i> Create Project</a>
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
        <a href="/ProjectManager/Updateproject/{{$row['ID_Project']}}" class="btn btn-edit btn-sm">
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

@endsection
@section('script')
<script type="text/javascript">
    //datatable
    $('#dtTable').DataTable({
      "pageLength": 10,
      "lengthMenu": [[10,15,20], [10,15,20]],
      "ordering": false,
      "language":{
        "info": "จำนวนรายการทั้งหมด _TOTAL_ รายการ",
        "search": "ค้นหา",
        "zeroRecords": "ไม่พบข้อมูลที่ค้นหา",
        "lengthMenu": "แสดง _MENU_ รายการ"
      }
    });
    //fadeout alert
    $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
      $("#success-alert").slideUp(500);
    });
    $("#danger-alert").fadeTo(2000, 500).slideUp(500, function(){
      $("#success-alert").slideUp(500);
    });
    /*
    var table = $('#dtTable').DataTable();
    $('#dtTable tbody').on('click', 'tr', function () {
        var data = table.row(this).data();
        alert( 'You clicked on '+data[0]+'\'s row' );
    });*/
    </script>
    @endsection
