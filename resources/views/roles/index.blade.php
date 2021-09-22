@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('roles.create') }}" class="btn btn-primary">Create New Role</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <th scope="row">{{ $role->id }}</th>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            <a href="{{ route('roles.show', $role) }}" class="btn btn-sm btn-primary">view</a>
                                            <a href="{{ route('roles.edit', $role) }}" class="btn btn-sm btn-warning">edit</a>
                                            <a href="{{ route('roles.destroy', $role) }}" class="btn btn-sm btn-danger"
                                                onclick="event.preventDefault();
                                                document.getElementById('logout-form{{ $role->id }}').submit();">
                                                    delete
                                            </a>
                                            <form id="logout-form{{ $role->id }}" action="{{ route('roles.destroy', $role->id) }}" method="POST" class="d-none">
                                                @csrf
                                                @method('DELETE')
                                            </form>
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
</div>
@endsection
