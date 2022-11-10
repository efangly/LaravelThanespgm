@extends('PDF.MasterPDF')
@section('title','Thanes Programmer : HR')
@section('content')
    <table border="1">
      <thead>
      <tr>
        <th style="width: 10%" align="center">วันที่</th>
        <th style="width: 8%" align="center">เวลาเข้างาน</th>
        <th style="width: 8%" align="center">เวลาออกงาน</th>
        <th style="width: 17%" align="center">สถานที</th>
        <th style="width: 29%" align="center">วัตถุประสงค์</th>
        <th style="width: 18%" align="center">รายชื่อผู้เข้าร่วมปฎิบัติงาน</th>
        <th style="width: 10%" align="center">ผู้อนุมัติ</th>
      </tr>
      </thead>
      @foreach($DTplans as $row)
      <tr nobr="true">
        <td style="width: 10%" align="center">{{ date("d/m/Y", strtotime($row['Date_PlanS'])) }}</td>
        <td style="width: 8%" align="center">08:00</td>
        <td style="width: 8%" align="center">17:00</td>
        <td style="width: 17%">  {{$row['Location_Plan']}}</td>
        <td style="width: 29%">  {{$row['Detial_Plan']}}</td>
        <td style="width: 18%">  {{$row['Plan_Name_All']}}</td>
        <td style="width: 10%" align="center"></td>
      </tr>
      @endforeach
    </table>   
@endsection
