@extends('dashboard.layouts.main')

@section('isi')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Data User</h1>
</div>

<div class="col-md-6">
    <form action="/dashboard/user/{{ $user->id }}" method="post">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required value="{{ old('name', $user->name) }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required value="{{ old('username', $user->username) }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" required value="{{ old('password') }}">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="/dashboard/user" class="btn btn-danger">Back</a>
    </form>
</div>
@endsection