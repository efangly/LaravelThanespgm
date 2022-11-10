@extends('Master')
@section('title','Thanes Programmer : User')
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
  @endif
<div class="card mb-3 bg-incard">
  <div class="card-header bg-rowstable">
  <div class="row">
    <div class="col-md-6">
      <h3><i class="fa fa-user-circle"></i> รายชื่อผู้ใช้งาน</h3>
    </div>
    <div class="col-md-6">
      <div align="right"><a class="btn btn-success btn-lg btn-sm" href="/AddUser/CreateUser" role="button">
      <i class="fa fa-user-circle"></i> เพิ่มผู้ใช้งาน</a></div>
    </div>
  </div>
  </div>
<br>
<div class="row">
  <div class="col-md-1">

  </div>
  <div class="col-md-10">
  <div class="table-responsive">
    <table class="table table-bordered table-striped table-sm">
      <tr class="bg-headtable">
        <th style="width: 15%"><h5 align="center">รหัสพนักงาน</h5></th>
        <th style="width: 37%"><h5 align="center">ชื่อพนักงาน</h5></th>
        <th style="width: 18%"><h5 align="center">ตำแหน่ง</h5></th>
        <th style="width: 15%"><h5 align="center">ชื่อเล่น</h5></th>
        <th style="width: 10%"><h5 align="center">สถานะ</h5></th>
        <th style="width: 10%"><h5 align="center">ลบ</h5></th>
      </tr>
      @foreach($user as $row)
      <tr class="bg-rowstable item{{$row['userID']}}">
        <td class="text-nowrap" align="center">{{$row['userID']}}</td>
        <td class="text-nowrap">{{$row['Name']}}</td>
        <td class="text-nowrap" align="center">{{$row['Sine']}}</td>
        <td class="text-nowrap">{{$row['NN']}}</td>
        <td class="text-nowrap" align="center">{{$row['Status']}}</td>
        <td class="text-nowrap" align="center">
          <button type="button" class="btn btn-close btn-sm del_button" 
              data-toggle="modal" data-target="#delModal"
              data-id="{{$row['userID']}}">
              <i class="fa fa-close"></i>
          </button>
        </td>
      </tr>
      @endforeach
    </table>
    </div>
    {{ $user->links() }}
    
  </div>
  <div class="col-md-1">
 
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
            <input class="form-control tb_userid" type="hidden" name="userId">
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
//Delete
  $("#btn-delete").click(function (e){
    e.preventDefault();
    $.ajax({
      type: 'POST',
      url: '{{ route("deleteUser") }}',
      dataType: 'json',
      data: $('#form-delete').serialize(),
      success: function(data) {
        $('.item' + data.userID).remove();
        $('#delModal').modal('hide'); 
      },
      error: function () {
        alert("error");
      }
    });
  });

  $(document).on( "click", '.del_button',function(e) {
    var id = $(this).data('id');

    $(".tb_userid").val(id);   
  });

  //fadeout alert
  $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
  });
  </script>
@endsection
