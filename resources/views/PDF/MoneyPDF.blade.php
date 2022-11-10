@extends('PDF.MasterPDF')
@section('title','Thanes Programmer : การเงิน')
@section('content')
    <table border="1">
      <thead>
      <tr>
        <th style="width: 12%" align="center">วันที่ปฎิบัติงาน</th>
        <th style="width: 52%" align="center">สถานที่ปฎิบัติงาน</th>
        <th style="width: 8%" align="center">จำนวนเงิน</th>
        <th style="width: 7%" align="center">ค่าที่พัก</th>
        <th style="width: 7%" align="center">ค่าอาหาร</th>
        <th style="width: 7%" align="center">ค่าน้ำมัน</th>
        <th style="width: 7%" align="center">ค่าอื่นๆ</th>
      </tr>
      </thead>
      @foreach($DTplans as $row)
      <tr nobr="true">
        <td style="width: 12%" align="center">{{ date("d/m/Y", strtotime($row['Date_PlanS'])) }}</td>
        <td style="width: 52%">  {{$row['Detial_Plan']}}  {{$row['Location_Plan']}}</td>
        <td style="width: 8%" align="center">{{$row['Money_Total']}}</td>
        <td style="width: 7%" align="center">0</td>
        <td style="width: 7%" align="center">0</td>
        <td style="width: 7%" align="center">0</td>
        <td style="width: 7%" align="center">{{$row['Money_Total']}}</td>
      </tr>
      @endforeach
    </table>   
@endsection
