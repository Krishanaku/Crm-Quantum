@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Companies</h1>
        <a href="{{ route('companies.create') }}" class="btn btn-primary mb-2">Create Company</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Logo</th>
                    <th>Website</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                    <tr>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}</td>
                        <td>
                            @if ($company->logo)
                                <img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo" width="50">
                            @else
                                N/A
                            @endif
                        </td>
                        <td>{{ $company->website }}</td>
                        <td>
                            <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('companies.destroy', $company->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $companies->links() }}
    </div>
@endsection
