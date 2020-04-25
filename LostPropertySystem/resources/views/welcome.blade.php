@extends('layouts.layout')

@section('content')
<div class="flex-center position-ref ">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content">
        <!-- <img src="/img/pizza-house.png" alt="pizza house logo"> -->
        <div class="title m-b-md">
           Leeds's  Find-the-Lost property website
        </div>
        <h1>Online Lost Property Reporting Service accredited by UK Police</h1>



            <div class="jumbotron">
  <h1 class="display-3">Hello, world!</h1>
  <p class="lead">We made this website so people of Leeds can find their lost properties. This is a community effort because you regeister This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <p class="lead">
  <a class="btn btn-primary btn-lg" href="{{ route('items') }}" role="button">View Lost property</a>
  <a class="btn btn-primary btn-lg" href="{{ route('item.create') }} " role="button">add item</a>
  </p>
</div>








        <p class="mssg">{{ session('mssg') }}</p>
        <a href="/Items/create"></a>
    </div>



</div>
@endsection
