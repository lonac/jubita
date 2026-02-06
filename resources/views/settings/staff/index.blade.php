@extends('shared.master')

@section('title','Staffs')

@section('content')

<div class="container-fluid">
        <div class="row bg-title">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h4 class="page-title">Staffs
                    @can('configure')
                    <a href="{{route('settings.staff.create')}}" class="btn btn-sm pull-right btn-info">NEW STAFF</a>
                    @endcan 
                </h4>
            </div>
        </div>
        <!-- /row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <div class="table-responsive">
                    <table id="myTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>SNo</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Title</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($members as $index => $member)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $member->first_name }} {{ $member->last_name }}</td>
                                <td>{{ $member->email ??'' }}</td>
                                <td>{{ $member->designation->name ??'' }}</td>
                                <td> @foreach($member->roles as $role) {{$role->name}},   @endforeach </td>
                                <td>
                                    <a href="{{ route('settings.staff.show', $member->id) }}" class="btn btn-info btn-sm">View</a>                                    
                                    <a href="{{ route('settings.staff.edit', $member->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

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


