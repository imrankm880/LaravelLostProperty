@extends('layouts.dashboard')
@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Approved User Item Claimed List </h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>

                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Items</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover" >

                                    <thead>




                                    <tr>
                                        <th>ID</th>

                                        <th>User Name </th>
                                        <th>User Email </th>
                                        <th>Category</th>
                                        <th>Color</th>
                                        <th>Place</th>
                                        <th>Description</th>
                                        <th>Date</th>
                                        <th>Compaliner Subject</th>
                                        <th>Complainer Message</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    @foreach($pendingItems as $Item)

                                    <tr>

                                        <td>{{$Item->id}}</td>

{{--                                        <td><img src="@if(isset($Item->lostimage->file_name)){{URL::to('/')}}/img/items/{{$Item->lostimage->file_name}}"@endif class="img-thumbnail" width="75" height="75"></td>--}}

                                        <td>{{$Item->user->name}}</td>
                                        <td>{{$Item->user->email}}</td>
                                        <td>{{$Item->lostitem->category}}</td>
                                        <td>{{$Item->lostitem->color}}</td>
                                        <td>{{$Item->lostitem->place}}</td>
                                        <td>{{$Item->lostitem->description}}</td>
                                        <td>{{$Item->lostitem->date}}</td>

                                        <td>{{$Item->subject}}</td>
                                        <td>{{$Item->description}}</td>
                                        <td><a href="{{url('dashboard/approve')}}"> <button type="submit" name="approve" class="btn btn-primary btn-sm" >Send Email</button></a>
                                    </tr>
                                    </tfoot>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

</div>
<script >
    $(document).ready(function() {
        $('#basic-datatables').DataTable({
        });

        $('#multi-filter-select').DataTable( {
            "pageLength": 5,
            initComplete: function () {
                this.api().columns().every( function () {
                    var column = this;
                    var select = $('<select class="form-control"><option value=""></option></select>')
                        .appendTo( $(column.footer()).empty() )
                        .on( 'change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search( val ? '^'+val+'$' : '', true, false )
                                .draw();
                        } );

                    column.data().unique().sort().each( function ( d, j ) {
                        select.append( '<option value="'+d+'">'+d+'</option>' )
                    } );
                } );
            }
        });

        // Add Row
        $('#add-row').DataTable({
            "pageLength": 5,
        });

        var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        $('#addRowButton').click(function() {
            $('#add-row').dataTable().fnAddData([
                $("#addName").val(),
                $("#addPosition").val(),
                $("#addOffice").val(),
                action
            ]);
            $('#addRowModal').modal('hide');

        });
    });
</script>
    @endsection
