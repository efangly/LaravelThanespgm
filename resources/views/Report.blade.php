@extends('Master')
@section('title','Thanes Programmer : Report')
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
      <h3><i class="fa fa-file-pdf-o"></i> ออกรายงานนอกสถานที่</h3>
    </div>
    <div class="col-md-6" align="right">
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">
          เลือกรายการออกรายงาน
        </button>
        <div class="dropdown-menu">
          <a class="dropdown-item" id="mounth">
          <i class="fa fa-calendar"></i> รายงานการปฎิบัติงาน </a>
          <a class="dropdown-item" id="money">
          <i class="fa fa-money"></i> เอกสารเบิกค่าเดินทาง </a>
          <a class="dropdown-item" id="hr">
          <i class="fa fa-address-card"></i> รายงาน(HR) </a>
          <a class="dropdown-item" id="all">
          <i class="fa fa-address-card"></i> เปิดทั้งหมด </a>
        </div>
      </div>
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
        <th style="width: 3%"><h5 align="center">#</h5></th>
        <th style="width: 20%"><h5 align="center">สถานที่</h5></th>
        <th style="width: 32%"><h5 align="center">วัตถุประสงค์</h5></th>
        <th style="width: 20%"><h5 align="center">ผู้ร่วมเดินทาง</h5></th>
        <th style="width: 15%"><h5 align="center">วันที่ปฏิบัติงาน</h5></th>
        <th style="width: 10%"><h5 align="center">แก้ไข/ลบ</h5></th>
      </tr>
    </thead>
    <tbody>
      @foreach($plans as $row)
      <tr class="bg-rowstable item{{$row['ID_Plan']}}">
        <td class="text-nowrap" align="center"><input class="largerCheckbox" type="checkbox" name="plan" value="{{$row['ID_Plan']}}"></td>
        <td class="text-nowrap">{{$row['Location']}}</td>
        <td class="text-nowrap">{{$row['Plan']}}</td>
        <td class="text-nowrap">{{$row['Plan_Name']}}</td>
        <td class="text-nowrap" align="center">{{date("d/m/Y", strtotime($row['Date_Start'])).' - '.date("d/m/Y", strtotime($row['Date_End']))}}</td>
        <td class="text-nowrap" align="center">
          <div class="btn-group">
            <a href="/Report/edit/{{ $row['ID_Plan'] }}" class="btn btn-edit btn-sm">
            <i class="fa fa-edit"></i></a>
            <button type="button" class="btn btn-close btn-sm del_button" 
                data-toggle="modal" data-target="#delModal"
                data-id="{{$row['ID_Plan']}}">
                <i class="fa fa-close"></i>
            </button>
          </div>
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
            <input class="form-control tb_iddetail" type="hidden" name="ID_plan">
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
<script src="/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
//Delete
  $("#btn-delete").click(function (e){
    e.preventDefault();
    $.ajax({
      type: 'POST',
      url: '{{ route("DeletePlan") }}',
      dataType: 'json',
      data: $('#form-delete').serialize(),
      success: function(data) {
        $('.item' + data.ID_plan).remove();
        $('#delModal').modal('hide'); 
      },
      error: function () {
        alert("error");
      }
    });
  });
  //delete button
  $(document).on( "click", '.del_button',function(e) {
    var id = $(this).data('id');

    $(".tb_iddetail").val(id);   
  });
  //open HR.pdf
  $("#hr").click(function(){
    var Plans = [];
    $.each($("input[name='plan']:checked"), function(){
      Plans.push($(this).val());
    });
    if (Plans.length === 0) {
      alert("กรุณาเลือกอย่างน้อย 1 รายการ");
    }
    else {
      $('input:checkbox').each(function() { this.checked = false; });
      window.open("/Report/showPDFHR/" + Plans, "_blank");
    }
  });
  //open Money.pdf
  $("#money").click(function(){
    var Plans = [];
    $.each($("input[name='plan']:checked"), function(){
      Plans.push($(this).val());
    });
    if (Plans.length === 0) {
      alert("กรุณาเลือกอย่างน้อย 1 รายการ");
    }
    else {
      $('input:checkbox').each(function() { this.checked = false; });
      window.open("/Report/showPDFMoney/" + Plans, "_blank");
    }
  });
  //open Mounth.pdf
  $("#mounth").click(function(){
    var Plans = [];
    $.each($("input[name='plan']:checked"), function(){
      Plans.push($(this).val());
    });
    if (Plans.length === 0) {
      alert("กรุณาเลือกอย่างน้อย 1 รายการ");
    }
    else {
      $('input:checkbox').each(function() { this.checked = false; });
      window.open("/Report/showPDFMonth/" + Plans, "_blank");
    }
  });
  //open all.pdf
  $("#all").click(function(){
    var Plans = [];
    $.each($("input[name='plan']:checked"), function(){
      Plans.push($(this).val());
    });
    if (Plans.length === 0) {
      alert("กรุณาเลือกอย่างน้อย 1 รายการ");
    }
    else {
      $('input:checkbox').each(function() { this.checked = false; });
      window.open("/Report/showALL/" + Plans, "_blank");
    }
  });
  //fadeout alert
  $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
  });
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
