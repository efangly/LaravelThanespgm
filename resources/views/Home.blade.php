@extends('Master')
@section('title','Thanes Programmer : Home')
@section('css')
<style>
.file {
  visibility: hidden;
  position: absolute;
}
</style>
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
        <i class="fa fa-bell-o"></i>&nbsp;Home 
      </div>
      <div class="col-md-6" align="right">
        <a class="btn btn-success btn-lg btn-sm" href="/Plan/CreatePlan" role="button">
        <i class="fa fa-fw fa-file-text-o"></i>เขียนรายงาน</a>
      </div>
    </div>
  </div>
    <div class="row">
      <div class="col-lg-2" align="center">
        <br>
        @if(is_null(Auth::user()->profile))        
          <img src="/images/profile/default.jpg" class="rounded" alt="Cinque Terre" width="164" height="200">
        @elseif(Auth::user()->profile == '')
          <img src="/images/profile/default.jpg" class="rounded" alt="Cinque Terre" width="164" height="200">
        @else
          <img src="{{ Auth::user()->profile }}" class="rounded" alt="Cinque Terre" width="164" height="200">
        @endif
        <button type="button" class="btn btn-secondary btm-sm" data-toggle="modal" data-target="#uploadModal">
          อัพโหลดภาพ
        </button>           
      </div>
      <div class="col-lg-2">
        <br>
          @foreach($users as $row)
          <p>&nbsp;&nbsp;ชื่อ : {{$row['Name']}}</p>
          <p>&nbsp;&nbsp;ชื่อเล่น : {{$row['NN']}}</p>
          <p>&nbsp;&nbsp;ตำแหน่ง : {{$row['Sine']}}</p>
          <p>&nbsp;&nbsp;แผนก : {{$row['Department']}}</p>
          <p>&nbsp;&nbsp;สถานะผู้ใช้ : {{$row['Status']}}</p>
          @endforeach
      </div>
      <div class="col-md-8" align="center">
        <br>
        <h5 align="center">ประวัติการทำรายการล่าสุด</h5>  
        <div class="table-responsive">        
        <table class="table table-bordered table-striped table-sm" align="center">
          <tr class="bg-headtable">
            <th style="width: 25%"><p align="center">สถานที่</p></th>
            <th style="width: 30%"><p align="center">วัตถุประสงค์</p></th>
            <th style="width: 25%"><p align="center">ผู้ร่วมเดินทาง</p></th>
            <th style="width: 20%"><p align="center">แก้ไขล่าสุด</p></th>
          </tr>
          @foreach($plan as $row)
          <tr class="bg-rowstable">
            <td class="text-nowrap" style="width: 25%"><p>&nbsp; {{$row['Location']}}</p></td>
            <td class="text-nowrap" style="width: 30%"><p>&nbsp; {{$row['Plan']}}</p></td>
            <td class="text-nowrap" style="width: 25%"><p>&nbsp; {{$row['Plan_Name']}}</p></td>
            <td class="text-nowrap" style="width: 20%" align="center"><p>{{$row['Lastmodify']}}</p></td>
          </tr>
          @endforeach
        </table>
        </div>
        <br>
      </div>
    </div>
  <div class="card-footer small text-muted bg-rowstable">Updated at {{  NOW() }}</div>
</div>
</div>
</div>

<!-- Modal for upload button -->
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-rowstable text-white">
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-pencil-trash"></i> Upload</h4>
        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
          
      </div>
      <form method="post" action="/AddUser/upload" enctype="multipart/form-data">
      {{csrf_field()}}
        <div class="modal-body bg-bgtemplate text-white">
          <div class="form-group">
            <div align="center"><span>เฉพาะไฟล์ jpg, png, gif</span>
            <hr>
            <img src="/images/profile/default.jpg" id="preview" class="img-thumbnail" width="164" height="200"></div>
            <hr>
            <input type="file" name="select_image" accept="image/*" />
          </div>
        </div>
        <div class="modal-footer bg-rowstable text-white">
          <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Save</button>
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End of Modal for upload button -->
@endsection
@section('script')
  <script>
  $("#danger-alert").fadeTo(2000, 500).slideUp(500, function(){
        $("#danger-alert").slideUp(500);
  });
  $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
        $("#success-alert").slideUp(500);
  });

  $('input[type="file"]').change(function(e) {
    var fileName = e.target.files[0].name;
    $("#file").val(fileName);

    var reader = new FileReader();
    reader.onload = function(e) {
      // get loaded data and render thumbnail.
      document.getElementById("preview").src = e.target.result;
    };
    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
  });
  </script>
@endsection