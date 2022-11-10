@extends('Master')
@section('title','Thanes Programmer : เขียนรายงาน')
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
    .registerbtn {
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
</style>
@endsection
@section('content')
<div class="content-wrapper p-3 mb-2 bg-bgtemplate text-white font-poppins">
  <div class="container-fluid">
  @if(Session::has('error'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert" id="danger-alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <strong>Add User!! </strong>{{ Session::get('error') }}
  </div>
  @endif
  <form action="/Plan/submit" method="POST">
    {{csrf_field()}}
    <h1>เขียนรายงาน</h1>
    <p>กรอกข้อมูลให้ครบถ้วน</p>
    <hr>
    <div class="row">
        <div class="col-md-4">
            <label><b><span class="fa fa-calendar"></span> วันที่เริ่ม ปฎิบัติงาน : </b></label>
            <input type="text" placeholder="เลือกวันเริ่มงาน" name="Date_Start" id="dateInputStart" value="" autocomplete="off" required />

            <label><b><span class="fa fa-calendar"> วันสิ้นสุด ปฎิบัติงาน : </b></label>
            <input type="text" placeholder="เลือกวันสิ้นสุดงาน" name="Date_End" id="dateInputEnd" value="" autocomplete="off" required />

            <label><b>สถานที่ :</b></label>
            <input type="text" name="Location" placeholder="พิมพ์ชื่อสถานที่" required>
        </div>
        <div class="col-md-4">
            <label><b>วัตถุประสงค์การปฎิบัติงาน : </b></label>
            <input type="text" placeholder="วัตถุประสงค์การปฎิบัติงาน" name="Plan" required>

            <label><b>ค่าเดินทาง : </b></label>
            <input type="number" name="Money" placeholder="0.00" required>

            <label><b>ผู้ร่วมเดินทาง : </b></label>
            <input type="text" placeholder="พิมพ์ชื่อหรือเพิ่มจาก Dropdown" name="Plan_Name" id="buddy">
        </div>
        <div class="col-md-4">

            <label><b>รายชื่อผู้ร่วมเดินทาง</b></label>
            <select class="form-control" id="fri">
              <option value="" disabled="disabled" selected="selected">.....เลือกผู้ร่วมเดินทาง.....</option>
              @foreach($users as $row)
              <option value="{{$row['Nick_name']}}">{{$row['NN']}}</option>
              @endforeach
            </select>
            <button type="button" class="btn btn-info form-control" id="addfri"><i class="fa fa-plus-square" aria-hidden="true"></i> เพิ่มผู้ร่วมเดินทาง</button>
        </div>
    </div>
    <hr>

    <button type="submit" class="registerbtn">สร้างรายงาน</button>
  
</form>

</div>
</div>
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
    //datepicker
    $(function(){
       $("#dateInputStart").datepicker({
           dateFormat: 'yy-mm-dd'
       });
       $("#dateInputEnd").datepicker({
           dateFormat: 'yy-mm-dd'
       });
    });

    $(document).ready(function(){
      $("#addfri").click(function(){
          $('#buddy').val(function(_,v){
            return v + fri.value +" ";
          })
      });
    });

    $("#danger-alert").fadeTo(2000, 500).slideUp(500, function(){
			$("#success-alert").slideUp(500);
		});
    </script>
@endsection