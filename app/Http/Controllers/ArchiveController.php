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
        $search = $request->query('search');
        $archives = Archive::with('category')
            ->when($search, fn($query)=>$query->where('title','like',"%{$search}%"))
            ->orderBy('created_at','desc')
            ->paginate(10);
        return view('archives.index', compact('archives','search'));
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
            'file_surat' => 'required|file|mimes:pdf|max:20480',
            'notes' => 'nullable|string'
        ]);

        $path = $request->file('file_surat')->store('archives', 'public');

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
            'file_surat' => 'nullable|file|mimes:pdf|max:20480',
            'notes' => 'nullable|string'
        ]);

        if ($request->hasFile('file_surat')) {
            Storage::disk('public')->delete($archive->file_path);
            $path = $request->file('file_surat')->store('archives', 'public');
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
        return Storage::disk('public')->download($archive->file_path, $archive->title . '.pdf');
    }
}
