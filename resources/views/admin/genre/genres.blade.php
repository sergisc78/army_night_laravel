<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Army of the Night - Genres</title>

  <!-- JQUERY -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
    integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- BOOTSWATCH-->

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/darkly/bootstrap.min.css"
    integrity="sha384-nNK9n28pDUDDgIiIqZ/MiyO3F4/9vsMtReZK39klb/MtkZI3/LtjSjlmyVPS3KdN" crossorigin="anonymous">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">-->

  <!-- GOOGLE FONTS -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Playfair+Display:ital@1&display=swap"
    rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">

  <!-- CSS STYLES-->
  <link rel="stylesheet" href="/css/styles.css">

  <!--DATATABLES CSS-->

  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


  <style>
    table thead {
      background: #373B44;
      /* fallback for old browsers */
      background: -webkit-linear-gradient(to right, #4286f4, #373B44);
      /* Chrome 10-25, Safari 5.1-6 */
      background: linear-gradient(to right, #4286f4, #373B44);
      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      margin-top: 100px;
    }

    #table_filter {
      margin-bottom: 20px;
      margin-right: 120px;
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
        <a class="navbar-brand " href="{{url('admin')}}">Army of the night</a>


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





    <div class="container" id="allbands">

      <a href="{{url('admin/genres/add-genre')}}" class="btn btn-lg btn-outline-primary mt-3 mb-4">Add a genre</a>

      <div class="row">

        <div class="col-lg-12">
          <table id="table" class="table table-bordered display" width="100%">



            <thead>
              <tr>
                <th>ID</th>
                <th>Genre</th>

                <th>Edit Genre</th>
                <th>Delete Genre</th>

              </tr>
            </thead>
            <tbody>

              @foreach ($genre as $genres)


              <tr>
                <td>{{$genres->id}}</td>
                <td>{{$genres->genre_name}}</td>

                {{--EDIT LINK--}}
                <td><a class="btn btn-outline-info edit"
                    href="{{url('/admin/genres/edit-genre/'.$genres->id)}}">EDIT</a></td>

                {{--DELETE BAND --}}


                <td><button class="btn btn-outline-danger delete"
                    data-id={{'/admin/genres/'.$genres->id}}>DELETE</button></td>

              </tr>
              @endforeach
            </tbody>
          </table>

        </div>

        <!-- BOOTSTRAP JS-->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
        </script>


        <!-- DATATABLES SCRIPT-->
        <script>
          $(document).ready(function () {
                    $('#table').DataTable();
});
        </script>

        <!-- DATATABLES AND JQUERY -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
          integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <!--DATATABLES JS -->

        <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>


        <!-- SWEET ALERT SCRIPT -->

        <script>
          $('.delete').on('click', function (e) {
              e.preventDefault();
              const id = $(this).attr('data-id');
              swal({
                title: 'Are you sure you want to delete this genre?',
                text: "If you are, delete this genre!",
                icon: 'warning',
                buttons: true,
                dangerMode: true,
                }).then(function(value) {
                  if (value) {
                    window.location.href = id;
                    }
                        })
                    });
    
        </script>


</body>

</html>