@extends('Master')
@section('title','Thanes Programmer : Project Manager')
@section('css')
<link rel="stylesheet" type="text/css" href="/css/jquery.dataTables.min.css">
@endsection
@section('content')
<div class="content-wrapper p-3 mb-2 bg-bgtemplate text-white">
  <div class="container-fluid">
  <div class="card mb-3 bg-incard">
  <form action="/ProjectManager/Updateproject/submit" method="POST">
  {{csrf_field()}}
    <div class="card-header bg-rowstable">
    <div class="row">
      <div class="col-md-6">
        <h3><i class="fa fa-file-pdf-o"></i> Project Manager</h3>
      </div>
      <div class="col-md-6" align="right">
        <button type="submit" class="btn btn-success btn-lg btn-sm" role="button">
        <i class="fa fa-fw fa-file-text-o"></i> บันทึก</button>
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
        <td style="width: 10%" align="center">
          <input class="form-control" type="hidden" name="ID_ProjectDetail" value="{{$row['ID_ProjectDetail']}}">
          <input class="form-control" type="hidden" name="ID_Project" value="{{$row['ID_Project']}}">
          <input type="text" name="interface_Start" id="interfaceStart" value="{{$row['interfacedatestart']}}" size="10" autocomplete="off" required />
        </td>
        <td style="width: 10%" align="center">
          <input type="text" name="interface_End" id="interfaceEnd" value="{{$row['interfacedateend']}}" size="10" autocomplete="off" required />
        </td>
        <td style="width: 20%" align="center"><input type="text" name="interfaceTXT" value="{{$row['interfaceowner']}}" required></td>
        <td style="width: 15%" align="center">
          <select class="form-control-sm" name="InterfaceStatus" id="">
          @if($row['interfacestatus'] == 20)
            <option value="10">  In Progress</option>
            <option value="20" selected>  Complete</option>
          @else
            <option value="10">  In Progress</option>
            <option value="20">  Complete</option>
          @endif
          </select>
        </td>
      </tr>
      <tr>
        <td>รอข้อมูลตัวอย่าง เพื่อทดสอบระบบเบื้องต้น</td>
        <td align="center">
          <input type="text" name="data_Start" id="dataStart" value="{{$row['datadatestart']}}" size="10" autocomplete="off" required />
        </td>
        <td align="center">
          <input type="text" name="data_End" id="dataEnd" value="{{$row['datadateend']}}" size="10" autocomplete="off" required />
        </td>
        <td align="center"><input type="text" name="dataTXT" value="{{$row['dataowner']}}" required></td>
        <td align="center">
          <select class="form-control-sm" name="dataStatus" id="">
          @if($row['datastatus'] == 20)
            <option value="10">  In Progress</option>
            <option value="20" selected>  Complete</option>
          @else
            <option value="10">  In Progress</option>
            <option value="20">  Complete</option>
          @endif
          </select>
        </td>
      </tr>
      <tr>
        <td>ทดสอบการเชื่อมต่อข้อมูล</td>
        <td align="center">
          <input type="text" name="test_Start" id="testStart" value="{{$row['testdatestart']}}" size="10" autocomplete="off" required />
        </td>
        <td align="center">
          <input type="text" name="test_End" id="testEnd" value="{{$row['testdateend']}}" size="10" autocomplete="off" required />
        </td>
        <td align="center"><input type="text" name="testTXT" value="{{$row['testowner']}}" required></td>
        <td align="center">
          <select class="form-control-sm" name="testStatus" id="">
          @if($row['teststatus'] == 20)
            <option value="10">  In Progress</option>
            <option value="20" selected>  Complete</option>
          @else
            <option value="10">  In Progress</option>
            <option value="20">  Complete</option>
          @endif
          </select>
        </td>
      </tr>
      <tr>
        <td>เครื่องเข้าติดตั้ง</td>
        <td align="center">
          <input type="text" name="install_Start" id="installStart" value="{{$row['installdatestart']}}" size="10" autocomplete="off" required />
        </td>
        <td align="center">
          <input type="text" name="install_End" id="installStart" value="{{$row['installdateend']}}" size="10" autocomplete="off" required />
        </td>
        <td align="center"><input type="text" name="installTXT" value="{{$row['installowner']}}" required></td>
        <td align="center">
          <select class="form-control-sm" name="installStatus" id="">
          @if($row['installstatus'] == 20)
            <option value="10">  In Progress</option>
            <option value="20" selected>  Complete</option>
          @else
            <option value="10">  In Progress</option>
            <option value="20">  Complete</option>
          @endif
          </select>
        </td>
      </tr>
      <tr>
        <td>ตั้งค่าและทดสอบอุปกรณ์</td>
        <td align="center">
          <input type="text" name="setting_Start" id="settingStart" value="{{$row['settingdatestart']}}" size="10" autocomplete="off" required />
        </td>
        <td align="center">
          <input type="text" name="setting_End" id="settingEnd" value="{{$row['settingdateend']}}" size="10" autocomplete="off" required />
        </td>
        <td align="center"><input type="text" name="settingTXT" value="{{$row['settingowner']}}" required></td>
        <td align="center">
          <select class="form-control-sm" name="settingStatus" id="">
          @if($row['settingstatus'] == 20)
            <option value="10">  In Progress</option>
            <option value="20" selected>  Complete</option>
          @else
            <option value="10">  In Progress</option>
            <option value="20">  Complete</option>
          @endif
          </select>
        </td>
      </tr>
      <tr>
        <td>ติดตั้ง แก้ไข ตั้งค่า ทดสอบระบบ</td>
        <td align="center">
          <input type="text" name="edit_Start" id="editStart" value="{{$row['editdatestart']}}" size="10" autocomplete="off" required />
        </td>
        <td align="center">
          <input type="text" name="edit_End" id="editEnd" value="{{$row['editdateend']}}" size="10" autocomplete="off" required />
        </td>
        <td align="center"><input type="text" name="editTXT" value="{{$row['editowner']}}" required></td>
        <td align="center">
          <select class="form-control-sm" name="editStatus" id="">
          @if($row['editstatus'] == 20)
            <option value="10">  In Progress</option>
            <option value="20" selected>  Complete</option>
          @else
            <option value="10">  In Progress</option>
            <option value="20">  Complete</option>
          @endif
          </select>
        </td>
      </tr>
      <tr>
        <td>อบรมและทดลองใช้งานจริง</td>
        <td align="center">
          <input type="text" name="train_Start" id="trainStart" value="{{$row['traindatestart']}}" size="10" autocomplete="off" required />
        </td>
        <td align="center">
          <input type="text" name="train_End" id="trainEnd" value="{{$row['traindateend']}}" size="10" autocomplete="off" required />
        </td>
        <td align="center"><input type="text" name="trainTXT" value="{{$row['trainowner']}}" required></td>
        <td align="center">
          <select class="form-control-sm" name="trainStatus" id="">
          @if($row['trainstatus'] == 20)
            <option value="10">  In Progress</option>
            <option value="20" selected>  Complete</option>
          @else
            <option value="10">  In Progress</option>
            <option value="20">  Complete</option>
          @endif
          </select>
        </td>
      </tr>
      <tr>
        <td>ใช้งานจริง</td>
        <td align="center">
          <input type="text" name="using_Start" id="usingStart" value="{{$row['usingdatestart']}}" size="10" autocomplete="off" required />
        </td>
        <td align="center">
          <input type="text" name="using_End" id="usingEnd" value="{{$row['usingdateend']}}" size="10" autocomplete="off" required />
        </td>
        <td align="center"><input type="text" name="usingTXT" value="{{$row['usingowner']}}" required></td>
        <td align="center">
          <select class="form-control-sm" name="usingStatus" id="">
          @if($row['usingstatus'] == 20)
            <option value="10">  In Progress</option>
            <option value="20" selected>  Complete</option>
          @else
            <option value="10">  In Progress</option>
            <option value="20">  Complete</option>
          @endif
          </select>
        </td>
      </tr>
      <tr>
        <td>ส่งงานและตรวจรับ</td>
        <td align="center">
          <input type="text" name="check_Start" id="checkStart" value="{{$row['checkdatestart']}}" size="10" autocomplete="off" required />
        </td>
        <td align="center">
          <input type="text" name="check_End" id="checkEnd" value="{{$row['checkdateend']}}" size="10" autocomplete="off" required />
        </td>
        <td align="center"><input type="text" name="checkTXT" value="{{$row['checkowner']}}" required></td>
        <td align="center">
          <select class="form-control-sm" name="checkStatus" id="">
          @if($row['checkstatus'] == 20)
            <option value="10">  In Progress</option>
            <option value="20" selected>  Complete</option>
          @else
            <option value="10">  In Progress</option>
            <option value="20">  Complete</option>
          @endif
          </select>
        </td>
      </tr>
      <tr>
        <td>Standby</td>
        <td align="center">
          <input type="text" name="standby_Start" id="standbyStart" value="{{$row['standbydatestart']}}" size="10" autocomplete="off" required />
        </td>
        <td align="center">
          <input type="text" name="standby_End" id="standbyEnd" value="{{$row['standbydateend']}}" size="10" autocomplete="off" required />
        </td>
        <td align="center"><input type="text" name="standbyTXT" value="{{$row['standbyowner']}}" required></td>
        <td align="center">
          <select class="form-control-sm" name="standbyStatus" id="">
          @if($row['standbystatus'] == 20)
            <option value="10">  In Progress</option>
            <option value="20" selected>  Complete</option>
          @else
            <option value="10">  In Progress</option>
            <option value="20">  Complete</option>
          @endif
          </select>
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
    /*
    var table = $('#dtTable').DataTable();
    $('#dtTable tbody').on('click', 'tr', function () {
        var data = table.row(this).data();
        alert( 'You clicked on '+data[0]+'\'s row' );
    });*/
    //datepicker
    $(function(){
       $("#interfaceStart").datepicker({
           dateFormat: 'yy-mm-dd'
       });
       $("#interfaceEnd").datepicker({
           dateFormat: 'yy-mm-dd'
       });
       $("#dataStart").datepicker({
           dateFormat: 'yy-mm-dd'
       });
       $("#dataEnd").datepicker({
           dateFormat: 'yy-mm-dd'
       });
       $("#testStart").datepicker({
           dateFormat: 'yy-mm-dd'
       });
       $("#testEnd").datepicker({
           dateFormat: 'yy-mm-dd'
       });
       $("#installStart").datepicker({
           dateFormat: 'yy-mm-dd'
       });
       $("#installEnd").datepicker({
           dateFormat: 'yy-mm-dd'
       });
       $("#settingStart").datepicker({
           dateFormat: 'yy-mm-dd'
       });
       $("#settingEnd").datepicker({
           dateFormat: 'yy-mm-dd'
       });
       $("#editStart").datepicker({
           dateFormat: 'yy-mm-dd'
       });
       $("#editEnd").datepicker({
           dateFormat: 'yy-mm-dd'
       });
       $("#trainStart").datepicker({
           dateFormat: 'yy-mm-dd'
       });
       $("#trainEnd").datepicker({
           dateFormat: 'yy-mm-dd'
       });
       $("#usingStart").datepicker({
           dateFormat: 'yy-mm-dd'
       });
       $("#usingEnd").datepicker({
           dateFormat: 'yy-mm-dd'
       });
       $("#checkStart").datepicker({
           dateFormat: 'yy-mm-dd'
       });
       $("#checkEnd").datepicker({
           dateFormat: 'yy-mm-dd'
       });
       $("#standbyStart").datepicker({
           dateFormat: 'yy-mm-dd'
       });
       $("#standbyEnd").datepicker({
           dateFormat: 'yy-mm-dd'
       });
    });
</script>
@endsection
