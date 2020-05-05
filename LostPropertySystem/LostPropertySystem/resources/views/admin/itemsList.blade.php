@extends('layouts.dashboard')
@section('content')

<?php

$lostItem = $paginator->toArray()['data'];

?>

                                <table id="basic-datatables" class="display table table-striped table-hover" >

                                    <thead>




                                    <tr>
                                        <!--<th>ID</th>-->
                                        <th>Image</th>
                                        <th>User Name </th>
                                        <th>User Email </th>
                                        <th>Category</th>
                                        <th>Color</th>
                                        <th>Place</th>
                                        <th>Description</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($lostItem as $Item)

                                    <tr>

                                        <!--<td>{{$Item['id']}}</td>-->

                                        <td><img src="@if(isset($Item['lostimage']['file_name'])){{URL::to('/')}}/img/items/{{$Item['lostimage']['file_name']}}"@endif class="img-thumbnail" width="75" height="75"></td>

                                            <td>{{$Item['user']['name']}}</td>
                                        <td>{{$Item['user']['email']}}</td>
                                        <td>{{$Item['category']}}</td>
                                        <td>{{$Item['color']}}</td>
                                        <td>{{$Item['place']}}</td>
                                        <td>{{$Item['description']}}</td>
                                        <td>{{$Item['date']}}</td>
                                        <td><a href="{{url('dashboard/report-list/edit/'.$Item['id'])}}" class="btn btn-success btn-sm">Edit</a>
{{--                                       <a href="{{url('dashboard/list-disaprove/'.$Item->id)}}" class="btn btn-danger btn-xs">Disapprove</a>--}}

                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                                </table>
{{ $paginator->links() }}

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
