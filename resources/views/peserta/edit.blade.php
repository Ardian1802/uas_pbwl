@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Form Edit Peserta</h5>
            <div class="col-sm-8">
                <form class="row g-3 mt-2" action="{{ url('peserta/' . $row->id) }}" method="POST">
                    <input type="hidden" name="_method" value="PATCH">
                    @csrf

                    <div class="mb-3">
                        <label for="nama_peserta" class="form-label">Nama Peserta*</label>
                        <input type="text" class="form-control" id="nama_peserta" name="nama_peserta" value="{{ $row->nama_peserta }}" placeholder="Inputkan Nama Peserta..." required>
                    </div>

                    <div class="mb-3">
                        <label for="id_kegiatan" class="form-label">Kegiatan*</label>
                        <select class="form-control" name="id_kegiatan" id="id_kegiatan">
                            <option value="">-- Pilih --</option>
                            @foreach($kegiatans as $kegiatan)
                                <option value="{{ $kegiatan->id }}" {{ $row->id_kegiatan == $kegiatan->id ? 'selected' : ''}}>{{ $kegiatan->nama_kegiatan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="peran" class="form-label">Peran*</label>
                        <select class="form-control" name="peran" id="peran">
                            <option value="">-- Pilih --</option>
                            <option value="Panitia" {{ strcasecmp($row->peran, 'Panitia') === 0 ? 'selected' : '' }}>Panitia</option>
                            <option value="Peserta" {{ strcasecmp($row->peran, 'Peserta') === 0 ? 'selected' : '' }}>Peserta</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ url('peserta') }}" class="btn btn-warning" >Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
