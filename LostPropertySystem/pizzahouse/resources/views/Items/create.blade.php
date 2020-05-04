@extends('layouts.layout')

@section('content')
<div class="wrapper create-pizza">
  <h1>Add a new item</h1>
<form action="{{ route('item.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label for="color">color:</label>
    <input type="text" name="color" id="color" required>
    <input type="hidden" name="user_id" id="user_id" value="{{$user}}">


    <label for="category">Choose type of category:</label>
    <select name="category" id="category">
      <option value="jewellery">jewellery</option>
      <option value="phones">phones</option>
      <option value="pets">pets</option>
    </select>


  <label for="date">Date:</label>
  <input type="date" id="birthday" name="date">



    <label for="place">place:</label>
    <input type="text" name="place" id="place" required>

    <label for="description">description :</label>
    <input type="text" name="description" id="description" required>

    <div class="form-group d-flex flex-column" >
    <label for="image">Profile Image</label>
    <input type="file" name="images" class="py-2" multiple="multiple">
    <div>{{ $errors->first('images') }}</div>
</div>



    <input type="submit" value="Add item ">
  </form>
</div>
@endsection
