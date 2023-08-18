<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Army of the Night - Edit Genre</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/darkly/bootstrap.min.css"
        integrity="sha384-nNK9n28pDUDDgIiIqZ/MiyO3F4/9vsMtReZK39klb/MtkZI3/LtjSjlmyVPS3KdN" crossorigin="anonymous">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">-->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Playfair+Display:ital@1&display=swap"
        rel="stylesheet">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/css/styles.css">
</head>

<body>

    <div class="bs-component">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand " href="{{url('admin')}}">Army of the night</a>


                <div class=" d-flex justify-content-between align-items-center " id="navbarColor02">
                    <ul class="navbar-nav me-auto  ">
                        <li class="nav-item">
                            <a class="nav-link " href="{{url('admin/users')}}">Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Reviews</a>
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

      

        <div class="container text-center">

            
            <div class="shadow p-3 mb-5 mt-4 rounded">

                <a class="btn btn-lg btn-outline-primary mt-4" href="{{url('admin/genres')}}">Back</a>

                <h1 class="text-center add mt-5"style="font-size:40px">Edit Genre</h1>
            <hr class="mt-4" style="background-color: whitesmoke">

            @if (session()->has('message'))


            <div class="alert alert-dismissible alert-success text-center" style="style="margin-top:150px;width:370px;margin-left: auto;margin-right: 40px;font-size:18px;font-family: Montserrat, sans-serif;">
                {{session()->get('message')}} 
                <button type="button" class="btn-close" data-bs-dismiss="alert" style="float:end"> 
                    X
                 </button>
            </div>
    
    
    
            @endif

            <form action="{{url('admin/genres/save-edit-genre/'.$genre->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mt-5">
                    <label for="name" class="mb-3">Genre name</label>
                    <input type="text" name="genre_name" id="inputs" value="{{$genre->genre_name}}" placeholder="Type a name" style="color:black" required>
                </div>
                
        
                <div class="mt-3">
                    <button type="submit" class="btn btn-outline-success btn-add mt-3" type="button">Edit genre</button>
                </div>


            </form>
        </div>
    </div>

    </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>