<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Army of the night</title>

  <!-- JQUERY -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
    integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/darkly/bootstrap.min.css"
    integrity="sha384-nNK9n28pDUDDgIiIqZ/MiyO3F4/9vsMtReZK39klb/MtkZI3/LtjSjlmyVPS3KdN" crossorigin="anonymous">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">-->

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Playfair+Display:ital@1&display=swap"
    rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="/css/styles.css">

  <!--DATATABLES CSS-->

  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


  <!-- Scripts -->
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])

  <style>
    .navbar {
      height: 125px;
      margin-right: 10px;
    }

    .navbar-brand {
      font-size: 45px;
    }

    thead tr th {
      background: #373B44;
      /* fallback for old browsers */
      background: -webkit-linear-gradient(to right, #4286f4, #373B44);
      /* Chrome 10-25, Safari 5.1-6 */
      background: linear-gradient(to right, #4286f4, #373B44);
      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      margin-top: 100px;
      color: white;
    }

    #table_filter {
      margin-bottom: 20px;
      margin-right: 120px;
      color: white;
    }
    #table_length{
      color:white;
    }
    .table-bordered display dataTable no-footer{
      font-size: 40px;
    font-family: 'Montserrat', sans-serif;
    }
    .dataTables_info{
      font-size: 20px;
      color: blue;
    }
    .dataTables_paginate{
      font-size: 18px;
      
    }
    .sorting {
      width: 160px;
    }
  </style>

</head>

<body>

  <div class="bs-component">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand " href="#">Army of the night</a>


        <div class=" d-flex justify-content-between align-items-center " id="navbarColor02">
          <ul class="navbar-nav me-auto  ">
            <li class="nav-item">
              <a class="nav-link " href="{{url('admin/users')}}">Users</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('admin/reviews')}}">Reviews</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('admin/bands')}}">Bands</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('admin/genres')}}">Genres</a>
            </li>


          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ms-auto">
            <!-- Authentication Links -->
            @guest
            @if (Route::has('login'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @endif

            @if (Route::has('register'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif
            @else
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" v-pre>
                <button type="button" class="btn btn-info btn-lg">{{ Auth::user()->name }}</button>

              </a>

              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>

              </div>
            </li>
            @endguest
          </ul>


        </div>
      </div>
    </nav>
    

  