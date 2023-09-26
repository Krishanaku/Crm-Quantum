@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <a href="{{ route('companies.index') }}" class="text-blue-600 hover:underline">Company</a>
                    <a href="{{ route('employees.index') }}" class="text-blue-600 hover:underline ml-4">Employee</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
