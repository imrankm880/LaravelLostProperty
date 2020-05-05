<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" ></script>-->

        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">



        <script src="{{ asset('js/app.js') }}" defer></script>



        <style>

            nav.navbar{
                background-color: #007bff !important;
                color: #FFF;
            }

            nav.navbar a{
                color: #FFF !important;
            }

            #slideshow {
  margin: 80px auto;
  position: relative;
  width: 240px;
  height: 240px;
  padding: 10px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.4);
}

#slideshow > div {
  position: absolute;
  top: 10px;
  left: 10px;
  right: 10px;
  bottom: 10px;
}
        </style>

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="/css/main.css" rel="stylesheet">
        <link href="{{ asset('slide.css') }}" rel="stylesheet">


    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: blue">
            <a class="navbar-brand" href="{{ url('/') }}">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                  <a class="nav-link" href="{{ route('items') }}">View Items</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('item.create') }}">Add item</a>
                </li>

                <!-- <li class="nav-item">
                  <a class="nav-link " href="#" >Contact Us</a>
                </li> -->
              </ul>
              <div class="form-inline my-2 my-lg-0">

               @auth
                Welcome  &nbsp; <strong> {{ auth()->user()->name }}</strong>! &nbsp;  &nbsp;  &nbsp;  &nbsp;
               @if(auth()->user()->role_id == 1)
               <a class="mr-sm-2" href="{{ route('dashboard.items') }}" >Dashboard</a>
               @endif
               <a class="mr-sm-2" href="{{ route('dashboard.logout') }}" >Logout</a>
               @else
                   <a class="mr-sm-2" href="{{ route('login') }}" >Login</a>
                   <a class="my-sm-0" href="{{ route('register') }}" >Register</a>
               @endauth


            </div>
          </nav>


      @yield('content')

      <footer class="fixed-bottom" style="text-align: center; padding-top: 10px;">
        <p>Copyright 2020 Filo System</p>
      </footer>

      <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
    <script src="{{ asset('TweenMax.min.js') }}"></script>
    <script src="{{ asset('slider.js') }}"></script>

    <script>
/*
$("#slideshow > div:gt(0)").hide();

setInterval(function() {
  $('#slideshow > div:first')
    .fadeOut(1000)
    .next()
    .fadeIn(1000)
    .end()
    .appendTo('#slideshow');
}, 3000);
*/



    </script>
@if(isset($images) && is_array($images) && count($images) > 1)
<script type="text/javascript">
    var slide_index = 1;
    displaySlides(slide_index);

    function nextSlide(n) {
        displaySlides(slide_index += n);
    }

    function currentSlide(n) {
        displaySlides(slide_index = n);
    }

    function displaySlides(n) {
        var i;
        var slides = document.getElementsByClassName("showSlide");
        if (n > slides.length) { slide_index = 1 }
        if (n < 1) { slide_index = slides.length }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slides[slide_index - 1].style.display = "block";
    }
</script>
@endif

    </body>
</html>
