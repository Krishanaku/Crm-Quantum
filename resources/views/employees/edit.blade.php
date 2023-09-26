@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Employee</h1>
        <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Use PUT method for updates -->

            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $employee->first_name }}" required>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $employee->last_name }}" required>
            </div>
            <div class="form-group">
                <label for="company_id">Company</label>
                <select class="form-control" id="company_id" name="company_id" required>
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}" {{ $employee->company_id == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $employee->email }}">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $employee->phone }}">
            </div>
            <div class="form-group">
                <label for="profile_picture">Profile Picture</label>
                <input type="file" class="form-control-file" id="profile_picture" name="profile_picture">
                @if ($employee->profile_picture)
                    <img src="{{ asset('storage/' . $employee->profile_picture) }}" alt="{{ $employee->first_name }} {{ $employee->last_name }} Profile Picture" width="50">
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
