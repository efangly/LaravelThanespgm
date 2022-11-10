@extends('Master')
@section('title','Thanes Programmer : รายงานตัว')
@section('css')
<style media="screen">
    body {
    font-family: Arial, Helvetica, sans-serif;
    background-color: black;
    }

    * {
    box-sizing: border-box;
    }

    /* Full-width input fields */
    input[type=text], input[type=password], input[type=number] {
    width: 100%;
    padding: 10px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
    }
    select{
      width: 100%;
      padding: 10px;
      margin: 10px 0 22px 0;
      display: inline-block;
      border: none;
      background: #f1f1f1;
    }

    input[type=text]:focus, input[type=password]:focus, input[type=number]:focus {
    background-color: #ddd;
    outline: none;
    }

    /* Overwrite default styles of hr */
    hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
    }

    /* Set a style for the submit button */
    .btn1 {
    background-color: #1d3ef5;
    color: white;
    padding: 16px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
    }
    .btn2 {
    background-color: #ed0000;
    color: white;
    padding: 16px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
    }
    .btn3 {
    background-color: #4CAF50;
    color: white;
    padding: 16px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
    }
    .btn4 {
    background-color: #ed7700;
    color: white;
    padding: 16px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
    }
    .btn5 {
    background-color: #4CAF50;
    color: white;
    padding: 16px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
    }

    .registerbtn:hover {
    opacity: 1;
    }

    /* Add a blue text color to links */
    a {
    color: dodgerblue;
    }
    
    input[type=radio] {
    width: 20px;
    height: 20px;
    }

    .dropdown-menu {
      width:100%;
    }
    .responsive {
      width: 100%;
      height: auto;
    }
</style>
@endsection
@section('content')
<div class="content-wrapper p-3 mb-2 bg-bgtemplate text-white font-poppins">
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
    <h3>เขียนรายงานตัวประจำวัน</h3>
    
    <hr>
    <div class="row">
        <div class="col-md-3">
          <div class="dropdown">
            <button type="button" class="btn btn1 dropdown-toggle" data-toggle="dropdown">
              เลือก 1 รายการ
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#confirm">เข้าออฟฟิศ</a>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#onsite">ออกนอกสถานที่</a>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#Leavework">ลา</a>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#other">อื่นๆ</a>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-sm" id="dtTable">
              <thead>
              <tr class="bg-headtable">
                <th style="width: 80%"><h5 align="center">ชื่อ/สถานะ</h5></th>
                <th style="width: 20%"><h5 align="center">เวลา</h5></th>
              </tr>
              </thead>
              <tbody>
              @foreach($check as $row)
              <tr class="item{{$row['id_checkworking']}}">
                <td class=""> {{$row['name']}}
                @if($row['imgpath'] != NULL)
                  : <a class="pic_button" href="" 
                  data-toggle="modal" data-target="#myModal"
                  data-pic="{{$row['imgpath']}}"> ไฟล์แนบ</a>
                @endif
                <br> {{$row['status']}}</td>
                <td class="" align="center">{{$row['lastmodified']}}</td>
              </tr>
              @endforeach
              </tbody>
            </table>
            {{ $check->links() }}
        </div>
    </div>
    <hr>
    <!--<button type="submit" class="registerbtn">สร้างรายงาน</button>-->
</div>

<!-- Modal for pic button -->
<div class="modal fade bd-example-modal-sm" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="myModal">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header  bg-rowstable text-white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ไฟล์แนบ</h4>
        </div>
        <div class="modal-body bg-bgtemplate text-white">
          <div class="row">
            <div class="col-lg-12" align="center">
            <img id="foo" src="" class="responsive" />     
            </div>
          </div>
        </div>
        <div class="modal-footer bg-rowstable text-white">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        </div>
      </div>
  </div>
</div>

</div>
<!-- Modal for confirm button -->
<div class="modal fade bd-example-modal-sm" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="confirm">
  <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header  bg-rowstable text-white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Confirm</h4>
        </div>
        <form action="/CheckWorking/Save" method="POST">
        {{csrf_field()}}
        <div class="modal-body bg-bgtemplate text-white">
          <input class="form-control" type="hidden" name="checkworking_status" value="office">
          <p>ยืนยันเลือกเข้าออฟฟิศ?</p>
        </div>
        <div class="modal-footer bg-rowstable text-white">
          <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Confirm</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        </div>
        </form>
      </div>
  </div>
