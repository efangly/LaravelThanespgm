@extends('Master')
@section('title','Thanes Programmer : Edit')
@section('css')
  <link rel="stylesheet" type="text/css" href="/css/jquery.dataTables.min.css">
@endsection
@section('content')
<div class="content-wrapper p-3 mb-2 bg-bgtemplate text-white">
  <div class="container-fluid">
  @if(Session::has('error'))
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
      <h3><i class="fa fa-edit"></i> แก้ไขข้อมูล</h3>
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
        <th style="width: 10%"><h5 align="center">วันที่ปฎิบัติงาน</h5></th>
        <th class="text-nowrap" style="width: 20%"><h5 align="center">สถานที่ปฎิบัติงาน</h5></th>
        <th class="text-nowrap" style="width: 30%"><h5 align="center">วัตถุประสงค์การปฎิบัติงาน</h5></th>
        <th style="width: 25%"><h5 align="center">ผู้ร่วมเดินทาง</h5></th>
        <th style="width: 5%"><h5 align="center">ค่าน้ำมัน</h5></th>
        <th style="width: 5%"><h5 align="center">แก้ไข</h5></th>
        <th style="width: 5%"><h5 align="center">ลบ</h5></th>
      </tr>
      </thead>
      <tbody>
      @foreach($DTplans as $row)
      <tr class="bg-rowstable item{{$row['ID_detial']}}">
        <td class="text-nowrap" align="center">{{ date("d/m/Y", strtotime($row['Date_PlanS'])) }}</td>
        <td class="text-nowrap">{{$row['Location_Plan']}}</td>
        <td class="text-nowrap">{{$row['Detial_Plan']}}</td>
        <td class="text-nowrap">{{$row['Plan_Name_All']}}</td>
        <td class="text-nowrap" align="center">{{$row['Money_Total']}}</td>
        <td class="text-nowrap" align="center">
          <button type="button" class="btn btn-edit btn-sm edit_button" 
              data-toggle="modal" data-target="#editModal"
              data-local="{{$row['Location_Plan']}}"
              data-plan="{{$row['Detial_Plan']}}"
              data-fri="{{$row['Plan_Name_All']}}"
              data-cost="{{$row['Money_Total']}}"
              data-id="{{$row['ID_detial']}}">
              <i class="fa fa-edit"></i>
          </button>
        </td>
        <td class="text-nowrap" align="center">
          <button type="button" class="btn btn-close btn-sm del_button" 
              data-toggle="modal" data-target="#delModal"
              data-id="{{$row['ID_detial']}}">
              <i class="fa fa-close"></i>
          </button>
        </td>
      </tr>
      @endforeach
    </tbody>
    </table>
    </div> 
  </div>
</div>

</div>
</div>
</div>
<!-- Modal for Edit button -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-rowstable text-white">
        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
          <h4 class="modal-title" id="myModalLabel"><i class="fa fa-pencil-square-o"></i> แก้ไขข้อมูล</h4>
      </div>
      <form id="form-save">
      {{csrf_field()}}
        <div class="modal-body bg-bgtemplate text-white">
          <div class="form-group">
            <input class="form-control tb_idplan" type="hidden" name="ID_detial">
            <label for="heading"><i class="fa fa-location-arrow"></i> สถานที่</label>
            <input class="form-control tb_local" name="Location_Plan" placeholder="พิมพ์ชื่อสถานที่" required>
          </div>
          <div class="form-group">
            <input class="form-control tb_plan" type="hidden" name="Detial_Plan">
            <label for="heading"><i class="fa fa-object-group"></i> วัตถุประสงค์</label>
            <input class="form-control tb_plan" name="Detial_Plan" placeholder="วัตถุประสงค์" required>
          </div>
          <div class="form-group">
            <input class="form-control tb_fri" type="hidden" name="Plan_Name_All">
            <label for="heading"><i class="fa fa-user-o"></i> ผู้ร่วมเดินทาง</label>
            <input class="form-control tb_fri" name="Plan_Name_All" placeholder="ใส่ชื่อผู้ร่วมเดินทาง" required>
          </div>
          <div class="form-group">
            <input class="form-control tb_cost" type="hidden" name="Money_Total">
            <label for="heading"><i class="fa fa-money"></i> ค่าใช้จ่าย</label>
            <input type="number" class="form-control tb_cost" name="Money_Total" placeholder="0.00" required>
          </div>
        </div>
        <div class="modal-footer bg-rowstable text-white">
          <button type="submit" class="btn btn-primary" id="btn-save"><i class="fa fa-floppy-o"></i> Save changes</button>
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End of Modal for Edit button -->

