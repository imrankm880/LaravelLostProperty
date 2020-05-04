@extends('layouts.dashboard')
@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Claim Items List For Approval or Rejection</h4>
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
                            <h4 class="card-title">Items Claim</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover" >

                                    <thead>




                                    <tr>

                                        <th>Item ID</th>
                                        <th>Category</th>
                                        <th>Item Color</th>
                                        <th>User Name </th>
                                        <th>User Email </th>
                                        <th>Subject</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    @foreach($reportlist as $report)
                                    <tr>

                                        <td>{{$report->lostItem->id}}</td>
                                         <td>{{$report->lostItem->category}}</td>
                                         <td>{{$report->lostItem->color}}</td>
                                        <td>{{$report->user->name}}</td>
                                        <td>{{$report->user->email}}</td>
                                        <td>{{$report->subject}}</td>
                                        <td>{{$report->description}}</td>
                                        <td>  <a href="{{url('dashboard/reject-item/'.$report->lostItem->id)}}"> <button type="submit" name="approve" class="btn btn-danger btn-sm" >Reject Request</button></a>
                                           <a href="{{url('dashboard/dis-approve')}}"> <button type="submit" name="approve" class="btn btn-info btn-sm" >Reject with Email</button></a>

                                           <a href="{{url('dashboard/item-approve/'.$report->lostItem->id)}}"> <button type="submit" name="approve" class="btn btn-success btn-sm" style="margin-top: 10px" >Approve</button></a>

                                        </td>

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
