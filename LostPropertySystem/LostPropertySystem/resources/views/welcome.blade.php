@extends('layouts.layout')

@section('content')



    <div class="content">
        <div class="title m-b-md">
           Leeds's  Find-the-Lost property website
        </div>
        <h1>Online Lost Property Reporting Service accredited by UK Police</h1>



            <div class="jumbotron">
  <h1 class="display-3">Filo System!</h1>
  <p class="lead">We made this website so people of Leeds can find their lost properties. This is a community effort accredited by UK Police
  .</p>
  <hr class="my-4">

  <p class="lead">
  <a class="btn btn-primary btn-lg" href="{{ route('items') }}" role="button">View Lost property</a>
  <a class="btn btn-primary btn-lg" href="{{ route('item.create') }}" role="button">add item</a>
  </p>
</div>








        <p class="mssg">{{ session('mssg') }}</p>
        <a href="/Items/create"></a>
    </div>



</div>
@endsection
