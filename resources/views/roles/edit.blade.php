@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Role') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('roles.update', $role) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputName">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputName" value="{{ old('name', $role->name) }}" placeholder="Enter name" required>
                        </div>
                        @foreach ($permissions as $permission)
                            <div class="form-group form-check">
                                <input type="checkbox" value="{{ $permission->id }}" name="permission[]" class="form-check-input" id="exampleCheck{{ $permission->id }}" @if(is_array(old('permission', $rolePermissions)) && in_array($permission->id, old('permission', $rolePermissions))) checked @endif>
                                <label class="form-check-label" for="exampleCheck{{ $permission->id }}">{{ $permission->name }}</label>
                            </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
