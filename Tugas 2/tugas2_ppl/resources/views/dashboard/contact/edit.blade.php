@extends('dashboard.layouts.main')

@section('isi')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Data Contact</h1>
</div>

<div class="col-md-6">
    <form action="/dashboard/contact/{{ $contact->id_contact }}" method="post">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Firstname</label>
            <input type="text" name="firstname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required value="{{ old('firstname', $contact->firstname) }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Lastname</label>
            <input type="text" name="lastname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required value="{{ old('lastname', $contact->lastname) }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">E-mail</label>
            <input type="email" name="email" class="form-control" id="exampleInputPassword1" required value="{{ old('email', $contact->email) }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" id="exampleInputPassword1" required value="{{ old('phone', $contact->phone) }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="/dashboard/contact" class="btn btn-danger">Back</a>
    </form>
</div>
@endsection