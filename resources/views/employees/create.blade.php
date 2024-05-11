@extends('layouts.layout')
@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Employees</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('employees.index') }}">Employees</a>/create</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

        @php
            $profile=Auth::user();
        @endphp
        <div class="row">
            <div class="col-xl-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('employees.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-4 mt-3">
                                    <label>Full Name</label>
                                    <input class="form-control" type="text" name="full_name" value="{{ old('full_name') }}">
                                    @error('full_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label>Gender</label>
                                    <select class="form-control select2" name="gender">
                                        <option value="" selected disabled>Select Gender</option>
                                        <option value="Male" {{ old('gender') == "Male" ? 'selected' : '' }}>Male</option>
                                        <option value="Female" {{ old('gender') == "Female" ? 'selected' : '' }}>Female</option>
                                    </select>
                                    @error('gender')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label>Date of Birth</label>
                                    <input class="form-control" type="date" name="date_of_birth" value="{{ old('date_of_birth') }}">
                                    @error('date_of_birth')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label>Mobile Number</label>
                                    <input class="form-control" type="number" name="mobile" value="{{ old('mobile') }}">
                                    @error('mobile')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label>Phone Number</label>
                                    <input class="form-control" type="number" name="phone_number" value="{{ old('phone_number') }}">
                                    @error('phone_number')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label>Email Address</label>
                                    <input class="form-control" type="email" name="email_address" value="{{ old('email_address') }}">
                                    @error('email_address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label>Address</label>
                                    <textarea class="form-control" type="email" name="permanent_address">{{ old('permanent_address') }}</textarea>
                                    @error('permanent_address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mt-4">
                                    <button class="btn btn-success">Add Employee</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection