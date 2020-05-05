@extends('layouts.layout')

@section('content')

<style type="text/css">
    body {
        margin: 0;
        /*background: #e6e6e6;*/
    }
    .showSlide {
        display: none
    }
    .showSlide img {
            width: 100%;
            height:75%;
        }
    .slidercontainer {
        max-width: 500px;
        max-width: 400px;
        position: relative;
        margin: auto;
    }
    .left, .right {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        padding: 16px;
        margin-top: -22px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
    }
    .right {
        right: 0;
        border-radius: 3px 0 0 3px;
    }
        .left:hover, .right:hover {
            background-color: rgba(115, 115, 115, 0.8);
        }
    .content {
        color: #eff5d4;
        font-size: 30px;
        padding: 8px 12px;
        position: absolute;
        top: 10px;
        width: 50%;
        height:75%;
        text-align: center;
    }
    .active {
        background-color: #717171;
    }
    /* Fading animation */
    .fade {
        -webkit-animation-name: fade;
        -webkit-animation-duration: 1.5s;
        animation-name: fade;
        animation-duration: 1.5s;
    }
    @-webkit-keyframes fade {
        from {
            opacity: .4
        }
        to {
            opacity: 1
        }
    }

    @keyframes fade {
        from {
            opacity: .4
        }
        to {
            opacity: 1
        }
    }
</style>




<table class="table table-stripped">

    <tr>
        <th>Category</th>
        <td>{{ $item->category }}</td>
        <td rowspan="4">

            @if( count($images) > 1 )

                  <div class="slidercontainer" >
                    @for($i=0, $count = count($images); $i < $count; $i++)
                    <div class="showSlide ">
                        <img src="{{ asset('img/items') }}/{{ $images[$i]->file_name }}"   />
                        <!--<div class="content">Slide1 heading</div>-->
                    </div>
                    @endfor
                    <!--<div class="showSlide fade">
                        <img src="images/img2.jpg" />
                        <div class="content">Slide2 heading</div>
                    </div>

                    <div class="showSlide fade">
                        <img src="images/img3.jpg" />
                        <div class="content">Slide3 heading</div>
                    </div>
                    <div class="showSlide fade">
                        <img src="images/img4.jpg" />
                        <div class="content">Slide4 heading</div>
                    </div>
                    <!-- Navigation arrows -->
                    <a class="left" onclick="nextSlide(-1)">❮</a>
                    <a class="right" onclick="nextSlide(1)">❯</a>
                </div>
            @elseif( count($images) == 1 )
            <img src="{{ asset('img/items') }}/{{ $images[0]->file_name }}" height="250" />
            @endif




        </td>
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

    <tr>
        <th>Description</th>
        <td>{{ $item->description }}</td>
    </tr>

</table>

<a class="btn btn-primary btn-lg"  href="{{ url('Items/report/'.$item->id)}} " role="button">Claim item</a>

@endsection
