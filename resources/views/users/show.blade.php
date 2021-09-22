@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Name: {{ $user->name }}</p>
                    <p>Email: {{ $user->email }}</p>
                    <p>Role: {{ $user->getRoleNames() }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
