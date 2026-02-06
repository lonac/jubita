@extends('shared.master')

@section('title', 'Contents List')

@section('content')


<div class="container-fluid">
        <div class="row bg-title">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h4 class="page-title">Content
                    <a href="{{ route('content.content.create') }}" class="btn pull-right btn-success">Add New Content</a>
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
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Post Type</th>
                                        <th>Author</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($contents as $content)
                                    <tr>
                                        <td>{{ $content->id }}</td>
                                        <td>{{ $content->title }}</td>
                                        <td>{{ $content->category->name ?? 'N/A' }}</td>
                                        <td>{{ $content->postType->name ?? 'N/A' }}</td>
                                        <td>{{ $content->author->name ?? 'N/A' }}</td>
                                        <td>{{ ucfirst($content->status) }}</td>
                                        <td>
                                            <a href="{{ route('content.content.edit', $content->id) }}" class="btn btn-primary btn-sm">Edit</a>

                                            <form action="{{ route('content.content.destroy', $content->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="9" class="text-center">No content found.</td>
                                    </tr>
                                    @endforelse
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

