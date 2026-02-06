@extends('shared.master')

@section('title', 'Edit Staff')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="white-box shadow-sm p-4 bg-white rounded">
                <h3 class="box-title text-center mb-4">Staff Profile</h3>
                <hr>

                <div class="row text-center mb-4">
                    <div class="col-md-12">
                        @if($staff->profile_photo)
                            <img src="{{ Storage::url($staff->profile_photo) }}" 
                                 alt="Profile Photo" 
                                 class="rounded-circle img-thumbnail" 
                                 width="120" height="120">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ $staff->first_name }}+{{ $staff->last_name }}&background=0D8ABC&color=fff" 
                                 alt="Profile Photo" 
                                 class="rounded-circle img-thumbnail" 
                                 width="120" height="120">
                        @endif
                        <h4 class="mt-3">{{ $staff->first_name }} {{ $staff->last_name }}</h4>
                        <span class="badge badge-info">{{ $staff->roles->pluck('name')->implode(', ') }}</span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12"><strong>Email</strong><br>
                        <p class="text-muted">{{ $staff->email }}</p>
                    </div>

                    <div class="col-md-12"><strong>Phone Number</strong><br>
                        <p class="text-muted">{{ $staff->phone_number ?? '-' }}</p>
                    </div>

                    <div class="col-md-12"><strong>Department</strong><br>
                        <p class="text-muted">{{ $staff->department->name ?? '-' }}</p>
                    </div>

                    <div class="col-md-12"><strong>Occupation</strong><br>
                        <p class="text-muted">{{ $staff->occupation->name ?? '-' }}</p>
                    </div>

                    <div class="col-md-12"><strong>Salary Scale</strong><br>
                        <p class="text-muted">{{ $staff->salaryScale->name ?? '-' }}</p>
                    </div>

                    <div class="col-md-12"><strong>Check No</strong><br>
                        <p class="text-muted">{{ $staff->check_no }}</p>
                    </div>

                    <div class="col-md-12"><strong>Date of Birth</strong><br>
                        <p class="text-muted">{{ $staff->date_of_birth}}</p>
                    </div>

                    <div class="col-md-12"><strong>Gender</strong><br>
                        <p class="text-muted">{{ $staff->gender }}</p>
                    </div>

                    <div class="col-md-12"><strong>Status</strong><br>
                        @if($staff->status)
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-secondary">Inactive</span>
                        @endif
                    </div>
                </div>

                <hr>
                <div class="text-center mt-3">
                  
                    <form method="POST" 
                          action="{{ route('settings.staff.destroy', $staff->id) }}" 
                          onsubmit="return confirmDelete(event)">
                        @csrf
                        @method('DELETE')

                        <a href="{{ route('settings.staff.index') }}" class="btn btn-outline-secondary">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>

                        <a href="{{ route('settings.staff.edit', $staff->id) }}" class="btn btn-primary">
                            <i class="fa fa-edit"></i> Edit Staff
                        </a>

                        <button class="btn btn-danger btn-outline-danger">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function confirmDelete(event) {
        event.preventDefault(); // Stop the normal form submission
        if (confirm("Are you sure you want to delete this staff member? This action cannot be undone.")) {
            event.target.submit(); // Submit only if confirmed
        }
    }
</script>
@endsection