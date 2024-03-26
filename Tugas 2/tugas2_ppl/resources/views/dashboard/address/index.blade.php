@extends('dashboard.layouts.main')

@section('isi')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Master Address</h1>
</div>

<div class="row d-flex">
    <div class="col-md-4">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
</div>

<div class="table-responsive small">
    <a href="/dashboard/address/create" class="btn btn-success btn-sm mb-3">Tambah Data</a>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Street</th>
                <th scope="col">City</th>
                <th scope="col">Province</th>
                <th scope="col">Country</th>
                <th scope="col">Postal Code</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($addresss as $address)    
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $address->street }}</td>
                <td>{{ $address->city }}</td>
                <td>{{ $address->province }}</td>
                <td>{{ $address->country }}</td>
                <td>{{ $address->postal_code }}</td>
                <td>
                    {{-- <a href="/dashboard/contact/{{ $contact->id_contact }}" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a> --}}
                    <a href="/dashboard/address/{{ $address->id_address }}/edit" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></a>
                    <form action="/dashboard/address/{{ $address->id_address }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah yakin menghapus data ini?')"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection