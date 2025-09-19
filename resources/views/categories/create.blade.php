@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
<h1>Tambah Kategori</h1>

<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nama Kategori</label>
        <input type="text" class="form-control" name="name" id="name" required>
    </div>

    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Kembali</a>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

@if($errors->any())
<div class="alert alert-danger mt-3">
    <ul>
        @foreach($errors->all() as $err)
            <li>{{ $err }}</li>
        @endforeach
    </ul>
</div>
@endif

@endsection
