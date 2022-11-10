@extends('PDF.MasterPDF')
@section('title','Thanes Programmer : รายงานประจำเดือน')
@section('content')
    <table border="1">
      <thead>
      <tr>
        <th style="width: 20%" align="center">วันที่ปฎิบัติงาน</th>
        <th style="width: 80%" align="center">สถานที่ปฎิบัติงาน</th>
      </tr>
      </thead>
      @foreach($DTplans as $row)
      <tr nobr="true">
        <td style="width: 20%" align="center">{{ date("d/m/Y", strtotime($row['Date_PlanS'])) }}</td>
        <td style="width: 80%">  {{$row['Detial_Plan']}}  {{$row['Location_Plan']}}</td>
      </tr>
      @endforeach
    </table>   
@endsection
