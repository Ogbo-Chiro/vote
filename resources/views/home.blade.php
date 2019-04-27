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
 
@if(auth()->user()->isAdmin == 1)
    <div class='admin-welcome'>
        <br><br>

        <p class="message">Hello Administrator, go to your office</p>
    <a class='office' href="{{route('esc')}}">here</a>. 

</div><br>
@else
<div class='welcome'>Welcome to The Booth!</div>
<center>

<a href="{{ route('candidates') }}" class="btn btn-primary submit">See candidates</a>

</center>
@endif



@if(isset($status) && $status == 'open')

        @if(auth()->user()->isVoted == 0 && auth()->user()->isAdmin != 1)
        <div class="container">
            <div class="wrapper">
            <form action="{{ route('vote') }}" method="POST">
                @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <div class="select">
                
                <label class="post-label">Chairman</label><br>
                <select name="chairman" id="type" required>
                    <option value="none">N/A</option>
                    @foreach($chairmen as $chairman)
                    <option value="{{ $chairman->id }}">{{ $chairman->first_name}} {{ $chairman->last_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
                <br><br>
                    <div class="form-group col-md-6">

        <div class="select">
                        <label class="post-label">Chairlady</label><br>
                <select name="chairlady" id="type" required>
                                <option value="none">N/A</option>

                    @foreach($chairladies as $chairlady)
                    <option value="{{ $chairlady->id }}">{{ $chairlady->first_name}} {{ $chairlady->last_name }}</option>
                    @endforeach
                </select>

            </div>
        </div>
        </div>
                <br>
                <div class="form-row">

                    <div class="form-group col-md-6">
                        <div class="select">

                            <label class="post-label">IT Rep</label><br>
                            <select name="itrep" id="type" required>

                                <option value="none">N/A</option>

                                @foreach($itreps as $itrep)
                                <option value="{{ $itrep->id }}">{{ $itrep->first_name}} {{$itrep->last_name }}</option>
                                @endforeach
                            </select>

                        </div>

                    </div>

                    <div class="form-group col-md-6">
                        <div class="select">

                            <label class="post-label">Clubs/Societies Rep</label><br>
                            <select name="clubsrep" id="type" required>

                                <option value="none">N/A</option>

                                @foreach($clubsreps as $clubsrep)
                                <option value="{{ $clubsrep->id }}">{{ $clubsrep->first_name}} {{$clubsrep->last_name }}</option>
                                @endforeach
                            </select>

                        </div>

                    </div>

                </div>
                <br>
                <div class="form-row">

                    <div class="form-group col-md-6">
                        <div class="select">

                            <label class="post-label">Academic Rep</label><br>
                            <select name="acadsrep" id="type" required>

                                <option value="none">N/A</option>

                                @foreach($acadsreps as $acadsrep)
                                <option value="{{ $acadsrep->id }}">{{ $acadsrep->first_name}} {{$acadsrep->last_name }}</option>
                                @endforeach
                            </select>

                        </div>

                    </div>

                    <div class="form-group col-md-6">
                        <div class="select">

                            <label class="post-label">Entertainment Rep</label><br>
                            <select name="entrep" id="type" required>

                                <option value="none">N/A</option>

                                @foreach($entreps as $entrep)
                                <option value="{{ $entrep->id }}">{{ $entrep->first_name}} {{$entrep->last_name }}</option>
                                @endforeach
                            </select>

                        </div>

                    </div>

                </div>
                <br>
                        <div class="form-row">

                    <div class="form-group col-md-6">
                        <div class="select">

                            <label class="post-label">Secretary</label><br>
                            <select name="secretary" id="type" required>

                                <option value="none">N/A</option>

                                @foreach($secretaries as $secretary)
                                <option value="{{ $secretary->id }}">{{ $secretary->first_name}} {{$secretary->last_name }}</option>
                                @endforeach
                            </select>

                        </div>

                    </div>

                    <div class="form-group col-md-6">
                        <div class="select">

                            <label class="post-label">Sports Rep</label><br>
                            <select name="sportsrep" id="type" required>

                                <option value="none">N/A</option>

                                @foreach($sportsreps as $sportsrep)
                                <option value="{{ $sportsrep->id }}">{{ $sportsrep->first_name}} {{$sportsrep->last_name }}</option>
                                @endforeach
                            </select>

                        </div>

                    </div>

                </div>
                <br>
                        <div class="form-row">

                    <div class="form-group col-md-4">
                        <div class="select">

                            <label class="post-label">Treasurer</label><br>
                            <select name="treasurer" id="type" required>

                                <option value="none">N/A</option>

                                @foreach($treasurers as $treasurer)
                                <option value="{{ $treasurer->id }}">{{ $treasurer->first_name}} {{$treasurer->last_name }}</option>
                                @endforeach
                            </select>

                        </div>

                    </div>

                    <div class="form-group col-md-4">
                        <div class="select">

                            <label class="post-label">Wellness Rep</label><br>
                            <select name="wellnessrep" id="type" required>

                                <option value="none">N/A</option>

                                @foreach($wellnessreps as $wellnessrep)
                                <option value="{{ $wellnessrep->id }}">{{ $wellnessrep->first_name}} {{$wellnessrep->last_name }}</option>
                                @endforeach
                            </select>

                        </div>

                    </div>
                    <div class="form-group col-md-4">
                        <div class="select">

                            <label class="post-label">Honor Council</label><br>
                            <select name="honorcouncil" id="type" required>

                                <option value="none">N/A</option>

                                @foreach($honorcouncils as $honorcouncil)
                                <option value="{{ $honorcouncil->id }}">{{ $honorcouncil->first_name}} {{$honorcouncil->last_name }}</option>
                                @endforeach
                            </select>

                        </div>

                    </div>

                </div>
                <br>


                <center>
              <button type="submit" class="btn btn-primary submit">Vote</button>
          </center>
            </form>

        </div>

        </div>
        @elseif(auth()->user()->isVoted == 1 && auth()->user()->isAdmin != 1)

        <br><br>
        <center>
        <p>Thanks for your participation! You have already voted. You will be notified when the results are released</p>
        </center>


        @endif
        </div>



@elseif(isset($status) && $status == 'closed')
<div style="height:50px">
    <center>
        <br>
    <p class="message">Elections are yet to open! See candidates here!</p>
</center>

</div>

@endif <!--if statement checking whether elections open-->


@if(isset($status) && $status == 'ended')
<center>
      <a href="{{ route('get_results') }}" class="btn btn-primary submit">See Results</a>
  </center>

@endif
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
              <p style="color:#8E4A49">esc@alastudents.org</p>
            </ul>
          </div>
        </div>
      </div>
</footer>

@endsection
