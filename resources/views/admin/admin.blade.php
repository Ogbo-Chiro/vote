@extends('layouts.app')
@section('content')

<head>

<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<div style="height:100%">
<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="panel panel-default">



            <div class="content">
                <div class="title m-b-md">
                    E-Vote
                </div>

                <div class="links">
                    <a href="{{ route('home') }}">To add users and Candidates</a>
                </div>
            </div>
</div>
</div>
</div>
</div>



<div>
{{ $count }}

</div>

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
            <p class="copyright-text">Copyright &copy; 2017 All Rights Reserved by 
         <a target="blank" href="https://chiro-website.herokuapp.com/index.html">Chiro Awoke Ogbo</a>.
            </p>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="social-icons">
<!--               <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
              <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>    -->
              <p style="color:#8E4A49">esc@africanleadershipacademy.com</p>
            </ul>
          </div>
        </div>
      </div>
</footer>

</div>
@endsection