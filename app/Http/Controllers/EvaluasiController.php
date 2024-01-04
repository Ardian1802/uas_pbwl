<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Kegiatan;
use App\Models\Evaluasi;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;

class EvaluasiController extends Controller
{
    public function index()
    {
        $rows = Evaluasi::with('peserta', 'kegiatan')->paginate(5);
        return view('evaluasi.index', compact('rows'));

    }

    public function cari(Request $request)
    {
        $rows = Evaluasi::whereHas('kegiatan', function ($query) use ($request) {
        $query->where('nama_kegiatan', 'LIKE', '%' . $request->cari . '%');
        })->paginate(5);

        return view('evaluasi.cari', compact('rows'));
    }

    public function create()
    {
        $pesertas = Peserta::select('id', 'nama_peserta')->get();
        $kegiatans = Kegiatan::select('id', 'nama_kegiatan')->get();

        return view('evaluasi.create', compact('pesertas','kegiatans'));
    }

    public function store(Request $request)
    {

        // Simpan data
        Evaluasi::create([
            'id_kegiatan' => $request->id_kegiatan,
            'id_peserta' => $request->id_peserta,
            'efektivitas' => $request->efektivitas,
            'aspek_perbaikan' => $request->aspek_perbaikan,
            'rekomendasi' => $request->rekomendasi
        ]);

        // Set pesan alert
        $request->session()->flash('alert-success', 'Data berhasil disimpan!');

        // Arahkan pengguna ke rute yang diinginkan
        return redirect('evaluasi');
    }

    public function edit(string $id)
    {
        $row = Evaluasi::findOrFail($id);
        $pesertas = Peserta::select('id', 'nama_peserta')->get();
        $kegiatans = Kegiatan::select('id', 'nama_kegiatan')->get();

        return view('evaluasi.edit', compact('row', 'pesertas','kegiatans'));
    }

    public function update(Request $request, string $id)
    {
        $row = Evaluasi::findOrFail($id);
        $row->update([
            'id_kegiatan' => $request->id_kegiatan,
            'id_peserta' => $request->id_peserta,
            'efektivitas' => $request->efektivitas,
            'aspek_perbaikan' => $request->aspek_perbaikan,
            'rekomendasi' => $request->rekomendasi
        ]);

        // Set pesan alert
        $request->session()->flash('alert-success', 'Data berhasil diupdate!');

        // Arahkan pengguna ke rute yang diinginkan
        return redirect('evaluasi');
    }

    public function destroy(string $id)
    {
        $row = Evaluasi::findOrFail($id);

        $row->delete();

        // Set pesan alert
        session()->flash('alert-success', 'Data berhasil dihapus!');

        // Arahkan pengguna ke rute yang diinginkan
        return redirect('evaluasi');
    }
}
