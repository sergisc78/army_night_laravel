<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Army of the Night - Add Review </title>
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


  <link rel="stylesheet" href="/css/styles.css">
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

        <a href="{{url('admin/reviews/')}}" class="btn btn-lg btn-outline-primary mt-2 mb-4">Back</a>

        <h1 class="text-center add mt-5" style="font-size:40px">Add a review</h1>
        <hr class="mt-4" style="background-color: whitesmoke">

        @if (session()->has('message'))


        <div class="alert alert-dismissible alert-success text-center" style="style="
          margin-top:150px;width:370px;margin-left: auto;margin-right: 40px;font-size:18px;font-family: Montserrat,
          sans-serif;">
          {{session()->get('message')}}
          <button type="button" class="btn-close" data-bs-dismiss="alert" style="float:end">
            X
          </button>
        </div>
        <script>
          setTimeout(function() {
              window.location.href = "/admin/reviews"
          }, 3000); // 5 seconds
        </script>



        @endif

        <form action="{{url('admin/reviews/saveReview')}}" method="post" enctype="multipart/form-data">
          @csrf

          {{-- SELECT STYLE --}}

          <div class="mt-5">
            <label for="genre_name">Style</label>
            <br>

            <select name="genre_name" id="select" style="width: 300px" class="custom-select">

              <option> -- Select Style-- </option>
              @foreach ($genre as $genres)
              <option value="{{$genres->id}}">{{$genres->genre_name}}</option>
              @endforeach
            </select>
          </div>

          {{-- SELECT BAND --}}

          <div class="mt-5">
            <label for="band_name">Band</label>
            <br>


            <select name="band_name" id="select" style="width: 300px" class="custom-select">
              <option> -- Select Band -- </option>
              @foreach ($band as $bands)
              <option value="{{$bands->id}}">{{$bands->band_name}}</option>
              @endforeach
            </select>

          </div>

          {{-- SELECT USER --}}

          <div class="mt-5">
            <label for="name">Author</label>
            <br>


            <select name="user_id" id="select" style="width: 300px" class="custom-select">
              <option> -- Select User -- </option>
              @foreach ($user as $users)
              <option value="{{$users->id}}">{{$users->name}}</option>
              @endforeach
            </select>

          </div>

         

          <div class="mt-5">
            <label for="name">Album</label>
            <input type="text" name="album_title" id="inputs" placeholder="Type a name" style="color:black" required>
          </div>



          <div class="mt-5">
            <label for="name">Release Year</label>
            <input type="text" name="album_year" id="inputs" placeholder="Type a year" style="color:black" required>
          </div>



          <div class="mt-5">
            <label for="name">Internet link</label>
            <input type="text" name="album_link" id="inputs" placeholder="Paste the link" style="color:black" required>
          </div>
          <div class="mt-5">
            <label for="name">Cover</label>
            <br>
            <input type="file" name="album_image" id="band_image">
          </div>
          <div class="mb-3 mt-3">
            <label for="" class="form-label">Review</label>
            <textarea class="form-control" name="album_review" id="" rows="20"></textarea>
          </div>
          <div class="mt-3">
            <button type="submit" class="btn btn-outline-success btn-add mt-4" type="button">Add
              review</button>
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