@extends('layouts.app')
@section('content')
<head>

<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<div class="container">
	<div class="row">
		<div class="col-6">
			<div class="card" style="">
				<div class="card-body">
				    <h5 class="card-title">Voted</h5>
				    <h6 class="card-subtitle mb-2 text-muted">No. of students</h6>
				    @if(isset($count))
				    <p class="card-text">{{ $count }}</p>
				    @endif
				</div>
			</div>
		</div>

		<div class="col-6">
			<div class="card" style="">
				<div class="card-body">
				    <h5 class="card-title">To vote</h5>
				    <h6 class="card-subtitle mb-2 text-muted">No. of students</h6>
				     @if(isset($left))

				    <p class="card-text"> {{ $left }}</p>
				    @endif
				</div>
			</div>

		</div>

	</div>
	<br>

	<div class="row">
		<div class="col-4">
		      <a href="{{ route('get_results') }}" class="btn btn-primary submit">See Results</a>
		  </div>
		<div class="col-4">
			<a class="btn btn-primary submit" href="{{ route('view_users') }}">View all users</a>
		</div>
		<div class="col-4">
		@if(isset($status) && $status == 'closed')
			<form action="{{ route('change') }}" method="POST">
			@csrf
					<div class="form-group">
					    <label class="post-label" for="">Open Elections</label>
					    <input style="width: 100% !important" type ='text' class="form-control" name="open" id="" placeholder="Type 'Open' to open elections">
					</div><br>
					<div class="form-group">
					    <input type="submit" class="btn btn-primary submit" value="Change status">
					</div>

			</form>

		@elseif(isset($status) && $status == 'open')
			<p>Elections are open</p>
		@else
			<p></p>
		@endif
		</div>
		<br>
	</div>

	<form action="{{ route('results') }}" method="POST">
		@csrf
		@if(isset($status) && $status == 'open')

		<div class="form-row">
			<div class="form-group col-md-6">
			    <label class="post-label" for="release">Release Results</label>
			    <input type ='text' class="form-control" name="available" id="release" placeholder="Type 'Release Results' to release">
			    <small id="emailHelp" class="form-text text-muted">This allows everyone view the scores</small>
			    <input type="submit" class="btn btn-primary submit" value="Release">
			</div>

		</div>

		@else
			<p></p>
		@endif
	</form>


<br><br>
	<div class="row">

		<div class="col-md-8">
			<h5 class='office-head'>Add a candidate</h5>
			<form action="{{ route('add_candidate') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
				    <label for="fname">First name</label>
				    <input type="text" class="form-control" id="fname" name = 'fname' placeholder="First Name" required>
				</div>

			    <div class="form-group">
				    <label for="lname">Last name</label>
				    <input type="text" class="form-control" id="lname" name = 'lname' placeholder="Last Name" required>
			  	</div>

			  	<div class="form-group">
					<label for="exampleFormControlFile1">Candidate Headshot</label>
					<input type="file" class="form-control-file" name="pic" id="exampleFormControlFile1" required>
				</div>

				<div class="select">
	                <select name="position" id="type" required>
	                    <option value="Chairman">Chairman</option>
	                    <option value="Chairlady">Chairlady</option>
	                    <option value="IT Rep">IT Rep</option>
	                    <option value="Clubs Rep">Clubs Rep</option>
	                    <option value="Academic Rep">Academic Rep</option>
	                    <option value="Entertainment Rep">Entertainment Rep</option>
	                    <option value="Secretary">Secretary</option>
	                    <option value="Sports Rep">Sports Rep</option>
	                    <option value="Treasurer">Treasurer</option>
	                    <option value="Wellness Rep">Wellness Rep</option>
	                    <option value="Honor Council">Honor Council</option>
	                </select>
           		</div>
                <br><br>
                <center>
					<button type="submit" class="btn btn-primary submit">Submit</button>
				</center>
			</form>
		</div>
	</div>

	<br><br>
	<div class="row">

		<table class="table table-striped table-warning">
    		<thead>
        		<tr>
        			<th>Serial</th>
		            <th>Email</th>
		            <th>Position</th>
		        </tr>
		    </thead>
		    @if(isset($runners))
		    <tbody>
		    	@php
		    	$i = 0
		    	@endphp
		        @foreach($runners as $run)
		        		@php $i++; @endphp
			        <tr class="">
			        	<td>@php echo $i; @endphp</td>
			            <td>{{ $run->first_name . ' ' . $run->last_name }}</td>
			            <td>{{ $run->position }}</td>

			       	</tr>

		       	@endforeach
		    </tbody>
		    @endif
		</table>
	</div>
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
            <p class="copyright-text">Copyright &copy; 2019 All Rights Reserved by 
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