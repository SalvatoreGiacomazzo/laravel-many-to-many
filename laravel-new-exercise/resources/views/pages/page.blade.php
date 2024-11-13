@extends('layouts.layout')

@section('main-content')

<div class="d-flex flex-column justify-content-center align-items-center">


    <img src="https://www.travelers.com/iw-images/business-insights/topics/cyber/large/5_types_cyber_criminals_listical_large.jpg" alt="Immagine Cyber Criminals" class="img-fluid">


    <a href="{{ route('login') }}" class="btn btn-warning btn-primary">
  Login
</a>
<a href="{{ route('register') }}" class="btn btn-success btn-primary">
   Register
</a>

</div>

@endsection


