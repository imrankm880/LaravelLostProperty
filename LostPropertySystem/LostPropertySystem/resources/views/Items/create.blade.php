@extends('layouts.layout')

@section('content')
<div class="wrapper create-pizza">
  <h1>Add a new item</h1>
<form action="{{ route('item.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="user_id" id="user_id" value="{{$user}}">
<table class="table table-striped">
      <tr>
        <td>Color</td>
        <td><input type="text" name="color" id="color" class="form-control" required></td>
      </tr>
      <tr>
        <td>Category</td>
        <td>
            <select name="category" id="category"  class="form-control" >
                <option value="jewellery">jewellery</option>
                <option value="phones">phones</option>
                <option value="pets">pets</option>
              </select>
        </td>
      </tr>
      <tr>
        <td>Date</td>
        <td><input type="date" id="birthday" name="date"  class="form-control" ></td>
      </tr>
      <tr>
        <td>place</td>
        <td><input type="text" name="place" id="place" required  class="form-control" ></td>
      </tr>
      <tr>
        <td>Description</td>
        <td><textarea name="description" id="description"  class="form-control"  required></textarea></td>
      </tr>
      <tr>
        <td>Profile Image</td>
        <td><input type="file" name="images[]" class="py-2" multiple="multiple"  class="form-control" ></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" value="Add item" class="btn btn-primary"></td>
      </tr>

</table>






  </form>

</div>

@endsection
