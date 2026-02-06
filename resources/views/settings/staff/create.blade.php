@extends('shared.master')

@section('title', 'Staff Registration')

@section('content')

<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Staff Registrations</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('settings.staff.index') }}">Staff</a></li>
                <li class="active">Registration</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <form action="{{ route('settings.staff.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <!-- First Name -->
                                    <div class="col-md-4">
                                        <div class="form-group @error('first_name') has-error @enderror">
                                            <label class="control-label">First Name</label>
                                            <input type="text" name="first_name" class="form-control" placeholder="John" value="{{ old('first_name') }}">
                                            @error('first_name')
                                                <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <!-- Middle Name -->
                                    <div class="col-md-4">
                                        <div class="form-group @error('middle_name') has-error @enderror">
                                            <label class="control-label">Middle Name</label>
                                            <input type="text" name="middle_name" class="form-control" placeholder="Bob" value="{{ old('middle_name') }}">
                                            @error('middle_name')
                                                <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                      <!-- Last Name -->
                                      <div class="col-md-4">
                                        <div class="form-group @error('last_name') has-error @enderror">
                                            <label class="control-label">Last Name</label>
                                            <input type="text" name="last_name" class="form-control" placeholder="Doe" value="{{ old('last_name') }}">
                                            @error('last_name')
                                                <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group @error('gender') has-error @enderror">
                                            <label class="control-label">Gender</label>
                                            <select name="gender" class="form-control">
                                                <option value="">-select-</option>
                                                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                            </select>
                                            @error('gender')
                                                <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Date of Birth -->
                                    <div class="col-md-4">
                                        <div class="form-group @error('date_of_birth') has-error @enderror">
                                            <label class="control-label">Date of Birth</label>
                                            <input type="date" name="date_of_birth" class="form-control" value="{{ old('date_of_birth') }}">
                                            @error('date_of_birth')
                                                <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group @error('profile_photo') has-error @enderror">
                                            <label class="control-label">Profile Photo</label>
                                            <input type="file" name="profile_photo" class="form-control">
                                            @error('profile_photo')
                                                <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">                                  
                                    <div class="col-md-4">
                                        <div class="form-group @error('phone_number') has-error @enderror">
                                            <label class="control-label">Phone Number</label>
                                            <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number') }}">
                                            @error('phone_number')
                                                <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group @error('occupation_id') has-error @enderror">
                                            <label for="occupation_id">Designation/Occupation</label>
                                            <select name="occupation_id" id="occupation_id" class="form-control">
                                                <option value="">-select-</option>
                                                @foreach($occupations as $occupation)
                                                    <option value="{{ $occupation->id }}">{{ $occupation->name }}  </option>
                                                @endforeach
                                            </select>
                                            @error('occupation_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group @error('check_no') has-error @enderror">
                                            <label class="control-label">Check Number</label>
                                            <input type="text" name="check_no" class="form-control" placeholder="check number" value="{{ old('check_no') }}">
                                            @error('check_no')
                                                <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                               

                                <!-- Role -->
                                <div class="row">
                                     <!-- Ocuupations -->
                                     <div class="col-md-4"> 
                                        <div class="form-group @error('salary_scale_id') has-error @enderror">
                                            <label for="salary_scale_id">Salary Scale</label>
                                            <select name="salary_scale_id" id="salary_scale_id" class="form-control">
                                            <option value="">-select-</option>
                                                @foreach($salary_scales as $scale)
                                                    <option value="{{ $scale->id }}">{{ $scale->name }}  </option>
                                                @endforeach
                                            </select>
                                            @error('salary_scale_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group @error('department_id') has-error @enderror">
                                            <label class="control-label">Department</label>
                                            <select name="department_id" class="form-control">
                                                <option value="">-select-</option>
                                                @foreach($departments as $department)
                                                    <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                                        {{ $department->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('department_id')
                                                <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group @error('role') has-error @enderror">
                                            <label class="control-label">Role</label>
                                            <select name="role" class="form-control">
                                                <option value="">-select-</option>
                                                @foreach($roles as $role)
                                                    <option value="{{ $role->id }}" {{ old('role') == $role->id ? 'selected' : '' }}>
                                                        {{ $role->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('role')
                                                <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Save Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
