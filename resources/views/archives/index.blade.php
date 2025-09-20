@extends('layouts.app')
@section('title','Daftar Arsip')
@section('content')
<h1>Arsip Surat</h1>

<form method="GET" action="{{ route('archives.index') }}">
    <input type="text" name="q" value="{{ $q ?? '' }}" placeholder="Cari berdasarkan judul...">
    <button type="submit">Cari</button>
    <a href="{{ route('archives.create') }}">Arsipkan Surat..</a>
</form>

<table border="1">
    <thead>
        <tr>
            <th>No</th><th>Judul</th><th>Kategori</th><th>Tanggal</th><th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($archives as $index => $a)
            <tr>
                <td>{{ $archives->firstItem() + $index }}</td>
                <td>{{ $a->title }}</td>
                <td>{{ $a->category->namae }}</td>
                <td>{{ $a->created_at->format('d-m-Y') }}</td>
                <td>
                    <a href="{{ route('archives.show', $a) }}">Lihat >></a>
                    <a href="{{ route('archives.download', $a) }}">Unduh</a>
                    <a href="{{ route('archives.edit', $a) }}">Edit</a>
                    <form action="{{ route('archives.destroy', $a) }}" method="POST" style="display:inline" onsubmit="return confirmDelete(event)">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $archives->withQueryString()->links() }}

<script>
function confirmDelete(e){
    if(!confirm("Apakah anda yakin ingin menghapus data ini?")){
        e.preventDefault();
        return false;
    }
    return true;
}
</script>
@endsection
