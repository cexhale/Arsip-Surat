@extends('layouts.app')
@section('title','Lihat Arsip')
@section('content')
<h1>{{ $archive->title }}</h1>
<p>Kategori: {{ $archive->category->name }}</p>
<p>Catatan: {{ $archive->notes }}</p>
<p>Tanggal: {{ $archive->created_at->format('d-m-Y') }}</p>

<iframe src="{{ asset('storage/'.$archive->file_path) }}" width="100%" height="600px"></iframe>

<a href="{{ route('archives.index') }}">Kembali <<</a>
<a href="{{ route('archives.download', $archive) }}">Unduh</a>
@endsection
