@extends('layouts.layout')

@section('main-content')

<h1>Details of Wanted Person</h1>

<div class="card" style="width: 18rem;">
    <img class="card-img-top" src="https://wallpapercave.com/wp/wp7819542.jpg" alt="Card image cap">
    <div class="card-body">
      <h3 class="card-title"> {{$wanted->name}} {{$wanted->last_name}}</h3>
      <p class="card-text"><strong>Wanted for the crime of:</strong> {{$wanted->felony}}
        @forelse($wanted->felonies as $felony)
        <span>{{ $felony->name }}</span><br>
    @empty
        <span>No felonies assigned</span>
    @endforelse
  </p>


      <p class="card-text"><strong>In the State of:</strong>{{$wanted->nationality}}</p>
      <p class="card-text"><strong>Most Used Device:</strong>{{$wanted->device->device_type}}</p>
      <a href="{{route('admin.wanted.home')}}" class="btn btn-dark">Go back</a>
    </div>
  </div>

@endsection
