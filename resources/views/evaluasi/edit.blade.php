@extends('layouts.app')

@section('content')
<div class="container"> 
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Form Edit Absensi</h5>
            <div class="col-sm-8">
                <form class="row g-3 mt-2" action="{{ url('evaluasi/' . $row->id) }}" method="POST">
                    <input type="hidden" name="_method" value="PATCH">
                    @csrf
                    
                    
                    <div class="mb-3">
                        <label for="id_kegiatan" class="form-label">Nama Kegiatan*</label>
                        <select class="form-control" name="id_kegiatan" id="id_kegiatan">
                            <option value="">-- Pilih --</option>
                            @foreach($kegiatans as $kegiatan)
                                <option value="{{ $kegiatan->id }}" {{ $row->id_kegiatan == $kegiatan->id ? 'selected' : ''}}>{{ $kegiatan->nama_kegiatan }}</option>
                            @endforeach
                        </select>
                    </div>
                        
                    <div class="mb-3">
                        <label for="id_peserta" class="form-label">Nama Peserta*</label>
                        <select class="form-control" name="id_peserta" id="id_peserta">
                            <option value="">-- Pilih --</option>
                            @foreach($pesertas as $peserta)
                                <option value="{{ $peserta->id }}" {{ $row->id_peserta == $peserta->id ? 'selected' : ''}}>{{ $peserta->nama_peserta }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="efektivitas" class="form-label">Efektivitas*</label>
                        <input type="text" class="form-control" id="efektivitas" name="efektivitas" value="{{ $row->efektivitas }}" placeholder="Inputkan Efektivitas Acara..." required>
                    </div> 
                    <div class="mb-3">
                        <label for="aspek_perbaikan" class="form-label">Aspek Perbaikan*</label>
                        <input type="text" class="form-control" id="aspek_perbaikan" name="aspek_perbaikan" value="{{ $row->aspek_perbaikan }}" placeholder="Inputkan Aspek Perbaikan Acara..." required>
                    </div> 

                    <div class="mb-3">
                        <label for="rekomendasi" class="form-label">Rekomendasi*</label>
                        <input type="text" class="form-control" id="rekomendasi" name="rekomendasi" value="{{ $row->rekomendasi }}" placeholder="Inputkan Rekomendasi Acara Selanjutnya..." required>
                    </div> 
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ url('absensi') }}" class="btn btn-warning" >Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
