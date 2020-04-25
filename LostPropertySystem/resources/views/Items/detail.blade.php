@extends('layouts.layout')

@section('content')
<h2>{{ $item->category }}</h2>
<p>{{ $item->description }}</p>
<table class="table table-stripped">

    <tr>
        <th>Category</th>
        <td>{{ $item->category }}</td>
    </tr>
    <tr>
        <th>Color</th>
        <td>{{ $item->color }}</td>
    </tr>
    <tr>
        <th>Place</th>
        <td>{{ $item->place }}</td>
    </tr>

    <tr>
        <th>Date</th>
        <td>{{ date('F d, Y', strtotime($item->date)) }}</td>
    </tr>

</table>

<div class="gallery">
    <div class="row text-center">
      @for($i=0, $count = count($images); $i < $count; $i++)
            <!--<div style="float: left; margin: 5px; padding: 5px;"><img height="100" src="{{ asset('img/items') }}/{{ $images[$i]->file_name }}"></div>-->
            <div class="col"><img height="100" src="{{ asset('img/items') }}/{{ $images[$i]->file_name }}"></div>
      @endfor
    </div>
</div>
<a class="btn btn-primary btn-lg"  href="{{ route('item.report') }} " role="button">Claim item</a>

@endsection
