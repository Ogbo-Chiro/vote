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
    <div class="row">
      <div class="col-6">
      <a class="btn btn-primary submit" href="{{ route('esc') }}">back to Office</a>
      </div>
    </div>
    <br>

  <div class="row">


    <table class="table table-striped table-warning">
        <thead>
            <tr>
              <th>Serial</th>
                <th>Name</th>
                <th>Voted</th>
                <th>id</th>
                <th>Remove</th>
            </tr>
        </thead>
            @if(isset($users))
        <tbody>
          @php
          $i = 0
          @endphp
            @foreach($users as $user)
                @php $i++; @endphp
              <tr>
                <td>@php echo $i; @endphp</td>
                  <td>{{ $user->email }}</td>
                  <td><?php 
                  if($user->isVoted == 1){
                        $status = 'Yes';
                      }
                      else{
                        $status = 'No';
                      }

                      ?>
                  {{ $status }}
                  </td>
                  <td>
                  <form action="{{ route('remove') }}" method="POST">
                    @csrf
                    <input style="border: none; background:transparent !important;" type="text" name="removing" value="{{ $user->id }}" readonly/>
                  </td>
                  <td>
                      <input class="btn btn-alert" type="submit" value="remove">
                    </form>
                  </td>
              </tr>

            @endforeach
        </tbody>
        @endif
    </table>
  </div>

  @endsection