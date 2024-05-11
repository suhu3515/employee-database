@extends('layouts.layout')
@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Employees</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Employees</h4>
                            <p class="card-title-desc">The added employee details can be viewed here.</p>

                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Email Address</th>
                                    <th>Mobile</th>
                                    <th>Gender</th>
                                    <th>Date of Birth</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($employees as $employee)
                                        <tr>
                                            <td>{{ $employee->full_name }}</td>
                                            <td>{{ $employee->email_address }}</td>
                                            <td>{{ $employee->mobile }}</td>
                                            <td>{{ $employee->gender }}</td>
                                            <td>{{ $employee->date_of_birth }}</td>
                                            <td><a class="btn btn-primary" href="{{ route('employees.edit', $employee->id) }}">Edit</a></td>
                                            <td><a class="btn btn-danger" href="{{ route('deleteEmployee', $employee->id) }}" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div>
        <!-- end row -->
    </div>
    <!-- container-fluid -->
</div>
@endsection