@extends('layouts.app')

@section('title', 'Daftar Kategori')

@section('content')
<h1>Daftar Kategori Surat</h1>

<a href="{{ route('categories.create') }}" class="btn btn-success mb-3">Tambah Kategori</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($categories as $i => $c)
        <tr>
            <td>{{ $categories->firstItem() + $i }}</td>
            <td>{{ $c->name }}</td>
            <td>
                <a href="{{ route('categories.edit', $c) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('categories.destroy', $c) }}" method="POST" style="display:inline" onsubmit="return confirm('Yakin hapus kategori ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="3">Belum ada kategori.</td></tr>
        @endforelse
    </tbody>
</table>

{{ $categories->links() }}

@endsection
