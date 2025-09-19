@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
<h1>Edit Kategori</h1>

<form action="{{ route('categories.update', $category) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Nama Kategori</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $category->name) }}" required>
    </div>

    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Kembali</a>
    <button type="submit" class="btn btn-primary">Update</button>
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
