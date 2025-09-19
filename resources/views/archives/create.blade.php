@extends('layouts.app')
@section('title','Tambah Arsip')
@section('content')
<h1>Tambah Arsip Surat</h1>
<form action="{{ route('archives.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Judul</label>
    <input type="text" name="title" value="{{ old('title') }}" required>
    <label>Kategori</label>
    <select name="category_id" required>
        <option value="">-- Pilih --</option>
        @foreach($categories as $c)
            <option value="{{ $c->id }}">{{ $c->name }}</option>
        @endforeach
    </select>
    <label>File (PDF)</label>
    <input type="file" name="pdf_file" accept="application/pdf" required>
    <label>Catatan</label>
    <textarea name="notes">{{ old('notes') }}</textarea>

    <a href="{{ route('archives.index') }}">Kembali</a>
    <button type="submit">Simpan</button>
</form>
@if($errors->any())
    <div>
        <ul>
            @foreach($errors->all() as $err)<li>{{ $err }}</li>@endforeach
        </ul>
    </div>
@endif
@endsection
