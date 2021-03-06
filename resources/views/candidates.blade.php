@extends('layouts.app')

@section('content')

<head>

<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<div class="container">
    <div class="image">
        <img class="img-responsive" src="{{ asset('ala.png') }}">
    </div>
 <br>
    <div class='welcome'>Candidates</div>
    <br>
    <div class="row">


            @foreach($runners as $run)

        <div class="card col-4">
          <center>
            <br>
          <img style="height: 120px;" class="img-responsive" src="{{ asset('img/tribune.png') }}" alt="">
        </center>
          <div class="card-body">
            <h6 class="card-subtitle mb-2 text-muted" style="font-size: 13px !important;">{{ $run->first_name . ' ' . $run->last_name }}</h6> 
             <h5 class="card-title position-result" style="color: #8E4A49; font-size: 14px !important">{{ $run->position }}</h5>
          </div>
        </div>
            @endforeach

    </div>
    <div class="row">
      <div class="col-6">
        <br><br>
      <a class="btn btn-primary submit" href="{{ route('home') }}">Home</a>
      </div>
    </div>


</div>



<br><br><br><br><br>
  <!-- Site footer -->
    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6>About</h6>
            <p class="text-justify">ESC is ALA's offical elctoral body.</p>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Tags</h6>
            <ul class="footer-links">
              <li><a href="#">Student Government</a></li>
              <li><a href="#">Honor Council</a></li>
            </ul>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Quick Links</h6>
            <ul class="footer-links">
              <li><a href="#">About Us</a></li>
              <li><a href="#">Contact Us</a></li>
            </ul>
          </div>
        </div>
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">Copyright &copy; 2019 All Rights Reserved</p>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="social-icons">
<!--               <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
              <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>    -->
              <p style="color:#8E4A49">esc@alastudents.org</p>
            </ul>
          </div>
        </div>
      </div>
</footer>

@endsection
