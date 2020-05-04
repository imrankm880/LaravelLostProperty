 @extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Item List Form Edit</div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{url('dashboard/report-list/update')}}"enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label for="password">Item ID</label>
                            <input type="text" name="id" class="form-control" value="{{$item->id}}" readonly>
                        </div>
                    <div class="form-group">
                        <label for="password">Category</label>
                        <input type="text" name="category" class="form-control" placeholder="Category" value="{{$item->category}}" readonly>
                    </div>

                        <input type="hidden" name="user_id" value="{{$item->user_id}}">
                        <div class="form-group">
                            <label for="Color">Color</label>
                            <input type="text" name="color" class="form-control" placeholder="color" value="{{$item->color}}">
                        </div>
                        <div class="form-group">
                            <label for="Place">Place</label>
                            <input type="text" name="place" class="form-control"  placeholder="place" value="{{$item->place}}">
                        </div>
                        <div class="form-group">
                            <label for="Place">Date</label>
                            <input type="date" name="date" class="form-control"  value="{{$item->date}}">
                        </div>
                        <div class="form-group">
                            <label for="comment">Description</label>
                            <textarea class="form-control"  name="description" rows="5">{{$item->description}}</textarea><br><br>


                            <div class="form-group">

                                <img src="{{asset('img/items/'.$image[0]->file_name)}}" class="img-thumbnail" height="250px" width="350px"><br>

                                <label for="Place"></label>
                                <input type="file" name="file_name" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-success ">Update</button>
                        </div>



{{--                    <div class="form-group">--}}
{{--                        <label for="exampleFormControlSelect1">Example select</label>--}}
{{--                        <select class="form-control" id="exampleFormControlSelect1">--}}
{{--                            <option>1</option>--}}
{{--                            <option>2</option>--}}
{{--                            <option>3</option>--}}
{{--                            <option>4</option>--}}
{{--                            <option>5</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}




        </form>
    </div>




</div>
            </div>
</div>
@endsection
