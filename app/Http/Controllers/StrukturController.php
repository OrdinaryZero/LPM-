<?php

namespace App\Http\Controllers;

use App\Models\Struktur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 

class StrukturController extends Controller
{
    public function index()
    {
        $strukturs = Struktur::with('atasan')->orderBy('urutan')->get();
        
        $pilihanFoto = [];
        $pathFolder = public_path('uploads/struktur');

        if (!File::exists($pathFolder)) {
            File::makeDirectory($pathFolder, 0755, true);
        }

        $files = File::files($pathFolder);
        foreach ($files as $file) {
            $pilihanFoto[] = $file->getFilename();
        }

        return view('admin.struktur.index', compact('strukturs', 'pilihanFoto'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jabatan' => 'required',
            'foto_nomer' => 'required'
        ]);

        Struktur::create($request->all());
        return redirect()->back()->with('success', 'Mapping pengurus berhasil!');
    }
    
    public function destroy(Struktur $struktur)
    {
        $struktur->delete();
        return redirect()->back()->with('success', 'Data dihapus!');
    }

    public function reorder(Request $request)
    {
        $request->validate([
            'order' => 'required|array',
            'order.*' => 'exists:strukturs,id',
        ]);

        // Looping data ID yang dikirim dari Javascript, lalu update urutannya
        foreach ($request->order as $index => $id) {
            Struktur::where('id', $id)->update(['urutan' => $index + 1]);
        }

        return response()->json(['success' => true, 'message' => 'Urutan berhasil diperbarui!']);
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'jabatan' => 'required',
        'foto_nomer' => 'required',
        'urutan' => 'nullable|integer'
    ]);

    $struktur = Struktur::findOrFail($id);
    $struktur->update($request->all());

    return redirect()->back()->with('success', 'Data pengurus berhasil diperbarui!');
}
}