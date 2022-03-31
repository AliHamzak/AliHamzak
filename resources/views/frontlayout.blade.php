<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('../bs5/bootstrap.min.css') }}">
    <script src="{{url('../vendor/jquery/jquery.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    <title>Home</title>
</head>
<body>
      {{-- navbar --}}
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
          <a class="navbar-brand" href="{{url('/homes')}}">Portal A</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
              <a class="nav-link" aria-current="page" href="#">Services</a>
              <a class="nav-link" href="#">Gallery</a>
              <a class="nav-link" href="{{url('page/about_us')}}">About Us</a>
              <a class="nav-link" href="{{url('page/contact_us')}}">Contact Us</a>
              @if(Session::has('customerlogin')){
                <a class="nav-link btn btn-sm" href="{{url('customer/add-testimonial')}}">Testimonial</a>
                <a class="nav-link" href="{{url('logouts')}}">Logout</a>
                <a class="nav-link btn btn-sm btn-primary" href="{{url('booking')}}">Booking</a>
              }@else
              <a class="nav-link" href="{{url('logins')}}">Login</a>
              <a class="nav-link" href="{{url('/registers')}}">Register</a>
              <a class="nav-link btn btn-sm btn-primary" href="#">Booking</a>
              @endif
            </div>
          </div>
        </div>
      </nav>
      {{-- end navbar --}}
      @yield('content')
</body>
</html>