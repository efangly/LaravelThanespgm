@extends('Master')
@section('title','Thanes Programmer : Crate Project')
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
    input[type=text], input[type=password] {
    width: 100%;
    padding: 10px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
    }

    input[type=text]:focus, input[type=password]:focus {
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
  <form action="/ProjectManager/Createproject/Save" method="POST">
    {{csrf_field()}}
    <h1>Create Project</h1>
    <p>กรอกข้อมูลให้ครบถ้วน</p>
    <hr>
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-4">
            <label><b>Product Name :</b></label>
            <input type="text" name="ProjectSite" placeholder="พิมพ์ชื่อProduct" required>

            <label><b>โรงพยาบาล : </b></label>
            <input type="text" placeholder="พิมพ์ชื่อโรงพยาบาล" name="Hospital" required>
        </div>
        <div class="col-md-4">
            <label><b><span class="fa fa-calendar"></span> วันที่เริ่มโปรเจค : </b></label>
            <input type="text" placeholder="เลือกวันเริ่มโปรเจค" name="Project_Start" id="dateInputStart" value="" autocomplete="off" required />

            <label><b><span class="fa fa-calendar"> วันสิ้นสุดโปรเจค : </b></label>
            <input type="text" placeholder="เลือกวันสิ้นสุดโปรเจค" name="Project_End" id="dateInputEnd" value="" autocomplete="off" required />
        </div>
    </div>
    <hr>

    <button type="submit" class="registerbtn">Register</button>
  
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
</script>
@endsection