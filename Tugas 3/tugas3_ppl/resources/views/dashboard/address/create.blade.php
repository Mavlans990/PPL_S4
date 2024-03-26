@extends('dashboard.layouts.main')

@section('isi')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Data Address</h1>
</div>

<div class="col-md-6">
    <form action="/dashboard/address" method="post">
        @csrf
        {{-- <input type="hidden" name="tb_contact_id" value="1"> --}}
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Pilih User</label>
            <select class="form-control" name="tb_contact_id" id="">
                <option value="">-- Pilih User --</option>
                @foreach($contacts as $contact)
                <option value="{{ $contact->id }}">{{ $contact->firstname }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Street</label>
            <input type="text" name="street" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required value="{{ old('street') }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">City</label>
            <input type="text" name="city" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required value="{{ old('city') }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Province</label>
            <input type="text" name="province" class="form-control" id="exampleInputPassword1" required value="{{ old('province') }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Country</label>
            <input type="text" name="country" class="form-control" id="exampleInputPassword1" required value="{{ old('country') }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Postal Code</label>
            <input type="text" name="postal_code" class="form-control" id="exampleInputPassword1" required value="{{ old('postal_code') }}">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="/dashboard/address" class="btn btn-danger">Back</a>
    </form>
</div>
@endsection