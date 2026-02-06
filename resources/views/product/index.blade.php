@extends('shared.master')

@section('title', 'Product List')

@section('content')


<div class="container-fluid">
        <div class="row bg-title">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h4 class="page-title">Product
                    <a href="{{ route('product.product.create') }}" class="btn pull-right btn-success">Add New Product</a>
                </h4>
            </div>
        </div>
        <!-- /row -->

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-responsive">
                        <table id="myTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Rating</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>
                                            @if($product->image)
                                                <img src="{{ asset('storage/'.$product->image) }}" width="50">
                                            @endif
                                        </td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->rating }}</td>
                                        <td>{{ ucfirst($product->status) }}</td>
                                        <td> -- </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>


                        </div>

                      
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

@endsection 


@section('scripts')
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;

                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before(
                                '<tr class="group"><td colspan="5">' + group + '</td></tr>'
                            );

                            last = group;
                        }
                    });
                }
            });

            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    </script>

@endsection




