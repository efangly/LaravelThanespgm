@extends('Master')
@section('title','Thanes Programmer : OnSite')
@section('content')
<div class="content-wrapper p-3 mb-2 bg-bgtemplate text-white font-poppins">
  <div class="container-fluid">
<div class="card mb-3 bg-rowstable">
  <div class="card-header">
  <div class="row">
    <div class="col-md-6">
      <h3><i class="fa fa-ambulance"></i> รายงานออกนอกสถานที่</h3>
    </div>
    <div class="col-md-6">
      <div align="right"><a class="btn btn-success btn-lg" href="/Plan/CreatePlan" role="button">
      <i class="fa fa-fw fa-file-text-o"></i>เขียนรายงาน</a></div>
    </div>
  </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
  <div class="table-responsive">
    <table class="table table-bordered table-striped">
      <tr class="bg-headtable">
        <th style="width: 10%"><h5 align="center">PlanID</h5></th>
        <th style="width: 25%"><h5 align="center">สถานที่</h5></th>
        <th style="width: 30%"><h5 align="center">วัตถุประสงค์</h5></th>
        <th style="width: 20%"><h5 align="center">ผู้ร่วมเดินทาง</h5></th>
        <th style="width: 15%"><h5 align="center">แก้ไขล่าสุด</h5></th>
      </tr>
      @foreach($plans as $row)
      <tr class="bg-rowstable">
        <td align="center">{{$row['ID_Plan']}}</td>
        <td>{{$row['Location']}}</td>
        <td>{{$row['Plan']}}</td>
        <td>{{$row['Plan_Name']}}</td>
        <td align="center">{{$row['Lastmodify']}}</td>
      </tr>
      @endforeach
    </table>
    {{ $plans->links() }}
    </div>
  </div>
</div>

</div>
</div>

@endsection
