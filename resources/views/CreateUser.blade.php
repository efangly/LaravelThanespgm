@extends('Master')
@section('title','Thanes Programmer : Create User')
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
  <form action="/AddUser/CreateUser/Save" method="POST">
    {{csrf_field()}}
    <h1>Register</h1>
    <p>กรอกข้อมูลให้ครบถ้วน</p>
    <hr>
    <div class="row">
        <div class="col-md-4">
            <label><b>ชื่อ</b></label>
            <input type="text" placeholder="Enter Name" name="firstname" required>

            <label><b>UserName</b></label>
            <input type="text" placeholder="Enter UserName" name="username" required>

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" required>
        </div>
        <div class="col-md-4">
            <label><b>นามสกุล</b></label>
            <input type="text" placeholder="Enter Lastname" name="lastname" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="pass" required>

            <label><b>ชื่อเล่น</b></label>
            <input type="text" placeholder="Enter Nickname" name="nickname" required>
        </div>
        <div class="col-md-4">
            <label><b>UserID</b></label>
            <input type="text" placeholder="Enter UserID" name="userid" required>

            <label><b>ตำแหน่ง</b></label>
            <select class="form-control" name="sine">
                <option value="" disabled="disabled" selected="selected">.....เลือกตำแหน่ง.....</option>
                <option value="Senior Programmer">Senior Programmer</option>
                <option value="Programmer">Programmer</option>
            </select>
            <br>
            <label><b>สถานะผู้ใช้</b></label>
            <select class="form-control" name="status">
                <option value="" disabled="disabled" selected="selected">.....เลือกสถานะ.....</option>
                <option value="Admin">Admin</option>
                <option value="User">User</option>
            </select>
            
        </div>
    </div>
    <hr>

    <button type="submit" class="registerbtn">Register</button>
  
</form>

</div>
</div>
@endsection