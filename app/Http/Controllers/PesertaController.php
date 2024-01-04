<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Peserta;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function index()
    {
        $rows = Peserta::with('kegiatan')->paginate(5);
        return view('peserta.index', compact('rows'));

    }

    public function cari(Request $request)
    {
        $rows = Peserta::where('nama_peserta', 'LIKE', '%' .$request->cari. '%')->paginate(5);

        return view('peserta.cari', compact('rows'));
    }

    public function create()
    {
        $kegiatans = Kegiatan::select('id', 'nama_kegiatan')->get();

        return view('peserta.create', compact('kegiatans'));
    }

    public function store(Request $request)
    {

        // Simpan data
        Peserta::create([
            'id_kegiatan' => $request->id_kegiatan,
            'nama_peserta' => $request->nama_peserta,
            'peran' => $request->peran
        ]);

        // Set pesan alert
        $request->session()->flash('alert-success', 'Data berhasil disimpan!');

        // Arahkan pengguna ke rute yang diinginkan
        return redirect('peserta');
    }

    public function edit(string $id)
    {
        $row = Peserta::findOrFail($id);
        $kegiatans = Kegiatan::select('id', 'nama_kegiatan')->get();

        return view('peserta.edit', compact('row','kegiatans'));
    }

    public function update(Request $request, string $id)
    {
        $row = Peserta::findOrFail($id);
        $row->update([
            'id_kegiatan' => $request->id_kegiatan,
            'nama_peserta' => $request->nama_peserta,
            'peran' => $request->peran
        ]);

        // Set pesan alert
        $request->session()->flash('alert-success', 'Data berhasil diupdate!');

        // Arahkan pengguna ke rute yang diinginkan
        return redirect('peserta');
    }

    public function destroy(string $id)
    {
        $row = Peserta::findOrFail($id);

        $row->delete();

        // Set pesan alert
        session()->flash('alert-success', 'Data berhasil dihapus!');

        // Arahkan pengguna ke rute yang diinginkan
        return redirect('peserta');
    }
}
