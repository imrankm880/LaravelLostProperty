@extends('layouts.layout')

@section('content')





<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
</head>

<body>

<h3 class="text-center"> Report Item Form</h3>

<div class="container">
  <form action="{{route('Items/report')}}" method="post">
{{@csrf_field()}}
      {{@method_field('post')}}

    <input type="text" id="fname" name="subject" placeholder="Subject" required>
<input type="hidden" name="user_id" value="{{$user}}">
<input type="hidden" name="item_id" value="{{$item_id}}">


    <label for="subject">Description (Detail)</label>
    <textarea id="subject" name="description" placeholder="Write something.." style="height:200px" required></textarea>

    <input type="submit" value="Submit">
  </form>
</div>






@endsection
