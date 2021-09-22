@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('users.create') }}" class="btn btn-primary">Create New User</a>
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
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">{{ $user->id }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->getRoleNames() }}</td>
                                        <td>
                                            <a href="{{ route('users.show', $user) }}" class="btn btn-sm btn-primary">view</a>
                                            <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-warning">edit</a>
                                            <a href="{{ route('users.destroy', $user) }}" class="btn btn-sm btn-danger"
                                                onclick="event.preventDefault();
                                                document.getElementById('logout-form{{ $user->id }}').submit();">
                                                    delete
                                            </a>
                                            <form id="logout-form{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-none">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
