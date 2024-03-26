@extends('layouts.main')

@section('isi')
    @auth
    <h1>Hello, {{ auth()->user()->name }}</h1><br>
    @endauth
    <h3>Ini halaman {{ $page }}</h3>
@endsection

