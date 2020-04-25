@extends('layouts.layout')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Lost items List
        </div>

        @foreach($lostitems as $lostitem)
          <div>
            <a href="{{ route('item.show', ["id"=>$lostitem->id]) }}">{{ $lostitem->category }}</a>
          </div>
        @endforeach

    </div>
</div>
@endsection