<!-- Modal for Delete button -->
<div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-rowstable text-white">
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-pencil-trash"></i> Delete</h4>
        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
          
      </div>
      <form id="form-delete">
      {{csrf_field()}}
        <div class="modal-body bg-bgtemplate text-white">
          <div class="form-group">
            <input class="form-control tb_iddetail" type="hidden" name="ID_detialplan">
            <label for="heading"> ต้องการลบข้อมูลนี้?</label>
          </div>
        </div>
        <div class="modal-footer bg-rowstable text-white">
          <button type="submit" class="btn btn-danger" id="btn-delete"><i class="fa fa-trash"></i> Delete</button>
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End of Modal for Delete button -->

@endsection

@section('script')
<script type="text/javascript">
  //edit   
  $(document).on( "click", '.edit_button',function(e) {
    var local = $(this).data('local');
    var plan = $(this).data('plan');
    var fri = $(this).data('fri');
    var cost = $(this).data('cost');
    var id = $(this).data('id');

    $(".tb_local").val(local);
    $(".tb_fri").val(fri);
    $(".tb_cost").val(cost);
    $(".tb_idplan").val(id);
    $(".tb_plan").val(plan);   
  });

  $("#btn-save").click(function (e){
    e.preventDefault();
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      data: $('#form-save').serialize(),
      type: 'POST',
      url: '{{ route("Update") }}',
      dataType: 'json',
      success: function(data) {
          var str = '<tr class="bg-rowstable item"' + data.ID_detial + '"><td align="center">' + formatDate(data.Date_PlanS) + '</td>';
          str += '<td>' + data.Location_Plan + '</td><td>' + data.Detial_Plan + '</td>';
          str += '<td>' + data.Plan_Name_All + '</td><td align="center">' + data.Money_Total + '</td>';
          str += '<td align="center"><button type="button" class="btn btn-edit btn-sm edit_button" data-toggle="modal" ';
          str += 'data-target="#editModal" data-local="' + data.Location_Plan + '" ';
          str += 'data-plan="' + data.Detial_Plan + '" data-fri="' + data.Plan_Name_All + '" ';
          str += 'data-cost="' + data.Money_Total + '" data-id="' + data.ID_detial + '"> ';
          str += '<i class="fa fa-edit"></i></button></td><td align="center">';
          str += '<button type="button" class="btn btn-close btn-sm del_button"';
          str += 'data-toggle="modal" data-target="#delModal"';
          str += 'data-id="' + data.ID_detial + '">';
          str += '<i class="fa fa-close"></i></button></td></tr>';
          $('.item' + data.ID_detial).replaceWith(str);
          $('#editModal').modal('hide');
          location.reload();
      }
    });
  });
  //Delete
  $("#btn-delete").click(function (e){
    e.preventDefault();
    $.ajax({
      type: 'POST',
      url: '{{ route("Delete") }}',
      dataType: 'json',
      data: $('#form-delete').serialize(),
      success: function(data) {
        $('.item' + data.ID_detial).remove();
        $('#delModal').modal('hide'); 
      },
      error: function () {
        alert("error");
      }
    });
  });

  $(document).on( "click", '.del_button',function(e) {
    var id = $(this).data('id');

    $(".tb_iddetail").val(id);   
  });

  function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) 
        month = '0' + month;
    if (day.length < 2) 
        day = '0' + day;

    return [day, month, year].join('/');
  }
  
  $("#danger-alert").fadeTo(2000, 500).slideUp(500, function(){
			$("#success-alert").slideUp(500);
	});
  //datatable
  $('#dtTable').DataTable({
        "pageLength": 20,
        "lengthMenu": [[10,20,30], [10,20,30]],
        "ordering": false,
        "language":{
          "info": "จำนวนรายการทั้งหมด _TOTAL_ รายการ",
          "search": "ค้นหา",
          "zeroRecords": "ไม่พบข้อมูลที่ค้นหา",
          "lengthMenu": "แสดง _MENU_ รายการ"
      }
    });

</script>
@endsection