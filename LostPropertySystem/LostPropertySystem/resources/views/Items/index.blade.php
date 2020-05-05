    @extends('layouts.layout')

    @section('content')

<?php

$items = $paginator->toArray()['data'];

?>

    <div class="flex-center position-ref full-height">

        <div class="content">

            <div class="title m-b-md">
                <h2>Lost items List</h2>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover" >

                        <thead>

                        <tr>
                            <th>ID</th>
                            <th>Item Name </th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @for($i=0, $count = count($items); $i < $count; $i++)
                            <tr>
                                <td>{{$items[$i]['id']}}</td>
                                <td>{{$items[$i]['category']}}</td>

                                <td><a href="{{ route('item.show', [$items[$i]['id']]) }}" class="btn btn-success btn-mini">View Item</a></td>
                            </tr>
                        @endfor
                    </tbody>
                    </table>
                    {{ $paginator->links() }}
                </div>
            </div>
        </div>

    </div>


    @endsection
