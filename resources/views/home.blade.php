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
                    <table class="table table-responsive">
                        <tr><th>Username</th><th>:<th><Td>{{ $user->username }}</td></tr>
                        <tr><th>Name</th><th>:<th><Td>{{ $user->name }}</td></tr>
                        <tr><th>Email</th><th>:<th><Td>{{ $user->email }}</td></tr>
                        <tr><th>Role</th><th>:<th><Td>{{ $user->role }}</td></tr>
                        <tr><th>Created</th><th>:<th><Td>{{ $user->created_at }}</td></tr>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