</div>

<!-- Modal for onsite button -->
<div id="onsite" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-rowstable text-white">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">ออกนอกสถานที่</h4>
      </div>
      <form action="/CheckWorking/Save" method="POST">
        {{csrf_field()}}
      <div class="modal-body bg-bgtemplate text-white">
        <div class="form-group">
          <input class="form-control" type="hidden" name="checkworking_status" value="onsite">
          <label for="heading"><i class="fa fa-location-arrow"></i> สถานที่</label>
          <select class="form-control" name="locationname">
            <option>โรงพยาบาลศิริราช</option>
            <option>โรงพยาบาลวชิระ</option>
            <option>โรงพยาบาลBNH</option>
            <option>โรงพยาบาลชลประทาน</option>
          </select>
        </div>
      </div>
      <div class="modal-footer bg-rowstable text-white">
        <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End of Modal for Edit button -->

<!-- Modal for Leavework button -->
<div id="Leavework" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-rowstable text-white">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">ลา</h4>
      </div>
      <form action="/CheckWorking/Save" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
      <div class="modal-body bg-bgtemplate text-white">
        <div class="form-group">
          <input class="form-control" type="hidden" name="checkworking_status" value="leavework">
          <label for="heading"><i class="fa fa-thermometer-half"></i> ประเภทการลา</label><br>
          <label class="radio-inline"><input type="radio" name="leavetype" value="ลาป่วย" checked> ลาป่วย </label>
          <label class="radio-inline"><input type="radio" name="leavetype" value="ลากิจ"> ลากิจ </label>
          <label class="radio-inline"><input type="radio" name="leavetype" value="ลาพักร้อน"> ลาพักร้อน </label>
        </div>
        <div class="form-group">
          <label for="heading"><i class="fa fa-file-text-o"></i> เหตุผลในการลา</label>
          <input class="form-control" name="leaveworking" placeholder="ใส่เหตุผลในการลา" required>
        </div>
        <div class="form-group">
          <label for="heading"><i class="fa fa-picture-o"></i> ไฟล์แนบ</label><br>
          <input type="file" name="select_image" accept="image/*" />
          <div align="center"><span>เฉพาะไฟล์ jpg, png, gif</span>
          </div>
        </div>
      </div>
      <div class="modal-footer bg-rowstable text-white">
        <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End of Modal for Leavework button -->

<!-- Modal for other button -->
<div id="other" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-rowstable text-white">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">อื่นๆ</h4>
      </div>
      <form action="/CheckWorking/Save" method="POST">
        {{csrf_field()}}
      <div class="modal-body bg-bgtemplate text-white">
      <div class="form-group">
        <label for="heading"><i class="fa fa-file-text-o"></i> ระบุข้อมูลอื่นๆ</label>
        <input class="form-control" type="hidden" name="checkworking_status" value="other">
        <input class="form-control" name="otherr" placeholder="ระบุข้อมูล" required>
      </div>
      <div class="modal-footer bg-rowstable text-white">
        <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End of Modal for other button -->


@endsection

@section('script')
<!-- Custom datetimepicker -->
<script type="text/javascript" src="/datepicker/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="/datepicker/jquery-ui.min.js"></script>
<script type="text/javascript" src="/datepicker/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript" src="/datepicker/jquery-ui-sliderAccess.js"></script>
    <!--===============================================================================================-->
    	<script src="/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    	<script src="/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    	<script src="/vendor/daterangepicker/moment.min.js"></script>
    	<script src="/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    	<script src="/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
  <!-- Vendor JS-->
  <script src="/vendor/select2/select2.min.js"></script>
  <script src="/vendor/datepicker/moment.min.js"></script>
  <script src="/vendor/datepicker/daterangepicker.js"></script>
<script type="text/javascript">
  //fadeout alert
  $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
  });
  $("#danger-alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
  });
  $(document).on( "click", '.pic_button',function(e){
    var imgsrc = $(this).data('pic');
    $(".tb_pic").val(imgsrc);
    $("#foo").attr("src", imgsrc);
  });
  </script>
@endsection