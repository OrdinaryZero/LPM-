<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;

class AgendaController extends Controller
{
    // === UNTUK HALAMAN PUBLIK WARGA ===
    public function index()
    {
        // Ambil agenda mulai dari yang paling dekat harinya
        $agendas = Agenda::orderBy('tanggal', 'asc')->get();
        return view('agenda', compact('agendas'));
    }

    // === UNTUK ADMIN PANEL ===
    public function adminIndex()
    {
        if (!session('is_admin')) return redirect()->route('admin.login');
        $data_agenda = Agenda::latest()->paginate(10);
        return view('admin.agenda', compact('data_agenda'));
    }

    public function store(Request $request)
    {
        if (!session('is_admin')) return redirect()->route('admin.login');
        $request->validate(['nama_kegiatan'=>'required', 'tanggal'=>'required', 'lokasi'=>'required', 'deskripsi'=>'required']);
        Agenda::create($request->all());
        return redirect()->back()->with('success', 'Agenda berhasil ditambahkan!');
    }

    public function updateStatus(Request $request, $id)
    {
        $agenda = Agenda::findOrFail($id);
        $agenda->status = $request->status;
        $agenda->save();
        return redirect()->back()->with('success', 'Status kegiatan diperbarui!');
    }
    
    public function destroy($id)
    {
        Agenda::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Agenda dihapus!');
    }
}