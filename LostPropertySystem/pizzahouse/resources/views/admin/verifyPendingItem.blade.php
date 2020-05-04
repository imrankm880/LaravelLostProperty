@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Item List Form Edit</div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{url('dashboard/item-update')}}"enctype="multipart/form-data">
                    @csrf
               <input name="id" type="hidden" value="{{$item->id}}">
                        <div class="form-group">
                            <select name="status">Select Status
                     <option selected>--Select To Approve--</option>
                           <option value="1">Acitve</option>
                            </select>
                        </div>





                            <button type="submit" class="btn btn-success ">Update</button>
                        </div>




        </form>
    </div>




</div>
            </div>
</div>
@endsection
