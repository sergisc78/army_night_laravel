@include('admin.navbar');



<div class="text-center dashboard-title justify-content-center align-content-center">
    <h1>Admin dashboard</h1>
  
    <p class="mt-3">Choose an option</p>
    <div class="buttons mt-5">
      <a href="{{url('admin/users')}}" class="btn btn-lg btn-outline-primary">Users</a>
      <a href="{{url('admin/reviews')}}" class="btn btn-lg  btn-outline-success">Reviews</a>
      <a href="{{url('admin/bands')}}" class="btn btn-lg  btn-outline-info">Bands</a>
      <a href="{{url('admin/genres')}}" class="btn btn-lg  btn-outline-warning">Genres</a>
    </div>
  
  </div>

