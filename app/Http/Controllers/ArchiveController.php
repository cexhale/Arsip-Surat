<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Archive;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ArchiveController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->query('q');
        $archives = Archive::with('category')
            ->when($q, fn($query)=>$query->where('title','like',"%{$q}%"))
            ->orderBy('created_at','desc')
            ->paginate(10);
        return view('archives.index', compact('archives','q'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('archives.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'pdf_file' => 'required|file|mimes:pdf|max:20480', // max 20MB
            'notes' => 'nullable|string'
        ]);

        $path = $request->file('pdf_file')->store('archives', 'public');

        Archive::create([
            'title' => $validated['title'],
            'category_id' => $validated['category_id'],
            'file_path' => $path,
            'notes' => $validated['notes'] ?? null,
        ]);

        return redirect()->route('archives.index')->with('success','Data berhasil disimpan');
    }

    public function show(Archive $archive)
    {
        return view('archives.show', compact('archive'));
    }

    public function edit(Archive $archive)
    {
        $categories = Category::all();
        return view('archives.edit', compact('archive','categories'));
    }

    public function update(Request $request, Archive $archive)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'pdf_file' => 'nullable|file|mimes:pdf|max:20480',
            'notes' => 'nullable|string'
        ]);

        if ($request->hasFile('pdf_file')) {
            // hapus file lama
            Storage::disk('public')->delete($archive->file_path);
            $path = $request->file('pdf_file')->store('archives', 'public');
            $archive->file_path = $path;
        }

        $archive->title = $validated['title'];
        $archive->category_id = $validated['category_id'];
        $archive->notes = $validated['notes'] ?? null;
        $archive->save();

        return redirect()->route('archives.index')->with('success','Data berhasil diperbarui');
    }

    public function destroy(Archive $archive)
    {
        Storage::disk('public')->delete($archive->file_path);
        $archive->delete();
        return redirect()->route('archives.index')->with('success','Data berhasil dihapus');
    }

    public function download(Archive $archive)
    {
        // Mendownload file PDF
        return Storage::disk('public')->download($archive->file_path, $archive->title . '.pdf');
    }
}
