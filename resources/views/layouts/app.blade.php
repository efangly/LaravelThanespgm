<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="/css/sb-admin.css" rel="stylesheet">
    <!-- DateTimePicker -->
    <link rel="stylesheet" media="all" type="text/css" href="/datepicker/jquery-ui.css" />
    <link rel="stylesheet" media="all" type="text/css" href="/datepicker/jquery-ui-timepicker-addon.css" />
    <!--===============================================================================================-->
    	<link rel="icon" type="image/png" href="/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="/vendor/bootstrap/css/bootstrap.min.css">
    	<link rel="stylesheet" type="text/css" href="/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="/vendor/animate/animate.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="/css/util.css">
    <!--===============================================================================================-->
      <!-- Icons font CSS-->
      <link href="/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
      <!-- Vendor CSS-->
      <link href="/vendor/select2/select2.min.css" rel="stylesheet" media="all">
      <link href="/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
      <style media="screen">
        .btn-close {
          background-color: #dc3545;
          border: none;
          color: white;
          padding: 5px 16px;
          font-size: 16px;
          cursor: pointer;
          border-radius: 0.50rem;
        }
        .btn-pdf {
          background-color: #8B4513;
          border: none;
          color: white;
          padding: 5px 16px;
          font-size: 16px;
          cursor: pointer;
          border-radius: 0.50rem;
        }
        .btn-pdf1 {
          background-color: #DAA520;
          border: none;
          color: white;
          padding: 5px 16px;
          font-size: 16px;
          cursor: pointer;
          border-radius: 0.50rem;
        }
        .btn-edit {
          background-color: #28a745;
          border: none;
          color: white;
          padding: 5px 16px;
          font-size: 16px;
          cursor: pointer;
          border-radius: 0.50rem;
        }
        .btn-export {
          background-color: #6A5ACD;
          border: none;
          color: white;
          padding: 5px 16px;
          font-size: 16px;
          cursor: pointer;
          border-radius: 0.50rem;
        }
        .bg-headtable {
          background-color: #333366 !important;
        }
        .bg-navbg {
          background-color: #393939 !important;
        }
        .bg-rowstable {
          background-color: #595959 !important;
        }
        .bg-incard {
          background-color: #696969 !important;
        }
        .bg-bgtemplate {
          background-color: #797979 !important;
        }
        table {
          border-collapse: collapse;
          border-radius: 1em;
          overflow: hidden;
        }
        input.largerCheckbox { 
            width: 20px; 
            height: 20px; 
        }
        
      </style>
</head>
<body class="bg-bgtemplate">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light text-white shadow-sm bg-rowstable">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    
                    <h2><img src="/images/bbb.png" class="rounded" alt="Cinque Terre" width="40" height="40">&nbsp;Thanes Programmer</h2>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <h5>ลงชื่อเข้าใช้</h5>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    
</body>
</html>
